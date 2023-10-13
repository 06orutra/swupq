<template>
  <div class="contenedor">
    <div class="superior">
      <img src="/storage/img/icon_logo_UPQ.svg" class="logo-img" alt="Logo" />
    </div>
    <div class="inferior">
      <menuvue/>

      <polovue/>
    </div>
  </div>
</template>

<script>
import menuvue from "@/Layouts/mainEstructure/navBar/menu.vue";
import polovue from "@/Layouts/mainEstructure/navBar/Polo.vue";

export default {
  name: "App",
  components: {
    menuvue,
    polovue,
  },
};
</script>


<style>
/* Estilos generales */
body, html {
  margin: 0;
  padding: 0;
  height: 100%;
}

/* Contenedor principal */
.contenedor {
  display: flex;
  flex-direction: column;
  height: 200px;
  width: 200px;
  margin-top: 4%;
  position: fixed;
  z-index: 999;
}

/* Parte superior (60%) */
.superior {
  flex: 0.6;
  padding: 10px;
  position: relative;
  margin: -3%;
  
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
  margin-right: 10%;
  margin-top: -30%;
}



@media (max-width: 521px){
  .superior{
    display:none;
  }

}

</style>