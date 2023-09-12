<template>
  <!-- Loop repite, pero loopedSlides permite que no truene -->
  <swiper
    :slidesPerView="4"
    :effect="'coverflow'"
    :grabCursor="true"
    :loop="true"
    :loopedSlides="3"
    :centeredSlides="true" 
    :pagination="false"
    :navigation="false"
    :modules="modules"
    :autoplay="{ delay: 2500, disableOnInteraction: false }" 
    :coverflowEffect="{
      rotate: 50,
      stretch: 10,
      depth: 100,
      modifier: 1,
      scale:1,
      slideShadows: true }" 
    class="mySwiper"
  >
    <swiper-slide>
      <a href="https://www.upq.mx/oferta-academica/ingenieria-en-redes-y-telecomunicaciones/" target="_blank">
        <img src="storage/img/carriers/IRT.png" alt="Ingeniería en Redes y Telecomunicaciones" style="width:100%; height: 90%"/>
      </a>
    </swiper-slide>
    <swiper-slide><a href="https://www.upq.mx/oferta-academica/ingenieria-en-tecnologias-de-manufactura/" target="_blank">
        <img src="storage/img/carriers/ITM.png" alt="Ingeniería en Tecnologías de Manufactura" style="width:100%; height: 90%"/>
      </a>
    </swiper-slide>
    <swiper-slide>
      <a href="https://www.upq.mx/oferta-academica/ingenieria-mecatronica/" target="_blank">
        <img src="storage/img/carriers/IM.png" alt="Ingeniería Mecatrónica" style="width:100%; height: 90%"/>
      </a>
    </swiper-slide>
    <swiper-slide>
      <a href="https://www.upq.mx/oferta-academica/ingenieria-en-tecnologia-automotriz/" target="_blank">
        <img src="storage/img/carriers/ITA.png" alt="Ingeniería en Tecnología Automotriz" style="width:100%; height: 90%"/>
      </a>
    </swiper-slide>
    <swiper-slide>
      <a href="https://www.upq.mx/oferta-academica/ingenieria-en-sistemas-computacionales/" target="_blank">
        <img src="storage/img/carriers/ISC.png" alt="Ingeniería en Sistemas Computacionales" style="width:100%; height: 90%"/>
      </a>
    </swiper-slide>
    <swiper-slide>
      <a href="https://www.upq.mx/oferta-academica/licenciatura-en-negocios-internacionales/" target="_blank">
        <img src="storage/img/carriers/LNI.png" alt="Licenciatura en Negocios Internacionales" style="width:100%; height: 90%"/>
      </a>
    </swiper-slide>
    <swiper-slide>
      <a href="https://www.upq.mx/oferta-academica/licenciatura-en-administracion-y-gestion-empresari/" target="_blank">
        <img src="storage/img/carriers/LAGE.png" alt="Licenciatura en Administración y Gestión Empresarial" style="width:100%; height: 90%"/>
      </a>
    </swiper-slide>

  </swiper>
    
</template>
<script>
  // Import Swiper Vue.js components
  import { Swiper, SwiperSlide } from 'swiper/vue';

  // Import Swiper styles
  import 'swiper/css';
  import 'swiper/css/pagination';
  import 'swiper/css/navigation';

  import 'swiper/css/effect-coverflow';

  // import required modules
  import { Pagination, Navigation, Autoplay, EffectCoverflow } from 'swiper/modules';

  export default {
    components: {
      Swiper,
      SwiperSlide,
    },
    setup() {
      return {
        modules: [Pagination, Navigation, Autoplay, EffectCoverflow],
      };
    },
  };
</script>

<style scoped>

body {
  position: relative;
  height: 100%;
}

body {
  background: #eee;
  font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
  font-size: 14px;
  color: #000;
  margin: 0;
  padding: 0;
}


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