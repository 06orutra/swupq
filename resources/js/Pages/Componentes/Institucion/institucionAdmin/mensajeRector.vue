<script setup>
import carruselEstructura from '@/Pages/Componentes/Home/carruselEstructura.vue';
import estructuraTextos from '@/Pages/Componentes/Home/estructuraTextos.vue';
</script>

<template>
    <TabView>
        <TabPanel header="Mensaje Rector">
            <carruselEstructura :loadDataUrl="'rector/bannerData'" :registerBannerUrl="'/rector/registrarBanner'"
                :editBannerUrl="'/rector/editarBanner'" :deleteBannerUrl="'/rector/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Informe Rector">
            <estructuraTextos :loadDataUrl="'informe/bannerData'" :registerBannerUrl="'/informe/registrarBanner'"
                :editBannerUrl="'/informe/editarBanner'" :deleteBannerUrl="'/informe/eliminarBanner'" />
        </TabPanel>
    </TabView>
</template>