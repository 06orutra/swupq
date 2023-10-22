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
      
          <div class="flex flex-row align-items-center gap-5 colores-controlers">

            <!--color picker para el color primario-->
            <span>Color primario:
              <color-picker  inputId="cp-primary-color" v-model="colorPrimario" 
              ></color-picker>
            </span>

            <!--color picker para el color secundario-->
            <span>Color secundario:
              <color-picker  inputId="cp-secundary-color" v-model="colorSecundario"
             ></color-picker>
            </span>

            <!--color picker para el color secundario-->
            <span>Color terciario:
              <color-picker  inputId="cp-terciary-color" v-model="colorTerciario"
              ></color-picker>
            </span>

          </div>
          <br>
          <div class="card flex gap-2 show-palete-color">
            <div class="item" id="palete-pc" :style="{backgroundColor: '#'+colorPrimario }"></div> 
            <div class="item" id="palete-sc" :style="{backgroundColor: '#'+colorSecundario }"></div>
            <div class="item" id="palete-tc" :style="{backgroundColor: '#'+colorTerciario }"></div>
          </div>

          

          <div class="control-submit">
            <pv-button  label="Guardar" id="id-btn-guardar" type="submit"/>
          </div>

 
    </section>

    </form>

</template>

<script>
import { defineComponent } from 'vue';
import { ref } from 'vue';
import Colorpicker from 'primevue/colorpicker';
import Button from 'primevue/button';
import Card from 'primevue/card';
import InputText from 'primevue/inputtext';


export default defineComponent({
  name:'ColoresCarrera',
  components: {
    'color-picker':Colorpicker,
    'pv-button':Button,
    'card':Card,
    'pv-input-text':InputText,
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

</style>


