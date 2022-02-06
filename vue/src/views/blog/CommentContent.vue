<template>
    <div class="flex mb-3 :=md:mb-6">
        <Avatar
            avatar-img="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"/>

        <div class="pl-2 md:pl-4 w-full">
            <div class="flex justify-between w-full">
                <span class="font-bold text-[12px] md:text-base text-slate-800">{{ comment.username }}</span>
                <span class="font-normal text-[12px] hidden md:block text-gray-400">{{ createdAt }}</span>
            </div>
            <p class="font-normal w-full break-words text-[10px] md:text-sm mt-1 text-gray-500">{{ comment.body }}</p>
            <button @click="toggleReplyInput" v-if="!replyActive && !lastNode" class="cursor-pointer py-0 bg-transparent text-sky-600 text-xs font-medium">
                Reply
            </button>
            <InputGroup
                :parentId="comment.id"
                :toggleInput="toggleReplyInput"
                v-if="replyActive"
                class="mt-6"
                avatar-img="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"/>

        </div>
    </div>
</template>

<script setup>
import {Avatar} from "../../components";
import {computed, ref} from "vue";
import moment from "moment";
import {InputGroup} from "../"

const {comment, lastNode} = defineProps({
    comment: Object,
    lastNode: Boolean,
})

const replyActive = ref(false);

function toggleReplyInput() {
    replyActive.value = !replyActive.value;
}

const createdAt = computed(() => moment(comment.created_at).format("lll"))
</script>

<style scoped>

</style>
