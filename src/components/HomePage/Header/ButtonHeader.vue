<template>
    <router-link 
      :to="href" 
      class="text-black transition text-xl"
      active-class="active-link"          
      exact-active-class="exact-active-link" 
    >
      {{ text }}
    </router-link>
  </template>
  
  <script setup>
  defineProps({
    text: { type: String, required: true },
    href: { type: String, required: true }
  })
  </script>
  
  <style scoped>
  /* Active partielle (ex: /services ou /services/subpage) */
  .active-link {
    color: #02638c;
    font-weight: bold;
  }
  
  /* Active exacte (ex: /services exactement) */
  .exact-active-link {
    border-bottom: 2px solid #02638c;
    color: #02638c;
    font-weight: bold;
  }
  </style>
  