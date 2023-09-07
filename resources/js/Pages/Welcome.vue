<script setup>
import { Head, Link } from '@inertiajs/vue3';
import RedesSociales from '@/Pages/Componentes/RedesSociales.vue';
import AppEstructure from '@/Layouts/mainEstructure/AppEstructure.vue';
import bannerPrincipal from '@/Pages/Componentes/Welcome/bannerPrincipal.vue';
import TourCardenal from '@/Layouts/homeComponents/TourCardenal.vue';

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
    
        <!-- <Videos /> -->
        <bannerPrincipal />
        <TourCardenal/>
    </AppEstructure>

<RedesSociales />

</template>

<style></style>
