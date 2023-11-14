<template>

<form id="form-carreras"> <!--@sumbit="submitForm(event)-->
    <section class="nombre-carrera">
      <div class="nombre-de-la-carrera">
          <p>Nombre de la carrera:&nbsp
            <pv-input-text type="text" placeholder="Carrera" 
            class="long-input-text" v-model="nombre_carrera"/>
          </p>
      </div>
    </section>
    <hr>

    <section class="colores-carrera">
        <div class="title-selection-colors">
          <h5>Colores de la carrera</h5>
        </div>
          <!--Apartado para mostrar los colores que se estan seleccionando-->
          <div class="card flex gap-1 show-palete-color margin-bottom-custom">
            <div class="item" id="palete-pc" :style="{backgroundColor: '#'+colores_carrera.colorPrimario }"></div> 
            <div class="item" id="palete-sc" :style="{backgroundColor: '#'+colores_carrera.colorSecundario }"></div>
            <div class="item" id="palete-tc" :style="{backgroundColor: '#'+colores_carrera.colorTerciario }"></div>
          </div>

        <div class="card flex flex-row distribuir-equitativ color-picker-controls">  <!--card flex flex-row align-items-center -->
              <!--color picker para el color primario-->
            <div class="color-primario">  
              <span>Color primario:
                <color-picker  inputId="cp-primary-color" v-model="colores_carrera.colorPrimario" 
                ></color-picker>
              </span>
            </div>


            <!--color picker para el color secundario-->
            <div class="color-secundario">
              <span>Color secundario:
                <color-picker  inputId="cp-secundary-color" v-model="colores_carrera.colorSecundario"
              ></color-picker>
              </span>
            </div>

            <!--color picker para el color secundario-->
            <div class="color-terciario">
              <span>Color terciario:
                <color-picker  inputId="cp-terciary-color" v-model="colores_carrera.colorTerciario"
                ></color-picker>
              </span>
            </div>
          </div>

 
    </section>

    <!--este apartado es para los objetivos de la carrera-->
    <hr>
    <section class="objetivos-carrera">
      <div class="title-objetivos-carrera">
          <h5>Objetivos de la carrera</h5>
      </div>
      
      <div class="flex flex-column gap-2 controls-objetivos-carreras">

        <!--objetivos del plan de estudios-->
        <div class="flex flex-column plan-estudios">
          <h6>Objetivos del plan de estudios</h6>
          <pv-txt-area rows="5"  autoResize  placeholder="Descripción del plan de estudios" 
           class="long-text-area" v-model="objetivos_plan_estudios.plan_estudios"/>
        </div>  

          <!--mision de la carrera-->
        <div class="flex flex-column mision">
          <h6>Misión</h6>
          <pv-txt-area rows="5"  autoResize  placeholder="Descripción de la misión" 
           class="long-text-area" v-model="objetivos_plan_estudios.mision"/>
        </div>  

          <!--vision de la carrera-->
        <div class="flex flex-column vision">
          <h6>Visión</h6>
          <pv-txt-area rows="5"  autoResize  placeholder="Descripción de la visión" 
           class="long-text-area" v-model="objetivos_plan_estudios.vision"/>
        </div>  

        <!--seleccionar una imagen de la carrera-->
        <div class="flex flex-column vision image-picker-objetivos-carrera">
          <h6>Dirección imagen de la carrera</h6>
          <!--
          <file-upload mode="basic" name="demo[]" :maxFileSize="1000000"
          chooseLabel="Cargar imagen" accept="image/png,image/jpeg,image/jpg"
          />
          -->

          <pv-input-text placeholder="https://ingenieria_autotriz_escudo_imagen" class="long-input-url-2" 
          v-model=" objetivos_plan_estudios.url_imagen"/>
         
        </div>

      </div>

    </section>

    <!--esta seccion corresponde al apartado del perfil de ingreso-->
    <hr>
    <section class="perfil-ingreso">
      <div class="title-pefil-ingreso">
        <h5>Perfil de ingreso</h5>
      </div>

      <div class="gap-3 flex flex-column conocimientos">

        <h6>Conocimientos</h6>
        <!--agregar un nuevo conocimiento-->
        <div class=" entrada-conocimiento">
          Nombre del conocimiento:
          <pv-input-text placeholder="ejem. Física" class="medium-input-lenght" v-model="conocimiento.nombre"/>&nbsp
          <pv-button label="Agregar conocimiento" type="button" severity="secondary"  
          @click="addConocimiento"/>
        </div>

        <!--seleccionar un conocimiento existente-->
        <div class="select-conocimiento">
          Selccionar conocimientos:
          <multi-select v-model="perfil_ingreso.conocimientos" display="chip" :options="conocimientos" 
          optionLabel="nombre" placeholder="Selecciona conocimientos"
            :maxSelectedLabels="3" class="w-full md:w-30rem"  filter/>
        </div>



        <div class="view-selected-conocimientos">
          <!--mostrar los conocimientos que se ha agregado-->
          <strong>conocimientos seleccionados</strong>
          <ul>
            <li v-for="(elm,index) in perfil_ingreso.conocimientos" :key="index">{{ elm.nombre }}</li>
          </ul>
        </div>

      </div>

      <div class="separador"> </div>
      <!--apartado para las habilidades de la carrera-->

      <br>
      <div class="gap-3 flex flex-column habilidades">

        <h6>Habilidades</h6>
        <!--agregar una nueva habilidad-->
        <div class=" entrada-habilidad">
          Nombre de la habilidad:
          <pv-input-text placeholder="ejem. Creatividad" class="medium-input-lenght" v-model="habilidad.nombre"/>&nbsp
          <pv-button label="Agregar habilidad" type="button" severity="secondary"  
          @click="addHabilidad"/>
        </div>

        <!--seleccionar una habilidad existente-->
        <div class="select-habilidad">
          Selccionar habilidad:
          <multi-select v-model="perfil_ingreso.habilidades" display="chip" :options="habilidades" 
          optionLabel="nombre" placeholder="Selecciona habilidades"
            :maxSelectedLabels="3" class="w-full md:w-30rem"  filter/>
        </div>

        <div class="view-selected-habilidades">
          <!--mostrar las habilidaes que se ha agregado-->
          <strong>habilidades seleccionadas</strong>
          <ul>
            <li v-for="(elm,index) in perfil_ingreso.habilidades" :key="index">{{ elm.nombre }}</li>
          </ul>
        </div>

      </div>

      <div class="separador"> </div>
      <!--apartado para las actitudes de la carrera-->

      <br>
      <div class="gap-3 flex flex-column actitudes">

        <h6>Actitudes</h6>
        <!--agregar una nueva actitud-->
        <div class=" entrada-actitud">
          Nombre de la actitud:
          <pv-input-text placeholder="ejem. Compromiso" class="medium-input-lenght" v-model="actitud.nombre"/>&nbsp
          <pv-button label="Agregar actitud" type="button" severity="secondary"  
          @click="addActitud"/>
        </div>

        <!--seleccionar una actitud existente-->
        <div class="select-actitud">
          Selccionar actitud:
          <multi-select v-model="perfil_ingreso.actitudes" display="chip" :options="actitudes" 
          optionLabel="nombre" placeholder="Selecciona actitudes"
            :maxSelectedLabels="3" class="w-full md:w-30rem"  filter/>
        </div>

        <div class="view-selected-actitudes">
          <!--mostrar las actitudes que se ha agregado-->
          <strong>actitudes seleccionadas</strong>
          <ul>
            <li v-for="(elm,index) in perfil_ingreso.actitudes" :key="index">{{ elm.nombre }}</li>
          </ul>
        </div>


      </div>

      
      <div class="separador"> </div>
      <br>

      <div class=" video-perfil-ingreso">
        <h6>Video de la carrera</h6>

      <div class="gap-3 flex flex-row controls-video-perfil-ingreso">
        <span>Direccion del video:
        <pv-input-text placeholder="https://www.youtube.com/watch?v=o7oJGLzxikw&ab_channel=CanalOficialUPQ" 
        class="long-input-url-2" v-model="perfil_ingreso.video"/>
        </span>
      </div>

      </div>

    </section>

    <!--este apartado es para los documentos, plan de estudios y el folleto digital-->
    <hr>
    <section class="documentos-carrera">
      <h5>Plan de estudios y folleto digital</h5>

      <div class="flex flex-column controls-plan-estuidos-folleto-digital">

          <div class="flex flex-column  plan-estudios-data">
              <h6><span>Titulo:</span></h6>
              <pv-input-text placeholder="Plan de estudios" 
                v-model="plan_estudios_folleto_digital.plan_estudios.titulo"/>
              

              <h6><span>Url documento:</span></h6>
              <pv-input-text placeholder="https://plan-estudios-carrera" class=""
                v-model="plan_estudios_folleto_digital.plan_estudios.url_documento"/>
              

                <h6><span>Url imagen de fondo:</span></h6>
                <pv-input-text placeholder="https://my_background_image" class=""
                v-model="plan_estudios_folleto_digital.plan_estudios.url_imagen_fondo"/>
              
          </div>
          <br>
          <div class="separador"></div>
          <br>
          <div class="flex flex-column  folleto-digital-data">
            <h6><span>Titulo:</span></h6>
              <pv-input-text placeholder="Folleto digital"
                v-model="plan_estudios_folleto_digital.folleto_digital.titulo"/>

              <h6><span>Url documento:</span></h6>
                <pv-input-text placeholder="https://folleto-digital" class=""
                v-model="plan_estudios_folleto_digital.folleto_digital.url_documento"/>
            
                <h6><span>Url imagen de fondo:</span></h6>       
                <pv-input-text placeholder="https://my_background_image" class=""
                v-model="plan_estudios_folleto_digital.folleto_digital.url_imagen_fondo"/>
              
          </div>

      </div>

    </section>



    <!--este apartado es para el perfil de egreso de la carrera-->
    <hr>
    <section class="perfil-egreso-carrera">
      <div class="title-perfil-egreso-carrera">
          <h5>Pefil de egreso</h5>
      </div>
      
      <div class="controls-perfil-egreso">
        <pv-txt-area rows="5"  autoResize  placeholder="Descripción del perfil de egreso" 
        class="long-text-area" v-model="perfil_egreso"/>
      </div>

    </section>

    <!--seccion que corresponde a los ciclos de formacion-->
    <hr>
    <section class="registrar-ciclos-formacion" >
      <div class="title-selection-ciclos-formacion">
          <h5>Ciclos de formación</h5>
      </div>
      <div class="controls-ciclos-formacion ">

        <div class="flex flex-row contain-ciclo-formacion distribuir-equitativ">

            <pv-input-number id="number-input" placeholder="Numero ciclo" 
            class="" v-model="ciclo_form.numero_ciclo"/>

            <pv-input-text type="text" class="long-input-text-ciclo" placeholder="Descripción"
            v-model="ciclo_form.descripcion"/>

            <pv-button label="Agregar" type="button" severity="secondary" @click="addCicloFormacion"/>

        </div>

      </div>
      <br>

      <div class="card ciclos-agregados">
        <data-table :value="ciclos_formacion" showGridlines tableStyle="min-width: 50rem">
            <column-dt field="numero_ciclo" header="Número de ciclo" style="width: 20%;"></column-dt>
            <column-dt field="descripcion" header="Descripción"></column-dt>
        </data-table>
      </div>

    </section>

    <!--esta seccion corresponde al apartado de la pagina principal y sus iconos-->
    <hr>

    <section class="flex flex-column gap-3 pagina-principal-carrera">
      <div class="title-pagina-principal">
          <h5>Página principal</h5>
      </div>

      <div class="imagen-pagina-principal">
        <h6>Imagen de la página principal</h6>

        <div class="flex flex-row gap-2 controls-image-main-screen">
          <span>Dirección imagen:
            <pv-input-text type="text" placeholder="https://my_background_main_screen_carrer"
            class="long-input-url-2" v-model="pagina_principal.url_imagen"/>
          </span>
        </div>
      </div>

      <div class="separador"></div>

      <div class="controls-tarjetas-informativas">
        <h6>Tarjetas informativas</h6>

        <div class="entrada-tarjeta-informativa">
          <table>
            <tr>
              <td>
                Descripcion:
              </td>
              <td>
                <pv-input-text type="text" placeholder="ejem. Titulación automatica" 
                class="long-input-text" v-model="tarjeta_informativa.descripcion"/>
              </td>
            </tr>
            <tr>
              <td>
                Direccion imagen:
              </td>
              <td>
                <pv-input-text type="text" placeholder="ejem. https://my_icono" 
                class="long-input-text" v-model="tarjeta_informativa.url_direccion_imagen"/>
              </td>
            </tr>
            <tr>
              <td colspan="2" align="center">
                <pv-button type="button" severity="secondary" label="Agregar" 
                @click="addTarjetaInformativa"/>
              </td>
            </tr>
          </table>
        </div>

      </div>


      <!--en este aprtado se mostraran las tarjetas informativas que se vayan agregando-->
      <div class="card tarjetas-informativas-agregadas centrar">

          <table border='1' class="table-tarjetas-informativas">
            <colgroup>
              <col style="width: 20%;">
              <col style="width: 70%;">
              <col style="width: 10%;">
            </colgroup>
            <thead>
              <th>Descripcion</th>
              <th>Direccion imagen</th>
              <th>Ver imagen</th>
            </thead>

            <tbody>
              <tr v-for="(elem,index) in tarjetas_informativas" :key="index">
                <td>{{ elem.descripcion }}</td>
                <td>{{ elem.url_direccion_imagen }}</td>
                <td align="center">
                  <pv-button icon="pi pi-search" severity="success" aria-label="Search" 
                  @:click="mostrarImagen(elem.url_direccion_imagen)" />
                </td>
              </tr>
            </tbody>
          </table>

      </div>

    </section>
    



    <br>

    <div class="control-submit">
          <pv-button  label="Guardar carrera" id="id-btn-guardar" type="button" @click="submitForm"/>     
    </div>

    </form>

