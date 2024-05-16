<template>

    <div class="bg-white"></div>
    <div class="carousel-container relative">
        <div class="carousel-wrapper q-pa-md">
            <transition name="slide" mode="out-in">
                <img :src="currentImageUrl" class="carousel-image" alt="Carousel Image" />
            </transition>
        </div>
        <button @click="prevImage" class="prev-btn absolute top-1/2 left-4 transform -translate-y-1/2 opacity-100 hover:opacity-90 bg-white text-black px-4 py-2 rounded">
            <
        </button>
        <button @click="nextImage" class="next-btn absolute top-1/2 right-4 transform -translate-y-1/2 opacity-100 hover:opacity-90 bg-white text-black px-4 py-2 rounded">
            >
        </button>
    </div>


    <div class="carousel relative overflow-hidden mt-32">
        <div class="flex text-white text-2xl font-bold mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-7 h-7 mr-[3px] bi bi-fire" viewBox="0 0 16 16">
                <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16m0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15"/>
            </svg>
            Popüler Filmler
        </div>

        <div class="carousel-inner grid grid-cols-3 gap-4 py-4 transition-transform ease-in-out duration-500 " :style="{ 'transform': `translateX(-${currentPopularIndex * 200}px)` }">
            <div v-for="(movieDetail) in movies" :key="movieDetail.id" class="relative carousel-item flex-shrink-0 flex flex-col items-center justify-center" style="width:200px;" >
                <button @click="addFavorite(movieDetail.id)" v-if="!movieIds.includes(movieDetail.id)" class="left-0 top-0 absolute z-10 p-2 backdrop-blur-sm bg-gray-800/30 w-12 h-12 justify-center items-center flex self-end rounded-xl border-gray-400/50 border hover:shadow-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z" />
                        </svg>
                </button>
                <button @click="deleteFavorites(movieDetail.id)" v-else class="left-0 top-0 absolute z-10 p-2 backdrop-blur-sm bg-gray-800/30 w-12 h-12 justify-center items-center flex self-end rounded-xl border-gray-400/50 border hover:shadow-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-60" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z" />
                    </svg>
                </button>
                <a :href="movie">
                    <div class="border-2 rounded-xl">
                        <img :src="movieDetail.poster" alt="Carousel Image" class="w-56 h-72 opacity-100 hover:opacity-90 border-2 rounded-lg">
                    </div>
                </a>
                <div class="flex flex-col items-center justify-center ">

                    <a :href="movie" v-if="movieDetail.title.substring()>movieDetail.title.substring(0,21)" class="hover:underline text-gray-200 font-semibold text-base mt-3"> {{movieDetail.title.substring(0,21)}}...</a>

                    <a :href="movie" v-else class="hover:underline text-white font-semibold text-base mt-3"> {{movieDetail.title}}</a>

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
    <button class="prev absolute top-[1100px] left-32 text-black  transform -translate-y-1/2 rounded-lg  opacity-100 hover:opacity-90" @click="prevPopularItem">
        <svg xmlns="http://www.w3.org/2000/svg" class=" w-12 h-12" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="arcs"><path d="M15 18l-6-6 6-6"/></svg>
    </button>

    <button class="next absolute top-[1100px] right-32 text-black transform -translate-y-1/2 rounded-lg  opacity-100 hover:opacity-90" @click="nextPopularItem">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="arcs"><path d="M9 18l6-6-6-6"/></svg>
    </button>





    <div class="carousel relative overflow-hidden mt-32">

        <div class="flex text-white text-2xl font-bold mb-6 ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-7 h-7 mr-[3px] bi bi-award-fill" viewBox="0 0 16 16">
                <path d="m8 0 1.669.864 1.858.282.842 1.68 1.337 1.32L13.4 6l.306 1.854-1.337 1.32-.842 1.68-1.858.282L8 12l-1.669-.864-1.858-.282-.842-1.68-1.337-1.32L2.6 6l-.306-1.854 1.337-1.32.842-1.68L6.331.864z"/>
                <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1z"/>
            </svg>
            En Çok Oy Alan Filmler
        </div>

        <div class="carousel-inner grid grid-cols-3 gap-4 transition-transform ease-in-out duration-500 " :style="{ 'transform': `translateX(-${currentTopIndex * 200}px)` }">
            <div v-for="(movieDetail, index) in movies.slice(0,19)" :key="index" class="carousel-item flex-shrink-0 flex flex-col items-center justify-center py-4" style="width:200px;" >
                <a :href="movie" class="relative">
                    <a :href="watch" class="left-0 top-0 absolute z-10 p-2 backdrop-blur-sm bg-gray-800/30 w-12 h-12 justify-center items-center flex self-end rounded-xl border-gray-400/50 border hover:shadow-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z" />
                        </svg>
                    </a>
                    <div class="border-2 rounded-xl">
                        <img :src="movieDetail.poster" alt="Carousel Image" class="w-56 h-72 opacity-100 hover:opacity-90 border-2 rounded-lg">
                    </div>
                </a>
                <div class="flex flex-col items-center justify-center ">

                    <a :href="movie" v-if="movieDetail.title.substring()>movieDetail.title.substring(0,21)" class="hover:underline text-gray-200 font-semibold text-base mt-3"> {{movieDetail.title.substring(0,21)}}...</a>

                    <a :href="movie" v-else class="hover:underline text-white font-semibold text-base mt-3"> {{movieDetail.title}}</a>

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
    <button class="prev absolute top-[1730px] left-32 text-black  transform -translate-y-1/2 rounded-lg  opacity-100 hover:opacity-90" @click="prevTopItem">
    <svg xmlns="http://www.w3.org/2000/svg" class=" w-12 h-12" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="arcs"><path d="M15 18l-6-6 6-6"/></svg>
    </button>

    <button class="next absolute top-[1730px] right-32 text-black transform -translate-y-1/2 rounded-lg  opacity-100 hover:opacity-90" @click="nextTopItem">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="arcs"><path d="M9 18l6-6-6-6"/></svg>
    </button>


    <div class="w-full bg-black border-4 border-white rounded-3xl md:py-8 md:px-8 px-5 py-4 mt-24">
        <div class="flex flex-wrap items-center md:flex-row flex-col-reverse">
            <div class="md:w-2/3 w-full pb-6 md:pb-0 md:pr-6 flex-col md:block flex items-center justify-center md:pt-0 pt-4">
                <div>
                    <h1 role="heading" class="text-xl md:text-2xl lg:text-4xl xl:text-4xl lg:w-10/12 text-white font-black leading-6 lg:leading-10 md:text-left text-center">Sen de Discord kanalımıza katılıp bizden biri olmaya ne dersin ?</h1>
                </div>
                <div class="flex">
                    <a href="/">
                        <button class="flex mt-6 justify-center items-center rounded-lg text-black text-2xl font-bold border-2 p-4 border-white bg-white opacity-100 hover:opacity-90">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-8 h-8 mr-[10px] bi bi-discord" viewBox="0 0 16 16">
                                <path d="M13.545 2.907a13.2 13.2 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.2 12.2 0 0 0-3.658 0 8 8 0 0 0-.412-.833.05.05 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.04.04 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032q.003.022.021.037a13.3 13.3 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019q.463-.63.818-1.329a.05.05 0 0 0-.01-.059l-.018-.011a9 9 0 0 1-1.248-.595.05.05 0 0 1-.02-.066l.015-.019q.127-.095.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.05.05 0 0 1 .053.007q.121.1.248.195a.05.05 0 0 1-.004.085 8 8 0 0 1-1.249.594.05.05 0 0 0-.03.03.05.05 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.2 13.2 0 0 0 4.001-2.02.05.05 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.03.03 0 0 0-.02-.019m-8.198 7.307c-.789 0-1.438-.724-1.438-1.612s.637-1.613 1.438-1.613c.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612m5.316 0c-.788 0-1.438-.724-1.438-1.612s.637-1.613 1.438-1.613c.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612"/>
                            </svg>
                            Hemen Katıl
                        </button>
                    </a>
                </div>
            </div>
            <div class="md:w-96 w-2/3">
                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/CTA.png" >
            </div>
        </div>
    </div>


    <div class="carousel relative overflow-hidden mt-32">

        <div class="flex text-white text-2xl font-bold mb-6">
            <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="w-7 h-7 mr-[3px] bi bi-hourglass-split" viewBox="0 -1 16 16">
                <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
            </svg>

            Yaklaşan Filmler
        </div>

        <div class="carousel-inner grid grid-cols-3 gap-4 transition-transform ease-in-out duration-500 " :style="{ 'transform': `translateX(-${currentUpcomingIndex * 200}px)` }">
            <div v-for="(movieDetail, index) in movies.slice(0,19)" :key="index" class="carousel-item flex-shrink-0 flex flex-col items-center justify-center py-4" style="width:200px;" >
                <a :href="movie" class="relative">
                    <a :href="watch" class="left-0 top-0 absolute z-10 p-2 backdrop-blur-sm bg-gray-800/30 w-12 h-12 justify-center items-center flex self-end rounded-xl border-gray-400/50 border hover:shadow-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z" />
                        </svg>
                    </a>
                    <div class="border-2 rounded-xl">
                        <img :src="movieDetail.poster" alt="Carousel Image" class="w-56 h-72 opacity-100 hover:opacity-90 border-2 rounded-lg">
                    </div>
                </a>
                <div class="flex flex-col items-center justify-center ">

                    <a :href="movie" v-if="movieDetail.title.substring()>movieDetail.title.substring(0,21)" class="hover:underline text-gray-200 font-semibold text-base mt-3"> {{movieDetail.title.substring(0,21)}}...</a>

                    <a :href="movie" v-else class="hover:underline text-white font-semibold text-base mt-3"> {{movieDetail.title}}</a>

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
    <button class="prev absolute top-[2920px] left-32 text-black  transform -translate-y-1/2 rounded-lg  opacity-100 hover:opacity-90" @click="prevUpcomingItem">
    <svg xmlns="http://www.w3.org/2000/svg" class=" w-12 h-12" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="arcs"><path d="M15 18l-6-6 6-6"/></svg>
    </button>

    <button class="next absolute top-[2920px] right-32 text-black transform -translate-y-1/2 rounded-lg  opacity-100 hover:opacity-90" @click="nextUpcomingItem">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="arcs"><path d="M9 18l6-6-6-6"/></svg>
    </button>

    <div class="carousel relative overflow-hidden mt-32 mb-32">

        <div class="flex text-white text-2xl font-bold mb-6 ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-7 h-7 mr-[7px] bi bi-person-video2" viewBox="0 -1 16 16">
                <path d="M10 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                <path d="M2 1a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zM1 3a1 1 0 0 1 1-1h2v2H1zm4 10V2h9a1 1 0 0 1 1 1v9c0 .285-.12.543-.31.725C14.15 11.494 12.822 10 10 10c-3.037 0-4.345 1.73-4.798 3zm-4-2h3v2H2a1 1 0 0 1-1-1zm3-1H1V8h3zm0-3H1V5h3z"/>
            </svg>
            Popüler Aktörler - Yapımcılar
        </div>

        <div class="carousel-inner grid grid-cols-3 gap-4 transition-transform ease-in-out duration-500 " :style="{ 'transform': `translateX(-${currentActorIndex * 200}px)` }">
            <div v-for="(movieDetail, index) in movies.slice(0,19)" :key="index" class="carousel-item flex-shrink-0 flex flex-col items-center justify-center py-4" style="width:200px;" >
                <div class="relative">
                    <div >
                        <img :src="movieDetail.poster" alt="Carousel Image" class="w-48 h-48 border-4 rounded-full">
                    </div>
                </div>
                <div class="flex flex-col items-center justify-center ">

                    <div v-if="movieDetail.title.substring()>movieDetail.title.substring(0,21)" class=" text-gray-200 font-semibold text-base mt-3"> {{movieDetail.title.substring(0,21)}}...</div>

                    <div v-else class="text-white font-semibold text-base mt-3"> {{movieDetail.title}}</div>

                    <p class="flex text-black text-sm bg-white px-2 py-1 font-bold rounded-full mt-3">
                        <svg class="w-5 h-5 mr-[3px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 1 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16M8 14h8m-4-7V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z"/>
                        </svg>

                        {{movieDetail.year}}
                    </p>

                </div>
            </div>
        </div>
    </div>
    <button class="prev absolute top-[3510px] left-32 text-black  transform -translate-y-1/2 rounded-lg  opacity-100 hover:opacity-90" @click="prevActorItem">
    <svg xmlns="http://www.w3.org/2000/svg" class=" w-12 h-12" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="arcs"><path d="M15 18l-6-6 6-6"/></svg>
    </button>

    <button class="next absolute top-[3510px] right-32 text-black transform -translate-y-1/2 rounded-lg  opacity-100 hover:opacity-90" @click="nextActorItem">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="arcs"><path d="M9 18l6-6-6-6"/></svg>
    </button>


    <div class="container flex flex-col mx-auto bg-black" id="iletisim">
        <div class="w-full draggable">
            <div class="container flex flex-col items-center gap-8 mx-auto ">
                <div class="grid w-full grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                    <div class="flex flex-col items-center gap-3 px-6 py-8 bg-white rounded-3xl shadow-main">
                    <span>
                        <img src="https://cdn-icons-png.freepik.com/512/2814/2814934.png" class="max-h-16">
                    </span>
                        <p class="text-lg font-bold text-dark-grey-900">E-posta</p>
                        <p class="text-base leading-6 text-dark-grey-600">Bize bu adresten ulaşın</p>
                        <p class="text-base font-semibold text-purple-blue-500">iaminfo@gmail.com</p>
                    </div>
                    <div ref="iletisimDiv" class="flex flex-col items-center gap-3 px-6 py-8 bg-white rounded-3xl shadow-main">
                    <span>
                        <img src="https://www.creativefabrica.com/wp-content/uploads/2018/11/Earphone-icon-vector-by-rudezstudio-580x386.jpg" class="max-h-16">
                    </span>
                        <p class="text-lg font-bold text-dark-grey-900">Telefon</p>
                        <p class="text-base leading-6 text-dark-grey-600">Bize telefonla ulaşın</p>
                        <p class="text-base font-semibold text-purple-blue-500">+551-551-5515</p>
                    </div>
                    <div class="flex flex-col items-center gap-3 px-6 py-8 bg-white rounded-3xl shadow-main">
                    <span>
                        <img src="https://i.pinimg.com/originals/87/ee/a5/87eea5f5db0b138dc45dfb403570df6f.png" class="max-h-16">
                    </span>
                        <p class="text-lg font-bold text-dark-grey-900">Konum</p>
                        <p class="text-base leading-6 text-dark-grey-600">Bizi ofisimizde bulun</p>
                        <a class="text-base font-semibold text-purple-blue-500" target="_blank" href="/">7.Albert Sokağı</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script setup>
