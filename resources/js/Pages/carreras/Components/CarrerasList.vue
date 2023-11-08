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

        <!--dialogo para mostrar los datos de la carrera a eliminar-->
        <dialog-pv v-model:visible="visibleDialogDelete" :breakpoits="{ '960px': '75vw', '640px': '85vw' }" 
        :style="{ width: '70vw' }" header="Ver datos relacionados" modal class="p-fluid">
            <div class="field">
                <form @submit.prevent="">
                    <div class="container-datos-relacionados-eliminar">
                        <div class="titulo-nombre-carrera centrar">
                            <h3>{{ carreraEliminar.datos.nombre_carrera }}</h3>
                        </div>

                        <div class="container-palette-colors centrar">
                            <div class="row-div">
                                <div class="color-primary item" :style="{backgroundColor: '#'+carreraEliminar.datos.colores.colorPrimario }"></div>
                                <div class="color-secundary item" :style="{backgroundColor: '#'+carreraEliminar.datos.colores.colorSecundario }"></div>
                                <div class="color-ternary item" :style="{backgroundColor: '#'+carreraEliminar.datos.colores.colorTerciario }"></div>
                            </div>
                        </div>

                        <hr>
                        <div class="container-objetivos-carrera">
                            <div class="titulo-apartado centrar">
                                    <h5>Objetivos de la carrera</h5>
                            </div>

                            <div class="container-objetivos-plan-estudios">
                                <!--objetivos de la carrera-->
                                <div class="objetivos-plan-estudios">
                                    <span><strong>Objetivos plan de estudios</strong></span>
                                    <p>{{carreraEliminar.datos.objetivos_carrera.plan_estudios}}</p>
                                </div>
                            </div>

                            <!--vision de la carrera-->
                            <div class="container-vision-carrera">
                                <!--objetivos de la carrera-->
                                <div class="vision-eliminar">
                                    <span><strong>Vision</strong></span>
                                    <p>{{carreraEliminar.datos.objetivos_carrera.vision}}</p>
                                </div>
                            </div>

                            <!--mision de la carrera-->
                            <div class="container-mision-carrera">
                                <!--objetivos de la carrera-->
                                <div class="mision-eliminar">
                                    <span><strong>Mision</strong></span>
                                    <p>{{carreraEliminar.datos.objetivos_carrera.mision}}</p>
                                </div>
                            </div>

                        </div>

                        <!--perfil de ingreso de la carrera-->
                        <hr>
                        <div class="container-perfil-ingreso">
                            <div class="titulo-apartado centrar">
                                <h5>Perfil ingreso</h5>
                            </div>

                            <div class="container-conocimientos">
                                <span><strong>Conocimientos</strong></span>
                                <ul class="lista-conocimientos">
                                    <li v-for="(conocimiento_carrera,index) in carreraEliminar.datos.perfil_ingreso.conocimientos"
                                    :key="conocimiento_carrera.nombre+'_'+index" class="item-conocimiento">
                                        {{ conocimiento_carrera.nombre  }}
                                    </li>
                                </ul>
                                
                            </div>

                            <div class="container-habilidades">
                                <span><strong>Habilidades</strong></span>
                                <ul class="lista-habilidades">
                                    <li v-for="(habilidad_carrera,index) in carreraEliminar.datos.perfil_ingreso.habilidades"
                                    :key="habilidad_carrera+'_'+index" class="item-habilidad">
                                        {{ habilidad_carrera.nombre  }}
                                    </li>
                                </ul>
                            </div>

                            <div class="container-actitudes">
                                <span><strong>Actitudes</strong></span>
                                <ul class="lista-actitudes">
                                    <li v-for="(actitud_carrera,index) in carreraEliminar.datos.perfil_ingreso.actitudes"
                                    :key="actitud_carrera+'_'+index" class="item-actitud">
                                        {{ actitud_carrera.nombre  }}
                                    </li>
                                </ul>
                            </div>

                            <div class="video-carrera">
                                <span><strong>Video</strong></span>
                                <div class="video-direccion">
                                    <a href="#" target="_blank">{{ carreraEliminar.datos.perfil_ingreso.video }}</a>
                                </div>
                               
                            </div>
                        </div>

                        <hr>
                        <!--perfil de egreso de la carrera-->
                        <div class="container-perfil-egreso">
                            <div class="perfil-egreso-delete">
                                <span class="centrar"><strong>Perfil egreso</strong></span>
                                <p>{{ carreraEliminar.datos.perfil_egreso }}</p>
                            </div>
                        </div>

                        <!--ciclos de formacion de la carrera-->
                        <hr>

                        <div class="container-ciclos-formacion">
                            <span class="centrar"><strong>Ciclos de formación</strong></span>
                            <div class="ciclos-formacion-delete">
                                <div v-for="(ciclo_formacion,index) in carreraEliminar.datos.ciclos_formacion" :key="index">
                                    <span><strong>{{ ciclo_formacion.numero_ciclo }}</strong></span>
                                    <p>{{ ciclo_formacion.descripcion }}</p>
                                </div>
                                
                            </div>
                        </div>

                        <!--plan de estudios y folleto digital-->
                        <hr>
                        <div class="container-plan-estudios-folleto-digital">
                            <div class="titulo-apartado centrar">
                                    <strong>Documentos</strong>
                            </div>
                            <div class="plan-estudios-delete">
                                <span><strong>{{carreraEliminar.datos.plan_estudios_folleto_digital.plan_estudios.titulo}}</strong></span>
                                <br>
                                <span>
                                    Direccion del documento:
                                    {{ carreraEliminar.datos.plan_estudios_folleto_digital.plan_estudios.url_documento }}
                                </span>
                                <br>
                                <span>
                                    Direccion del fondo:
                                    {{ carreraEliminar.datos.plan_estudios_folleto_digital.plan_estudios.url_imagen_fondo }}
                                </span>
                            </div>
                            <div class="folleto-digital-delete">
                                <span><strong>{{carreraEliminar.datos.plan_estudios_folleto_digital.folleto_digital.titulo}}</strong></span>
                                <br>
                                <span>
                                    Direccion del documento:
                                    {{ carreraEliminar.datos.plan_estudios_folleto_digital.folleto_digital.url_documento }}
                                </span>
                                <br>
                                <span>
                                    Direccion del fondo:
                                    {{ carreraEliminar.datos.plan_estudios_folleto_digital.folleto_digital.url_imagen_fondo }}
                                </span>
                            </div>
                        </div>

                        <!--pagina principal-->
                        <hr>
                        <div class="container-pagina-principal">
                            <div class="imagen-p">
                                <span><strong>Imagen principal</strong></span>
                                <br>
                                <mark>{{carreraEliminar.datos.pagina_principal.url_imagen}}</mark>
                            </div>

                            <br>
                            <div class="container-iconos-informativos">
                                <span><strong>Iconos informativos</strong></span>
                                <ul class="lista-iconos-informativos">
                                    <li v-for="(icono,index) in carreraEliminar.datos.pagina_principal.tarjetas_informativas_pp"
                                    :key="icono.descripcion+'_'+index">
                                        <details class="item-icono-informativo">
                                            <summary class="titulo-icono-informativo">{{icono.descripcion}}</summary>
                                            <div class="direccion-icono-informativo">
                                                <a href="#" target="_blank"> {{icono.url_direccion_imagen}}</a>
                                               
                                            </div>
                                        </details>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>

                    <!--boton para confirmar la eliminacion de la carrera-->
                    <br>
                    <div class="controls-delete-carrera centrar">
                        <button-pv label="Eliminar" type="button" @click="ejecutaEliminacion()"
                        :style="{ width: '25%' }"/>
                    </div>
                </form>
            </div>
        </dialog-pv>


        <!--dialogo para mostrar los datos de la carrera a modificar-->
        <dialog-pv v-model:visible="visibleDialogEdit" :breakpoits="{ '960px': '75vw', '640px': '85vw' }" 
        :style="{ width: '70vw' }" header="Ver datos relacionados" modal class="p-fluid">
                <div class="field">
                    <form @submit.prevent="">
                        <div class="editar-identidad-carrera">
                            <div class="nombre-carrera-editar">
                                <b>Nombre de la carrera:</b>    
                                <input-text-pv :value="carreraEditar.datos.nombre_carrera" class=""/>
                            </div>
                            <br>
                            <div class="container-palete-colors">
                                <div class="title-section">
                                    <b>Paleta de colores</b>
                                </div>

                                <div class="show-color-palete centrar">
                                    <!--Apartado para mostrar los colores que se estan seleccionando-->
                                    <div class="card flex gap-1 show-palete-color margin-bottom-custom centrar">
                                        <div class="item" id="palete-pc" :style="{backgroundColor:'#'+carreraEditar.datos.colores.colorPrimario}"></div> 
                                        <div class="item" id="palete-sc" :style="{backgroundColor:'#'+carreraEditar.datos.colores.colorSecundario}"></div>
                                        <div class="item" id="palete-tc" :style="{backgroundColor:'#'+carreraEditar.datos.colores.colorTerciario}"></div>
                                    </div>
                                </div>
                                <!--entradas para seleccionar la paleta de colores-->
                                <div class="centrar">
                                    <div class="controls-color-picker" style="width: 40%;">
                                        <color-picker-pv class="color-primary" 
                                        style='width: 33%;' v-model="carreraEditar.datos.colores.colorPrimario"></color-picker-pv >
                                        <color-picker-pv class="color-secundary" 
                                        style='width: 33%;' v-model="carreraEditar.datos.colores.colorSecundario"></color-picker-pv>
                                        <color-picker-pv class="color-ternary" 
                                        style='width: 33%;' v-model="carreraEditar.datos.colores.colorTerciario"></color-picker-pv>
                                    </div>
                                </div>

                            </div>

                            <!--apartado para los objetivos de la carrera-->
                            <hr>
                            <div class="objetivos-carrera-editar">
                                <div class="title-section centrar">
                                    <h5><strong>Objetivos de la carrera</strong></h5>
                                </div>
                                <div class="objetivos-plan-estudios">
                                    <h6>Objetivos plan de estudios</h6>
                                    <text-area-pv rows="5"  autoResize  placeholder="Objetivos del plan de estudios" 
                                    class="long-text-area" :value="carreraEditar.datos.objetivos_carrera.plan_estudios"/>
                                </div>

                                <div class="mision-carrera-editar">
                                    <h6>Misión</h6>
                                    <text-area-pv rows="5"  autoResize  placeholder="Misión de la carrera" 
                                    class="long-text-area" :value="carreraEditar.datos.objetivos_carrera.mision"/>
                                </div>

                                <div class="vision-carrera-editar">
                                    <h6>Visión</h6>
                                    <text-area-pv rows="5"  autoResize  placeholder="Visión de la carrera" 
                                    class="long-text-area" :value="carreraEditar.datos.objetivos_carrera.vision"/>
                                </div>

                                <div class="imagen-carrera-editar">
                                    <h6>Dirección imagen de la carrera</h6>
                                    <input-text-pv :value="carreraEditar.datos.objetivos_carrera.url_imagen" 
                                    placeholder="https://ingenieria_autotriz_escudo_imagen"  class=""/>
                                </div>
                            </div>

                            <!--apartado para el perfil de ingreso-->
                            <hr>
                            <div class="perfil-ingreso">
                                <div class="title-section centrar">
                                    <h5><strong>Pefil ingreso</strong></h5>
                                </div>


                                <div class="conocimientos-carrera-editar">
                                    <h6>Conocimientos</h6>
                                    <p>{{ carreraEditar.datos.perfil_ingreso.conocimientos }}</p>
                                </div>

                                <div class="habilidades-carrera-editar">
                                    <h6>Habilidades</h6>
                                    <p>{{ carreraEditar.datos.perfil_ingreso.habilidades }}</p>
                                </div>

                                <div class="actitudes-carrera-editar">
                                    <h6>Actitudes</h6>
                                    <p>{{ carreraEditar.datos.perfil_ingreso.actitudes }}</p>
                                </div>

                                <div class="video-carrera-editar">
                                    <h6>Video</h6>
                                    <input-text-pv :value="carreraEditar.datos.perfil_ingreso.video" 
                                    placeholder="https://www.youtube.com/watch?v=o7oJGLzxikw&ab_channel=CanalOficialUPQ"  class=""/>
                                </div>

                            </div>

                            <!--apartado para el perfil de egreso-->
                            <hr>
                            <div class="perfil-egreso-carrera-e">
                                <div class="title-section centrar">
                                    <h5><strong>Pefil egreso</strong></h5>
                                </div>
                                <text-area-pv rows="5"  autoResize :value="carreraEditar.datos.perfil_egreso" 
                                placeholder="Descripción del perfil de egreso"/>
                            </div>

                            <!--apartado para los documentos follada digital y plan estudios-->
                            <hr>
                            <div class="plan-estudios-folleto-digital-editar">
                                <div class="title-section centrar">
                                    <h5><strong>Documentos</strong></h5>
                                </div>
                                
                                <div class="plan-estudios-carrera-editar">
                                    <h6>Titulo:</h6>
                                    <input-text-pv placeholder="Plan de estudios" 
                                        :value="carreraEditar.datos.plan_estudios_folleto_digital.plan_estudios.titulo"/>
                                    
                                    <h6>Url documento:</h6>
                                    <input-text-pv placeholder="https://plan-estudios-carrera" 
                                        :value="carreraEditar.datos.plan_estudios_folleto_digital.plan_estudios.url_documento"/>
                                    
                                    <h6>Url imagen de fondo:</h6>
                                    <input-text-pv placeholder="https://my_background_image" 
                                        :value="carreraEditar.datos.plan_estudios_folleto_digital.plan_estudios.url_imagen_fondo"/>
                                </div>

                            </div>

                            <!--apartado para los ciclos de formacion-->
                            <hr>
                            <div class="ciclos-formacion-editar">
                                <div class="title-section centrar">
                                    <h5><strong>Ciclos de formación</strong></h5>
                                </div>

                                <div class="container-ciclos-formacion-carrera-editar">
                                    <div class="entradas-carrera-ciclos-formacion-editar">
                                        <input-number-pv placeholder="Numero ciclo" style="width: 30%;"/>
                                        <input-text-pv type="text"  
                                        placeholder="Descripción" style="width: 70%;"/>
                                    </div>
                                    <div class="controls-carrera-ciclos-formacion-editar centrar" style="padding: 1%;">
                                        <button-pv label="Agregar" type="button" severity="secondary" 
                                        @click="" style="width: 25%;"/>
                                    </div>
                                </div>

                                <div class="container-ciclos-formacion-agregados-editar">
                                    <p>{{ carreraEditar.datos.ciclos_formacion }}</p>
                                </div>

                            </div>

                            <!--apartado para la pagina principal con sus iconos informativos-->
                            <hr>
                            <div class="iconos-informativos-editar">
                                <div class="title-section centrar">
                                    <h5><strong>Página principal</strong></h5>
                                </div>  

                                <div class="imagen-pp-carrera-editar">
                                    <h6>Imagen de la pagina principal:</h6>
                                    <input-text-pv placeholder="https://my_background_main_screen_carrer" 
                                        :value="carreraEditar.datos.pagina_principal.url_imagen"/>

                                </div>
                                <br>
                                <div class="iconos-informativos-carrera-editar">
                                    <h6>Iconos informativos</h6>
                                    <p>{{ carreraEditar.datos.pagina_principal.tarjetas_informativas_pp }}</p>
                                </div>

                            </div>
                        </div>

                        <!--boton para confirmar la edicion de la carrera-->
                        <br>
                        <div class="controls-edit-carrera centrar">
                            <button-pv label="Guardar cambios" type="button" @click=""
                            :style="{ width: '25%' }"/>
                        </div>
                    </form>
                </div>    
        </dialog-pv>


    </section>

