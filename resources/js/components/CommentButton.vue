<template> 
      <div :data-modal-target="'modal-' + props.post_id" :data-modal-toggle="'modal-' + props.post_id" class="p-4 flex flex-wrap gap-1">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-message-circle">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <path d="M3 20l1.3 -3.9c-2.324 -3.437 -1.426 -7.872 2.1 -10.374c3.526 -2.501 8.59 -2.296 11.845 .48c3.255 2.777 3.695 7.266 1.029 10.501c-2.666 3.235 -7.615 4.215 -11.574 2.293l-4.7 1" />
        </svg>
        {{ totalComments }}
      </div>
    
      <!-- Modal -->
      <div :id="'modal-' + props.post_id" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-4xl max-h-full">
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <div class="text-red-700">
                    {{ errorMessage }}
                 </div>
              <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" :data-modal-hide="'modal-' + props.post_id">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
              </button>
            </div>
            <!-- Modal body -->
            <div class="transition-all hover:transition-all m-4">
              <text-area :name="'comment'" v-model="comment"></text-area>
              <post-comments :post_id="props.post_id" :action="updateAction"></post-comments>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
              <button @click="submmitComment" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </div>
          </div>
        </div>
      </div>

</template>

<script setup>
    import {ref,onMounted} from 'vue'
    import axios from 'axios'

    const comment = ref('What are you thinking about?');
    const props = defineProps({
        user_id: Number,
        post_id: Number,
    })

    const updateAction = ref(false)
    const errorMessage = ref('')
    const submmitComment = async () => {
        try {
                const response = await axios.post('/comment',{
                    user_id: props.user_id,
                    post_id: props.post_id,
                    comment: comment.value
                }); 
                if (response.status === 200) {
                    totalCommentsRequest()
                }
                console.log(response.message);
                
                    updateAction.value = !updateAction.value
            } catch (error) {
                errorMessage.value = error.response.data.message
            }
    }
    const totalComments = ref(0)

    const totalCommentsRequest = async ()=> {
        try{
            const response  = await axios.get(`/comments/${props.post_id}/total`)
            if (response.status === 200) {
                totalComments.value = response.data
            }
        }catch(error){

        }
    }

    onMounted(() => {
        totalCommentsRequest()
    })

</script>

<style scoped>

</style>