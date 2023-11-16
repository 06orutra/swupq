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
        this.cargarCultura();
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
            displayCustom: false
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
}</style>

