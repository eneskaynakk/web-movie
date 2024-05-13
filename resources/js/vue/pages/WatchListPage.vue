<template>
    <div>
       
    </div>
</template>

<script setup>
import { ref} from 'vue';
import {getRoute} from "@utils/helpers.js";


const currentUpcomingIndex = ref(0);

const { movies } = defineProps(['movies'])

const movie = getRoute('movie')

</script>
