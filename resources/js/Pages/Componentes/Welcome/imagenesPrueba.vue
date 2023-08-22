<script>
import DataTable from "primevue/datatable";
import InputText from "primevue/inputtext";
import Column from "primevue/column";
import Button from "primevue/button";
import Card from 'primevue/card';
import Dialog from 'primevue/dialog';
import FileUpload from 'primevue/fileupload';
import Paginator from 'primevue/paginator';
import axios from "axios";
import Toast from "primevue/toast";
import Carousel from "@/Components/Carousel.vue";
import Slide from "@/Components/Slide.vue";


export default {
    components: {
        DataTable,
        Column,
        InputText,
        Button,
        Card,
        Dialog,
        FileUpload,
        Toast,
        Paginator,
        Carousel,
        Slide,
    },
    mounted() {
        this.cargarBanner();
    },

    methods: {
        assignConsecutiveIDs() {
            this.banner.forEach((image, index) => {
                image.id = index + 1;
            });
        },

        cargarBanner() {
            axios.post("/bannerData").then((response) => {
                console.log(response.data);
                this.banner = response.data;
                this.assignConsecutiveIDs();
            }).catch((error) => {
                console.log(error);
            });
        },
    },
    data() {
        return {
            banner: [],
        };
    },
};
</script>

<template>
    <!--     <div v-for="datosCard in banner" :key="datosCard">
        <button>{{ datosCard.id }}</button>
    </div> -->
    <!-- Codigo de chucho -->
    <!-- <div>
        <Galleria :value="banner" style="width: 40em; margin-bottom: 40px;">
            <template v-for="datosCard in salida">
                <img :src="'/storage/' + datosCard.imagen" alt="Card Image" class="imagen-resolucion" />
            </template>
                <template #title>{{ datosCard.nombre }}</template>
                <template #subtitle>{{ datosCard.link }}</template>
            <template #empty>
                <div class="flex justify-center align-middle text-xl">
                    <h2>No se encontraron datos</h2>
                </div>
            </template>
        </Galleria>
        <Toast />
    </div>  -->

    <!-- Carrusel dinamico -->
    <Carousel class="carousel" v-slot="{ currentSlide }">
        <Slide v-for="datosCard in banner" :key="datosCard">
            <div v-show="currentSlide === datosCard.id" class="slide-info">
                <img :src="'/storage/' + datosCard.imagen" alt="" />
            </div>
        </Slide>
    </Carousel>
</template>

<style lang="scss" scoped>
.imagen-resolucion {
    width: 500px;
    height: auto;
    margin: 15px;
}

.carousel {
    position: relative;
    max-height: 90vh;
    height: 90vh;

    .slide-info {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        max-height: 100%;
        height: 100%;

        img {
            width: 100%;
            max-height: 100%;
            object-fit: cover;
        }
    }
}
</style>