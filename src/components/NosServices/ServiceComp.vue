<template>
  <section class="relative flex flex-col items-center pb-32">

    <!-- BACKGROUND HALOS -->
    <div class="fixed inset-0 w-full h-full bg-white z-0 overflow-hidden">
      <!-- Halo bas droit -->
      <div class="w-[35rem] h-[35rem] rounded-full blur-3xl bg-blue-300 opacity-35 absolute bottom-[-120px] right-[-120px]"></div>

      <!-- Halo haut gauche -->
      <div class="w-[28rem] h-[28rem] rounded-full blur-3xl bg-blue-200 opacity-30 absolute top-[-80px] left-[-80px]"></div>

      <!-- Halo central doux -->
      <div class="w-[26rem] h-[26rem] rounded-full blur-[110px] bg-blue-100 opacity-40 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2"></div>
    </div>


    <!-- LISTE DES SERVICES -->
    <div
      v-for="(service, index) in services"
      :key="index"
      ref="sections"
      class="relative w-11/12 md:w-3/4 lg:w-2/3 h-[60vh] mt-24 md:mt-32"
    >
      <!-- CARD (garde rotation GSAP) -->
      <div
        class="w-full h-full relative flex flex-col justify-center items-center overflow-hidden 
                rounded-[2rem] shadow-xl transition-transform duration-500 border border-white/10 backdrop-blur-sm"
        :style="getBackgroundStyles(service)"
        ref="wrappers"
      >

        <!-- Nouveau overlay plus fin et plus pro -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-black/20"></div>

        <!-- Contenu -->
        <div class="relative z-10 px-8 md:px-14 py-8 max-w-2xl
                    bg-white/10 backdrop-blur-xl rounded-2xl border border-white/20 shadow-lg">
          
          <h2 class="text-2xl md:text-5xl font-bold text-white mb-5 drop-shadow-xl tracking-wide">
            {{ service.title }}
          </h2>

          <ul class="text-md md:text-xl space-y-2 text-gray-200 leading-relaxed">
            <li
              v-for="item in service.items"
              :key="item"
              class="hover:text-white transition-colors duration-300"
            >
              • {{ item }}
            </li>
          </ul>

        </div>
      </div>
    </div>

  </section>
</template>


<script setup>
import { ref, onMounted } from "vue"; // 'computed' n'est plus nécessaire ici
import gsap from "gsap";
import { useMediaQuery } from '@vueuse/core';



import { ScrollTrigger } from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

// Note: Assurez-vous que ces chemins d'importation sont corrects dans votre projet
import immeubleImage from "../../assets/img/photoImmeuble.webp";
import bureauImage from "../../assets/img/photoBur.webp";
import vitrerieImage from "../../assets/img/photoVitre.webp";
import photoGardien from "../../assets/img/photoGardien.webp";
import photoBur from "../../assets/img/photoBureau.webp";

const services = [
  { title: "Nettoyage et entretien d’immeuble", image: immeubleImage, items: ["Nettoyage Halls d’entrée et ascenseurs", "Aspiration et lavage des escaliers de services et paliers", "Nettoyage des divers locaux", "Désinfection des locaux poubelles et des containers", "Sortie et rentrée des containers"], position: 'bottom-calc' },
  { title: "Nettoyage de locaux professionnels", image: bureauImage, items: ["Dépoussiérage et nettoyage des surfaces", "Désinfection des zones de contacts", "Détartrage et entretien des sanitaires et des espaces de cuisine", "Vidage des corbeilles"] },
  { title: "Nettoyage de remise en état", image: photoBur, items: ["Vitrines", "Façades", "Vérandas"], position: 'center-calc' },
  { title: "Entretien vitreries", image: vitrerieImage, items: ["Nettoyage complet des vitres intérieures et extérieures", "Lavage des vitrines, baies vitrées et portes-fenêtres", "Nettoyage des encadrements, rebords et joints", "Fréquences d’intervention selon vos besoins : ponctuelle ou régulière"], position: 'center-calc' },
  { title: "Remplacement de gardien", image: photoGardien, items: ["Entretien des parties communes", "gestion des containers", "Gestion du courrier et des colis", "Surveillance des installations et accueil des résidents", "Coordination avec les prestataires extérieurs", "Archivage sécurisé"], position: 'center-calc' },
];

const sections = ref([]);
const wrappers = ref([]);

const getBgPosition = (position) => {
  if(position === 'center-calc') return 'center calc(100% + 200px)';
  if(position === 'bottom-calc') return 'center calc(100% + 100px)';
  return 'center top';
};

const isDesktop = useMediaQuery('(min-width: 768px)');

// Correction: Convertir la propriété calculée en méthode
// et accepter 'service' en argument.
const getBackgroundStyles = (service) => {
  const styles = {
    // 'service' est maintenant accessible via l'argument
    backgroundImage: `url(${service.image})`,
    backgroundSize: 'cover',
    // La position mobile par défaut est 'center'
    backgroundPosition: 'center center', 
  };

  if (isDesktop.value) {
    // Si c'est un écran desktop, on applique la position spécifique
    styles.backgroundPosition = getBgPosition(service.position);
  }

  return styles;
};

onMounted(() => {
  const panels = gsap.utils.toArray(sections.value);
  const wrapperDivs = gsap.utils.toArray(wrappers.value);

  const container = document.querySelector("section");

  wrapperDivs.forEach((wrapper, i) => {
    // Rotation initiale zigzag
    gsap.set(wrapper, { rotate: i % 2 === 0 ? 1 : -1 });

    ScrollTrigger.create({
      trigger: panels[i],
      start: "center center",
      endTrigger: container,
      end: "bottom top",
      pin: true,
      pinSpacing: false,
      scrub: true,
      
      // Animation rotation pendant le scroll
      onUpdate: self => {
        const progress = self.progress;
        const targetRotate = (i % 2 === 0 ? 1 : -1) * (1 - progress); // rotation vers 0°
        gsap.to(wrapper, { rotate: targetRotate, duration: 0.3 });
      }
    });
  });

  // Apparition progressive du texte avec scrub pour douceur
  panels.forEach((panel) => {
    const content = panel.querySelector(".relative.z-10");
    gsap.fromTo(
      content,
      { opacity: 0, y: 80 },
      {
        opacity: 1,
        y: 0,
        duration: 1.2,
        ease: "power2.out",
        scrollTrigger: {
          trigger: panel,
          start: "top 80%",
          toggleActions: "play none none reverse",
          scrub: 0.5
        },
      }
    );
  });
});
</script>

<style scoped>
section {
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
}

/* Centrage vertical smooth */
div[ref="sections"] {
  position: relative;
  top: 50%;
  left: 50%;
  /* Note: Assurez-vous que cette transformation est compatible avec ScrollTrigger/Pinning. 
     Il est souvent préférable de laisser le conteneur parent centrer les éléments. */
  transform: translate(-50%, -50%);
}

</style>