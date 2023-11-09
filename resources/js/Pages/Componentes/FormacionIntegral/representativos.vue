<script>
import AppEstructure from '@/Layouts/mainEstructure/AppEstructure.vue';

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
        };
    },
}

</script>


 
<template>
    <AppEstructure :controllerName="'/Representativosprin/bannerData'">
        {{ deporte }}
        <div v-for="depo in deporte">
        {{ depo.nombre }}
        </div>
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

