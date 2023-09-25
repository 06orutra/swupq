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
import OpcionesCarrusel from "@/Pages/Componentes/Home/opcionesCarrusel.vue";

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
        OpcionesCarrusel,
    },
    props: {
        loadDataUrl: {
            type: String,
            required: true
        },
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

        updateCarouselSettings(settings) {
            this.navigation = settings.navigation;
            this.pagination = settings.pagination;
            this.startAutoPlay = settings.startAutoPlay;
            this.timeout = settings.timeout;
        },

        cargarBanner() {
            axios.post(this.loadDataUrl).then((response) => {
                this.banner = response.data;
                this.assignConsecutiveIDs();
                this.isBannerLoaded = true;
            }).catch((error) => {
                console.log(error);
            });
        },
    },
    data() {
        return {
            banner: [],
            isBannerLoaded: false,
            navigation: localStorage.getItem('navigation') === 'true' || false,
            pagination: localStorage.getItem('pagination') === 'true' || false,
            startAutoPlay: localStorage.getItem('startAutoPlay') === 'true' || false,
            timeout: Number(localStorage.getItem('timeout')) || 5000
        };
    },
};
</script>

<template>
    <!-- Carrusel dinamico -->
    <Carousel v-if="isBannerLoaded" :navigation="navigation" :pagination="pagination" :startAutoPlay="startAutoPlay" :timeout="timeout" :slides="banner"
        class="carousel" v-slot="{ currentSlide }">
        <Slide v-for="datosCard in banner" :key="datosCard">
            <div v-show="currentSlide === datosCard.id" class="slide-info">
                <img :src="'/storage/' + datosCard.imagen" alt="" />
            </div>
        </Slide>
    </Carousel>
</template>

<style lang="scss" scoped>
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
            height: 100%;
        }
    }

    @media (max-width: 399px) {
        height: 30vh;
    }

    @media (min-width: 400px) and (max-width: 499px) {
        height: 40vh;
    }

    @media (min-width: 500px) and (max-width: 599px) {
        height: 50vh;
    }

    @media (min-width: 600px) and (max-width: 699px) {
        height: 60vh;
    }

    @media (min-width: 700px) and (max-width: 799px) {
        height: 70vh;
    }

    @media (min-width: 800px) and (max-width: 899px) {
        height: 80vh;
    }

    @media (min-width: 900px) and (max-width: 999px) {
        height: 90vh;
    }

    @media (min-width: 1000px) {
        height: 100vh;
    }

}
</style>