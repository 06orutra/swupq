<script>
import carruselNoticias from "@/Pages/Componentes/Home/carruselNoticias.vue";
import carruselDividido from "@/Pages/Componentes/Home/carruselDividido.vue";
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
import carruselEstructura from "./carruselEstructura.vue";

export default {
    components: {
        TabView,
        TabPanel,
        carruselNoticias,
        carruselDividido,
        carruselEstructura,
    },
}
</script>

<template>
    <TabView ref="tabview1" class="p-3">
        <TabPanel header="Carrusel Principal">
            <carruselEstructura :loadDataUrl="'/bannerData'" :registerBannerUrl="'/home/registrarBanner'"
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