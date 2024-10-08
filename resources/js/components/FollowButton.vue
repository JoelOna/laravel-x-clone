<template>
    <div>
        <button @click="handleCick" class="btn text-white bg-blue-400 px-6 py-1 rounded-2xl hover:bg-blue-500 hover:transition-all transition-all" >{{ message }}</button>
    </div>
</template>

<script setup>
    import axios from 'axios';
    import { ref,computed,onMounted } from 'vue';

    const props = defineProps(['user_id','follower_id'])

    const follower_id = parseInt(props.follower_id)
    let isFollowing = ref(false) 

    const followingRequest = async () => {
        try {
            const response = await axios.get(`/follow/${props.user_id}/${follower_id}`)
            if (response.status === 200) {
                isFollowing.value = response.data.isFollowing;
            }
        } catch (error) {
        }
    }

    const message = computed(() => isFollowing.value ? 'Following' : 'Follow');

    const handleCick = async () => {
        if (props.user_id > 0 && !isFollowing.value) {
            try {
                const response = await axios.post('/follow',{
                    user_id: props.user_id,
                    follower_id: follower_id
                });
                if (response.status === 200) {
                    isFollowing.value = true
                }
            } catch (error) {
                
            }
        }else{
            try {
                const response = await axios.post('/unfollow',{
                    user_id: props.user_id,
                    follower_id: follower_id
                });
                if (response.status === 200) {
                    isFollowing.value = false
                }
            } catch (error) {
                
            }
        }
    }
    onMounted(() => {
        followingRequest();
    });

</script>


<style scoped>

</style>
