<script setup>
import { Head, Link } from '@inertiajs/vue3';
import RedesSociales from '@/Pages/Componentes/Home/RedesSociales.vue';
import AppEstructure from '@/Layouts/mainEstructure/AppEstructure.vue';
import ImagenInstalaciones from '@/Pages/Componentes/Institucion/InstalacionesComponentes/ImagenInstalaciones.vue';
import CarruselInstitucion from '@/Pages/Componentes/Institucion/InstalacionesComponentes/CarruselInstitucion.vue';


</script>

<template>
  <div>
    <AppEstructure>
      <div >
        <ImagenInstalaciones>
          <p class="textoinstitucion">INSTALACIONES</p>
        </ImagenInstalaciones>
      </div>
      <div>
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
  /* Por ejemplo, ajustar el tamaño del texto en pantallas más pequeñas */
  .textoinstitucion{
    font-size: 25px;
  }

}
@media (max-width: 1440px) {
  /* Por ejemplo, ajustar el tamaño del texto en pantallas más pequeñas */
  .textoinstitucion{
    font-size: 25px;
  }
}
@media (max-width: 1024px) {
  /* Por ejemplo, ajustar el tamaño del texto en pantallas más pequeñas */
  .textoinstitucion{
    font-size: 23px;
  }
}
@media (max-width: 768px) {
  /* Por ejemplo, ajustar el tamaño del texto en pantallas más pequeñas */
  .textoinstitucion{
    font-size: 20px;
  }
}
@media (max-width: 425px) {
  /* Por ejemplo, ajustar el tamaño del texto en pantallas más pequeñas */
  .textoinstitucion{
    font-size: 15px;
  }
}
@media (max-width: 375px) {
  /* Por ejemplo, ajustar el tamaño del texto en pantallas más pequeñas */
  .textoinstitucion{
    font-size: 10px;
  }
}
@media (max-width: 320px) {
  /* Por ejemplo, ajustar el tamaño del texto en pantallas más pequeñas */
  .textoinstitucion{
    font-size: 8px; 
  }
}


</style>