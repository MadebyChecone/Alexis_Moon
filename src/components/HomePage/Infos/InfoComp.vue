<script setup lang="ts">
import { onMounted, ref } from 'vue';
import { MapPin, Clock, FileCheck } from 'lucide-vue-next'; // Import des icônes

const sectionRef = ref(null);
// On stocke les valeurs affichées dans des refs réactives
const count1 = ref(0);
const count2 = ref(0);
const count3 = ref(0);

// Fonction d'animation générique
const animateValue = (refValue, target, duration = 2000) => {
  let start = 0;
  const end = parseInt(target);
  if (start === end) return;
  
  let startTime = null;
  
  const step = (timestamp) => {
    if (!startTime) startTime = timestamp;
    const progress = Math.min((timestamp - startTime) / duration, 1);
    
    // Easing "easeOutExpo" pour un effet plus pro (ralentit à la fin)
    const easeOut = progress === 1 ? 1 : 1 - Math.pow(2, -10 * progress);
    
    refValue.value = Math.floor(easeOut * (end - start) + start);
    
    if (progress < 1) {
      window.requestAnimationFrame(step);
    } else {
      refValue.value = end; // S'assurer qu'on finit sur le chiffre exact
    }
  };
  
  window.requestAnimationFrame(step);
};

onMounted(() => {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        // On lance les 3 animations
        animateValue(count1, 50);
        animateValue(count2, 24);
        animateValue(count3, 48);
        observer.disconnect();
      }
    });
  }, { threshold: 0.3 }); // Se déclenche quand 30% du bloc est visible

  if (sectionRef.value) {
    observer.observe(sectionRef.value);
  }
});
</script>

<template>
  <section 
    class="relative py-20 md:py-32 px-4"
    style="background-image: url('https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&q=80'); background-size: cover; background-position: center; background-attachment: fixed;"
  >
    <div class="absolute inset-0 bg-[#1a3555]/40 "></div>

    <div ref="sectionRef" class="relative z-10 max-w-6xl mx-auto bg-white rounded-3xl shadow-2xl overflow-hidden">
      <div class="grid grid-cols-1 md:grid-cols-3 divide-y md:divide-y-0 md:divide-x divide-gray-100">
        
        <div class="p-8 md:p-12 flex flex-col items-center text-center group hover:bg-gray-50 transition-colors duration-300">
          <div class="w-16 h-16 rounded-full bg-blue-50 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
            <MapPin :size="32" class="text-[#02638c]" />
          </div>
          <div class="flex items-baseline gap-1">
            <span class="text-5xl md:text-6xl font-bold text-[#1a3555] font-mono tracking-tighter">
              {{ count1 }}
            </span>
            <span class="text-3xl font-bold text-[#02638c]">+</span>
          </div>
          <p class="mt-2 text-gray-500 font-medium uppercase tracking-wider text-sm">Villes desservies</p>
        </div>

        <div class="p-8 md:p-12 flex flex-col items-center text-center group hover:bg-gray-50 transition-colors duration-300">
          <div class="w-16 h-16 rounded-full bg-green-50 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
            <Clock :size="32" class="text-green-600" />
          </div>
          <div class="flex items-baseline gap-1">
            <span class="text-5xl md:text-6xl font-bold text-[#1a3555] font-mono tracking-tighter">
              {{ count2 }}
            </span>
            <span class="text-3xl font-bold text-green-600">h</span>
          </div>
          <p class="mt-2 text-gray-500 font-medium uppercase tracking-wider text-sm">Délai de réponse max</p>
        </div>

        <div class="p-8 md:p-12 flex flex-col items-center text-center group hover:bg-gray-50 transition-colors duration-300">
          <div class="w-16 h-16 rounded-full bg-orange-50 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
            <FileCheck :size="32" class="text-orange-500" />
          </div>
          <div class="flex items-baseline gap-1">
            <span class="text-5xl md:text-6xl font-bold text-[#1a3555] font-mono tracking-tighter">
              {{ count3 }}
            </span>
            <span class="text-3xl font-bold text-orange-500">h</span>
          </div>
          <p class="mt-2 text-gray-500 font-medium uppercase tracking-wider text-sm">Envoi du devis</p>
        </div>

      </div>
    </div>
  </section>
</template>