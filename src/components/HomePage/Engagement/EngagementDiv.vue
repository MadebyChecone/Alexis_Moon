<template>
    <div class="flex flex-row items-center bg-white hover:bg-blue-50 rounded-lg p-2">
        <div class="flex items-center flex-row md:gap-6 gap-1 w-full">
            <div class="flex md:w-1/6 w-24">
                <img :src="imgSrc" loading="lazy" alt="Engagement Image" class="w-full h-auto rounded-lg object-cover">
            </div>
            <div class="flex flex-col w-full">
                <h2 class="text-2xl font-bold">
                    {{ title }}
                </h2>

            </div>
        </div>
    </div>
</template>
<script setup>
defineProps({
    title: {
        type: String,
        required: true
    },
    imgSrc: {
        type: String,
        required: true
    }
});
</script>