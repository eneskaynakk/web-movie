<template>

    <div class="flex h-full w-full items-center justify-center bg-black bg-cover bg-no-repeat">

        <div class="bg-black bg-opacity-50 w-full h-full shadow-lg backdrop-blur-xl max-sm:px-8" >

            <div class="flex">

                <div class="pt-6">
                    <h1 class="pl-6 mb-2 text-white">{{movie.title}}</h1>
                    <pre><p class="pl-6 text-white">{{movie.year}} ' {{movie.rated}} ' {{movie.runtime}}</p></pre>
                </div>

                <div class="ml-auto " style="display: flex;">
                    <div style="margin-right: 20px;">
                        <p class="pt-6 mb-2 mr-10 text-white">IMDb Rating</p>
                        <p class="text-white"> {{movie.rating}} / 10</p>
                    </div>

                    <div>
                        <p class="pt-6 pr-6 mb-2 mr-10 text-white">Kategori</p>
                        <p class="pr-6 text-white"> {{movie.type}} </p>
                    </div>

                    <div>
                        <p class="pt-6 pr-6 mb-2 text-white">Ödüller</p>
                        <p class="pr-6 text-white"> {{movie.award}} </p>
                    </div>
                </div>

            </div>

            <div class="flex justify-center items-center">
                <img :src="movie.poster" class="w-2/3 h-[500px] mt-16">

            </div>
            <div class="mt-8 inline-flex">
                <p v-if="movie.genre.split(',')[0]" class="bg-white text-black text-base font-semibold border-2 bg-transparent p-1.5 mr-2 rounded-full"> {{movie.genre.split(',')[0]}} </p>
                <p v-if="movie.genre.split(',')[1]" class="bg-white text-black text-base font-semibold border-2 bg-transparent p-1.5 mr-2 rounded-full"> {{movie.genre.split(',')[1]}} </p>
                <p v-if="movie.genre.split(',')[2]" class="bg-white text-black text-base font-semibold border-2 bg-transparent p-1.5 rounded-full"> {{movie.genre.split(',')[2]}} </p>
                <p v-if="movie.genre.split(',')[3]" class="bg-white text-black text-base font-semibold border-2 bg-transparent p-1.5 rounded-full"> {{movie.genre.split(',')[3]}} </p>
                <p v-if="movie.genre.split(',')[4]" class="bg-white text-black text-base font-semibold border-2 bg-transparent p-1.5 rounded-full"> {{movie.genre.split(',')[4]}} </p>
                <p v-if="movie.genre.split(',')[5]" class="bg-white text-black text-base font-semibold border-2 bg-transparent p-1.5 rounded-full"> {{movie.genre.split(',')[5]}} </p>
            </div>

            <div class="border-b mt-2 mb-2">
                <p class="mb-3 text-white break-words "> {{movie.plot}} </p>
            </div>

            <div class="border-b mb-2">
                <p class="mb-3 text-white break-words "> director: {{movie.director}}</p>
            </div>

            <div class="border-b mb-2">
                <p class="mb-3 text-white break-words "> writer: {{movie.writer}} </p>
            </div>

            <div class="border-b mb-2">
                <p class="mb-3 text-white break-words "> actor: {{movie.actor}} </p>
            </div>

            <div class="flex border-b mb-2">
                <p class="mb-3 text-white  "> country: {{movie.country}} </p>
            </div>

        </div>

    </div>

</template>

<script setup>
const { movie } = defineProps(['movie'])
</script>
