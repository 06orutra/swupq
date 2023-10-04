<template>
  <div class="carousel-container">
    <div class="carousel">
      <img v-bind:src="currentImage" alt="Imagen del carrusel" class="carousel-image" />
    </div>
    <div class="static-image-container">
      <a href="https://open.spotify.com/playlist/1ZYOisHSuDu2rtbvyHBVqi">
        <img src="https://i1.wp.com/historia-biografia.com/wp-content/uploads/2019/05/Spotify_Badge_large.png?fit=1280%2C469&ssl=1" alt="Imagen Estática" class="static-image" />
      </a>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      images: [
        "https://www.upq.mx/media/pets/POLO_Y_POLI_MASCOTAS-09.png",
        "https://www.upq.mx/media/pets/POLO_Y_POLI_MASCOTAS-10.png",
        "https://www.upq.mx/media/pets/POLO_Y_POLI_MASCOTAS-11.png",
        "https://www.upq.mx/media/pets/POLO_Y_POLI_MASCOTAS-08.png",
        "https://www.upq.mx/media/pets/POLO_Y_POLI_MASCOTAS-07.png",
      ],
      currentIndex: 0,
    };
  },
  computed: {
    currentImage() {
      return this.images[this.currentIndex];
    },
  },
  created() {
    this.startAutoSlide();
  },
  methods: {
    startAutoSlide() {
      setInterval(() => {
        this.nextImage();
      }, 3000); // Cambia de imagen cada 3 segundos (3000 ms)
    },
    nextImage() {
      this.currentIndex = (this.currentIndex + 1) % this.images.length;
    },
  },
};
</script>

<style>
.carousel-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-left: 80px;
}

.carousel {
  display: flex;
  align-items: center;
}

.carousel-image {
  max-width: 105px; /* Cambia el tamaño máximo según tus preferencias */
  height: auto;
}

.static-image-container {
  margin-top: 10px;
  text-align: center;
}

.static-image {
  max-width: 150px; /* Tamaño de tu imagen estática */
  height: auto;
  margin-bottom: 100px;
}
</style>
