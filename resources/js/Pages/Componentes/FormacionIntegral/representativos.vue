<script>
import AppEstructure from '@/Layouts/mainEstructure/AppEstructure.vue';
import Carousel from 'primevue/carousel';
import 'primeicons/primeicons.css';
export default {
    components: {
        AppEstructure,

    },
    mounted() {
        this.cargarTexto();
        this.cargarDeporte();
        this.cargarCultura();
        this.cargarDatosDesdeLaBaseDeDatos();
    },
    methods: {
        imageClick(index) {
            this.activeIndex = index;
            this.displayCustom = true;
        },
        cargarTexto() {
            axios.post('/RepresentativoText/bannerData').then((response) => {
                this.texto = response.data;
            }).catch((error) => {
                console.log(error);
            });
        },
        cargarDeporte() {
            axios.post('/RepresentativosDeporte/bannerData').then((response) => {
                this.deporte = response.data;
            }).catch((error) => {
                console.log(error);
            });
        },
        cargarCultura() {
            axios.post('/RepresentativosCultura/bannerData').then((response) => {
                this.cultura = response.data;
            }).catch((error) => {
                console.log(error);
            });
        },
        cargarDatosDesdeLaBaseDeDatos() {
            // Hacer todas las solicitudes simultáneamente
            Promise.all([
                axios.post('/RepresentativoImagenes/bannerData'),
                axios.post('/RepresentativosCultura/bannerData'),
                axios.post('/RepresentativosDeporte/bannerData')
            ])
                .then(([imagenesResponse, culturaResponse, deporteResponse]) => {
                    // Procesar la respuesta de RepresentativoImagenes
                    const imagenesImages = imagenesResponse.data.map(item => ({
                        itemImageSrc: '/storage/' + item.imagen,
                        alt: item.alt,
                        // Otras propiedades si las tienes en tu base de datos
                    }));

                    // Procesar la respuesta de RepresentativosCultura
                    const culturaImages = culturaResponse.data.map(item => ({
                        itemImageSrc: '/storage/' + item.imagen,
                        alt: item.alt,
                        // Otras propiedades si las tienes en tu base de datos
                    }));

                    // Procesar la respuesta de RepresentativosDeporte
                    const deporteImages = deporteResponse.data.map(item => ({
                        itemImageSrc: '/storage/' + item.imagen,
                        alt: item.alt,
                        // Otras propiedades si las tienes en tu base de datos
                    }));

                    // Combinar las tres listas de imágenes
                    this.imagess = imagenesImages.concat(deporteImages, culturaImages);
                })
                .catch((error) => {
                    console.error(error);
                });
        },


        showImageInLarge(image) {
            // Abre la imagen en una vista en grande cuando se hace clic en una miniatura.
            this.selectedImage = image;
        },
        closeLargeImage() {
            // Cierra la vista en grande de la imagen.
            this.selectedImage = null;
        },
    },
    data() {
        return {
            texto: [],
            deporte: [],
            cultura: [],
            displayCustom: false,
            responsiveOption: [
                {
                    breakpoint: '1024px',
                    numVisible: 5
                },
                {
                    breakpoint: '768px',
                    numVisible: 3
                },
                {
                    breakpoint: '560px',
                    numVisible: 1
                }
            ],
            images: [],
            activeIndex: 0,
            responsiveOptions: [
                {
                    breakpoint: '1024px',
                    numVisible: 5
                },
                {
                    breakpoint: '768px',
                    numVisible: 3
                },
                {
                    breakpoint: '560px',
                    numVisible: 1
                }
            ],
            displayCustom: false,
            imagess: [],
            selectedImage: null,
        };

    },
}

