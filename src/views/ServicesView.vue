<template>
  <HeaderComp/>
  <main>
    <ServiceComp/>
  </main>
  </template>

<script setup>
import HeaderComp from '../components/HomePage/Header/HeaderComp.vue';
import ServiceComp from '../components/NosServices/ServiceComp.vue';
import { useHead } from '@vueuse/head'

// --- Configuration des données ---
const villePrincipale = "Poissy"
const dept = "78"
const telephone = "06 14 60 25 76" // Ton vrai numéro
const urlPage = "https://moonservices.fr/services" // Vérifie si ton URL est /services ou /nos-services

// Liste des services pour les keywords
const servicesList = [
  "Nettoyage d’immeubles",
  "Nettoyage de bureaux",
  "Lavage de vitres",
  "Sortie de poubelles",
  "Entretien copropriété"
]

// Construction dynamique des keywords (pas critique mais utile)
const keywordsSEO = `
  ${servicesList.join(", ")},
  nettoyage ${villePrincipale}, entreprise nettoyage ${villePrincipale}, entretien immeuble ${dept}, 
  nettoyage bureaux ${dept}, société de ménage professionnel, contrat entretien immeuble
`.replace(/\s+/g, ' ').trim()

useHead({
  // Titre optimisé : Service + Localisation + Avantage
  title: `Nos Services de Nettoyage (Immeubles & Bureaux) à ${villePrincipale} et 78`,
  
  // Canonical : INDISPENSABLE
  link: [
    { rel: 'canonical', href: urlPage }
  ],

  meta: [
    {
      name: 'description',
      // Description qui cite les 3 pôles principaux pour capter le clic
      content: `Découvrez nos solutions de propreté : Entretien d'immeubles (copropriétés), nettoyage de bureaux et lavage de vitres. Intervention rapide à ${villePrincipale} et dans les Yvelines.`
    },
    {
      name: 'keywords',
      content: keywordsSEO
    },
    // Open Graph
    {
      property: 'og:title',
      content: `Prestations de Nettoyage Pro – Moon Services ${villePrincipale}`
    },
    {
      property: 'og:description',
      content: `Besoin d'un partenaire fiable pour l'entretien de vos locaux ? Découvrez nos offres adaptées aux syndics et entreprises.`
    },
    {
      property: 'og:type',
      content: 'website'
    },
    {
      property: 'og:url',
      content: urlPage
    },
    {
      property: 'og:image',
      content: 'https://moonservices.fr/img/photoImmeuble.webp' // Assure-toi que cette image existe
    },
    {
      name: 'robots',
      content: 'index, follow'
    }
  ],
  script: [
    {
      type: 'application/ld+json',
      // ICI : On utilise "makesOffer" pour lister tes services à Google
      innerHTML: JSON.stringify({
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "Moon Services",
        "image": "https://moonservices.fr/img/logo.png",
        "description": `Entreprise experte en nettoyage d'immeubles et bureaux à ${villePrincipale}.`,
        "url": urlPage,
        "telephone": telephone,
        "address": {
          "@type": "PostalAddress",
          "addressLocality": villePrincipale,
          "addressRegion": "Île-de-France",
          "postalCode": "78300",
          "addressCountry": "FR"
        },
        // C'est ici que la magie opère pour le SEO des services
        "makesOffer": [
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Nettoyage d'immeubles et copropriétés",
              "description": "Entretien des parties communes, escaliers, halls, vitres et sorties de poubelles."
            }
          },
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Nettoyage de bureaux",
              "description": "Ménage complet pour entreprises, dépoussiérage et hygiène des locaux."
            }
          },
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Nettoyage de vitrerie",
              "description": "Lavage de vitres toutes hauteurs et surfaces vitrées."
            }
          }
        ],
        "areaServed": [
          "Poissy", "Saint-Germain-en-Laye", "Versailles", "Mantes-la-Jolie", "Les Yvelines"
        ]
      })
    }
  ]
})

</script>
<style>
</style>