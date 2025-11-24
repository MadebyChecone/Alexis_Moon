<template>
  <section class="relative w-full py-24 overflow-hidden bg-gray-50/50">
    
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden -z-10 pointer-events-none">
      <div class="absolute top-0 left-1/4 w-[500px] h-[500px] bg-blue-200/20 blur-[120px] rounded-full mix-blend-multiply"></div>
      <div class="absolute bottom-0 right-1/4 w-[500px] h-[500px] bg-green-200/20 blur-[120px] rounded-full mix-blend-multiply"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      
      <div class="text-center max-w-3xl mx-auto mb-16">
        <h1 class="mt-2 text-4xl md:text-5xl font-extrabold text-gray-900 tracking-tight">
          Nos engagements <span class="green underline">qualité</span>
        </h1>
        <p class="mt-4 text-xl text-gray-500">
          Nous mettons un point d'honneur à respecter des standards élevés pour votre satisfaction et le respect de l'environnement.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <EngagementCard
          v-for="(item, index) in engagements"
          :key="index"
          :title="item.title"
          :image="item.image"
          :list="item.list"
          :text="item.text"
        />
      </div>

    </div>
  </section>
</template>

<script setup>
import EngagementCard from './EngagementCard.vue'; // Assure-toi du bon chemin
import PhotoImmeuble from "../../assets/img/photoImmeuble.webp"; // Ton image
import PhotoEco from "../../assets/img/photoEco.webp"; // Ton image
import gestion_numerique from "../../assets/img/gestion_num.webp"; // Ton image
import photo2 from "../../assets/img/photo2.webp"; // Ton image
import photo1 from "../../assets/img/photo1.webp"; // Ton image
import photo4 from "../../assets/img/photo4.webp"; // Ton image
import photoPersonnel from "../../assets/img/photoPersonnel.webp"; // Ton image


const engagements = [
  {
    title: "Comportement écoresponsable",
    image: PhotoEco,
    list: [
      "Produits écologiques certifiés",
      "Matériaux réutilisables et durables",
      "Personnel formé à l’éconettoyage",
      "Optimisation des déplacements",
    ],
  },
  {
    title: "Innovation avec Organilog",
    image: gestion_numerique,
    list: [
      "Suivi des interventions en temps réel",
      "Rapports numériques instantanés",
      "Traçabilité et contrôle qualité",
      "Espace client dédié",
    ],
  },
  {
    title: "Transparence totale",
    image: photo2,
    text: "Fini les zones d'ombre. Nous garantissons un suivi rigoureux, des devis clairs et une communication proactive à chaque étape de notre collaboration.",
  },
  {
    title: "Flexibilité & Sur-mesure",
    image: photo1,
    text: "Chaque immeuble est unique. Nous adaptons nos horaires, nos fréquences de passage et nos méthodes pour coller parfaitement à vos contraintes.",
  },
  {
    title: "Garantie Satisfaction",
    image: photo4,
    text: "Votre satisfaction n'est pas une option. Moon Services s’engage à repasser gratuitement si une prestation ne correspond pas au cahier des charges.",
  },
  {
    title: "Experts Qualifiés",
    image: photoPersonnel,
    text: "Nos équipes ne sont pas de simples intervenants. Ils sont formés, équipés et sensibilisés à la sécurité et à la discrétion requise dans vos locaux.",
  },
];
</script>