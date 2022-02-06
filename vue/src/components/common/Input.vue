<template>
    <input
        v-model="inputModel"
        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-indigo-100"
        type="text"
        :placeholder="placeholder"
    />
</template>

<script setup>
import {onMounted, ref} from "vue";

defineProps({
    placeholder: String,
    value: String,
})

const inputModel = ref("")

onMounted(() => {
    inputModel.value = value;
})
</script>

<style scoped>

</style>
