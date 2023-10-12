<script setup>
import carruselEstructura from '@/Pages/Componentes/Home/carruselEstructura.vue';
</script>

<template>
    <carruselEstructura :loadDataUrl="'modalModEdu/bannerData'" :registerBannerUrl="'/modalModEdu/registrarBanner'"
    :editBannerUrl="'/modalModEdu/editarBanner'" :deleteBannerUrl="'/modalModEdu/eliminarBanner'" />
</template>