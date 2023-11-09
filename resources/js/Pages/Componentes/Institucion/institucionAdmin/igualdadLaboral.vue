<script>
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
import carruselEstructura from "@/Pages/Componentes/Home/carruselEstructura.vue";
import opcionesCarrusel from "@/Pages/Componentes/Home/opcionesCarrusel.vue";
import estructuraImg from '../../Home/estructuraImg.vue';
import estructuraTextos from '../../Home/estructuraTextos.vue';
import estructurapdf2 from '../../Home/estructurapdf2.vue';

export default {
    components: {
        TabView,
        TabPanel,
        carruselEstructura,
        opcionesCarrusel,
        estructuraImg,
        estructuraTextos,
        estructurapdf2
    },
}
</script>

<template>
    <TabView ref="tabview1" class="p-3">
        <TabPanel header="Carrusel Principal">
            <estructuraImg :loadDataUrl="'/igualdadLaboralPrincipal/bannerData'" :registerBannerUrl="'/igualdadLaboralPrincipal/registrarBanner'" :editBannerUrl="'/igualdadLaboralPrincipal/editarBanner'" :deleteBannerUrl="'/igualdadLaboralPrincipal/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Textos">
            <estructuraTextos :Titulo="'Titulo:'" :Subtitulo="'Contenido:'" :loadDataUrl="'/IgualdadLaboralTextos/bannerData'" :registerBannerUrl="'/IgualdadLaboralTextos/registrarBanner'" :editBannerUrl="'/IgualdadLaboralTextos/editarBanner'" :deleteBannerUrl="'/IgualdadLaboralTextos/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Pdf">
            <estructurapdf2  :loadDataUrl="'/IgualdadLaboralPdf/bannerData'" :registerBannerUrl="'/IgualdadLaboralPdf/registrarBanner'" :editBannerUrl="'/IgualdadLaboralPdf/editarBanner'" :deleteBannerUrl="'/IgualdadLaboralPdf/eliminarBanner'" />
        </TabPanel>
    </TabView>
</template>