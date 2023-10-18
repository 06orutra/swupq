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
        <TabPanel header="Historia">
            <br>
            <p>Este componente solo aceptara el <span style="color: red; font-weight: bold; ">Primer</span> elemento del registro</p>
            <br>
            <estructuraTextos :Titulo="'Historia'" :Subtitulo="'Contenido'" :loadDataUrl="'/historiaTexto/bannerData'" :registerBannerUrl="'/historiaTexto/registrarBanner'"
                :editBannerUrl="'/historiaTexto/editarBanner'" :deleteBannerUrl="'/historiaTexto/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Video">
            <h1>Falta estructura y crud de video</h1>    
        </TabPanel>
        <TabPanel header="Carruseles">
            <estructuraImg :loadDataUrl="'/historiaCarrusel/bannerData'" :registerBannerUrl="'/historiaCarrusel/registrarBanner'"
                :editBannerUrl="'/historiaCarrusel/editarBanner'" :deleteBannerUrl="'/historiaCarrusel/eliminarBanner'" />
        </TabPanel>
    </TabView>
</template>