<script>
import AppEstructure from '@/Layouts/mainEstructure/AppEstructure.vue';
import sistemaCalidadCarruselSecundario from './sistemaCalidad/sistemaCalidadCarruselSecundario.vue';
import bolitas_pdf from '@/Pages/Componentes/FormacionIntegral/bolitas_pdf.vue';

export default {
  components: {
    AppEstructure,
    sistemaCalidadCarruselSecundario,
    bolitas_pdf,
  },

  mounted() {
    this.cargarTexto();
    this.cargarPdf();
    this.cargarBanner();
  },
  data() {
    return {
      texto: [],
      banner: [],
      pdfs: [],
      showPDFModal: false,
      sistemaCalidad: 'SISTEMA DE GESTIÓN DE LA CALIDAD',

      images: {
        fondo1: 'https://www.upq.mx/sistema_gestion_calidad/images/boton_objetivos-sgc.svg?crc=3836609846',
        fondo2: 'https://www.upq.mx/sistema_gestion_calidad/images/boton_formulario-sgc.svg?crc=407711813',
      },

      sugerenciasFelicidades: 'SUGERENCIAS/FELICITACIONES',
      envianosMensaje: '¡ENVIANOS UN MENSAJE!',
      correoSugerencias: 'sgc@upq.edu.mx',
      agradecimientoComentarios: 'La UPQ, como parte de la mejora continua, agradece sus comentarios',
      sugerenciasLink: 'https://mail.google.com/mail/u/0/#inbox',
    };
  },
  methods: {
    cargarTexto() {
      axios.post('/SistemaCalidadTexto/bannerData').then((response) => {
        this.texto = response.data;
      }).catch((error) => {
        console.log(error);
      });
    },
    cargarPdf() {
      axios.post('/SistemaCalidadPdfConsulta/bannerData').then((response) => {
        this.pdfs = response.data;
      }).catch((error) => {
        console.log(error);
      });
    },
    cargarBanner() {
      axios.post(this.controllerName).then((response) => {
        this.banner = response.data;
        this.assignConsecutiveIDs();
        this.isBannerLoaded = true;
      }).catch((error) => {
        console.log(error);
      });
    },
    updateCarouselSettings(settings) {
      this.navigation = settings.navigation;
      this.pagination = settings.pagination;
      this.startAutoPlay = settings.startAutoPlay;
      this.timeout = settings.timeout;
    },
    openPDFModal(pdf, name) {
      this.currentPDF = '/storage/pdfs/' + pdf;
      this.currentPDFName = name;
      this.showPDFModal = true;
    },
    closePDFModal() {
      this.showPDFModal = false;
    },
  }
};
</script>
<template>
  <AppEstructure :controllerName="'/SistemaCalidadImgPrincipal/bannerData'">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <div>
      <div class=" banner_qm w-full">
        <h2><b>{{ sistemaCalidad }}</b></h2>
      </div>

      <div class="title pb-4">
        <div v-for="text in texto">
          {{ text.titulo }}
        </div>
        <div class="line" style="margin: 20px auto; width: 70%;">
        </div>

        <div class="text-align: center; col-md-8 offset-md-2 text-justify text-xl" style="width: 80%; margin: 0 auto;">
          <p class="font-normal" style="margin-top: 2em; margin-bottom:1em; color: black; width: 100%">
          <div v-for="text in texto">
            {{ text.contenido }}
          </div>
          </p>
        </div>
      </div>

      <sistemaCalidadCarruselSecundario :controllerName="'/SistemaCalidadImgSecundaria/bannerData'" />

      <div class="flex justify-between button-container my-5">
        <div class="main-menu">
          <bolitas_pdf :loadDataUrl="'/SistemaCalidadPdf/bannerData'" />
        </div>
      </div>

      <div v-if="showPDFModal" class="pdf-modal">
        <div class="pdf-container">
          <button @click="closePDFModal" class="close-x">&#10005;</button>
          <div class="pdf-header" :style="{ backgroundColor: '#8c2437' }">
            {{ currentPDFName }}
          </div>
          <embed :src="currentPDF" type="application/pdf" width="100%" height="500px">
          <div class="pdf-buttons">
            <button @click="closePDFModal" class="close-button">Cerrar</button>
            <a :href="currentPDF" download :download="currentPDFName" class="download-button">
              Descargar
            </a>
          </div>
        </div>
      </div>

      <div class="contenedoor">
        <div class="parallax" :style="{ backgroundImage: 'url(' + images.fondo1 + ')' }">
          <div v-for="pdf in pdfs" @click="openPDFModal(pdf.pdf, pdf.nombre)" class="caja">
            <p><strong>CONSULTA AQUÍ</strong></p>
            <P class="font-normal" style="line-height: 1;">
              {{ pdf.nombre }}
            </P>
          </div>
        </div>
      </div>

      <div class="contenedoor">
        <div class="parallax2" :style="{ backgroundImage: 'url(' + images.fondo2 + ')' }">
          <div class="caja">
            <a :href="sugerenciasLink" target="_blank">
              <p><strong>{{ sugerenciasFelicidades }}</strong></p>
              <P class="font-normal" style="line-height: 1;">¡ENVIANOS UN MENSAJE! </P>
              <P class="font-normal" style="line-height: 1;">sgc@upq.edu.mx</P>
              <P class="font-normal" style="line-height: 1;">La UPQ, como parte de la mejora continua, agradece sus
                comentarios</P>
            </a>
          </div>
        </div>
      </div>

    </div>
  </AppEstructure>
