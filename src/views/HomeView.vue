<script setup>
import { ref } from 'vue'
import { useHead } from '@vueuse/head'

// Import de tes composants...
import HeaderComp from '../components/HomePage/Header/HeaderComp.vue'
import HomeComp from '../components/HomePage/HomeComp/HomeComp.vue'
import SeparComp from '../components/HomePage/Separateur/SeparComp.vue'
import ServicesComp from '../components/HomePage/Services/ServicesComp.vue'
import EngagementComp from '../components/HomePage/Engagement/EngagementComp.vue'
import InfoComp from '../components/HomePage/Infos/InfoComp.vue'
import FooterComp from '../components/FooterComp.vue'
import AvisComp from '../components/HomePage/Avis/AvisComp.vue'

// Ville principale pour SEO local
const villePrincipale = ref("Poissy")
const telephone = "06 14 60 25 76"
const email = "contact@moon-services.fr"
const siteUrl = "https://moonservices.fr"

useHead({
  // Titre optimisé : Mot clé + Ville + Dept + Marque
  title: `Entreprise de nettoyage à ${villePrincipale.value} (78) et Yvelines – Moon Services`,
  
  // Balise Link Canonical (CRITIQUE pour le SEO)
  link: [
    {
      rel: 'canonical',
      href: siteUrl
    },
    {
      rel: 'icon',
      type: 'image/png',
      href: '/favicon.png' // Assure-toi d'avoir un favicon
    }
  ],
  meta: [
    {
      name: 'description',
      // Description plus "vendeuse" avec appel à l'action
      content: `Besoin d'un nettoyage professionnel à ${villePrincipale.value} et dans le 78 ? Moon Services assure l'entretien d'immeubles, bureaux et vitreries. Devis gratuit sous 24h au ${telephone}.`
    },
    // Open Graph (Facebook, LinkedIn, WhatsApp...)
    {
      property: 'og:title',
      content: `Nettoyage professionnel à ${villePrincipale.value} – Moon Services`
    },
    {
      property: 'og:description',
      content: `Entreprise de nettoyage réactive pour pros et copropriétés. Interventions à Poissy, St-Germain, Versailles... Demandez votre devis gratuit !`
    },
    {
      property: 'og:type',
      content: 'website'
    },
    {
      property: 'og:url',
      content: siteUrl
    },
    {
      property: 'og:image',
      // Attention : Utilise une URL absolue pour l'image de partage
      content: `${siteUrl}/img/accueil.webp`
    },
    {
      property: 'og:locale',
      content: 'fr_FR'
    },
    {
      name: 'robots',
      content: 'index, follow'
    }
  ],
  script: [
    {
      type: 'application/ld+json',
      // Données structurées ENRICHIES
      innerHTML: JSON.stringify({
        "@context": "https://schema.org",
        "@type": "LocalBusiness", // Ou "ProfessionalService"
        "name": "Moon Services",
        "image": [
          `${siteUrl}/img/logo.png`,
          `${siteUrl}/img/accueil.webp`
        ],
        "description": `Entreprise de nettoyage professionnelle basée à ${villePrincipale.value}, intervenant dans tout les Yvelines (78).`,
        "telephone": telephone, // Ton vrai numéro
        "email": email,
        "url": siteUrl,
        "priceRange": "€€", // Indication de prix (requis par Google parfois)
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "", // Ajoute ta rue si tu en as une officielle
          "addressLocality": villePrincipale.value,
          "addressRegion": "Île-de-France",
          "postalCode": "78300",
          "addressCountry": "FR"
        },
        // Coordonnées de Poissy (Centre) - Important pour Maps
        "geo": {
          "@type": "GeoCoordinates",
          "latitude": 48.9294,
          "longitude": 2.0456
        },
        // Tes horaires (basés sur ton composant InfoComp)
        "openingHoursSpecification": [
          {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
            "opens": "08:00",
            "closes": "18:00"
          },
          {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": "Saturday",
            "opens": "09:00",
            "closes": "17:00"
          }
        ],
        // Zone d'intervention (Très bien fait !)
        "areaServed": [
          "Poissy", "Andrésy", "Conflans-Sainte-Honorine", "Chanteloup-les-Vignes",
          "Carrières-sous-Poissy", "Achères", "Les Mureaux", "Mantes-la-Jolie", 
          "Mantes-la-Ville", "Houilles", "Sartrouville", "Vernouillet", 
          "Triel-sur-Seine", "Bougival", "Saint-Germain-en-Laye", 
          "Le Pecq", "Montigny-le-Bretonneux", "Saint-Cyr-l'École", 
          "Versailles", "Rambouillet", "Guyancourt", "Maurepas", "Plaisir"
        ]
      })
    }
  ]
})
</script>

<template>
  <header>
    <HeaderComp/>
  </header>
  <main>
    <section class="bg bg-[#1a3555]/40">
      <HomeComp/>
    </section>
    <SeparComp 
      title="MOON SERVICES vous accompagne avec des solutions adaptées à l’entretien et au nettoyage de vos espaces." 
      subtitle="Nous mettons notre expertise à votre service pour garantir des environnements sains et irréprochables."/>
    <ServicesComp/>
    <EngagementComp/>
    <AvisComp/>
    <InfoComp/>
    <SeparComp 
      title="Demandez votre devis personnalisé dès maintenant et profitez d’un service de nettoyage parfaitement adapté à vos besoins." 
      button="true"
      buttonText="Demander un devis"
      />
  </main>
  <footer>
    <FooterComp/>
  </footer>
</template>

<style>
/* Ton style reste identique */
.bg{
  background-image: url('../assets/img/accueil.webp');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  width: 100%;
  height: auto;
  
}
.section {
    transition: opacity .6s ease-out, transform .6s ease-out;
    max-width: 100%;
    overflow: hidden;
    width: 100%;
}
</style>