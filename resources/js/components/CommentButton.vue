<template>
    <div @click="showComment" class="p-4">
        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-message-circle"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 20l1.3 -3.9c-2.324 -3.437 -1.426 -7.872 2.1 -10.374c3.526 -2.501 8.59 -2.296 11.845 .48c3.255 2.777 3.695 7.266 1.029 10.501c-2.666 3.235 -7.615 4.215 -11.574 2.293l-4.7 1" /></svg>
    </div>
    <div :class="[commentForm,'transition-all','hover:transition-all']">
        <textarea name="comment" v-model="comment"></textarea>
        <button @click="submmitComment">Submit</button>
        <post-comments v-if="commentForm === 'block'" :post_id="props.post_id" :action="updateAction"></post-comments>
    </div>
</template>

<script setup>
    import {ref} from 'vue'
    import axios from 'axios'

    const commentForm = ref('hidden')
    const comment = ref('What are you thinking about?');
    const props = defineProps({
        user_id: Number,
        post_id: Number,
    })
     
    const updateAction = ref(false)
    
    const showComment = () => {
        if (commentForm.value === 'hidden') {
            commentForm.value = 'block'
        }else{
            commentForm.value = 'hidden'
        }
        
    }

    const submmitComment = async () => {
        try {
                const response = await axios.post('/comment',{
                    user_id: props.user_id,
                    post_id: props.post_id,
                    comment: comment.value
                }); 
                    updateAction.value = !updateAction.value
            } catch (error) {
                
            }
    }
</script>

<style scoped>

</style>