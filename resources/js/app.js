import './bootstrap';
import Alpine from 'alpinejs';
import { createApp } from 'vue';
import FollowButton from './components/FollowButton.vue';
import LikeButton from './components/LikeButton.vue';

const app = createApp({});

app.component('FollowButton', FollowButton);
app.component('LikeButton',LikeButton)
app.mount('#app');

window.Alpine = Alpine;
Alpine.start();