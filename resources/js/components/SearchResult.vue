<template>
    <div class="w-full text-center">
      <search-bar @search-results="updateInfo"></search-bar>
    </div>
    
    <div v-if="props.chat" class="mt-4">
      <ul>
        <li
          v-for="user in filteredUsers"
          :key="user.id"
          class="w-full p-4 rounded hover:bg-gray-200 dark:hover:bg-gray-700 group cursor-pointer"
          @click="$emit('select-chat', user)">
          <div class="flex items-center gap-4">
            <img :src="user.user_img" alt="" class="w-10 h-10 rounded-full" />
            <span class="text-gray-800 dark:text-gray-200">{{ user.name }}</span>
          </div>
        </li>
      </ul>
    </div>
    <div class="px-10" v-else>
        <h2 class="underline text-xl bold italic">Users</h2>
        <div v-for="user in filteredUsers" :key="user.id">
          <user-card :user_id="props.user_id" :user="user" :follow_button="true"></user-card>
        </div>
    
        <h2 class="underline text-xl bold italic mb-2">Posts</h2>
        <div v-for="post in filteredPosts" :key="post.id">
          <post-card :user_id="props.user_id" :post="post"></post-card>
        </div>
    
        <h2 class="underline text-xl bold italic">Comments</h2>
        <post-comment :comments="filteredComments"></post-comment>
      </div>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  
  const props = defineProps({
    users: Array,
    posts: Array,
    comments: Array,
    user_id: [String, Number],
    chat: Number
  })
  
  const filteredUsers = ref([...props.users])
  const filteredPosts = ref(() => props.posts ? [...props.posts] : [])
  const filteredComments = ref(() => props.comments ? [...props.comments] : [])
  
  const updateInfo = (data) => {
    filteredUsers.value = data.users || []
    if (data.posts) {
      filteredPosts.value = data.posts
    }
    if (data.comments) {
      filteredComments.value = data.comments
    }
  }
  </script>
  