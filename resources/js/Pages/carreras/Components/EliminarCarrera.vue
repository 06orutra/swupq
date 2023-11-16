<template>
 <section class="delete-carrer">
    <div class="card flex justify-content-center seleccion-carrera-delete">
        <dropdown placeholder="Carrera a eliminar..." class="w-full md:w-14rem"
        v-model="selectedCarrera" :options="carreras_disponibles" optionLabel="carrera_nombre"
        id="select-carreras" />
    </div>
    <div class="btn-search-carrera-delete">
      <button-pv label="Ver carrera" type="button" id="btn-search-delete" @click="loadCarreraData"/>
    </div>

    <dialog-pv v-model:visible="visibleDialog" modal header="Aviso!" :style="{ width: '50rem' }" 
    :breakpoints="{ '1199px': '75vw', '575px': '90vw' }">
      <p>Por favor selecciona una carrera a eliminar</p>
    </dialog-pv>

    <hr>

    <div class="container-carrera-eliminar">
      <div class="ver-carrera-eliminar" v-if="carreraConsultada">

        <div class="controls-eliminar-carrera">
          <button-pv label="Elminar carrera" disabled type="button" id="btn-delete-carrera" 
          @click="eliminarCarrera"  />
        </div>

      </div>
    </div>



 </section>
</template>

<script>
import { defineComponent } from 'vue';
import { ref } from 'vue';
// importaciones de primevue

import Dropdown from 'primevue/dropdown';
import Button from 'primevue/button';
import Dialog from 'primevue/dialog';

import axios from 'axios';

export default defineComponent({
  name:'eliminar-carrera',
  components:{
    'dropdown-pv':Dropdown,
    'button-pv':Button,
    'dialog-pv':Dialog,	
  },
  props: {
    title:{
        type:String,
        default:'Eliminar carrera'
    },
    carreras_disponibles:{
        type:Array,
        default:[
            {carrera_nombre:"Carpinteria"},
            {carrera_nombre:"Sistemas"},
            {carrera_nombre:"Recursos humanos"},
        ]
    },
    url_getCarreras:{
        type:String,
        required:true
    }
  },

  // Setup del componente (opcional)
  setup(props) {
    let selectedCarrera = ref('');
    let carreras_disponibles = ref([]);
    const visibleDialog = ref(false);
    const carreraConsultada = ref(false);

    function loadCarreras(){
      console.log("Cargando carreras disponibles...");
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
      //axios.post()
    }

    function eliminarCarrera(){
      console.log('Eliminando la carrera:'+selectedCarrera.value.carrera_nombre);
    }
    // Retornar datos y métodos que deseas utilizar en la plantilla
    return {
      selectedCarrera,
      visibleDialog,
      carreraConsultada,
      loadCarreras,
      loadCarreraData,
      eliminarCarrera,
    };
  },
  mounted(){
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
