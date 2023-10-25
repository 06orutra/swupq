<script setup>
import carruselEstructura from '@/Pages/Componentes/Home/carruselEstructura.vue';
import estructuraTextos from '@/Pages/Componentes/Home/estructuraTextos.vue';
import estructuraImg from '@/Pages/Componentes/Home/estructuraImg.vue';
</script>

<template>
    <TabView>
        <TabPanel header="Datos Rector">
            <p>Este componente solo aceptara el <span style="color: red; font-weight: bold; ">Primer</span> elemento del registro</p>
            <carruselEstructura :Titulo="'Nombre del Rector'" :Subtitulo="'Cargo'" :loadDataUrl="'rector/bannerData'" :registerBannerUrl="'/rector/registrarBanner'"
                :editBannerUrl="'/rector/editarBanner'" :deleteBannerUrl="'/rector/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Informes del Rector">
            <estructuraTextos :Titulo="'Título o Fecha de Subida'" :Subtitulo="'Enlace'" :loadDataUrl="'informe/bannerData'" :registerBannerUrl="'/informe/registrarBanner'"
                :editBannerUrl="'/informe/editarBanner'" :deleteBannerUrl="'/informe/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Banner">
            <p>Este componente solo aceptara el <span style="color: red; font-weight: bold; ">Primer</span> elemento del registro</p>
            <estructuraImg :loadDataUrl="'rectorBanner/bannerData'" :registerBannerUrl="'/rectorBanner/registrarBanner'"
                :editBannerUrl="'/rectorBanner/editarBanner'" :deleteBannerUrl="'/rectorBanner/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Mensaje del Rector">
            <p>Este componente solo aceptara el <span style="color: red; font-weight: bold; ">Primer</span> elemento del registro</p>
            <estructuraTextos :Titulo="'Título'" :Subtitulo="'Contenido'" :loadDataUrl="'rectorParrafo/bannerData'" :registerBannerUrl="'/rectorParrafo/registrarBanner'"
                :editBannerUrl="'/rectorParrafo/editarBanner'" :deleteBannerUrl="'/rectorParrafo/eliminarBanner'" />
        </TabPanel>
    </TabView>
</template>