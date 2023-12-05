<script>
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
import estructuraImg from '../../Home/estructuraImg.vue';
import estructuraTextos from '../../Home/estructuraTextos.vue';
import OpcionesCarrusel from '../../Home/opcionesCarrusel.vue';
import estructuraPdf from '../../Home/estructuraPdf.vue';
import estructurapdf2 from '../../Home/estructurapdf2.vue';


export default {
    components: {
    TabView,
    TabPanel,
    estructuraImg,
    estructuraTextos,
    OpcionesCarrusel,
    estructuraPdf,
    estructurapdf2,
},
    methods: {
        updateCarouselSettings(settings) {
            this.navigation = settings.navigation;
            this.pagination = settings.pagination;
            this.startAutoPlay = settings.startAutoPlay;
            this.timeout = settings.timeout;
        },
    }
};
</script>

<template>
    <TabView ref="tabview1" class="p-3">
        <TabPanel header="Carrusel Principal">
            <estructuraImg :loadDataUrl="'/SistemaCalidadImgPrincipal/bannerData'"
                :registerBannerUrl="'/SistemaCalidadImgPrincipal/registrarBanner'"
                :editBannerUrl="'/SistemaCalidadImgPrincipal/editarBanner'"
                :deleteBannerUrl="'/SistemaCalidadImgPrincipal/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Textos">
            <estructuraTextos :Titulo="'Titulo:'" :Subtitulo="'Contenido:'" :loadDataUrl="'/SistemaCalidadTexto/bannerData'"
                :registerBannerUrl="'/SistemaCalidadTexto/registrarBanner'"
                :editBannerUrl="'/SistemaCalidadTexto/editarBanner'"
                :deleteBannerUrl="'/SistemaCalidadTexto/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Imagen Secundaria">
            <OpcionesCarrusel id="carruselCalidadSecundario" @configuracion-guardada="updateCarouselSettings" />
            <estructuraImg :loadDataUrl="'/SistemaCalidadImgSecundaria/bannerData'"
                :registerBannerUrl="'/SistemaCalidadImgSecundaria/registrarBanner'"
                :editBannerUrl="'/SistemaCalidadImgSecundaria/editarBanner'"
                :deleteBannerUrl="'/SistemaCalidadImgSecundaria/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Pdf">
            <estructuraPdf :loadDataUrl="'/SistemaCalidadPdf/bannerData'" :registerBannerUrl="'/SistemaCalidadPdf/registrarBanner'" :editBannerUrl="'/SistemaCalidadPdf/editarBanner'" :deleteBannerUrl="'/SistemaCalidadPdf/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Pdf Consulta Aqui">
            <estructurapdf2 :loadDataUrl="'/SistemaCalidadPdfConsulta/bannerData'" :registerBannerUrl="'/SistemaCalidadPdfConsulta/registrarBanner'" :editBannerUrl="'/SistemaCalidadPdfConsulta/editarBanner'" :deleteBannerUrl="'/SistemaCalidadPdfConsulta/eliminarBanner'" />
        </TabPanel>
    </TabView>
</template>