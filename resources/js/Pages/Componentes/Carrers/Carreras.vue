<template>

<app-estructure controllerName="/carreras/controller">
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
</app-estructure>

  
</template>

<script>
import { defineComponent,ref } from 'vue';
import PerfilesCarrera from '@/Pages/Componentes/Carrers/perfiles/PerfilesCarrera.vue';
import ObjetivosCarrera from '@/Pages/Componentes/Carrers/objetivos/ObjetivosCarrera.vue';
import DescargasCarrera from '@/Pages/Componentes/Carrers/objetivos/DescargasCarrera.vue';
import MainScreen from '@/Pages/Componentes/Carrers/main_screen/MainScreen.vue';

//reconstruccion de componentes hijos
import CiclosFormacionCarrera from '@/Pages/Componentes/Carrers/ciclos_formacion/CiclosDeFormacion.vue';

import AppEstructure from '@/Layouts/mainEstructure/AppEstructure.vue';
import axios from 'axios';

export default defineComponent({
  name:'Carreras',
  components:{
    'main-carrer-screen':MainScreen,
    'perfiles-carrera':PerfilesCarrera,
    'descargas-carrera':DescargasCarrera,
    'objetivos-carrera':ObjetivosCarrera,
    'ciclos-de-formacion':CiclosFormacionCarrera,
    'app-estructure':AppEstructure,
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

  function getColorFontContraste(){
      // Eliminar el # si está presente
      if (hexColor.startsWith('#')) {
          hexColor = hexColor.slice(1);
      }

      // Convertir el color hexadecimal a valores RGB
      const r = parseInt(hexColor.substr(0, 2), 16);
      const g = parseInt(hexColor.substr(2, 2), 16);
      const b = parseInt(hexColor.substr(4, 2), 16);

      // Calcular la luminancia
      const luminance = (0.299 * r + 0.587 * g + 0.114 * b) / 255;

      // Devolver negro (#000000) o blanco (#FFFFFF) dependiendo de la luminancia
      return luminance > 0.5 ? '#000000' : '#FFFFFF';
  }

  return {
    //variables
    datosCarrera,
    ciclos_formacion_carrera,
    colores_carrera,
    objetivos_carrera,
    plan_estudios_folleto_digital,
    pefil_ingreso,
    perfil_egreso,
    pagina_principal,
    //metodos
    loadCarreraInformation,
  };
},

mounted(){
  this.loadCarreraInformation();
}

});
</script>

<style scoped>

</style>
