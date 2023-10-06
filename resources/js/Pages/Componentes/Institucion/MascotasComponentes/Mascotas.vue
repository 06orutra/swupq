<template>
  <div class="card" >
    <Carousel :value="images" :numVisible="5" :numScroll="3" :responsiveOptions="responsiveOptions" circular :autoplayInterval="3000" showArrows="true" showIndicators="true" class="my-carousel">
      <template #item="slotProps">
        <div class="text-center">
          <img :src="slotProps.data.itemImageSrc" :alt="slotProps.data.alt" class="w-12" />
        </div>
      </template>
    </Carousel>
  </div>
</template>

<script setup>
import { ref} from "vue";

const images = ref([
  {
    itemImageSrc: 'https://www.upq.mx/media/pets/POLO_Y_POLI_MASCOTAS-01.png',
    alt: 'Description for Image 1',
    title: 'Title 1'
  },
  {
    itemImageSrc: 'https://www.upq.mx/media/pets/POLO_Y_POLI_MASCOTAS-02.png',
    alt: 'Description for Image 2',
    title: 'Title 2'
  },
  {
    itemImageSrc: 'https://www.upq.mx/media/pets/POLO_Y_POLI_MASCOTAS-03.png',
    alt: 'Description for Image 3',
    title: 'Title 3'
  },
  {
    itemImageSrc: 'https://www.upq.mx/media/pets/POLO_Y_POLI_MASCOTAS-04.png',
    alt: 'Description for Image 4',
    title: 'Title 4'
  },
  {
    itemImageSrc: 'https://www.upq.mx/media/pets/POLO_Y_POLI_MASCOTAS-05.png',
    alt: 'Description for Image 5',
    title: 'Title 5'
  },
  {
    itemImageSrc: 'https://www.upq.mx/media/pets/POLO_Y_POLI_MASCOTAS-06.png',
    alt: 'Description for Image 6',
    title: 'Title 6'
  },
  {
    itemImageSrc: 'https://www.upq.mx/media/pets/POLO_Y_POLI_MASCOTAS-07.png',
    alt: 'Description for Image 7',
    title: 'Title 7'
  },
  {
    itemImageSrc: 'https://www.upq.mx/media/pets/POLO_Y_POLI_MASCOTAS-08.png',
    alt: 'Description for Image 8',
    title: 'Title 8'
  },
  {
    itemImageSrc: 'https://www.upq.mx/media/pets/POLO_Y_POLI_MASCOTAS-09.png',
    alt: 'Description for Image 9',
    title: 'Title 9'
  },
  {
    itemImageSrc: 'https://www.upq.mx/media/pets/POLO_Y_POLI_MASCOTAS-10.png',
    alt: 'Description for Image 10',
    title: 'Title 10'
  },
  {
    itemImageSrc: 'https://www.upq.mx/media/pets/POLO_Y_POLI_MASCOTAS-11.png',
    alt: 'Description for Image 11',
    title: 'Title 11'
  },
  ]);
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