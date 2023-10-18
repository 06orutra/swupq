<script>
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
import carruselEstructura from "@/Pages/Componentes/Home/carruselEstructura.vue";
import opcionesCarrusel from "@/Pages/Componentes/Home/opcionesCarrusel.vue";
import estructuraTextos from "@/Pages/Componentes/Home/estructuraTextos.vue";
import estructuraImg from "@/Pages/Componentes/Home/estructuraImg.vue";
import NotaMascotas from "@/Pages/Componentes/Institucion/institucionAdmin/NotaMascotas.vue";
import MensajeRector from '@/Pages/Componentes/Institucion/institucionAdmin/mensajeRector.vue';
import cicloAlumando from '@/Pages/Componentes/Institucion/institucionAdmin/cicloAlumnado.vue';
import modalModEdu from '@/Pages/Componentes/Institucion/institucionAdmin/modalModEdu.vue';
import informesModEdu from '@/Pages/Componentes/Institucion/institucionAdmin/informesModEdu.vue';
import filosofia from "@/Pages/Componentes/Institucion/institucionAdmin/filosofia.vue";
import historia from './historia.vue';

export default {
    components: {
        TabView,
        TabPanel,
        carruselEstructura,
        opcionesCarrusel,
        estructuraTextos,
        estructuraImg,
        MensajeRector,
        NotaMascotas,
        cicloAlumando,
        modalModEdu,
        informesModEdu,
        filosofia,
        historia,
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
        <TabPanel header="Nota Mascotas">
            <NotaMascotas/>
        </TabPanel>
        <TabPanel header="Rector">
            <MensajeRector/>
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
        <TabPanel header="Ciclo en curso">
            <cicloAlumando/>
        </TabPanel>
        <TabPanel header="Modal (Bolitas)">
            <modalModEdu/>
        </TabPanel>
        <TabPanel header="Informes del Rector">
            <informesModEdu/>
        </TabPanel>

    </TabView>
</template>