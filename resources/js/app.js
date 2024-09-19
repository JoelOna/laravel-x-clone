import './bootstrap';
import Alpine from 'alpinejs';
import { createApp } from 'vue';
import FollowButton from './components/FollowButton.vue';
import LikeButton from './components/LikeButton.vue';
import CommentButton from './components/CommentButton.vue';
import PostComments from './components/PostComments.vue';
import UserCard from './components/UserCard.vue';


const app = createApp({});

app.component('FollowButton', FollowButton);
app.component('LikeButton',LikeButton)
app.component('CommentButton',CommentButton)
app.component('PostComments',PostComments)
app.component('UserCard',UserCard)

app.mount('#app');

window.Alpine = Alpine;
Alpine.start();