<template>

<form action="">
    <section class="nombre-carrera">
      <div class="nombre-de-la-carrera">
          <p>Nombre de la carrera:&nbsp
            <pv-input-text type="text" placeholder="Carrera" class="long-input-text"/>
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
            <div class="item" id="palete-pc" :style="{backgroundColor: '#'+colorPrimario }"></div> 
            <div class="item" id="palete-sc" :style="{backgroundColor: '#'+colorSecundario }"></div>
            <div class="item" id="palete-tc" :style="{backgroundColor: '#'+colorTerciario }"></div>
          </div>

        <div class="card flex flex-row distribuir-equitativ color-picker-controls">  <!--card flex flex-row align-items-center -->
              <!--color picker para el color primario-->
            <div class="color-primario">  
              <span>Color primario:
                <color-picker  inputId="cp-primary-color" v-model="colorPrimario" 
                ></color-picker>
              </span>
            </div>


            <!--color picker para el color secundario-->
            <div class="color-secundario">
              <span>Color secundario:
                <color-picker  inputId="cp-secundary-color" v-model="colorSecundario"
              ></color-picker>
              </span>
            </div>

            <!--color picker para el color secundario-->
            <div class="color-terciario">
              <span>Color terciario:
                <color-picker  inputId="cp-terciary-color" v-model="colorTerciario"
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
           class="long-text-area"/>
        </div>  

          <!--mision de la carrera-->
        <div class="flex flex-column mision">
          <h6>Misión</h6>
          <pv-txt-area rows="5"  autoResize  placeholder="Descripción de la misión" 
           class="long-text-area"/>
        </div>  

          <!--vision de la carrera-->
        <div class="flex flex-column vision">
          <h6>Visión</h6>
          <pv-txt-area rows="5"  autoResize  placeholder="Descripción de la visión" 
           class="long-text-area"/>
        </div>  

        <!--seleccionar una imagen de la carrera-->
        <div class="flex flex-column vision image-picker-objetivos-carrera">
          <h6>Imagen de la carrera</h6>
          <file-upload mode="basic" name="demo[]" :maxFileSize="1000000"
          chooseLabel="Cargar imagen" accept="image/png,image/jpeg,image/jpg"
          />
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
          <pv-input-text placeholder="ejem. Física" class="medium-input-lenght"/>&nbsp
          <pv-button label="Agregar conocimiento" type="button" severity="secondary" rounded 
          @click="getConocimientos"/>
        </div>

        <!--seleccionar un conocimiento existente-->
        <div class="select-conocimiento">
          Selccionar conocimientos:
          <multi-select v-model="conocimientos_selected" display="chip" :options="conocimientos" 
          optionLabel="nombre" placeholder="Selecciona conocimientos"
            :maxSelectedLabels="3" class="w-full md:w-30rem"  />
        </div>



        <div class="view-selected-conocimientos">
          <!--mostrar los conocimientos que se ha agregado-->
          <strong>Conocimientos seleccionados</strong>
          <ul>
            <li v-for="(elm,index) in conocimientos_selected" :key="index">{{ elm.nombre }}</li>
          </ul>
        </div>

      </div>

      <div class="separador"> </div>

      <br>
      <div class="gap-3 flex flex-column habilidades">

        <h6>Habilidades</h6>
        <!--agregar una nueva habilidad-->
        <div class=" entrada-habilidad">
          Nombre de la habilidad:
          <pv-input-text placeholder="ejem. Creatividad" class="medium-input-lenght"/>&nbsp
          <pv-button label="Agregar habilidad" type="button" severity="secondary" rounded 
          @click="getHabilidades"/>
        </div>

        <!--seleccionar una habilidad existente-->
        <div class="select-habilidad">
          Selccionar habilidad:
          <multi-select v-model="habilidades_selected" display="chip" :options="habilidades" 
          optionLabel="nombre" placeholder="Selecciona habilidades"
            :maxSelectedLabels="3" class="w-full md:w-30rem"  />
        </div>

        <div class="view-selected-habilidades">
          <!--mostrar los conocimientos que se ha agregado-->
          <strong>habilidades seleccionadas</strong>
          <ul>
            <li v-for="(elm,index) in habilidades_selected" :key="index">{{ elm.nombre }}</li>
          </ul>
        </div>

      </div>

    </section>

    <!--este apartado es para los documentos, plan de estudios y el folleto digital-->
    <hr>
    <section class="documentos-carrera">
      <h5>Plan de estudios y folleto digital</h5>

      <div class="flex flex-column controls-plan-estuidos-folleto-digital">

          <div class="flex flex-column gap-3 plan-estudios-data">
              <span>Titulo:
                <pv-input-text placeholder="Plan de estudios"/>
              </span>

              <span>Url documento:
                <pv-input-text placeholder="https://plan-estudios-carrera" class="long-input-url"/>
              </span>

              <span>Url imagen de fondo:
                <pv-input-text placeholder="https://my_background_image" class="long-input-url"/>
              </span>
          </div>
          <br>

          <div class="flex flex-column gap-3 folleto-digital-data">
            <span>Titulo:
                <pv-input-text placeholder="Folleto digital"/>
              </span>

              <span>Url documento:
                <pv-input-text placeholder="https://folleto-digital" class="long-input-url"/>
              </span>

              <span>Url imagen de fondo:
                <pv-input-text placeholder="https://my_background_image" class="long-input-url"/>
              </span>
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
        class="long-text-area"/>
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
            class=""/>
            <pv-input-text type="text" class="long-input-text-ciclo" placeholder="Descripción"/>
            <pv-button label="Agregar" type="button" severity="secondary" rounded/>

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



    <br>

    <div class="control-submit">
          <pv-button  label="Guardar" id="id-btn-guardar" type="submit"/>
          
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

  },

  // Setup del componente (opcional)
  setup(props) {
    let colorPrimario = ref('5427d9');
    let colorSecundario = ref('f700ff');
    let colorTerciario = ref('00ff73');

    /*Informacion estatica de prueba para mostrar los ciclos de formacion*/
    const ciclos_formacion = [
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
    ];

    /*Informacion estatica de prueba para mostrar los conocimientos*/
      const conocimientos = ref([
        {nombre:'Física'},
        {nombre:'Matemáticas'},
        {nombre:'Química'},
        {nombre:'Biología'},
    ]);
      const conocimientos_selected = ref([]);


    function getConocimientos(){
      const conocimientos_marcados = [];
      conocimientos_selected.value.forEach(element => {
        conocimientos_marcados.push(element.nombre);
      });

      console.table(conocimientos_marcados);
    }  


    /*Informacion estatica de prueba para mostrar las habilidades*/
        const habilidades = ref([
        {nombre:'Creatividad'},
        {nombre:'Lectura y redacción'},
        {nombre:'Relaciones Humanas'},
        {nombre:'Pensamiento critico'},
    ]);
    const habilidades_selected = ref([]);

    function getHabilidades(){
      const habilidades_marcadas = [];
      habilidades_selected.value.forEach(element => {
        habilidades_marcadas.push(element.nombre);
      });

      console.table(habilidades_marcadas);
    }  

    // Retornar datos y métodos que deseas utilizar en la plantilla
    return {
      //metodos
      colorPrimario,
      colorSecundario,
      colorTerciario,
      ciclos_formacion,
      conocimientos,
      conocimientos_selected,
      getConocimientos,
      habilidades,
      habilidades_selected,
      getHabilidades,
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

.medium-input-lenght{
  width: 30vw;
}

.separador{
  width: 98%;
  border:2px solid #c0c0c0;
  border-radius: 2px;
}


</style>


