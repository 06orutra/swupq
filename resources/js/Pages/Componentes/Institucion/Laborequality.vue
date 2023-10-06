<script>
export default {
            name: 'BannerComponent',
    methods: {
      redirectToPDF(pdfUrl) {
        window.open(pdfUrl, '_blank');

          }
        
        },
      data() {
        return {
        title: "POLÍTICA DE IGUALDAD LABORAL Y NO DISCRIMINACIÓN",
        parrafo1: "La Universidad Politécnica de Querétaro manifiesta el compromiso con la promoción, respeto y protección de los derechos humanos, por lo que en la esfera de su competencia garantizará la igualdad sustantiva entre mujeres y hombres en el ejercicio de sus derechos laborales y la no discriminación en los servicios que ofrece así como en sus condiciones de trabajo, quedando prohibido el maltrato, violencia y segregación de las autoridades hacia el personal y entre el personal en materia de cualquier forma de distinción, exclusión o restricción basada en el origen étnico o nacional, apariencia física, cultura, sexo, género, idioma, edad, discapacidad, condición social, economía, de salud o jurídica, embarazo, lengua, religión, opiniones, preferencias sexuales, estado civil o conyugal, situación migratoria o cualquier otra, que tenga por efecto impedir o anular el reconocimiento o el ejercicio de los derechos y la igualdad real de oportunidades a los miembros de la Comunidad Universitaria dentro de sus instalaciones.",
        }
    }};

</script>


<template>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <div>
        <div class="img_laboreq">                         
            <img class=" h-full w-full " src="https://www.upq.mx/igualdad_laboral/images/270320_banner-igualdad-2020.jpg?crc=3862696609" alt="" >
        </div>  
    
        <div class=" banner_eq w-full" >
            <h2 ><b>IGUALDAD LABORAL Y NO DISCRIMINACIÓN</b></h2>  
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

              

                <div class="contenedorrr relative w-full h-96 overflow-hidden items">
                  <img class="absolute inset-0 w-full h-full object-cover z-1 " src="https://www.upq.mx/igualdad_laboral/images/fondo_banner_2-01.svg?crc=3799554246" alt="Fondo de banner">
                  <div class="flex justify-center items-center h-full">
                      <div class="text-center">
                          <button class="bg-blue-800 bg-opacity-100 hover:bg-gray-400 text-white font-bold py-2 px-4 rounded z-2 absolute" @click="redirectToPDF('https://www.upq.mx/igualdad_laboral/assets/pol%c3%adtica-de-igualdad-laboral-y-no-discriminaci%c3%b3n..pdf')">
                              CONSULTA AQUÍ
                              <p class="text-xs">POLÍTICA DE IGUALDAD LABORAL Y NO DISCRIMINACIÓN A DETALLE</p>
                          </button>
                      </div>
                  </div>
              </div>
              

                <div class="contenedor  relative ">
                  <img src="https://www.upq.mx/igualdad_laboral/images/comiteeticanov2021.jpg?crc=449875955" alt="Imagen 1" class="imagen grande" >
                  <img src="https://www.upq.mx/igualdad_laboral/images/letrero_comite.svg?crc=369507292" alt="Imagen 2" class="imagen pequena" >
                </div> 

                <div  class="flex justify-between button-container"> 
                  <div class="main-menu">

                    <!-- Acta de instalación -->
                      <div class="">
                          <div
                            class="option2 bg-no-repeat border-circle bg-center w-12rem h-12rem z-4 relative shadow-md"
                            style="background-image: url('https://www.upq.mx/igualdad_laboral/images/icono_pagina-01.svg?crc=4137336014');">
                            <button clasx s="pdf-button" @click="redirectToPDF('https://www.upq.mx/igualdad_laboral/assets/miembros-del-comit%c3%a9-de-%c3%a9tica-upq_2021.docx.pdf')"></button>
                            
                          </div>
                        <div class="button-text font-light">Acta de instalación</div>
                      </div>
                    <!-- Código de Ética  -->
                      <div class="">
                        <div
                          class="option bg-no-repeat border-circle bg-center w-12rem h-12rem z-4 relative shadow-md"
                          style="background-image: url('https://www.upq.mx/igualdad_laboral/images/icono_pagina-02.svg?crc=533964385');">
                          <button class="pdf-button" @click="redirectToPDF('https://www.upq.mx/igualdad_laboral/assets/miembros-del-comit%c3%a9-de-%c3%a9tica-upq_2021.docx.pdf')"></button>
                          
                        </div>
                       <div class="button-text font-light">Código de Etica</div>
                      </div>
                    <!-- Lineamientos -->
                    <div class="">
                      <div
                        class="option2 bg-no-repeat border-circle bg-center w-12rem h-12rem z-4 relative shadow-md"
                        style="background-image: url('https://www.upq.mx/igualdad_laboral/images/icono_pagina-03.svg?crc=3860671546');">
                        <button class="pdf-button" @click="redirectToPDF('https://www.upq.mx/igualdad_laboral/assets/miembros-del-comit%c3%a9-de-%c3%a9tica-upq_2021.docx.pdf')"></button>
                        
                       </div>
                     <div class="button-text font-light">Lineamientos</div>
                    </div>
                  </div>
                      
                </div>

                <div class="contenedorrr relative w-full h-96 overflow-hidden items">
                  <img class="absolute inset-0 w-full h-full object-cover z-1 " src="https://www.upq.mx/igualdad_laboral/images/fondo_banner_3-01.svg?crc=4066401794" alt="Fondo de banner">
                  <div class="flex justify-center items-center h-full">
                      <div class="text-center">
                          <button class="bg-red-800 bg-opacity-100 hover:bg-gray-400 text-white font-bold py-2 px-4 rounded z-2 absolute" @click="redirectToPDF('https://mail.google.com/mail/u/0/#inbox')">
                              ASESORÍA Y DENUNCIAS
                              <p class="text-xs">ENVIANOS UN MENSAJE </p>
                              comite.de.etica@upq.edu.mx
                          </button>
                      </div>
                  </div>
              </div>
              <div  class="flex justify-between button-container"> 
                <div class="main-menu">

                  <!-- Protocolo de Violencia Laboral -->
                    <div class="">
                        <div
                          class="option2 bg-no-repeat border-circle bg-center w-12rem h-12rem z-4 relative shadow-md"
                          style="background-image: url('https://www.upq.mx/igualdad_laboral/images/icono_pagina-06.svg?crc=292774967');">
                          <button clasx s="pdf-button" @click="redirectToPDF('https://www.upq.mx/igualdad_laboral/')"></button>
                          
                        </div>
                      <div class="button-text font-light">Protocolo de Violencia Laboral</div>
                    </div>
                  <!-- Protocolo de Hostigamiento y Acoso Sexual -->
                    <div class="">
                      <div
                        class="option bg-no-repeat border-circle bg-center w-12rem h-12rem z-4 relative shadow-md"
                        style="background-image: url('https://www.upq.mx/igualdad_laboral/images/icono_pagina-04.svg?crc=378829962');">
                        <button class="pdf-button" @click="redirectToPDF('https://www.upq.mx/igualdad_laboral/')"></button>
                        
                      </div>
                     <div class="button-text font-light">Protocolo de Hostigamiento y Acoso Sexual</div>
                    </div>
                  <!-- Protocolo para Discriminacion -->
                  <div class="">
                    <div
                      class="option2 bg-no-repeat border-circle bg-center w-12rem h-12rem z-4 relative shadow-md"
                      style="background-image: url('https://www.upq.mx/igualdad_laboral/images/icono_pagina-05.svg?crc=505331560');">
                      <button class="pdf-button" @click="redirectToPDF('https://www.upq.mx/igualdad_laboral/')"></button>
                      
                     </div>
                   <div class="button-text font-light">Protocolo para Discriminacion</div>
                  </div>
                </div>
              </div>

              <div  class="flex justify-between button-container"> 
                <div class="main-menu">

                  <!-- Plan de Accesibilidad -->
                    <div class="">
                        <div
                          class="option2 bg-no-repeat border-circle bg-center w-12rem h-12rem z-4 relative shadow-md"
                          style="background-image: url('https://www.upq.mx/igualdad_laboral/images/icono_pagina-07.svg?crc=423873761');">
                          <button clasx s="pdf-button" @click="redirectToPDF('https://www.upq.mx/igualdad_laboral/assets/plan-de-accesibilidad-upq_2021.pdf')"></button>
                          
                        </div>
                      <div class="button-text font-light">Plan de Accesibilidad</div>
                    </div>
                  <!-- Programa de Protección Civil  -->
                    <div class="">
                      <div
                        class="option bg-no-repeat border-circle bg-center w-12rem h-12rem z-4 relative shadow-md"
                        style="background-image: url('https://www.upq.mx/igualdad_laboral/images/icono_pagina-08.svg?crc=4225580983');">
                        <button class="pdf-button" @click="redirectToPDF('https://www.upq.mx/igualdad_laboral/assets/programa-interno-de-protecci%c3%b3n-civil-de-la-upq%2c-13-de-julio.pdf')"></button>
                        
                      </div>
                     <div class="button-text font-light">Programa de Protección Civil</div>
                    </div>
                </div>
              </div>
                
                


               
                    
                </div>
    </div>
    
