<script setup>
import carruselEstructura from '@/Pages/Componentes/Home/carruselEstructura.vue';
import estructuraImg from '@/Pages/Componentes/Home/estructuraImg.vue';
</script>

<template>
    <TabView ref="tabview1" class="p-3">
    <TabPanel header="Banner Ubicacion">
            <estructuraImg :loadDataUrl="'/BannerUbicacion/bannerData'" :registerBannerUrl="'/BannerUbicacion/registrarBanner'"
        :editBannerUrl="'/BannerUbicacion/editarBanner'" :deleteBannerUrl="'/BannerUbicacion/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Imagen Ubicacion">
    <carruselEstructura :Titulo="'Teléfono'" :Subtitulo="'Email'" :loadDataUrl="'ubicacion/bannerData'" :registerBannerUrl="'/ubicacion/registrarBanner'"
    :editBannerUrl="'/ubicacion/editarBanner'" :deleteBannerUrl="'/ubicacion/eliminarBanner'" />
</TabPanel>
</TabView>
</template>