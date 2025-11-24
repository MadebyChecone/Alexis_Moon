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
      "Utilisation de produits écologiques et certifiés",
      "Utilisation de matériaux réutilisables",
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
      "Contrôle qualité",
      "Gestion des clients",
      "Génération des devis et factures"
    ],
  },
  {
    title: "Transparence totale",
    image: photo2,
    text: "Nous garantissons un suivi rigoureux et transparent pour des prestations toujours à la hauteur de vos exigences.",
  },
  {
    title: "Flexibilité & Sur-mesure",
    image: photo1,
    text: "Nous adaptons nos prestations pour vous offrir un service sur mesure, flexible et parfaitement ajusté à vos attentes.",
  },
  {
    title: "Garantie Satisfaction",
    image: photo4,
    text: "Votre satisfaction est notre priorité, MOON SERVICES s’engage donc à garantir votre satisfaction en assurant un service de nettoyage rigoureux, efficace et adapté à vos besoins.Ò",
  },
  {
    title: "Experts Qualifiés",
    image: photoPersonnel,
    text: "Notre personnel est formé aux meilleures pratiques pour garantir un nettoyage efficace et professionnel.",
  },
];
</script>