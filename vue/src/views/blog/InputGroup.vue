<template>
    <div class="flex ">
        <Avatar :avatarImg="avatarImg"/>
        <div class="pl-2 w-full relative rounded-md">
            <Input :value="input.value" :placeholder="input.placeholder"/>
            <div class="absolute inset-y-0 right-0 flex items-center">
                <button
                    @click="button.click"
                    class="cursor-pointer h-full py-0 pl-2 pr-4 bg-transparent text-sky-600 sm:text-sm font-bold">
                    {{ button.title }}
                </button>
            </div>
        </div>
    </div>
    <h1>{{input.value}}</h1>
</template>

<script setup>
import {Input, Avatar} from "../index";
defineProps({
    input: {
        placeholder: String,
        value: String,
    },
    button: {
        title: String,
        click: Function
    },
    avatarImg: String
})
</script>

<style scoped>

</style>