</template>

<style scoped>
.pdf-iframe {
  width: 100%;
  height: 100%;
  border: none;
}

.close-x {
  position: absolute;
  top: 5px;
  right: 15px;
  background-color: transparent;
  border: none;
  font-size: 24px;
  color: black;
  cursor: pointer;
  transition: color 0.3s ease;
}

.close-x:hover {
  color: #ffffff;
}

.pdf-modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 10000;
}

.pdf-container {
  position: relative;
  width: 75%;
  height: 80%;
  background-color: white;
  border-radius: 10px;
  overflow: hidden;
  display: flex;
  flex-direction: column;
}

.pdf-header {
  height: 40px;
  line-height: 40px;
  text-align: center;
  color: white;
  font-size: medium;
  font-weight: bold;
}

embed {
  width: 100%;
  height: calc(100vh - 80px);
}

.pdf-buttons {
  display: flex;
  justify-content: space-between;
  padding: 10px;
  margin-top: 10px;
  margin-bottom: 10px;
}

.close-button {
  background-color: grey;
  color: white;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
  border-radius: 5px;
}

.download-button {
  background-color: #8c2437;
  color: white;
  text-decoration: none;
  padding: 10px 20px;
  border-radius: 5px;
}

/* Estilos Caro */
.banner_qm {
  background-color: #800020;
  text-align: center;
  padding: 20px;
}

h2 {
  color: white;
}

.title {
  color: #881337;
  text-align: center;
  font-weight: 700;
  font-size: 1.5rem;
  /* 24px */
  line-height: 2rem;
  /* 32px */
}

.line {
  border-top: 3px solid #881337;
  margin: 20px 0;
  width: 80%;
}

.pdf-button {
  width: 100%;
  height: 100%;
  background: none;
  border: none;
  cursor: pointer;
}

.button-text {
  margin-top: 0.5rem;
  color: black;
  font-style: not-italic;
  word-break: break-all;
  max-height: 3em;
  /* o cualquier otra altura máxima deseada */
  overflow: hidden;
}

* {
  margin: 0.5;
  padding: 0.5;
  box-sizing: border-box;
  text-decoration: none;
  font-family: sans-serif;
}

main {
  width: 100%;
  max-width: 1200px;
  margin: auto;
}

.title {
  text-align: center;
  margin-top: 80px;
}

.main-menu {
  width: 100%;
  margin: auto;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-evenly;
}

.main-menu a {
  cursor: default;
}


.main-menu .option2 {
  width: 200px;
  height: 200px;
  background: #f1f1f1;
  margin: 20px;
  padding: 20px;
  text-align: center;
  border-radius: 10px;
  cursor: pointer;
  transition: all 300ms;
}

.main-menu .option2:hover {
  box-shadow: 5px 5px 0px 0px #08162fe6, 10px 10px 14px #3d67afe6;
  transform: translate(-5px, -5px);
}

.button-container {
  display: flex;
  justify-content: space-between;
  margin-bottom: 20px;
}

.carrucel {
  height: 590px;
  overflow-y: hidden;
  margin: auto;
  margin-bottom: 20px;
}

/*estilos para los contenedores de los banners con imagen en movimiento*/
.contenedoor {
  width: 100%;
  height: 300px;
  max-height: 100%;
  /* Evita que el contenedor supere su altura máxima */
  overflow: hidden;
  position: relative;
  display: flex;
  z-index: 2;
  top: 0px;
  left: 0px;
}

.parallax {
  background-size: cover;
  background-attachment: fixed;
  /* Esto crea el efecto de parallax */
  width: 100%;
  height: 100%;
  position: absolute;
  z-index: -10;
  background-position: center center;
}

.parallax2 {
  background-size: cover;
  background-attachment: fixed;
  /* Esto crea el efecto de parallax */
  width: 100%;
  height: 100%;
  position: absolute;
  z-index: -10;
  background-position: center center;
}

.caja {
  border: 2px solid rgb(255, 255, 255);
  border-radius: 10px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 90%;
  max-width: 800px;
  margin: auto;
  /* Centra el contenido */
  padding: 20px;
  text-align: center;
  font-size: 20px;
  margin-bottom: 5px;
  color: white;
  transition: border-color 0.3s, background-color 0.3s;
  z-index: -2;
}

.caja:hover {
  border-color: rgb(19, 18, 18);
  /* Cambia el color del borde a rojo al pasar el mouse */
  background-color: rgba(255, 255, 255, 0.571);
  /* Cambia el fondo a blanco al pasar el mouse */
  color: rgb(19, 18, 18);
}

.caja a {
  text-decoration: none;
  /* Quita el subrayado del enlace */
  color: inherit;
  /* Hereda el color del texto de la caja */
  display: block;
  /* Hace que el enlace ocupe todo el espacio de la caja */
  width: 100%;
  height: 100%;
}

@media (max-width: 767px) {
  .carrucel {
    height: 300px;
    /* Ajusta la altura según sea necesario */
  }

  .caja {
    padding: 1%;
    font-size: 16px;
    /* Ajusta el tamaño de la fuente según sea necesario */
  }
}
</style>