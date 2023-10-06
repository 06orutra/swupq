<template>
  <div class="card md:flex md:justify-content-center">
    <Galleria :value="images" :responsiveOptions="responsiveOptions" :numVisible="7" :circular="true" containerStyle="max-width: 1200px">
      <template #item="slotProps">
        <img :src="slotProps.item.itemImageSrc" :alt="slotProps.item.alt" :style="slotProps.item.style" class="max-width-image" />
      </template>
      <template #thumbnail="slotProps">
        <img :src="slotProps.item.thumbnailImageSrc" :alt="slotProps.item.alt" :style="slotProps.item.thumbnailStyle" class="max-width-image" />
      </template>
    </Galleria>
  </div>
</template>

<style>
.max-width-image {
  max-width: 100%; /* Limita el ancho máximo de la imagen */
  height: auto;
}
</style>

<script setup>
import { ref, onMounted } from "vue";

const images = ref([]);
const responsiveOptions = ref([
  {
    breakpoint: '991px',
    numVisible: 4
  },
  {
    breakpoint: '767px',
    numVisible: 3
  },
  {
    breakpoint: '575px',
    numVisible: 1
  }
]);

onMounted(() => {
//   onMounted(async () => {
//   // Realiza una solicitud HTTP para obtener las imágenes desde la base de datos
//   try {
//     const response = await fetch('/api/images'); // Reemplaza con la ruta correcta
//     const imageData = await response.json();

//     // Construye el array rawData a partir de los datos obtenidos
//     const rawData = [];

//     imageData.forEach(image => {
//       if (image.itemImageSrc && image.thumbnailImageSrc) {
//         rawData.push({
//           itemImageSrc: image.itemImageSrc,
//           thumbnailImageSrc: image.thumbnailImageSrc,
//           alt: image.alt,
//           style: 'width: 100%; display: block',
//           thumbnailStyle: 'display: block; max-height: 70px;'
//         });
//       }
//     });

//     // Asigna el array filtrado a la variable images
//     images.value = rawData;
//   } catch (error) {
//     console.error('Error al obtener las imágenes:', error);
//   }
// });
  // Obtén las imágenes desde tu fuente de datos (por ejemplo, una respuesta de Axios)
  const rawData = [
    {
      itemImageSrc: 'https://www.upq.mx/media/institucion/02_INSTALACIONES.png',
      thumbnailImageSrc: 'https://www.upq.mx/media/institucion/02_INSTALACIONES.png',
      style: 'width: 100%; display: block',
      thumbnailStyle: 'display: block; max-height: 70px;'
    },
    {
      itemImageSrc: 'https://www.upq.mx/media/institucion/05_INSTALACIONES.png',
      thumbnailImageSrc: 'https://www.upq.mx/media/institucion/05_INSTALACIONES.png',
      style: 'width: 100%; display: block',
      thumbnailStyle: 'display: block; max-height: 70px;'
    },
    {
      itemImageSrc: 'https://www.upq.mx/media/institucion/11_INSTALACIONES.jpg',
      thumbnailImageSrc: 'https://www.upq.mx/media/institucion/11_INSTALACIONES.jpg',
      thumbnailStyle: 'display: block; max-height: 70px;'
    },
    {
      itemImageSrc: 'https://www.upq.mx/media/institucion/16_INSTALACIONES.png',
      thumbnailImageSrc: 'https://www.upq.mx/media/institucion/16_INSTALACIONES.png',
      thumbnailStyle: 'display: block; max-height: 70px;'
    },
    {
      itemImageSrc: 'https://www.upq.mx/media/institucion/IMG_7404.jpg',
      thumbnailImageSrc: 'https://www.upq.mx/media/institucion/IMG_7404.jpg',
      thumbnailStyle: 'display: block; max-height: 70px;'
    },
    {
      itemImageSrc: 'https://www.upq.mx/media/institucion/12_INSTALACIONES.jpg',
      thumbnailImageSrc: 'https://www.upq.mx/media/institucion/12_INSTALACIONES.jpg',
      thumbnailStyle: 'display: block; max-height: 70px;'
    },
    {
      itemImageSrc: 'https://www.upq.mx/media/institucion/17_INSTALACIONES.png',
      thumbnailImageSrc: 'https://www.upq.mx/media/institucion/17_INSTALACIONES.png',
      thumbnailStyle: 'display: block; max-height: 70px;'
    },
    {
      itemImageSrc: 'https://www.upq.mx/media/institucion/IMG_8609.jpg',
      thumbnailImageSrc: 'https://www.upq.mx/media/institucion/IMG_8609.jpg',
      thumbnailStyle: 'display: block; max-height: 70px;'
    },
    {
      itemImageSrc: '',
      thumbnailImageSrc: '',
      thumbnailStyle: 'display: block; max-height: 70px;'
    },
    {
      itemImageSrc: '',
      thumbnailImageSrc: '',
      thumbnailStyle: 'display: block; max-height: 70px;'
    },
  ];

  // Filtra los elementos con URLs vacías antes de asignarlos a la variable images
  images.value = rawData.filter(item => item.itemImageSrc !== '' && item.thumbnailImageSrc !== '');
});
</script>
