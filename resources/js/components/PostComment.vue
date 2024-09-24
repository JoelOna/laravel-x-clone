<template>
    <div>
        <ul>
            <li v v-for="(comment, index) in comments" :key="index">
                <user-card :user="comment.user ?? props.user"></user-card>
                {{ comment.comment }}
            </li>
        </ul>
    </div>
</template>

<script setup>
    const props = defineProps(['comments','user'])
</script>

<style scoped>

</style>