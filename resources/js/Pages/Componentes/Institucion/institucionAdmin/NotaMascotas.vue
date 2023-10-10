<script setup>
import estructuraTextos from '@/Pages/Componentes/Home/estructuraTextos.vue';
</script>

<template>
    <estructuraTextos :loadDataUrl="'/Nmascota/bannerData'" :registerBannerUrl="'/Nmascota/registrarBanner'"
        :editBannerUrl="'/Nmascota/editarBanner'" :deleteBannerUrl="'/Nmascota/eliminarBanner'" />
</template>