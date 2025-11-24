<template>
    <section class="relative mt-12 min-h-screen bg-gray-50 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
      
      <div class="flex flex-col lg:flex-row bg-white rounded-2xl shadow-2xl overflow-hidden max-w-6xl w-full">
        
        <div class="lg:w-5/12 bg-blue relative flex flex-col text-white p-10 lg:p-12 justify-between">
          
          <div class="absolute inset-0 z-0 opacity-40 pointer-events-none">
            <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="" class="w-full h-full object-cover" />
          </div>
  
          <div class="relative z-10">
            <h2 class="text-4xl font-extrabold tracking-tight mb-6">
              Besoin d'un nettoyage ?
            </h2>
            <p class="text-blue-100 text-lg mb-8">
              Ne perdez plus de temps. Obtenez une estimation précise et gratuite pour vos besoins d'entretien et de services.
            </p>
            
            <ul class="space-y-5 text-lg font-medium">
              <li class="flex items-center">
                <div class="bg-white/20 p-2 rounded-full mr-4">
                  <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                Réponse garantie sous 24h
              </li>
              <li class="flex items-center">
                <div class="bg-white/20 p-2 rounded-full mr-4">
                  <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                Devis 100% Gratuit & Sans engagement
              </li>
              <li class="flex items-center">
                <div class="bg-white/20 p-2 rounded-full mr-4">
                  <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                Intervention Professionnelle
              </li>
            </ul>
          </div>
  
          <div class="relative z-10 mt-12">
            <p class="text-sm text-blue-200 opacity-80">Moon Services &copy; 2024</p>
          </div>
        </div>
  
        <div class="lg:w-7/12 p-8 lg:p-12 bg-white relative">
          <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Demandez votre devis</h1>
            <p class="text-gray-500 mt-2 text-sm">Remplissez le formulaire ci-dessous, cela ne prend que quelques instants.</p>
          </div>
  
          <form @submit.prevent="submitForm" class="space-y-5">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
              <div class="flex flex-col">
                <label for="prenom" class="text-sm font-bold text-gray-700 mb-1">Prénom <span class="text-red-500">*</span></label>
                <input id="prenom" v-model="form.prenom" type="text" placeholder="Prenom" class="w-full p-3 border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all shadow-sm" required />
              </div>
              <div class="flex flex-col">
                <label for="nom" class="text-sm font-bold text-gray-700 mb-1">Nom <span class="text-red-500">*</span></label>
                <input id="nom" v-model="form.nom" type="text" placeholder="Nom" class="w-full p-3 border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all shadow-sm" required />
              </div>
            </div>
  
            <div class="flex flex-col">
              <label for="company" class="text-sm font-bold text-gray-700 mb-1">Entreprise / Copropriété</label>
              <input id="company" v-model="form.company" type="text" placeholder="Entreprise" class="w-full p-3 border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all shadow-sm" />
            </div>
  
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
              <div class="flex flex-col">
                <label for="email" class="text-sm font-bold text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
                <input id="email" v-model="form.email" type="email" placeholder="exemple@gmail.com" class="w-full p-3 border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all shadow-sm" required />
              </div>
              <div class="flex flex-col">
                <label for="phone" class="text-sm font-bold text-gray-700 mb-1">Téléphone <span class="text-red-500">*</span></label>
                <input id="phone" v-model="form.phone" type="tel" placeholder="07 00 00 00 00" class="w-full p-3 border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all shadow-sm" required />
              </div>
            </div>
  
            <div class="flex flex-col relative">
              <label class="text-sm font-bold text-gray-700 mb-1">Services demandés <span class="text-red-500">*</span></label>
              
              <div v-if="showDropdown" @click="showDropdown = false" class="fixed inset-0 z-10 cursor-default"></div>
  
              <div 
                @click="showDropdown = !showDropdown"
                class="relative z-20 w-full p-3 border border-gray-300 rounded-lg bg-white cursor-pointer focus:outline-none transition-all shadow-sm flex flex-wrap gap-2 items-center justify-between min-h-[52px]"
                :class="{'ring-2 ring-green-500 border-green-500': showDropdown}"
              >
                
                <div v-if="form.services.length > 0" class="flex flex-wrap gap-2 w-full pr-6">
                  <span 
                    v-for="service in form.services" 
                    :key="service"
                    class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm font-semibold flex items-center"
                  >
                    {{ service }}
                    <button @click.stop="removeService(service)" class="ml-1 hover:text-blue-600 focus:outline-none flex items-center">
                      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                  </span>
                </div>
                <span v-else class="text-gray-400">Sélectionnez vos services...</span>
  
                <svg 
                  class="w-5 h-5 text-gray-500 absolute right-3 top-1/2 transform -translate-y-1/2 transition-transform duration-200" 
                  :class="{'rotate-180': showDropdown}"
                  fill="none" stroke="currentColor" viewBox="0 0 24 24"
                >
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
              </div>
  
              <div 
                v-if="showDropdown" 
                class="absolute z-30 top-full left-0 right-0 mt-1 bg-white border border-gray-200 rounded-lg shadow-xl max-h-60 overflow-y-auto"
              >
                <div 
                  v-for="option in availableServices" 
                  :key="option"
                  @click="toggleService(option)"
                  class="px-4 py-3 hover:bg-gray-50 cursor-pointer flex items-center justify-between border-b border-gray-100 last:border-0"
                >
                  <span :class="{'font-bold text-blue-700': form.services.includes(option), 'text-gray-700': !form.services.includes(option)}">
                    {{ option }}
                  </span>
                  <svg v-if="form.services.includes(option)" class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
              </div>
            </div>
            <div>
              <label for="message" class="text-sm font-bold text-gray-700 mb-1">Message <span class="text-red-500">*</span></label>
              <textarea id="message" v-model="form.message" rows="4" placeholder="Décrivez brièvement votre besoin..." class="w-full p-3 border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all shadow-sm" required></textarea>
            </div>
  
            <div class="pt-2 flex justify-end">
              <button
                type="submit"
                :disabled="isSubmitting"
                class="md:w-1/2 w-full bg-green-600 hover:bg-green-700 text-white font-bold py-4 px-6 rounded-lg shadow-md hover:shadow-lg transform transition-all hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 text-lg flex justify-center items-center disabled:opacity-50 disabled:cursor-not-allowed"
              >
                <span v-if="!isSubmitting">Envoyer ma demande de devis</span>
                <span v-else class="flex items-center">
                  <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                  </svg>
                  Envoi en cours...
                </span>
              </button>
            </div>
  
          </form>
        </div>
      </div>
  
      <transition name="toast">
        <div 
          v-if="toast.visible" 
          class="fixed top-5 right-5 z-50 flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white rounded-lg shadow-xl border-l-4"
          :class="toast.type === 'success' ? 'border-green-500' : 'border-red-500'"
          role="alert"
        >
          <div :class="[
            'inline-flex items-center justify-center flex-shrink-0 w-8 h-8 rounded-lg',
            toast.type === 'success' ? 'text-green-500 bg-green-100' : 'text-red-500 bg-red-100'
          ]">
            <svg v-if="toast.type === 'success'" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            <svg v-else class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          </div>
          
          <div class="pl-2 text-sm font-normal text-gray-800">{{ toast.message }}</div>
          
          <button @click="toast.visible = false" type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8">
              <span class="sr-only">Close</span>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          </button>
        </div>
      </transition>
  
    </section>
  </template>
  
  <script setup>
  import { ref, reactive } from 'vue';
  
  const isSubmitting = ref(false);
  const showDropdown = ref(false);
  
  const availableServices = [ 'Nettoyage et entretien de parties communes d\'immeubles', 'Gestion des locaux poubelles', 'Nettoyage de bureaux et locaux', 'Remplacement de gardiens d’immeuble', 'Autre' ];
  
  const form = reactive({ prenom: '', nom: '', company: '', email: '', phone: '', services: [], message: '' });
  
  // --- GESTION DU TOAST ---
  const toast = reactive({
    visible: false,
    message: '',
    type: 'success' // 'success' ou 'error'
  });
  
  let toastTimeout;
  
  const triggerToast = (message, type = 'success') => {
    toast.message = message;
    toast.type = type;
    toast.visible = true;
    
    if (toastTimeout) clearTimeout(toastTimeout);
    
    toastTimeout = setTimeout(() => {
      toast.visible = false;
    }, 4000);
  };
  
  // --- LOGIQUE FORMULAIRE ---
  const toggleService = (service) => {
    if (form.services.includes(service)) form.services = form.services.filter(s => s !== service);
    else form.services.push(service);
  };
  
  const removeService = (service) => {
    form.services = form.services.filter(s => s !== service);
  };
  
  const submitForm = async () => {
    if(form.services.length === 0) {
      triggerToast("Veuillez sélectionner au moins un service.", "error");
      return;
    }
  
    isSubmitting.value = true;
  
    const formData = new FormData();
    formData.append('prenom', form.prenom);
    formData.append('nom', form.nom);
    formData.append('company', form.company);
    formData.append('email', form.email);
    formData.append('phone', form.phone);
    formData.append('message', form.message);
    form.services.forEach(service => formData.append('services[]', service));
  
    try {
      const response = await fetch('/form-handler.php', { 
        method: 'POST',
        body: formData
      });
  
      const result = await response.json();
  
      if (response.ok && result.success) {
        triggerToast(`Merci ${form.prenom}, votre demande a bien été envoyée !`, "success");
        
        // Réinitialiser le formulaire
        Object.assign(form, { prenom: '', nom: '', company: '', email: '', phone: '', services: [], message: '' });
      } else {
        throw new Error(result.error || "Une erreur inconnue est survenue.");
      }
  
    } catch (error) {
      console.error("Erreur d'envoi:", error);
      triggerToast("Erreur lors de l'envoi. Vérifiez votre connexion ou le chemin du fichier PHP.", "error");
    } finally {
      isSubmitting.value = false;
    }
  };
  </script>
  
  <style scoped>
  /* Animation d'entrée et de sortie du Toast (Slide depuis la droite + Fondu) */
  .toast-enter-active,
  .toast-leave-active {
    transition: all 0.4s ease;
  }
  
  .toast-enter-from,
  .toast-leave-to {
    opacity: 0;
    transform: translateX(100%); 
  }
  
  .toast-enter-to,
  .toast-leave-from {
    opacity: 1;
    transform: translateX(0);
  }
  </style>