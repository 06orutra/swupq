<script>
import carruselNoticias from "@/Pages/Componentes/Home/carruselNoticias.vue";
import carruselDividido from "@/Pages/Componentes/Home/carruselDividido.vue";
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
import carruselEstructura from "./carruselEstructura.vue";
import opcionesCarrusel from "./opcionesCarrusel.vue";

export default {
    components: {
        TabView,
        TabPanel,
        carruselNoticias,
        carruselDividido,
        carruselEstructura,
        opcionesCarrusel,
    },
    methods: {
        updateCarouselSettings(settings) {
            this.navigation = settings.navigation;
            this.pagination = settings.pagination;
            this.startAutoPlay = settings.startAutoPlay;
            this.timeout = settings.timeout;
        }
    }
}
</script>

<template>
    <TabView ref="tabview1" class="p-3">
        <TabPanel header="Carrusel Principal">
            <opcionesCarrusel id="carruselPrincipal" @configuracion-guardada="updateCarouselSettings" />
            <carruselEstructura :loadDataUrl="'/bannerData'" :registerBannerUrl="'/home/registrarBanner'"
                :editBannerUrl="'/home/editarBanner'" :deleteBannerUrl="'/home/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Carrusel Secundario">
            <opcionesCarrusel id="carruselSecundario" @configuracion-guardada="updateCarouselSettings" />
            <carruselNoticias />
        </TabPanel>
        <TabPanel header="Carrusel Dividido">
            <carruselDividido />
        </TabPanel>
    </TabView>
</template>