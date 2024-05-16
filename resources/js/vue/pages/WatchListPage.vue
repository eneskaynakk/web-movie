<template>
     <div class="text-center mx-auto mt-12">
        <h2 class="text-2xl leading-normal mb-2 font-bold text-white dark:text-gray-100">
             Film <span class="font-light">Listem</span>
        </h2>
        <svg class="inline" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 60" style="margin: 0 auto;height: 35px;" xml:space="preserve">
        <circle cx="50.1" cy="30.4" r="5" class="stroke-white" style="fill: transparent;stroke-width: 2;stroke-miterlimit: 10;"></circle>
        <line x1="55.1" y1="30.4" x2="150" y2="30.4" class="stroke-white" style="stroke-width: 2;stroke-miterlimit: 10;"></line>
        <line x1="45.1" y1="30.4" x2="0" y2="30.4" class="stroke-white " style="stroke-width: 2;stroke-miterlimit: 10;"></line>
        </svg>
    </div>
    <div class="carousel relative overflow-hidden mt-12 ">

        <div class="grid grid-cols-7 gap-4 py-4">
            <div v-for="(movieDetail) in myMovies" :key="movieDetail.id" class="relative carousel-item flex-shrink-0 flex flex-col items-center just mb-24" style="width:200px;" >
                <button @click="deleteFavorites(movieDetail.movie_id)"  class="left-0 top-0 absolute z-10 p-2 backdrop-blur-sm bg-gray-800/30 w-12 h-12 justify-center items-center flex self-end rounded-xl border-gray-400/50 border hover:shadow-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-60" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z" />
                    </svg>
                </button>
                <a :href="movie">
                    <div class="border-2 rounded-xl">
                        <img :src="movieDetail?.movie?.poster" alt="Carousel Image" class="w-56 h-72 opacity-100 hover:opacity-90 border-2 rounded-lg">
                    </div>
                </a>
                <div class="flex flex-col items-center justify-center ">
                    <a :href="movie" v-if="movieDetail?.movie?.title.substring()>movieDetail?.movie?.title.substring(0,21)" class="hover:underline text-gray-200 font-semibold text-base mt-3"> {{movieDetail?.movie?.title.substring(0,21)}}...</a>

                    <a :href="movie" v-else class="hover:underline text-white font-semibold text-base mt-3"> {{movieDetail?.movie?.title}}</a>

                    <p class="flex text-black text-sm bg-white px-2 py-1 font-bold rounded-full mt-3">
                        <svg class="w-5 h-5 mr-[3px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 1 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16M8 14h8m-4-7V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z"/>
                        </svg>

                        {{movieDetail?.movie?.year}}
                    </p>

                    <p class="flex rounded-full bg-white text-black font-bold border-2 p-1 mt-4 border-white">
                        <svg class="w-5 h-5 text-yellow-60 mr-[5px] dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 -1 24 24">
                        <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
                        </svg>
                        {{movieDetail?.movie?.rating}} / 10
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

const myMovies = ref([])
const { movies } = defineProps(['movies'])



const getFavouriteMovies = () => {
    fetchData('favorites.index').then((data) => {
        myMovies.value = data.data
        console.log(myMovies.value)
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
