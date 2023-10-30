
<script>
import AppEstructure from '@/Layouts/mainEstructure/AppEstructure.vue';
import bolitas_modal from './bolitas_modal.vue';


export default {
    components: {
        AppEstructure,
        bolitas_modal,
    },
    mounted() {
        this.cargarTexto();
    },
    methods: {
        cargarTexto() {
            axios.post('/desarrolloHumnTexto/bannerData').then((response) => {
                this.texto = response.data;
            }).catch((error) => {
                console.log(error);
            });
        },
    },
    data() {
        return {
            texto: [],
        };
    },
}

</script>

<template>
    <AppEstructure :controllerName="'/desarrolloHumnPrincs/bannerData'">
        <div class="h-3rem" style="background-color:rgb(140, 36, 55);"></div>
        <div class="panel">
            <div class="texto px-8" v-for="text in texto">
                {{ text.contenido }}
            </div>
        </div>
        <div class="my-8">
            <bolitas_modal />
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
