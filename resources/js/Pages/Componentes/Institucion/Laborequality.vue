<script>
import AppEstructure from '@/Layouts/mainEstructure/AppEstructure.vue';

export default {
  components: {
    AppEstructure
  },

  name: 'BannerComponent',
  /* método que te dirreccionan a los pdfs */
  methods: {
    redirectToPDF(pdfUrl) {
      window.open(pdfUrl, '_blank');

    }

  },
  data() {
    return {
      title: "POLÍTICA DE IGUALDAD LABORAL Y NO DISCRIMINACIÓN",
      parrafo1: "La Universidad Politécnica de Querétaro manifiesta el compromiso con la promoción, respeto y protección de los derechos humanos, por lo que en la esfera de su competencia garantizará la igualdad sustantiva entre mujeres y hombres en el ejercicio de sus derechos laborales y la no discriminación en los servicios que ofrece así como en sus condiciones de trabajo, quedando prohibido el maltrato, violencia y segregación de las autoridades hacia el personal y entre el personal en materia de cualquier forma de distinción, exclusión o restricción basada en el origen étnico o nacional, apariencia física, cultura, sexo, género, idioma, edad, discapacidad, condición social, economía, de salud o jurídica, embarazo, lengua, religión, opiniones, preferencias sexuales, estado civil o conyugal, situación migratoria o cualquier otra, que tenga por efecto impedir o anular el reconocimiento o el ejercicio de los derechos y la igualdad real de oportunidades a los miembros de la Comunidad Universitaria dentro de sus instalaciones.",
      sugerenciasLink: 'https://mail.google.com/mail/u/0/#inbox',

      images: {
        banner: "https://www.upq.mx/igualdad_laboral/images/270320_banner-igualdad-2020.jpg?crc=3862696609",
        letrero: "https://www.upq.mx/igualdad_laboral/images/letrero_comite.svg?crc=369507292",
        fondo1: "https://www.upq.mx/igualdad_laboral/images/fondo_banner_2-01.svg?crc=3799554246",
        fondo2: "https://www.upq.mx/igualdad_laboral/images/fondo_banner_3-01.svg?crc=4066401794",
        fondo3: "https://www.upq.mx/igualdad_laboral/images/comiteeticanov2021.jpg?crc=449875955",
        icon1: "https://www.upq.mx/igualdad_laboral/images/icono_pagina-01.svg?crc=4137336014",
        icon2: "https://www.upq.mx/igualdad_laboral/images/icono_pagina-02.svg?crc=533964385",
        icon3: "https://www.upq.mx/igualdad_laboral/images/icono_pagina-03.svg?crc=3860671546",
        icon4: "https://www.upq.mx/igualdad_laboral/images/icono_pagina-06.svg?crc=292774967",
        icon5: "https://www.upq.mx/igualdad_laboral/images/icono_pagina-04.svg?crc=378829962",
        icon6: "https://www.upq.mx/igualdad_laboral/images/icono_pagina-05.svg?crc=505331560",
        icon7: "https://www.upq.mx/igualdad_laboral/images/icono_pagina-07.svg?crc=423873761",
        icon8: "https://www.upq.mx/igualdad_laboral/images/icono_pagina-08.svg?crc=4225580983",
      },
      pdfLinks: {
        politica: "https://www.upq.mx/igualdad_laboral/assets/pol%c3%adtica-de-igualdad-laboral-y-no-discriminaci%c3%b3n..pdf",
        actaInstalacion: "https://www.upq.mx/igualdad_laboral/assets/miembros-del-comit%c3%a9-de-%c3%a9tica-upq_2021.docx.pdf",
        codigoEtica: "https://www.upq.mx/igualdad_laboral/assets/miembros-del-comit%c3%a9-de-%c3%a9tica-upq_2021.docx.pdf",
        lineamientos: "https://www.upq.mx/igualdad_laboral/assets/miembros-del-comit%c3%a9-de-%c3%a9tica-upq_2021.docx.pdf",
        asesoriaDenuncias: "https://mail.google.com/mail/u/0/#inbox",
        protocoloViolencia: "https://www.upq.mx/igualdad_laboral/",
        protocoloAcosoSexual: "https://www.upq.mx/igualdad_laboral/",
        protocoloDiscriminacion: "https://www.upq.mx/igualdad_laboral/",
        planAccesibilidad: "https://www.upq.mx/igualdad_laboral/assets/plan-de-accesibilidad-upq_2021.pdf",
        programaProteccionCivil: "https://www.upq.mx/igualdad_laboral/assets/programa-interno-de-protecci%c3%b3n-civil-de-la-upq%2c-13-de-julio.pdf"
      }
    }
  }
};

