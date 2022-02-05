<template>
    <PageContainer title="Example Post Title">
        <div class="w-full pb-6">
            <Blog/>
        </div>
        <div class="w-full max-w-2xl mx-auto">
            <div class="flex flex-col gap-6">
                <InputGroup
                    placeholder="Type your comment here..."
                    button-title="Post"
                    avatar-img="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"/>

                <CommentContent
                    writer="Mehmet ARICI"
                    comment="SeaWire Web is a wireframe kit that has more than 15 popular categories and more than 200 screens from each category, SeaWire Web deserves to be your partner in working on projects."
                />
                <CommentContent
                    margin-left="ml-12"
                    writer="Mehmet ARICI"
                    comment="SeaWire Web is a wireframe kit that has more than 15 popular categories and more than 200 screens from each category, SeaWire Web deserves to be your partner in working on projects."
                />
                <CommentContent
                    :lastNode="true"
                    margin-left="ml-24"
                    writer="Mehmet ARICI"
                    comment="SeaWire Web is a wireframe kit that has more than 15 popular categories and more than 200 screens from each category, SeaWire Web deserves to be your partner in working on projects."
                />
                <CommentContent
                    writer="Mehmet ARICI"
                    comment="SeaWire Web is a wireframe kit that has more than 15 popular categories and more than 200 screens from each category, SeaWire Web deserves to be your partner in working on projects."
                />
            </div>
        </div>
    </PageContainer>
</template>

<script setup>
import {Blog, CommentContent} from "./";
import {PageContainer, InputGroup} from "../components";
</script>

<style scoped>

</style>
