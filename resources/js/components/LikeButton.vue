<template>
    <div @click="handleCick">
        <svg  v-if="hasLiked" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-heart"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6.979 3.074a6 6 0 0 1 4.988 1.425l.037 .033l.034 -.03a6 6 0 0 1 4.733 -1.44l.246 .036a6 6 0 0 1 3.364 10.008l-.18 .185l-.048 .041l-7.45 7.379a1 1 0 0 1 -1.313 .082l-.094 -.082l-7.493 -7.422a6 6 0 0 1 3.176 -10.215z" /></svg>
        <svg  v-else xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-heart"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>    
        {{likes}}
    </div>
</template>

<script setup>
    import axios from 'axios';
    import { ref,computed,onMounted } from 'vue';

    const props = defineProps({
        user_id: Number,
        post: Object,
        likes: Number
    })

    let hasLike = ref(false)
    let likes = ref(0)
    const likeRequest = async () => {
        try {
            const response = await axios.get(`/like/${props.user_id}/${props.post.id}`)
            const response_total = await axios.get(`/likes/${props.post.id}`)
            if (response.status === 200) {
                hasLike.value = response.data.hasLike;
            }
          
        } catch (error) {
        }
    }
    const hasLiked = computed(() => hasLike.value);

    const handleCick = async () => {
        if (props.user_id > 0 && !hasLike.value) {
            try {
                const response = await axios.post('/like',{
                    user_id: props.user_id,
                    post_id: props.post.id
                });
                if (response.status === 200) {
                    const response_total = await axios.get(`/likes/${props.post.id}`)
                    if (response_total.status === 200) {
                        likes.value = response_total.data.likes
                    }
                    hasLike.value = true
                }
            } catch (error) {
                
            }
        }else{
            try {
                const response = await axios.post('/unlike',{
                    user_id: props.user_id,
                    post_id: props.post.id
                });
                if (response.status === 200) {
                    const response_total = await axios.get(`/likes/${props.post.id}`)
                    if (response_total.status === 200) {
                        likes.value = response_total.data.likes
                    }
                    hasLike.value = false
                }
            } catch (error) {
                
            }
        }
    }
    onMounted(() => {
        likeRequest();
    });

</script>

<style scoped>

</style>