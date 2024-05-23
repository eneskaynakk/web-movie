import { defineStore } from "pinia";
import { fetchData, getRoute } from "@utils/helpers";
import Swal from "sweetalert2";

export const useAuthStore = defineStore('auth', {
    state: () => ({
        user: null
    }),

    getters: {
        isAuth: state => state.user && localStorage.getItem('is_authenticated'),
        isAuthenticate: () => localStorage.getItem('is_authenticated')
    },

    actions: {
        getUserService(redirect) {
            if (!this.user && localStorage.getItem('is_authenticated')) {
                fetchData('sanctum.csrf-cookie').then(async () => {
                try {
                    const data = await fetchData('api.user')
                    this.user = data.data
                    if (redirect) window.location.href = getRoute('index')
                } catch {
                    this.user = null
                    localStorage.removeItem('is_authenticated')
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        customClass: {
                            popup: 'swal2-my-toast',
                        },
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                        });
                        Toast.fire({
                        icon: "error",
                        title: 'Something went wrong. Please try again.'
                    });
                }
            })
            }
        }
    },

    persist: {
        storage: sessionStorage,
        paths: ['user']
    }
})

