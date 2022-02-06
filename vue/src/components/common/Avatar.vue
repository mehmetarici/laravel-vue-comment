<template>
    <img class="inline-block h-10 w-10 rounded-full ring-2 ring-white" :src="avatarImg"/>
</template>

<script setup>
defineProps({
    avatarImg: String
})
</script>

<style scoped>

</style>
