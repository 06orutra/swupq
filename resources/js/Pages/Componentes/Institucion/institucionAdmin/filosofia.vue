<script setup>
import estructuraTextos from '@/Pages/Componentes/Home/estructuraTextos.vue'
import estructuraImg from '@/Pages/Componentes/Home/estructuraImg.vue'
import carruselEstructura from '@/Pages/Componentes/Home/carruselEstructura.vue'
</script>


<template>
    <TabView ref="tabview1" class="p-3">
        <TabPanel header="Filosofía">
            <estructuraTextos :Titulo="'Filosofía'" :subtitulo="'Contenido'" :loadDataUrl="'/filosofia/bannerData'" :registerBannerUrl="'/filosofia/registrarBanner'"
                :editBannerUrl="'/filosofia/editarBanner'" :deleteBannerUrl="'/filosofia/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Imagenes">
            <estructuraImg :loadDataUrl="'/filosofiaImg/bannerData'" :registerBannerUrl="'/filosofiaImg/registrarBanner'"
                :editBannerUrl="'/filosofiaImg/editarBanner'" :deleteBannerUrl="'/filosofiaImg/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Valores">
            <carruselEstructura :titulo="'hola'" :subtitulo="'adions'" :loadDataUrl="'/filosofiaValor/bannerData'" :registerBannerUrl="'/filosofiaValor/registrarBanner'"
                :editBannerUrl="'/filosofiaValor/editarBanner'" :deleteBannerUrl="'/filosofiaValor/eliminarBanner'" />
        </TabPanel>
    </TabView>
</template>