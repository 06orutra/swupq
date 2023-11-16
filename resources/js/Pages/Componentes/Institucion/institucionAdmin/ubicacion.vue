<script setup>
import carruselEstructura from '@/Pages/Componentes/Home/carruselEstructura.vue';
</script>

<template>
    <carruselEstructura :Titulo="'Teléfono'" :Subtitulo="'Email'" :loadDataUrl="'ubicacion/bannerData'" :registerBannerUrl="'/ubicacion/registrarBanner'"
    :editBannerUrl="'/ubicacion/editarBanner'" :deleteBannerUrl="'/ubicacion/eliminarBanner'" />
</template>