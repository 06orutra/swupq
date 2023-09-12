<script>
//ESTE TEST OCUPA OBJETOS, EL OFICIAL NO, PERO EN CASO DE REQUERIR
//USAR OBJETOS, SE PUEDE OCUPAR COMO AQUÍ
import { ref } from "vue";
// Importar componentes de Swiper Vue.js
import { Swiper, SwiperSlide } from 'swiper/vue';

// Importar estilos de Swiper
import 'swiper/css';
import 'swiper/css/effect-coverflow';
import 'swiper/css/pagination';

  // importar módulos de Swiper utilizados
import { Autoplay, EffectCoverflow, Pagination } from 'swiper/modules';

export default {
    components: {
      Swiper,
      SwiperSlide,
    },
    setup() {
        const carreras = ref([
            {
                label: 'Ingeniería en Redes y Telecomunicaciones',
                icon: 'storage/img/carriers/IRT.png',
                link: 'https://www.upq.mx/oferta-academica/ingenieria-en-redes-y-telecomunicaciones/'
            },
            {
                label: 'Ingeniería en Tecnologías de Manufactura',
                icon: 'storage/img/carriers/ITM.png',
                link: 'https://www.upq.mx/oferta-academica/ingenieria-en-tecnologias-de-manufactura/'
            },
            {
                label: 'Ingeniería Mecatrónica',
                icon: 'storage/img/carriers/IM.png',
                link: 'https://www.upq.mx/oferta-academica/ingenieria-mecatronica/'
            },
            {
                label: 'Ingeniería en Tecnología Automotriz',
                icon: 'storage/img/carriers/ITA.png',
                link: 'https://www.upq.mx/oferta-academica/ingenieria-en-tecnologia-automotriz/'
            },
            {
                label: 'Ingeniería en Sistemas Computacionales',
                icon: 'storage/img/carriers/ISC.png',
                link: 'https://www.upq.mx/oferta-academica/ingenieria-en-sistemas-computacionales/'
            },
            {
                label: 'Licenciatura en Negocios Internacionales',
                icon: 'storage/img/carriers/LNI.png',
                link: 'https://www.upq.mx/oferta-academica/licenciatura-en-negocios-internacionales/'
            },
            {
                label: 'Licenciatura en Administración y Gestión Empresarial',
                icon: 'storage/img/carriers/LAGE.png',
                link: 'https://www.upq.mx/oferta-academica/licenciatura-en-administracion-y-gestion-empresari/'
            },
            
        ]);
      return {
        modules: [Autoplay, EffectCoverflow, Pagination],
        carreras
      };
    },
  };


</script>


<template>
  <swiper 
  :effect="'coverflow'" 
  :grabCursor="true" 
  :centeredSlides="true" 
  :slidesPerView="5"
  :slidesOffsetAfter="3"
  :slidesOffsetBefore="3"
  :coverflowEffect="{
    rotate: 50,
    stretch: 10,
    depth: 100,
    modifier: 1,
    scale:1,
    slideShadows: true }" 
  :pagination="false"
  :autoplay="{ delay: 2500, disableOnInteraction: false }" 
  :modules="modules" 
  class="mySwiper z-0">

    <swiper-slide v-for="(carrera, index) in carreras" :key="index">
      <a :href="carrera.link" target="_blank">
        <img :alt="carrera.label" :src="carrera.icon" style="width:100%; height: 90%"/>
      </a>
    </swiper-slide>
  </swiper>

</template>

<style scoped>
.swiper {
  width: 60%;
  height: 30%;
  padding-top: 50px;
  padding-bottom: 50px;
}

.swiper-slide {
  background-position: center;
  background-size: cover;
  width: 300px;
  height: 300px;
}


</style>