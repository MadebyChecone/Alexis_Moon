<template>
    <div class="flex items-start">
        <svg class="green w-6 h-6 md:w-8 md:h-8 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
        </svg>
        <p>
            <span class="font-bold">
                {{ span }}
            </span>
            {{ text }}
        </p>
    </div>
</template>

<script setup>

defineProps({
    span: {
        type: String,
        required: true
    },
    text: {
        type: String,
        required: true
    }
});
</script>