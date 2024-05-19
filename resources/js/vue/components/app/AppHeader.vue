<template>
    <header class="w-full bg-black shadow-md">

        <nav class="container mx-auto flex justify-between items-center py-2" aria-label="Global">

            <div class="flex items-center space-x-6">
                <a href="/" class="flex items-center space-x-2"><img :src="imgUrl" alt="Logo" class="h-[86px] w-[110px] flex items-center space-x-2"></a>
                <a :href="watch" class="flex justify-center items-center rounded-lg text-white font-bold border-2 p-2 border-white transition-all duration-100 hover:shadow-md hover:bg-gradient-to-t hover:from-stone-100 before:to-stone-50 hover:-translate-y-[3px]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-[2px] text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z" />
                        </svg>
                        Watchlist
                </a>

                <ul class="flex">
                    <li >
                        <a href="/" class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5 mr-[5px] bi bi-house-door-fill" viewBox="0 1 16 16">
                                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <a :href="about" class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5 mr-[5px] bi bi-info-square-fill" viewBox="0 0 16 16">
                                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                            </svg>
                            About
                        </a>
                    </li>
                    <li>
                        <a :href="team" class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5 mr-[5px] bi bi-microsoft-teams" viewBox="0 0 16 16">
                                <path d="M9.186 4.797a2.42 2.42 0 1 0-2.86-2.448h1.178c.929 0 1.682.753 1.682 1.682zm-4.295 7.738h2.613c.929 0 1.682-.753 1.682-1.682V5.58h2.783a.7.7 0 0 1 .682.716v4.294a4.197 4.197 0 0 1-4.093 4.293c-1.618-.04-3-.99-3.667-2.35Zm10.737-9.372a1.674 1.674 0 1 1-3.349 0 1.674 1.674 0 0 1 3.349 0m-2.238 9.488-.12-.002a5.2 5.2 0 0 0 .381-2.07V6.306a1.7 1.7 0 0 0-.15-.725h1.792c.39 0 .707.317.707.707v3.765a2.6 2.6 0 0 1-2.598 2.598z"/>
                                <path d="M.682 3.349h6.822c.377 0 .682.305.682.682v6.822a.68.68 0 0 1-.682.682H.682A.68.68 0 0 1 0 10.853V4.03c0-.377.305-.682.682-.682Zm5.206 2.596v-.72h-3.59v.72h1.357V9.66h.87V5.945z"/>
                            </svg>
                            Team
                        </a>
                    </li>
                    <li>
                        <a :href="support()" class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5 mr-[5px] bi bi-mic-fill" viewBox="0 0 16 16">
                                <path d="M5 3a3 3 0 0 1 6 0v5a3 3 0 0 1-6 0z"/>
                                <path d="M3.5 6.5A.5.5 0 0 1 4 7v1a4 4 0 0 0 8 0V7a.5.5 0 0 1 1 0v1a5 5 0 0 1-4.5 4.975V15h3a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1h3v-2.025A5 5 0 0 1 3 8V7a.5.5 0 0 1 .5-.5"/>
                            </svg>
                            Support
                        </a>
                    </li>
                </ul>
            </div>

            <div class="flex items-center">
                <button type="button" @click="setFocus" class="h-10 bg-white p-0.5 rounded-l-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6 text-black">
                        <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.59 5.28l4.69 4.69a.75.75 0 11-1.06 1.06l-4.69-4.69A8.25 8.25 0 012.25 10.5z" clip-rule="evenodd"></path>
                    </svg>
                </button>

                <div class="relative">
                    <input name="fsrch" v-model="search" @input="getMovies" id="fsrch" ref="fscrh"  class="bg-white text-black bold w-96 h-10 p-2 rounded-r-lg" placeholder="Search IAM...">
                    <button v-if="search" @click="search=''" class="absolute right-[3px] top-[8px]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class=" text-black w-6 h-6 bi bi-x" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                        </svg>
                    </button>
                    <div v-if="search" class="absolute z-10 bg-white rounded-lg w-96 mt-2 pr-16">
                        <div v-for="movie in movies.slice(0,5)" :key="movie.id" class="items-center grid grid-cols-2 hover:underline opacity-100 hover:opacity-80">
                            <a :href="'movie/' + movie.id">
                                <img :src="movie.poster" class="w-32 h-36 m-2 rounded-lg">
                            </a>
                            <a :href="'movie/' + movie.id">
                                <p class="text-black text-[15px] mr-6 mt-0 mb-0 font-bold hover:underline">{{ movie.title }}</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex">
                <div v-if="store.isAuth" class="z-10 flex justify-around items-center w-48 h-12 bg-black shadow-lg">
                    <div class="dropdown cursor-pointer p-1 mr-2 flex items-center">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-10 h-10 text-white bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                            </svg>
                        </div>
                        <div>
                            <span class="ml-2 text-white text-base font-bold ">{{  store?.user?.name }}</span>
                        </div>
                        <div class="rounded-md shadow-sm flex">
                            <button onclick="clicaParaAbrirMenu()" class="flex justify-center items-center  h-3 w-3 overflow-hidden focus:outline-none">
                                <button @click="dropdownOpen = !dropdownOpen" class="relative z-10 block rounded-md bg-black p-2 focus:outline-none">
                                    <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="-1 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </button>
                            <div class="dropdown-menu absolute w-48 bg-white rounded-lg shadow-xl mt-7 -ml-40 hidden sm:mr-24 md:mr-32 lg:mr-48 xl:mr-64s">
                                <div>
                                    <a :href="watch" class="flex items-center text-black font-bold hover:rounded-t-lg hover:bg-gray-300 py-2  whitespace-no-wrap" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-[2px] text-black" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z" />
                                        </svg>
                                        Watchlist
                                    </a>
                                </div>
                                <div>
                                    <button @click="logout" class="flex items-center text-black font-bold hover:rounded-b-lg hover:bg-gray-300  py-2 whitespace-no-wrap w-full">
                                        <svg viewBox="0 0 24 24" class="w-7 h-7 mr-[2px]" fill="none" xmlns="http://www.w3.org/2000/svg" >
                                            <path d="M13 4.00894C13.0002 3.45665 12.5527 3.00876 12.0004 3.00854C11.4481 3.00833 11.0002 3.45587 11 4.00815L10.9968 12.0116C10.9966 12.5639 11.4442 13.0118 11.9965 13.012C12.5487 13.0122 12.9966 12.5647 12.9968 12.0124L13 4.00894Z" fill="currentColor" />
                                            <path d="M4 12.9917C4 10.7826 4.89541 8.7826 6.34308 7.33488L7.7573 8.7491C6.67155 9.83488 6 11.3349 6 12.9917C6 16.3054 8.68629 18.9917 12 18.9917C15.3137 18.9917 18 16.3054 18 12.9917C18 11.3348 17.3284 9.83482 16.2426 8.74903L17.6568 7.33481C19.1046 8.78253 20 10.7825 20 12.9917C20 17.41 16.4183 20.9917 12 20.9917C7.58172 20.9917 4 17.41 4 12.9917Z" fill="currentColor" />
                                        </svg>
                                        <span class="">Sign Out</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <template v-else>
                    <div>
                        <a :href="register" class="flex justify-center items-center rounded-lg text-white font-bold border-2 p-2 border-white transition-all duration-100  hover:shadow-md hover:bg-gradient-to-t hover:from-stone-100 before:to-stone-50 hover:-translate-y-[3px]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6  mr-[5px] text-white " viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                            Sign Up
                        </a>
                    </div>
                    <div class="ml-6">
                        <a :href="login" class="flex justify-center items-center rounded-lg text-white font-bold border-2 p-2 border-white transition-all duration-100 hover:shadow-md hover:bg-gradient-to-t hover:from-stone-100 before:to-stone-50 hover:-translate-y-[3px]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-[5px] text-white " viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4M10 17l5-5-5-5M13.8 12H3"/>
                            </svg>
                            Login
                        </a>
                    </div>
                </template>
            </div>
        </nav>
    </header>
</template>
<script setup>
import { ref, onMounted } from 'vue'
import { fetchData } from "@utils/helpers"
import {getRoute} from "@utils/helpers";
import { useAuthStore } from '@stores/authStore'

const imgUrl = new URL('@images/site_logo.png', import.meta.url).href

const fscrh = ref(null)
function setFocus() {
    fscrh.value.focus()
}

const search = ref(null)
const movies = ref([])

const getMovies = () => {
    fetchData('api.search', {query: search.value})
    .then(data => movies.value = data.data)
    .catch(err => console.error(err))
}

const about = getRoute('about')
const register = getRoute('register')
const login = getRoute('login')
const watch = getRoute('watch')
const team = getRoute('team')


const support = () => '#support'

const store = useAuthStore()

const logout = () => {
    fetchData('api.logout').then(() => {
        store.user = null
        localStorage.removeItem('is_authenticated')
        window.location.href = getRoute('index')
    })
}

onMounted(() => setTimeout(store.getUserService, 200))
</script>
