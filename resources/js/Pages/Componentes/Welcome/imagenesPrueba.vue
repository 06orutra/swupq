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
    },
    mounted() {
        this.cargarBanner();
    },
    methods: {
        cargarBanner() {
            axios.post("/bannerData").then((response) => {
                console.log(response.data);
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
            <template #title> {{ datosCard.nombre }} </template>
            <template #subtitle> {{ datosCard.link }} </template>
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