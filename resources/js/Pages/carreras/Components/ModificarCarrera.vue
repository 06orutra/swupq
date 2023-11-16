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
                        <div class="item" id="palete-pc" :style="{backgroundColor: '#'+modificarColoresCarrera.colorPrimario }"></div> 
                        <div class="item" id="palete-sc" :style="{backgroundColor: '#'+modificarColoresCarrera.colorSecundario }"></div>
                        <div class="item" id="palete-tc" :style="{backgroundColor: '#'+modificarColoresCarrera.colorTerciario }"></div>
                    </div>

                    <div class="card flex flex-row distribuir-equitativ modificar-color-picker-controls">  <!--card flex flex-row align-items-center -->
                        <!--color picker para el color primario-->
                        <div class="color-primario">  
                        <span>Color primario:
                            <color-picker  inputId="mcp-primary-color" v-model="modificarColoresCarrera.colorPrimario" 
                            ></color-picker>
                        </span>
                        </div>


                        <!--color picker para el color secundario-->
                        <div class="color-secundario">
                        <span>Color secundario:
                            <color-picker  inputId="mcp-secundary-color" v-model="modificarColoresCarrera.colorSecundario"
                        ></color-picker>
                        </span>
                        </div>

                        <!--color picker para el color secundario-->
                        <div class="color-terciario">
                        <span>Color terciario:
                            <color-picker  inputId="mcp-terciary-color" v-model="modificarColoresCarrera.colorTerciario"
                            ></color-picker>
                        </span>
                        </div>
                    </div>

                </section>

                <section class="modificar-objetivos-carrera">
                    <div class="modificar-title-objetivos-carrera">
                      <h5>Objetivos de la carrera</h5>
                  </div>

                  <div class="flex flex-column gap-2 modificar-controls-objetivos-carreras">

                    <!--objetivos del plan de estudios-->
                    <div class="flex flex-column modificar-plan-estudios">
                      <h6>Objetivos del plan de estudios</h6>
                      <txt-area-pv rows="5"  autoResize  placeholder="Descripción del plan de estudios" 
                      class="long-text-area" />
                    </div>  

                    <!--mision de la carrera-->
                    <div class="flex flex-column modificar-mision">
                      <h6>Misión</h6>
                      <txt-area-pv rows="5"  autoResize  placeholder="Descripción de la misión" 
                      class="long-text-area" />
                    </div>  

                    <!--vision de la carrera-->
                    <div class="flex flex-column modificar-vision">
                      <h6>Visión</h6>
                      <txt-area-pv rows="5"  autoResize  placeholder="Descripción de la visión" 
                      class="long-text-area" />
                    </div>  

                    <!--seleccionar una imagen de la carrera-->
                    <div class="flex flex-column vision modificar-image-picker-objetivos-carrera">
                      <h6>Dirección imagen de la carrera</h6>
                      <!--
                      <file-upload mode="basic" name="demo[]" :maxFileSize="1000000"
                      chooseLabel="Cargar imagen" accept="image/png,image/jpeg,image/jpg"
                      />
                      -->
                      <inputtext-pv placeholder="https://ingenieria_autotriz_escudo_imagen" class="long-input-url-2" 
                      />
                    
                    </div>



                  </div>

                </section>
                <!--esta seccion corresponde al apartado del perfil de ingreso-->
                <hr>
                <section class="modificar-perfil-ingreso">
                    <div class="modificar-title-pefil-ingreso">
                      <h5>Perfil de ingreso</h5>
                    </div>

                    <div class="gap-3 flex flex-column modificar-conocimientos">

                      <h6>Conocimientos</h6>
                      <!--agregar un nuevo conocimiento-->
                      <div class=" modificar-entrada-conocimiento">
                        Nombre del conocimiento:
                        <inputtext-pv placeholder="ejem. Física" class="medium-input-lenght"/>&nbsp
                        <button-pv label="Agregar conocimiento" type="button" severity="secondary"  
                        @click=""/>
                      </div>

                      <!--seleccionar un conocimiento existente-->
                      <div class="modificar-select-conocimiento">
                        Selccionar conocimientos:
                        <multi-select  display="chip" :options="conocimientos" 
                        optionLabel="nombre" placeholder="Selecciona conocimientos"
                          :maxSelectedLabels="3" class="w-full md:w-30rem"  />
                      </div>

                      <div class="modificar-view-selected-conocimientos">
                        <!--mostrar los conocimientos que se ha agregado-->
                        <strong>conocimientos seleccionados</strong>
                        <ul>
                          <li ></li>
                        </ul>
                      </div>

                    </div>

                    <div class="separador"> </div>
                    <!--apartado para las habilidades de la carrera-->

                    <br>
                    <div class="gap-3 flex flex-column modificar-habilidades">

                      <h6>Habilidades</h6>
                      <!--agregar una nueva habilidad-->
                      <div class=" modificar-entrada-habilidad">
                        Nombre de la habilidad:
                        <inputtext-pv placeholder="ejem. Creatividad" class="medium-input-lenght" />&nbsp
                        <button-pv label="Agregar habilidad" type="button" severity="secondary"  
                        @click=""/>
                      </div>

                      <!--seleccionar una habilidad existente-->
                      <div class="modificar-select-habilidad">
                        Selccionar habilidad:
                        <multi-select  display="chip" :options="habilidades" 
                        optionLabel="nombre" placeholder="Selecciona habilidades"
                          :maxSelectedLabels="3" class="w-full md:w-30rem"  />
                      </div>

                      <div class="view-selected-habilidades">
                        <!--mostrar las habilidaes que se ha agregado-->
                        <strong>habilidades seleccionadas</strong>
                        <ul>
                          <li ></li>
                        </ul>
                      </div>

                    </div>

                    <div class="separador"> </div>
                    <!--apartado para las actitudes de la carrera-->

                    <br>
                    <div class="gap-3 flex flex-column modificar-actitudes">

                      <h6>Actitudes</h6>
                      <!--agregar una nueva actitud-->
                      <div class=" modificar-entrada-actitud">
                        Nombre de la actitud:
                        <inputtext-pv placeholder="ejem. Compromiso" class="medium-input-lenght" />&nbsp
                        <button-pv label="Agregar actitud" type="button" severity="secondary"  
                        @click=""/>
                      </div>

                      <!--seleccionar una actitud existente-->
                      <div class="modificar-select-actitud">
                        Selccionar actitud:
                        <multi-select  display="chip" :options="actitudes" 
                        optionLabel="nombre" placeholder="Selecciona actitudes"
                          :maxSelectedLabels="3" class="w-full md:w-30rem"  />
                      </div>

                      <div class="modificar-view-selected-actitudes">
                        <!--mostrar las actitudes que se ha agregado-->
                        <strong>actitudes seleccionadas</strong>
                        <ul>
                          <li ></li>
                        </ul>
                      </div>


                    </div>

                    
                    <div class="separador"> </div>
                    <br>

                    <div class=" modificar-video-perfil-ingreso">
                      <h6>Video de la carrera</h6>

                    <div class="gap-3 flex flex-row modificar-controls-video-perfil-ingreso">
                      <span>Direccion del video:
                      <inputtext-pv placeholder="https://www.youtube.com/watch?v=o7oJGLzxikw&ab_channel=CanalOficialUPQ" 
                      class="long-input-url-2" />
                      </span>
                    </div>

                    </div>

                </section>

                
                <!--este apartado es para modificar los documentos, plan de estudios y el folleto digital-->
                <hr>
                <section class="modificar-documentos-carrera">
                  <h5>Plan de estudios y folleto digital</h5>

                  <div class="flex flex-column modificar-controls-plan-estuidos-folleto-digital">

                      <div class="flex flex-column gap-3 modificar-plan-estudios-data">
                          <span>Titulo:
                            <inputtext-pv placeholder="Plan de estudios" 
                           />
                          </span>

                          <span>Url documento:
                            <inputtext-pv placeholder="https://plan-estudios-carrera" class="long-input-url"
                            />
                          </span>

                          <span>Url imagen de fondo:
                            <inputtext-pv placeholder="https://my_background_image" class="long-input-url"
                            />
                          </span>
                      </div>
                      <br>

                      <div class="flex flex-column gap-3 modificar-folleto-digital-data">
                        <span>Titulo:
                            <inputtext-pv placeholder="Folleto digital"
                            />
                          </span>

                          <span>Url documento:
                            <inputtext-pv placeholder="https://folleto-digital" class="long-input-url"
                            />
                          </span>

                          <span>Url imagen de fondo:
                            <inputtext-pv placeholder="https://my_background_image" class="long-input-url"
                           />
                          </span>
                      </div>

                  </div>

                </section>

                <!--este apartado es para el perfil de egreso de la carrera-->
                <hr>
                <section class="modificar-perfil-egreso-carrera">
                  <div class="modificar-title-perfil-egreso-carrera">
                      <h5>Pefil de egreso</h5>
                  </div>
                  
                  <div class="modificar-controls-perfil-egreso">
                    <txt-area-pv rows="5"  autoResize  placeholder="Descripción del perfil de egreso" 
                    class="long-text-area" />
                  </div>

                </section>

                <!--seccion que corresponde a los ciclos de formacion-->
                <hr>
                <section class="modificar-ciclos-formacion" >
                  <div class="modificar-title-selection-ciclos-formacion">
                      <h5>Ciclos de formación</h5>
                  </div>
                  <div class="modificar-controls-ciclos-formacion ">

                    <div class="flex flex-row modificar-contain-ciclo-formacion distribuir-equitativ">

                        <input-number-pv id="number-input" placeholder="Numero ciclo" 
                        class="" />

                        <inputtext-pv type="text" class="long-input-text-ciclo" placeholder="Descripción"
                        />
                        <button-pv label="Agregar" type="button" severity="secondary" />

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

                <section class="flex flex-column gap-3 modificar-pagina-principal-carrera">
                  <div class="modificar-title-pagina-principal">
                      <h5>Página principal</h5>
                  </div>

                  <div class="modificar-imagen-pagina-principal">
                    <h6>Imagen de la página principal</h6>

                    <div class="flex flex-row gap-2 modificar-controls-image-main-screen">
                      <span>Dirección imagen:
                        <inputtext-pv type="text" placeholder="https://my_background_main_screen_carrer"
                        class="long-input-url-2" />
                      </span>
                    </div>
                  </div>

                  <div class="separador"></div>

                  <div class="modificar-controls-tarjetas-informativas">
                    <h6>Tarjetas informativas</h6>

                    <div class="modificar-entrada-tarjeta-informativa">
                      <table>
                        <tr>
                          <td>
                            Descripcion:
                          </td>
                          <td>
                            <inputtext-pv type="text" placeholder="ejem. Titulación automatica" 
                            class="long-input-text" />
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Direccion imagen:
                          </td>
                          <td>
                            <inputtext-pv type="text" placeholder="ejem. https://my_icono" 
                            class="long-input-text" />
                          </td>
                        </tr>
                        <tr>
                          <td colspan="2" align="center">
                            <button-pv type="button" severity="secondary" label="Agregar" 
                            @click=""/>
                          </td>
                        </tr>
                      </table>
                    </div>

                  </div>


                  <!--en este aprtado se mostraran las tarjetas informativas que se vayan agregando-->
                  <div class="card modificar-tarjetas-informativas-agregadas centrar">

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
                              <button-pv icon="pi pi-search" severity="success" aria-label="Search" 
                              @:click="" />
                            </td>
                          </tr>
                        </tbody>
                      </table>

                  </div>

                </section>


                <br>
                <div class="btn-carrera-modificar">
                    <button-pv label="Guardar" type="button" id="btn-modificar-carrera" disabled/>
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
import Textarea from 'primevue/textarea';
import InputNumber from 'primevue/inputnumber';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import ColumnGroup from 'primevue/columngroup';   // optional
import Row from 'primevue/row';       
import MultiSelect from 'primevue/multiselect';
import FileUpload from 'primevue/fileupload';


export default defineComponent({
  name:'modificar-carrera',
  components:{
    'dropdown-pv':Dropdown,
    'button-pv':Button,
    'dialog-pv':Dialog,	
    'inputtext-pv':InputText,
    'color-picker':Colorpicker,
    'txt-area-pv':Textarea,
    'input-number-pv':InputNumber,
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

    const modificarColoresCarrera = ref({
      colorPrimario:'004000',
      colorSecundario:'0f0000',
      colorTerciario:'00c000'
    });

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

    // Retornar datos y métodos que deseas utilizar en la plantilla
    return {
      selectedCarrera,
      visibleDialog,
      isConsultedCarrera,//para saber si se consulto una carrera
      modificarColoresCarrera,
      loadCarreras,
      loadCarreraData,
      // increment,
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
