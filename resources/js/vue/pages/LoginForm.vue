<template>
    <div class="relative flex h-full w-full ">
        <div class="h-screen w-1/2 bg-black">
            <div class="mx-auto flex h-full w-2/3 flex-col justify-center text-white xl:w-1/2">
                <div class="flex justify-center items-center">
                    <a href="/" class="-m-1.5 shrink-0 ">
                        <img :src="imgUrl" alt="" id="fotom" class="h-[160px] w-[160px]">
                    </a>
                </div>
                <div class="mt-10">
                    <form @submit.prevent="login">
                        <div>
                            <label class="mb-2.5 block font-extrabold" >Email</label>
                            <input type="email" name="email" v-model="form.email" class="inline-block w-full rounded-full bg-white p-2.5 leading-none text-black placeholder-indigo-900 shadow placeholder:opacity-30" placeholder="example@gmail.com" />
                        </div>

                        <div class="mt-4">
                            <label class="mb-2.5 block font-extrabold" >Password</label>
                            <input type="password" name="password" v-model="form.password" class="inline-block w-full rounded-full bg-white p-2.5 leading-none text-black placeholder-indigo-900 shadow placeholder:opacity-30" placeholder="*********" />
                        </div>

                        <div class="mt-8">
                            <button type="submit" class="font-bold hover:bg-black hover:text-white hover:ring hover:ring-white transition duration-300 inline-flex items-center justify-center rounded-full text-base focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-white text-black py-4 w-full">Login</button>
                        </div>

                        <div class=" flex justify-end">
                            <p class="flex mr-3 my-7 text-white rounded-lg bg-black">Don't have an account?</p>
                            <a :href="register" class="bg-white text-black h-10 px-4 py-2 my-5 font-semibold hover:bg-black hover:text-white hover:ring hover:ring-white transition duration-300 inline-flex items-center justify-center rounded-md text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 ">
                                Sign Up
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="h-screen w-1/2 ">
            <img :src="imgUrl2" class="h-full w-full" />
        </div>
    </div>
</template>

<script setup>
import { reactive } from 'vue';
import { getRoute,fetchData } from "@utils/helpers.js";
import { useAuthStore } from '@stores/authStore'
import Swal from 'sweetalert2'

const imgUrl = new URL('@images/site_logo.png', import.meta.url).href
const imgUrl2 = new URL('@images/login_2.jpg', import.meta.url).href

const store = useAuthStore()

const form = reactive({ email: null, password: null })

const register = getRoute('register')

const login = () => {
    fetchData('sanctum.csrf-cookie').then(async () => {
        try {
            await fetchData('api.login', form)
            localStorage.setItem('is_authenticated', true)
            store.getUserService(true)
        }
        catch(err) {
                console.error(err)
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
                title: err.response.data.message
            });
        }
    });
}
</script>
