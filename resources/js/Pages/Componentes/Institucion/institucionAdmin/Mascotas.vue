<script setup>
import estructuraTextos from '@/Pages/Componentes/Home/estructuraTextos.vue';
</script>

<template>
     <TabView ref="tabview1" class="p-3">
        <TabPanel header="Nota Mascotas">
            <estructuraTextos :loadDataUrl="'/Nmascota/bannerData'" :registerBannerUrl="'/Nmascota/registrarBanner'"
             :editBannerUrl="'/Nmascota/editarBanner'" :deleteBannerUrl="'/Nmascota/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Mensaje Poli&Polo">
            <estructuraTextos :loadDataUrl="'/mensaje/bannerData'" :registerBannerUrl="'/mensaje/registrarBanner'"
        :editBannerUrl="'/mensaje/editarBanner'" :deleteBannerUrl="'/mensaje/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Spoty Poli%Polo">
            <estructuraTextos :loadDataUrl="'/spoty/bannerData'" :registerBannerUrl="'/spoty/registrarBanner'"
        :editBannerUrl="'/spoty/editarBanner'" :deleteBannerUrl="'/spoty/eliminarBanner'" />
        </TabPanel>
    </TabView>
    
</template>