</template>

<script>
import { defineComponent } from 'vue';
import { ref } from 'vue';
//compnentes de primevue
import Card from 'primevue/card';
import Button from 'primevue/button';
import Dialog from 'primevue/dialog';
import InputText from 'primevue/inputtext';
import InputNumber from 'primevue/inputnumber';
import Textarea from 'primevue/textarea';
import Colorpicker from 'primevue/colorpicker';

import axios from 'axios';


export default defineComponent({
  name:'carrera-lista',
  components: {
    'card-pv':Card,
    'button-pv':Button,
    'dialog-pv':Dialog,
    'input-text-pv':InputText,
    'input-number-pv':InputNumber,
    'text-area-pv':Textarea,
    'color-picker-pv':Colorpicker,
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
    url_getCarreraUnica:{
        type:String,
        required:true,
    },
    url_deleteCarrera:{
        type:String,
        required:true,
    },
  },
  // Setup del componente (opcional)
  setup(props) {

    //variables
    const visibleDialogDelete = ref(false);
    const visibleDialogEdit = ref(false);

    const carrerasLoaded = ref([]);//guardara las carreras que se traigan de la base de datos
    const isLoading = ref(true);//para saber si se esta cargando la informacion de la base de datos

    const carreraEliminar = ref();//guardara los datos de la carrera que se desea eliminar
    const carreraEditar = ref();//guardara los datos de la carrera que se desea editar

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
        
        //solicitamos la informacion de la carrera a eliminar
        axios.post(props.url_getCarreraUnica,{'id':id})
        .then(function(response){
            const carreraDatos = response.data;
            
            carreraEliminar.value = carreraDatos;

            visibleDialogDelete.value = true;

        }).catch(function(error){
            console.error(error);
        }).finally(function(){
            isLoading.value = false;
        });

    }

    function ejecutaEliminacion(){
        if(carreraEliminar.value == null || carreraEliminar.value == undefined 
        || carreraEliminar.value == ''){
            return;
        }
        console.log('Eliminando la carrera:'+carreraEliminar.value.datos.nombre_carrera);

        axios.post(props.url_deleteCarrera,{'id':carreraEliminar.value.id})
        .then(function(response){
            console.log(response.data);
        }).catch(function(error){
            console.error(error);
        }).finally(function(){
            isLoading.value = false;
            this.getCarreras();
        });
    }

    function editarCarrera(id,carrera_nombre){
        console.log(`Editando...\nID:${id}\nCarrera:${carrera_nombre}`);
        //solicitamos la informacion de la carrera a actualizar
        axios.post(props.url_getCarreraUnica,{'id':id})
        .then(function(response){
            const carreraDatos = response.data;
            //guardamos la informacion de la carrera a editar
            carreraEditar.value = carreraDatos;
            visibleDialogEdit.value = true;

        }).catch(function(error){
            console.error(error);
        }).finally(function(){
            isLoading.value = false;
        });
    }


    // Retornar datos y métodos que deseas utilizar en la plantilla
    return {
        carrerasLoaded,
        visibleDialogDelete,
        carreraEliminar,
        carreraEditar,
        visibleDialogEdit,
        getCarreras,
        eliminarCarrera,
        editarCarrera,
        ejecutaEliminacion,
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

.lista-iconos-informativos{
    list-style: none;
}

.item-icono-informativo:hover{
    cursor: pointer;
}

.row-div{
    display: flex;
    flex-direction: row;
    align-items: center;
}

.length-input-text{
    width: 80%;
}
</style>