</template>

<script>
import { defineComponent } from 'vue';
import { ref } from 'vue';
import Colorpicker from 'primevue/colorpicker';
import Button from 'primevue/button';
import Card from 'primevue/card';
import InputText from 'primevue/inputtext';
import InputNumber from 'primevue/inputnumber';

import Textarea from 'primevue/textarea';

import FileUpload from 'primevue/fileupload';

import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import ColumnGroup from 'primevue/columngroup';   // optional
import Row from 'primevue/row';       
import MultiSelect from 'primevue/multiselect';

import axios from 'axios';


export default defineComponent({
  name:'ColoresCarrera',
  components: {
    'color-picker':Colorpicker,
    'pv-button':Button,
    'card':Card,
    'pv-input-text':InputText,
    'pv-input-number':InputNumber,
    'pv-txt-area':Textarea,
    'file-upload':FileUpload,
    'data-table':DataTable,
    'column-dt':Column,
    'column-group-dt':ColumnGroup,
    'row-dt':Row,
    'multi-select':MultiSelect,
  },
  props: {
    title: {
      type: String,
      default: 'Colores de la carrera'
    },
    url_insertarCarrera:{
      type:String,
      required:true,
    },
    url_carreraConocimientos:{
      type:String,
      required:true,
    },
    url_carreraHabilidades:{
      type:String,
      required:true,
    },
    url_carreraActitudes:{
      type:String,
      required:true,
    },

  },

  // Setup del componente (opcional)
  setup(props) {

    /*v-models para campos del formualrio*/
    let nombre_carrera = ref('');

    /*colores de la carrera por defecto de los colorpicker*/
    const colores_carrera = ref({
      colorPrimario : '5427d9',
      colorSecundario : 'f700ff',
      colorTerciario : '00ff73',
    });


    /*objetivos del plan de estudios*/
    const objetivos_plan_estudios = ref({
      plan_estudios : '',
      mision : '',
      vision : '',
      url_imagen : '', //por definir bien su tipo de dato
    });

    /*perfil de ingreso*/
    const perfil_ingreso = ref({
      conocimientos : [],
      habilidades : [],
      actitudes : [],
      video : '',
    });

    let perfil_egreso = ref('');

    /*ciclos de formacion*/

    /*modelo para el ciclo entrante*/
    let ciclo_form = ref({
      numero_ciclo : 1,
      descripcion : '',
    });

    /*estructura para la lista de ciclos agregadas */
    /*Informacion estatica de prueba para mostrar los ciclos de formacion*/
    const ciclos_formacion = ref([
        {
          numero_ciclo: 1,
          descripcion: 'Ciclo de formación 1',
        },
      {
        numero_ciclo: 2,
        descripcion: 'Ciclo de formación 2',
      },
      {
        numero_ciclo: 3,
        descripcion: 'Ciclo de formación 3',
      }
    ]);

    /* modelo para el conocimiento entrante*/
    let conocimiento = ref({
      nombre : '',
    });

    /*Informacion estatica de prueba para mostrar los conocimientos*/
    const conocimientos = ref([
        {nombre:'Física'},
        {nombre:'Matemáticas'},
        {nombre:'Química'},
        {nombre:'Biología'},
    ]);

    const conocimientos_selected = ref([]);

    /*modelo para la habilidad entrante*/ 
    let habilidad = ref({
      nombre : '',
    });

    /*Informacion estatica de prueba para mostrar las habilidades*/
    const habilidades = ref([
        {nombre:'Creatividad'},
        {nombre:'Lectura y redacción'},
        {nombre:'Relaciones Humanas'},
        {nombre:'Pensamiento critico'},
    ]);
    const habilidades_selected = ref([]);

    /*modelo para la actitud*/
    let actitud =ref({
      nombre:'',
    });

    /*Informacion estatica de prueba para mostrar las habilidades*/
    const actitudes = ref([
        {nombre:'Compromiso'},
        {nombre:'Proactivo'},
        {nombre:'Creatividad'},
        {nombre:'Responsabilidad'},
    ]);
    const actitudes_selected = ref([]);

    /* Plan de estudios y folleto digital*/
    const plan_estudios_folleto_digital = ref({
        plan_estudios:{
            titulo:'',
            url_documento:'',
            url_imagen_fondo:'',  

        },
        folleto_digital:{
          titulo:'',
          url_documento:'',
          url_imagen_fondo:'', 
        }
    });

    /*modelo para la tarjeta informativa */
    const tarjeta_informativa = ref({
      descripcion:'',
      url_direccion_imagen:'',
    });
    /*modelo para la pagina principal */
    const pagina_principal = ref({
      url_imagen:'',
      tarjetas_informativas_pp:[],
    });

    /*Informacion estatica de prueba para mostrar las tarjetas informativas agregadas*/
    const tarjetas_informativas = ref([
        {
          descripcion: "Tarjeta informativa 1",
          url_direccion_imagen: 'https://ejemplo_icono_1',
        },
      {
        descripcion: "Tarjeta informativa 2",
          url_direccion_imagen: 'https://ejemplo_icono_2',      
      },
      {
        descripcion: "Tarjeta informativa 3",
          url_direccion_imagen: 'https://ejemplo_icono_3',      
      }
    ]);

    /*  funciones */

    function addCicloFormacion(){
      ciclos_formacion.value.push(ciclo_form.value);
      ciclo_form.value = {
        numero_ciclo : 1,
        descripcion : '',
      };
    }

    function addConocimiento(){
      //conocimientos_selected.value.push(conocimiento.value);
      perfil_ingreso.value.conocimientos.push(conocimiento.value);
      conocimientos.value.push(conocimiento.value);

      conocimiento.value = {
        nombre : '',
      };
    }

    function addHabilidad(){
      perfil_ingreso.value.habilidades.push(habilidad.value);
      habilidades_selected.value.push(habilidad.value);
      habilidades.value.push(habilidad.value);
      habilidad.value ={
        nombre : '',
      }
    }

    function addActitud(){
      perfil_ingreso.value.actitudes.push(actitud.value);
      actitudes_selected.value.push(actitud.value);
      actitudes.value.push(actitud.value);
      actitud.value = {
        nombre:'',
      }
    }

    function addTarjetaInformativa(){
      //alert(`agregando tarjeta informativa...\n${tarjeta_informativa.value.descripcion}\n${tarjeta_informativa.value.url_direccion_imagen}`);
      tarjetas_informativas.value.push(tarjeta_informativa.value);
      pagina_principal.value.tarjetas_informativas_pp.push(tarjeta_informativa.value);

      tarjeta_informativa.value = {
        descripcion:'',
        url_direccion_imagen:'',
      };
    }

    function mostrarImagen(url_imagen){
      window.open(url_imagen, '_blank');
    }

    function loadConocimientos(){
      //obtener los conocimientos de la base de datos
      axios.post(props.url_carreraConocimientos)
      .then(function(response){
        const conocimientosLoaded = response.data;
        conocimientos.value = conocimientosLoaded;

      }).catch(function(error){

        console.error(error);

      }).finally(function(){

      });
    }

    function loadHabilidades(){
      //obtener las habilidades de la base de datos
      axios.post(props.url_carreraHabilidades)
      .then(function(response){
        const habilidadesLoaded = response.data;
        habilidades.value = habilidadesLoaded;

      }).catch(function(error){

        console.error(error);

      }).finally(function(){
      });
    }

    function loadActitudes(){
      //obtener las actitudes de la base de datos
      axios.post(props.url_carreraActitudes)
      .then(function(response){
        const actitudesLoaded = response.data; 
        actitudes.value = actitudesLoaded;

      }).catch(function(error){

        console.error(error);

      }).finally(function(){

      });
    }


    function submitForm(){
      //document.getElementById('form-carreras').submit();
    const formData = new FormData();
    formData.append('nombre', nombre_carrera.value); //agregamos el nombre de la carrera
    formData.append('colores', JSON.stringify(colores_carrera.value)); //agregamos los colores de la carrera
    formData.append('objetivos_carrera',JSON.stringify(objetivos_plan_estudios.value)); //agregamos los objetivos de la carrera
    formData.append('perfil_ingreso',JSON.stringify(perfil_ingreso.value)); //agregamos el perfil de ingreso
    formData.append('plan_estudios_folleto_digital',JSON.stringify(plan_estudios_folleto_digital.value)); //agregamos el plan de estudios y el folleto digital 
    formData.append('perfil_egreso',perfil_egreso.value); //agregamos el perfil de egreso
    formData.append('ciclos_formacion',JSON.stringify(ciclos_formacion.value)); //agregamos los ciclos de formacion
    //agregamos la informacion de la pagina principal e iconos de informacion
    formData.append('pagina_principal',JSON.stringify(pagina_principal.value));

      axios.post(props.url_insertarCarrera,formData,{
        headers:{
          'Content-Type': 'multipart/form-data'
        }
      }).then(function(response){
        
        console.log(response);

      }).catch(function(error){
        console.error(error);

      }).finally(function(){
        console.log("Peticion finalizada...");
      })


      /*
      //formatemos los datos para enviarlos al backend
      const formData = new FormData();
      formData.append('nombre', this.nombre); //llave-valor

      axios.post('url_de_la_ruta_para_guardar_la_carrera',
          formData, {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
      }).then(function (response) {
          console.log(response);
      }).catch(function (error) {
          console.log(error);
      }).finally(function () {
          //limpiamos los campos del formulario
      });
      */

    }


    // Retornar datos y métodos que deseas utilizar en la plantilla
    return {
      nombre_carrera,
      colores_carrera,
      objetivos_plan_estudios,
      perfil_egreso,
      ciclo_form,
      ciclos_formacion,
      conocimientos,
      conocimiento,
      conocimientos_selected,
      habilidad,
      habilidades,
      habilidades_selected,
      actitud,
      actitudes,
      actitudes_selected,
      perfil_ingreso,
      plan_estudios_folleto_digital,
      pagina_principal,
      tarjeta_informativa,
      tarjetas_informativas,
      //metodos
      addCicloFormacion,
      addConocimiento,
      addHabilidad,
      addActitud,
      addTarjetaInformativa,
      mostrarImagen,
      submitForm,
      //cargar conocimientos, habilidades y actitudes de la base de datos
      loadConocimientos,
      loadHabilidades,
      loadActitudes,
    };
  },

  beforeMount(){
    //cargamos las listas de conocimientos, habilidades y actitudes
    this.loadConocimientos();
    this.loadHabilidades();
    this.loadActitudes();
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

.centrar{
  justify-content: center;
}

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

.distribuir-equitativ{
  display: flex;
  justify-content: space-around;
}

.distribuir-justamente{
  display: flex;
  justify-content: space-between;
}

.margin-bottom-custom{
  margin-bottom: 1rem;
}

.long-text-area{
  width: 65vw;

}

.long-input-text-ciclo{
  width: 50vw;
}

.long-input-url{
  width: 40vw;
}

.long-input-url-2{
  width: 55vw;
}

.medium-input-lenght{
  width: 30vw;
}

.separador{
  width: 98%;
  border:1px solid #dbd8d8;
  border-radius: 2px;
}

.table-tarjetas-informativas {
    border-collapse: collapse;
    width: 100%;
    border: 2px solid #333; /* Borde exterior de la tabla */
  }

  .table-tarjetas-informativas th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd; /* Borde inferior para las celdas */
  }

  .table-tarjetas-informativas th {
    background-color: #333; /* Fondo para los encabezados */
    color: white; /* Color de texto para los encabezados */
  }

  .table-tarjetas-informativas tr:nth-child(even) {
    background-color: #f2f2f2; /* Fondo alternado para filas pares */
  }

  .table-tarjetas-informativas tr:hover {
    background-color: #ddd; /* Fondo cuando el cursor está sobre una fila */
  }


</style>


