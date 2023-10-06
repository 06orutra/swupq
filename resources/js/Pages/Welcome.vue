<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Videos from '@/Pages/Componentes/Home/Videos.vue';
import RedesSociales from '@/Pages/Componentes/Home/RedesSociales.vue';
import AppEstructure from '@/Layouts/mainEstructure/AppEstructure.vue';
import carruselPrincipalLogic from '@/Pages/Componentes/Welcome/carruselPrincipalLogic.vue';
import TourCardenal from '@/Layouts/homeComponents/TourCardenal.vue';
import SplitterVue from '@/Layouts/homeComponents/Splitter.vue';
import carruselSecundario from './Componentes/Welcome/carruselSecundario.vue';
import CarrierBanner from '@/Pages/Componentes/CarrierBanner.vue';


defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});

</script>

<template>
    <Head title="Welcome" />
    
    <AppEstructure>          
        <!-- mandamos a llamar en la principal  -->


        <carruselPrincipalLogic />
        <CarrierBanner />
        <carruselSecundario />
        <TourCardenal />
        <SplitterVue />

    </AppEstructure>

    <RedesSociales />
</template>

<style></style>