</script>


<template>
  <AppEstructure :controllerName="'/igualdadLaboralPrin/bannerData'">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <div>
      <div class="img_laboreq">
        <img class=" h-full w-full " :src="images.banner" alt="">
      </div>

      <div class=" banner_eq w-full">
        <h2><b>IGUALDAD LABORAL Y NO DISCRIMINACIÓN</b></h2>
      </div>

      <div class="title pt-14">
        <p>{{ title }}</p>
        <div class="line" style="margin: 20px auto; width: 70%;">
        </div>

        <div class="text-align: center; col-md-8 offset-md-2 text-justify text-xl" style="width: 80%; margin: 0 auto;">
          <p class="font-normal" style="margin-top: 2em; margin-bottom:1em; color: black; width: 100%">
            {{ parrafo1 }}
          </p>
        </div>
        <div class="contenedoor">
          <div class="parallax" :style="{ backgroundImage: 'url(' + images.fondo1 + ')' }">
            <div class="caja">
              <a :href="pdfLinks.politica" target="_blank">
                <p><strong>CONSULTA AQUÍ</strong></p>
                <P class="font-normal" style="line-height: 1.5;">POLITICA DE IGUALAD LABORAL Y NO DISCRIMINACIÓN A DETALLE
                </P>
              </a>
            </div>
          </div>
        </div>

        <div class="contenedoor2 ">
          <div class="parallax3 " :style="{ backgroundImage: 'url(' + images.fondo3 + ')' }">
            <div class="caja2">
              <img class="letrero" :src="images.letrero" alt="" style="opacity: 0.8;">
            </div>
          </div>
        </div>

        <div class="flex justify-between button-container">
          <div class="main-menu">

            <!-- Acta de instalación -->
            <div class="">
              <div class="option2 bg-no-repeat border-circle bg-center w-14rem h-14rem z-4 relative shadow-md"
                :style="{ backgroundImage: 'url(' + images.icon1 + ')' }">
                <button class="pdf-button" @click="redirectToPDF(pdfLinks.actaInstalacion)"></button>

              </div>
              <div class="button-text-container">
                <div class="button-text font-light">Acta de instalación</div>
              </div>
            </div>
            <!-- Código de Ética  -->
            <div class="">
              <div class="option bg-no-repeat border-circle bg-center w-14rem h-14rem z-4 relative shadow-md"
                :style="{ backgroundImage: 'url(' + images.icon2 + ')' }">
                <button class="pdf-button" @click="redirectToPDF(pdfLinks.codigoEtica)"></button>

              </div>
              <div class="button-text-container">
                <div class="button-text font-light">Código de Ética</div>
              </div>
            </div>
            <!-- Lineamientos -->
            <div class="">
              <div class="option2 bg-no-repeat border-circle bg-center w-14rem h-14rem z-4 relative shadow-md"
                :style="{ backgroundImage: 'url(' + images.icon3 + ')' }">
                <button class="pdf-button" @click="redirectToPDF(pdfLinks.lineamientos)"></button>

              </div>
              <div class="button-text-container">
                <div class="button-text font-light">Lineamientos</div>
              </div>
            </div>
          </div>

        </div>

        <p class="text-black pt-14"><strong>POLÍTICA DE IGUALDAD LABORAL Y NO DISCRIMINACIÓN</strong></p>
        <div class="contenedoor">
          <div class="parallax2" :style="{ backgroundImage: 'url(' + images.fondo2 + ')' }">
            <div class="caja">
              <a :href="sugerenciasLink" target="_blank">
                <p><strong>ASESORÍA Y DENUNCIAS</strong></p>
                <P class="font-normal" style="line-height: 1;">ENVIANOS UN MENSAJE </P>
                <P class="font-normal" style="line-height: 1;">comite.de.etica@upq.edu.mx </P>
              </a>
            </div>
          </div>
        </div>

        <div class="flex justify-between button-container">
          <div class="main-menu">

            <!-- Protocolo de Violencia Laboral -->
            <div class="">
              <div class="option2 bg-no-repeat border-circle bg-center w-14rem h-14rem z-4 relative shadow-md"
                :style="{ backgroundImage: 'url(' + images.icon4 + ')' }">
                <button class="pdf-button" @click="redirectToPDF(pdfLinks.protocoloViolencia)"></button>

              </div>
              <div class="button-text-container">
                <div class="button-text font-light">Protocolo de Violencia Laboral</div>
              </div>
            </div>
            <!-- Protocolo de Hostigamiento y Acoso Sexual -->
            <div class="">
              <div class="option bg-no-repeat border-circle bg-center w-14rem h-14rem z-4 relative shadow-md"
                :style="{ backgroundImage: 'url(' + images.icon5 + ')' }">
                <button class="pdf-button" @click="redirectToPDF(pdfLinks.protocoloAcosoSexual)"></button>

              </div>
              <div class="button-text-container">
                <div class="button-text font-light">Protocolo de Hostigamiento y Acoso Sexual</div>
              </div>
            </div>
            <!-- Protocolo para Discriminacion -->
            <div class="">
              <div class="option2 bg-no-repeat border-circle bg-center w-14rem h-14rem z-4 relative shadow-md"
                :style="{ backgroundImage: 'url(' + images.icon6 + ')' }">
                <button class="pdf-button" @click="redirectToPDF(pdfLinks.protocoloDiscriminacion)"></button>

              </div>
              <div class="button-text-container">
                <div class="button-text font-light">Protocolo para Discriminacion</div>
              </div>
            </div>
          </div>
        </div>

        <div class="flex justify-between button-container">
          <div class="main-menu">

            <!-- Plan de Accesibilidad -->
            <div class="">
              <div class="option2 bg-no-repeat border-circle bg-center w-14rem h-14rem z-4 relative shadow-md"
                :style="{ backgroundImage: 'url(' + images.icon7 + ')' }">
                <button class="pdf-button" @click="redirectToPDF(pdfLinks.planAccesibilidad)"></button>

              </div>
              <div class="button-text-container">
                <div class="button-text font-light">Plan de Accesibilidad</div>
              </div>
            </div>
            <!-- Programa de Protección Civil  -->
            <div class="">
              <div class="option bg-no-repeat border-circle bg-center w-14rem h-14rem z-4 relative shadow-md"
                :style="{ backgroundImage: 'url(' + images.icon8 + ')' }">
                <button class="pdf-button" @click="redirectToPDF(pdfLinks.programaProteccionCivil)"></button>

              </div>
              <div class="button-text-container">
                <div class="button-text font-light">Programa de Protección Civil</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AppEstructure>
