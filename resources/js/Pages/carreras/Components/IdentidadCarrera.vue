<template>

<form action="">
    <section class="nombre-carrera">
      <div class="nombre-de-la-carrera">
          <p>Nombre de la carrera:&nbsp
            <pv-input-text type="text" placeholder="Carrera" class="long-input-text"/>
          </p>
      </div>
    </section>
    <hr>

    <section class="colores-carrera">
        <div class="title-selection-colors">
          <h5>Colores de la carrera</h5>
        </div>
          <!--Apartado para mostrar los colores que se estan seleccionando-->
          <div class="card flex gap-1 show-palete-color margin-bottom-custom">
            <div class="item" id="palete-pc" :style="{backgroundColor: '#'+colorPrimario }"></div> 
            <div class="item" id="palete-sc" :style="{backgroundColor: '#'+colorSecundario }"></div>
            <div class="item" id="palete-tc" :style="{backgroundColor: '#'+colorTerciario }"></div>
          </div>

        <div class="card flex flex-row distribuir-equitativ color-picker-controls">  <!--card flex flex-row align-items-center -->
              <!--color picker para el color primario-->
            <div class="color-primario">  
              <span>Color primario:
                <color-picker  inputId="cp-primary-color" v-model="colorPrimario" 
                ></color-picker>
              </span>
            </div>


            <!--color picker para el color secundario-->
            <div class="color-secundario">
              <span>Color secundario:
                <color-picker  inputId="cp-secundary-color" v-model="colorSecundario"
              ></color-picker>
              </span>
            </div>

            <!--color picker para el color secundario-->
            <div class="color-terciario">
              <span>Color terciario:
                <color-picker  inputId="cp-terciary-color" v-model="colorTerciario"
                ></color-picker>
              </span>
            </div>
          </div>

 
    </section>

    <!--este apartado es para los objetivos de la carrera-->
    <hr>
    <section class="objetivos-carrera">
      <div class="title-objetivos-carrera">
          <h5>Objetivos de la carrera</h5>
      </div>
      
      <div class="flex flex-column gap-2 controls-objetivos-carreras">

        <!--objetivos del plan de estudios-->
        <div class="flex flex-column plan-estudios">
          <h6>Objetivos del plan de estudios</h6>
          <pv-txt-area rows="5"  autoResize  placeholder="Descripción del plan de estudios" 
           class="long-text-area"/>
        </div>  

          <!--mision de la carrera-->
        <div class="flex flex-column mision">
          <h6>Misión</h6>
          <pv-txt-area rows="5"  autoResize  placeholder="Descripción de la misión" 
           class="long-text-area"/>
        </div>  

          <!--vision de la carrera-->
        <div class="flex flex-column vision">
          <h6>Visión</h6>
          <pv-txt-area rows="5"  autoResize  placeholder="Descripción de la visión" 
           class="long-text-area"/>
        </div>  

      </div>

    </section>

    <!--este apartado es para el perfil de egreso de la carrera-->
    <hr>
    <section class="perfil-egreso-carrera">
      <div class="title-perfil-egreso-carrera">
          <h5>Pefil de egreso</h5>
      </div>
      
      <div class="controls-perfil-egreso">
        <pv-txt-area rows="5"  autoResize  placeholder="Descripción del perfil de egreso" 
        class="long-text-area"/>
      </div>

    </section>

    <!--seccion que corresponde a los ciclos de formacion-->
    <hr>
    <section class="registrar-ciclos-formacion">
      <div class="title-selection-ciclos-formacion">
          <h5>Ciclos de formación</h5>
      </div>
      <div class="controls-ciclos-formacion ">

        <div class="flex flex-row contain-ciclo-formacion distribuir-equitativ">

            <pv-input-number id="number-input" placeholder="Numero ciclo"/>

            <pv-input-text type="text" class="long-input-text-ciclo" placeholder="Descripción"/>

        </div>

      </div>
    </section>



    <br>

    <div class="control-submit">
          <pv-button  label="Guardar" id="id-btn-guardar" type="submit"/>
          
    </div>

    </form>

</template>

<script>
import { defineComponent } from 'vue';
import { ref } from 'vue';
import Colorpicker from 'primevue/colorpicker';
import Button from 'primevue/button';
import Card from 'primevue/card';
import InputText from 'primevue/inputtext';
import InputNumber from 'primevue/inputnumber';

import Textarea from 'primevue/textarea';



export default defineComponent({
  name:'ColoresCarrera',
  components: {
    'color-picker':Colorpicker,
    'pv-button':Button,
    'card':Card,
    'pv-input-text':InputText,
    'pv-input-number':InputNumber,
    'pv-txt-area':Textarea,
  },
  props: {
    title: {
      type: String,
      default: 'Colores de la carrera'
    },

  },

  // Setup del componente (opcional)
  setup(props) {
    let colorPrimario = ref('5427d9');
    let colorSecundario = ref('f700ff');
    let colorTerciario = ref('00ff73');


    // Retornar datos y métodos que deseas utilizar en la plantilla
    return {
      //metodos
      colorPrimario,
      colorSecundario,
      colorTerciario,
    };
  },

  // Lifecycle hooks (opcional)
  // Puedes utilizar los hooks como onCreated, onMounted, onUpdated, etc.
  // Ejemplo:
  // onCreated() {
  //   console.log('El componente ha sido creado');
  // },

  // Filtros (opcional)
  // Puedes utilizar el método setup para definir filtros personalizados.
  // Ejemplo:
  // setup() {
  //   Vue.filter('uppercase', (value) => {
  //     return value.toUpperCase();
  //   });
  // },

  // Watchers (opcional)
  // Puedes utilizar el método watch para observar cambios en las propiedades o datos del componente.
  // Ejemplo:
  // watch: {
  //   title(newValue, oldValue) {
  //     console.log('El título ha cambiado de:', oldValue, 'a:', newValue);
  //   },
  // },

  // Componentes hijos (opcional)
  // Si este componente va a utilizar otros componentes internamente, se pueden importar aquí.
  // Ejemplo:
  // components: {
  //   ChildComponent,
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

.item {
  flex: 1;
  text-align: center;
  border: 1px solid #ccc;
  padding: 10px;
  border-radius: 18px;
  height: 30vh;
  /*width: 30vh;*/
}

.long-input-text{
  width: 50vw;
}

.distribuir-equitativ{
  display: flex;
  justify-content: space-around;
}

.margin-bottom-custom{
  margin-bottom: 1rem;
}

.long-text-area{
  width: 65vw;

}

.long-input-text-ciclo{
  width: 50vw;
}

</style>


