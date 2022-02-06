<template>
    <PageContainer title="Dashboard">
        <div class="bg-indigo-600">
            <div class="flex items-center justify-between flex-wrap">
                <div class="w-0 flex-1 flex items-center">
                    <span class="flex p-2 rounded-lg bg-indigo-800">
                        <SpeakerphoneIcon class="h-6 w-6 text-white" aria-hidden="true"/>
                    </span>
                    <p class="ml-3 font-medium text-white">
                        Big news! We're excited to announce a test project which shows post comments.
                    </p>
                </div>
            </div>
        </div>
    </PageContainer>
</template>

<script setup>
import {PageContainer} from "../components";
import {SpeakerphoneIcon} from '@heroicons/vue/outline'
</script>

<style scoped>

</style>
