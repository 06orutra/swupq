<script>
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
import carruselEstructura from "@/Pages/Componentes/Home/carruselEstructura.vue";
import opcionesCarrusel from "@/Pages/Componentes/Home/opcionesCarrusel.vue";
import estructuraTextos from "@/Pages/Componentes/Home/estructuraTextos.vue";
import estructuraTexto2 from "@/Pages/Componentes/Home/estructuraTexto2.vue";
import estructuraImg from "@/Pages/Componentes/Home/estructuraImg.vue";
import Mascotas from "@/Pages/Componentes/Institucion/institucionAdmin/Mascotas.vue";
import filosofia from "@/Pages/Componentes/Institucion/institucionAdmin/filosofia.vue";
import Instalaciones from "@/Pages/Componentes/Institucion/institucionAdmin/Instalaciones.vue";
import Directorios from "@/Pages/Componentes/Institucion/institucionAdmin/Directorios.vue";
import historia from './historia.vue';

export default {
    components: {
        TabView,
        TabPanel,
        carruselEstructura,
        opcionesCarrusel,
        estructuraTextos,
        estructuraTexto2,
        estructuraImg,
        Mascotas,
        filosofia,
        historia,
        Instalaciones,
        Directorios,
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
                :editBannerUrl="'/texto/editarBanner'" :deleteBannerUrl="'/texto/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Imagenes">
            <estructuraImg :loadDataUrl="'/img/bannerData'" :registerBannerUrl="'/img/registrarBanner'"
                :editBannerUrl="'/img/editarBanner'" :deleteBannerUrl="'/img/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Historia">
            <historia />
        </TabPanel>
        <TabPanel header="Filosofía">
            <filosofia />
        </TabPanel>
        <TabPanel header="Mascotas">
            <Mascotas/>
        </TabPanel>
        <TabPanel header="Instalaciones">
            <Instalaciones/>
        </TabPanel>
        <TabPanel header="Directorios">
            <Directorios/>
        </TabPanel>
    </TabView>
</template>