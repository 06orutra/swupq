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
        handleFileUpload(event) {
            this.foto = event.target.files[0];
        },
        handleFileUploadEdit(event) {
            this.datosArreglo.foto = event.target.files[0];
        },

        registrarBanner() {
            this.submitted = true;
            //validar si hay campos vacios
            if (this.nombre == null || this.link == null) {
                // si alguno de los campos esta vacio, no enviar el formulario y mostrar un mensaje de error
                this.$toast.add({
                    severity: "error",
                    summary: "Error",
                    detail: "Todos los campos son obligatorios",
                    life: 3000,
                });
                //cerrar el dialogo
                return false;
            }

            //validar que la foto no sea un archivo vacio
            if (this.foto == null) {
                // si alguno de los campos esta vacio, no enviar el formulario y mostrar un mensaje de error
                this.$toast.add({
                    severity: "error",
                    summary: "Error",
                    detail: "Debe seleccionar una foto",
                    life: 3000,
                });
                return false;
            }


            const formData = new FormData();
            formData.append('nombre', this.nombre);
            formData.append('link', this.link);
            formData.append('foto', this.foto);

            axios.post('/registrarBanner',
                formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then((response) => {
                this.cargarBanner();
                this.nombre = null;
                this.link = null;
                this.foto = null;
                this.dialogTable = false;
                this.$toast.add({
                    severity: "success",
                    summary: "Exito",
                    detail: "Registro exitoso",
                    life: 3000,
                });
            }).catch((error) => {
                console.log(error);
            });
        },
        editarBanner() {
            this.submitted = true;
            //validar si hay campos vacios
            if (this.datosArreglo.nombre == null || this.datosArreglo.link == null) {
                // si alguno de los campos esta vacio, no enviar el formulario y mostrar un mensaje de error
                this.$toast.add({
                    severity: "error",
                    summary: "Error",
                    detail: "Todos los campos son obligatorios",
                    life: 3000,
                });
                //cerrar el dialogo
                return false;
            }

            //validar que la foto no sea un archivo vacio
            if (this.datosArreglo.foto == null) {
                // si alguno de los campos esta vacio, no enviar el formulario y mostrar un mensaje de error
                this.$toast.add({
                    severity: "error",
                    summary: "Error",
                    detail: "Debe seleccionar una foto",
                    life: 3000,
                });
                return false;
            }

            const formData = new FormData();
            formData.append('id', this.datosArreglo.id);
            formData.append('nombre', this.datosArreglo.nombre);
            formData.append('link', this.datosArreglo.link);
            formData.append('foto', this.datosArreglo.foto);

            axios.post('/editarBanner',
                formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then((response) => {
                this.cargarBanner();
                this.datosArreglo = {};
                this.editarDialog = false;
                this.$toast.add({
                    severity: "success",
                    summary: "Exito",
                    detail: "Edicion exitosa",
                    life: 3000,
                });
            }).catch((error) => {
                console.log(error);
            });

        },
        editarSelect(datosArreglo) {
            this.datosArreglo = { ...datosArreglo }; // esto es para que se muestre los datos del datosArregloo en el formulario
            this.editarDialog = true;
        },
        confirmarEliminar(datosArreglo) {
            this.datosArreglo = datosArreglo;
            this.eliminarDialog = true;
        },
        eliminarBanner() {

            //tomar el id de la fila seleccionada
            const data = {
                id: this.datosArreglo.id,
            };


            axios.post('/eliminarBanner', data).then((response) => {
                this.cargarBanner();
                this.eliminarDialog = false;
                this.datosArreglo = {};
                this.$toast.add({
                    severity: "success",
                    summary: "Exito",
                    detail: "Eliminacion exitosa",
                    life: 3000,
                });
            }).catch((error) => {
                console.log(error);
            });
        },
        openRegistro() {
            this.datosArreglo = {};
            this.submitted = false;
            this.dialogTable = true;
        },
        selectNewPhoto() {
            this.$refs.photoInput.click();
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
    <Toolbar class="mb-4">
        <template #start>
            <Button label="Nuevo Registro" icon="pi pi-plus" class="p-button-success !mr-2" @click="openRegistro" />

        </template>
    </Toolbar>

    <div>
        <Card v-for="datosCard in banner" style="width: 40em; margin-bottom: 40px;">
            <template #header>
                <img :src="'/storage/' + datosCard.imagen" alt="Card Image" class="imagen-resolucion" />
            </template>
            <template #title> {{ datosCard.nombre }} </template>
            <template #subtitle> {{ datosCard.link }} </template>
            <template #footer>
                <Button icon="pi pi-pencil" class="p-button p-button-warning !mr-6" @click="editarSelect(datosCard)" />
                <Button icon="pi pi-trash" class="p-button p-button-danger" @click="confirmarEliminar(datosCard)" />
            </template>
            <template #empty>
                <div class="flex justify-center align-middle text-xl">
                    <h2>No se encontraron datos</h2>
                </div>
            </template>
        </Card>

    </div>

    <Toast />
    <Dialog v-model:visible="dialogTable" :breakpoits="{ '960px': '75vw', '640px': '85vw' }" :style="{ width: '25vw' }"
        header="Nuevo Registro" :modal="true" class="p-fluid">
        <div class="field">
            <form @submit.prevent="registrarBanner">
                <!-- select con opciones -->

                <div class="field col-12 md:col-12">
                    <label for="minmax">Nombre</label>
                    <InputText inputId="minmax" v-model="nombre" :min="0" :max="10000" :showButtons="true" />
                </div>

                <div class="field col-12 md:col-12">
                    <label for="minmax">Link</label>
                    <InputText inputId="minmax" v-model="link" :min="0" :max="10000" :showButtons="true" />
                </div>

                <div class="field col-12 md:col-3">
                    <button :type="type" @click.prevent="selectNewPhoto"
                        class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition">
                        Seleccione una nueva foto
                    </button>
                    <input ref="photoInput" type="file" class="hidden" @change="handleFileUpload">

                </div>

                <Button type="submit" id="btnRegisrar"
                    class="flex items-center justify-center space-x-2 rounded-md border-2 border-blue-500 px-4 py-2 font-medium text-blue-600 transition hover:bg-blue-500 hover:text-white">
                    <span> Registrar </span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6">
                            <path fill-rule="evenodd"
                                d="M16.72 7.72a.75.75 0 011.06 0l3.75 3.75a.75.75 0 010 1.06l-3.75 3.75a.75.75 0 11-1.06-1.06l2.47-2.47H3a.75.75 0 010-1.5h16.19l-2.47-2.47a.75.75 0 010-1.06z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </Button>
            </form>
        </div>
    </Dialog>

    <Dialog v-model:visible="editarDialog" :breakpoits="{ '960px': '75vw', '640px': '85vw' }" :style="{ width: '25vw' }"
        header="Nuevo Registro" :modal="true" class="p-fluid">
        <div class="field">
            <form @submit.prevent="editarBanner">
                <!-- select con opciones -->
                <InputText id="id" v-model.trim="datosArreglo.id" hidden />

                <div class="field col-12 md:col-12">
                    <label for="minmax">Nombre</label>
                    <InputText inputId="minmax" v-model="datosArreglo.nombre" :min="0" :max="10000" :showButtons="true" />
                </div>

                <div class="field col-12 md:col-12">
                    <label for="minmax">Link</label>
                    <InputText inputId="minmax" v-model="datosArreglo.link" :min="0" :max="10000" :showButtons="true" />
                </div>

                <div class="field col-12 md:col-12">
                    <button :type="type" @click.prevent="selectNewPhoto"
                        class="inline-flex items-center px-4 py-2 bg-white border border-gray-200 rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest shadow-sm hover:text-gray-300 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition">
                        Seleccione una nueva foto
                    </button>
                    <input ref="photoInput" type="file" class="hidden" @change="handleFileUploadEdit">

                </div>

                <Button type="submit" id="btnRegisrar"
                    class="flex items-center justify-center space-x-2 rounded-md border-2 border-blue-500 px-4 py-2 font-medium text-blue-600 transition hover:bg-blue-500 hover:text-white">
                    <span> Registrar </span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6">
                            <path fill-rule="evenodd"
                                d="M16.72 7.72a.75.75 0 011.06 0l3.75 3.75a.75.75 0 010 1.06l-3.75 3.75a.75.75 0 11-1.06-1.06l2.47-2.47H3a.75.75 0 010-1.5h16.19l-2.47-2.47a.75.75 0 010-1.06z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </Button>
            </form>
        </div>
    </Dialog>
    <Dialog v-model:visible="eliminarDialog" :style="{ width: '450px' }" header="Confirmar" :modal="true">
        <div class="confirmation-content flex justify-center items-center">
            <i class="pi pi-exclamation-triangle mr-3" style="font-size: 2rem" />
            <span v-if="datosArreglo">¿Confirma eliminar el registro <b>{{ datosArreglo.nombre }}</b>?</span>
        </div>
        <template #footer>
            <Button label="No" icon="pi pi-times" class="p-button-text" @click="eliminarDialog = false" />
            <Button label="Si" icon="pi pi-check" class="p-button-text" @click="eliminarBanner" />
        </template>
    </Dialog>
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