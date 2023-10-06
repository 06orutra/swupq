<script>
    import { Swiper, SwiperSlide } from 'swiper/vue';
    import 'swiper/css';
    import 'swiper/css/pagination';
    import 'swiper/css/navigation';
    

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
    };
</script>


<template>

    <div class="p-4">
        <div class="flex">
          
            <div class="grid grid-cols-2 gap-4 w-2/3">
                <div>
                    <p class="break-inside-avoid text-justify mt-10">
                        <div>
                            <h2 class="titulo text-left">Historia</h2>
                        </div>
                    
                        La universidad Politécnica de Querétaro (UPQ) fue creada el 25 de octubre de 2005, según se anunció en el diario oficial
                        "La Sombra de Arteaga". Su misión principal es formar profecionales capaces de enfrentar los desafíos y cambios del entorno
                        productivo, contribuyendo al desarrollo científico y tecnológico del estado y del país.
                        <br><br>
                        La UPQ comenzó sus actividades el 30 de enero de 2006, bajo la dirección del Mtro. José Carlos Arredondo Velázquez. 
                        En sus inicios, tuvo una matrícula de 270 estudiantes en los programas de Ingeniería en Sistemas Computacionales, 
                        Ingeniería Mecatrónica e Ingeniería en Procesos de Manufactura Avanzada.
                        <br><br>
                        Inicialmente, la univerdiad operaba en la comunidad de Sanfandila, pero porteriormente se trasladó a su actual campus, ubicado 
                        en una zona de gran influencia económica que limita con los municipios de Querétaro, El Marqués y Huimilpan. Este cambio se hizo
                        realidad el 24 de mayo de 2007.
                        <br><br>
                        A lo largo de su historia, la oferta académica de la UPQ ha crecido significativamente. Actualmente, cuenta con siete carreras, 
                        incluyendo dos licenciaturas en Negocios Internacionales y Administración y Gestión de Pymes, y varias ingenierías, como Mecatrónica,
                        Redes y Telecomunicaciones, Sistemas Computacionales, Tecnologías de Manufactura y Tecnología Automotriz.
                        <br><br>
                        La apertura de estas carreras se basa en la pertinencia y las oportunidades de empleo que existen en el mercado laboral, tanto para ser
                        proveedores de servicios como para trabajar en empresas importantes. Los planes de estudio se actualizan constantemente para adapatarse
                        a las demandas del desarrollo tecnológico.
                    </p>
                </div>

                <div>
                <p class="break-inside-avoid text-justify mt-20">
                    Nuestros diversos cuerpos académicos pertenecen a las más importantes redes de conocimiento a nivel regional, nacional e internacional. PRODEP, CCPQ, ABRE y Asociación Mexicana de Mecatrónica, son solo algunas de ellas.
                </p>
                </div>

            </div>
    
        <div class="flex flex-col w-1/3 ml-5"> 
            <br>
            
            <!--Video-->
            <div class="mt-10">
                <iframe width="450" height="300" src="https://www.youtube.com/embed/Yznna4O5tK8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>

            <!--Imágenes carrusel-->
            <div class="img_1 mt-4">
                <swiper
    :spaceBetween="30"
    :centeredSlides="true"
    :autoplay="{
      delay: 2500,
      disableOnInteraction: false,
    }"
    :pagination="{
      clickable: true,
    }"
    :navigation="true"
    :modules="modules"
    class="mySwiper"
  >
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
            <!--Imágenes carrusel-->
            <div class="img_1 mt-4">
                <swiper
    :spaceBetween="30"
    :centeredSlides="true"
    :autoplay="{
      delay: 2500,
      disableOnInteraction: false,
    }"
    :pagination="{
      clickable: true,
    }"
    :navigation="true"
    :modules="modules"
    class="mySwiper"
  >
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

        
    </div>

</template>


<style scoped>
    .titulo{
        color: #071E77;
        font-size:27px;
        font-weight:bolder;
        margin-bottom:4px;
        letter-spacing: 1px;
    }
      
  .swiper {
    width: 100%;
    height: 100%;
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
  
  .swiper-slide img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  
</style>
