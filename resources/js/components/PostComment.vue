<template>
    <div>
        <ul>
            <li v-for="(comment, index) in comments" :key="index" class="border mt-4 p-2">
                <user-card v-if="comment.user || user" :user="comment.user ?? user"></user-card>
                <div class="mx-4">
                    {{ comment.comment }}
                </div>
            </li>
        </ul>
    </div>
</template>

<script setup>
    const props = defineProps({
        comments: Array,
        user: Object
    })
</script>


<style scoped>

</style>