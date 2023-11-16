<template>
    <!-- Contenido del componente -->
  <div class="contenedor-body">
  
    <div class="contenedor-principal">
  
      <div class="contenedor-video">
        
        <!--
          <iframe :src="video_url" 
        title="YouTube video player" 
        frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
        allowfullscreen></iframe>
        -->
        <iframe :src="video_url" frameborder="0" 
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
         allowfullscreen></iframe>
  
      </div>
      <div class="contenedor-lista">
          <h1>PERFIL DE INGRESO</h1>
              <h2>Conocimientos</h2> 
              <ol>
                  <li v-for="conocimiento in conocimientos" :key="conocimiento">{{ conocimiento }}</li>
              </ol>
              <h2>HABILIDADES</h2> 
              <ol>
                  <li v-for="habilidad in habilidades" :key="habilidad">{{ habilidad }}</li>
              </ol>
              <h2>ACTITUDES</h2> 
              <ol>
                  <li v-for="actitud in actitudes" :key="actitud">{{ actitud }}</li>
              </ol>
              <h1>PERFIL DE EGRESO</h1>
              <p>{{ perfil_egreso }}</p>
      </div>
  
    </div>
  
  </div>  
  </template>
  
  <script >
  import { defineComponent } from 'vue';
  
  export default defineComponent({
    // Propiedades del componente (opcional)
    name:'PerfilesCarrera',
    props: {
      video_url: {
        type: String,
        required: false,
        default: 'https://www.youtube.com/embed/dQw4w9WgXcQ?si=vZFkXUdC3af6sqIJ',
        /*
        validator:(value)=>{
          return /^(https?|ftp):\/\/[^\s/$.?#].[^\s]*$/.test(value) && value != '';
        }
        */
      },
      conocimientos: {
        type: Array,
        required: true,
      },
      habilidades:{
          type: Array,
          required: true,
          
      },
      actitudes:{
          type:Array,
          required:true
      },
      perfil_egreso:{
          type:String,
          required:true
      },
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
  .contenedor-body {
      display:flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
      padding: 20px 0;
  }
  
  .contenedor-principal {
      display: flex;
      flex-direction: row;
      justify-content: space-between;
      width: 90%;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
      padding: 1%;
      background-color: #ffffff;
      margin-left: 4%;
      margin-right: 4%;
  }
  
  .contenedor-video {
      position: relative;
      width: 50%;
      padding-left: 2%;
  }
  
  .contenedor-video::before {
      content: "";
      display: block;
      padding-top: 100%;
  }
  
  iframe {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;   
      background-color: black;
  }
  
  .contenedor-lista {
      width: 50%;
      padding-left: 3%;
      font-family: Arial, sans-serif;
      font-weight: bold; 
  }
  
  .contenedor-lista h1, .contenedor-lista h2 {
      color: #9400D3;
  }
  @media (max-width: 700px) {
      .contenedor-principal {
        width: 90%;
        flex-direction: column;
  
  
        display: flex;
        justify-content: space-between;
        width: 90%;
        padding: 5%;
  
      }
      iframe {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;   
          background-color: black;
      }
      .contenedor-video {
          position: relative;
          width: 95%;
          padding-left: 2%;
      }
      .contenedor-lista {
          width: 95%;
          padding-left: 3%;
          font-family: Arial, sans-serif;
          font-weight: bold;
      }
    }
  </style>
  