import { ref, reactive, onMounted, onUnmounted} from 'vue';
import {getRoute, fetchData} from "@utils/helpers.js";
import { useAuthStore } from '@stores/authStore'


//Database veri çekme işlemi
const { movies } = defineProps(['movies'])
//


const movie = getRoute('movie')
const watch = getRoute('watch')

//Mega Movie Image Slider
const megaImgUrl1 = new URL('@images/thegodfather.jpg', import.meta.url).href;
const megaImgUrl2 = new URL('@images/yesilyol.jpg', import.meta.url).href;
const megaImgUrl3 = new URL('@images/lifeofpi.jpg', import.meta.url).href;

const images = ref([megaImgUrl1, megaImgUrl2, megaImgUrl3]);
const currentImageIndex = ref(0);
const currentImageUrl = ref(images.value[currentImageIndex.value]);

const nextImage = () => {
    currentImageIndex.value = (currentImageIndex.value + 1) % images.value.length;
    currentImageUrl.value = images.value[currentImageIndex.value];
};
const prevImage = () => {
    currentImageIndex.value = (currentImageIndex.value - 1 + images.value.length) % images.value.length;
    currentImageUrl.value = images.value[currentImageIndex.value];
};
let interval;
const startInterval = () => {
    interval = setInterval(nextImage, 5000);
};
const stopInterval = () => {
    clearInterval(interval);
};

