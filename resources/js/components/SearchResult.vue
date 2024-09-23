<template>
    <div class="w-full text-center">
        <search-bar @search-results="updateInfo"></search-bar>
    </div>
    <div class="px-10">
        <h2 class="underline text-xl bold italic">
            Users
        </h2>
        <div v-for="user in filteredUsers" :key="user.id">
            <user-card :user_id="props.user_id" :user="user" :follow_button="true"></user-card>
        </div>
        <h2 class="underline text-xl bold italic mb-2">
            Posts
        </h2>
        <div v-for="post in filteredPosts" :key="post.id">
            <post-card :user_id="props.user_id" :post="post"></post-card>
        </div>
        <h2 class="underline text-xl bold italic">
            Comments
        </h2>
        <post-comment :comments="filteredComments"></post-comment>
    </div>

</template>

<script setup>
    import {ref} from 'vue'

    const props = defineProps(['users','posts','comments','user_id'])
    
    const filteredUsers = ref([...props.users])
    const filteredPosts = ref([...props.posts])
    const filteredComments = ref([...props.comments])


    const updateInfo = (data) => {
        filteredUsers.value = data.users
        filteredPosts.value = data.posts
        filteredComments.value = data.comments
    }
</script>

<style scoped>

</style>