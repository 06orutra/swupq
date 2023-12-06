<script setup>
    import estructuraBotones from '@/Pages/Componentes/Home/estructuraTextosBotones.vue'
    import estructuraResponse from '@/Pages/Componentes/Home/estructuraResponse.vue';
    import estructuraTextos from '@/Pages/Componentes/Home/estructuraTextos.vue';
</script>


<template>
    <TabView ref="tabview1" class="p-3">
        <TabPanel header="Mensaje de Bienvenida">
            <estructuraTextos :Titulo="'Titulo'" :Subtitulo="'Mensaje'" :loadDataUrl="'/chatWelcome/bannerData'" :registerBannerUrl="'/chatWelcome/registrarBanner'"
                :editBannerUrl="'/chatWelcome/editarBanner'" :deleteBannerUrl="'/chatWelcome/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Botones y Texto">
            <estructuraBotones :Titulo="'Nombre del Botón'" :Subtitulo="'Mensaje de respuesta'" :loadDataUrl="'/chatButtons/bannerData'" :registerBannerUrl="'/chatButtons/registrarBanner'"
                :editBannerUrl="'/chatButtons/editarBanner'" :deleteBannerUrl="'/chatButtons/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Enlaces y etiquetas de respuestas">
            <estructuraResponse :Titulo="'Nombre del Botón'" :Subtitulo="'Enlace'" :loadDataUrl="'/chatResponse/bannerData'" :registerBannerUrl="'/chatResponse/registrarBanner'"
                :editBannerUrl="'/chatResponse/editarBanner'" :deleteBannerUrl="'/chatResponse/eliminarBanner'" />
        </TabPanel>
    </TabView>
</template>