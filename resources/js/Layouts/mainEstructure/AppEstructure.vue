<script setup>
import AppFooter from '@/Layouts/mainEstructure/AppFooter.vue';
import AppNavtools from '@/Layouts/mainEstructure/AppNavtools.vue'
import AppBar from '@/Layouts/mainEstructure/navBar/barStructure.vue';
import CarrierBanner from '@/Pages/Componentes/CarrierBanner.vue';
import carruselPrincipalLogic from '@/Pages/Componentes/Welcome/carruselPrincipalLogic.vue';

</script>

<template>
  <div>
    <div>
      <AppNavtools></AppNavtools>
    </div>

    <div class="prueba">
      <AppBar />
      <carruselPrincipalLogic />
      <slot></slot>
    </div>
    <div>
      <AppFooter />
    </div>
  </div>
</template>

<style scoped>
.grid-container {
  display: grid;
  grid-template-rows: auto 1fr auto; /* Define tres filas: una para AppNavtools, una para AppBar y contenido, y una para AppFooter */
  gap: 10px; /* Espacio entre las filas */
  height: 100vh; /* Ajusta la altura del grid al 100% del viewport */
  @media (min-width: 521px){
    grid-template-rows: auto auto 1fr auto;}
@media (min-width: 522px) and (max-width:760px){
    .prueba {
        margin-top:7%; 
        margin-left:2%;

    }}
@media (min-width: 761px) and (max-width:1080px){
    .prueba {
        margin-top:4%; 
        margin-left:2%;

    }
  } 
  @media (min-width: 1081px) and (max-width:1440px){
    .prueba {
        margin-top:2%; 
        margin-left:2%;

    }
  } 
}
</style>
