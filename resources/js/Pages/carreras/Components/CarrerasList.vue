<template>

    <!--cartas del admin-->
    <section class="carreras-lista">
        <div class="centrar title">
            <h4>Carreras</h4>
        </div>
        <div class="cards-container" v-if="cartasPrueba">
            <card-pv v-for="(carreraCard,index) in cartasPrueba" :key="index+carreraCard.nombre" class="card"> <!--v-for="datosCard in filteredBanner"-->
                <template #header>
                    <img :src="carreraCard.img" alt="Card Image" class="imagen-resolucion" /> <!--'/storage/' + carreraCard.img-->
                </template>
                <template #title> {{carreraCard.nombre}} </template>
                <template #subtitle> {{carreraCard.link}}</template>
                <template #footer>
                    <button-pv icon="pi pi-pencil" class="p-button p-button-warning" />
                    <button-pv icon="pi pi-trash" class="p-button p-button-danger"  />
                </template>
                <template #empty>
                    <div class="flex justify-center align-middle text-xl">
                        <h2>No se encontraron datos</h2>
                    </div>
                </template>
            </card-pv>
        </div>
    </section>

</template>

<script>
import { defineComponent } from 'vue';
//compnentes de primevue
import Card from 'primevue/card';
import Button from 'primevue/button';


export default defineComponent({
  name:'carrera-lista',
  components: {
    'card-pv':Card,
    'button-pv':Button,
  },
  props: {
    title:{
      type:String,
      default:'Lista de carreras'
    },
    url_getCarreras:{
      type:String,
      required:true,
    },
  },
  // Setup del componente (opcional)
  setup(props) {

    const cartasPrueba = [
    {nombre:'Filosofia', link:'https://www.google.com/',
         img:'https://images.ecestaticos.com/eJpF9C7qs7nMMSPadj5u1uQeukQ=/131x0:863x548/1200x900/filters:fill(white):format(jpg)/f.elconfidencial.com%2Foriginal%2Ffa6%2Ff7f%2Fe35%2Ffa6f7fe357cc232cf1771a4ce7bc5fb0.jpg'},
        {nombre:'Gastronomia', link:'https://www.google.com/',
         img:'https://www.mexicodesconocido.com.mx/wp-content/uploads/2018/07/gastronomia-mexicana-platillos.jpg'},
        {nombre:'Derecho', link:'https://www.google.com/',
         img:'https://concepto.de/wp-content/uploads/2012/03/derecho-ley-e1552664252875.jpg'},
        {nombre:'Medicina', link:'https://www.google.com/',
        img:'https://s1.significados.com/foto/medicina_sm.jpg'}
    ];

    //functions
    function getCarreras(){
        axios.post(props.url_getCarreras)
        .then(function(response){
            console.log(response.data);

        }).catch(function(error){
            console.error(error);

        }).finally(function(){
            console.log("Peticion finalizada...(CarreraList)");
        });
    }

    // Retornar datos y métodos que deseas utilizar en la plantilla
    return {
        cartasPrueba,
        getCarreras,
    };
  },
  mounted(){
    this.getCarreras();
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

<style lang="scss" scoped>
.cards-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    /* Para dar un espacio uniforme entre los cards */
}


.card {

/* Esto permite que cada card tome el espacio necesario y se expanda según el contenido */
margin: 10px;
/* Espacio alrededor de cada card */
width: 30em;
margin-bottom: 40px;
}

.imagen-resolucion {
    width: 90%;
    height: width;
}


.centrar{
    display: flex;
    justify-content: center;
    align-items: center;

}
</style>
