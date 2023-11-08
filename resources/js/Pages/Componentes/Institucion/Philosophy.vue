<script>
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import 'swiper/css/pagination';
import 'swiper/css/navigation';
import AppEstructure from '@/Layouts/mainEstructure/AppEstructure.vue';
import { Autoplay, Pagination, Navigation } from 'swiper/modules';
import axios from 'axios'; // Asegúrese de que axios esté correctamente importado

export default {
  components: {
    AppEstructure,
    Swiper,
    SwiperSlide,
  },
  mounted() {
    this.cargarTexto();
    this.cargarImg();
    this.cargarValor().then(() => {
      this.$nextTick(this.inicializarInteracciones);
    });
    this.handleResize();
    window.addEventListener('resize', this.handleResize);
  },
  beforeDestroy() {
    window.removeEventListener('resize', this.handleResize);
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
    toggleAcordeon(index) {
      this.acordeones.forEach((acordeon, i) => {
        if (i !== index) {
          acordeon.open = false;
        }
      });
      this.acordeones[index].open = !this.acordeones[index].open;
    },
    cargarTexto() {
    axios.post('/filosofias/bannerData').then((response) => {
      this.texto = response.data;
      this.texto.forEach(modulo => {
        // Reemplaza los saltos de línea con <br>
        let contenidoFormateado = modulo.contenido.replace(/\n/g, '<br>');
        this.acordeones.push({
          title: modulo.titulo,
          content: contenidoFormateado, // Usa el contenido formateado aquí
          open: false,
        });
      });
    }).catch((error) => {
      console.log(error);
    });
  },
    cargarImg() {
      axios.post('/filosofiaImg/bannerData').then((response) => {
        this.img = response.data;
      }).catch((error) => {
        console.log(error);
      });
    },
    cargarValor() {
      return axios.post('/filosofiaVal/bannerData').then((response) => {
        this.valor = response.data;
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

      const acordeones = document.querySelectorAll('.acordion-item');
      acordeones.forEach(acordeon => {
        acordeon.addEventListener('click', () => {
          acordeones.forEach(element => {
            element.classList.remove('active');
          });
          acordeon.classList.toggle('active');
        });
      });
    },
      handleResize() {
      this.shouldShowCarousel = window.innerWidth > 425;
    },
  },
  setup() {
    return {
      modules: [Autoplay, Pagination, Navigation],
    };
  },
  data() {
    return {
      shouldShowCarousel: false,
      windowWidth: window.innerWidth,
      valor: [],
      img: [],
      texto: [],
      modalTitle: '',
      modalContent: '',
      showModal: false,
      acordeones: [],
    };
  },
};
</script>

<template>
  <AppEstructure :controllerName="'/filosofiaImgPrinc/bannerData'">

    <div class="p-20">
      <div class="flex">
        <div class="w-1/3" v-if="shouldShowCarousel">
          <div class="img_1 mt-5" >
            <swiper :spaceBetween="30" :centeredSlides="true" :autoplay="{
              delay: 2500,
              disableOnInteraction: false,
            }" :pagination="{
  clickable: true,
}" :navigation="true" :modules="modules" class="mySwiper">
              <swiper-slide v-for="datosimg in img"><img :src="'/storage/' + datosimg.imagen"
                  alt="Card Image" /></swiper-slide>
            </swiper>
          </div>
        </div>

        <div class="p-1 w-2/3 ml-10 vertical-column">
          <div class="toggle-acordion">
            <div class="acordion" v-for="(item, index) in acordeones" :key="index">
              <input type="checkbox" :id="'btn-acordion' + index" class="btn-acordion">
              <label :for="'btn-acordion' + index" @click="toggleAcordeon(index)">
                {{ item.title }}
                <div class="toggle-arrow"></div>
              </label>
              <div class="acordion-content" :class="{ 'active': item.open }">
                <!-- Verifica si este es el acordeón deseado para mostrar como lista -->
                <template v-if="index === listAccordionIndex">
                  <ul>
                    <li v-for="(point, pointIndex) in item.points" :key="pointIndex">{{ point }}</li>
                  </ul>
                </template>
                <!-- Si no, muestra el contenido sin formato de los otros acordeones -->
                <template v-else>
                  <p v-html="item.content"></p>
                </template>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- Valores (modal) -->
    <section>
      <br> <br>
      <div class="container text-center">
        <header>
          <h1 style="color: #414141;">Valores</h1>
          <hr>
        </header>
      </div>

      <div class="circle-container">
        <div v-for="item in valor" :key="item.id" class="circle-wrapper">
          <div class="background-image circle" data-index="0" @click="openModal(item.nombre, item.link)">
            <img :src="'/storage/' + item.imagen" alt="Valor Image" class="circle-img" />
            <div class="loader" id="loader2">
              <div class="text" id="text2">{{ item.nombre }}</div>
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
      <hr>
      <br><br><br><br>
    </section>
  </AppEstructure>
</template>
   

<style scoped>
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

/* Círculos de valores */
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
  width: 300px;
  height: 300px;
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

/* Caja del acordeon */
.toggle-acordion {
  width: 100%;
  max-width: 800px;
  margin: auto;
  margin-top: 15px;
  justify-content: center;
}

.toggle-acordion h2 {
  text-align: center;
  font-size: 40px;
  margin-bottom: 35px;
}

.acordion {
  border: 1px solid #ccc;
  margin-bottom: 10px;
  padding: 10px;

}

.acordion input[type="checkbox"] {
  display: none;
}

.acordion label {
  display: block;
  padding: 20px;
  font-size: 20px;
  color: black;
  cursor: pointer;
  margin-bottom: 2px;
  transition: all 300ms ease;
  align-items: center;
  justify-content: space-between;
}

.acordion label:hover {
  background: rgba(182, 171, 171, 0.959);
}

.acordion .acordion-content {
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.3s ease-in-out;
  margin: 0px 30px;
  max-height: 0px;
  overflow: hidden;
  transition: all 300ms ease;
  font-size: 17px;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  margin-top: 2px;
  text-align: justify;
}

.acordion input[type="checkbox"]:checked+label+.acordion-content {
  max-height: 1000px;
}

.btn-acordion {
  display: none;
  border: 2px solid #ccc;
  border-top: none;
}

.btn-acordion:checked~label .toggle-arrow {
  transform: rotate(-135deg);
}

.acordion label .toggle-arrow {
  width: 10px;
  height: 10px;
  border: solid #5e5b5b;
  border-width: 0 2px 2px 0;
  margin-left: auto;
  transform: rotate(45deg);
  transition: transform 0.3s ease;
}

.mySwiper img {
  max-width: 100%;
  /* Ajusta el ancho máximo de las imágenes */
  height: auto;
  /* Permite que la altura se ajuste automáticamente */
}

.doble {
  display: flex;
}

@media (max-width: 425px) {
  .circule {
    margin-top: 30px;
  }

  .vertical-column {
    margin-right: 0;
    margin-bottom: 20px;
    display: initial;
    align-items: center; 
    justify-content:center,
  }

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
}

@media (max-width: 768px) and (min-width: 426px) {

  /*  Estilo para dividir los círculos en dos grupos  */
  .vertical-column {
    flex-direction: row;
    justify-content: space-between;
  }

  .circle-container {
    display: flex;
    flex-wrap: wrap;
    /* Permite que los elementos se envuelvan en dos filas */
    justify-content: space-between;

    gap: 20px;
    /* Espacio entre los elementos */

  }

  .circle {
    flex-direction: row;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
    margin-right: 0;
  }
}


/* display:initial */</style>



