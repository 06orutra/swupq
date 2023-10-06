<template>
    <section class="carreras">
      <!--Esta informacion es estatica para fines de prueba, aunque los componentes estan diseniados
      para cambiar su informacion de manera dinamica
      -->

      <main-carrer-screen 
    url_img_carrer="https://www.upq.mx/media/careers/banner/BANNER_SISTEMAS_1200X500.png"
    >

      </main-carrer-screen>


      <perfiles-carrera video_url="https://www.youtube.com/embed/vmxIjmP6xS0?si=z8Z80Jg6rkfo31Em" 
              :conocimientos = "['Aritmética','Dominio de TIC','Física','Química','Álgebra']" 
              :habilidades="['Creatividad','Entendimiento de la Ciencia','Lectura y Redacción','Pensamiento Matemático','Relaciones Humana']" 
              :actitudes="['Compromiso','Proactivo','Respeto','Responsabilidad']" 
              perfil_egreso="La Ingeniera e Ingeniero en Tecnología Automotriz son profesionistas con capacidad de diseñar, 
              analizar e impulsar el desarrollo tecnológico de productos, sistemas, componentes y tecnologías 
              aplicadas en la industria automotriz. Además de desarrollar, implementar y validar nuevos sistemas, 
              tecnología y componentes automotrices a partir de la necesidad y tendencias del mercado 
              laboral."    
              >
      </perfiles-carrera>

      <descargas-carrera titulo_img1="PLAN DE ESTUDIO (MATERIAS)" 
              titulo_img2="DESCARGA EL FOLLETO DIGITAL">
      </descargas-carrera>

      <objetivos-carrera
                  objetivos="Formar profesionistas competentes para desarrollar sistemas y componentes automotrices de 
                  acuerdo al mercado, así como, desarrollar tecnología en sistemas automotrices , implementarla y 
                  validarla"
                  mision="Formar profesionistas en tecnología automotriz mediante el modelo basado en competencias, de 
                  pensamiento crítico y alta conciencia ciudadana, humanistas, con capacidad de liderazgo, 
                  capaces de generar, aplicar y difundir el conocimiento, comprometidos con la institución y su vocación de servicio"
                  vision="Ser la principal opción de los ingenieros en tecnología automotriz debido al liderazgo y desarrollo tecnológico
                  como agentes de cambio y a sus valores éticos, cívicos y de servicio a la sociedad"
              >
      </objetivos-carrera>

      <ciclos-formacion 
      :ciclos_formacion="['Proporcionar mantenimiento y soporte al sistema y equipos de cómputo para garantizar el correcto funcionamiento de la organización mediante el diagnóstico preventivo / correctivo de componentes (hardware/software).',
      'Realizar soporte técnico de redes de datos para el correcto funcionamiento de la organización por medio de la verificación de fallas y de sus componentes. Diseñar redes de datos para establecer una comunicación efectiva de la información en la organización,'+ 
      'mediante el análisis de requerimientos. Determinar los requerimientos funcionales y no funcionales del sistema informático, por medio de metodologías y prototipos de desarrollo para cubrir las necesidades del cliente.',
      'Desarrollar las soluciones (arquitectura) para satisfacer los requerimientos del cliente, mediante lenguajes de programación. Diseñar centro de datos para el correcto control de la información a través de la síntesis de requerimientos organizacionales.'+ 
      'Diseñar la arquitectura (hardware/software) para garantizar el correcto funcionamiento de la información y toma de decisiones de la organización mediante estrategias de TIC.']">

      </ciclos-formacion>
    </section>
</template>

<script>
import { defineComponent } from 'vue';
import PerfilesCarrera from '@/carreras/perfiles/PerfilesCarrera.vue';
import CiclosFormacion from '@/carreras/ciclos_formacion/CiclosFormacion.vue';
import ObjetivosCarrera from '@/carreras/objetivos/ObjetivosCarrera.vue';
import DescargasCarrera from '@/carreras/objetivos/DescargasCarrera.vue';
import MainScreen from '@/carreras/main_screen/MainScreen.vue';

export default defineComponent({
    name:'Carreras',
    components:{
      'main-carrer-screen':MainScreen,
      'perfiles-carrera':PerfilesCarrera,
      'descargas-carrera':DescargasCarrera,
      'objetivos-carrera':ObjetivosCarrera,
      'ciclos-formacion ':CiclosFormacion,
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
