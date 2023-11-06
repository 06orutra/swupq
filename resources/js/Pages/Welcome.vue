<script setup>
//import { Head, Link } from '@inertiajs/vue3';
//import Videos from '@/Pages/Componentes/Home/Videos.vue';
import AppEstructure from '@/Layouts/mainEstructure/AppEstructure.vue';
import TourCardenal from '@/Layouts/homeComponents/TourCardenal.vue';
import SplitterVue from '@/Layouts/homeComponents/Splitter.vue';
import carruselSecundario from './Componentes/Welcome/carruselSecundario.vue';
import CarrierBanner from '@/Pages/Componentes/CarrierBanner.vue';
import Directorio from './Componentes/Institucion/Directorio.vue';
import Karo from '@/Layouts/homeComponents/Karo.vue'

</script>

<template>
    <Head title="Welcome" />
    
    <AppEstructure :controllerName="'/bannerData'">          

        <CarrierBanner />
        <carruselSecundario />
        <TourCardenal />
        <Directorio />
        <SplitterVue />

    </AppEstructure>

</template>