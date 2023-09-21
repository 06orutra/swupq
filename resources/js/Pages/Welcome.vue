<script setup>
import { Head, Link } from '@inertiajs/vue3';
import RedesSociales from '@/Pages/Componentes/Home/RedesSociales.vue';
import AppEstructure from '@/Layouts/mainEstructure/AppEstructure.vue';
import bannerPrincipal from '@/Pages/Componentes/Welcome/bannerPrincipal.vue';
import TourCardenal from '@/Layouts/homeComponents/TourCardenal.vue';
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


        <bannerPrincipal />
        <TourCardenal />


    </AppEstructure>

    <CarrierBanner />
    <RedesSociales />
</template>

<style></style>