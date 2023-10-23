<script setup>
import carruselEstructura from '@/Pages/Componentes/Home/carruselEstructura.vue';
import estructuraTextos from '@/Pages/Componentes/Home/estructuraTextos.vue';
import estructuraImg from '@/Pages/Componentes/Home/estructuraImg.vue';
</script>

<template>
    <TabView>
        <TabPanel header="Mensaje Rector">
            <carruselEstructura :Titulo="'Nombre del Rector'" :Subtitulo="'Contenido'" :loadDataUrl="'rector/bannerData'" :registerBannerUrl="'/rector/registrarBanner'"
                :editBannerUrl="'/rector/editarBanner'" :deleteBannerUrl="'/rector/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Informe Rector">
            <estructuraTextos :Titulo="'Título o Fecha de Subida'" :Subtitulo="'Enlace'" :loadDataUrl="'informe/bannerData'" :registerBannerUrl="'/informe/registrarBanner'"
                :editBannerUrl="'/informe/editarBanner'" :deleteBannerUrl="'/informe/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Banner">
            <estructuraImg :loadDataUrl="'rectorBanner/bannerData'" :registerBannerUrl="'/rectorBanner/registrarBanner'"
                :editBannerUrl="'/rectorBanner/editarBanner'" :deleteBannerUrl="'/rectorBanner/eliminarBanner'" />
        </TabPanel>
    </TabView>
</template>