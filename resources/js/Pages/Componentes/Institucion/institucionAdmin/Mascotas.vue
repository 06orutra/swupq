<script setup>
import estructuraTextos from '@/Pages/Componentes/Home/estructuraTextos.vue';
import estructuraTexto2 from '@/Pages/Componentes/Home/estructuraTexto2.vue';
import estructuraImg from '@/Pages/Componentes/Home/estructuraImg.vue';
</script>

<template>
    <TabView ref="tabview1" class="p-3">
        <TabPanel header="Mensaje Poli&Polo">
            <estructuraTextos :loadDataUrl="'/mensaje/bannerData'" :registerBannerUrl="'/mensaje/registrarBanner'"
                :editBannerUrl="'/mensaje/editarBanner'" :deleteBannerUrl="'/mensaje/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Spoty Poli%Polo">
            <br>
            <p><span style="color: rgb(255, 0, 221); font-weight: bold; ">link poli</span>
                <span style="display: inline-block; text-align: center; width: 100%;">
                    <span style="color: rgb(255, 0, 0); font-weight: bold; ">"Solo se puede tener un registro"</span>
                </span>
            </p>
            <estructuraTexto2 :loadDataUrl="'/spotypoli/bannerData'" :registerBannerUrl="'/spotypoli/registrarBanner'"
                :editBannerUrl="'/spotypoli/editarBanner'" :deleteBannerUrl="'/spotypoli/eliminarBanner'" />
            <br>
            <hr class="blue-divider">
            <p>
                <span style="color: rgb(0, 17, 255); font-weight: bold; ">link polo</span>
                <span style="display: inline-block; text-align: center; width: 100%;">
                    <span style="color: rgb(255, 0, 0); font-weight: bold; ">"Solo se puede tener un registro"</span>
                </span>
            </p>
            <estructuraTexto2 :loadDataUrl="'/spotypolo/bannerData'" :registerBannerUrl="'/spotypolo/registrarBanner'"
                :editBannerUrl="'/spotypolo/editarBanner'" :deleteBannerUrl="'/spotypolo/eliminarBanner'" />
        </TabPanel>
        <TabPanel header="Carrusel Mascotas">
            <estructuraImg :loadDataUrl="'/Cmascotas/bannerData'" :registerBannerUrl="'/Cmascotas/registrarBanner'"
                :editBannerUrl="'/Cmascotas/editarBanner'" :deleteBannerUrl="'/Cmascotas/eliminarBanner'" />
        </TabPanel>
    </TabView>
</template>

<style scoped>
.blue-divider {
    border: 1px solid rgb(151, 151, 168);
    margin: 10px 0;
    /* Ajusta el margen superior e inferior según tus necesidades */
}
</style>
