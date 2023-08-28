import { BaseControl, Panel, PanelBody } from '@wordpress/components'
import { useSelect } from '@wordpress/data'
import { useEffect, useState } from '@wordpress/element'
import { __ } from '@wordpress/i18n'
import { Completion } from '@draft/components/Completion'
import { DraftMenu } from '@draft/components/DraftMenu'
import { EditMenu } from '@draft/components/EditMenu'
import { Input } from '@draft/components/Input'
import { InsertMenu } from '@draft/components/InsertMenu'
import { useCompletion } from '@draft/hooks/useCompletion'

export const Draft = () => {
    const [inputText, setInputText] = useState('')
    const [ready, setReady] = useState(false)
    const [prompt, setPrompt] = useState({
        text: '',
        promptType: '',
        systemMessageKey: '',
    })
    const { completion, loading, error } = useCompletion(
        prompt.text,
        prompt.promptType,
        prompt.systemMessageKey,
    )
    const selectedBlockClientIds = useSelect(
        (select) => select('core/block-editor').getSelectedBlockClientIds(),
        [],
    )
    const { getBlock } = useSelect((select) => select('core/block-editor'), [])

    // Reset input text when an error occurs
    useEffect(() => {
        if (!error) return
        setInputText(prompt.text)
    }, [error, prompt.text])

    const canEditContent = () => {
        if (selectedBlockClientIds.length === 0) {
            return false
        }
        const targetBlock = getBlock(selectedBlockClientIds[0])
        if (!targetBlock) {
            return false
        }
        return (
            typeof targetBlock?.attributes?.content !== 'undefined' &&
            targetBlock?.attributes?.content !== ''
        )
    }

    return (
        <>
            <Panel>
                <PanelBody>
                    <div className="rounded-sm border-none bg-gray-100 overflow-hidden mb-4">
                        <Input
                            inputText={inputText}
                            setInputText={setInputText}
                            ready={ready}
                            setReady={setReady}
                            setPrompt={setPrompt}
                            loading={loading}
                        />
                        {completion && (
                            <>
                                <hr className="mx-5 my-0 border-gray-300" />
                                <Completion completion={completion} />
                            </>
                        )}
                        {error && (
                            <div className="px-4 mb-4 mt-2">
                                <p className="m-0 text-xs font-semibold text-red-500">
                                    {error.message}
                                </p>
                            </div>
                        )}
                    </div>
                    {(completion || loading) && !error && (
                        <InsertMenu
                            prompt={prompt}
                            completion={completion}
                            setPrompt={setPrompt}
                            setInputText={setInputText}
                            loading={loading}
                        />
                    )}
                    {!loading && !completion && canEditContent() && (
                        <BaseControl label={__('Edit or review', 'extendify')}>
                            <EditMenu
                                completion={completion}
                                disabled={loading}
                                setInputText={setInputText}
                                setPrompt={setPrompt}
                            />
                        </BaseControl>
                    )}
                    {!loading && !completion && !canEditContent() && (
                        <BaseControl label={__('Draft with AI', 'extendify')}>
                            <DraftMenu
                                disabled={loading}
                                setInputText={setInputText}
                                setReady={setReady}
                            />
                        </BaseControl>
                    )}
                </PanelBody>
            </Panel>
            {window.extendifyData?.devbuild && (
                <Panel>
                    <PanelBody title="Debug" initialOpen={false}>
                        <label>prompt text:</label>
                        <pre className="whitespace-pre-wrap">{prompt.text}</pre>
                        <label>prompt system message:</label>
                        <pre className="whitespace-pre-wrap">
                            {prompt.systemMessageKey}
                        </pre>
                        <label>completion:</label>
                        <pre className="whitespace-pre-wrap">{completion}</pre>
                        <label>error:</label>
                        <pre className="whitespace-pre-wrap">
                            {error?.message ?? ''}
                        </pre>
                        <label>
                            loading:{' '}
                            {loading ? <span>true</span> : <span>false</span>}
                        </label>
                    </PanelBody>
                </Panel>
            )}
        </>
    )
}
