<template>
  <div class="card">
    <Carousel :value="datos" :numVisible="5" :numScroll="3" :responsiveOptions="responsiveOptions" circular :autoplayInterval="3000" showArrows="true" showIndicators="true" class="my-carousel">
      <template #item="slotProps">
        <div class="text-center">
          <img :src="'/storage/' + slotProps.data.imagen" :alt="slotProps.data.alt" class="w-12" />
        </div>
      </template>
    </Carousel>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

const responsiveOptions = ref([
  {
    breakpoint: "1000px",
    numVisible: 4,
    numScroll: 4,
  },
  {
    breakpoint: "650px",
    numVisible: 3,
    numScroll: 3
  },
  {
    breakpoint: "420px",
    numVisible: 2,
    numScroll: 2
  }
]);

const datos = ref([]);

const cargarDatosRector = () => {
  axios.post('/CarruselMascota/bannerData')
    .then((response) => {
      datos.value = response.data;
    })
    .catch((error) => {
      console.error(error);
    });
};

onMounted(() => {
  cargarDatosRector();
});
</script>

<style scoped>
.my-carousel {
  width: 70%; /* El carrusel ocupará el 70% del ancho del contenedor */
  margin: 0 auto; /* Centra el carrusel horizontalmente */
}

/* Ajusta el tamaño de los elementos internos del carrusel para que se ajusten al carrusel */
.my-carousel .w-12 {
  width: 100%; /* Las imágenes ocuparán el ancho completo del carrusel */
  max-width: 100%; /* Limita el ancho máximo de las imágenes para que se ajusten automáticamente */
}

/* Estilos responsivos para pantallas más pequeñas */
@media (max-width: 999px) {
  .my-carousel {
    width: 100%; /* Cambia al 100% en pantallas más pequeñas */
  }
}
</style>
