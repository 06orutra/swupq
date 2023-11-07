<script setup>
import estructuraImg from '@/Pages/Componentes/Home/estructurapdf2.vue';
</script>

<template>
    <TabView ref="tabview1" class="p-3">
        <TabPanel header="Constitucion">
            <estructuraImg :loadDataUrl="'/ConstitucionDocumentos/bannerData'" :registerBannerUrl="'/ConstitucionDocumentos/registrarBanner'"
                :editBannerUrl="'/ConstitucionDocumentos/editarBanner'" :deleteBannerUrl="'/ConstitucionDocumentos/eliminarBanner'" />
        </TabPanel>
    </TabView>
</template>

<style scoped>
</style>
