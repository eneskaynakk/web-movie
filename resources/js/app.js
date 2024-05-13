import './bootstrap';
import { createPinia } from 'pinia';
import piniaPluginPersistedstate from 'pinia-plugin-persistedstate'
import { createApp } from 'vue';

import AppLayout from '$vue/layout/AppLayout.vue';
import RelogLayout from '$vue/layout/RelogLayout.vue';

import HomePage from '$vue/pages/HomePage.vue';
import AboutPage from '$vue/pages/AboutPage.vue';
import WatchListPage from '$vue/pages/WatchListPage.vue';
import TeamPage from '$vue/pages/TeamPage.vue';
import MoviePage from '$vue/pages/MoviePage.vue';
import LoginPage from '$vue/pages/LoginPage.vue';
import RegisterPage from '$vue/pages/RegisterPage.vue';

const pinia = createPinia();
pinia.use(piniaPluginPersistedstate)

createApp()
.component('AppLayout', AppLayout)
.component('HomePage', HomePage)
.component('WatchListPage', WatchListPage)
.component('AboutPage', AboutPage)
.component('TeamPage', TeamPage)
.component('MoviePage', MoviePage)
.component('LoginPage', LoginPage)
.component('RegisterPage', RegisterPage)
.component('RelogLayout', RelogLayout)
.use(pinia)
.mount('#app')
