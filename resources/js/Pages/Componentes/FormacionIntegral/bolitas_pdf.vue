<script>
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import 'swiper/css/pagination';
import 'swiper/css/navigation';
import AppEstructure from '@/Layouts/mainEstructure/AppEstructure.vue';
import { Autoplay, Pagination, Navigation } from 'swiper/modules';
import axios from 'axios'; // Asegúrese de que axios esté correctamente importado

export default {
    components: {
        AppEstructure,
        Swiper,
        SwiperSlide,
    },
    mounted() {
        this.cargarValor().then(() => {
            this.$nextTick(this.inicializarInteracciones);
        });
    },
    methods: {
        openPDFModal(pdf, name) {
            this.currentPDF = '/storage/pdfs/' + pdf;
            this.currentPDFName = name;
            this.showPDFModal = true;
        },
        closePDFModal() {
            this.showPDFModal = false;
        },
        closeModal() {
            this.showModal = false;
        },
        toggleAcordeon(index) {
            this.acordeones.forEach((acordeon, i) => {
                if (i !== index) {
                    acordeon.open = false;
                }
            });
            this.acordeones[index].open = !this.acordeones[index].open;
        },
        cargarValor() {
            return axios.post('/pdfPrueba/bannerData').then((response) => {
                this.valor = response.data;
            }).catch((error) => {
                console.log(error);
            });
        },
        inicializarInteracciones() {
            const loaders = document.querySelectorAll('.loader');
            loaders.forEach(loader => {
                const text = loader.querySelector('.text');

                loader.addEventListener('mouseenter', () => {
                    loader.classList.add('active');
                    text.style.opacity = '0';
                });

                loader.addEventListener('mouseleave', () => {
                    loader.classList.remove('active');
                    text.style.opacity = '1';
                });

            });

            const acordeones = document.querySelectorAll('.acordion-item');
            acordeones.forEach(acordeon => {
                acordeon.addEventListener('click', () => {
                    acordeones.forEach(element => {
                        element.classList.remove('active');
                    });
                    acordeon.classList.toggle('active');
                });
            });
        },
    },
    setup() {
        return {
            modules: [Autoplay, Pagination, Navigation],
        };
    },
    data() {
        return {
            valor: [],
            modalTitle: '',
            modalContent: '',
            showModal: false,
            acordeones: [],

            showPDFModal: false,
            currentPDF: '',
            currentPDFName: '',
            valor: []  // Tu array de datos aquí
        };
    },
};
</script>

<template>
    <div>
        <!-- Otros elementos aquí -->
        <div class="circle-container">
            <div v-for="item in valor" :key="item.id" class="circle-wrapper">
                <div class="background-image circle" @click="openPDFModal(item.pdf, item.nombre)">
                    <img :src="'/storage/' + item.imagen" alt="Valor Image" class="circle-img" />
                    <div class="loader" id="loader2">
                        <div class="text" id="text2">{{ item.nombre }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal para previsualizar el PDF -->
        <div v-if="showPDFModal" class="pdf-modal">
            <div class="pdf-container">
                <button @click="closePDFModal" class="close-x">&#10005;</button>
                <div class="pdf-header" :style="{ backgroundColor: '#8c2437' }">
                    {{ currentPDFName }}
                </div>
                <embed :src="currentPDF" type="application/pdf" width="100%" height="500px">
                <div class="pdf-buttons">
                    <button @click="closePDFModal" class="close-button">Cerrar</button>
                    <a :href="currentPDF" download :download="currentPDFName" class="download-button">
                        Descargar
                    </a>
                </div>
            </div>
        </div>


    </div>
    <hr>
</template>
   

<style scoped>
.pdf-iframe {
    width: 100%;
    height: 100%;
    border: none;
}

.close-x {
    position: absolute;
    top: 5px;
    right: 15px;
    background-color: transparent;
    border: none;
    font-size: 24px;
    /* Tamaño de fuente más grande */
    color: black;
    /* Un color que coincida con el diseño */
    cursor: pointer;
    transition: color 0.3s ease;
    /* Efecto de transición para el color al hacer hover */
}

.close-x:hover {
    color: #ffffff;
    /* Cambia el color al hacer hover */
}

.pdf-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 10000;
}

.pdf-container {
    position: relative;
    width: 75%;
    height: 80%;
    background-color: white;
    border-radius: 10px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    /* Asegura que los elementos se apilen verticalmente */
}


.pdf-header {
    height: 40px;
    line-height: 40px;
    text-align: center;
    color: white;
    font-size: medium;
    font-weight: bold;
}


embed {
    width: 100%;
    height: calc(100vh - 80px);
    /* Ajusta la altura considerando el espacio para los botones y el encabezado */
}

.pdf-buttons {
    display: flex;
    justify-content: space-between;
    padding: 10px;
    margin-top: 10px;
    /* Añade margen superior */
    margin-bottom: 10px;
    /* Añade margen inferior */
}

.close-button {
    background-color: grey;
    /* Color de fondo gris */
    color: white;
    /* Texto de color blanco */
    border: none;
    /* Elimina el borde */
    padding: 10px 20px;
    /* Añade padding */
    cursor: pointer;
    /* Estilo del cursor */
    border-radius: 5px;
    /* Esquinas redondeadas */
}

