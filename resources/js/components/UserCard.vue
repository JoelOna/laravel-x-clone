<template>
    <div>
        <section class="mt-4 p-4 flex flex-row align-content-center">
            <img :src="[props.user.user_img]" alt="" class="h-12 w-12 rounded-full object-contain border border-gray-700">
            <div class="flex flex-col ml-4">
                <label>{{props.user.name}}</label>
                <small>@ {{props.user.user_name_x}}</small>
            </div>
        </section>
    </div> 
</template>

<script setup>
      const props = defineProps({
        user: Object
    })
</script>

<style scoped>

</style>