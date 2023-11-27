<script>
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import 'swiper/css/pagination';
import 'swiper/css/navigation';
import { Autoplay, Pagination, Navigation } from 'swiper/modules';
import AppEstructure from '@/Layouts/mainEstructure/AppEstructure.vue';
import bolitas_pdf from './bolitas_pdf.vue';

export default {
  components: {
    Swiper,
    SwiperSlide,
    AppEstructure,
    bolitas_pdf,
  },
  data() {
    return {
      pdf: [],
      img: [],
      texto: [],
      objetivoCLEItems: [],
      showMapModal: {
        modal1: false,
        modal2: false,
        modal3: false,
      },
      thirdDocumentUrl: 'https://www.upq.mx/assets/language/caal_lengua_extranjera-actualizado.pdf', // URL del tercer documento
      texto: 'Somos',
      texto2: 'Multiculturales',
      info: 'En la Universidad Politécnica de Querétaro contamos con el apoyo de nativo hablantes de lengua inglesa, gracias a la vinculación establecida con estos programa internacionales.',
      isSmallScreen: window.innerWidth <=425,
      
    };
  },
  created() {
    window.addEventListener('resize', this.handleResize);
  },
  beforeDestroy() {
    window.removeEventListener('resize', this.handleResize);
  },

  computed: {
    windowWidth() {
      return window.innerWidth;
    },
    firstDownloadLink() {
      return 'https://www.upq.mx/assets/language/niveles_ingles.svg';
    },
    secondDownloadLink() {
      return 'https://www.upq.mx/assets/language/servicios_ingles.svg';
    },
    thirdDownloadLink() {
      return 'https://www.upq.mx/assets/language/caal_lengua_extranjera-actualizado.pdf';
    },

    // Estilos de párrafo para responsive del texto (heading)
    headingStyles() {
      return window.innerWidth < 425 ? { fontSize: "18px" } : {};
    },
    paragraphStyles() {
      return window.innerWidth < 425 ? { fontSize: "14px" } : {};
    },

    window() {
      return this;
    },
  },
  mounted() {
    this.cargarImg();
    this.cargarTexto();
    /* this.cargarPdf();
    const loaders = document.querySelectorAll('.loader');

    loaders.forEach((loader, index) => {
      loader.addEventListener('mouseenter', () => {
        if (loader) {
          loader.classList.add('active');
          const text = loader.querySelector('.text');
          if (text) {
            text.style.opacity = '0';
            this.showModalContent(loader);
          }
        }
      });

      loader.addEventListener('mouseleave', () => {
        if (loader) {
          loader.classList.remove('active');
          const text = loader.querySelector('.text');
          if (text) {
            text.style.opacity = '1';
          }
        }
      });
    }); */
  },
  methods: {
    cargarTexto() {
      axios.post('/lenguaExtraObjetivo/bannerData')
        .then((response) => {
          this.objetivoCLEItems = response.data.map((item, index) => {
            return {
              id: index + 1,
              title: item.titulo,
              text: item.contenido,
            };
          });
        })
        .catch((error) => {
          console.log(error);
        });
    },

    cargarImg() {
      axios.post('/lenguaExtraImgSecundario/bannerData').then((response) => {
        this.img = response.data;
      }).catch((error) => {
        console.log(error);
      });
    },
    cargarPdf() {
      axios.post('/pdfPrueba/bannerData').then((response) => {
        this.pdf = response.data;
      }).catch((error) => {
        console.log(error);
      });
    },
    openInNewTab(url) {
      window.open(url, '_blank');
    },
    openMapModal(modalId) {
      this.showMapModal[modalId] = true;
    },
    closeMapModal(modalId) {
      this.showMapModal[modalId] = false;
    },
    setup() {
      Swiper.use([Autoplay, Pagination, Navigation]); // Configura los módulos

      return {
      };
    },
    handleResize() {
      if (window.innerWidth <= 425) {
        this.showCarousel = false;
      } else {
        this.showCarousel = true;
      }
    },

  }
};
</script>


 
<template>
  
  <AppEstructure :controllerName="'/lenguaExtraImgPrincipal/bannerData'">
    <!-- Carrusel e información -->
    <section>

      <div class="p-20 ">
        <div class="flex">
          <div class="w-1/3 hide-carousel" v-bind:class="{'hide-carousel': isSmallScreen}" >
            <div class="img_1  img-container mt-5">
              <swiper :spaceBetween="30" :centeredSlides="true" :autoplay="{
                delay: 2500,
                disableOnInteraction: false,
              }" :pagination="{
  clickable: true,
}" :navigation="false" class="mySwiper">
                <swiper-slide v-for="datosimg in img"><img :src="'/storage/' + datosimg.imagen"
                    alt= "Card Image" /></swiper-slide>
              </swiper>
            </div>
          </div> 


          <div class="p-1 w-2/3 ml-10 acordeon">
            <div class="toggle-acordion">
              <div class="heading-title heading-border-bottom">
                <h3>
                  🕮 Objetivo CLE
                </h3>
              </div>
              <ul class="list-group box">
            <li class="list-group-item" v-for="item in objetivoCLEItems">
              <p>{{ item.title }} 
                    <p>{{ item.text }}</p>
                  </p>
            </li>
          </ul>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- Modal -->
    <section>
      <div class="container">
        <header class="text-center margin-bottom-60">
          <h2>Oportunidades</h2>
          <p>Conoce las Oportunidades que tenemos para ti</p>
          <hr>
        </header>
      </div>
      <bolitas_pdf :loadDataUrl="'/pdfPrueba/bannerData'"/>


      <!-- Modal como un pop-up -->
      <div v-if="showMapModal.modal1" class="popup-modal">
        <div class="popup-content">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" style="color: #fff; text-align: left; font-size: 25px;">Niveles de inglés</h4>
            </div>
            <div class="modal-body" style="max-height: 400px; overflow-y: auto;">
              <img src="https://www.upq.mx/assets/language/niveles_ingles.svg" alt="" style="max-width: 100%;"
                class="img-fluid">
            </div>
            <div class="modal-footer" style="text-align:right">
              <button type="button" class="btn btn-default" @click="closeMapModal('modal1')">Cerrar</button>
              <a class="btn btn-primary" :href="firstDownloadLink" download="niveles_ingles.png">Descargar</a>
            </div>
          </div>
        </div>
      </div>

      <br><br><br>
    </section>
    <hr>
    <!-- imagenes -->
    <section>
      <br><br><br>
      <div class="container">
        <div class="row">
          <div class="col-4">
            <img src="https://www.upq.mx/assets/logos/logo_british.svg" alt="" style="max-height: 80px">
          </div>
          <div class="col-4">
            <img src="https://www.upq.mx/assets/logos/logos_lengua_peacecorps.svg" alt="" style="max-height: 80px">
          </div>
          <div class="col-4">
            <img src="https://www.upq.mx/assets/logos/logos_fullbrith.svg" alt="" style="max-height: 80px">
          </div>
        </div>
      </div>
    </section>
    <br><br><br><br><br><br><br><br>

    <!-- heading -->
    <section class="heading-title heading-arrow-bottom">
      <div class="container">
        <div class="text-center">
          <h3 :style="headingStyles">{{ texto }} <span>{{ texto2 }}</span></h3>
          <p :style="paragraphStyles">{{ info }}</p>
        </div>
        <div class="text-center">
        </div>
      </div>
    </section>
    <br><br><br><br>
  </AppEstructure>
