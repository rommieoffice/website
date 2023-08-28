import { useState } from '@wordpress/element'
import { __ } from '@wordpress/i18n'
import { Icon } from '@wordpress/icons'
import { getAnswer } from '@chat/api/Data'
import { Answer } from '@chat/components/dialog/Answer'
import { Header } from '@chat/components/dialog/Header'
import { History } from '@chat/components/dialog/History'
import { Question } from '@chat/components/dialog/Question'
import { Support } from '@chat/components/dialog/Support'
import { useHistoryStore } from '@chat/state/Global'
import { history } from '@chat/svg/index'

export const ChatDialog = ({ setShowChat }) => {
    const [question, setQuestion] = useState(undefined)
    const [answer, setAnswer] = useState(undefined)
    const [answerId, setAnswerId] = useState(undefined)
    const [error, setError] = useState(false)
    const [experienceLevel, setExperienceLevel] = useState(
        window.extChatData?.experienceLevel ?? 'beginner',
    )
    const [showHistory, setShowHistory] = useState(false)
    const { hasHistory } = useHistoryStore()

    const reset = () => {
        setQuestion(undefined)
        setAnswer(undefined)
        setAnswerId(undefined)
        setError(false)
        setAnswerId(undefined)
        setShowHistory(false)
    }

    const handleSubmit = async (formSubmitEvent) => {
        formSubmitEvent.preventDefault()
        const q = formSubmitEvent.target?.[0]?.value ?? ''
        if (!q) return
        setAnswer('...')
        setQuestion(q)
        const response = await getAnswer({ question: q, experienceLevel })
        if (!response.ok) {
            setError(true)
            return
        }
        try {
            const reader = response.body.getReader()
            const decoder = new TextDecoder()
            while (true) {
                const { value, done } = await reader.read()
                if (done) break
                const chunk = decoder.decode(value)
                try {
                    const { id } = JSON.parse(chunk)
                    if (!id) throw new Error('False positive')
                    setAnswerId(id)
                } catch (e) {
                    // if chunk fails to parse then it's a string
                    setAnswer((v) => {
                        if (v === '...') return chunk
                        return v + chunk
                    })
                }
            }
        } catch (e) {
            console.error(e)
        }
    }

    return (
        <div className="fixed z-high overflow-hidden w-80 bottom-24 right-6 border border-solid border-gray-300 text-base bg-white rounded-lg shadow-2xl">
            <div className="p-6 bg-design-main text-design-text">
                <Header
                    question={question}
                    reset={reset}
                    experienceLevel={experienceLevel}
                    setExperienceLevel={setExperienceLevel}
                    showHistory={showHistory}
                    setShowChat={setShowChat}
                />
                {!answer && !question && !showHistory && (
                    <Question onSubmit={handleSubmit} />
                )}
            </div>

            {!answer && !question && !showHistory && (
                <Support height={hasHistory() ? 'h-11' : 'h-32'} />
            )}

            {question && !showHistory && (
                <Answer
                    question={question}
                    answer={answer}
                    answerId={answerId}
                    reset={reset}
                    error={error}
                />
            )}

            {showHistory && <History reset={reset} />}

            {!answer && !question && hasHistory() && !showHistory && (
                <div className="text-xs p-6 border border-b-0 border-r-0 border-l-0 border-solid border-gray-300 text-gray-600 flex justify-around">
                    <div
                        className="flex flex-col items-center group cursor-pointer"
                        onClick={() => setShowHistory(true)}>
                        <span>
                            <Icon
                                icon={history}
                                className={
                                    'group-hover:text-design-main cursor-pointer w-5 h-5 text-gray-500 fill-current'
                                }
                            />
                        </span>
                        <span className="group-hover:text-design-main">
                            {__('Recent History', 'extendify')}
                        </span>
                    </div>
                </div>
            )}
        </div>
    )
}
