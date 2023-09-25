<script>
import carruselDivididoVista from "/resources/js/Pages/Componentes/Welcome/carruselDivididoVista.vue";
import Videos from "/resources/js/Pages/Componentes/Home/Videos.vue";

export default {
  components: {
    carruselDivididoVista,
    Videos,
  }
};
</script>

<template>
  <div class="container-4">
    <div class="espacio1">
      <div class="imagen1">
        <div>
          <videos/>
        </div>
      </div>
    </div>


    <div class="espacio2">
      <div class="imagen-2">
        <carruselDivididoVista :loadDataUrl="'bannerDataprimero'" />
      </div>
    </div>
  </div>
</template>
  
<style>
.container-4 {
  display: flex;
  height: 45vh;
}

.espacio1 {
  background-color: #d000ff;
  /* Rojo */
  flex-basis: 50%;
}

.imagen1 {
  width: 100%;
}

.espacio2 {
  flex-basis: 50%;
  background-color: #00dc54;
  /* Azul */
}

.imagen-2 {
  width: 100%;
}
</style>