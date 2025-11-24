<template>
    <section class="section visible">
        <section class="flex flex-col items-center my-16 w-full bg-white mt-12">
            <div class="flex flex-col justify-center items-center mb-16 w-full">
                <h2 class="text-3xl md:text-5xl font-bold text-center mb-5">
                    Nos engagements
                </h2>
                <hr class="w-1/2 border-2 border-green rounded-lg">
            </div>
            <div class="flex md:flex-row flex-col w-3/4 md:mt-12 shadow-lg bg-white rounded-xl">
                <div class="flex flex-col w-full">
                    <EngagementDiv 
                        title="Comportement écoresponsable" 
                        :imgSrc="planeteterreImage"
                    />
                    <EngagementDiv 
                        title="Suivi de qualité transparent" 
                        :imgSrc="suiviImage"
                    />
                    <EngagementDiv 
                        title="Suivi de qualité transparent" 
                        :imgSrc="carriereImage"
                    />
                </div>
                <div class="flex flex-col w-full">
                    <EngagementDiv 
                        title="Gestion numérique" 
                        :imgSrc="sensibleImage"
                    />
                    <EngagementDiv 
                        title="Flexibilité et personnalisation" 
                        :imgSrc="disponibiliteImage"
                    />
                    <EngagementDiv 
                        title="Votre satisfaction" 
                        :imgSrc="satisfactionImage"
                    />
                </div>

            </div>
            <div class="flex flex-col justify-end text-xl items-end w-3/4">
                <a href="/engagements" class="mt-7 font-bold">
                        En savoir plus →
                </a>
                <hr class="border-2 border-green rounded-lg w-24">
            </div>
        </section>
    </section>
</template>

<script setup>
import EngagementDiv from './EngagementDiv.vue';

// importer les images en tant que modules
import carriereImage from '../../../assets/img/icon/carriere.webp';
import disponibiliteImage from '../../../assets/img/icon/disponibilite.webp';
import satisfactionImage from '../../../assets/img/icon/la-satisfaction.webp';
import planeteterreImage from '../../../assets/img/icon/planete-terre.webp';
import sensibleImage from '../../../assets/img/icon/sensible.webp';
import suiviImage from '../../../assets/img/icon/suivi.webp';

</script>
