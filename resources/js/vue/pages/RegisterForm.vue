<template>
    <div class="relative flex h-full w-full">
        <div class="h-screen w-1/2 bg-black">
            <div class="mx-auto flex h-full w-2/3 flex-col justify-center text-white xl:w-1/2">
                <div class="flex justify-center items-center">
                    <a href="/" class="-m-1.5 shrink-0 ">
                        <img :src="imgUrl" alt="" id="fotom" class="h-[160px] w-[160px]">
                    </a>
                </div>
                <div class="mt-10">
                    <form @submit.prevent="register">

                        <div>
                            <label class="mb-2.5 block font-extrabold" >Name</label>
                            <input type="text" name="name" v-model="form.name" class="inline-block w-full rounded-full bg-white mb-2.5 p-2.5 leading-none text-black placeholder-indigo-900 shadow placeholder:opacity-30" placeholder="Example" />
                        </div>

                        <div>
                            <label class="mb-2.5 block font-extrabold">Email</label>
                            <input type="email" name="email" v-model="form.email" class="inline-block w-full rounded-full bg-white p-2.5 leading-none text-black placeholder-indigo-900 shadow placeholder:opacity-30" placeholder="example@gmail.com" />
                        </div>

                        <div class="mt-4">
                            <label class="mb-2.5 block font-extrabold">Password</label>
                            <input type="password" name="password" v-model="form.password" class="inline-block w-full rounded-full bg-white p-2.5 leading-none text-black placeholder-indigo-900 shadowplaceholder-indigo-900 placeholder:opacity-30" placeholder="********"/>
                        </div>

                        <div class="mt-4">
                            <label class="mb-2.5 block font-extrabold">Confirm Password</label>
                            <input type="password" name="confirm-password" v-model="form.password_confirmation" class="inline-block w-full rounded-full bg-white p-2.5 leading-none text-black placeholder-indigo-900 shadowplaceholder-indigo-900 placeholder:opacity-30" placeholder="********"/>
                        </div>

                        <div class="mt-8">
                            <button type="submit" class="font-bold hover:bg-black hover:text-white hover:ring hover:ring-white transition duration-300 inline-flex items-center justify-center rounded-full text-base focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-white text-black py-4 w-full">Sign Up</button>
                        </div>

                        <div class=" flex justify-end">
                            <p class="flex mr-3 my-7 text-white rounded-lg bg-black">Have an account?</p>
                            <a :href="login" class="bg-white text-black h-10 px-4 py-2 my-5 font-semibold hover:bg-black hover:text-white hover:ring hover:ring-white transition duration-300 inline-flex items-center justify-center rounded-md text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 ">
                                Login
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
import { reactive } from 'vue'
import {fetchData, getRoute} from "@utils/helpers"
import Swal from 'sweetalert2';

const imgUrl = new URL('@images/site_logo.png', import.meta.url).href
const imgUrl2 = new URL('@images/login_2.jpg', import.meta.url).href

const login = getRoute('login')

const form = reactive({ name: null, email: null, password: null, password_confirmation: null })
const errors = reactive({})

const register = () =>
    fetchData('sanctum.csrf-cookie').then(() => {
        fetchData('api.register', {}, form)
            .then(() => {
                localStorage.setItem('is_authenticated', true)
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                    });
                    Toast.fire({
                        icon: "success",
                        title: "Kayıt başarılı"
                    }).then(() => window.location.href = getRoute('login'));
            })
            .catch((err) => {
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
        });
    });
</script>
