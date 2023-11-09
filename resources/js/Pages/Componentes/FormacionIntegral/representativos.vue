<script>
import AppEstructure from '@/Layouts/mainEstructure/AppEstructure.vue';
import Carousel from 'primevue/carousel';

export default {
    components: {
        AppEstructure,
    },
    mounted() {
        this.cargarTexto();
        this.cargarDeporte();
    },
    methods: {
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
    },
    data() {
        return {
            texto: [],
            deporte: [],
            responsiveOptions: [
                {
                    breakpoint: '1400px',
                    numVisible: 2,
                    numScroll: 1
                },
                {
                    breakpoint: '1199px',
                    numVisible: 3,
                    numScroll: 1
                },
                {
                    breakpoint: '767px',
                    numVisible: 2,
                    numScroll: 1
                },
                {
                    breakpoint: '575px',
                    numVisible: 1,
                    numScroll: 1
                }
            ]   
        };
    },
}

</script>


 
<template>
    <AppEstructure :controllerName="'/Representativosprin/bannerData'">
        {{ deporte }}
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
        <Carousel :value="deporte" :numVisible="3" :numScroll="1" :responsiveOptions="responsiveOptions" circular :autoplayInterval="3000">
            <template #item="slotProps">
                <div class="border-1 surface-border border-round m-2 text-center py-5 px-3">
                    <div class="mb-3">
                        <img :src="'/storage/' + slotProps.data.imagen" alt="Card Image" class="w-11 h-auto" />
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


    </AppEstructure>
</template>

<style scoped>
.panel {
    height: auto;
    color: white;
    background-color: rgb(21, 24, 48);
}

.texto {
    padding: 50px;
    text-align: center;
    font-size: 1.5rem;
}
</style>

