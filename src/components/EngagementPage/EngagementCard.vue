<template>
    <div class="group relative flex flex-col h-full bg-white rounded-2xl shadow-sm hover:shadow-xl border border-gray-100 transition-all duration-300 overflow-hidden">
      
      <div class="relative h-56 overflow-hidden">
        <img 
          :src="image" 
          :alt="title" 
          loading="lazy"
          class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
        />
        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
      </div>
  
      <div class="p-8 flex flex-col flex-1">
        <h3 class="text-xl font-bold text-gray-900 mb-4 group-hover:blue transition-colors">
          {{ title }}
        </h3>
        <div class="w-12 h-1 bg-green rounded-full mb-6"></div>
  
        <div class="flex-1">
          <ul v-if="list && list.length" class="space-y-3">
            <li v-for="(item, index) in list" :key="index" class="flex items-start text-gray-600">
              <svg class="w-5 h-5 green mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
              <span class="text-sm md:text-base font-medium">{{ item }}</span>
            </li>
          </ul>
  
          <p v-else class="text-gray-600 text-sm md:text-base leading-relaxed">
            {{ text }}
          </p>
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
    image: {
      type: String,
      required: true
    },
    list: {
      type: Array,
      default: null
    },
    text: {
      type: String,
      default: ''
    }
  });
  </script>