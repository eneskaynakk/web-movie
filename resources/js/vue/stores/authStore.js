import { defineStore } from "pinia";
import { fetchData } from "@utils/helpers";

export const useAuthStore = defineStore('auth', {
    state: () => ({
        user: null
    }),

    getters: {
        isAuth: state => state.user && localStorage.getItem('is_authenticated'),
        isAuthenticate: () => localStorage.getItem('is_authenticated')
    },

    actions: {
        async getUserService() {
            if (!this.user && localStorage.getItem('is_authenticated')) {
                try {
                    const data = await fetchData('api.user')
                    this.user = data.data
                    return data
                } catch {
                    localStorage.removeItem('is_authenticated')
                    window.location.reload()
                    this.user = null
                }
            }
        }
    },

    persist: {
        storage: sessionStorage,
        paths: ['user']
    }
})

