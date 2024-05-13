<template>

    <div class="flex h-full w-full items-center justify-center bg-black bg-cover bg-no-repeat">

        <div class="bg-black bg-opacity-50 w-full h-full shadow-lg backdrop-blur-xl max-sm:px-8">

            <div class="flex">

                <div class="pt-6">
                    <h1 class="pl-6 text-white">title</h1>
                    <pre><p class="pl-6 text-white">year ' reated ' runtime</p></pre>
                </div>

                <div class="ml-auto " style="display: flex;">
                    <div style="margin-right: 20px;">
                        <p class="pt-6 mb-2 mr-10 text-white">IMDb Rating</p>
                        <p class="text-white"> rating / 10</p>
                    </div>

                    <div>
                        <p class="pt-6 pr-6 mb-2 mr-10 text-white">Kategori</p>
                        <p class="pr-6 text-white"> type </p>
                    </div>

                    <div>
                        <p class="pt-6 pr-6 mb-2 text-white">Ödüller</p>
                        <p class="pr-6 text-white"> award </p>
                    </div>
                </div>

            </div>

            <div class="flex justify-center items-center">
                <img :src="imgUrl2" class="w-2/3 h-[500px] mt-16"> <!-- poster -->

            </div>
            <div class="mt-8 inline-flex">
                <p class="text-white text-base font-semibold border-2 bg-transparent p-1.5 mr-2 rounded-full"> genre </p>
                <p class="text-white text-base font-semibold border-2 bg-transparent p-1.5 mr-2 rounded-full"> genre </p>
                <p class="text-white text-base font-semibold border-2 bg-transparent p-1.5 rounded-full"> genre </p>
            </div>

            <div class="border-b mt-2 mb-2">
                <p class="mb-3 text-white break-words "> plotasdasdasdasdasdasdasdasdasplotasdasdasdasdasdasdasdasdasplotasdasdasdasdasdasdasdasdasplotasdasdasdasdasdasdasdasdasplotasdasdasdasdasdasdasdasdasplotasdasdasdasdasdasdasdasdasplotasdasdasdasdasdasdasdasdas </p>
            </div>

            <div class="border-b mb-2">
                <p class="mb-3 text-white break-words "> director </p>
            </div>

            <div class="border-b mb-2">
                <p class="mb-3 text-white break-words "> writer </p>
            </div>

            <div class="border-b mb-2">
                <p class="mb-3 text-white break-words "> actor </p>
            </div>

            <div class="flex border-b mb-2">
                <p class="mb-3 text-white  "> country </p>
            </div>

        </div>

    </div>

</template>

<script setup>

const imgUrl = new URL('@images/geyik2.jpg', import.meta.url).href
const imgUrl2 = new URL('@images/lifeofpi.jpg', import.meta.url).href

</script>
