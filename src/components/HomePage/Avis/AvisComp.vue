<script setup lang="ts">
import { ref, onMounted, onUnmounted, watch } from 'vue';
import { Star, ChevronLeft, ChevronRight, User, Quote } from 'lucide-vue-next';

// Données
const testimonials = [
  {
    name: 'Sophie Martin',
    image: '', 
    content: 'MOON SERVICES efficace et toujours irréprochable. Un vrai gain de temps pour notre agence LAFORET. Nous recommandons sans hésiter !',
    rating: 5,
  },
  {
    name: 'Franck Gr',
    image: '', // Pas d'image pour tester le fallback
    content: 'Moon Services. Le service au plus près du client. Entreprise très sérieuse. Prestations irréprochables. Tous les engagements sont tenus. Nous sommes une résidence de 40 logements plus 2 parkings.',
    rating: 5,
  },

];

const currentIndex = ref(0);
const isAutoPlaying = ref(true);
let intervalId: ReturnType<typeof setInterval> | null = null;

// --- Logique (identique à avant) ---
const startAutoPlay = () => {
  if (intervalId) clearInterval(intervalId);
  if (isAutoPlaying.value) {
    intervalId = setInterval(() => {
      currentIndex.value = (currentIndex.value + 1) % testimonials.length;
    }, 5000);
  }
};

const stopAutoPlay = () => {
  if (intervalId) { clearInterval(intervalId); intervalId = null; }
};

const goToSlide = (index: number) => {
  currentIndex.value = index;
  isAutoPlaying.value = false;
  setTimeout(() => isAutoPlaying.value = true, 5000);
};

const goToPrevious = () => {
  const newIndex = currentIndex.value === 0 ? testimonials.length - 1 : currentIndex.value - 1;
  goToSlide(newIndex);
};

const goToNext = () => {
  const newIndex = (currentIndex.value + 1) % testimonials.length;
  goToSlide(newIndex);
};

watch(isAutoPlaying, startAutoPlay);
onMounted(startAutoPlay);
onUnmounted(stopAutoPlay);
</script>

<template>
  <section id="testimonials" class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-50/50">
    <div class="max-w-7xl mx-auto">
      
      <div class="text-center mb-16">
        <div class="flex flex-col justify-center items-center mb-6 w-full">
          <h2 class="text-3xl md:text-5xl font-bold text-[#1a3555] mb-4">
            Ils nous font confiance
          </h2>
          <hr class="w-1/2 border-2 border-green rounded-lg">
        </div>
        <p class="text-gray-600 max-w-2xl mx-auto text-lg">
          Découvrez ce que nos <span class="text-[#02638c] font-semibold underline decoration-2 underline-offset-2">clients</span> disent de la qualité de nos services.
        </p>
      </div>

      <div class="relative max-w-5xl mx-auto">
        
        <button
          @click="goToPrevious"
          class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-12 z-10 bg-white border border-gray-100 text-[#02638c] p-3 rounded-full shadow-lg transition-all hover:scale-110 hover:bg-[#02638c] hover:text-white hidden xl:flex items-center justify-center group"
          aria-label="Previous"
        >
          <ChevronLeft :size="24" class="relative right-[1px]" />
        </button>
        
        <button
          @click="goToNext"
          class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-12 z-10 bg-white border border-gray-100 text-[#02638c] p-3 rounded-full shadow-lg transition-all hover:scale-110 hover:bg-[#02638c] hover:text-white hidden xl:flex items-center justify-center group"
          aria-label="Next"
        >
          <ChevronRight :size="24" class="relative left-[1px]" />
        </button>

        <div class="overflow-hidden py-4"> <div 
            class="flex transition-transform duration-500 ease-out"
            :style="{ transform: `translateX(-${currentIndex * 100}%)` }"
          >
            <div 
              v-for="(testimonial, index) in testimonials" 
              :key="index" 
              class="w-full flex-shrink-0 px-4"
            >
              <div class="max-w-3xl mx-auto bg-white p-8 md:p-10 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 relative overflow-hidden text-center">
                
                <Quote class="absolute top-4 left-6 text-[#02638c]/5 w-24 h-24 rotate-180 -z-0" />

                <div class="flex gap-1 mb-6 justify-center relative z-10">
                  <Star 
                    v-for="i in 5" 
                    :key="i" 
                    :class="[
                      'w-5 h-5',
                      i <= testimonial.rating ? 'fill-[#FFD700] text-[#FFD700]' : 'fill-gray-200 text-gray-200'
                    ]" 
                  />
                </div>

                <p class="text-gray-700 mb-8 text-lg md:text-xl leading-relaxed italic relative z-10">
                  "{{ testimonial.content }}"
                </p>

                <div class="flex items-center justify-center gap-4 relative z-10">
                  <div class="relative">
                    <img 
                      v-if="testimonial.image"
                      :src="testimonial.image" 
                      :alt="testimonial.name"
                      class="w-14 h-14 rounded-full object-cover border-2 border-white shadow-md"
                    />
                    <div 
                      v-else
                      class="w-14 h-14 rounded-full bg-[#02638c]/10 flex items-center justify-center border-2 border-white shadow-md"
                    >
                      <User class="text-[#02638c] w-7 h-7" />
                    </div>
                  </div>
                  
                  <div class="text-left">
                    <p class="font-bold text-[#1a3555] text-lg">{{ testimonial.name }}</p>
                    <p class="text-sm text-[#02638c] font-medium">Client vérifié</p>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

        <div class="flex justify-center gap-2 mt-8">
          <button
            v-for="(_, index) in testimonials"
            :key="index"
            @click="goToSlide(index)"
            :class="[
              'h-2 rounded-full transition-all duration-300',
              index === currentIndex 
                ? 'bg-[#02638c] w-8' 
                : 'bg-gray-300 w-2 hover:bg-[#02638c]/50'
            ]"
            :aria-label="`Go to slide ${index + 1}`"
          />
        </div>

      </div>
    </div>
  </section>
</template>