<script>
import estructuraImg from '../../Home/estructuraImg.vue';
import estructuraTextos from '../../Home/estructuraTextos.vue';
export default {
    components: {
        estructuraImg,
        estructuraTextos,
    },

}
</script>

<template>
    <TabView ref="tabview1" class="p-3">
        <TabPanel header="Carrusel Principal">
            <estructuraImg :loadDataUrl="'/representativoPrin/bannerData'"
                :registerBannerUrl="'/representativoPrin/registrarBanner'"
                :editBannerUrl="'/representativoPrin/editarBanner'"
                :deleteBannerUrl="'/representativoPrin/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Texto">
            <estructuraTextos :Titulo="'Objetivo'" :Subtitulo="'Contenido'" :loadDataUrl="'/representativoTexto/bannerData'"
                :registerBannerUrl="'/representativoTexto/registrarBanner'"
                :editBannerUrl="'/representativoTexto/editarBanner'"
                :deleteBannerUrl="'/representativoTexto/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Cultura Física, Deporte, y Recreación">
            <estructuraImg :loadDataUrl="'/representativoDeporte/bannerData'"
                :registerBannerUrl="'/representativoDeporte/registrarBanner'"
                :editBannerUrl="'/representativoDeporte/editarBanner'"
                :deleteBannerUrl="'/representativoDeporte/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Difusión Cultural y Artistica (DICART)">
        <estructuraImg :loadDataUrl="'/representativoCultura/bannerData'"
            :registerBannerUrl="'/representativoCultura/registrarBanner'"
            :editBannerUrl="'/representativoCultura/editarBanner'"
            :deleteBannerUrl="'/representativoCultura/eliminarBanner'" />
    </TabPanel>
</TabView></template>