</script>


 
<template>
    <AppEstructure :controllerName="'/Representativosprin/bannerData'" style="background-color: white;">
        <div class="h-3rem" style="background-color:rgb(140, 36, 55);"></div>
        <div class="panel">
            <div class="texto px-8" v-for="text in texto">
                {{ text.contenido }}
            </div>
        </div>
        <div class="flex align-items-center justify-content-center">
            <div class="mt-8 border-bottom-3 w-11">
                <h2>Cultura Física, Deporte, y Recreación</h2>
            </div>
        </div>


        <div class="card">
            <Carousel :value="deporte" :numVisible="3" :numScroll="1" :responsiveOptions="responsiveOptions" circular
                :autoplayInterval="3000">
                <template #item="slotProps">
                    <div class="border-1 surface-border border-round m-2 text-center py-5 px-3 ">
                        <div class="mb-3">
                            <img :src="'/storage/' + slotProps.data.imagen" alt="Card Image" class="w-11"
                                style="height:30vh;" />
                        </div>
                        <div>
                            <h4 class="mb-1">{{ slotProps.data.nombre }}</h4>

                        </div>
                    </div>
                </template>
            </Carousel>
        </div>


        <div class="flex align-items-center justify-content-center">
            <div class="mt-8 border-bottom-3 w-11 text-right">
                <h2>Difusión Cultural y Artistica (DICART)</h2>
            </div>
        </div>


        <div class="card">
            <Carousel :value="cultura" :numVisible="3" :numScroll="1" :responsiveOptions="responsiveOptions" circular
                :autoplayInterval="3000">
                <template #item="slotProps">
                    <div class="border-1 surface-border border-round m-2 text-center py-5 px-3 ">
                        <div class="mb-3">
                            <img :src="'/storage/' + slotProps.data.imagen" alt="Card Image" class="w-11"
                                style="height:30vh;" />
                        </div>
                        <div>
                            <h4 class="mb-1">{{ slotProps.data.nombre }}</h4>

                        </div>
                    </div>
                </template>
            </Carousel>
            <!-- Cuadrícula estática con miniaturas de las imágenes -->
            <div class="grid-gallery">
                <div v-for="(image, index) in imagess" :key="index" class="grid-item" @click="showImageInLarge(image)">
                    <img :src="image.itemImageSrc" :alt="image.alt" class="grid-image" />
                </div>
            </div>

<!-- Vista en grande de la imagen seleccionada -->
<div v-if="selectedImage" class="large-image-modal" @click="closeLargeImage">
  <button class="close-button">
    <!-- Puedes cambiar el icono a tu elección -->
    <i class="pi pi-times"></i>
  </button>
  <img :src="selectedImage.itemImageSrc" :alt="selectedImage.alt" />
</div>
        </div>



    </AppEstructure>
</template>

<style scoped>
.close-button {
  position: absolute;
  top: 10px;
  right: 10px;
  background: none;
  border: none;
  cursor: pointer;
  color: #fff; /* Cambia el color según tu diseño */
  font-size: 20px;
}

.grid-gallery {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    /* Tamaño de las columnas */
    gap: 10px;
    /* Espacio entre elementos */
    margin-top: 20px;
    /* Espacio superior para separación de la galería principal */
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    /* 5 imágenes por fila */
    text-align: center;
    /* Centra las miniaturas en la fila */
    padding: 10px;
    /* Agrega padding al segundo conjunto de imágenes */
    padding-right: 10%;
    padding-left: 10%;
}

.grid-item {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: transparent;
    /* Fondo de los elementos */
    border: 1px solid transparent;
    /* Borde de los elementos */
    padding: 10px;
    cursor: pointer;
}

.grid-image {
    max-width: 100%;
    max-height: 100%;
}

/* Estilos para la vista en grande de la imagen */
.large-image-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.9);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.large-image-modal img {
    max-width: 80%;
    max-height: 80%;
    cursor: pointer;
}



@media (max-width: 2560px) {

    .grid-gallery {
        grid-template-columns: repeat(7, 1fr);
    }
}

@media (max-width: 2000px) {

    .grid-gallery {
        grid-template-columns: repeat(6, 1fr);
    }
}

@media (max-width: 1440px) {
    .grid-gallery {
        grid-template-columns: repeat(5, 1fr);
    }
}

@media (max-width: 1024px) {
    .grid-gallery {
        grid-template-columns: repeat(4, 1fr);
    }
}

@media (max-width: 768px) {
    .grid-gallery {
        grid-template-columns: repeat(4, 1fr);
    }
}

@media (max-width: 550px) {
    .grid-gallery {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (max-width: 425px) {
    .grid-gallery {
        grid-template-columns: repeat(1, 1fr);
        padding-right: 3%;
        padding-left: 3%;
    }
}

@media (max-width: 375px) {
    .grid-gallery {
        grid-template-columns: repeat(1, 1fr);
        padding-right: 3%;
        padding-left: 3%;
        padding: 0px;
        margin-top: 10px;
    }
}

@media (max-width: 320px) {
    .grid-gallery {
        grid-template-columns: repeat(1, 1fr);
        padding-right: 3%;
        padding-left: 3%;
        padding: 0px;
        margin-top: 10px;
    }
}
</style>

