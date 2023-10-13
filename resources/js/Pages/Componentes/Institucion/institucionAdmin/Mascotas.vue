<script setup>
import estructuraTextos from '@/Pages/Componentes/Home/estructuraTextos.vue';
import estructuraTexto2 from '@/Pages/Componentes/Home/estructuraTexto2.vue';
</script>

<template>
     <TabView ref="tabview1" class="p-3">
        <TabPanel header="Mensaje Poli&Polo">
            <estructuraTextos :loadDataUrl="'/mensaje/bannerData'" :registerBannerUrl="'/mensaje/registrarBanner'"
        :editBannerUrl="'/mensaje/editarBanner'" :deleteBannerUrl="'/mensaje/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Spoty Poli%Polo">
            <estructuraTexto2 :loadDataUrl="'/spotypp/bannerData'" :registerBannerUrl="'/spotypp/registrarBanner'"
        :editBannerUrl="'/spotypp/editarBanner'" :deleteBannerUrl="'/spotypp/eliminarBanner'" />
        </TabPanel>
    </TabView>
    
</template>

