<script>
export default {
  mounted() {
    const loaders = document.querySelectorAll('.loader');

    loaders.forEach(loader => {
      const text = loader.querySelector('.text'); 

      loader.addEventListener('mouseenter', () => {
        loader.classList.add('active');
        text.style.opacity = '0'; 
      });

      loader.addEventListener('mouseleave', () => {
        loader.classList.remove('active');
        text.style.opacity = '1';
      });
    });


    loaders.forEach((loader, index) => {
      loader.addEventListener('click', () => {
        const titles = [
          "MODELO POR COMPETENCIAS",
          "VINCULACIÓN CON LA INDUSTRIA",
          "ESTANCIAS Y ESTADÍAS",
          "LENGUA EXTRANJERA",
          "PROGRAMAS Y TUTORÍAS",
          "FORMACIÓN INTEGRAL",
          "INFRAESTRUCTURA DE CALIDAD",
          "AMPLIA OCUPACIÓN DE EGRESADAS Y EGRESADOS",
          "MOVILIDAD NACIONAL E INTERNACIONAL"
        ];

        const contents = [
          "Los Planes Curriculares están diseñados para la acreditación del dominio de competencias profesionales en áreas científico-tecnológicas, culturales y sociales que formen profesionistas de alta calidad que puedan competir a nivel internacional.",
          "Ofrecemos una formación a través de la especialización tecnológica y participación altamente competitiva en el sector industrial en beneficio del desarrollo estatal, regional y nacional.",
          "Importantes asignaturas que permiten a nuestras y nuestros estudiantes insertarse en el desarrollo de proyectos en la empresa, con el din de adquirir las habilidades y competencias requeridas para la resolución de problemas en su área de especialidad.",
          "Nuestro eficaz sistema de enseñanza del idioma inglés incluido en el Plan de Estudios de todos nuestros Programas Educativos, permite a nuestros estudiantes aprender y dominar el idioma como segunda lengua.",
          "Con el apoyo de los docentes, el alumnado recibe orientación para la toma de descisiones académicas, para fortalecer el avance y conclusión de sus estudios en tiempo y forma.",
          "Sólida formación en valores para el buen desempeño e integración en distintos ambientes de trabajo, lo cual genera un alto grado de aceptación de nuestras egresadas y egresados en la industria.",
          "Laboratorios y talleres con alta especialización tecnológica, amplios espacios para actividades desportivas y aulas con equipamiento funcional para los mejores ambientes de aprendizaje del alumnado.",
          "Mediante la titulación automática, nuestras egresadas y nuestros egresados tienen la posibilidad de integrarse de manera inmediata al campo de trabajo en su área de especialidad.",
          "El proceso de globalización económica requiere impulsar el desarrollo de aptitudes para la evaluación y participación",
        ];

        this.openModal(titles[index], contents[index]);
      });
    });

    function startCounter(elementId, endNumber) {
            let counter = 1;
            const element = document.getElementById(elementId);
            const totalSteps = Math.ceil(1500 / 15);

            const increment = endNumber / totalSteps;

            const intervalId = setInterval(() => {
                counter += increment;
                element.textContent = Math.round(counter);

                if (counter >= endNumber) {
                    clearInterval(intervalId);
                }
            }, 10);
        }
        window.onload = () => {
        startCounter("counter1", 769);
        startCounter("counter2", 474);
        startCounter("counter3", 659); 
        startCounter("counter4", 587); 
        startCounter("counter5", 208);
        startCounter("counter6", 541);
        startCounter("counter7", 985);
        startCounter("counter8", 4229);
    };
    },

data() {
    return {
      modalTitle: '',
      modalContent: '',
      showModal: false,
    };
  },
  methods: {
    openModal(title, content) {
      this.modalTitle = title;
      this.modalContent = content;
      this.showModal = true;
    },
    closeModal() {
      this.showModal = false;
    },
  },
  };
</script>

