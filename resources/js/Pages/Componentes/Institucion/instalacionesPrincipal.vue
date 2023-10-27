<script setup>
import { Head, Link } from '@inertiajs/vue3';
import RedesSociales from '@/Pages/Componentes/Home/RedesSociales.vue';
import AppEstructure from '@/Layouts/mainEstructure/AppEstructure.vue';
import CarruselInstitucion from '@/Pages/Componentes/Institucion/InstalacionesComponentes/CarruselInstitucion.vue';


</script>

<template>
  <div>
    <AppEstructure :controllerName="'/BannerMascotas/bannerData'">
      <div >
        <CarruselInstitucion/>
      </div>
    </AppEstructure>
    <RedesSociales />a
  </div>
</template>
  
<style scoped>


@media (max-width: 2560px) {

}
@media (max-width: 1440px) {
}
@media (max-width: 1024px) {
}
@media (max-width: 768px) {
}
@media (max-width: 425px) {
}
@media (max-width: 375px) {
}
@media (max-width: 320px) {
}


</style>