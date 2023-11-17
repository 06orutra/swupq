<template>
    <!-- Contenido del componente -->
    <section>
      <div class="button-container">
              <button class="custom-button" >
                <a :href="url_target_1" target="_blank" :download="titulo_img1">
                  <img :src="url_imagen_1" :alt="titulo_img1" class="button-background">
                  <div class="custom-button-text">{{titulo_img1}}</div>
                </a>
              </button>
              <button class="custom-button" >
                <a :href="url_target_2" target="_blank" :download="titulo_img2">
                  <img :src="url_imagen_2" :alt="titulo_img2" class="button-background">
                  <div class="custom-button-text">{{titulo_img2}}</div>
                </a>
              </button>
      </div>
  </section>
  </template>
  
  <script>
import { defineComponent } from 'vue';
  
  export default defineComponent({
    // Propiedades del componente (opcional)
    name:"DescargasCarrera",
    props: {
      url_imagen_1: {
        type: String,
        default: "https://www.diariodequeretaro.com.mx/incoming/rwb9ul-upq/ALTERNATES/LANDSCAPE_768/UPQ",
      },
      titulo_img1: {
        type: String,
        required: true,
      },
      url_target_1:{
        type:String,
        default:'#'
      },
      url_imagen_2: {
        type: String,
        default: "https://www.diariodequeretaro.com.mx/incoming/rwb9ul-upq/ALTERNATES/LANDSCAPE_768/UPQ",
      },
      titulo_img2: {
        type: String,
        required: true,
      },
      url_target_2:{
        type:String,
        default:'#'
      },
    }, 

    setup(props){

    }
  
  });
  </script>
  
  <style scoped>
  .button-container {
    display: flex;
    flex-direction: row;
    width: 100%;
    margin-top: 2%;
  }
  
  .custom-button {
    flex-grow: 1;
    height: 250px;
    position: relative;
    border: none;
    cursor: pointer;
  }
  
  .custom-button-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 1;
    color: rgb(255, 255, 255);
    font-size: 30px;
    font-family: Arial Black;
    text-align: center;
  }    
  
  .button-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: 0;
  }
  </style>
  