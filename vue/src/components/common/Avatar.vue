<template>
    <img class="inline-block h-8 w-8 md:h-10 md:w-10 rounded-full ring-2 ring-white" :src="avatarImg"/>
</template>

<script setup>
defineProps({
    avatarImg: String
})
</script>

<style scoped>

</style>
