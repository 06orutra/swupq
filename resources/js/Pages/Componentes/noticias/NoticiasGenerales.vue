<script>
import AppEstructure from '@/Layouts/mainEstructure/AppEstructure.vue';
import noticias from './noticiasAdmin/noticias.vue';

export default {
    components: {
        AppEstructure,
        noticias,
    },
    mounted() {
        this.cargarBanner();
    },


    data() {
        return {
            banner: [],
            cardId: null,
        };
    },


    methods: {
        cargarBanner() {
            axios.post('/prensa').then((response) => {
                this.banner = response.data;
            }).catch((error) => {
                console.log(error);
            });
        },
        verDetalles(id, titulo) {
            window.location.href = "/prensa/" + titulo + "/" + id;
        }
    }
}
</script>
<template>
    <AppEstructure>
        <div class="mt-8 text-center">
            <h1>Prensa</h1>
        </div>

        <div class="cards-container">
            <Card v-for="datosCard in banner" :key="datosCard.id" @click="verDetalles(datosCard.id, datosCard.titulo)" class="card">
                <template #header class="card-header">
                    <img :src="'/storage/' + datosCard.imagen" alt="Card Image" class="imagen-resolucion" />
                </template>
                <template #title> <span style="color: black;">{{ datosCard.titulo }}</span> <span style="font-size: 70%;">{{
                    datosCard.estado ? "activo" : "inactivo" }}</span> </template>
                <template #subtitle>
                    <span style="">Seccion: </span>{{ datosCard.seccion.nombre }} <br>
                    {{ datosCard.contenido }} <br>

                </template>
                <template #empty>
                    <div class="flex justify-center align-middle text-xl">
                        <h2>No se encontraron datos</h2>
                    </div>
                </template>
            </Card>
        </div>
    </AppEstructure>
</template>

<style scoped>
.cards-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    /* Para dar un espacio uniforme entre los cards */
}

.imagen-resolucion {
    width: 90%;
    height: 200px;
}

.card-header {
    display: flex;
    justify-content: center;
    /* Centra la imagen horizontalmente */
    align-items: center;
    /* Centra la imagen verticalmente */
}

.card {

    /* Esto permite que cada card tome el espacio necesario y se expanda según el contenido */
    margin: 10px;
    /* Espacio alrededor de cada card */
    width: 60%;
    margin-bottom: 20px;

}
</style>