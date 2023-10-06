<template>
  <div class="contenedor">
    <div class="superior">
      <img src="/storage/img/icon_logo_UPQ.png" class="logo-img" alt="Logo" />
    </div>
    <div class="inferior">
      <menuvue/>

      <polovue/>
    </div>
  </div>
</template>

<script>
import polovue from "@/Layouts/mainEstructure/navBar/Polo.vue";
import menuvue from "@/Layouts/mainEstructure/navBar/menu.vue";

export default {
  name: "App",
  components: {
    menuvue,
    polovue,
  },
};
</script>


<style>
/* Contenedor principal */
.contenedor {
  display: flex;
  flex-direction: column;
  height: 100px;
  position: fixed;
  z-index: 999;
  top: 120px;
  left: 10px;
}

/* Parte superior (60%) */
.superior {
  flex: 0.6;
  padding: 10px;
  position: relative;
  
  /* Estilos para centrar verticalmente */
  display: flex;
  align-items: center;
  justify-content: center;
}

/* Parte inferior (40%) */
.inferior {
  flex: 0.4;
  display: flex;
  flex-direction: row;
  border: 1px solid black;
  position:absolute;
}

.logo-img {
  width: 120px;
  height: 100px;
  margin-right: -80%;
  margin-top: -30%;
}

@media (max-width: 521px){
  .contenedor{
    display: flex;
    flex-direction: column;
    height: 100px;
    position: fixed;
    z-index: 999;
    top: 30px;
    left: 10px;
  }
}
@media (min-width: 1280px){
  .contenedor{
    display: flex;
    flex-direction: column;
    height: 100px;
    position: fixed;
    z-index: 999;
    top: 95px;
    left: 10px;
  }
}

@media (max-width: 521px){
  .superior{
    display:none;
  }
}

@media (min-width: 380px) and (max-width: 521px) {
  .contenedor{
    display: flex;
    flex-direction: column;
    height: 100px;
    position: fixed;
    z-index: 999;
    top: 25px;
    left: 85px;
  }
}

@media (min-width: 320px) and (max-width: 379px) {
  .contenedor{
    display: flex;
    flex-direction: column;
    height: 100px;
    position: fixed;
    z-index: 999;
    top: 25px;
    left: 40px;
  }
}

</style>