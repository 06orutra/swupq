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
        this.cargarTexto();
    },

    methods: {
        cargarTexto() {
            axios.post("/textoData").then((response) => {
                console.log(response.data);
                this.banner = response.data;
            }).catch((error) => {
                console.log(error);
                if (error.response && error.response.status === 400) {
                            this.errors.setMessages(error.response.data.messages);
                        }
            });
        },
        handleFileUpload(event) {
            this.foto = event.target.files[0];
        },
        handleFileUploadEdit(event) {
            this.datosArreglo.foto = event.target.files[0];
        },

    },
    data() {
        return {
            banner: [],
            nombre: null,
            link: null,
            foto: null,
            uploadedFile: null,
            mensajeSinDatos: "No hay datos disponibles",
            dialogTable: false,
            editarDialog: false,
            eliminarDialog: false,
            photoInput: null,

        };
    },

};
</script>

<template>
    <div>
        <Card v-for="datosTexto in banner" style="width: 40em; margin-bottom: 40px;">
            <template #title> {{ datosTexto.titulo }} </template>
            <template #subtitle> {{ datosTexto.contenido }} </template>
            
            <template #empty>
                <div class="flex justify-center align-middle text-xl">
                    <h2>No se encontraron datos</h2>
                </div>
            </template>
        </Card>

    </div>

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