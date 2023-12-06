<script setup>

    import cicloAlumnado from './cicloAlumnado.vue';
    import modalModEdu from './modalModEdu.vue';
    import estructuraImg from '@/Pages/Componentes/Home/estructuraImg.vue';

</script>

<template>
    <TabView ref="tabview1" class="p-3">
        <TabPanel header="Ciclo Alumnado">
            <p>Este componente solo aceptara el <span style="color: red; font-weight: bold; ">Primer</span> elemento del registro</p>
            <cicloAlumnado/>
        </TabPanel>
        <TabPanel header="Modal">
            <modalModEdu/>
        </TabPanel>
        <TabPanel header="Banner">
            <p>Este componente solo aceptara el <span style="color: red; font-weight: bold; ">Primer</span> elemento del registro</p>
            <estructuraImg :loadDataUrl="'educationalBanner/bannerData'" :registerBannerUrl="'/educationalBanner/registrarBanner'"
                :editBannerUrl="'/educationalBanner/editarBanner'" :deleteBannerUrl="'/educationalBanner/eliminarBanner'" />
        </TabPanel>
    </TabView>
</template>