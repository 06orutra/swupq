<script>
import carruselNoticias from "@/Pages/Componentes/Home/carruselNoticias.vue";
import carruselDividido from "@/Pages/Componentes/Home/carruselDividido.vue";
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
import carruselEstructura from "./carruselEstructura.vue";
import OpcionesCarrusel from "@/Pages/Componentes/Home/opcionesCarrusel.vue";

export default {
    components: {
        TabView,
        TabPanel,
        carruselNoticias,
        carruselDividido,
        carruselEstructura,
        OpcionesCarrusel,
    },
    methods: {
        updateCarouselSettings(settings) {
            this.navigation = settings.navigation;
            this.pagination = settings.pagination;
            this.startAutoPlay = settings.startAutoPlay;
            this.timeout = settings.timeout;
            console.log(settings);
        }
    }
}
</script>

<template>
    <TabView ref="tabview1" class="p-3">
        <TabPanel header="Carrusel Principal">
            <OpcionesCarrusel :id="carruselPrincipal" @configuracion-guardada="guardarConfiguracion" />
            <carruselEstructura :loadDataUrl="'bannerData'" :registerBannerUrl="'/home/registrarBanner'"
                :editBannerUrl="'/home/editarBanner'" :deleteBannerUrl="'/home/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Carrusel Secundario">
            <carruselNoticias />
        </TabPanel>
        <TabPanel header="Carrusel Dividido">
            <carruselDividido />
        </TabPanel>
    </TabView>
</template>