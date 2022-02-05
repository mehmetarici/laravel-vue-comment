<template>
    <div :class="'flex  '+ marginLeft">
        <Avatar
            avatar-img="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"/>

        <div class="pl-4">
            <span class="font-bold text-base text-slate-800">{{ writer }}</span>
            <p class="font-normal text-sm mt-1 text-gray-500">{{ comment }}</p>
            <button v-if="!lastNode" class="cursor-pointer py-0 bg-transparent text-sky-600 text-sm font-medium">
                Reply
            </button>
        </div>
    </div>
</template>

<script setup>
import {Avatar} from "../../components";

defineProps({
    writer: String,
    comment: String,
    marginLeft: String,
    lastNode: Boolean,
})
</script>

<style scoped>

</style>
