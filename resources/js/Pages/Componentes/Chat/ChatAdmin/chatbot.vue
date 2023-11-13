<script setup>
    import estructuraBotones from '@/Pages/Componentes/Home/estructuraTextosBotones.vue'

</script>


<template>
    <TabView ref="tabview1" class="p-3">
        <TabPanel header="Botones y Texto">
            <estructuraBotones :Titulo="'Nombre del Botón'" :Subtitulo="'Mensaje de respuesta'" :loadDataUrl="'/chatButtons/bannerData'" :registerBannerUrl="'/chatButtons/registrarBanner'"
                :editBannerUrl="'/chatButtons/editarBanner'" :deleteBannerUrl="'/chatButtons/eliminarBanner'" />
        </TabPanel>
    </TabView>
</template>