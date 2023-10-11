<script setup>
import estructuraTextos from '@/Pages/Componentes/Home/estructuraTextos.vue'

</script>


<template>
<estructuraTextos :loadDataUrl="'/filosofia/bannerData'" :registerBannerUrl="'/filosofia/registrarBanner'"
                :editBannerUrl="'/filosofia/editarBanner'" :deleteBannerUrl="'/filosofia/eliminarBanner'"  />

</template>