</template>

<style scoped>
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

.pdf-button {
  width: 100%;
  height: 100%;
  background: none;
  border: none;
  cursor: pointer;
}

.shadow-md {
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

.button-text-container {
  text-align: center;
  max-width: 14rem;
  /* O el ancho que desees */
  margin: 0 auto;
  /* Centra el contenido horizontalmente */
}

.button-text {
  margin-top: 0.5rem;
  color: black;
  font-style: not-italic;
  max-height: 6em;
  /* o cualquier otra altura máxima deseada */
  overflow: hidden;
  word-wrap: break-word;
  /* para la separacion de palabras muy grandes */
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

.title {
  text-align: center;
  margin-top: 80px;
}

.main-menu {
  width: 100%;
  margin: auto;
  margin-top: 40px;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-evenly;
}

.main-menu a {
  cursor: default;
}

/*estilos para las sombras rojas*/
.main-menu .option {
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

.main-menu .option:hover {
  box-shadow: 5px 5px 0px 0px #800020, 10px 10px 14px #CC365B;
  transform: translate(-5px, -5px);
}

/*estilos para las sombras azules*/
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

/*hace que todo lo que este dentro del contenedor se acomode automaticamente */
.button-container {
  display: flex;
  justify-content: space-between;

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
  z-index: 999;
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
  z-index: 999;
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

.caja2 {
  position: absolute;
  bottom: 0;
  left: 0%;
  width: 80%;
}

.letrero {
  position: absolute;
  bottom: 0;
  left: 0%;
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
</style>
      
      
      
      
      
