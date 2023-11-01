<template>
    <section class="administrador-carreras">
        <tab-view class="p-3">
          
            <!--apartado para la seccion de registro de una carrera-->
            <tab-panel :header="headers['registro_carrera']">
              <identidad-carrera title="Paleta de colores"></identidad-carrera>
            </tab-panel>

            <!--apartado para la seccion para elminar una carrera-->
            <tab-panel header="Eliminar carrera">
                <carrera-eliminar title="Eliminar carrera" url_getCarreras="/carreras/carreras-disponibles"/>
            </tab-panel>

            <!--apartado para la seccion para modificar una carrera-->
            <tab-panel header="Modificar carrera">
              <carrera-modificar title="Modificar carrera" url_getCarreras="/carreras/carreras-disponibles"
              url_getDataCarrera="/carreras/carrera-informacion"/>
            </tab-panel>  
            
        
        </tab-view>  
    </section>
</template>

<script>
import { defineComponent } from 'vue';
import TabView from 'primevue/tabview';
import RegistrarCarrera from '@/Pages/carreras/Components/IdentidadCarrera.vue';
import CarreraEliminar from '@/Pages/carreras/Components/EliminarCarrera.vue';
import CarreraModificar from '@/Pages/carreras/Components/ModificarCarrera.vue';
import TabPanel from 'primevue/tabpanel';

export default defineComponent({
  // Propiedades del componente (opcional)
  name:'AdministradorCarreras',
  components: {
    'tab-view':TabView,
    'tab-panel':TabPanel,
    'identidad-carrera':RegistrarCarrera,
    'carrera-eliminar':CarreraEliminar,
    'carrera-modificar':CarreraModificar,
  },
  props: {
    headers:{
      type:Object,
      default:{
        registro_carrera:'Registrar carrera',
        estructura:'Estructura de la carrera',
        textos:'Textos de la carrera',
        imagenes:'Imagenes de la carrera',}
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
/* Estilos del componente (opcional) */
/* Puedes definir estilos específicos para este componente aquí */
/* Ejemplo:
h1 {
  color: blue;
}
*/
</style>
