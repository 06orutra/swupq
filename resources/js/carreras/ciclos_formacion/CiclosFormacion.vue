<template>
    <!-- Contenido del componente -->
   <section class="section-ciclos-formacion">
    <div class="main-container">
            <h1>DESCRIPCIÓN DE CICLOS DE FORMACIÓN</h1>
          <div class="button-text-container"> <!-- Nuevo div para botones y texto -->
              <div class="button-column">
                <!--
                <button @click="showText(1)">1° CICLO</button>
                <button @click="showText(2)">2° CICLO</button>
                <button @click="showText(3)">3° CICLO</button>
                -->
                <button v-for="(ciclo, index) in ciclos_formacion" :key="index" @click="showText(index,'CicloFormacionNumero'+(index+1))" :id="'CicloFormacionNumero'+(index+1)">
                    {{ index+1 }}º
                </button>
  
              </div>
              <div class="text-section" id="text-section">
                <div >{{ ciclo_seleccionado }}</div>
              </div>
          </div>
    </div>      
   </section>
  
  </template>
  
  <script>
  import { defineComponent } from 'vue';
  import { ref } from 'vue';
  
  export default defineComponent({
    // Propiedades del componente (opcional)
    props: {
        ciclos_formacion:{
          type:Array,
          required:true,
        },
        ciclo_incial:{
          type:String,
          default:'No seleccionado'
        }
    },
  
    // Setup del componente (opcional)
    setup(props) {
      let ciclo_seleccionado = ref(props.ciclos_formacion.length > 0 ? props.ciclos_formacion[0] : "No seleccionado");
      let last_option_click = '';
  
      function showText(cicloNumero,idCiclo){
          this.ciclo_seleccionado = props.ciclos_formacion[cicloNumero];
          
          if(last_option_click == '' || last_option_click == null){
            document.getElementById(idCiclo).classList.toggle('button-column-selected');
            last_option_click = idCiclo;
          }else{
            document.getElementById(last_option_click).classList.toggle('button-column-selected');
            document.getElementById(idCiclo).classList.toggle('button-column-selected');
            last_option_click = idCiclo;
          }        
      }
      // Retornar datos y métodos que deseas utilizar en la plantilla
      return {
        ciclo_seleccionado,
        showText,
      };
    },
  
  });
  </script>
  
  <style scoped>
  
          /*Estilos de la sección de botones del ciclo*/
  .main-container {
              display: flex;
              flex-direction: column;
              padding: 3%;
  }
  
  .main-container > h1 {
              font-family: Arial Black;
              font-size: 45px;
              color: purple;
              text-align: center;
  }
  .button-text-container {
              display: flex;
              flex-direction: row;
  }
  
  @media (max-width: 800px) {
              .button-text-container {
                  flex-direction: column; 
              }
              .button-column {
                  align-self: center;
              }
  }
  
  .button-column {
              flex: 0 0 150px;
              padding: 1%;
  }
  
  .button-column button {
              width: 100px;
              height: 100px;
              margin-bottom: 10px;
              font-family: Arial Black;
              color: purple;
              font-size: 20px;
  }
  
  .button-column button:hover {
              background-color: purple;
              color: white;
  }
  .button-column-selected{
    background-color: rgb(247, 49, 197);
  }
  
  .text-section {
              flex: 1;
              padding: 8%;
              background-color: purple;
              color: white;
              font-size: 15px;
              font-family: Arial;
              text-align: justify;
          }
  
  </style>
  