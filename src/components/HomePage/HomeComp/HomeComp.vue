<template>
  <section class="relative h-screen w-full">
    <!-- Image de fond -->

    <!-- Carte blanche avec blur -->
    <div
      class="relative z-10 flex h-7/8 justify-center md:justify-start items-end"
    >
      <div
        class="flex flex-col w-4/5 md:w-1/2 ml-0 md:ml-12 p-6 md:p-9 rounded-lg bg-white/60 backdrop-blur-sm shadow-xl"
      >
        <h1 class="md:text-5xl text-[#014562] text-3xl font-bold">
          <i> Un entretien écoresponsable de vos espaces </i>
        </h1>

        <!-- Texte secondaire -->
        <p class="md:text-xl text-base text-justify mt-6">
          Moon Services, entreprise de nettoyage basée à Carrières-sous-Poissy
          (78), propose des prestations d’entretien professionnelles adaptées
          aux copropriétés, entreprises, commerces et collectivités locales
          grâce à une organisation moderne et des méthodes écoresponsables.
        </p>

        <!-- Bouton -->
        <div class="flex mt-8 w-full">
          <a href="/services">
            <button
              class="px-6 py-3 bg-vert text-white rounded-lg text-xl hover:bg-green-700 transition"
            >
              Voir nos Services
            </button>
          </a>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
/* Couleur personnalisée pour ton bouton */
.bg-vert {
  background-color: #02638c;
}
.bg-vert:hover {
  background-color: #014f66;
}
</style>
