<template>
    <PageContainer title="Example Post Title">
        <div class="w-full pb-6">
            <Blog/>
        </div>
        <div class="w-full max-w-2xl mx-auto">
            <InputGroup
                class="mb-6"
                avatar-img="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"/>

            <CommentTreeNode v-for="comment in comments" :key="comment.id" :comment="comment"/>
        </div>
    </PageContainer>
</template>

<script setup>
import {Blog, InputGroup, CommentTreeNode} from "./";
import {PageContainer} from "../components";
import {computed, watch} from "vue";

import {useStore} from "vuex";

const store = useStore();
store.dispatch("getComments");

watch(() => store.getters.comments, function () {

});

const comments = computed(() => store.getters.comments)

</script>

<style scoped>

</style>
