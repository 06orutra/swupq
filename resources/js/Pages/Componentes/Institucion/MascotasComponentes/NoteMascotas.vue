<template>
  <div class="card-container" @mouseenter="startRotation" @mouseleave="resetRotation">
    <div class="card" :style="dynamicStyle" :class="{ 'disable-interaction': isAnimating }">
      <img :src="currentImage" alt="Image" class="imagen-centrada" /><br />
      <div class="card-title"><strong>Ficha Técnica</strong></div>
      <div class="card-content">
        <br />
        <strong>Nombre Cientifico:</strong> Pyrocephalus rubinus<br /><br />
        <strong>Significado:</strong> Cabeza de fuego de color rubí<br /><br />
        <strong>Familia:</strong> Tyrannidae<br /><br />
        <strong>Tamaño:</strong> 13 a 14 centímetros<br /><br />
        <strong>Peso:</strong> 14 gramos
      </div>
    </div>
  </div>
</template>

<script>
import iicono from './iicono.png';
import iicono2 from './iicono2.png';

export default {
  data() {
    return {
      isAnimating: false,
      rotation: 0,
      images: {
        normal: iicono,
        hovered: iicono2,
      },
      isHovered: false,
      originalBackgroundColor: '#245580', // Guardamos el color original
    };
  },
  computed: {
    currentImage() {
      return this.isHovered ? this.images.hovered : this.images.normal;
    },
    dynamicStyle() {
      return {
        backgroundColor: this.isHovered ? '#151930' : this.originalBackgroundColor,
        transform: `rotateY(${this.rotation}deg)`,
        transition: 'background-color 0.5s, transform 0.5s',
      };
    },
  },
  methods: {
    startRotation() {
      if (!this.isAnimating && !this.isHovered) {
        this.isAnimating = true;
        this.isHovered = true;
        this.rotation = 360;
        this.$el.addEventListener('transitionend', this.handleTransitionEnd);
      }
    },
    resetRotation() {
      if (this.isHovered && !this.isAnimating) {
        this.isAnimating = true;
        this.isHovered = false;
        this.rotation = 0;
        this.$el.addEventListener('transitionend', this.handleTransitionEnd);

        // Restaurar el color y la imagen originales después de un breve retraso
        setTimeout(() => {
          this.originalBackgroundColor = '#245580';
          this.images.normal = iicono;
        }, 100); // Ajusta el tiempo según tus necesidades
      }
    },
    handleTransitionEnd() {
      this.isAnimating = false;
      this.$el.removeEventListener('transitionend', this.handleTransitionEnd);
    },
  },
};
</script>

<style scoped>
.card-container {
  perspective: 1000px;
  cursor: pointer;

}

.card {
  background-color: transparent;
  border-top-left-radius: 0.50rem;
  border-top-right-radius: 0.50rem;
  border-bottom-left-radius: 0.50rem;
  border-bottom-right-radius: 0.50rem;
  width: auto;
  height: 420px;
  transition: background-color 0.5s, transform 0.5s;
  transform-origin: center;
}

.card:hover {
  background-color: #151930;
}

.medida {
  width: 310px;
  height: auto;
  backface-visibility: hidden;
}

.imagen-centrada {
  width: 70px;
  height: 70px;
  transition: src 0.5s;
  display: block;
  margin: auto;
}

.card-title {
  font-size: 20px;
  color: white;
  text-align: center;
  border-bottom: 1px solid rgba(70, 67, 82, 0.418);
}

.card-content {
  font-size: 16px;
  color: white;
  text-align: left;
  transform: rotateY(0deg);
  backface-visibility: hidden;
}

.disable-interaction {
  pointer-events: none;
}


@media (max-width: 2560px) {
  .card-container {
    width: auto;
    padding-right: 100px;
  }
}

@media (max-width: 1440px) {}

@media (max-width: 1024px) {
  .card-container {
    width: auto;
    padding: 15px;
  }
}

@media (max-width: 768px) {
  .card-container {
    width: 300px;
    /* Establece el ancho deseado */
    height: auto;
    /* Deja que la altura se ajuste automáticamente */
    margin-left: auto;
    margin-right: auto;
    margin-top: 20px; /* Espacio superior deseado */
    margin-bottom: 40px;
  }

  .card {
    width: 100%;
    /* Establece el ancho deseado, 100% para ajustarse al contenedor padre */
    height: auto;
    /* Deja que la altura se ajuste automáticamente */
  }

  .medida {
    width: 100%;
    /* Establece el ancho deseado, 100% para ajustarse al contenedor padre */
    height: auto;
    /* Deja que la altura se ajuste automáticamente */
  }

  .card-title {
    font-size: 16px;
    /* Ajusta el tamaño del título según sea necesario */
  }

  .card-content {
    font-size: 14px;
    /* Ajusta el tamaño del contenido según sea necesario */
  }

  .imagen-centrada {
    width: 50px;
    /* Ajusta el tamaño de la imagen según sea necesario */
    height: 50px;
    /* Ajusta el tamaño de la imagen según sea necesario */
  }

  .card:hover {
    background-color: #151930;
    /* Puedes ajustar el ancho y alto hover según tus necesidades */
  }
}


@media (max-width: 425px) {}

@media (max-width: 375px) {}

@media (max-width: 320px) {
  
}
</style>