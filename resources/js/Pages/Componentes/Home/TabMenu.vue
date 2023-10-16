<script>
import carruselNoticias from "@/Pages/Componentes/Home/carruselNoticias.vue";
import carruselDividido from "@/Pages/Componentes/Home/carruselDividido.vue";
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
import carruselEstructura from "./carruselEstructura.vue";
import opcionesCarrusel from "./opcionesCarrusel.vue";
import estructuraTextos from "./estructuraTextos.vue";
import estructuraImg from "./estructuraImg.vue";

export default {
    components: {
        TabView,
        TabPanel,
        carruselNoticias,
        carruselDividido,
        carruselEstructura,
        opcionesCarrusel,
        estructuraTextos,
        estructuraImg,
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
            <carruselEstructura :Titulo="'Titulo'" :Subtitulo="'Link'" :loadDataUrl="'/bannerData'" :registerBannerUrl="'/home/registrarBanner'"
                :editBannerUrl="'/home/editarBanner'" :deleteBannerUrl="'/home/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Carrusel Secundario">
            <opcionesCarrusel id="carruselSecundario" @configuracion-guardada="updateCarouselSettings" />
            <carruselNoticias />
        </TabPanel>
        <TabPanel header="Carrusel Dividido">
            <carruselDividido />
        </TabPanel>
        <TabPanel header="textos">
            <estructuraTextos :loadDataUrl="'/texto/bannerData'" :registerBannerUrl="'/texto/registrarBanner'"
                :editBannerUrl="'/texto/editarBanner'" :deleteBannerUrl="'/texto/eliminarBanner'"  />
        </TabPanel>
        <TabPanel header="Imagenes">
            <estructuraImg :loadDataUrl="'/img/bannerData'" :registerBannerUrl="'/img/registrarBanner'"
                :editBannerUrl="'/img/editarBanner'" :deleteBannerUrl="'/img/eliminarBanner'"  />
        </TabPanel>
    </TabView>
</template>