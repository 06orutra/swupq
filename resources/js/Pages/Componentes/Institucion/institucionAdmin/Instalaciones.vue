<script setup>
import estructuraImg from '@/Pages/Componentes/Home/estructuraImg.vue';
</script>

<template>
     <TabView ref="tabview1" class="p-3">
        <TabPanel header="Carrusel Institucion">
            <estructuraImg :loadDataUrl="'/Cinstalaciones/bannerData'" :registerBannerUrl="'/Cinstalaciones/registrarBanner'"
        :editBannerUrl="'/Cinstalaciones/editarBanner'" :deleteBannerUrl="'/Cinstalaciones/eliminarBanner'" />
        </TabPanel>
    </TabView>
</template>