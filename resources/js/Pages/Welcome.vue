<script setup>
import { Head, Link } from '@inertiajs/vue3';
import RedesSociales from '@/Pages/Componentes/RedesSociales.vue';
import Polo from '@/Components/Polo.vue';
import Videos from '@/Pages/Componentes/Home/Videos.vue';
import AppEstructure from '@/Layouts/mainEstructure/AppEstructure.vue';
import bannerPrincipal from '@/Pages/Componentes/Welcome/bannerPrincipal.vue';

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
        <Polo />
        <!-- <Videos /> -->
        <bannerPrincipal />
    </AppEstructure>

<RedesSociales />

</template>

<style></style>
