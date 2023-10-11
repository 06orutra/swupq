<script setup>
import carruselEstructura from '@/Pages/Componentes/Home/carruselEstructura.vue';
</script>

<template>
    <carruselEstructura :loadDataUrl="'rector/bannerData'" :registerBannerUrl="'/rector/registrarBanner'" :editBannerUrl="'/rector/editarBanner'" :deleteBannerUrl="'/rector/eliminarBanner'" />
</template>