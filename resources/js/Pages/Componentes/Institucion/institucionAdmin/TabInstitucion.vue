<script>
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
import carruselEstructura from "@/Pages/Componentes/Home/carruselEstructura.vue";
import opcionesCarrusel from "@/Pages/Componentes/Home/opcionesCarrusel.vue";
import estructuraTextos from "@/Pages/Componentes/Home/estructuraTextos.vue";
import estructuraTexto2 from "@/Pages/Componentes/Home/estructuraTexto2.vue";
import estructuraImg from "@/Pages/Componentes/Home/estructuraImg.vue";
import estructuraimagen2 from "@/Pages/Componentes/Home/estructuraimagen2.vue";
import Mascotas from "@/Pages/Componentes/Institucion/institucionAdmin/Mascotas.vue";

export default {
    components: {
        TabView,
        TabPanel,
        carruselEstructura,
        opcionesCarrusel,
        estructuraTextos,
        estructuraTexto2,
        estructuraImg,
        estructuraimagen2,
        Mascotas,
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
        <TabPanel header="textos">
            <estructuraTextos :loadDataUrl="'/texto/bannerData'" :registerBannerUrl="'/texto/registrarBanner'"
                :editBannerUrl="'/texto/editarBanner'" :deleteBannerUrl="'/texto/eliminarBanner'"  />
        </TabPanel>
        <TabPanel header="Imagenes">
            <estructuraImg :loadDataUrl="'/img/bannerData'" :registerBannerUrl="'/img/registrarBanner'"
                :editBannerUrl="'/img/editarBanner'" :deleteBannerUrl="'/img/eliminarBanner'"  />
        </TabPanel>
        <TabPanel header="Mascotas">
            <Mascotas/>
        </TabPanel>
    </TabView>
</template>