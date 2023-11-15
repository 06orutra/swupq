<script setup>
import estructuraTextos from '@/Pages/Componentes/Home/estructuraTextos.vue'
import estructuraImg from '@/Pages/Componentes/Home/estructuraImg.vue'
import carruselEstructura from '../../Home/carruselEstructura.vue';
import estructuraPdf from '../../Home/estructuraPdf.vue';
</script>


<template>
    <TabView ref="tabview1" class="p-3">
        <TabPanel header="Carrusel Principal">
            <estructuraImg :loadDataUrl="'/desarrolloHumnPrinc/bannerData'" :registerBannerUrl="'/desarrolloHumnPrinc/registrarBanner'"
                :editBannerUrl="'/desarrolloHumnPrinc/editarBanner'" :deleteBannerUrl="'/desarrolloHumnPrinc/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Texto">
            <estructuraTextos :Titulo="'Objetivo'" :Subtitulo="'Contenido'" :loadDataUrl="'/desarrolloHumnTexto/bannerData'" :registerBannerUrl="'/desarrolloHumnTexto/registrarBanner'"
                :editBannerUrl="'/desarrolloHumnTexto/editarBanner'" :deleteBannerUrl="'/desarrolloHumnTexto/eliminarBanner'" />
            </TabPanel>
        <TabPanel header="Desarrollos">
            <carruselEstructura :Titulo="'Departamento'" :Subtitulo="'Contenido'" :loadDataUrl="'/desarrolloHumnDesarrollos/bannerData'" :registerBannerUrl="'/desarrolloHumnDesarrollos/registrarBanner'"
                :editBannerUrl="'/desarrolloHumnDesarrollos/editarBanner'" :deleteBannerUrl="'/desarrolloHumnDesarrollos/eliminarBanner'" />
        </TabPanel>
    </TabView>
</template>