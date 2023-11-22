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
  margin-right: -35%;
  margin-top: -30%;
}

@media (min-width: 1023px) and (max-width:1201px) {
  .contenedor{
    display: flex;
    flex-direction: column;
    height: 100px;
    position: fixed;
    z-index: 999;
    top: 125px;
    left: 10px;
  }
  .logo-img {
    width: 120px;
    height: 100px;
    margin-right: -35%;
    margin-top: -30%;
  }
}

@media (min-width: 1202px) and (max-width: 1441px) {
  .contenedor{
    display: flex;
    flex-direction: column;
    position: fixed;
    z-index: 999;
    top: 100px;
    left: 10px;
  }
  .logo-img {
    width: 130px;
    height: 130px;
    margin-right: -40%;
    margin-top: -30%;
  }
}

@media (min-width: 1442px) and (max-width: 1920px) {
  .contenedor{
    display: flex;
    flex-direction: column;
    position: fixed;
    z-index: 999;
    top: 105px;
    left: 10px;
  }
  .logo-img {
    width: 130px;
    height: 130px;
    margin-right: -40%;
    margin-top: -30%;
  }
}

@media (min-width: 1921px) and (max-width: 2560px) {
  .contenedor{
    display: flex;
    flex-direction: column;
    position: fixed;
    z-index: 999;
    top: 105px;
    left: 10px;
  }
  .logo-img {
    width: 200px;
    height: 200px;
    margin-right: -20%;
    margin-top: -30%;
  }
}

@media (max-width: 521px){
  .superior{
    display:none;
  }
}

@media (min-width: 415px) and (max-width: 521px) {
  .contenedor{
    display: flex;
    flex-direction: column;
    height: 100px;
    position: fixed;
    z-index: 999;
    top: 25px;
    left: 120px;
  }
}

@media (min-width: 522px) and (max-width: 769px) {
  .contenedor{
    display: flex;
    flex-direction: column;
    height: 100px;
    position: fixed;
    z-index: 999;
    top: 130px;
    left: -10px;
  }
}

@media (min-width: 370px) and (max-width: 410px) {
  .contenedor{
    display: flex;
    flex-direction: column;
    height: 100px;
    position: fixed;
    z-index: 999;
    top: 30px;
    left: 75px;
  }
}

@media (min-width: 320px) and (max-width: 360px) {
  .contenedor{
    display: flex;
    flex-direction: column;
    height: 100px;
    position: fixed;
    z-index: 999;
    top: 30px;
    left: 20px;
  }
}

</style>