<template>
    <div class="mx-auto">                    
        <div class="banner">                               
            <img src="https://www.upq.mx/media/slider/MODELOEDUCATIVO.png" alt="" class="h-full w-full">                
        </div> 
        
        
        <div class="w-full" style="background-color: #800020; text-align: left; padding: 20px; " >
           <h2 style="color: white;"><b>MODELO EDUCATIVO</b></h2>
        </div> 
        
        <!--loader-->
        <section>
      <div class="loader-container">
          <div class="vertical-column circle-container">
            <div class="background-image circle" style="background-image: url('https://www.upq.mx/assets/modelo-educativo/4.png')">
              <div class="loader" id="loader1">
                  <div class="text" id="text1">MODELO POR COMPETENCIAS</div>
              </div>
        </div>

            <div class="background-image circle" style="background-image: url('https://www.upq.mx/assets/modelo-educativo/3.png')">
              <div class="loader" id="loader2"> 
                  <div class="text" id="text2">VINCULACIÓN CON LA INDUSTRIA</div>
              </div>
              </div> 

            <div class="background-image circle" style="background-image: url('https://www.upq.mx/assets/modelo-educativo/8.png')">
              <div class="loader" id="loader1"> 
                  <div class="text" id="text1">ESTANCIAS Y ESTADÍAS</div>
              </div>
              </div> 
        </div>

        <div class="vertical-column circle-container">
          <div class="background-image circle" style="background-image: url('https://www.upq.mx/assets/modelo-educativo/1.png')">
            <div class="loader" id="loader2">
              <div class="text" id="text2">LENGUA EXTRANJERA</div>
            </div>
            </div> 
        

          <div class="background-image circle" style="background-image: url('https://www.upq.mx/assets/modelo-educativo/9.png')">
            <div class="loader" id="loader1"> 
              <div class="text" id="text1">PROGRAMAS Y TUTORÍAS</div>
              </div>
            </div>

          <div class="background-image circle" style="background-image: url('https://www.upq.mx/assets/modelo-educativo/5.png')">
            <div class="loader" id="loader2"> 
                <div class="text" id="text6">FORMACIÓN INTEGRAL</div>
            </div>
            </div> 
        </div>

        <div class="vertical-column circle-container">
            <div class="background-image circle" style="background-image: url('https://www.upq.mx/assets/modelo-educativo/7.png')">
              <div class="loader" id="loader1"> 
                  <div class="text" id="text1">INFRAESTRUCUTRA DE CALIDAD</div>
              </div>
              </div> 

            <div class="background-image circle" style="background-image: url('https://www.upq.mx/assets/modelo-educativo/6.png')">
              <div class="loader" id="loader2"> 
                  <div class="text" id="text2">AMPLIA OCUPACIÓN DE EGRESADAS Y EGRESADOS</div>
              </div>
              </div> 

            <div class="background-image circle" style="background-image: url('https://www.upq.mx/assets/modelo-educativo/2.png')">
                <div class="loader" id="loader1"> 
                  <div class="text" id="text1">MOVILIDAD NACIONAL E INTERNACIONAL</div>
                </div> 
            </div>
        </div>
      </div>
        <div class="modal" :class="{ 'active': showModal }">
            <div class="modal-content">
              <div class="modal-body">
                <h3 style="margin-bottom: 2em; text-align: center; color:#fff"><b>{{ modalTitle }}</b></h3>
                <p>{{ modalContent }}</p>
              </div>
              <div class="modal-button" style="margin-top: 30px;">
                <button type="button"  class="btn btn-primary" @click="closeModal" style="border-radius: 0">CERRAR</button>
              </div>
            </div>
        </div>
        <br><br><br>
        </section>

        <!-- Carreras -->
        <section>
          <hr>
          <br> <br>
          <div class="container text-center">
            <header>
              <h1 style="color: #414141;">ALUMNADO INSCRITO CICLO ESCOLAR 
                <br>
                SEPTIEMBRE - DICIEMBRE 2023
              </h1>
              <hr>
            </header>
          </div>
          
          <div>
          <div class=" row box-gadient box-blue">
            <div class="col-xs-6 col-sm-6 col-3 col-md-3" style="background:#6D0A16; -webkit-transition: background 1s; transition: background 1s; color: white; text-align: center;">
              <img src="https://www.upq.mx/media/careers/logo_white/LOGOSCARRERAS-05.png" style="max-height: 100px; margin:0 0 16px 0;">
              <h2 class="font-raleway" data-speed="3000" style="font-family: cursive;" id="counter1">
                770
              </h2>
              <p style="font-size: 1.3em; margin: 0;">Ingeniería Mecatrónica</p>
            </div>

              <div class="col-xs-12 col-sm-6 col-3 col-md-3" style="background:#37A6DE; -webkit-transition: background 1s; transition: background 1s; color: white; text-align: center;">
                  <img src="https://www.upq.mx/media/careers/logo_white/LOGOSCARRERAS-02.png" style="max-height: 100px; margin: 0 0 16px 0;">
                  <h2 class="font-raleway" data-speed="3000" style="font-family: cursive;" id="counter2">
                      474
                  </h2>
                  <p style="font-size: 1.3em; ;">Ingeniería en Sistemas Computacionales</p>
              </div>

              <div class="col-xs-6 col-sm-6 col-3 col-md-3" style="background:#3e0b60; -webkit-transition: background 1s; transition: background 1s; color: white; text-align: center;">
                  <img src="https://www.upq.mx/media/careers/logo_white/AUTOMOTRIZ.png" style="max-height: 100px; margin: 0 0 16px 0;">
                  <h2 class="font-raleway" data-speed="3000" style="font-family: cursive;" id="counter3">
                      659
                  </h2>
                  <p style="font-size: 1.3em;;">Ingeniería en Tecnología Automotriz</p>
              </div>

              <div class="col-xs-6 col-sm-6 col-3 col-md-3" style="background:#182353; -webkit-transition: background 1s; transition: background 1s; color: white; text-align: center;">
                <img src="https://www.upq.mx/media/careers/logo_white/LOGOSCARRERAS-041.png" style="max-height: 100px; margin: 0 0 16px 0">
                <h2 class="font-raleway" data-speed="3000" style="font-family: cursive;" id="counter4">
                  587
                </h2>
                <p style="font-size: 1.3em;">Ingeniería en Tecnología de Manufactura</p>
              </div>

            </div>

          <div class=" row box-gadient box-blue">

              <div class="col-xs-6 col-sm-6 col-3 col-md-3" style="background:#8eae25; -webkit-transition: background 1s; transition: background 1s; color: white; text-align:center;">
                <img src="https://www.upq.mx/media/careers/logo_white/REDES-01white.png" style="max-height: 100px; margin:0 0 16px 0;">
                <h2 class="font-raleway" data-speed="3000" style="color: white; font-family: cursive; " id="counter5">
                  208
                </h2>
                <p style="font-size: 1.3em;">Ingeniería en Redes y Telecomunicaciones</p>
              </div>

              <div class="col-xs-6 col-sm-6 col-3 col-md-3" style="background:#ce172d; -webkit-transition: background 1s; transition: background 1s; color: white; text-align: center;">
                <img src="https://www.upq.mx/media/careers/logo_white/LOGOSCARRERAS-06_1.png" style="max-height: 100px; margin:0 0 16px 0;">
                <h2 class="font-raleway" data-speed="3000" style="color: white; font-family: cursive;" id="counter6">
                  541
                </h2>
                <p style="font-size: 1.3em;">Licenciatura en Administración y Gestión Empresarial</p>
              </div>

              <div class="col-xs-6 col-sm-6 col-3 col-md-3" style="background:#000000; -webkit-transition: background 1s; transition: background 1s; color: white; text-align: center;">
                <img src="https://www.upq.mx/media/careers/logo_white/LOGOSCARRERAS-07.png" style="max-height: 100px; margin:0 0 16px 0;">
                <h2 class="font-raleway" data-speed="3000" style="color: white; font-family: cursive;" id="counter7">
                  985
                </h2>
                <p style="font-size: 1.3em;">Licenciatura en Negocios Internacionales</p>
              </div>

              <div class="col-xs-6 col-sm-6 col-3 col-md-3" style="background:#8C2437; -webkit-transition: background 1s; transition: background 1s; color: white; text-align: center;">
                <img src="https://www.upq.mx/assets/logos/logo-white.svg" style="max-height: 100px; margin:0 0 16px 0;">
                <h2 class="font-raleway" data-speed="3000" style="color: white; font-family: cursive;" id="counter8">
                  4229
                </h2>
                <p style="font-size: 1.3em;">Total del Alumnado inscrito</p>
              </div>
            </div>

          </div> 
          <hr><br>
        </section>
        

    </div>

