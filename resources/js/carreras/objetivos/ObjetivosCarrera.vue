<template>
    <!-- Contenido del componente -->
    <section class="container-objetivos-mision-vision">
      <div class="image-content-container">
          <div class="image-section">
              <div class="image-container">
                  <img :src="url_imagen" alt="Somos UPQ">
              </div>
          </div>        
          <div class="content-section" >
              <h1>OBJETIVOS DEL PLAN DE ESTUDIOS</h1>
              <p>{{ objetivos }}</p>
              <h1>MISIÓN</h1>
              <p>{{ mision }}</p>
              <h1>VISIÓN</h1>
              <p>{{ vision }}</p>
          </div>
      </div>
    </section>  
  </template>
  
  <script>
  import { defineComponent } from 'vue';
  
  export default defineComponent({
    // Propiedades del componente (opcional)
    name:'ObjetivosCarrera',
    props: {
      objetivos: {
        type: String,
        required:true,
      },
      mision: {
        type: String,
        required: true,
      },
      vision:{
          type:String,
          required: true,
      },
      url_imagen:{
          type:String,
          default:'https://rrnoticias.mx/wp-content/uploads/2022/07/S6-scaled.jpg',
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
  });
  </script>
  
  <style scoped>
  /*Estilos de la imagen y el contenido (Objetivos, misión, visión)*/
  .image-content-container {
          display: flex;
          flex-direction: row;
          width: auto;
          padding: 3%;
  }
          
.image-section {
    flex: 0 0 30%; 
    background-color: transparent;  
}

.image-section img {
    width: 550px;
    height: 600px;
}

.content-section {
    flex: 1;
    padding: 20px; 
    background-color: transparent;
    text-align: justify;
}

.image-container {
    width: 100%;  
    height: 100%; 
    overflow: hidden;  
}

.image-container img {
    width: 100%;
    height: 100%;
}
h1 {
    font-family: Arial Black;
    font-size: 30px;
    color: purple;
}
p {
    font-family: Arial Black;
    font-size: 20px;
    color: rgb(0, 0, 0);
}
  </style>
  