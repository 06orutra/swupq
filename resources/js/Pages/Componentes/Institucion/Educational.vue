<script>
import axios from 'axios';
import AppEstructure from '@/Layouts/mainEstructure/AppEstructure.vue';

export default {
  components: {
    AppEstructure,
  },

  mounted() {
    //Función para mandar a llamar el texto de la base de datos
    this.cargarTexto();
    //Función para los círculos del modelo educativo
    this.cargarModal().then(() => {
      this.$nextTick(this.inicializarInteracciones);
    });

    //Cosas del módulo como tal:

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
      texto: [],
      modal: [],

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
    //Para ver si el index es par o impar :D
    getIndex(index) {
      return index % 2 === 0 ? 2 : 1;
    },
    //Método de carga del texto de "Alumnado Inscrito Ciclo Escolar[...]"
    cargarTexto() {
      axios.post('/modeduCiclo/bannerData').then((response) => {
        this.texto = response.data;
      }).catch((error) => {
        console.log(error);
      });
    },
    //Método del modal (las bolitas)
    cargarModal() {
      return axios.post('/modalModEdu/bannerData').then((response) => {
        this.modal = response.data;
      }).catch((error) => {
        console.log(error);
      });
    },

    inicializarInteracciones() {
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

        loader.addEventListener('click', () => {
          this.openModal(title[loader.dataset.index], contents[loader.dataset.index]);
        });
      });
    },
  },

};
</script>

