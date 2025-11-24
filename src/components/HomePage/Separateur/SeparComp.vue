<template>
    <section class="section visible">
        <div class="relative flex flex-col items-center lg:mx-12 mx-6 md:mb-12 mb-6">
            <div class="flex flex-col justify-center items-center w-full p-8 lg:p-12 bg-white/80 shadow-2xl rounded-b-2xl border border-gray-200">
                <h1 class="md:text-4xl text-2xl font-bold text-gray-900 text-center leading-tight">
                    {{ title }}
                </h1>
                <p class="md:text-xl text-lg text-gray-700 mt-4 text-center">
                    {{ subtitle }}
                </p>
                <ButtonHeaderOrgan v-if="button" :text="buttonText"/>
            </div>
        </div>
    </section>
</template>

<script setup>

import ButtonHeaderOrgan from '../../ButtonHeaderOrgan.vue';
defineProps({
    button: {
        type: Boolean,
        default: false
    },
    title: {
        type: String,
        default: 'Votre titre ici'
    },
    subtitle: {
        type: String,
        default: ''
    },
    buttonText:{
        type: String,
        default: ''
    }
});
</script>