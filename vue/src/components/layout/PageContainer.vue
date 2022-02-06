<template>
    <header class="bg-white shadow">
        <div class="max-w-6xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold text-gray-900">{{ title }}</h1>
        </div>
    </header>
    <main>
        <div class="max-w-6xl mx-auto py-4 sm:px-4 lg:px-8">
            <div class="px-4 py-3 sm:px-0">
                <slot/>
            </div>
        </div>
    </main>
</template>

<script setup>
defineProps({
    title: String
})
</script>

<style scoped>

</style>