<template>
  <AppEstructure :controllerName="'/educationalBanner/bannerData'">
    <div class="mx-auto">

      <!--loader y los modales. El color del background se define por el id%2
        La imagen (aún no) la obtiene desde lo subido a la tabla modalModEdu
        la descripción al abrir el modal la obtiene del apartado "Link" en la tabla
        Y finalmente, el título, tanto dentro como fuera del Modal, se obtiene por el
        apartado "nombre" en la tabla modalModEdu-->
      <section>
        <br>
        <div class="circle-container">
          <div v-for="(item, index) in modal" :key="item.id" class="circle-wrapper">
            <div class="background-image circle" data-index="0" @click="openModal(item.nombre, item.link)">
              <img :src="'/storage/' + item.imagen" alt="Valor Image" class="circle-img" />
              <div class="loader" :id="'loader' + getIndex(index)">
                <div class="text" :id="'text' + getIndex(index)">{{ item.nombre }}</div>
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
              <button type="button" class="btn btn-primary" @click="closeModal" style="border-radius: 0">CERRAR</button>
            </div>
          </div>
        </div>
        <br><br><br>
      </section>

      <!-- Carreras -->
      <section>
        <hr>
        <br> <br>
        <div v-for="datosTexto in texto" class="container text-center">
          <header>
            <!-- Esto mostrará solamente el contenido de la primera tabla
              de la sección en la base de datos, es decir, solamente el
              primer (y en teoría, único) registro en el admin. -->
            <h1 class="titulo"> {{ datosTexto.titulo }}
              <br>
              {{ datosTexto.contenido }}
              <br>
            </h1>
            <hr>
          </header>
        </div>

        <div>
          <div class=" row box-gadient box-blue">
            <div class="col-xs-6 col-sm-6 col-3 col-md-3"
              style="background:#6D0A16; -webkit-transition: background 1s; transition: background 1s; color: white; text-align: center;">
              <img src="https://www.upq.mx/media/careers/logo_white/LOGOSCARRERAS-05.png"
                style="max-height: 100px; margin:0 0 16px 0;">
              <h2 class="font-raleway" data-speed="3000" style="font-family: cursive;" id="counter1">
                770
              </h2>
              <p style="font-size: 1.3em; margin: 0;">Ingeniería Mecatrónica</p>
            </div>

            <div class="col-xs-12 col-sm-6 col-3 col-md-3"
              style="background:#37A6DE; -webkit-transition: background 1s; transition: background 1s; color: white; text-align: center;">
              <img src="https://www.upq.mx/media/careers/logo_white/LOGOSCARRERAS-02.png"
                style="max-height: 100px; margin: 0 0 16px 0;">
              <h2 class="font-raleway" data-speed="3000" style="font-family: cursive;" id="counter2">
                474
              </h2>
              <p style="font-size: 1.3em; ;">Ingeniería en Sistemas Computacionales</p>
            </div>

            <div class="col-xs-6 col-sm-6 col-3 col-md-3"
              style="background:#3e0b60; -webkit-transition: background 1s; transition: background 1s; color: white; text-align: center;">
              <img src="https://www.upq.mx/media/careers/logo_white/AUTOMOTRIZ.png"
                style="max-height: 100px; margin: 0 0 16px 0;">
              <h2 class="font-raleway" data-speed="3000" style="font-family: cursive;" id="counter3">
                659
              </h2>
              <p style="font-size: 1.3em;;">Ingeniería en Tecnología Automotriz</p>
            </div>

            <div class="col-xs-6 col-sm-6 col-3 col-md-3"
              style="background:#182353; -webkit-transition: background 1s; transition: background 1s; color: white; text-align: center;">
              <img src="https://www.upq.mx/media/careers/logo_white/LOGOSCARRERAS-041.png"
                style="max-height: 100px; margin: 0 0 16px 0">
              <h2 class="font-raleway" data-speed="3000" style="font-family: cursive;" id="counter4">
                587
              </h2>
              <p style="font-size: 1.3em;">Ingeniería en Tecnología de Manufactura</p>
            </div>

          </div>

          <div class=" row box-gadient box-blue">

            <div class="col-xs-6 col-sm-6 col-3 col-md-3"
              style="background:#8eae25; -webkit-transition: background 1s; transition: background 1s; color: white; text-align:center;">
              <img src="https://www.upq.mx/media/careers/logo_white/REDES-01white.png"
                style="max-height: 100px; margin:0 0 16px 0;">
              <h2 class="font-raleway" data-speed="3000" style="color: white; font-family: cursive; " id="counter5">
                208
              </h2>
              <p style="font-size: 1.3em;">Ingeniería en Redes y Telecomunicaciones</p>
            </div>

            <div class="col-xs-6 col-sm-6 col-3 col-md-3"
              style="background:#ce172d; -webkit-transition: background 1s; transition: background 1s; color: white; text-align: center;">
              <img src="https://www.upq.mx/media/careers/logo_white/LOGOSCARRERAS-06_1.png"
                style="max-height: 100px; margin:0 0 16px 0;">
              <h2 class="font-raleway" data-speed="3000" style="color: white; font-family: cursive;" id="counter6">
                541
              </h2>
              <p style="font-size: 1.3em;">Licenciatura en Administración y Gestión Empresarial</p>
            </div>

            <div class="col-xs-6 col-sm-6 col-3 col-md-3"
              style="background:#000000; -webkit-transition: background 1s; transition: background 1s; color: white; text-align: center;">
              <img src="https://www.upq.mx/media/careers/logo_white/LOGOSCARRERAS-07.png"
                style="max-height: 100px; margin:0 0 16px 0;">
              <h2 class="font-raleway" data-speed="3000" style="color: white; font-family: cursive;" id="counter7">
                985
              </h2>
              <p style="font-size: 1.3em;">Licenciatura en Negocios Internacionales</p>
            </div>

            <div class="col-xs-6 col-sm-6 col-3 col-md-3"
              style="background:#8C2437; -webkit-transition: background 1s; transition: background 1s; color: white; text-align: center;">
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
  </AppEstructure>
</template>

<style scoped>
.titulo{
  color: #414141;
}
.dark-mode .titulo {
  color: white;
}
.container {
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}

