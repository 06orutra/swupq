<script setup>
import { Head, Link } from '@inertiajs/vue3';
import RedesSociales from '@/Pages/Componentes/Home/RedesSociales.vue';
import AppEstructure from '@/Layouts/mainEstructure/AppEstructure.vue';
import Mascotas from '@/Pages/Componentes/Institucion/InstitucionComponentes/Mascotas.vue';
import ImagenMascotas from '@/Pages/Componentes/Institucion/InstitucionComponentes/ImagenMascotas.vue';
import NoteMascotas from '@/Pages/Componentes/Institucion/InstitucionComponentes/NoteMascotas.vue';
import NoteMPoliPolo from '@/Pages/Componentes/Institucion/InstitucionComponentes/NotePoliPolo.vue';
import Spotypoli from '@/Pages/Componentes/Institucion/InstitucionComponentes/Spotypoli.vue';
import Spotypolo from '@/Pages/Componentes/Institucion/InstitucionComponentes/Spotypolo.vue';
import Notaspoty from '@/Pages/Componentes/Institucion/InstitucionComponentes/Notaspoty.vue';


defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
  laravelVersion: String,
  phpVersion: String,
});

</script>

<template>
  <div>
    <AppEstructure>
      <div class="colorprincipal">
        <ImagenMascotas>
          <p class="textomascota">MASCOTAS</p>
        </ImagenMascotas>
        <Mascotas />
        <div class="mascotas-note ">
          <NoteMascotas/>
          <NoteMPoliPolo />
        </div>
        <div Style="center">
          <Notaspoty/>
        </div>
        <div class="mascotas-note  Spotypolipolo">
          <Spotypoli/> 
          <Spotypolo/>
        </div>
      </div>
    </AppEstructure>
    <RedesSociales />a
  </div>
</template>
  
<style scoped>

.colorprincipal{
  background-color: #ffffff
}

.textomascota {
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
  /* Por ejemplo, ajustar el tamaño del texto en pantallas más pequeñas */
  .textomascota{
    font-size: 25px;
  }
  .mascotas-note {
  display: flex;
  justify-content: center;
}
}
@media (max-width: 1440px) {
  /* Por ejemplo, ajustar el tamaño del texto en pantallas más pequeñas */
  .textomascota{
    font-size: 25px;
  }
}
@media (max-width: 1024px) {
  /* Por ejemplo, ajustar el tamaño del texto en pantallas más pequeñas */
  .textomascota{
    font-size: 23px;
  }
}
@media (max-width: 768px) {
  /* Por ejemplo, ajustar el tamaño del texto en pantallas más pequeñas */
  .textomascota{
    font-size: 20px;
  }
  .Notes{
  margin: 0 0px;
  }
  .mascotas-note {
  display: initial;
  justify-content: space-between;
  /* Ajusta el espacio entre los componentes según tus necesidades */
}
}
@media (max-width: 425px) {
  /* Por ejemplo, ajustar el tamaño del texto en pantallas más pequeñas */
  .textomascota{
    font-size: 15px;
  }
}
@media (max-width: 375px) {
  /* Por ejemplo, ajustar el tamaño del texto en pantallas más pequeñas */
  .textomascota{
    font-size: 10px;
  }
}
@media (max-width: 320px) {
  /* Por ejemplo, ajustar el tamaño del texto en pantallas más pequeñas */
  .textomascota{
    font-size: 8px; 
  }
}
</style>