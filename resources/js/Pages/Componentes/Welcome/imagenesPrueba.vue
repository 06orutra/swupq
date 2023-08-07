<script>
import DataTable from "primevue/datatable";
import axios from "axios";



export default {
    components: {
        DataTable,
    },
    mounted() {
        this.cargarBanner();
    },
    methods: {
        cargarBanner() {
            axios.post("/bannerData").then((response) => {
                this.banner = response.data;
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
    <div>
        <Card v-for="datosCard in banner" style="width: 40em; margin-bottom: 40px;">
            <template #header>
                <img :src="'/storage/' + datosCard.imagen" alt="Card Image" class="imagen-resolucion" />
            </template>
            <template #empty>
                <div class="flex justify-center align-middle text-xl">
                    <h2>No se encontraron datos</h2>
                </div>
            </template>
        </Card>

    </div>

    <Toast />
</template>

<style lang="scss" scoped>
.imagen-resolucion {
    width: 500px;
    /* Establece el ancho deseado */
    height: auto;
    /* La altura se ajustará automáticamente para mantener la proporción */
    //margin para que la imagen no este pegada al borde
    margin: 15px;
}
</style>