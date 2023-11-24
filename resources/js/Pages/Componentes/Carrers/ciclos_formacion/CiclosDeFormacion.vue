<template>
  <!-- Contenido del componente -->
  <section class="container-ciclos-formacion-carrera">

    <div class="ciclos-formacion-carrera" v-if="lista_ciclos_formacion">
      <div class="container-title">
        <h1 :style="{color: '#'+lista_colores_carrera.colorPrimario}">DESCRIPCIÓN DE CICLOS DE FORMACIÓN</h1>
      </div>

      <div class="content-ciclos-formacion container-row">
          <div class="button-column-numero-ciclo button-column">
                
                <button v-for="(ciclo,index) in lista_ciclos_formacion" :key="index+'_'+ciclo.numero_ciclo"
                @click="showText(index,'Ciclo_'+ciclo.numero_ciclo)" 
                :style="{backgroundColor: ciclo_seleccionado == index ? '#'+lista_colores_carrera.colorPrimario : '#'+lista_colores_carrera.colorTerciario}"
                class="button-ciclo">
                  {{ciclo.numero_ciclo}}º
                </button>
          </div>

          <div class="container-informacion-ciclo-formacion text-section" v-if="lista_ciclos_formacion.length > 0" 
            :style="{backgroundColor: '#'+lista_colores_carrera.colorSecundario}">
              <div> {{ lista_ciclos_formacion[ciclo_seleccionado].descripcion }} </div>
          </div>
          <div v-else>
            <h3>No se encontro informacion relacionada a los ciclos</h3>
          </div>

      </div>

    </div>
    <div v-else>
      <h1>No hay ciclos de formacion</h1>
    </div>

  </section>

</template>

<script>
import { defineComponent,ref } from 'vue';


export default defineComponent({
  // Propiedades del componente (opcional)
  name: 'CiclosDeFormacion',
  components: {

  },
  props: {
    lista_ciclos_formacion:{
        type:Array,
        required:true,
    },
    lista_colores_carrera:{
        type:Object,
        required:true,
    }
  },

  setup(props) {

    //definimos una variable para almacenar el ciclo seleccionado
    let ciclo_seleccionado = ref(0);

    function showText(index,id){
      ciclo_seleccionado.value = index;
    }

    return {
      //variables
      ciclo_seleccionado,
      //metodos
      showText,
    };
  },

  // Watchers (opcional)
  // Puedes utilizar el método watch para observar cambios en las propiedades o datos del componente.
  // Ejemplo:
  // watch: {
  //   title(newValue, oldValue) {
  //     console.log('El título ha cambiado de:', oldValue, 'a:', newValue);
  //   },
  // },

  // Directivas (opcional)
  // Puedes definir directivas personalizadas para este componente.
  // Ejemplo:
  // directives: {
  //   focus: {
  //     // Definición de la directiva
  //     // ...
  //   },
  // },

  // Otras opciones del componente (opcional)
  // Puedes definir otras opciones según tus necesidades.
});
</script>

<style scoped>



/*
button-column-numero-ciclo = button-column
*/

.button-column-numero-ciclo{
  display: flex;
  flex-direction: column;
}

.container-row{
  display: flex;
  flex-direction: row;
}

.button-column{
  flex: 0 0 150px;
  padding: 1%;
}

.button-ciclo{
  border-radius: 10px;
  box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.75);
}

.container-title > h1{
  /*
  color: purple;
  */
  font-family: Arial Black;
  font-size: 45px;
  text-align: center;
}


.ciclos-formacion-carrera{
  padding: 3%;
}


  @media (max-width: 800px) {
    .button-text-container {
        flex-direction: column; 
    }
    .button-column-numero-ciclo{
      flex-direction: row;
    }
    .content-ciclos-formacion{
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
    /*color: purple;*/
    font-size: 20px;
  }
  
  .button-column button:hover {
    background-color: purple;
    color: white;
    cursor: pointer;
  }
  .button-column-selected{
    /*agregar color de la paleta de colores*/ 
    background-color:#f731c5;
  }

  .text-section {
    flex: 1;
    padding: 4%;
    /*
    background-color: purple;
    color: white;
    */
    
    
    font-size: 1.3em;
    font-family: Arial;
    text-align: justify;
}


.container-informacion-ciclo-formacion{
  border: 1px solid;
  border-radius: 15px;
}

</style>
