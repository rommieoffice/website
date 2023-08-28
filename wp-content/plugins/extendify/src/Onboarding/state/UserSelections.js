import { create } from 'zustand'
import { persist, devtools, createJSONStorage } from 'zustand/middleware'
import {
    getUserSelectionData,
    saveUserSelectionData,
} from '@onboarding/api/DataApi'

const key = 'extendify-site-selection'
const initialState = {
    siteType: {},
    siteInformation: {
        title: undefined,
    },
    siteTypeSearch: [],
    style: null,
    pages: [],
    plugins: [],
    goals: [],
    ...(JSON.parse(localStorage.getItem(key) || '{}')?.state ?? {}),
}

const state = (set, get) => ({
    ...initialState,
    setSiteType(siteType) {
        set({ siteType })
    },
    setSiteInformation(name, value) {
        const siteInformation = { ...get().siteInformation, [name]: value }
        set({ siteInformation })
    },
    has(type, item) {
        if (!item?.id) return false
        return get()[type].some((t) => t.id === item.id)
    },
    add(type, item) {
        if (get().has(type, item)) return
        set({ [type]: [...get()[type], item] })
    },
    remove(type, item) {
        set({ [type]: get()[type]?.filter((t) => t.id !== item.id) })
    },
    reset(type) {
        set({ [type]: [] })
    },
    toggle(type, item) {
        if (get().has(type, item)) {
            get().remove(type, item)
            return
        }
        get().add(type, item)
    },
    setStyle(style) {
        set({ style })
    },
    canLaunch() {
        // The user can launch if they have a complete selection
        return (
            Object.keys(get()?.siteType ?? {})?.length > 0 &&
            Object.keys(get()?.style ?? {})?.length > 0 &&
            get()?.pages?.length > 0
        )
    },
    resetState() {
        set(initialState)
    },
})

const storage = {
    getItem: async () => JSON.stringify(await getUserSelectionData()),
    setItem: async (k, value) => {
        // Stash here so we can use it on reload optimistically
        await saveUserSelectionData(value)
        localStorage.setItem(k, value)
    },
    removeItem: () => undefined,
}

export const useUserSelectionStore = create(
    persist(devtools(state, { name: 'Extendify User Selection' }), {
        name: key,
        storage: createJSONStorage(() => storage),
    }),
    state,
)