</template>

<style>
.container {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}
/* Espacio de cada cuadrado */
.col-xs-6,
.col-sm-6,
.col-3 {
  flex: 2;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
}
.row{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  box-sizing: border-box;
  transform: scale(1.0);
  width: 100%;
}
/* Estilos para las carreras */
p{
  display: block;
  -webkit-margin-before: 0.1 em;
  -webkit-margin-after: 0.1em;
  -webkit-margin-start: 0px;
  -webkit-margin-end: 0px;
}
body{
  font-family: 'Open Sans', Arial, Helvetica, sans-serif;
  -webkit-font-smoothing: antialiased;
  font-size: 20px;
  line-height: 1.7;
}
h2{  
  margin: 0 0 32px 0;
  position: relative;
  color: white;
  font-size: 35px;
}

/* Parte de los círculos */
.modal {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 999;
  justify-content: flex-start;
  align-items: center;
  flex-direction: column;
}
.modal-content{
  max-width: 700px;
  max-height: 700px; 
  background: rgba(8, 22, 47, 0.9);
  border-radius: 10px;
  padding: 25px;
  text-align: justify;
  font-family: 'Open Sans',Arial,Helvetica,sans-serif;
}
.modal-body {
  font-family: 'Open Sans',Arial,Helvetica,sans-serif;
  color: #fff;
  font-size: 22px;
  max-height: 300px; 
  overflow-y: auto;
}
.modal-button {
  text-align: center;
}
.modal-button button {
  background-color: #8C2437;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  cursor: pointer;
  font-size: 16px;
}
.modal-button button:hover {
  background-color: #6B1B2D; 
}
.modal.active {
  display: flex;
}
.loader {
  width: 320px;
  height: 320px;
  border-radius: 50%;
  position: relative;
  overflow: hidden;
  transition: transform 1.9s ease; 
  background-color: transparent;
}
#loader1{
  border: 13px solid #08162fe6;
  border-top: 13px solid #08162fe6;
  border-right: 13px solid #f3f3f3;
  border-bottom: 13px solid #f3f3f3;
  transition: transform 1.9s ease;
}
#loader2{
  border: 13px solid #8C2437;
  border-top: 13px solid #8C2437;
  border-right: 13px solid #f3f3f3;
  border-bottom: 13px solid #f3f3f3;
  transition: transform 1.9s ease;
}
.vertical-column {
  display: flex;
  flex-direction: row;
  align-items: center; 
  margin-bottom: 40px;
  margin-right: 30px;
  justify-content: space-around;
  margin-top: 30px;
}
.circle {
  width: 100px;
  height: 100px;
  background-color: #f3f3f3;
}
.text {
  width: 100%;
  height: 100%;
  background-color: rgba(140, 36, 55,0.8); 
  color: #fff; 
  text-align: center;
  display:flex;
  align-items: center;
  justify-content: center;
  line-height: 2;
  position: absolute;
  top: 0;
  left: 0;
  background-attachment: fixed;
  pointer-events:none; 
  transition: opacity 0.2s ease; 
  font-size: 22px; 
  font-weight: bold;
}
#text1 {
  background-color: rgba(8,22,47,0.8); 
}
.background-image {
  width: 320px;
  height: 320px;
  border-radius: 50%; 
  overflow: hidden;
  position: relative;
  background-repeat: no-repeat;
  background-size: cover;
}
.background-image::before {
  content: "";
  display: block;
  width: 100%;
  height: 100%;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center;
  position: absolute;
}
.loader.active {
  transform: rotate(360deg) !important;
}
.loader:hover .text{
    opacity: 0;
}

/* Elementos responsive */
@media (max-width: 425px) {
  .vertical-column {
    flex-direction: column; 
    margin-right: 0; 
    margin-bottom: 20px; 
  }
  .circule{
    margin-top: 30px;
  }
  .box-gadient {
    display: flex;
    flex-direction: column; /* Alinea los cuadros verticalmente */
  }
  .col-xs-6,
  .col-sm-6,
  .col-3,
  .col-md-3 {
    width: 100%; /* Ancho completo para que los cuadros ocupen toda la pantalla */
    margin-bottom: 0px; /* Espacio inferior entre cuadros */
  }
}

@media (max-width: 768px) and (min-width: 426px) {
  .vertical-column{
    flex-direction: row;
    justify-content: space-between;
  }
  .circle{
    display: flex;
    flex-direction: row; 
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
    margin-right: 0;
  }
  .circle-container {
    display: flex;
    justify-content: space-between;
}   
}
</style>