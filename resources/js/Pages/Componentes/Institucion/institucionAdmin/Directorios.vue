<script setup>
import estructuraTextos from '@/Pages/Componentes/Home/estructuraTextos.vue';
import estructuraImg from '@/Pages/Componentes/Home/estructuraImg.vue';
</script>

<template>
     <TabView ref="tabview1" class="p-3">
        <TabPanel header="Banner Directorio">
            <estructuraImg :loadDataUrl="'/BannerDirectorio/bannerData'" :registerBannerUrl="'/BannerDirectorio/registrarBanner'"
        :editBannerUrl="'/BannerDirectorio/editarBanner'" :deleteBannerUrl="'/BannerDirectorio/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Rectorpìa">
            <estructuraTextos :loadDataUrl="'/rectoria/bannerData'" :registerBannerUrl="'/rectoria/registrarBanner'"
        :editBannerUrl="'/rectoria/editarBanner'" :deleteBannerUrl="'/rectoria/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Secretarìa Acadèmica">
            <estructuraTextos :loadDataUrl="'/Sacademica/bannerData'" :registerBannerUrl="'/Sacademica/registrarBanner'"
        :editBannerUrl="'/Sacademica/editarBanner'" :deleteBannerUrl="'/Sacademica/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Secretarìa Administrativa">
            <estructuraTextos :loadDataUrl="'/Sadministrativa/bannerData'" :registerBannerUrl="'/Sadministrativa/registrarBanner'"
        :editBannerUrl="'/Sadministrativa/editarBanner'" :deleteBannerUrl="'/Sadministrativa/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Direcciòn De Planeaciòn">
            <estructuraTextos :loadDataUrl="'/DPlanneacion/bannerData'" :registerBannerUrl="'/DPlanneacion/registrarBanner'"
        :editBannerUrl="'/DPlanneacion/editarBanner'" :deleteBannerUrl="'/DPlanneacion/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Abogado General">
            <estructuraTextos :loadDataUrl="'/AboGeneral/bannerData'" :registerBannerUrl="'/AboGeneral/registrarBanner'"
        :editBannerUrl="'/AboGeneral/editarBanner'" :deleteBannerUrl="'/AboGeneral/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Direcciòn De Tecnologìas De Informaciòn Y Comunicaciòn">
            <estructuraTextos :loadDataUrl="'/DTecInfCom/bannerData'" :registerBannerUrl="'/DTecInfCom/registrarBanner'"
        :editBannerUrl="'/DTecInfCom/editarBanner'" :deleteBannerUrl="'/DTecInfCom/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Direcciòn De Vinculaciòn">
            <estructuraTextos :loadDataUrl="'/Dvinculacion/bannerData'" :registerBannerUrl="'/Dvinculacion/registrarBanner'"
        :editBannerUrl="'/Dvinculacion/editarBanner'" :deleteBannerUrl="'/Dvinculacion/eliminarBanner'" />
        </TabPanel>
    </TabView>
    
    
</template>