<script setup>
import { Head, Link } from '@inertiajs/vue3';
import RedesSociales from '@/Pages/Componentes/Home/RedesSociales.vue';
import AppEstructure from '@/Layouts/mainEstructure/AppEstructure.vue';
import Mascotas from '@/Pages/Componentes/Institucion/MascotasComponentes/Mascotas.vue';

</script>

<template>
  <div>
    <AppEstructure :controllerName="'/BannerMascotas/bannerData'">
      <div class="colorprincipal">
        <Mascotas/>
      </div>
    </AppEstructure>
    <RedesSociales />a
  </div>
</template>
  
<style scoped>
.colorprincipal {
  background-color: transparent
}
</style>