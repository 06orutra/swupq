<template>
  <section class="modificar-carrera">
    <!--apartado para buscar la carrera que se desea modificar-->
    <div class="card flex justify-content-center seleccion-carrera-modificar">
        <dropdown placeholder="Carrera a modificar..." class="w-full md:w-14rem"
        v-model="selectedCarrera" :options="carreras_disponibles" optionLabel="carrera_nombre"
        id="select-carreras" />
    </div>
    <div class="btn-search-carrera-modificar">
      <button-pv label="Ver carrera" type="button" id="btn-search-modificar" @click="loadCarreraData"/>
    </div>

    <!--dialogo para avisos de la carrera a modificar-->
    <dialog-pv v-model:visible="visibleDialog" modal header="Aviso!" :style="{ width: '50rem' }" 
    :breakpoints="{ '1199px': '75vw', '575px': '90vw' }">
      <p>Por favor selecciona una carrera a modificar</p>
    </dialog-pv>

    <hr>

    <!--apartado para modificar la carrera-->

    <div class="controls-carrera-modificar" >
        <div class="container-carrera-modificar" v-if="isConsultedCarrera">
            <form > <!--(inicio) formulario para actualizar los datos de la carrera-->
                <!--apartado para el nombre de la carrera-->
                <section class="modificar-nombre-carrera">
                    <div class="modificar-nombre-de-la-carrera">
                        <p>Nombre de la carrera:&nbsp
                            <inputtext-pv type="text" placeholder="Carrera" 
                            class="long-input-text" v-model="nuevo_nombre_carrera"/>
                        </p>
                    </div>
                </section>
                <!--apartado para los colores de la carrera-->
                <section class="modificar-colores-carrera">
                    <div class="modificar-title-selection-colors">
                    <h5>Colores de la carrera</h5>
                    </div>
                    <!--Apartado para mostrar los colores que se estan seleccionando-->
                    <div class="card flex gap-1 show-palete-color margin-bottom-custom">
                        <div class="item" id="palete-pc" :style="{backgroundColor: '#'+colores_carrera.colorPrimario }"></div> 
                        <div class="item" id="palete-sc" :style="{backgroundColor: '#'+colores_carrera.colorSecundario }"></div>
                        <div class="item" id="palete-tc" :style="{backgroundColor: '#'+colores_carrera.colorTerciario }"></div>
                    </div>

                    <div class="card flex flex-row distribuir-equitativ modificar-color-picker-controls">  <!--card flex flex-row align-items-center -->
                        <!--color picker para el color primario-->
                        <div class="color-primario">  
                        <span>Color primario:
                            <color-picker  inputId="mcp-primary-color" v-model="colores_carrera.colorPrimario" 
                            ></color-picker>
                        </span>
                        </div>


                        <!--color picker para el color secundario-->
                        <div class="color-secundario">
                        <span>Color secundario:
                            <color-picker  inputId="mcp-secundary-color" v-model="colores_carrera.colorSecundario"
                        ></color-picker>
                        </span>
                        </div>

                        <!--color picker para el color secundario-->
                        <div class="color-terciario">
                        <span>Color terciario:
                            <color-picker  inputId="mcp-terciary-color" v-model="colores_carrera.colorTerciario"
                            ></color-picker>
                        </span>
                        </div>
                    </div>

                </section>

                <div class="btn-carrera-modificar">
                    <button-pv label="Guardar" type="button" id="btn-modificar-carrera"/>
                </div>
            </form><!--(final) formulario para actualizar los datos de la carrera-->
        </div>
    </div>

  </section>
</template>

<script>
import { defineComponent } from 'vue';
import { ref } from 'vue';
import axios from 'axios';
// importaciones de primevue

import Dropdown from 'primevue/dropdown';
import Button from 'primevue/button';
import Dialog from 'primevue/dialog';
import InputText from 'primevue/inputtext';
import Colorpicker from 'primevue/colorpicker';


export default defineComponent({
  name:'modificar-carrera',
  components:{
    'dropdown-pv':Dropdown,
    'button-pv':Button,
    'dialog-pv':Dialog,	
    'inputtext-pv':InputText,
    'color-picker':Colorpicker,
  },
  props: {
    title: {
      type: String,
      default: 'Modificar carrera',
    },
    url_getCarreras:{
        type:String,
        required:true
    },
    url_getDataCarrera:{
        type:String,
        required:true
    },
    //informacion estatica para probar el componente
    carreras_disponibles:{
        type:Array,
        default:[
            {carrera_nombre:"Carpinteria"},
            {carrera_nombre:"Sistemas"},
            {carrera_nombre:"Recursos humanos"},
        ]
    },
  },

  // Setup del componente (opcional)
  setup(props) {
    let selectedCarrera = ref('');
    const visibleDialog = ref(false);
    const isConsultedCarrera = ref(false);

    function loadCarreras(){
      console.log("Cargando carreras disponibles (MC)...");
      /*
    axios.post(props.url_getCarreras).then((response) => {
      carreras_disponibles = response.data;
      }).catch((error) => {
          console.log(error);
      }).finally(() => {
          console.log('Peticion finalizada...');
      });
      */
    }
    function loadCarreraData(){
      if(selectedCarrera.value == ''){
        visibleDialog.value = true;
        return;
      }
      console.log('Cargando la info de la carrera:'+selectedCarrera.value.carrera_nombre);
      /*
      axios.post(props.url_getDataCarrera,selectedCarrera.value.carrera_nombre).then((response) => {
        datos_carrera = response.data;
      }).catch((error) => {
          console.log(error);
      }).finally(() => {
          console.log('Peticion finalizada...');
      })
      */
    }

    function disabledBtn() {
      document.getElementById('btn-modificar-carrera').disabled = true;
    }

    // Retornar datos y métodos que deseas utilizar en la plantilla
    return {
      selectedCarrera,
      visibleDialog,
      isConsultedCarrera,//para saber si se consulto una carrera
      loadCarreras,
      loadCarreraData,
      disabledBtn,
      // increment,
    };
  },
  mounted(){
    //this.disabledBtn();
    this.loadCarreras();
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
/* Estilos del componente (opcional) */
/* Puedes definir estilos específicos para este componente aquí */
/* Ejemplo:
h1 {
  color: blue;
}
*/
</style>
