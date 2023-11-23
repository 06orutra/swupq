<template>
    <section class="carreras">
    <div class="pagina-principal-carrera">
      <main-carrer-screen :url_img_carrer="pagina_principal.url_imagen" 
      :iconos_info="pagina_principal.tarjetas_informativas_pp"
      :lista_colores_carrera="colores_carrera">
      
      </main-carrer-screen>
    </div>


    <div class="perfiles-carrera">
      <perfiles-carrera :video_url="pefil_ingreso.video"
      :conocimientos="pefil_ingreso.conocimientos"
      :habilidades="pefil_ingreso.habilidades"
      :actitudes="pefil_ingreso.actitudes"
      :perfil_egreso="perfil_egreso"
      :paleta_colores="colores_carrera">
      </perfiles-carrera>
    </div>


      <div class="descargas-carrera documentos-carrera">
        <descargas-carrera 
          :titulo_img1="plan_estudios_folleto_digital.plan_estudios.titulo" 
          :url_imagen_1="plan_estudios_folleto_digital.plan_estudios.url_imagen_fondo"
          :url_target_1="plan_estudios_folleto_digital.plan_estudios.url_documento"
          :titulo_img2="plan_estudios_folleto_digital.folleto_digital.titulo"
          :url_imagen_2="plan_estudios_folleto_digital.folleto_digital.url_imagen_fondo"
          :url_target_2="plan_estudios_folleto_digital.folleto_digital.url_documento"
          >
        </descargas-carrera>
      </div>
    
    <div class="objetivos-carrera">
      <objetivos-carrera :objetivos="objetivos_carrera.plan_estudios" :mision="objetivos_carrera.mision" 
      :vision="objetivos_carrera.vision" :url_imagen="objetivos_carrera.url_imagen"
      :paleta_colores="colores_carrera">
      </objetivos-carrera>
    </div>
    

    <div class="ciclos-formacion-carrera" >
      <ciclos-de-formacion :lista_ciclos_formacion="ciclos_formacion_carrera"
       :lista_colores_carrera="colores_carrera">
      </ciclos-de-formacion>
    </div>

    </section>
</template>

<script>
import { defineComponent,ref } from 'vue';
import PerfilesCarrera from '@/carreras/perfiles/PerfilesCarrera.vue';
import CiclosFormacion from '@/carreras/ciclos_formacion/CiclosFormacion.vue';
import ObjetivosCarrera from '@/carreras/objetivos/ObjetivosCarrera.vue';
import DescargasCarrera from '@/carreras/objetivos/DescargasCarrera.vue';
import MainScreen from '@/carreras/main_screen/MainScreen.vue';

//reconstruccion de componentes hijos
import CiclosFormacionCarrera from '@/carreras/ciclos_formacion/CiclosDeFormacion.vue';


import axios from 'axios';

export default defineComponent({
    name:'Carreras',
    components:{
      'main-carrer-screen':MainScreen,
      'perfiles-carrera':PerfilesCarrera,
      'descargas-carrera':DescargasCarrera,
      'objetivos-carrera':ObjetivosCarrera,
      'ciclos-formacion':CiclosFormacion,
      'ciclos-de-formacion':CiclosFormacionCarrera,
    },
  // Propiedades del componente (opcional)
  props: {
    id_carreraSolicitada:{
        type:String,
        required:true
      },
      carrera_solicitada:{
        type:String,
        default:''
      },
      direccion_getCarrera:{
        type:String,
        required:true
      },
      direccion_menuCarreras:{
        type:String,
        required:true,
      }
  },
  // Setup del componente (opcional)
  setup(props) {

    let datosCarrera = ref();
    let ciclos_formacion_carrera = ref(['No hay todavia']);
    let colores_carrera = ref(['#000000']);

    let objetivos_carrera = ref({
      plan_estudios:'',
      mision:'',
      vision:'',
      url_imagen:''
    });

    let pefil_ingreso = ref({
      conocimientos:[],
      habilidades:[],
      actitudes:[],
      video:''
    });
    let perfil_egreso = ref('');

    let plan_estudios_folleto_digital = ref({
      plan_estudios:{
        titulo:'',
        url_documento:'',
        url_imagen_fondo:''
      },
      folleto_digital:{
        titulo:'',
        url_documento:'',
        url_imagen_fondo:''
      }
    });

    let pagina_principal = ref({
      url_imagen:'',
      tarjetas_informativas_pp:[],
    });

    const ciclos_prueba = [
      {numero_ciclo : 1,descripcion:'Proporcionar mantenimiento y soporte al sistema y equipos de cómputo para garantizar el correcto funcionamiento de la organización mediante el diagnóstico preventivo / correctivo de componentes (hardware/software).'},

    ];

    function loadCarreraInformation(){
      //trae toda la informacion de la carrera relacionada al id desde la base de datos

      axios.post(props.direccion_getCarrera,{'id':props.id_carreraSolicitada})
      .then(function(response){

        datosCarrera.value = response.data;
        //ciclos_formacion_carrera = JSON.stringify(datosCarrera.datos.ciclos_formacion);
        ciclos_formacion_carrera.value = datosCarrera.value.datos.ciclos_formacion;
        colores_carrera.value = datosCarrera.value.datos.colores;

        objetivos_carrera.value = datosCarrera.value.datos.objetivos_carrera;
        plan_estudios_folleto_digital.value = datosCarrera.value.datos.plan_estudios_folleto_digital;
        pefil_ingreso.value = datosCarrera.value.datos.perfil_ingreso;
        perfil_egreso.value = datosCarrera.value.datos.perfil_egreso;
        pagina_principal.value = datosCarrera.value.datos.pagina_principal;

      }).catch(function(error){
          console.error(error);

      }).finally(function(){
 
      });
    }

    //carga todas las carreras disponibles de la base de datos para mostrarlas en el menu
    function loadCarrerasMenu(){
      axios.post(props.direccion_menuCarreras)
      .then(function(response){

        const menuCarreras = response.data;
        console.log(menuCarreras);

      }).catch(function(error){
          console.error(error);

      }).finally(function(){
 
      });
    }
    
    return {
      //variables
      datosCarrera,
      ciclos_formacion_carrera,
      ciclos_prueba,
      colores_carrera,
      objetivos_carrera,
      plan_estudios_folleto_digital,
      pefil_ingreso,
      perfil_egreso,
      pagina_principal,
      //metodos
      loadCarreraInformation,
      loadCarrerasMenu,
    };
  },

  mounted(){
    this.loadCarreraInformation();
    //this.loadCarrerasMenu();
  }

});
</script>

<style scoped>

</style>
