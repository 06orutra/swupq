<template>
    <section class="carreras">
        <h1>Carrers components</h1>
    </section>
</template>

<script>
import { defineComponent } from 'vue';
import PerfilesCarrera from '@/carreras/perfiles/PerfilesCarrera.vue';
import CiclosFormacion from '@/carreras/ciclos_formacion/CiclosFormacion.vue';

export default defineComponent({
    name:'Carreras',
    components:{
      PerfilesCarrera,
      CiclosFormacion,
    },
  // Propiedades del componente (opcional)
  props: {

  },
  // Setup del componente (opcional)
  setup(props) {

    return {

    };
  },


});
</script>

<style scoped>
/*
* {
  margin:0;
  padding:0;
}
*/
</style>
