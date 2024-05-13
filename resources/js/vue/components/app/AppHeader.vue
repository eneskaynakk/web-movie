<template>
    <header class="w-full bg-black shadow-md">

        <nav class="container mx-auto flex justify-between items-center py-2" aria-label="Global">

            <div class="flex items-center space-x-6">
                <a href="/" class="flex items-center space-x-2"><img :src="imgUrl" alt="Logo" class="h-[86px] w-[110px] flex items-center space-x-2"></a>
                <a :href="watch">
                    <button class="flex justify-center items-center rounded-lg text-white font-bold border-2 p-2 border-white transition-all duration-100 hover:shadow-md hover:bg-gradient-to-t hover:from-stone-100 before:to-stone-50 hover:-translate-y-[3px]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-[2px] text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z" />
                        </svg>
                        Film Listem
                    </button>
                </a>

                <ul class="flex space-x-6 text-white">
                    <li class="text-base"><a href="/"><i class="icofont-home text-xl"></i> Anasayfa</a></li>
                    <li class="text-base"><a :href="about"><i class="icofont-info-circle text-xl"></i> Hakkımızda</a></li>
                    <li class="text-base"><a :href="team"><i class="icofont-ui-user-group text-xl"></i> Ekip</a></li>
                    <li class="text-base"><a :href="x()" ><i class="icofont-phone text-xl"></i> İletişim</a></li>
                </ul>
            </div>

            <div class="flex items-center">

                <button type="button" @click="setFocus" class="h-10 bg-white p-0.5 rounded-l-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6 text-black">
                        <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.59 5.28l4.69 4.69a.75.75 0 11-1.06 1.06l-4.69-4.69A8.25 8.25 0 012.25 10.5z" clip-rule="evenodd"></path>
                    </svg>
                </button>

                <div class="relative">
                    <input name="fsrch" v-model="search"  @input="getMovies" id="fsrch" ref="fscrh"
                    class="bg-white text-black bold w-96 h-10 p-2 rounded-r-lg" placeholder="Film arayın...">
                    <div v-if="search " class="absolute z-10 bg-white rounded-lg w-96 mt-2 pr-16">
                        <a href="/movie">
                            <div v-for="movie in movies.slice(0,5)" :key="movie.id" class="items-center grid grid-cols-2 hover:underline opacity-100 hover:opacity-80">
                                <img :src="movie.poster" class="w-32 h-36 m-2 rounded-lg">
                                <p class="text-black text-[15px] mr-6 mt-0 mb-0 font-bold hover:underline">{{ movie.title }}</p>
                            </div>
                        </a>
                    </div>
                </div>

            </div>

            <div class="flex">
                <div v-if="store.isAuth">
                    <button @click="logout" class="flex justify-center items-center rounded-lg text-white font-bold border-2 p-2 border-white transition-all duration-100  hover:shadow-md hover:bg-gradient-to-t hover:from-stone-100 before:to-stone-50 hover:-translate-y-[3px]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6  mr-[5px] text-white " viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                        Çıkış Yap
                    </button>
                </div>
                <template v-else>
                    <div>
                        <a :href="register">
                            <button class="flex justify-center items-center rounded-lg text-white font-bold border-2 p-2 border-white transition-all duration-100  hover:shadow-md hover:bg-gradient-to-t hover:from-stone-100 before:to-stone-50 hover:-translate-y-[3px]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6  mr-[5px] text-white " viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                                Üye Ol
                            </button>
                        </a>
                    </div>
                    <div class="ml-6">
                        <a :href="login">
                            <button class="flex justify-center items-center rounded-lg text-white font-bold border-2 p-2 border-white transition-all duration-100 hover:shadow-md hover:bg-gradient-to-t hover:from-stone-100 before:to-stone-50 hover:-translate-y-[3px]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-[5px] text-white " viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4M10 17l5-5-5-5M13.8 12H3"/>
                                </svg>
                                Giriş Yap
                            </button>
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

const x = () => location.href + '#iletisim'

const store = useAuthStore()

const logout = () => {
    fetchData('api.logout').then(() => {
        store.user = null
        localStorage.removeItem('is_authenticated')
    })
}

onMounted(() => setTimeout(store.getUserService, 200))
</script>
