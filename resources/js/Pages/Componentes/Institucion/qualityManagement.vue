<script>
import { Swiper, SwiperSlide } from 'swiper/vue';
import Divider from 'primevue/divider';
import 'swiper/css';
import 'swiper/css/pagination';
import 'swiper/css/navigation';
//Swiper: Galería y carrusel de imágenes
import { Autoplay, Pagination, Navigation } from 'swiper/modules';

export default {
  components: {
    Swiper,
    SwiperSlide,
  },
  setup() {
    return {
      modules: [Autoplay, Pagination, Navigation],
    };
  },
  data() {
    return {
      bannerImage: 'https://www.upq.mx/sistema_gestion_calidad/images/head_banner2.svg?crc=4223862608',
      sistemaCalidad: 'SISTEMA DE GESTIÓN DE LA CALIDAD',
      title: 'POLÍTICA DE CALIDAD',
      parrafo1: 'La Universidad Politécnica de Querétaro establece el compromiso de apoyar su Misión y Visión, orientar su proceso de Operación Académica y Administración Escolar, satisfacer la responsabilidad social y gestionar la propiedad intelectual, para brindar servicios de educación superior que satisfagan consistentemente los requisitos de nuestro alumnado y partes interesadas con un enfoque de mejora continua basado en la implementación, operación y eficacia de un Sistema de Gestión de la Calidad.',
      slide1: 'https://www.upq.mx/sistema_gestion_calidad/images/foto_comite.jpg?crc=4127871446g',
      slide2: 'https://areaf5.es/wp-content/uploads/2023/06/404.jpg',
      eficaciaSistemaIcon: 'https://www.upq.mx/sistema_gestion_calidad/images/icono_sgc-01.svg?crc=3795488148',
      eficaciaSistemaPDF: 'https://www.upq.mx/sistema_gestion_calidad/assets/eficaciasgc2022.pdf',
      eficaciaSistemaTexto: 'Eficacia del Sistema',
      consultaAqui: 'CONSULTA AQUÍ',
      OCPDF: 'https://www.upq.mx/igualdad_laboral/assets/pol%c3%adtica-de-igualdad-laboral-y-no-discriminaci%c3%b3n..pdf',
      OCTexto: 'OBJETIVOS DE LA CALIDAD Y SU PLANIFICACIÓN PARA LOGRARLOS',
      sugerenciasFelicidades: 'SUGERENCIAS/FELICITACIONES',
      envianosMensaje: '¡ENVIANOS UN MENSAJE!',
      correoSugerencias: 'sgc@upq.edu.mx',
      agradecimientoComentarios: 'La UPQ, como parte de la mejora continua, agradece sus comentarios',
      sugerenciasLink: 'https://mail.google.com/mail/u/0/#inbox',
    };
  },
  methods: {
    redirectToPDF(pdfUrl) {
      window.open(pdfUrl, '_blank');
    }
  }
};
</script>
<template>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <div>
        <div class="img_banner">                         
            <img class=" h-full w-full " :src="bannerImage" alt="" >
        </div>  
    
        <div class=" banner_qm w-full" >
            <h2 ><b>{{sistemaCalidad}}</b></h2>  
        </div>

        <div class="title pt-14">
            <p>{{ title }}</p>
                <div class="line" style="margin: 20px auto; width: 70%;">
                </div>

                <div class="text-align: center; col-md-8 offset-md-2 text-justify text-xl" style="width: 80%; margin: 0 auto;">
                    <p class="font-normal" style="margin-top: 2em; margin-bottom:1em; color: black; width: 100%">
                      {{parrafo1}}
                    </p>
                </div>

                <!--Imágenes carrusel-->
      <div class="carrucel  w-full pt-14 ">
        <swiper :spaceBetween="30" :centeredSlides="true" :autoplay="{
          delay: 2500,
          disableOnInteraction: false,
        }" :pagination="{
  clickable: true,
}"  :modules="modules" class="mySwiper">
          <swiper-slide><img class="w-full" :src="slide1"></swiper-slide>
          <swiper-slide><img class="w-full" :src="slide2"></swiper-slide>
        </swiper>
      </div>


                <div  class="flex justify-between button-container my-5"> 
                  <div class="main-menu">
                    <!-- Eficacia del Sistema -->
                      <div class="">
                          <div
                            class="option2 bg-no-repeat border-circle bg-center w-16rem h-16rem z-4 relative shadow-md"
                            :style="{ backgroundImage: 'url(' + eficaciaSistemaIcon + ')' }">
                            <button class="pdf-button" @click="redirectToPDF(eficaciaSistemaPDF)"></button>
                            
                          </div>
                        <div class="button-text font-light">{{eficaciaSistemaTexto}}</div>
                      </div>  
                </div>
            </div> 

            <div class="contenedoor">
              <div class="parallax">
                <div class="caja">
                    <a :href="OCPDF" target="_blank">
                        <p><strong>{{consultaAqui}}</strong></p>
                        <P class="font-normal" style="line-height: 1;">{{OCTexto}}</P>
                    </a>
                </div>
              </div>
            </div>

            <div class="contenedoor">
              <div class="parallax2">
                <div class="caja">
                    <a :href="sugerenciasLink" target="_blank">
                        <p><strong>{{sugerenciasFelicidades}}</strong></p>
                        <P class="font-normal" style="line-height: 1;">¡ENVIANOS UN MENSAJE! </P>
                        <P class="font-normal" style="line-height: 1;">sgc@upq.edu.mx</P>
                        <P class="font-normal" style="line-height: 1;">La UPQ, como parte de la mejora continua, agradece sus comentarios</P>
                    </a>
                </div>
              </div>
            </div>
                </div>
            
    </div>
    
