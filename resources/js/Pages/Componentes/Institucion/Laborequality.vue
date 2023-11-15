<script>
import AppEstructure from '@/Layouts/mainEstructure/AppEstructure.vue';
import carruselPrincipalLogic from '@/Pages/Componentes/Welcome/carruselPrincipalLogic.vue';
import bolitas_pdf from '@/Pages/Componentes/FormacionIntegral/bolitas_pdf.vue';

export default {
  components: {
    AppEstructure,
    carruselPrincipalLogic,
    bolitas_pdf,
  },

  mounted() {
    this.cargarTexto();
    this.cargarPdf();
    this.cargarBanner;
  },

  name: 'BannerComponent',
  /* método que te dirreccionan a los pdfs */
  methods: {
    cargarTexto() {
      axios.post('/IgualdadLaboralText/bannerData').then((response) => {
        this.texto = response.data;
      }).catch((error) => {
        console.log(error);
      });
    },
    cargarPdf() {
      axios.post('/IgualdadLaboralPdf/bannerData').then((response) => {
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
    openPDFModal(pdf, name) {
      this.currentPDF = '/storage/pdfs/' + pdf;
      this.currentPDFName = name;
      this.showPDFModal = true;
    },
    closePDFModal() {
      this.showPDFModal = false;
    },

  },
  data() {
    return {
      texto: [],
      pdfs: [],
      banner: [],
      showPDFModal: false,

      images: {
        fondo1: "https://www.upq.mx/igualdad_laboral/images/fondo_banner_2-01.svg?crc=3799554246",
        fondo2: "https://www.upq.mx/igualdad_laboral/images/fondo_banner_3-01.svg?crc=4066401794",
      }
    }
  }
};

</script>


<template>
  <AppEstructure :controllerName="'/igualdadLaboralPrin/bannerData'">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <div>
      <div class=" banner_eq w-full">
        <h2><b>IGUALDAD LABORAL Y NO DISCRIMINACIÓN</b></h2>
      </div>
      <div class="title pt-20">
        <div v-for="text in texto">
          {{ text.titulo }}
        </div>
        <div class="line" style="margin: 20px auto; width: 70%;">
        </div>

        <div class="text-align: center; col-md-8 offset-md-2 text-justify text-xl pb-20"
          style="width: 80%; margin: 0 auto;">
          <p class="font-normal" style="margin-top: 2em; margin-bottom:1em; color: black; width: 100%">
          <div class="text-content">
            <div v-for="text in texto">
              {{ text.contenido }}
            </div>
          </div>
          </p>
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
            <P class="font-normal" style="line-height: 1.5;">
              {{ pdf.nombre }}
            </P>
          </div>
        </div>
      </div>

      <div class="contenedoor2 ">
        <div class="parallax3">
          <carruselPrincipalLogic :controllerName="'/IgualdadLaboralImgSecundaria/bannerData'" />
          <div v-for="img in banner">
            {{ img.img }}
          </div>
        </div>
      </div>

      <div class="flex justify-between button-container">
        <div class="main-menu">
          <bolitas_pdf :loadDataUrl="'/IgualdadLaboralPdfEtica/bannerData'" />
        </div>
      </div>
      <div class="title2 pb-5">
        <p class="text-black text-content pt-14"><strong>POLÍTICA DE IGUALDAD LABORAL Y NO DISCRIMINACIÓN</strong></p>
      </div>
      <div class="contenedoor">
        <div class="parallax2" :style="{ backgroundImage: 'url(' + images.fondo2 + ')' }">
          <div class="caja">
            <a :href="'https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox'" target="_blank">
              <p><strong>ASESORÍA Y DENUNCIAS</strong></p>
              <P class="font-normal" style="line-height: 1;">ENVIANOS UN MENSAJE </P>
              <P class="font-normal" style="line-height: 1;">comite.de.etica@upq.edu.mx </P>
            </a>
          </div>
        </div>
      </div>

      <div class="flex justify-between button-container">
        <div class="main-menu">
          <bolitas_pdf :loadDataUrl="'/IgualdadLaboralPdfIgualdad/bannerData'" />
        </div>
      </div>
    </div>

  </AppEstructure>
</template>

<style lang="scss">
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

/* Estilos de Caro */
.banner_eq {
  background-color: #800020;
  text-align: center;
  padding: 20px;
  box-shadow: 0px 4px 8px rgba(50, 0, 0, 0.15);
  /* Ajusta los valores para personalizar la sombra */
}

h2 {
  color: white;
}

.title {
  color: #881337;
  text-align: center;
  font-weight: 700;
  box-shadow: 0px 4px 8px rgba(50, 50, 0, 0.15);
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

/*estilos del contenedor para los botones circulares*/
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

.title2 {
  color: #000000;
  text-align: center;
  font-weight: 700;
  box-shadow: 0px 4px 8px rgba(50, 50, 0, 0.15);
  font-size: 1.5rem;
  /* 24px */
  line-height: 2rem;
  /* 32px */
}

.dark-mode .text-content {
  color: white;
}

.dark-mode .title {
  color: white;
}

.main-menu {
  width: 100%;
  margin: auto;
  margin-top: 40px;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-evenly;
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
  z-index: 1;
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

/*estilos para el contenedor del coite de ética*/
.contenedoor2 {
  width: 100%;
  height: 600px;
  /* Cambiado a 600px */
  position: relative;
  display: flex;
  z-index: 1;
  top: 30px;
  left: 0;
}

.parallax3 {
  background-size: cover;
  width: 100%;
  height: 100%;
  /* Cambiado a 100% */
  max-height: 100%;
  position: relative;
  z-index: -10;
  background-position: center center;
}

@media (max-width: 767px) {
  .caja {
    padding: 1%;
    font-size: 16px;
    /* Ajusta el tamaño de la fuente según sea necesario */
  }
}

@media screen and (max-width: 768px) {
  .contenedoor2 {
    height: auto;
    /* Cambiado a auto */
  }

  .parallax3 {
    height: 300px;
    /* Altura deseada para pantallas pequeñas */
  }
}


@media (min-width: 400px){
  .main-menu {
    margin-top: 100px;
  }
}
@media (min-width: 490px){
  .main-menu {
    margin-top: 150px;
  }
}
@media (min-width: 500px){
  .main-menu {
    margin-top: 200px;
  }
}
@media (min-width: 600px){
  .main-menu {
    margin-top: 250px;
  }
}
@media (min-width: 700px){
  .main-menu {
    margin-top: 300px;
  }
}
@media (min-width: 770px) and (max-width: 799px){
  .main-menu {
    margin-top: 30px;
  }
}
@media (min-width: 800px) and (max-width: 889px){
  .main-menu {
    margin-top: 100px;
  }
}
@media (min-width: 890px) and (max-width: 949px){
  .main-menu {
    margin-top: 200px;
  }
}
@media (min-width: 950px) and (max-width: 2000px){
  .main-menu {
    margin-top: 200px;
  }
}
</style>