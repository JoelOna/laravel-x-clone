<template>
    <post-comment :comments="comments"></post-comment>
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
            const response = await axios.get(`/comments/${props.post_id}`)
            if (response.status == 200) {
                comments.value = response.data.data
            }
        } catch (error) {
            
        }
    } 
    watch(() => props.action, (newVal) => {
        if (newVal) {
            getComments()
        }
    })

    onMounted(() => {
        getComments()
    })
</script>

<style scoped>

</style>