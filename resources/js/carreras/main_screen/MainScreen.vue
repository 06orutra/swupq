<template>
    <!-- Contenido del componente -->
      <section class="container">
              <img :src="url_img_carrer" alt="Nuestras carreras Universitarias" class="background-image">
      </section>
  
      <!--
      <div class="square-container" v-for="(icon,index) in iconos_info" :key="index">
  
          <div class="square strong" >
              <div class="aspect-ratio"></div>
              <div class="content" v-setcolor="icon.background_color">
                  <img :src="icon.url_imagen" alt="Descripción" class="content-image">
                  {{icon.descripcion}}
              </div>
          </div>   
  
      </div>
  -->
      <!--Contenido de los iconos con detalle-->
  
  
      <div class="square-container">  
          <div class="square strong">
              <div class="aspect-ratio"></div>
              <div class="content">
                  <img src="" alt="Descripción" class="content-image">
                  Duracion: 3 años y 4 meses
              </div>
          </div>        
          <div class="square light">
              <div class="aspect-ratio"></div>
              <div class="content">
                  <img src="" alt="Descripción" class="content-image">
                  Titulación automática
              </div>
          </div>
          <div class="square strong">
              <div class="aspect-ratio"></div>
              <div class="content">
                  <img src="" alt="Descripción" class="content-image">
                  Periodos cuatrimestrales
              </div>
          </div>        
          <div class="square light">
              <div class="aspect-ratio"></div>
              <div class="content">
                  <img src="" alt="Descripción" class="content-image">
                  Movilidad nacional e internacional
              </div>
          </div>
          <div class="square strong">
              <div class="aspect-ratio"></div>
              <div class="content">
                  <img src="" alt="Descripción" class="content-image">
                  Pertenencia al sector productivo
              </div>
          </div>        
          <div class="square light">
              <div class="aspect-ratio"></div>
              <div class="content">
                  <img src="" alt="Descripción" class="content-image">
                  Periodos de prácticas profesionales: estancias y estadías
              </div>
          </div>
          <div class="square strong">
              <div class="aspect-ratio"></div>
              <div class="content">
                  <img src="" alt="Descripción" class="content-image">
                  Modelo basado en competencias
              </div>
          </div>        
          <div class="square light">
              <div class="aspect-ratio"></div>
              <div class="content">
                  <img src="" alt="Descripción" class="content-image">
                  Formación integral
              </div>
          </div>
          <div class="square strong">
              <div class="aspect-ratio"></div>
              <div class="content">
                  <img src=" " alt="Descripción" class="content-image">
                  Ingles, aleman y frances.
              </div>
          </div>        
          <div class="square light">
              <div class="aspect-ratio"></div>
              <div class="content">
                  <img src="" alt="Descripción" class="content-image">
                  Actividades deportivas, artisticas y culturales
              </div>
          </div>
      </div>
  
  
      <!--
      <div class="items_icon" v-for="(item,index) in iconos_info" :key="index">
          <span>{{ item.descripcion }}</span> <br>
          <span>{{ item.url_imagen }}</span><br>
          <span>{{ item.background_color }}</span> <br>
      </div>
  -->
  
  </template>
  
  <script>
  import { defineComponent } from 'vue';
  //import DescriptionCarrer from '@/components/main_screen/DescripcionCarrera.js'
  
  export default defineComponent({
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
          /*
          validator:(value) => {
             return value.every(item=>item instanceof DescriptionCarrer);     
          }
          */
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
  /* Estilos de la imagen de hasta arriba */
  /*
  *{
      margin: 0;
      padding: 0;
  }
  */
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
  