<template>
    <div class="flex h-full w-full items-center justify-center bg-black bg-cover bg-no-repeat">
        <div class="bg-black bg-opacity-50 w-full h-full shadow-lg backdrop-blur-xl max-sm:px-8 flex">
            <div class="flex-none">
                <button @click="addFavorite(movie.id)" v-if="!movieIds.includes(movie.id)" class="right-[1489px] top-[15px] absolute z-10 p-2 backdrop-blur-sm bg-gray-800/30 w-12 h-12 justify-center items-center flex self-end rounded-xl border-gray-400/50 border hover:shadow-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z" />
                    </svg>
                </button>
                <button @click="deleteFavorites(movie.id)" v-else class="right-[1489px] top-[15px] absolute z-10 p-2 backdrop-blur-sm bg-gray-800/30 w-12 h-12 justify-center items-center flex self-end rounded-xl border-gray-400/50 border hover:shadow-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-60" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z" />
                    </svg>
                </button>
                <img :src="movie.poster" class="w-96 h-[500px] mr-8 mt-4 border-4  rounded-lg">
                <div class="flex flex-wrap mt-2">
                    <div v-for="(genre, index) in movie.genre.split(',')" :key="index" class="inline-flex">
                        <p class="bg-white text-blue-400 text-base font-bold border-2 bg-transparent p-1.5 mr-2 rounded-full">{{ genre }}</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col">
                <div>
                    <h2 class="text-5xl leading-normal  mb-4 font-bold text-white">
                        {{ movie.title }}
                    </h2>
                </div>

                <div>
                    <h2 class="border-b text-white text-lg font-bold p-1.5 mr-2">
                        Plot : <span class="font-light text-blue-400">{{ movie.plot }}</span>
                    </h2>
                </div>

                <div class="flex flex-wrap mt-8">
                    <div class="w-1/2">
                        <h2 class="border-b text-white text-lg font-bold p-1.5 mr-2">
                            Year : <span class="font-light text-blue-400">{{ movie.year }}</span>
                        </h2>
                    </div>
                    <div class="w-1/2">
                        <h2 class="border-b text-white text-lg font-bold p-1.5 mr-2">
                            Type : <span class="font-light text-blue-400 capitalize">{{ movie.type }}</span>
                        </h2>
                    </div>
                </div>

                <div class="flex flex-wrap mt-8 ">
                    <div class="w-1/2 ">
                        <h2 class=" border-b text-white text-lg font-bold p-1.5 mr-2">
                            Runtime : <span class="font-light text-blue-400">{{ movie.runtime }}</span>
                        </h2>
                    </div>
                    <div class="w-1/2">
                        <h2 class="border-b text-white text-lg font-bold p-1.5 mr-2">
                            Rating : <span class="font-light text-blue-400">{{ movie.rating }}</span>
                        </h2>
                    </div>
                </div>

                <div class="flex flex-wrap mt-8">
                    <div class="w-1/2">
                        <h2 class="border-b text-white text-lg font-bold p-1.5 mr-2">
                            IMDB Votes : <span class="font-light text-blue-400">{{ movie.imdbVote }}</span>
                        </h2>
                    </div>
                    <div v-if="movie.rated=='N/A'" class="w-1/2">
                        <h2 class="border-b text-white text-lg font-bold p-1.5 mr-2">
                            Rated : <span class="font-light text-blue-400">Doesn't exist</span>
                        </h2>
                    </div>
                    <div v-else class="w-1/2">
                        <h2 class="border-b text-white text-lg font-bold p-1.5 mr-2">
                            Rated : <span class="font-light text-blue-400">{{ movie.rated }}</span>
                        </h2>
                    </div>
                </div>

                <div class="flex flex-wrap mt-8">
                    <div class="w-1/2">
                        <h2 class="border-b text-white text-lg font-bold p-1.5 mr-2">
                            Director : <span class="font-light text-blue-400">{{ movie.director }}</span>
                        </h2>
                    </div>
                    <div class="w-1/2">
                        <h2 class="border-b text-white text-lg font-bold p-1.5 mr-2">
                            Writer : <span class="font-light text-blue-400">{{ movie.writer }}</span>
                        </h2>
                    </div>
                </div>

                <div class="flex flex-wrap mt-8 mb-24">
                    <div class="w-1/2">
                        <h2 class="border-b text-white text-lg font-bold p-1.5 mr-2">
                            Actor : <span class="font-light text-blue-400">{{ movie.actor }}</span>
                        </h2>
                    </div>
                    <div v-if="movie.award=='N/A'" class="w-1/2">
                        <h2 class="border-b text-white text-lg font-bold p-1.5 mr-2">
                            Award : <span class="font-light text-blue-400">Doesn't exist</span>
                        </h2>
                    </div>
                    <div v-else class="w-1/2">
                        <h2 class="border-b text-white text-lg font-bold p-1.5 mr-2">
                            Award : <span class="font-light text-blue-400">{{ movie.award }}</span>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref,onMounted} from 'vue';
import {getRoute, fetchData} from "@utils/helpers.js";
import { useAuthStore } from '@stores/authStore'

const { movie } = defineProps(['movie'])
const store = useAuthStore()

const addFavorite = (movie_id) => {
    if (!store.user) {
        window.location.href = getRoute('login')
        return
    }

    fetchData('favorites.store', {movie_id}).then(() => getFavouriteMovies())
}

let myMovies = ref([])
let movieIds = ref([])

const getFavouriteMovies = () => {
    if (store.isAuthenticate) {
        fetchData('favorites.index').then((data) => {
            myMovies.value = data.data
            movieIds.value = []
            myMovies.value.forEach(movie => movieIds.value.push(movie.movie_id))
        })
    }
}

const deleteFavorites = (id) => {
    fetchData('favorites.delete', {id}).then((data) => {
        getFavouriteMovies()
        })
}

onMounted(() => getFavouriteMovies())

</script>
