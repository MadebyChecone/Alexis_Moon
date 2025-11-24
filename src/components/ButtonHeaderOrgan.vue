<template>
    <a href="" class="hidden sm:inline-flex cursor-pointer items-center space-x-2 rounded-md bg-blue px-5 py-2.5 text-xl font-medium text-white transition hover:text-teal-600/75">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
        </svg>
        <p>
          {{ text }}

        </p>
        
    </a>
    
</template>
<script setup>
defineProps({
  text: {
    type: String,
    required: true
  }
})
</script>