<script>
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
import carruselEstructura from "@/Pages/Componentes/Home/carruselEstructura.vue";
import opcionesCarrusel from "@/Pages/Componentes/Home/opcionesCarrusel.vue";
import estructuraImg from '../../Home/estructuraImg.vue';

export default {
    components: {
        TabView,
        TabPanel,
        carruselEstructura,
        opcionesCarrusel,
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
            <estructuraImg :loadDataUrl="'/igualdadLaboralPrincipal/bannerData'" :registerBannerUrl="'/igualdadLaboralPrincipal/registrarBanner'" :editBannerUrl="'/igualdadLaboralPrincipal/editarBanner'" :deleteBannerUrl="'/igualdadLaboralPrincipal/eliminarBanner'" />
        </TabPanel>
    </TabView>
</template>