</template>

<style scoped>
#text1 {
  background-color: rgba(8, 22, 47, 0.8);
}
/* carrusel y texto (section 1)*/
.acordeon{
  max-width: 70%;
}
.mySwiper {
  max-height: 400px;
  max-width: 100%;
  margin-bottom: 20px;
  text-align: center;
}

.mySwiper img {
  max-width: 100%;
  height: auto;
}

.img-container {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.img_1 {
  max-width: 100%;
  height: auto;
  margin: 0 auto;
  z-index: 1;
}

.list-group {
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  flex-direction: column;
  padding-left: 0;
  margin-bottom: 0;
}

.list-group-item {
  position: relative;
  display: flex;
  padding: 0.75rem 1.25rem;
  margin-bottom: -1px;
  border: 1px solid rgba(0, 0, 0, .125);
  box-sizing: border-box;
}

ul.list-group {
  list-style: none;
}

.list-group {
  flex-grow: 1;
  margin-bottom: 0;
}

.box {
  font-family: 'Open Sans', Arial, Arial, Helvetica, sans-serif;

  font-size: 17px;
  line-height: 1.3;
  font-weight: 400;
  text-align: left;
  width: 100%
}

div.heading-title.heading-border-bottom {
  border-bottom: #ccc 2px solid;
}

div.heading-title {
  position: relative;
  margin-bottom: 40px;
  font-size: 24px;
  letter-spacing: normal;
  font-family: 'Open Sans', Arial, Helvetica, sans-serif;
  font-weight: 600;
  color: #414141;
  line-height: 1.5;
  z-index: 0;
  -webkit-font-smoothing: antialiased;
}

div.heading-title h3 {
  padding: 0;
  position: relative;
  display: flex;
  padding-left: 0;
  padding-right: 15px;
}
/* Contenido dentro del modal */
.popup-modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.7);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 9999;
  border: 0;

}

