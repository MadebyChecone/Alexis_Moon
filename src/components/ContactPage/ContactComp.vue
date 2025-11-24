<script setup >
import { Phone, Mail, Clock, Facebook, Linkedin, MapPin } from 'lucide-vue-next';
</script>
<template>
    <section class="relative md:mt-24 md:mx-2 mt-16 px-4 lg:px-12 py-12 bg-gradient-to-br from-white via-gray-50 to-gray-100 rounded-3xl shadow-xl overflow-hidden">
      <div class="grid lg:grid-cols-5 gap-10 items-stretch">
        
        <!-- 🗺️ Carte -->
        <div class="relative lg:col-span-2 h-72 md:h-full rounded-2xl overflow-hidden shadow-lg">
          <iframe
            class="absolute inset-0 w-full h-full"
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d167649.98706680437!2d1.9687487773437509!3d48.962414709511684!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e68be34c88d9c1%3A0x40b82c3688c42f0!2sCarri%C3%A8res-sous-Poissy!5e0!3m2!1sfr!2sfr!4v1744880464847!5m2!1sfr!2sfr"           
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          ></iframe>
        </div>
  
        <!-- 📞 Informations -->
        <div class="lg:col-span-3 bg-white rounded-2xl shadow-lg p-8 md:p-10 flex flex-col justify-center">
          <h2 class="text-3xl font-bold text-gray-800  border-b-4 border-blue pb-2 inline-block">
            Contact & Informations
          </h2>
          <p class="mt-4 mb-8 text-gray-600">
              Une question ? Un devis ? Notre équipe est à votre écoute pour répondre à tous vos besoins.
            </p>
  
          <div class="space-y-6">
            <!-- Téléphone -->
            <div class="flex items-start gap-5 group">
              <div class="p-3 bg-blue-50 text-[#02638c] rounded-xl group-hover:bg-[#02638c] group-hover:text-white transition-colors duration-300">
                <Phone :size="24" />
              </div>
              <div>
                <p class="text-sm text-gray-400 font-semibold uppercase tracking-wider mb-1">Téléphone</p>
                <a href="tel:0614602576" class="text-xl md:text-2xl font-bold text-[#1a3555] hover:text-[#02638c] transition-colors">
                  06 14 60 25 76
                </a>
              </div>
            </div>
  
            <div class="flex items-start gap-5 group">
              <div class="p-3 bg-blue-50 text-[#02638c] rounded-xl group-hover:bg-[#02638c] group-hover:text-white transition-colors duration-300">
                <Mail :size="24" />
              </div>
              <div>
                <p class="text-sm text-gray-400 font-semibold uppercase tracking-wider mb-1">Email</p>
                <a href="mailto:contact@moon-services.fr" class="text-xl font-medium text-[#1a3555] hover:text-[#02638c] transition-colors break-all">
                  contact@moon-services.fr
                </a>
              </div>
            </div>
  
            <!-- Horaires -->
            <div class="border-t border-gray-200 pt-4">
              <p class="text-sm text-gray-500 uppercase tracking-wide mb-1">Horaires</p>
              <ul class="text-gray-700 space-y-1">
                <li>Lundi à vendredi : <span class="font-medium text-gray-900">8h - 18h</span></li>
                <li>Samedi : <span class="font-medium text-gray-900">9h - 17h</span></li>
              </ul>
            </div>
  
            <!-- Réseaux -->
            <div>
                <div class="flex items-center gap-2 mb-3 text-[#02638c]">
                  <MapPin :size="20" /> <p class="text-sm font-bold uppercase tracking-wide">Suivez-nous</p>
                </div>
                <div class="flex gap-4">
                  <a
                    href="#"
                    class="p-3 bg-gray-50 text-[#1a3555] rounded-xl hover:bg-[#1877F2] hover:text-white transition-all hover:-translate-y-1 shadow-sm"
                    aria-label="Facebook"
                  >
                    <Facebook :size="20" />
                  </a>
    
                  <a
                    href="https://www.linkedin.com/in/alexis-lune-14b2671aa/"
                    target="_blank"
                    rel="noreferrer"
                    class="p-3 bg-gray-50 text-[#1a3555] rounded-xl hover:bg-[#0077b5] hover:text-white transition-all hover:-translate-y-1 shadow-sm"
                    aria-label="LinkedIn"
                  >
                    <Linkedin :size="20" />
                  </a>
                </div>
              </div>
          </div>
        </div>
  
      </div>
    </section>
  </template>
 