.download-button {
    background-color: #8c2437;
    /* Color de fondo específico */
    color: white;
    /* Texto de color blanco */
    text-decoration: none;
    /* Elimina la decoración del texto */
    padding: 10px 20px;
    /* Añade padding */
    border-radius: 5px;
    /* Esquinas redondeadas */
}

.circle-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    gap: 20px;
    /* Espacio entre los elementos */
    padding: 0 20px;
    /* Añadir un poco de padding al contenedor para evitar que los círculos estén demasiado cerca del borde de la pantalla */
}

.circle-wrapper {
    flex: 1;
    max-width: 300px;
    /* Ancho máximo de cada círculo */
}

.background-image.circle {
    position: relative;
    width: 100%;
    /* Asegurarse de que cada círculo tenga un ancho responsivo */
    height: 0;
    padding-bottom: 100%;
    /* Mantener la relación de aspecto 1:1 */
    border-radius: 50%;
    overflow: hidden;
}

.circle-img {
    position: absolute;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: 1;
    /* Asegura que la imagen esté debajo del texto y del loader */
}

/* Círculos de valores */


.loader {
    width: 300px;
    height: 300px;
    border-radius: 50%;
    position: relative;
    overflow: hidden;
    transition: transform 1.9s ease;
    background-color: transparent;
    z-index: 2;
    /* Asegura que el loader esté sobre la imagen */
}

#loader1 {
    border: 13px solid #08162fe6;
    border-top: 13px solid #08162fe6;
    border-right: 13px solid #f3f3f3;
    border-bottom: 13px solid #f3f3f3;
    transition: transform 1.9s ease;
    z-index: 2;
    /* Asegura que el loader esté sobre la imagen */
}

#loader2 {
    border: 13px solid #000000;
    border-top: 13px solid #000000;
    border-right: 13px solid #f3f3f3;
    border-bottom: 13px solid #f3f3f3;
    transition: transform 1.9s ease;
    z-index: 2;
    /* Asegura que el loader esté sobre la imagen */
}

.vertical-column {
    display: flex;
    flex-direction: row;
    align-items: center;
    margin-bottom: 40px;
    margin-right: 30px;
    justify-content: space-around;
    margin-top: 30px;
}

.circle {
    width: 100px;
    height: 100px;
    background-color: #f3f3f3;
}

.text {
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.673);
    color: #fff;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
    line-height: 2;
    position: absolute;
    top: 0;
    left: 0;
    background-attachment: fixed;
    pointer-events: none;
    transition: opacity 0.2s ease;
    font-size: 22px;
    font-weight: bold;
}

#text1 {
    background-color: rgba(8, 22, 47, 0.8);
}

.background-image {
    width: 300px;
    height: 300px;
    border-radius: 50%;
    overflow: hidden;
    position: relative;
    background-repeat: no-repeat;
    background-size: cover;
}

.background-image::before {
    content: "";
    display: block;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    position: absolute;
}

.loader.active {
    transform: rotate(360deg) !important;
}

.loader:hover .text {
    opacity: 0;
}

/* Caja del acordeon */
.toggle-acordion {
    width: 100%;
    max-width: 800px;
    margin: auto;
    margin-top: 15px;
}

.toggle-acordion h2 {
    text-align: center;
    font-size: 40px;
    margin-bottom: 35px;
}



@media (max-width: 425px) {
    .vertical-column {
        flex-direction: column;
        /* Cambiar a disposición vertical */
        margin-right: 0;
        /* Eliminar el margen derecho */
        margin-bottom: 20px;
        /* Ajustar el margen inferior en dispositivos más pequeños */
    }

    .circule {
        margin-top: 30px;
    }

    .vertical-column {
        /* Cambia la disposición a vertical */
        margin-right: 0;
        /* Elimina el margen derecho */
        margin-bottom: 20px;
        /* Ajusta el margen inferior en dispositivos más pequeños */
        display: initial;
    }

    .img_1 {
        max-width: 100%;
        /* Ajustar el tamaño máximo de la imagen al 100% del contenedor */
        height: auto;
        /* Permite que la altura se ajuste automáticamente según el ancho */
        margin: 0 auto;
        /* Centrar horizontalmente la imagen */
        z-index: 1;
    }

    .toggle-acordion {
        position: relative;
        z-index: 0;
    }
}

@media (max-width: 768px) and (min-width: 426px) {

    /*  Estilo para dividir los círculos en dos grupos  */
    .vertical-column {
        flex-direction: row;
        justify-content: space-between;
    }

    .circle-container {
        display: flex;
        flex-wrap: wrap;
        /* Permite que los elementos se envuelvan en dos filas */
        justify-content: space-between;

        gap: 20px;
        /* Espacio entre los elementos */

    }

    .circle {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        margin-right: 0;
    }
}

@media (max-width: 1024px) and (min-width: 768px) {

    /*  Estilo para dividir los círculos en dos grupos  */
    .vertical-column {
        flex-direction: row;
        justify-content: space-between;
    }

    .circle-container {
        display: flex;
        justify-content: space-between;
        /* Espacio entre los círculos */
    }

    .circle {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        margin-right: 0;
    }

    .mySwiper {
        width: 100%;
        /* Tamaño del carrusel para pantallas grandes */
        margin: 0 auto;
        /* Centra el carrusel en la pantalla */
    }
}

/* display:initial */
</style>



