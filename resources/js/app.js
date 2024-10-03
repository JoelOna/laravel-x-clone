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
import TextArea from './components/TextArea.vue';
import 'flowbite';

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

    // On page load or when changing themes, best to add inline in `head` to avoid FOUC
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark')
    }

    var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

// Change the icons inside the button based on previous settings
if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    themeToggleLightIcon.classList.remove('hidden');
} else {
    themeToggleDarkIcon.classList.remove('hidden');
}

var themeToggleBtn = document.getElementById('theme-toggle');

themeToggleBtn.addEventListener('click', function() {

    // toggle icons inside button
    themeToggleDarkIcon.classList.toggle('hidden');
    themeToggleLightIcon.classList.toggle('hidden');

    // if set via local storage previously
    if (localStorage.getItem('color-theme')) {
        if (localStorage.getItem('color-theme') === 'light') {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        }

    // if NOT set via local storage previously
    } else {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        }
    }
    
});