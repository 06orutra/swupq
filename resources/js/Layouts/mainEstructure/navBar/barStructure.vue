<template>
  <div class="contenedor-iconos">
    <div class="image-container">
      <img
        src='/storage/img/icon_logo_UPQ.png'
        class="logo-img"
      />
    </div>
    <div class="icon__menu">
      <menuvue/>
    </div>
    <div class="icon__chatbot">
      <polovue/>
    </div>

  </div>

</template>

<script>
import menuvue from '@/Layouts/mainEstructure/navBar/menu.vue';
import polovue from '@/Layouts/mainEstructure/navBar/Polo.vue';

export default {
  components: {
    menuvue,
    polovue
  },
};
</script>
<style>
.logo-img {
  width: 135px;
  height: 135px;
  margin-left: 2.25%;
  position:fixed;
  z-index: 999;

}
.icon__chatbot {
  z-index:999;
  position:fixed;

}
.contenedor-iconos {
  z-index:999;
}
</style>

