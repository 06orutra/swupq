<script>
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import 'swiper/css/pagination';
import 'swiper/css/navigation';
import { Autoplay, Pagination, Navigation } from 'swiper/modules';
import axios from 'axios'; // Asegúrese de que axios esté correctamente importado

export default {
    components: {
        Swiper,
        SwiperSlide,
    },
    mounted() {
        this.cargarValor().then(() => {
            this.$nextTick(this.inicializarInteracciones);
        });
    },
    methods: {
        openModal(title, content) {
            this.modalTitle = title;
            this.modalContent = content;
            this.showModal = true;
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
            return axios.post('/desarrolloHumnDesarrollo/bannerData').then((response) => {
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

                loader.addEventListener('click', () => {
                    this.openModal(title[loader.dataset.index], contents[loader.dataset.index]);
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
        };
    },
};
</script>

<template>
    <!-- Valores (modal) -->
    <section>

        <div class="circle-container">
            <div v-for="item in valor" :key="item.id">
                <div class="circle-wrapper">
                    <div class="background-image circle" data-index="0" @click="openModal(item.nombre, item.link)">
                        <img :src="'/storage/' + item.imagen" alt="Valor Image" class="circle-img" />
                        <div class="loader" id="loader2">

                        </div>
                    </div>
                </div>
                <div class="titulo">
                    {{ item.nombre }}
                </div>
            </div>
        </div>

        <div class="modal" :class="{ 'active': showModal }">
            <div class="modal-content">
                <div class="modal-body">
                    <h3 style="margin-bottom: 2em; text-align: center; color:#fff"><b>{{ modalTitle }}</b></h3>
                    <p>{{ modalContent }}</p>
                </div>
                <div class="modal-button" style="margin-top: 30px;">
                    <button type="button" class="btn btn-primary" @click="closeModal"
                        style="border-radius: 0">CERRAR</button>
                </div>
            </div>
        </div>
        <hr>
        <br><br><br><br>
    </section>
</template>
   

<style scoped>
.titulo {
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    color: #000000;
    margin-top: 10px;
    margin-bottom: 10px;
}

.circle-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    gap: 20px;
    /* Espacio entre los elementos */
    padding: 0 20px;
    /* Añadir un poco de padding al contenedor para evitar que los círculos estén demasiado cerca del borde de la pantalla */
    transition: background-color 2s ease;
}


.circle-wrapper {
    flex: 1;
    max-width: 300px;
    /* Ancho máximo de cada círculo */
    animation-name: oscurecerFondo;
    animation-duration: 5s;
    animation-timing-function: linear;
    animation-fill-mode: forwards;
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
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.87);
    z-index: 999;
    justify-content: flex-start;
    align-items: center;
    flex-direction: column;
}

.modal-content {
    max-width: 700px;
    max-height: 700px;
    background: rgba(8, 22, 47, 0.9);
    border-radius: 10px;
    padding: 25px;
    text-align: justify;
    font-family: 'Open Sans', Arial, Helvetica, sans-serif;
}

.modal-body {
    font-family: 'Open Sans', Arial, Helvetica, sans-serif;
    color: #fff;
    font-size: 22px;
    max-height: 300px;
    overflow-y: auto;
}

.modal-button {
    text-align: center;
}

.modal-button button {
    background-color: #8C2437;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    font-size: 16px;
}

.modal-button button:hover {
    background-color: #6B1B2D;
}

.modal.active {
    display: flex;
}

.loader {
    width: 300px;
    height: 300px;
    border-radius: 50%;
    position: relative;
    overflow: hidden;
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

.circle {
    width: 100px;
    height: 100px;
    background-color: #f3f3f3;
}

.text {
    width: 100%;
    height: 100%;
    background-color: rgb(255, 0, 0);
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


@media (max-width: 768px) and (min-width: 426px) {

    /*  Estilo para dividir los círculos en dos grupos  */

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
}
</style>



