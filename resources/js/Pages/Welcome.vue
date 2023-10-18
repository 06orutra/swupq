<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AppEstructure from '@/Layouts/mainEstructure/AppEstructure.vue';
import TourCardenal from '@/Layouts/homeComponents/TourCardenal.vue';
import SplitterVue from '@/Layouts/homeComponents/Splitter.vue';
import carruselSecundario from './Componentes/Welcome/carruselSecundario.vue';
import CarrierBanner from '@/Pages/Componentes/CarrierBanner.vue';

</script>

<template>
    <Head title="Welcome" />
    
    <AppEstructure :controllerName="'/bannerData'">          
        <!-- mandamos a llamar en la principal  -->

        <CarrierBanner />
        <carruselSecundario />
        <TourCardenal />
        <SplitterVue />

    </AppEstructure>


</template>

<style></style>

<!-- <script>

export default{
    mounted() {
        this.cargarTexto();
    },
    methods: {
        cargarTexto() {
            axios.post('/modeduCiclo/bannerData').then((response) => {
                this.texto = response.data;
            }).catch((error) => {
                console.log(error);
            });
        },
    },
    data(){
        return{
            texto: [],
        }
    }
}

</script>

<template>

    <div class="cards-container">
        <Card v-for="datosTexto in texto" style="width: 40em; margin-bottom: 40px;">
            <template #title> {{ datosTexto.titulo }} </template>
            <template #subtitle> {{ datosTexto.contenido }} </template>
            
            <template #empty>
                <div class="flex justify-center align-middle text-xl">
                    <h2>No se encontraron datos</h2>
                </div>
            </template>
        </Card>
    </div>

    <h1>{{ texto }}</h1>

</template> -->