</template>

<style scoped>
    .banner_qm {
        background-color: #800020;
        text-align: center;
        padding: 20px;
        box-shadow: 0px 4px 8px rgba(50, 0, 0, 0.15); /* Ajusta los valores para personalizar la sombra */
    }
    h2 {
        color: white;
    }
    .title {
        color: #881337;
        text-align: center;
        font-weight: 700;
        box-shadow: 0px 4px 8px rgba(50, 50, 0, 0.15);
        font-size: 1.5rem; /* 24px */
        line-height: 2rem; /* 32px */
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
      max-height: 3em; /* o cualquier otra altura máxima deseada */
      overflow: hidden;
    }
    *{
      margin: 0.5;
      padding: 0.5;
      box-sizing: border-box;
      text-decoration: none;
      font-family: sans-serif;
    }
    main{
      width: 100%;
      max-width: 1200px;
      margin: auto;
    }
    .title{
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
    .main-menu a{
      cursor: default;
    }

    
    .main-menu .option2{
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
  
    .main-menu .option2:hover{
      box-shadow: 5px 5px 0px 0px #08162fe6, 10px 10px 14px #3d67afe6;
      transform: translate(-5px, -5px);
  }
    .button-container {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
    }    
  .carrucel{
    height: 590px;
    overflow-y: hidden;
    margin:auto;
    margin-bottom:20px;
  }

  /*estilos para los contenedores de los banners con imagen en movimiento*/
  .contenedoor {
    width: 100%;
    height: 300px;
    max-height: 100%; /* Evita que el contenedor supere su altura máxima */
    overflow: hidden;
    position: relative;
    display: flex;
    z-index: 999;
    top: 0px;
    left: 0px;
  }
  .parallax {
    background-image: url('https://www.upq.mx/sistema_gestion_calidad/images/boton_objetivos-sgc.svg?crc=3836609846');
    background-size: cover;
    background-attachment: fixed; /* Esto crea el efecto de parallax */
    width: 100%;
    height: 100%;
    position: absolute;
    z-index: -10;
    background-position: center center;
  }
  .parallax2 {
    background-image: url('https://www.upq.mx/sistema_gestion_calidad/images/boton_formulario-sgc.svg?crc=407711813');
    background-size: cover;
    background-attachment: fixed; /* Esto crea el efecto de parallax */
    width: 100%;
    height: 100%;
    position: absolute;
    z-index: -10;
    background-position: center center;
  }
  .caja{
    border: 2px solid rgb(255, 255, 255);
    border-radius: 10px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 90%;
    max-width: 800px;
    margin: auto; /* Centra el contenido */
    padding: 20px;
    text-align: center;
    font-size: 20px;
    margin-bottom: 5px;
    color: white;
    transition: border-color 0.3s, background-color 0.3s;
    z-index: -2;
  }
  .caja:hover {
    border-color: rgb(19, 18, 18); /* Cambia el color del borde a rojo al pasar el mouse */
    background-color: rgba(255, 255, 255, 0.571); /* Cambia el fondo a blanco al pasar el mouse */
    color:rgb(19, 18, 18);
  }

  .caja a {
    text-decoration: none; /* Quita el subrayado del enlace */
    color: inherit; /* Hereda el color del texto de la caja */
    display: block; /* Hace que el enlace ocupe todo el espacio de la caja */
    width: 100%;
    height: 100%;
  }  
  @media (max-width: 767px) {
    .carrucel {
      height: 300px; /* Ajusta la altura según sea necesario */
    }
    .caja {
      padding: 1%;
      font-size: 16px; /* Ajusta el tamaño de la fuente según sea necesario */   
    }
  }
    </style>