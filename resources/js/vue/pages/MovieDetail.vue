<template>
    
    <div class="flex h-full w-full items-center justify-center bg-black bg-cover bg-no-repeat">

        <div class="bg-black bg-opacity-50 w-full h-full shadow-lg backdrop-blur-xl max-sm:px-8" >

            <div class="flex">
                <div class="flex">
                    <img :src="movie.poster" class="w-96 h-[500px] mt-48 mr-8">
                </div>
                <div class="flex flex-col mt-6">
                    <div v-for="(genre, index) in movie.genre.split(',').slice(0,index)" :key="index" class="mt-8 inline-flex">
                        <p class="bg-white text-black text-base font-semibold border-2 bg-transparent p-1.5 mr-2 rounded-full">{{ genre }}</p>
                    </div>
                    <div class="border-b mt-6 mb-4">
                        <h2 class="text-lg leading-normal mt-4 mb-4 font-bold text-white">
                            Plot : <span class="font-light text-blue-400"> {{ movie.title }} </span>
                        </h2>
                    </div>
                    <div class="border-b mb-4">
                        <h2 class="text-lg leading-normal mb-4 font-bold text-white">
                            Director : <span class="font-light text-blue-400"> {{ movie.year }} </span>
                        </h2>
                    </div>
                    <div class="border-b mb-4">
                        <h2 class="text-lg leading-normal mb-4 font-bold text-white">
                            Writer : <span class="font-light text-blue-400"> {{ movie.runtime }} </span>
                        </h2>
                    </div>
                    <div class="border-b mb-4">
                        <h2 class="text-lg leading-normal mb-4 font-bold text-white">
                            Actor : <span class="font-light text-blue-400"> {{ movie.rating }} </span>
                        </h2>
                    </div>
                    <div class="border-b mb-4">
                        <h2 class="text-lg leading-normal mb-4 font-bold text-white">
                            Award : <span class="font-light text-blue-400"> {{ movie.rated }} </span>
                        </h2>
                    </div>
                    <div class="border-b mb-4">
                        <h2 class="text-lg leading-normal mb-4 font-bold text-white">
                            Country : <span class="font-light text-blue-400"> {{ movie.type }} </span>
                        </h2>
                    </div>
                    <div class="border-b mb-4">
                        <h2 class="text-lg leading-normal mb-4 font-bold text-white">
                            IMDB Votes : <span class="font-light text-blue-400"> {{ movie.imdbVote }} </span>
                        </h2>
                    </div>

                    <div class="border-b mb-4">
                        <h2 class="text-lg leading-normal mt-4 mb-4 font-bold text-white">
                            Plot : <span class="font-light text-blue-400"> {{movie.plot}} </span>
                        </h2>
                    </div>

                    <div class="border-b mb-4">
                        <h2 class="text-lg leading-normal mb-4 font-bold text-white">
                            Director : <span class="font-light text-blue-400"> {{movie.director}} </span>
                        </h2>
                    </div>

                    <div class="border-b mb-4">
                        <h2 class="text-lg leading-normal mb-4 font-bold text-white">
                            Writer : <span class="font-light text-blue-400"> {{movie.writer}} </span>
                        </h2>
                    </div>

                    <div class="border-b mb-4">
                        <h2 class="text-lg leading-normal mb-4 font-bold text-white">
                            Actor : <span class="font-light text-blue-400"> {{movie.actor}} </span>
                        </h2>
                    </div>

                    <div class="border-b mb-4">
                        <h2 class="text-lg leading-normal mb-4 font-bold text-white">
                            Award : <span class="font-light text-blue-400"> {{movie.award}} </span>
                        </h2>
                    </div>

                    <div class="border-b mb-4">
                        <h2 class="text-lg leading-normal mb-4 font-bold text-white">
                            Country : <span class="font-light text-blue-400"> {{movie.country}} </span>
                        </h2>
                    </div>


                </div>
            </div>
        </div>
    </div>


</template>

<script setup>
const { movie } = defineProps(['movie'])

</script>
