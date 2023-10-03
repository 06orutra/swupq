<script>

import { ref, computed } from "vue";
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
        const breakpoints = { //Desde el JS se manipulan estilos
          2560: {
            slidesPerView: 4, //Controla el número de slides que se muestran
            loopedSlides: 3, //Estos extremos se mostrarán para no cortar de golpe
            width: '90%',
            spaceBetween: 150,
          },
          1920: {
            slidesPerView: 4,
            loopedSlides: 3,
            width: '90%',
            spaceBetween: 150,
          },
          1440: {
            slidesPerView: 4,
            loopedSlides: 3,
            width: '90%',
            spaceBetween: 125,
          },
          1024: {
            slidesPerView: 4,
            loopedSlides: 3,
            width: '90%',
            spaceBetween: 100,
          },
          768: {
            slidesPerView: 3,
            loopedSlides: 2,
            width: '90%',
            spaceBetween: 100,
          },
          425: {
            slidesPerView: 2,
            loopedSlides: 1,
            width: '100%',
            spaceBetween: 50,
          },
          375: {
            slidesPerView: 2,
            loopedSlides: 1,
            width: '100%',
            spaceBetween: 50,
          },
          320: {
            slidesPerView: 2,
            loopedSlides: 1,
            width: '100%',
            spaceBetween: 50,
          },

        };
        const windowWidth = ref(window.innerWidth); //Mide el ancho de la ventana
        window.addEventListener('resize', () => {
          windowWidth.value = window.innerWidth;
        });
        

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
        // Acá se encuentra el breakpoint más cercano para tomar en cuenta
        const closestBreakpoint = (width) => {
          const keys = Object.keys(breakpoints).map(Number);
          const closest = keys.reduce((prev, curr) => {
            return Math.abs(curr - width) < Math.abs(prev - width) ? curr : prev;
            });
            return breakpoints[closest];
          };

        const swiperOptions = computed (() => {
          return breakpoints[windowWidth.value] || closestBreakpoint(windowWidth.value) || {
            slidesPerView: 4,
            loopedSlides: 3,
            width: '100%',
            spaceBetween: 150,
          }; //Esto devuelve el valor del objeto breakpoints
        });
      return {
        modules: [Autoplay, EffectCoverflow, Pagination],
        carreras, swiperOptions
      };
    },
  };


</script>

<!-- Loop repite, loopedslides elije los extremos a seguir mostrando para evitar
el efecto feo de corte -->
<template>
  <swiper 
    :slidesPerView="swiperOptions.slidesPerView"
    :effect="'coverflow'"
    :grabCursor="true"
    :loop="true"
    :spaceBetween="swiperOptions.spaceBetween"
    :loopedSlides="swiperOptions.loopedSlides"
    :centeredSlides="true" 
    :pagination="false"
    :navigation="false"
    :modules="modules"
    :autoplay="{ delay: 2500, disableOnInteraction: false }" 
    :coverflowEffect="{
      rotate: 20,
      stretch: 10,
      depth: 100,
      modifier: 1,
      scale:1,
      slideShadows: true }" 
    :style="{      
      width: swiperOptions.width
    }"
    >

    <swiper-slide v-for="(carrera, index) in carreras" :key="index">
      <a :href="carrera.link" target="_blank">
        <img :alt="carrera.label" :src="carrera.icon" style="width: 100%; height: 100%"/>
      </a>
    </swiper-slide>
  </swiper>

</template>

<style scoped>
.swiper {
  padding-top: 10px;
  padding-bottom: 10px;
}

.swiper-slide {
  background-position: center;
  background-size: cover;
  height: 220px;
}


</style>