.popup-content {
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  flex-direction: column;
  background: #fff;
  padding: 20px;
  border-radius: 5px;
  text-align: center;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
  width: 100%;
  overflow: auto;
  max-width: 1000px;
}

.close-popup {
  position: absolute;
  top: 10px;
  right: 10px;
  font-size: 20px;
  cursor: pointer;
}

.modal-header {
  background: #8C2437;
  display: block;
  -webkit-box-align: start;
  -webkit-box-pack: justify;
  padding: 1rem;
  border-bottom: 1px solid #e9ecef;
  border-top-left-radius: 0.3rem;
  border-top-right-radius: 0.3rem;
  box-sizing: border-box;
}

.modal-body {
  position: relative;
  -webkit-box-flex: 1;
  flex: 1 1 auto;
  padding: 1rem;
}

.btn-default {
  font-size: 17px;
  line-height: 1.6;
  color: #333;
  background-color: #fff;
  border-color: #ccc;
  border-width: 1px;
  padding: 6px 12px;
  border-radius: 7px;
  text-align: left;
}

.btn-primary {
  font-size: 17px;
  line-height: 1.6;
  color: #fff;
  background-color: #8C2437;
  border-color: #8C2437;
  border-width: 1px;
  padding: 6px 12px;
  border-radius: 7px;
  margin-top: 10px;
  margin-left: 20px;
  text-align: left;
}

img.img-fluid {
  display: inline-block;
}

.img-fluid {
  max-width: 100%;
  height: 900px;
}

h5 {
  font-size: 18px;
  letter-spacing: normal;
  margin: 0 0 20px 0;
}

h6 {
  font-size: 13px;
  letter-spacing: normal;
  margin: 0 0 20px 0;
}

h5,
h6 {
  font-family: 'Open Sans', Arial, Helvetica, sans-serif;
  font-weight: 600;
  color: #414141;
  position: relative;
  line-height: 1.5;
  z-index: 0;
}

/* Imagenes (sección 3)*/
.container {
  position: relative;
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}

.row {
  display: flex;
  flex-wrap: wrap;
  margin-right: -15px;
  margin-left: -15px;
  text-align: center;
}

/* texto (sección 4) */
.heading-title.heading-arrow-top,
.heading-title.heading-arrow-bottom {
  color: #fff;
  background-color: #252525;
  display: block;
  position: relative;
  padding: 100px 0;
  border-bottom: rgba(0, 0, 0, 0.1) 1px solid;
}

.heading-title.heading-arrow-bottom h3 {
  font-size: 45px;
  color: #fff;
  margin: 0;
}

span {
  color: #8C2437;
}

.text-center {
  text-align: center !important;
}

p {
  display: block;
  -webkit-margin-before: 0.1em;
  -webkit-margin-after: 0.1em;
  -webkit-margin-start: 0px;
  -webkit-margin-end: 0px;
  font-size: 18px;
}

@media (max-width: 425px) {
  .img_1 {
    max-width: 100%;
    /* Ajustar el tamaño máximo de la imagen al 100% del contenedor */
    height: auto;
    /* Permite que la altura se ajuste automáticamente según el ancho */
    margin: 0 auto;
    /* Centrar horizontalmente la imagen */
    z-index: 1;
  }
  .toggle-acordion {
    position: relative;
    z-index: 0;
  }
  .hide-carousel {
    display: none;
  }
  .acordeon{
    max-width: 80%;
  }
  list-group-item {
    font-size: 16px; /* Ajusta el tamaño de fuente para pantallas pequeñas */
  }
}

@media (max-width: 768px) and (min-width: 426px) {
  .container {
    max-width: 720px;
  }

  .vertical-column {
    flex-direction: column;
    margin-bottom: 30px;
    justify-content: space-between;
  }
}
</style>