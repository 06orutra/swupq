<script>
import Videos from "@/Pages/Componentes/Home/Videos.vue";
import carruselImagenes from "./carruselEstructura.vue";
import opcionesCarrusel from "./opcionesCarrusel.vue";

export default {
    components: {
        Videos,
        carruselImagenes,
        opcionesCarrusel,
    },
    methods: {
        updateCarouselSettings(settings) {
            this.navigation = settings.navigation;
            this.pagination = settings.pagination;
            this.startAutoPlay = settings.startAutoPlay;
            this.timeout = settings.timeout;
        },
    }
}
</script>


<template>
    <TabView ref="tabview2" class="p-2">
        <TabPanel header="Videos">
            <Videos />
        </TabPanel>
        <TabPanel header="Carrusel 1">
            <opcionesCarrusel id="carruselDividido" @configuracion-guardada="updateCarouselSettings" />
            <carruselImagenes :Titulo="'Titulo'" :Subtitulo="'Link'" :loadDataUrl="'/bannerDataprimero'" :registerBannerUrl="'primero/registrarBanner'" :editBannerUrl="'primero/editarBanner'" :deleteBannerUrl="'primero/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Carrusel 2">
            <carruselImagenes :Titulo="'Titulo'" :Subtitulo="'Link'" :loadDataUrl="'/bannerDatasegundo'" :registerBannerUrl="'segundo/registrarBanner'" :editBannerUrl="'segundo/editarBanner'" :deleteBannerUrl="'segundo/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Carrusel 3">
            <carruselImagenes :Titulo="'Titulo'" :Subtitulo="'Link'" :loadDataUrl="'/bannerDatatercero'" :registerBannerUrl="'tercer/registrarBanner'" :editBannerUrl="'tercer/editarBanner'" :deleteBannerUrl="'tercer/eliminarBanner'" />
        </TabPanel>
    </TabView>
</template>

