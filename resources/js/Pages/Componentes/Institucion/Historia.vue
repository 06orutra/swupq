<script>
import { Swiper, SwiperSlide } from 'swiper/vue';
import Divider from 'primevue/divider';
import 'swiper/css';
import 'swiper/css/pagination';
import 'swiper/css/navigation';
//Swiper: Galería y carrusel de imágenes
import { Autoplay, Pagination, Navigation } from 'swiper/modules';

export default {
  components: {
    Swiper,
    SwiperSlide,
  },
  setup() {
    return {
      modules: [Autoplay, Pagination, Navigation],
    };
  },
  //Datos para Historia (el texto puesto en el template es de ejemplo)
  data() {
    return {
      textoDeEjemplo: 'A las primeras hora del día 25 de octubre del año 2005, en el diario oficial “La Sombra de Arteaga”, se pudo leer el decreto para la creación de la Universidad Politécnica de Querétaro. El sentido de nuestro nacimiento es la única, pero compleja, misión de formar profesionistas que respondan efectivamente a los cambios y retos del contexto productivo, capaces de contribuir al desarrollo científico y tecnológico del estado y del país.\n\nCon esta proyección, la UPQ inició actividades el día 30 de enero de 2006, bajo la rectoría del Mtro. José Carlos Arredondo Velázquez. La primera generación se conformó con una matrícula de 270 alumnos inscritos para los programas educativos de Ingeniería en Sistemas Computacionales, Ingeniería Mecatrónica e Ingeniería en Procesos de Manufactura Avanzada.\n\nLas labores de la UPQ iniciaron en la comunidad de Sanfandila y fue hasta el 24 de mayo del año 2007 cuando se hizo realidad nuestro actual campus en una de las zonas de mayor influencia económica del estado, pues limita con tres importantes municipios del área metropolitana: Querétaro, El Marqués y Huimilpan.\n\nA lo largo de nuestra historia, la oferta académica se ha incrementado de manera importante. Hoy contamos con siete carreras. Dos licenciaturas: una en Negocios Internacionales y otra más en Administración y Gestión de Pymes. Nuestra matrícula de ingenierías se compone por: Ingeniería en Mecatrónica, Ingeniería en Redes y Telecomunicaciones, Ingeniería en Sistemas Computacionales, Ingeniería en Tecnologías de Manufactura y recientemente incorporamos la Ingeniería en Tecnología Automotriz.\n\nLa apertura de nuestras carreras se da en un marco de pertinencia, pensando siempre en las oportunidades de empleo que existen en el mercado laboral y la posibilidad que este brinda para ingresar como proveedores de servicios, nuevas empresarias y empresarios o personal capacitado para el desarrollo de funciones al interior de las empresas más importantes. Contamos con planes de estudios actualizados, que responden satisfactoriamente a lo que se demanda de una universidad comprometida con el desarrollo tecnológico.\n\nNuestro enfoque educativo basado en competencias posibilita un seguimiento focalizado hacia los estudiantes y el desarrollo de las habilidades y conocimientos que les permitirán egresar de la UPQ como profesionales de calidad. En ese sentido, es destacable dar a conocer que se busca que los docentes cuenten con el mejor perfil posible, y se fomenta su integración a cuerpos colegiados; en específico se busca su desarrollo como investigadores, por lo que su ingreso al Sistema Nacional de Investigadores (SNI) es una tarea que, aunque exhaustiva, privilegiamos fortalecer.\n\nLos programas de estancias y estadías destacan como un par de acciones fundamentales durante la formación de las y los estudiantes. Con la puesta en práctica de los conocimientos adquiridos es como se puede redundar la enseñanza universitaria. El peso de este tipo de actividades es alto, pues contrario a otros sistemas educativos, aquí son tres periodos escolares los dedicados a ello. Las alumnas y los alumnos de la Universidad Politécnica de Querétaro egresan respaldados con una amplia experiencia laboral.\n\nNuestros diversos cuerpos académicos pertenecen a las más importantes redes de conocimiento a nivel regional, nacional e internacional. PRODEP, CCPQ, ABRE y Asociación Mexicana de Mecatrónica, son solo algunas de ellas.\n\nEl apoyo brindado a las y los estudiantes se genera en dos vertientes: la académica y la institucional-vinculatoria.\n\nRespecto a la parte académica, se ha instaurado un programa de tutorías mediante el cual el alumnado recibe, durante su paso por la universidad, el apoyo de un profesor o profesora que los orienta en la toma de decisiones profesionales. Esta labor es fundamental, pues se acompaña a las y los estudiantes para fortalecer sus cualidades y aptitudes.\n\nEl apoyo institucional-vinculatorio se da a través de dos vías\n\nLa primera busca promover que las y los estudiantes continúen sus estudios al facilitarles la reinscripción mediante exenciones de pago. En dicha estrategia se fortalece también la formación integral, pues aquellos que acceden a estas becas lo hacen por el compromiso académico, cultural y deportivo mostrado con la universidad.\n\nContamos también con una modalidad de apoyo conocido como “beca por proyecto”. El objetivo es generar desde el interior de la Universidad Politécnica de Querétaro proyectos profesionales –en relación con las áreas existentes en esta casa de estudio, pero también con los programas académicos– en los que se cuente con la participación del alumnado, quienes reciben una remuneración económica por su participación en ellos. Además, se busca tender puentes entre esta institución y otras más, del ámbito público y privado, para que existan proyectos alternos en los que las empresas y el alumnado reciban beneficios.\n\nLa Dirección de Vinculación se encarga de gestionar este tipo de alianzas, pero también otras que son primordiales. A través del área de estancias y estadías, las empresas ofertan a nuestras y nuestros estudiantes y egresadas y egresados las vacantes disponibles en las mejores empresas. Las egresadas y egresados de la UPQ se caracterizan por el impacto positivo que ocasionan en la industria.\n\nActualmente, la Universidad Politécnica de Querétaro mantiene convenios con diferentes instituciones; en los últimos meses se ha fortalecido el acercamiento que se tiene con el sistema de Educación Media Superior del Estado de Querétaro, nuestra institución se fortalece a través de programas como el Día de Orientación Vocacional y el Bachillerato Avanzado, que se nutren con la participación anual de más de 2 mil jóvenes.\n\nCon esto, nos encaminamos a ser una universidad más fuerte, orientada hacia la consolidación de la calidad académica y con miras en transformar las vidas de nuestros estudiantes en un sentido positivo.',
      texto1: '',
      texto2: '',
    };
  },
  mounted() {
    this.dividirTexto();
  },
  methods: {
    dividirTexto() {
      const limiteCaracteres =3100;
      const palabras = this.textoDeEjemplo.split('\n');
      let texto1 = '';
      let texto2 = '';
      
      for (const palabra of palabras) {
        if ((texto1.length + palabra.length) <= limiteCaracteres) {
          texto1 += palabra + '\n';
        } else {
          texto2 += palabra + '\n' + '\n';
        }
      }

      this.texto1 = texto1.trim();
      this.texto2 = texto2.trim();
    }
  },
};
</script>


