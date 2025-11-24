<template>
  <!-- Wrapper full-width -->
  <div
    ref="navbar"
    class="fixed top-0 left-0 w-full z-50 flex justify-center transition-all duration-300"
  >
    <!-- ====== NAVBAR MOBILE ====== -->
    <div
      class="md:hidden flex justify-between items-center px-4 py-2  backdrop-blur-sm shadow-lg w-full transition-all duration-300"
      :class="scrolled
        ? 'bg-white/40 scale-95 shadow-xl mt-2 rounded-xl backdrop-blur-sm'
        : 'bg-white scale-100'"
    >
      <!-- Logo -->
      <a href="/" class="flex items-center gap-2">
        <img src="../../../assets/img/logo.png" class="h-10" alt="Logo" />
      </a>

      <!-- Hamburger -->
      <button @click="mobileOpen = !mobileOpen">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9 text-gray-700" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>

    <!-- ====== NAVBAR DESKTOP (inchangé) ====== -->
    <div
      class="hidden md:flex items-center justify-between px-6 py-2 transition-all duration-300"
      :class="scrolled
        ? 'bg-white/40 shadow-xl rounded-xl mt-2 backdrop-blur-sm'
        : 'bg-white shadow h-16 w-full px-4 sm:px-6 lg:px-8'"
    >
      <!-- Logo + icônes seulement si pas scroll -->
      <div v-if="!scrolled" class="flex items-center gap-4">
        <a href="/" class="block text-teal-600 flex items-center gap-2">
          <img src="../../../assets/img/logo.png" class="h-12" alt="Logo Moon Services">
          <span class="sr-only">Home</span>
        </a>
        <div class="flex gap-2">
          <img src="../../../assets/img/moon.webp" class="h-6">
          <img src="../../../assets/img/services.webp" class="h-6">
        </div>
      </div>

      <!-- Menu desktop -->
      <div class="flex items-center gap-6">
        <nav class="hidden md:flex space-x-4 text-lg">
          <ButtonHeader text="Accueil" href="/" />
          <ButtonHeader text="Nos services" href="/services" />
          <ButtonHeader text="Nos engagements" href="/engagements" />
          <ButtonHeader text="Contact" href="/contact" />
        </nav>
        <ButtonHeaderOrgan href="/devis" text="Devis gratuit" />
      </div>
    </div>

    <!-- ====== MENU MOBILE SLIDE ====== -->
    <transition name="slide">
      <div
        v-if="mobileOpen"
        class="fixed top-16 right-4  w-64 bg-white/60 backdrop-blur-md rounded-xl shadow-lg z-50 p-6 flex flex-col gap-6"
      >
        <!-- Bouton fermer -->
        <button
          @click="mobileOpen = false"
          class="absolute top-4 self-end text-gray-700 hover:text-green-600 transition-colors text-2xl"
        >
          ✕
        </button>

        <!-- Liens menu -->
        <a href="/" class="text-lg font-semibold text-gray-800 hover:text-green-600 transition-colors">
          Accueil
        </a>
        <a href="/services" class="text-lg font-semibold text-gray-800 hover:text-green-600 transition-colors">
          Nos services
        </a>
        <a href="/engagements" class="text-lg font-semibold text-gray-800 hover:text-green-600 transition-colors">
          Nos engagements
        </a>
        <a href="/devis" class="text-lg font-semibold text-gray-800 hover:text-green-600 transition-colors">
          Devis
        </a>
        <a href="/contact" class="text-lg font-semibold text-gray-800 hover:text-green-600 transition-colors">
          Contact
        </a>

        <!-- Bouton Espace client -->
      </div>
    </transition>

  </div>
</template>


  
  <script setup>
  import { ref, onMounted } from 'vue';
  import ButtonHeader from './ButtonHeader.vue';
  import ButtonHeaderOrgan from '../../ButtonHeaderOrgan.vue';
  
  const scrolled = ref(false);
  const mobileOpen = ref(false);

  
  onMounted(() => {
    window.addEventListener('scroll', () => {
      scrolled.value = window.scrollY > 50;
    });
  });


  </script>
  
  <style>
  /* Smooth transition pour l'encoche */
  #navbar > div {
    transition: all 0.3s ease;
  }
  
  /* Active links */
  .active-link {
    font-weight: bold;
    color: #02638c;
    border-bottom: 2px solid #02638c;
  }
  
  .router-link-exact-active {
    text-decoration: underline;
  }
  </style>
  