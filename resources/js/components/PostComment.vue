<template>
    <div>
        <ul>
            <li v v-for="(comment, index) in comments" :key="index">
                <user-card :user="comment.user"></user-card>
                {{ comment.comment }}
            </li>
        </ul>
    </div>
</template>

<script setup>
    const props = defineProps(['comments'])
</script>

<style scoped>

</style>