<template>
  <!-- <div class="banner">                               
    <img src="https://www.upq.mx/media/slider/HISTORIA.png" alt="" class="h-full w-full">                
  </div> -->

  <br><br>
  <!-- <p class="text-left ml-5 text-3xl text-blue-800 ">Historia</p> -->
  <div class="card flex mt-10" style="white-space: pre-line; text-align: justify;">
    <p class="ml-5 w-1/3">
    {{ texto1 }}
    </p>
    <Divider layout="vertical" />
    <p class="ml-5 mr-5 w-1/3">
      {{ texto2 }}
    </p>
    <Divider layout="vertical" />
    
    <div class="video-container flex flex-col w-1/3 ml-5 mr-5">

      <!--Video-->
      <div class="video">
        <iframe width="450" height="300" src="https://www.youtube.com/embed/Yznna4O5tK8" title="YouTube video player"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          allowfullscreen></iframe>
      </div>

      <!--Imágenes carrusel 1-->
      <div class="img-carrusel mt-4">
        <swiper :spaceBetween="30" :centeredSlides="true" :autoplay="{
          delay: 2500,
          disableOnInteraction: false,
        }" :pagination="{
          clickable: true,
        }" :navigation="true" :modules="modules" class="mySwiper">
          <swiper-slide><img src="https://www.upq.mx/media/slider/MENSAJE_RECTORA.png"></swiper-slide>
          <swiper-slide><img src="https://www.upq.mx/media/slider/MENSAJE_RECTORA.png"></swiper-slide>
          <swiper-slide><img src="https://www.upq.mx/media/slider/MENSAJE_RECTORA.png"></swiper-slide>
          <swiper-slide><img src="https://www.upq.mx/media/slider/MENSAJE_RECTORA.png"></swiper-slide>
          <swiper-slide><img src="https://www.upq.mx/media/slider/MENSAJE_RECTORA.png"></swiper-slide>
          <swiper-slide><img src="https://www.upq.mx/media/slider/MENSAJE_RECTORA.png"></swiper-slide>
          <swiper-slide><img src="https://www.upq.mx/media/slider/MENSAJE_RECTORA.png"></swiper-slide>
          <swiper-slide><img src="https://www.upq.mx/media/slider/MENSAJE_RECTORA.png"></swiper-slide>
          <swiper-slide><img src="https://www.upq.mx/media/slider/MENSAJE_RECTORA.png"></swiper-slide>
        </swiper>
      
      <!--Imágenes carrusel 2-->
        <swiper :spaceBetween="30" :centeredSlides="true" :autoplay="{
          delay: 2500,
          disableOnInteraction: false,
        }" :pagination="{
          clickable: true,
        }" :navigation="true" :modules="modules" class="mySwiper">
          <swiper-slide><img src="https://www.upq.mx/media/slider/MENSAJE_RECTORA.png"></swiper-slide>
          <swiper-slide><img src="https://www.upq.mx/media/slider/MENSAJE_RECTORA.png"></swiper-slide>
          <swiper-slide><img src="https://www.upq.mx/media/slider/MENSAJE_RECTORA.png"></swiper-slide>
          <swiper-slide><img src="https://www.upq.mx/media/slider/MENSAJE_RECTORA.png"></swiper-slide>
          <swiper-slide><img src="https://www.upq.mx/media/slider/MENSAJE_RECTORA.png"></swiper-slide>
          <swiper-slide><img src="https://www.upq.mx/media/slider/MENSAJE_RECTORA.png"></swiper-slide>
          <swiper-slide><img src="https://www.upq.mx/media/slider/MENSAJE_RECTORA.png"></swiper-slide>
          <swiper-slide><img src="https://www.upq.mx/media/slider/MENSAJE_RECTORA.png"></swiper-slide>
          <swiper-slide><img src="https://www.upq.mx/media/slider/MENSAJE_RECTORA.png"></swiper-slide>
        </swiper>
      </div>

    </div>

  </div>
</template>


<style scoped>
.swiper {
  width: 100%;
  flex-wrap: wrap;
}
.swiper-slide {
  text-align: center;
  font-size: 18px;
  background: #fff;
  /* Center slide text vertically */
  display: flex;
  justify-content: center;
  align-items: center;
}
.swiper-slide{
  display: block;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

@media screen and (max-width: 1024px){
  .video {
    max-width: 100%; 
    overflow: hidden; 
    width: 100%; 
    height: auto;
  }
}
@media screen and (max-width: 425px) {
  .video,
  .img-carrusel {
    display: none;
  }
  .card {
    display: block; 
  }
  .ml-5 {
    margin-left: 0 !important;
  }
}
</style>
