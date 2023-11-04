<template>

    <!--cartas del admin-->
    <section class="carreras-lista">
        <div class="centrar title">
            <h4>Carreras</h4>
        </div>
        <div class="cards-container" v-if="carrerasLoaded">
            <card-pv v-for="carreraCard in carrerasLoaded" :key="carreraCard.id" class="card"> <!--v-for="datosCard in filteredBanner"-->
                <template #header>
                    <!--<img :src="carreraCard.img" alt="Card Image" class="imagen-resolucion" />--> <!--'/storage/' + carreraCard.img-->
                    <img :src="carreraCard.url_imagen" alt="Card Image" class="imagen-resolucion" />
                </template>
                <template #title> {{carreraCard.nombre_carrera}} </template>
                <template #subtitle>
                    <div class="container-palette-color row-div">
                        <div class="color-primary item" :style="{backgroundColor: '#'+carreraCard.colores.colorPrimario }"></div>
                        <div class="color-secundary item" :style="{backgroundColor: '#'+carreraCard.colores.colorSecundario }"></div>
                        <div class="color-ternary item" :style="{backgroundColor: '#'+carreraCard.colores.colorTerciario }"></div>
                    </div>
                </template>
                <template #footer>

                    <button-pv icon="pi pi-pencil" class="p-button p-button-warning" 
                    @click="editarCarrera(carreraCard.id,carreraCard.nombre_carrera)"/>
                    <button-pv icon="pi pi-trash" class="p-button p-button-danger" 
                    @click="eliminarCarrera(carreraCard.id,carreraCard.nombre_carrera)" />

                </template>
                <template #empty>
                    <div class="flex justify-center align-middle text-xl">
                        <h2>No se encontraron datos</h2>
                    </div>
                </template>
            </card-pv>
        </div>
        <div v-else><!--por si no hay ningun registro en la base de datos-->
            <h4><span>NO HAY CARRERAS REGISTRADAS AUN</span></h4>
        </div>
    </section>

</template>

<script>
import { defineComponent } from 'vue';
import { ref } from 'vue';
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

    //variables de prueba, para cargar las carreras en la lista de cards
    /*
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
    */

    //variables

    const carrerasLoaded = ref([]);//guardara las carreras que se traigan de la base de datos
    const isLoading = ref(true);//para saber si se esta cargando la informacion de la base de datos

    //functions
    function getCarreras(){
        //trae todas las carreras guardadas de la base de datos
        axios.post(props.url_getCarreras)
        .then(function(response){
            const carreras = response.data;

            carreras.forEach(element => {
                carrerasLoaded.value.push(element);
            });
            
        }).catch(function(error){
            console.error(error);
        }).finally(function(){
            isLoading.value = false;
        });
    }

    //para mostrar la informacion de la carrera a eliminar
    function eliminarCarrera(id,carrera_nombre){
        console.log(`Eliminando...\nID:${id}\nCarrera:${carrera_nombre}`);
    }

    function editarCarrera(id,carrera_nombre){
        console.log(`Editando...\nID:${id}\nCarrera:${carrera_nombre}`);
    }


    // Retornar datos y métodos que deseas utilizar en la plantilla
    return {
        carrerasLoaded,
        getCarreras,
        eliminarCarrera,
        editarCarrera,
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

/*para darle forma a los items que representaran la paleta de colores de la carrera*/
.item{
    width: 2rem;
    height: 2rem;
    border-radius: 50%;
    border: 1px solid black;
    margin: 2px 2px 2px 2px;
}


.row-div{
    display: flex;
    flex-direction: row;
    align-items: center;
}
</style>
