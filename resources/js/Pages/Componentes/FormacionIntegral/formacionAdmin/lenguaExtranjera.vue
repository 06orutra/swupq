<script setup>
import estructuraTextos from '@/Pages/Componentes/Home/estructuraTextos.vue'
import estructuraImg from '@/Pages/Componentes/Home/estructuraImg.vue'
import carruselEstructura from '../../Home/carruselEstructura.vue';
</script>


<template>
    <TabView ref="tabview1" class="p-3">
        <TabPanel header="Carrusel Principal">
            <carruselEstructura :Titulo="'Titulo'" :Subtitulo="'Link'" :loadDataUrl="'/historiaImgPrinc/bannerData'" :registerBannerUrl="'/historiaImgPrinc/registrarBanner'"
                :editBannerUrl="'/historiaImgPrinc/editarBanner'" :deleteBannerUrl="'/historiaImgPrinc/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Carrusel secundario">
            
        </TabPanel>

    </TabView>
</template>