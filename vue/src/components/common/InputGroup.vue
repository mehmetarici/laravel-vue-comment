<template>
    <div class="flex ">
        <Avatar :avatarImg="avatarImg"/>
        <div class="pl-2 w-full relative rounded-md">
            <Input placeholder="Type your comment here..."/>
            <div class="absolute inset-y-0 right-0 flex items-center">
                <button
                    class="cursor-pointer h-full py-0 pl-2 pr-4 bg-transparent text-sky-600 sm:text-sm font-bold">
                    {{buttonTitle}}
                </button>
            </div>
        </div>
    </div>

</template>

<script setup>
import {Input, Avatar} from "../index";

defineProps({
    placeholder: String,
    buttonTitle: String,
    avatarImg: String
})
</script>

<style scoped>

</style>
