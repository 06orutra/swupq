<script setup>
//informesModEdu.vue se encarga de guardar los informes del rector
import estructuraTextos from '@/Pages/Componentes/Home/estructuraTextos.vue';
</script>

<template>
    <estructuraTextos :loadDataUrl="'/informesModEdu/bannerData'" :registerBannerUrl="'/informesModEdu/registrarBanner'"
        :editBannerUrl="'/informesModEdu/editarBanner'" :deleteBannerUrl="'/informesModEdu/eliminarBanner'" />
</template>