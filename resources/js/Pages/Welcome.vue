<script setup>
import { Head, Link } from '@inertiajs/vue3';
import RedesSociales from '@/Pages/Componentes/Home/RedesSociales.vue';
import AppEstructure from '@/Layouts/mainEstructure/AppEstructure.vue';
import carruselPrincipalLogic from '@/Pages/Componentes/Welcome/carruselPrincipalLogic.vue';
import carruselNoticiasLogic from '@/Pages/Componentes/Welcome/carruselNoticiasLogic.vue';
import TourCardenal from '@/Layouts/homeComponents/TourCardenal.vue';
import CarrierBanner from '@/Pages/Componentes/CarrierBanner.vue';
import SplitterVue from '@/Layouts/homeComponents/Splitter.vue';
import carruselSecundario from './Componentes/Welcome/carruselSecundario.vue';
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

        <carruselPrincipalLogic />
        <br>
        <carruselNoticiasLogic />
        <br>
        <TourCardenal />
        <carruselSecundario />



    </AppEstructure>

    <RedesSociales />
</template>

<style></style>