<script>
import carruselDivididoVista from "/resources/js/Pages/Componentes/Welcome/carruselDivididoVista.vue";

export default {
  components: {
    carruselDivididoVista,
  }
};
</script>

<template>
  <div class="container-2">
    <div class="espacio">
      <div class="imagen">
        <div>
          <carruselDivididoVista :loadDataUrl="'bannerDatasegundo'" />
        </div>
      </div>

      <div class="espacio-2">
        <div class="imagen2">
          <carruselDivididoVista :loadDataUrl="'bannerDatatercero'" />
        </div>
      </div>
    </div>
  </div>
</template>
  
<style>
.container-2 {
  display: flex;
  height: 45vh;
  width: 100%;
}

.espacio {
  background-color: #c43333;
  /* Rojo */
  flex-basis: 50%;
}

.imagen {
  width: 100%;
}

.espacio-2 {
  flex-basis: 50%;
  background-color: #1515c8;
  /* Azul */
}

.imagen2 {
  width: 100%;
}</style>