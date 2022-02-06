<template>
    <div class="flex items-center">
        <Avatar :avatarImg="avatarImg"/>
        <div class="pl-2 w-full relative rounded-md">
            <input
                v-on:keyup.enter="postComment"
                v-model="comment"
                class="appearance-none text-sm md:text-base block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 md:py-3 pl-2 pr-12 leading-tight focus:outline-none focus:bg-white focus:border-indigo-100"
                type="text"
                placeholder="Type your comment here..."
            />
            <div class="absolute inset-y-0 right-0 flex items-center">
                <button
                    v-if="comment.length >= 2"
                    :disabled="loading"
                    @click="postComment"
                    class="cursor-pointer h-full py-0 pl-2 pr-3 bg-transparent text-sky-600 sm:text-sm font-bold">
                    {{ loading ? "Posting..." : "Post" }}
                </button>
                <XIcon
                    @click="toggleInput"
                    v-if="comment.length < 2 && parentId"
                    class="block h-6 w-6 cursor-pointer pr-2 text-gray-600" aria-hidden="true"
                />
            </div>
        </div>
    </div>
</template>


<script setup>
import {XIcon} from '@heroicons/vue/outline'
import {Input, Avatar} from "../../components";
import {ref} from "vue";
import store from "../../store";

const {avatarImg, parentId, toggleInput} = defineProps({
    avatarImg: String,
    parentId: Number,
    toggleInput: Function
})

const comment = ref("");
const loading = ref(false);

function postComment() {
    loading.value = true;
    const request = {body: comment.value, username: "John Doe"};
    if (parentId)
        request.parent_id = parentId;
    store
        .dispatch("createComment", request)
        .then(() => {
            loading.value = false;
            comment.value = "";
            if (parentId)
                toggleInput();
        })
        .catch(() => {
            loading.value = false;
            comment.value = "";
        });
}

</script>

<style scoped>

</style>
