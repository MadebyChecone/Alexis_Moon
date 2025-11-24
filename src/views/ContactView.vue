<template>
  <HeaderComp/>
  
  <main>
    <ContactComp/>
  </main>
  
  </template>

<script setup>
import { useHead } from '@vueuse/head'
import HeaderComp from '../components/HomePage/Header/HeaderComp.vue';
import ContactComp from '../components/ContactPage/ContactComp.vue';
// import FooterComp from '../components/FooterComp.vue';

// --- Configuration SEO Spécifique à la page Contact ---

const villePrincipale = "Poissy";
const telephone = "06 14 60 25 76";
const email = "contact@moon-services.fr";
const siteUrl = "https://moonservices.fr";

useHead({
  // Titre: Action (Contactez) + Marque + Localisation + Service
  title: `Contactez Moon Services | Devis Nettoyage à ${villePrincipale} (78)`,
  
  link: [
    { rel: 'canonical', href: `${siteUrl}/contact` } // Assure-toi que l'URL est bonne
  ],

  meta: [
    {
      name: 'description',
      // Description incitative qui donne les moyens de contact immédiatement
      content: `Besoin d'un devis gratuit ? Contactez Moon Services au ${telephone} ou par email. Entreprise de nettoyage réactive à ${villePrincipale} et dans tout le 78.`
    },
    {
      name: 'keywords',
      content: 'contact moon services, devis nettoyage 78, téléphone entreprise nettoyage, adresse moon services, nettoyage poissy contact'
    },
    // Open Graph (Pour un partage propre sur LinkedIn/Facebook/WhatsApp)
    { property: 'og:title', content: 'Contactez Moon Services - Devis Gratuit' },
    { property: 'og:description', content: `Appelez-nous au ${telephone} pour l'entretien de vos locaux et immeubles.` },
    { property: 'og:type', content: 'website' },
    { property: 'og:url', content: `${siteUrl}/contact` },
    { property: 'og:image', content: `${siteUrl}/img/accueil.webp` }, // Image par défaut
    
    { name: 'robots', content: 'index, follow' }
  ],

  script: [
    {
      type: 'application/ld+json',
      // Schema spécifique "ContactPage"
      innerHTML: JSON.stringify({
        "@context": "https://schema.org",
        "@type": "ContactPage",
        "name": "Contact Moon Services",
        "description": "Page de contact pour demander un devis de nettoyage.",
        "url": `${siteUrl}/contact`,
        "mainEntity": {
          "@type": "LocalBusiness",
          "name": "Moon Services",
          "telephone": telephone,
          "email": email,
          "url": siteUrl,
          "address": {
            "@type": "PostalAddress",
            "addressLocality": villePrincipale,
            "addressRegion": "Île-de-France",
            "postalCode": "78300",
            "addressCountry": "FR"
          },
          // On répète les horaires ici pour Google
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
          ]
        }
      })
    }
  ]
})
</script>

<style>
/* Ton style global si nécessaire */
</style>