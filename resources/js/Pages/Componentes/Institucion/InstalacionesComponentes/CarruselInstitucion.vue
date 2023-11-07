<script setup>

import barra from '@/Pages/Componentes/Institucion/InstalacionesComponentes/barraespaciadora.vue'; 
</script>

<template>
  <div>
    <barra/>
    <!-- Galería principal con imágenes grandes -->
    <Galleria :value="images" :showThumbnails="false" :showIndicatorsOnItem="false" :responsiveOptions="responsiveOptions" :numVisible="5" 
      :circular="true" :autoPlay="true" :transitionInterval="2000" class="centered-image ">
      <template #item="slotProps">
        <img :src="slotProps.item.itemImageSrc" :alt="slotProps.item.alt" class="main-image" />
      </template>
    </Galleria>

    <!-- Cuadrícula estática con miniaturas de las imágenes -->
    <div class="grid-gallery">
      <div v-for="(image, index) in images" :key="index" class="grid-item" @click="showImageInLarge(image)">
        <img :src="image.itemImageSrc" :alt="image.alt" class="grid-image" />
      </div>
    </div>

    <!-- Vista en grande de la imagen seleccionada -->
    <div v-if="selectedImage" class="large-image-modal">
      <img :src="selectedImage.itemImageSrc" :alt="selectedImage.alt" @click="closeLargeImage" />
    </div>
</div>
</template>

<script >

export default {
  data() {
    return {
      images: [],
      position: "bottom",
      positionOptions: [
        {
          label: "Bottom",
          value: "bottom"
        },
        {
          label: "Top",
          value: "top"
        },
        {
          label: "Left",
          value: "left"
        },
        {
          label: "Right",
          value: "right"
        }
      ],
      selectedImage: null, // Almacena la imagen seleccionada para verla en grande.
    };
  },
  mounted() {
    this.cargarDatosDesdeLaBaseDeDatos();
  },
  methods: {
    cargarDatosDesdeLaBaseDeDatos() {
      // Realiza una solicitud a tu punto final de base de datos
      axios.post('/CarruselInstalaciones/bannerData')
        .then((response) => {
          this.images = response.data.map(item => {
            return {
              itemImageSrc: '/storage/' + item.imagen,
              alt: item.alt,
              // Otras propiedades si las tienes en tu base de datos
            };
          });
        })
        .catch((error) => {
          console.error(error);
        });
    },
    showImageInLarge(image) {
      // Abre la imagen en una vista en grande cuando se hace clic en una miniatura.
      this.selectedImage = image;
    },
    closeLargeImage() {
      // Cierra la vista en grande de la imagen.
      this.selectedImage = null;
    },
  },
};
</script>

<style scoped>
.grid-gallery {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); /* Tamaño de las columnas */
  gap: 10px; /* Espacio entre elementos */
  margin-top: 20px; /* Espacio superior para separación de la galería principal */
  display: grid;
  grid-template-columns: repeat(4, 1fr); /* 5 imágenes por fila */
  text-align: center; /* Centra las miniaturas en la fila */
  padding: 10px; /* Agrega padding al segundo conjunto de imágenes */
  padding-right: 10%;
  padding-left: 10%;
}

.grid-item {
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: transparent; /* Fondo de los elementos */
  border: 1px solid transparent; /* Borde de los elementos */
  padding: 10px;
  cursor: pointer;
}

.grid-image {
  max-width: 100%;
  max-height: 100%;
}
.centered-image {
  max-width: 100%;
  max-height: 100%;
  display: block;
  margin:  auto; /* Centra la imagen horizontalmente */
}
.main-gallery {
  overflow: hidden; /* Oculta imágenes que exceden el contenedor */
  max-width: 100%; /* Evita que las imágenes se salgan del contenedor */
  display: flex;
  justify-content: center;
}

.main-image {
  width: 1200px; /* Fija el ancho al 100% del contenedor */
  height: 700px; /* Fija la altura a 250px (ajusta según tus necesidades) */
  object-fit: cover; /* Ajusta la imagen para llenar el contenedor sin deformarla */
}

.centered-image {
  max-width: 100%;
  max-height: 100%;
  display: block;
  margin: auto; /* Centra la imagen horizontalmente */
}

/* Estilos para la vista en grande de la imagen */
.large-image-modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.9);
  display: flex;
  justify-content: center;
  align-items: center;
}

.large-image-modal img {
  max-width: 80%;
  max-height: 80%;
  cursor: pointer;
}


@media (max-width: 2560px) {
  
  .grid-gallery {
  grid-template-columns: repeat(7, 1fr); 
}
.main-image {
  width: 1750px; /* Fija el ancho al 100% del contenedor */
  height: 1400px; /* Fija la altura a 250px (ajusta según tus necesidades) */
  object-fit: cover; /* Ajusta la imagen para llenar el contenedor sin deformarla */
}
}
@media (max-width: 2000px) {
  
  .grid-gallery {
  grid-template-columns: repeat(6, 1fr); 
}
.main-image {
  width: 1400px; /* Fija el ancho al 100% del contenedor */
  height: 900px; /* Fija la altura a 250px (ajusta según tus necesidades) */
  object-fit: cover; /* Ajusta la imagen para llenar el contenedor sin deformarla */
}
}
@media (max-width: 1440px) {
  .main-image {
  width: 1000px; /* Fija el ancho al 100% del contenedor */
  height: 700px; /* Fija la altura a 250px (ajusta según tus necesidades) */
  object-fit: cover; /* Ajusta la imagen para llenar el contenedor sin deformarla */
}
.grid-gallery {
  grid-template-columns: repeat(5, 1fr); 
}
}
@media (max-width: 1024px) {
  .grid-gallery {
  grid-template-columns: repeat(4, 1fr); 
}
.main-image {
  width: 750px; /* Fija el ancho al 100% del contenedor */
  height: 550px; /* Fija la altura a 250px (ajusta según tus necesidades) */
  object-fit: cover; /* Ajusta la imagen para llenar el contenedor sin deformarla */
}
}
@media (max-width: 768px) {
  .grid-gallery {
  grid-template-columns: repeat(4, 1fr); 
}.main-image {
  width: 540px; /* Fija el ancho al 100% del contenedor */
  height: 310px; /* Fija la altura a 250px (ajusta según tus necesidades) */
  object-fit: cover; /* Ajusta la imagen para llenar el contenedor sin deformarla */
}
}
@media (max-width: 550px) {
  .grid-gallery {
  grid-template-columns: repeat(3, 1fr); 
}.main-image {
  width: 410px; /* Fija el ancho al 100% del contenedor */
  height: 310px; /* Fija la altura a 250px (ajusta según tus necesidades) */
  object-fit: cover; /* Ajusta la imagen para llenar el contenedor sin deformarla */
}
}
@media (max-width: 425px) {
  .grid-gallery {
  grid-template-columns: repeat(1, 1fr); 
  padding-right: 3%;
  padding-left: 3%;
}
.main-image {
    display: none;
  }
}
@media (max-width: 375px) {
  .grid-gallery {
  grid-template-columns: repeat(1, 1fr); 
  padding-right: 3%;
  padding-left: 3%;
  padding: 0px; 
  margin-top: 10px;
}
 /* Ajusta la imagen para llenar el contenedor sin deformarla */
.main-image {
    display: none;
  }
}
@media (max-width: 320px) {
  .grid-gallery {
  grid-template-columns: repeat(1, 1fr); 
  padding-right: 3%;
  padding-left: 3%;
  padding: 0px; 
  margin-top: 10px;
}
.main-image {
    display: none;
  }
}
</style>
