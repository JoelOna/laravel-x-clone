<template>
    <div>
        <article class="border border-white mb-4">
            <section class="mt-4 p-4 flex flex-row align-content-center">
                <img :src="[props.post.user.user_img]" alt="" class="h-14 w-14">
                <div class="flex flex-col ml-4">
                    <label>{{props.post.user.name}}</label>
                    <small>@{{props.post.user.user_name_x}}</small>
                </div>
                <div class="ps-4">
                    <follow-button :user_id="props.user_id" :follower_id="props.follower_id"></follow-button>
                </div>
            </section>
            <p class="p-4">{{props.post.description}}</p>
            <section class="flex flex-wrap justify-center border-t">
                <div class="flex-1 border-r">
                    <like-button :user_id="props.user_id" :post="props.post"></like-button>
                </div>
                <div class="flex-1">
                    <comment-button :user_id="props.user_id" :post_id="props.post.id" />                
                </div>
            </section>
        </article>
    </div>
</template>

<script setup>
      const props = defineProps({
        post: Object,
        user_id: Number,
        follower_id:Number
    })
</script>

<style scoped>

</style>