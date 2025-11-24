<template>
    <section class="section visible">
        <section class="relative w-full mt-24 px-4 md:px-12 lg:px-20 pb-32">
            <div class="flex flex-col justify-center items-center mb-12">
                <h1 class="text-3xl md:text-5xl font-bold text-center mb-5">
                    Nos Services
                </h1>
                <hr class="w-3/4 md:w-1/2 border-2 border-green rounded-lg">
            </div>
            <div class="relative flex flex-col lg:flex-row gap-8 mx-auto max-w-6xl">
                <div class="flex flex-col text-base md:text-lg w-full lg:w-1/2 space-y-6">
                    <PresServices 
                        span="Nettoyage et entretien d’immeuble : " 
                        text="Nettoyage et entretien d’immeuble, avec un nettoyage rigoureux des parties communes."
                    />
                    <PresServices 
                        span="Nettoyage de locaux professionnels : " 
                        text="Un nettoyage efficace et discret."
                    />
                    <PresServices 
                        span="Nettoyage de remise en état : " 
                        text="Un espace propre avant votre emménagement ou après votre départ."
                    />
                    <PresServices 
                        span="Lavage de vitres : " 
                        text="Nettoyage de vos vitres pour redonner éclat et luminosité à vos espaces."
                    />
                    <PresServices 
                        span="Remplacement de gardien : " 
                        text="Des remplaçants compétents et réactifs pour assurer la continuité de service."
                    />
                    
                    
                    <div class="flex flex-col md:justify-end justify-center items-center md:items-end relative z-10">
                        <a href="/services" class="font-bold text-vert">
                            En savoir plus →
                        </a>
                        <hr class="border-2 border-green rounded-lg w-24">
                    </div>
                </div>
                <div class="w-full lg:w-1/2 mb-10">
                    <div class="bg-white flex flex-row gap-4 shadow-md p-5 rounded-lg">
                        <div class="grid md:gap-4 gap-2 w-full md:w-1/2">
                            <img src="../../../assets/img/photoBur.webp" loading="lazy" class="h-40 md:h-80 w-full rounded-lg object-cover" alt="Nettoyage de bureaux professionnels">
                            <img src="../../../assets/img/photoCont.webp" loading="lazy" class="h-28 w-full rounded-lg object-cover" alt="Nettoyage de conteneurs professionnels">
                        </div>
                        <div class="grid gap-4 w-full md:w-1/2">
                            <img src="../../../assets/img/photoVitre.webp" loading="lazy" class="h-28 w-full rounded-lg object-cover" alt="Nettoyage de vitres professionnels">
                            <img src="../../../assets/img/image1.webp" loading="lazy" class="h-40 md:h-80 w-full rounded-lg object-cover" alt="Nettoyage de bâtiments professionnels">
                        </div>
                    </div>

                </div>
            </div>
            <div class="absolute left-0 bottom-0 w-full h-32 bg-blue z-0">

            </div>
        </section>
    </section>
</template>

<script setup>
import PresServices from './PresServices.vue';
</script>