onMounted(() => {
    startInterval();
});

onUnmounted(() => {
    stopInterval();
});

//Popular Movie Image Slider
const currentPopularIndex = ref(0);

const prevPopularItem = () => {
    if (currentPopularIndex.value > 0) {
        currentPopularIndex.value--;
    }
};
const nextPopularItem = () => {
    if (currentPopularIndex.value < 13) {
        currentPopularIndex.value++;
    } else {
        currentPopularIndex.value = 0;
    }
};


//Top Rated Movie Image Slider
const currentTopIndex = ref(0);

const prevTopItem = () => {
    if (currentTopIndex.value > 0) {
        currentTopIndex.value--;
    }
};
const nextTopItem = () => {
    if (currentTopIndex.value < 13) {
        currentTopIndex.value++;
    } else {
        currentIndex.value = 0;
    }
};

//Upcoming Movie Image Slider
const currentUpcomingIndex = ref(0);

const prevUpcomingItem = () => {
    if (currentUpcomingIndex.value > 0) {
        currentUpcomingIndex.value--;
    }
};
const nextUpcomingItem = () => {
    if (currentUpcomingIndex.value < 13) {
        currentUpcomingIndex.value++;
    } else {
        currentUpcomingIndex.value = 0;
    }
};

//Popular Actor-Producer Movie Image Slider
const currentActorIndex = ref(0);

const prevActorItem = () => {
    if (currentActorIndex.value > 0) {
        currentActorIndex.value--;
    }
};
const nextActorItem = () => {
    if (currentActorIndex.value < 13) {
        currentActorIndex.value++;
    } else {
        currentActorIndex.value = 0;
    }
};

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
        console.log('başarılı silme')
        getFavouriteMovies()
        })
}

onMounted(() => getFavouriteMovies())

</script>
