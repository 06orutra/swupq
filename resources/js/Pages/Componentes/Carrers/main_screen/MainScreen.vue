<template>
    <!-- Contenido del componente -->
    <section class="conatiner-main-screen">
        
        <div class="container-main-image">
            <img :src="url_img_carrer" alt="Nuestras carreras Universitarias" class="main-image" draggable="false"/>
        </div>
        
        <!--Contenido de los iconos con detalle-->
        <div class="square-container">
            <div class="square " v-for="(info,index) in iconos_info" :key="index">
                <div class="aspect-ratio" 
                :style="{background: index % 2 == 0 ? '#'+lista_colores_carrera.colorPrimario :'#'+lista_colores_carrera.colorSecundario}"></div>
                <div class="content">
                    <img :src="info.url_direccion_imagen" alt="Descripción" class="content-image">
                    {{info.descripcion}}
                </div>
            </div>   
        </div>
        
    </section>
  
  </template>
  
  <script>
  import { defineComponent } from 'vue';
  
  //import DescriptionCarrer from '@/components/main_screen/DescripcionCarrera.js'
  
  export default defineComponent({
    name: 'MainScreen',
    components: {

    },
    // Propiedades del componente (opcional)
    props: {
      url_img_carrer:{
          type:String,
          required:true,
      },
      iconos_info:{
          //recibe un arreglo con la informacion de cada uno de los iconos
          type:Array,
          required:false,
      },
      lista_colores_carrera:{
        type:Object,
        required:true,
      }
    },
  
    // Setup del componente (opcional)
    setup(props) {
      return {

      };
    },
  
    directives:{
      setcolor:{
          mounted(el,{value}) {
              el.style.color = value;
          },
      }
    },
  
  });
  </script>
  
  <style scoped>

  .conatiner-main-screen{
    margin-top: 3.4%;
  }

.container-main-image{
    padding-top: 5px;
    position: relative ;
    width: 100%;
    height: auto;
    background-position: center center;
    background-repeat: repeat;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    
}

  .main-image{
    width: 100%;
    height: 100%;
  }

  .square-container {
      display: grid;
      grid-template-columns: repeat(10, 1fr);
      width: 100%;
      margin-top: 0%;
  }
  
  .square {
      display: grid;
      grid-template-areas: "area";
  }
  
  .aspect-ratio, .content {
      grid-area: area;
  }
  
  .aspect-ratio {
      padding-top: 100%;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
  }
  
  .content {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      z-index: 1;
      color: white;
      padding: 20px;
      font-family: Arial;
      font-size: 15px;
      text-align: center;
  }
  
  .content-image {
      width: 50px;
      height: 50px;
      margin-bottom: 5px;
  }
  
  @media (max-width: 1200px) {
      .square-container {
          grid-template-columns: repeat(5, 1fr);
      }
  }
  
  @media (max-width: 800px) {
      .square-container {
          grid-template-columns: repeat(3, 1fr);
      }
  }
  
  @media (max-width: 500px) {
      .square-container {
          grid-template-columns: repeat(2, 1fr);
      }
  }
  
  
  </style>
  