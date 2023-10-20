<script setup>
import estructuraTextos from '@/Pages/Componentes/Home/estructuraTextos.vue'
import estructuraImg from '@/Pages/Componentes/Home/estructuraImg.vue'
import carruselEstructura from '../../Home/carruselEstructura.vue';
</script>


<template>
    <TabView ref="tabview1" class="p-3">
        <TabPanel header="Carrusel Principal">
            <estructuraImg :loadDataUrl="'/lenguaExtraImgPrincipal/bannerData'" :registerBannerUrl="'/lenguaExtraImgPrincipal/registrarBanner'"
                :editBannerUrl="'/lenguaExtraImgPrincipal/editarBanner'" :deleteBannerUrl="'/lenguaExtraImgPrincipal/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Carrusel secundario">
            <estructuraImg :loadDataUrl="'/lenguaExtraImgSecundario/bannerData'" :registerBannerUrl="'/lenguaExtraImgSecundario/registrarBanner'"
                :editBannerUrl="'/lenguaExtraImgSecundario/editarBanner'" :deleteBannerUrl="'/lenguaExtraImgSecundario/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Objetivos">
            <estructuraTextos :Titulo="'Objetivo'" :Subtitulo="'Contenido'" :loadDataUrl="'/lenguaExtraObjetivo/bannerData'" :registerBannerUrl="'/lenguaExtraObjetivo/registrarBanner'"
                :editBannerUrl="'/lenguaExtraObjetivo/editarBanner'" :deleteBannerUrl="'/lenguaExtraObjetivo/eliminarBanner'" />
        </TabPanel>
        

    </TabView>
</template>