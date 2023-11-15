<script setup>

import AppEstructure from '@/Layouts/mainEstructure/AppEstructure.vue';
import TourCardenal from '@/Layouts/homeComponents/TourCardenal.vue';
import SplitterVue from '@/Layouts/homeComponents/Splitter.vue';
import carruselSecundario from './Componentes/Welcome/carruselSecundario.vue';
import CarrierBanner from '@/Pages/Componentes/CarrierBanner.vue';

</script>

<template>
    <Head title="Welcome" />
    
    <AppEstructure :controllerName="'/bannerData'">

        <CarrierBanner />
        <carruselSecundario />
        <TourCardenal />
        <SplitterVue />

    </AppEstructure>
</template>
