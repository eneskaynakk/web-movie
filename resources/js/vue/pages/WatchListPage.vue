<template>
    <div class="carousel relative overflow-hidden mt-32">

        <div class="flex text-white text-2xl font-bold mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-7 h-7 mr-[3px] bi bi-fire" viewBox="0 0 16 16">
                <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16m0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15"/>
            </svg>
            Popüler Filmler
        </div>

        <div class="carousel-inner grid grid-cols-3 gap-4 transition-transform ease-in-out duration-500 " :style="{ 'transform': `translateX(-${0 * 200}px)` }">
            <div v-for="(movieDetail) in movies" :key="movieDetail.id" class="relative carousel-item flex-shrink-0 flex flex-col items-center justify-center" style="width:200px;" >
                <button @click="deleteFavorites(movieDetail.id)" class="left-0 top-0 absolute z-10 p-2 backdrop-blur-sm bg-gray-800/30 w-12 h-12 justify-center items-center flex self-end rounded-xl border-gray-400/50 border hover:shadow-xl">
                    <img src="https://cdn-icons-png.flaticon.com/512/3976/3976956.png" class="img-small w-8 h-8 filter-white">
                </button>
                <a :href="movie">
                    <div class="border-2 rounded-xl">
                        <img :src="movieDetail.poster" alt="Carousel Image" class="w-56 h-72 opacity-100 hover:opacity-90 border-2 rounded-lg">
                    </div>
                </a>
                <div class="flex flex-col items-center justify-center ">

                    <a :href="movie"  class="hover:underline text-white font-semibold text-base mt-3"> {{movieDetail.title}}</a>

                    <p class="flex text-black text-sm bg-white px-2 py-1 font-bold rounded-full mt-3">
                        <svg class="w-5 h-5 mr-[3px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 1 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16M8 14h8m-4-7V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z"/>
                        </svg>

                        {{movieDetail.year}}
                    </p>

                    <p class="flex rounded-full bg-white text-black font-bold border-2 p-1 mt-4 border-white">
                        <svg class="w-5 h-5 text-yellow-60 mr-[5px] dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 -1 24 24">
                        <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
                        </svg>
                        {{movieDetail.rating}} / 10
                    </p>

                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref} from 'vue';
import { fetchData,getRoute } from "@utils/helpers.js";

const movie = getRoute('movie')

const movies = ref([])

const getFavouriteMovies = () => {
    fetchData('favorites.index').then((data) => {
        movies.value = data.data
        console.log(movies.value)
    })
}

const deleteFavorites = (id) => {
    fetchData('favorites.delete', {id}).then((data) => {
        console.log('başarılı silme')
        getFavouriteMovies()
        })
}

onMounted(() => getFavouriteMovies())
</script>
