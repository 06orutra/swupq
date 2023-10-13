<template>
  <div class="card">
    <Carousel :value="images" :numVisible="5" :numScroll="3" :responsiveOptions="responsiveOptions" circular :autoplayInterval="3000" showArrows="true" showIndicators="true" class="my-carousel">
      <template #item="slotProps">
        <div class="text-center">
          <img :src="getImageUrl(slotProps.data.itemImageSrc)" :alt="slotProps.data.alt" class="w-12" />
        </div>
      </template>
    </Carousel>
  </div>
</template>

<script setup>
import { ref } from "vue";

const imagePath = 'https://www.upq.mx/media/pets/';

const images = ref([
  {
    itemImageSrc: 'POLO_Y_POLI_MASCOTAS-01.png',
    alt: 'Description for Image 1',
  },
  {
    itemImageSrc: 'POLO_Y_POLI_MASCOTAS-02.png',
    alt: 'Description for Image 2',
  },
  // ... (otras imágenes)
]);

const responsiveOptions = ref([
  {
    breakpoint: "1000px",
    numVisible: 4,
    numScroll: 4,
  },
  // ... (otras opciones responsivas)
]);

function getImageUrl(imageSrc) {
  return imagePath + imageSrc;
}

function addImageToDatabase(newImageSrc, newImageAlt) {
  images.value.push({
    itemImageSrc: newImageSrc,
    alt: newImageAlt,
  });
}

// Ejemplo de cómo agregar una nueva imagen (deberás llamar a esta función cuando tengas los datos de la nueva imagen).
// addImageToDatabase('nombre_de_la_nueva_imagen.png', 'Descripción de la nueva imagen');
</script>

<style scoped>
.my-carousel {
  width: 70%;
  margin: 0 auto;
}

.my-carousel .w-12 {
  width: 100%;
  max-width: 100%;
}

@media (max-width: 999px) {
  .my-carousel {
    width: 100%;
  }
}
</style>