</template>

<style scoped>
    .banner_eq {
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
    .shadow-md {
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }
    .button-text {
      margin-top: 0.5rem;
      color: black;
      font-style: not-italic;
  
    }
    /*FHGJBFJC*/
    *{
      margin: 0;
      padding: 0;
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
      margin-top: 40px;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-evenly;
    }
    
    .main-menu a{
      cursor: default;
    }
    
    .main-menu .option{
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
    .main-menu .option:hover{
      box-shadow: 5px 5px 0px 0px #800020, 10px 10px 14px #CC365B;
      transform: translate(-5px, -5px);
    }
    .main-menu .option2:hover{
      box-shadow: 5px 5px 0px 0px #08162fe6, 10px 10px 14px #3d67afe6;
      transform: translate(-5px, -5px);
  }
    
    .button-container {
      display: flex;
      justify-content: space-between;
    }    
  
 

  .contenedor {
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    align-items: center;
    min-height: 100vh;
    position: relative;
  }

  .imagen {
    width: 100%;
    height: auto;
    max-width: 100%;
    max-height: 100%;
  }

  .grande {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 1;
  }

  .pequena {
    width: 83.3333%;
    position: absolute;
    top: 87.8%;
    left: 40%;
    transform: translate(-50%, -50%);
    z-index: 2;
    opacity: 0.8;
  }
  .contenedorrr:hover .imagen {-webkit-transform:scale(1.3);transform:scale(1.3);}
   .contenedorrr {overflow:hidden;}
  
  
    </style>
      
      
      
      
      
