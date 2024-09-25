import './bootstrap';
import Alpine from 'alpinejs';
import { createApp } from 'vue';
import FollowButton from './components/FollowButton.vue';
import LikeButton from './components/LikeButton.vue';
import CommentButton from './components/CommentButton.vue';
import PostComments from './components/PostComments.vue';
import UserCard from './components/UserCard.vue';
import SearchBar from './components/SearchBar.vue';
import SearchResult from './components/SearchResult.vue';
import PostCard from './components/PostCard.vue';
import PostComment from './components/PostComment.vue';
import 'vue-universal-modal/dist/index.css';
import VueUniversalModal from 'vue-universal-modal';
import TextArea from './components/TextArea.vue'

const app = createApp({});

app.component('FollowButton', FollowButton);
app.component('LikeButton',LikeButton)
app.component('CommentButton',CommentButton)
app.component('PostComments',PostComments)
app.component('PostComment',PostComment)
app.component('UserCard',UserCard)
app.component('SearchBar',SearchBar)
app.component('SearchResult',SearchResult)
app.component('PostCard',PostCard)
app.component('TextArea',TextArea)
app.use(VueUniversalModal, {
  teleportTarget: '#modals',
});
app.mount('#app');

window.Alpine = Alpine;
Alpine.start();