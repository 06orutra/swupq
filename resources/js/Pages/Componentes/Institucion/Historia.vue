<script>
import { Swiper, SwiperSlide } from 'swiper/vue';
import Divider from 'primevue/divider';
import 'swiper/css';
import 'swiper/css/pagination';
import 'swiper/css/navigation';
import AppEstructure from '@/Layouts/mainEstructure/AppEstructure.vue';
//Swiper: Galería y carrusel de imágenes
import { Autoplay, Pagination, Navigation } from 'swiper/modules';

export default {
    components: {
        Swiper,
        SwiperSlide,
        AppEstructure,
    },
    setup() {
        return {
            modules: [Autoplay, Pagination, Navigation],
        };
    },
    //Datos para Historia (el texto puesto en el template es de ejemplo)
    data() {
        return {
            img: [],
            img1: [],
            img2: [],
            textoCompleto: '',
            texto1: '',
            texto2: '',
        };
    },
    mounted() {
        this.cargarTexto();
        this.cargarimg();

    },
    methods: {
        cargarimg() {
            axios.post('/historiaCarrusels/bannerData').then((response) => {
                let imagenes = response.data;

                // Asegurándonos de que las imágenes estén ordenadas por 'id' o cualquier otro campo
                imagenes.sort((a, b) => a.id - b.id);

                let mitad = Math.ceil(imagenes.length / 2); // Calcula la mitad del número de elementos

                this.img1 = imagenes.slice(0, mitad); // Toma la primera mitad de imágenes
                this.img2 = imagenes.slice(mitad);    // Toma la segunda mitad de imágenes

            }).catch((error) => {
                console.log(error);
            });
        },

        cargarTexto() {
            axios.post('/historiaTextos/bannerData').then((response) => {
                const datos = response.data;

                if (datos.length > 0) {
                    const primerTexto = datos[0].contenido; // Obtén el contenido del primer registro
                    this.dividirTexto(primerTexto);
                }

            }).catch((error) => {
                console.log(error);
            });
        },
        dividirTexto(texto) {
            const parrafos = texto.split('\n');
            const totalParrafos = parrafos.length;
            const mitadParrafos = Math.ceil(totalParrafos / 2); // Redondea hacia arriba para manejar números impares

            let texto1 = '';
            let texto2 = '';

            for (let i = 0; i < totalParrafos; i++) {
                if (i < mitadParrafos) {
                    texto1 += parrafos[i] + '\n';
                } else {
                    texto2 += parrafos[i] + '\n';
                }
            }

            this.texto1 = texto1.trim();
            this.texto2 = texto2.trim();
        }


    },
};
</script>


<template>
    <AppEstructure :controllerName="'/historiaImgPrinc/bannerData'">
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
                    <iframe width="450" height="300" src="https://www.youtube.com/embed/Yznna4O5tK8"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>

                <!--Imágenes carrusel 1-->
                <div class="img-carrusel mt-4">
                    <swiper :spaceBetween="0" :centeredSlides="true" :autoplay="{
                        delay: 2500,
                        disableOnInteraction: false,
                    }" :pagination="{
    clickable: true,
}" :navigation="true" :modules="modules" class="mySwiper">
                        <swiper-slide v-for="datosimg in img1">
                            <img :src="'/storage/' + datosimg.imagen" alt="Card Image" />
                        </swiper-slide>
                    </swiper>

                    <!--Imágenes carrusel 2-->
                    <swiper :spaceBetween="0" :centeredSlides="true" :autoplay="{
                        delay: 2500,
                        disableOnInteraction: false,
                    }" :pagination="{
    clickable: true,
}" :navigation="true" :modules="modules" class="mySwiper">
                        <swiper-slide v-for="datosimg in img2">
                            <img :src="'/storage/' + datosimg.imagen" alt="Card Image" />
                        </swiper-slide>
                    </swiper>
                </div>


            </div>

        </div>

    </AppEstructure>
</template>


<style scoped>
.img-carrusel {
    margin: 0;
    padding: 0;
}

.swiper-container {
    margin: 0;
}
.img-carrusel img {
    width: 100%;
    /* o el ancho que prefieras */
    height: 400px;
    /* o la altura que prefieras */
    object-fit: cover;
    /* esto hará que la imagen cubra completamente el área del contenedor, recortándola si es necesario */
}

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

.swiper-slide {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

@media screen and (max-width: 1024px) {
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
}</style>
