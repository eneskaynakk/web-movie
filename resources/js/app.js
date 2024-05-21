import './bootstrap';
import { createPinia } from 'pinia';
import piniaPluginPersistedstate from 'pinia-plugin-persistedstate'
import { createApp } from 'vue';
import AppLayout from '$vue/layout/AppLayout.vue';
import AcountLayout from '$vue/layout/AcountLayout.vue';

import HomePage from '$vue/pages/HomePage.vue';
import WatchList from '$vue/pages/WatchList.vue';
import AboutUs from '$vue/pages/AboutUs.vue';
import TeamStaff from '$vue/pages/TeamStaff.vue';
import RegisterForm from '$vue/pages/RegisterForm.vue';
import LoginForm from '$vue/pages/LoginForm.vue';
import MovieDetail from '$vue/pages/MovieDetail.vue';



const pinia = createPinia();
pinia.use(piniaPluginPersistedstate)

createApp()
.component('AppLayout', AppLayout)
.component('AcountLayout', AcountLayout)
.component('HomePage', HomePage)
.component('WatchList', WatchList)
.component('AboutUs', AboutUs)
.component('TeamStaff', TeamStaff)
.component('RegisterForm', RegisterForm)
.component('LoginForm', LoginForm)
.component('MovieDetail', MovieDetail)
.use(pinia)
.mount('#app')