.dark-mode h1 {
  color: white;
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

.row {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  box-sizing: border-box;
  transform: scale(1.0);
  width: 100%;
}

/* Estilos para las carreras */
p {
  display: block;
  -webkit-margin-before: 0.1 em;
  -webkit-margin-after: 0.1em;
  -webkit-margin-start: 0px;
  -webkit-margin-end: 0px;
}

body {
  font-family: 'Open Sans', Arial, Helvetica, sans-serif;
  -webkit-font-smoothing: antialiased;
  font-size: 20px;
  line-height: 1.7;
}

h2 {
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

.modal-content {
  max-width: 700px;
  max-height: 700px;
  background: rgba(8, 22, 47, 0.9);
  border-radius: 10px;
  padding: 25px;
  text-align: justify;
  font-family: 'Open Sans', Arial, Helvetica, sans-serif;
  margin-top: 10%;
  margin-bottom: 10%
}

.modal-body {
  font-family: 'Open Sans', Arial, Helvetica, sans-serif;
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

#loader1 {
  border: 13px solid #08162fe6;
  border-top: 13px solid #08162fe6;
  border-right: 13px solid #f3f3f3;
  border-bottom: 13px solid #f3f3f3;
  transition: transform 1.9s ease;
}

#loader2 {
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

.circle-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
  gap: 20px;
  /* Espacio entre los elementos */
  padding: 0 20px;
  /* Añadir un poco de padding al contenedor para evitar que los círculos estén demasiado cerca del borde de la pantalla */
}

.circle-wrapper {
  flex: 1;
  max-width: 300px;
  /* Ancho máximo de cada círculo */
}

.background-image.circle {
  position: relative;
  width: 100%;
  /* Asegurarse de que cada círculo tenga un ancho responsivo */
  height: 0;
  padding-bottom: 100%;
  /* Mantener la relación de aspecto 1:1 */
  border-radius: 50%;
  overflow: hidden;
}

.circle-img {
  position: absolute;
  width: 100%;
  height: 100%;
  object-fit: cover;
  z-index: 1;
  /* Asegura que la imagen esté debajo del texto y del loader */
}

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

/* .modal-content {
  max-width: 700px;
  max-height: 700px;
  background: rgba(8, 22, 47, 0.9);
  border-radius: 10px;
  padding: 25px;
  text-align: justify;
  font-family: 'Open Sans', Arial, Helvetica, sans-serif;
}

.modal-body {
  font-family: 'Open Sans', Arial, Helvetica, sans-serif;
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
} */

.loader {
  width: 300px;
  height: 300px;
  border-radius: 50%;
  position: relative;
  overflow: hidden;
  transition: transform 1.9s ease;
  background-color: transparent;
  z-index: 2;
  /* Asegura que el loader esté sobre la imagen */
}

#loader1 {
  border: 13px solid #08162fe6;
  border-top: 13px solid #08162fe6;
  border-right: 13px solid #f3f3f3;
  border-bottom: 13px solid #f3f3f3;
  transition: transform 1.9s ease;
  z-index: 2;
  /* Asegura que el loader esté sobre la imagen */
}

#loader2 {
  border: 13px solid #8C2437;
  border-top: 13px solid #8C2437;
  border-right: 13px solid #f3f3f3;
  border-bottom: 13px solid #f3f3f3;
  transition: transform 1.9s ease;
  z-index: 2;
  /* Asegura que el loader esté sobre la imagen */
}

.text {
  width: 100%;
  height: 100%;
  background-color: rgba(140, 36, 55, 0.8);
  color: #fff;
  text-align: center;
  display: flex;
  align-items: center;
  justify-content: center;
  line-height: 2;
  position: absolute;
  top: 0;
  left: 0;
  background-attachment: fixed;
  pointer-events: none;
  transition: opacity 0.2s ease;
  font-size: 22px;
  font-weight: bold;
}

#text1 {
  background-color: rgba(8, 22, 47, 0.8);
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

.loader:hover .text {
  opacity: 0;
}

/* Elementos responsive */
@media (max-width: 768px) {
  .vertical-column {
    flex-direction: column;
    margin-right: 0;
    margin-bottom: 20px;
  }

  .circule {
    margin-top: 30px;
  }

  .box-gadient {
    display: flex;
    flex-direction: column;
    /* Alinea los cuadros verticalmente */
  }

  .col-xs-6,
  .col-sm-6,
  .col-3,
  .col-md-3 {
    width: 100%;
    /* Ancho completo para que los cuadros ocupen toda la pantalla */
    margin-bottom: 0px;
    /* Espacio inferior entre cuadros */
  }
}
</style>