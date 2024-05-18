<template>

    <div class="flex h-full w-full items-center justify-center bg-black bg-cover bg-no-repeat">

        <div class="bg-black bg-opacity-50 w-full h-full shadow-lg backdrop-blur-xl max-sm:px-8" >

            <div class="flex">

                <div class="mt-6 border-l-8 ">
                    <h1 class="ml-2 mb-2 text-white text-5xl">{{movie.title}}</h1>
                    <p class="ml-2 text-white flex items-center">
                        {{movie.year}} ' {{movie.rated}} '
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="text-white w-[18px] h-[18px] ml-[5px] mr-[5px] bi bi-stopwatch-fill" viewBox="0 1 16 16">
                            <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07A7.001 7.001 0 0 0 8 16a7 7 0 0 0 5.29-11.584l.013-.012.354-.354.353.354a.5.5 0 1 0 .707-.707l-1.414-1.415a.5.5 0 1 0-.707.707l.354.354-.354.354-.012.012A6.97 6.97 0 0 0 9 2.071V1h.5a.5.5 0 0 0 0-1zm2 5.6V9a.5.5 0 0 1-.5.5H4.5a.5.5 0 0 1 0-1h3V5.6a.5.5 0 1 1 1 0"/>
                        </svg>
                        {{movie.runtime}}
                    </p>
                </div>

                <div class="ml-auto mt-10 " style="display: flex;">
                    <div>
                        <p class="mb-2 mr-10 font-bold text-white">IMDb Rating</p>
                        <p class="text-white text-xl flex items-center ">
                            <svg class="w-5 h-5 text-yellow-60 mr-[5px] " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 2 24 24">
                                <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
                            </svg>
                            {{movie.rating}} / 10
                        </p>
                    </div>

                    <div class="border-l-4">
                        <p class="mb-2 mr-10 ml-10 font-bold text-white">IMDb Vote</p>
                        <p class="mr-6 ml-10 text-white text-xl flex items-center">
                            {{movie.imdbVote}}
                        </p>
                    </div>

                    <div class="border-l-4">
                        <p class="mb-2 mr-10 ml-10 font-bold text-white">Category</p>
                        <p class="mr-6 ml-10 text-white text-xl flex items-center">
                            {{movie.type}}
                        </p>
                    </div>

                </div>

            </div>

            <div class="flex justify-center items-center">
                <img :src="movie.poster" class="w-96 h-[500px] mt-16">
                <img :src="movie.poster" class="w-96 h-[500px] mt-16">

            </div>
            <div class="mt-8 inline-flex">
                <p v-if="movie.genre.split(',')[0]" class="bg-white text-black text-base font-semibold border-2 bg-transparent p-1.5 mr-2 rounded-full"> {{movie.genre.split(',')[0]}} </p>
                <p v-if="movie.genre.split(',')[1]" class="bg-white text-black text-base font-semibold border-2 bg-transparent p-1.5 mr-2 rounded-full"> {{movie.genre.split(',')[1]}} </p>
                <p v-if="movie.genre.split(',')[2]" class="bg-white text-black text-base font-semibold border-2 bg-transparent p-1.5 rounded-full"> {{movie.genre.split(',')[2]}} </p>
                <p v-if="movie.genre.split(',')[3]" class="bg-white text-black text-base font-semibold border-2 bg-transparent p-1.5 rounded-full"> {{movie.genre.split(',')[3]}} </p>
                <p v-if="movie.genre.split(',')[4]" class="bg-white text-black text-base font-semibold border-2 bg-transparent p-1.5 rounded-full"> {{movie.genre.split(',')[4]}} </p>
                <p v-if="movie.genre.split(',')[5]" class="bg-white text-black text-base font-semibold border-2 bg-transparent p-1.5 rounded-full"> {{movie.genre.split(',')[5]}} </p>
            </div>

            <div class="border-b border-t mt-6 mb-4">
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

            <div class="flex border-b mb-4">
                <h2 class="text-lg leading-normal mb-4 font-bold text-white">
                    Award : <span class="font-light text-blue-400"> {{movie.award}} </span>
                </h2>
            </div>

            <div class="flex border-b mb-4">
                <h2 class="text-lg leading-normal mb-4 font-bold text-white">
                    Country : <span class="font-light text-blue-400"> {{movie.country}} </span>
                </h2>
            </div>

        </div>

    </div>

</template>

<script setup>
const { movie } = defineProps(['movie'])
</script>
