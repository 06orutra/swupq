<template>
    <!-- Contenido del componente -->
    <!--
      <section class="container">
              <img :src="url_img_carrer" alt="Nuestras carreras Universitarias" class="background-image">
      </section>
    -->
  
    <section class="conatiner-main-screen">
        
        <div class="container-main-image">
            <image-pv :src="url_img_carrer" alt="Nuestras carreras Universitarias" draggable="false"
            class="main-image" />
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
  
  import Image from 'primevue/image';

  //import DescriptionCarrer from '@/components/main_screen/DescripcionCarrera.js'
  
  export default defineComponent({
    name: 'MainScreen',
    components: {
      'image-pv':Image,
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
      // Lógica del componente y definición de datos
      // Puedes utilizar las funciones reactivas de Vue para definir el estado del componente.
      // Ejemplo:
      // const count = ref(0);
  
      // Métodos personalizados
      // Ejemplo:
      // function increment() {
      //   count.value++;
      // }
  
      // Retornar datos y métodos que deseas utilizar en la plantilla
      return {
        // count,
        // increment,
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
  /*
  *{
      margin: 0;
      padding: 0;
  }
  */
/* cambiar los estilos para que no se corte la imagen de la parte de arriba y cubra todo el ancho de la pantalla*/
  .conatiner-main-screen{
    margin-top: 3.4%;
  }

.container-main-image{
    width: 100%;
  height: 100%;
  position: relative;
  overflow: hidden;
    
}

  .main-image{
    width: 100%;
    height: 100%;
    /*object-fit: fill;   */
  }

  .container {
      position: relative;
  }
  
  .background-image {
      width: 100%; 
      height: auto;
  }
  
     
  .overlay {
      position: fixed;
      top: 25px;  
      left: 15px;
      z-index: 1000; 
  }        
  
  .large-image {
      width: 100px;
      height: 115px;
  }
  
  .small-images {
      display: flex;
      justify-content: center;
      gap: 10px;
  }
  
  .small-image {
      width: 45px;
      height: 45px;
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
  
  .strong .aspect-ratio {
      background-color: purple;
  }
  
  .light .aspect-ratio {
      background-color: rgb(202, 76, 202);
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
  