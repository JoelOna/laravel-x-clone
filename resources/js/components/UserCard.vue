<template>
    <div>
        <section class="p-4 flex flex-row align-content-center">
            <img :src="[props.user.user_img]" alt="" class="h-12 w-12 rounded-full object-contain border-gray-700">
            <div class="flex flex-wrap">
                <div class="flex flex-col ml-4">
                    <label>{{props.user.name}}</label>
                    <a :href="href">
                        <small>@{{props.user.user_name_x}}</small>
                    </a>
                </div>
                <div class="mx-4 justify-center" v-if="props.follow_button">
                    <follow-button :user_id="props.user_id" :follower_id="props.user.id" class="content-center"/>
                </div>
            </div>
        </section>
    </div>
</template>

<script setup>
      const props = defineProps({
        user: Object,
        follow_button: Boolean,
        user_id: Number
    })
    const href = `/user/${props.user.user_name_x}`
</script>

<style scoped>

</style>