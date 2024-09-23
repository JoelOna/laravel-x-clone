<template>
    <div>
        <textarea v-model="search" @keyup="searchRequest"></textarea>
    </div>
</template>

<script setup>
    import {ref} from 'vue'
    import axios from 'axios'
    const search = ref('')
    const emit = defineEmits(['search-results'])

    const searchRequest = async () =>{
        try {
            const response = await axios.get(`search/${search.value}`)
            if (response.status === 200) {
                emit('search-results', response.data)
            }  
        } catch (error) {
            
        }
        
    }
</script>

<style scoped>

</style>