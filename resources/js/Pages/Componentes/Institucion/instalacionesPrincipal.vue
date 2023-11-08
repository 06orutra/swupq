<script setup>
import { Head, Link } from '@inertiajs/vue3';
import RedesSociales from '@/Pages/Componentes/Home/RedesSociales.vue';
import AppEstructure from '@/Layouts/mainEstructure/AppEstructure.vue';
import CarruselInstitucion from '@/Pages/Componentes/Institucion/InstalacionesComponentes/CarruselInstitucion.vue';


</script>

<template>
  <div>
    <AppEstructure>
      <div >
        <CarruselInstitucion/>
      </div>
    </AppEstructure>
    <RedesSociales />a
  </div>
</template>
  
<style scoped>

.textoinstitucion{
  color: white;
  font-size: 25px;
  font-family: Arial;
  height: 100%; /* Añade una altura al elemento .textomascota */
  display: flex;
  align-items: center;
  margin-left: auto; /* Moverá el texto hacia la derecha */
  width: 80%; /* Ancho para centrarlo en una tercera parte */
}


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