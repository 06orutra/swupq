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

    <div class="controls-carrera-modificar">

        <div class="btn-carrera-modificar">
            <button-pv label="Guardar" type="button" id="btn-modificar-carrera"/>
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


export default defineComponent({
  name:'modificar-carrera',
  components:{
    'dropdown-pv':Dropdown,
    'button-pv':Button,
    'dialog-pv':Dialog,	
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
      //axios.post()
    }

    function disabledBtn() {
      document.getElementById('btn-modificar-carrera').disabled = true;
    }

    // Retornar datos y métodos que deseas utilizar en la plantilla
    return {
      selectedCarrera,
      visibleDialog,
      loadCarreras,
      loadCarreraData,
      disabledBtn,
      // increment,
    };
  },
  mounted(){
    this.disabledBtn();
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
