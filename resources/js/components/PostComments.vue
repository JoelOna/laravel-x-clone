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
    import axios from 'axios'
    import {ref,onMounted,watch} from 'vue'

    const props = defineProps({
        post_id: Number,
        action: Boolean
    })

    const comments = ref([])

    const getComments = async () => {
        try {
            const response = await axios.get(`/post/${props.post_id}/comments`)
            if (response.status == 200) {
                comments.value = response.data.data
                console.log(response.data.data);
            }
        } catch (error) {
            
        }
    } 
    watch(() => props.action, (newVal) => {
    if (newVal) {
        getComments() // Vuelve a cargar los comentarios cuando `action` cambie
    }
    })
    onMounted(() => {
        getComments()
    })
</script>

<style scoped>

</style>