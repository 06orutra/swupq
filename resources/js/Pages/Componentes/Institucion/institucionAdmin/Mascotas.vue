<script setup>
import estructuraTextos from '@/Pages/Componentes/Home/estructuraTextos.vue';
import estructuraTexto2 from '@/Pages/Componentes/Home/estructuraTexto2.vue';
import estructuraimagen2 from '@/Pages/Componentes/Home/estructuraimagen2.vue';
</script>

<template>
     <TabView ref="tabview1" class="p-3">
        <TabPanel header="Mensaje Poli&Polo">
            <estructuraTextos :loadDataUrl="'/mensaje/bannerData'" :registerBannerUrl="'/mensaje/registrarBanner'"
        :editBannerUrl="'/mensaje/editarBanner'" :deleteBannerUrl="'/mensaje/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Spoty Poli%Polo">
            <estructuraTexto2 :loadDataUrl="'/spotypoli/bannerData'" :registerBannerUrl="'/spotypoli/registrarBanner'"
        :editBannerUrl="'/spotypoli/editarBanner'" :deleteBannerUrl="'/spotypoli/eliminarBanner'" />

        <estructuraTexto2 :loadDataUrl="'/spotypolo/bannerData'" :registerBannerUrl="'/spotypolo/registrarBanner'"
        :editBannerUrl="'/spotypolo/editarBanner'" :deleteBannerUrl="'/spotypolo/eliminarBanner'" />
        </TabPanel> 
        <TabPanel header="Carrusel Mascotas">
            <estructuraimagen2 :loadDataUrl="'/Cmascotas/bannerData'" :registerBannerUrl="'/Cmascotas/registrarBanner'"
        :editBannerUrl="'/Cmascotas/editarBanner'" :deleteBannerUrl="'/Cmascotas/eliminarBanner'" />
        </TabPanel>
    </TabView>
    
</template>
