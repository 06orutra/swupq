<script setup>
import Videos from "@/Pages/Componentes/Home/Videos.vue";
import carruselImagenes from "./carruselEstructura.vue";
import opcionesCarrusel from "@/Pages/Componentes/Home/opcionesCarrusel.vue";

</script>


<template>
        <TabView ref="tabview2" class="p-2">
            <TabPanel header="Videos">
                <Videos/>
            </TabPanel>
            <TabPanel header="Carrusel 1">
                <opcionesCarrusel id="carrusel1" />
                <carruselImagenes :loadDataUrl="'/bannerDataprimero'" :registerBannerUrl="'primero/registrarBanner'" :editBannerUrl="'primero/editarBanner'" :deleteBannerUrl="'primero/eliminarBanner'"/>
            </TabPanel>
            <TabPanel header="Carrusel 2">
                <opcionesCarrusel id="carrusel2" />
                <carruselImagenes :loadDataUrl="'/bannerDatasegundo'" :registerBannerUrl="'segundo/registrarBanner'" :editBannerUrl="'segundo/editarBanner'" :deleteBannerUrl="'segundo/eliminarBanner'"/>
            </TabPanel>
            <TabPanel header="Carrusel 3">
                <opcionesCarrusel id="carrusel3" />
                <carruselImagenes :loadDataUrl="'/bannerDatatercero'" :registerBannerUrl="'tercer/registrarBanner'" :editBannerUrl="'tercer/editarBanner'" :deleteBannerUrl="'tercer/eliminarBanner'"/>
            </TabPanel>
        </TabView>
</template>