<script setup>
import estructuraTextos from '@/Pages/Componentes/Home/estructuraTextos.vue';
import estructuraImg from '@/Pages/Componentes/Home/estructuraImg.vue';
</script>

<template>
    <TabView ref="tabview1" class="p-3">
        <TabPanel header="Banner Directorio">
            <p>Este componente solo aceptara el <span style="color: red; font-weight: bold; ">Primer</span> elemento del registro</p>
            <estructuraImg :loadDataUrl="'/BannerDirectorio/bannerData'"
                :registerBannerUrl="'/BannerDirectorio/registrarBanner'" :editBannerUrl="'/BannerDirectorio/editarBanner'"
                :deleteBannerUrl="'/BannerDirectorio/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Rectoría">
            <estructuraTextos :Titulo="'Titulo:'" :Subtitulo="'Numero:'" :loadDataUrl="'/rectoria/bannerData'" :registerBannerUrl="'/rectoria/registrarBanner'"
                :editBannerUrl="'/rectoria/editarBanner'" :deleteBannerUrl="'/rectoria/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Secretaría Académica">
            <estructuraTextos :Titulo="'Titulo:'" :Subtitulo="'Numero:'" :loadDataUrl="'/Sacademica/bannerData'" :registerBannerUrl="'/Sacademica/registrarBanner'"
                :editBannerUrl="'/Sacademica/editarBanner'" :deleteBannerUrl="'/Sacademica/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Secretaría Administrativa">
            <estructuraTextos :Titulo="'Titulo:'" :Subtitulo="'Numero:'" :loadDataUrl="'/Sadministrativa/bannerData'"
                :registerBannerUrl="'/Sadministrativa/registrarBanner'" :editBannerUrl="'/Sadministrativa/editarBanner'"
                :deleteBannerUrl="'/Sadministrativa/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Dirección De Planeación">
            <estructuraTextos :Titulo="'Titulo:'" :Subtitulo="'Numero:'" :loadDataUrl="'/DPlanneacion/bannerData'" :registerBannerUrl="'/DPlanneacion/registrarBanner'"
                :editBannerUrl="'/DPlanneacion/editarBanner'" :deleteBannerUrl="'/DPlanneacion/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Abogado General">
            <estructuraTextos :Titulo="'Titulo:'" :Subtitulo="'Numero:'" :loadDataUrl="'/AboGeneral/bannerData'" :registerBannerUrl="'/AboGeneral/registrarBanner'"
                :editBannerUrl="'/AboGeneral/editarBanner'" :deleteBannerUrl="'/AboGeneral/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Dirección De Tecnologías De Información Y Comunicación">
            <estructuraTextos :Titulo="'Titulo:'" :Subtitulo="'Numero:'" :loadDataUrl="'/DTecInfCom/bannerData'" :registerBannerUrl="'/DTecInfCom/registrarBanner'"
                :editBannerUrl="'/DTecInfCom/editarBanner'" :deleteBannerUrl="'/DTecInfCom/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Dirección De Vinculación">
            <estructuraTextos :Titulo="'Titulo:'" :Subtitulo="'Numero:'" :loadDataUrl="'/Dvinculacion/bannerData'" :registerBannerUrl="'/Dvinculacion/registrarBanner'"
                :editBannerUrl="'/Dvinculacion/editarBanner'" :deleteBannerUrl="'/Dvinculacion/eliminarBanner'" />
        </TabPanel>
    </TabView>
</template>