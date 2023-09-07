<template>
  <!-- Contenido del componente -->
  <div>
    <h1>{{ title }}</h1>
    <p>{{ message }}</p>
  </div>
</template>

<script>
import { defineComponent } from 'vue';

export default defineComponent({
  // Propiedades del componente (opcional)
  props: {
    title: {
      type: String,
      default: 'Pagina de prueba',
    },
    message: {
      type: String,
      required: true,
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

<style>
/* Estilos del componente (opcional) */
/* Puedes definir estilos específicos para este componente aquí */
/* Ejemplo:
h1 {
  color: blue;
}
*/
</style>
