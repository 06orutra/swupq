<script>
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
import carruselEstructura from "@/Pages/Componentes/Home/carruselEstructura.vue";
import opcionesCarrusel from "@/Pages/Componentes/Home/opcionesCarrusel.vue";
import estructuraImg from '../../Home/estructuraImg.vue';
import estructuraTextos from '../../Home/estructuraTextos.vue';
import estructurapdf2 from '../../Home/estructurapdf2.vue';
import estructuraPdf from '../../Home/estructuraPdf.vue';

export default {
    components: {
        TabView,
        TabPanel,
        carruselEstructura,
        opcionesCarrusel,
        estructuraImg,
        estructuraTextos,
        estructurapdf2,
        estructuraPdf,
    },
}
</script>

<template>
    <TabView ref="tabview1" class="p-3">
        <TabPanel header="Carrusel Principal">
            <p>Este componente solo aceptara el <span style="color: red; font-weight: bold; ">Primer</span> elemento del registro</p>
            <estructuraImg :loadDataUrl="'/igualdadLaboralPrincipal/bannerData'" :registerBannerUrl="'/igualdadLaboralPrincipal/registrarBanner'" :editBannerUrl="'/igualdadLaboralPrincipal/editarBanner'" :deleteBannerUrl="'/igualdadLaboralPrincipal/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Textos">
            <p>Este componente solo aceptara el <span style="color: red; font-weight: bold; ">Primer</span> elemento del registro</p>
            <estructuraTextos :Titulo="'Titulo:'" :Subtitulo="'Contenido:'" :loadDataUrl="'/IgualdadLaboralTextos/bannerData'" :registerBannerUrl="'/IgualdadLaboralTextos/registrarBanner'" :editBannerUrl="'/IgualdadLaboralTextos/editarBanner'" :deleteBannerUrl="'/IgualdadLaboralTextos/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Pdf">
            <p>Este componente solo aceptara el <span style="color: red; font-weight: bold; ">Primer</span> elemento del registro</p>
            <estructurapdf2  :loadDataUrl="'/IgualdadLaboralPdf/bannerData'" :registerBannerUrl="'/IgualdadLaboralPdf/registrarBanner'" :editBannerUrl="'/IgualdadLaboralPdf/editarBanner'" :deleteBannerUrl="'/IgualdadLaboralPdf/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Imagen Secundaria">
            <p>Este componente solo aceptara el <span style="color: red; font-weight: bold; ">Primer</span> elemento del registro</p>
            <estructuraImg :loadDataUrl="'/IgualdadLaboralImgSecundaria/bannerData'" :registerBannerUrl="'/IgualdadLaboralImgSecundaria/registrarBanner'" :editBannerUrl="'/IgualdadLaboralImgSecundaria/editarBanner'" :deleteBannerUrl="'/IgualdadLaboralImgSecundaria/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Pdfs de Etica">
            <estructuraPdf :loadDataUrl="'/IgualdadLaboralPdfEtica/bannerData'" :registerBannerUrl="'/IgualdadLaboralPdfEtica/registrarBanner'" :editBannerUrl="'/IgualdadLaboralPdfEtica/editarBanner'" :deleteBannerUrl="'/IgualdadLaboralPdfEtica/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Pdfs de Igualdad">
            <estructuraPdf :loadDataUrl="'/IgualdadLaboralPdfIgualdad/bannerData'" :registerBannerUrl="'/IgualdadLaboralPdfIgualdad/registrarBanner'" :editBannerUrl="'/IgualdadLaboralPdfIgualdad/editarBanner'" :deleteBannerUrl="'/IgualdadLaboralPdfIgualdad/eliminarBanner'" />
        </TabPanel>
    </TabView>
</template>