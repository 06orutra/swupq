<template>
  <Toolbar class="mb-4">
    <template #start>
      <Button label="Nuevo Registro" icon="pi pi-plus" class="p-button-success !mr-2" @click="openRegistro" />
    </template>
    <template #end>
      <span class="p-input-icon-left">
        <i class="pi pi-search" />
        <InputText v-model="searchQuery" placeholder="Search" />
      </span>
    </template>
  </Toolbar>

  <!-- Cartas en admin -->
  <div class="cards-container">
    <Card v-for="datosTexto in filteredBanner" style="width: 40em; margin-bottom: 40px;">
      <template #subtitle> Link: {{ datosTexto.link }} </template>
      <template #footer>
        <Button icon="pi pi-pencil" class="p-button p-button-warning !mr-6" @click="editarSelect(datosTexto)" />
        <Button icon="pi pi-trash" class="p-button p-button-danger" @click="confirmarEliminar(datosTexto)" />
      </template>
      <template #empty>
        <div class="flex justify-center align-middle text-xl">
          <h2>No se encontraron datos</h2>
        </div>
      </template>
    </Card>
  </div>

  <Toast />
  <Dialog v-model:visible="dialogTable" :breakpoints="{ '960px': '75vw', '640px': '85vw' }" :style="{ width: '25vw' }"
    header="Nuevo Registro" :modal="true" class="p-fluid">
    <div class="field">
      <form @submit.prevent="registrarTexto">
        <div class="field col-12 md:col-12">
          <label for="minmax">Link</label>
          <InputText inputId="minmax" v-model="link" :min="0" :max="10000" :showButtons="true" />
        </div>
        <Button type="submit" id="btnRegistrar"
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

  <Dialog v-model:visible="editarDialog" :breakpoints="{ '960px': '75vw', '640px': '85vw' }" :style="{ width: '25vw' }"
    header="Editar Registro" :modal="true" class="p-fluid">
    <div class="field">
      <form @submit.prevent="editarTexto">
        <InputText id="id" v-model.trim="datosArreglo.id" hidden />
        <div class="field col-12 md:col-12">
          <label for="minmax">Link</label>
          <InputText inputId="minmax" v-model="datosArreglo.link" :min="0" :max="10000" :showButtons="true" />
        </div>
        <Button type="submit" id="btnRegistrar"
          class="flex items-center justify-center space-x-2 rounded-md border-2 border-blue-500 px-4 py-2 font-medium text-blue-600 transition hover:bg-blue-500 hover:text-white">
          <span> Editar </span>
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
      <span v-if="datosArreglo">¿Confirma eliminar el registro <b>{{ datosArreglo.link }}</b>?</span>
    </div>
    <template #footer>
      <Button label="No" icon="pi pi-times" class="p-button-text" @click="eliminarDialog = false" />
      <Button label="Sí" icon="pi pi-check" class="p-button-text" @click="eliminarTexto" />
    </template>
  </Dialog>
</template>
  
<script>
export default {
  props: {
    loadDataUrl: {
      type: String,
      required: true
    },
    registerBannerUrl: {
      type: String,
      required: true
    },
    editBannerUrl: {
      type: String,
      required: true
    },
    deleteBannerUrl: {
      type: String,
      required: true
    }
  },
  computed: {
    filteredBanner() {
      if (!this.searchQuery) {
        return this.texto;
      }
      return this.texto.filter(item =>
        item.link.toLowerCase().includes(this.searchQuery.toLowerCase())
      );
    }
  },
  mounted() {
    this.cargarTexto();
  },
  methods: {
    cargarTexto() {
      axios.post(this.loadDataUrl).then((response) => {
        this.texto = response.data;
        // Verifica si ya existe un registro y establece registroExistente en consecuencia
        this.registroExistente = this.texto.length > 0;
      }).catch((error) => {
        console.log(error);
      });
    },
    registrarTexto() {
      this.submitted = true;
      if (this.link == null) {
        this.$toast.add({
          severity: "error",
          summary: "Error",
          detail: "Todos los campos son obligatorios",
          life: 3000
        });
        return false;
      }

      const formData = new FormData();
      formData.append('link', this.link);

      axios.post(this.registerBannerUrl, formData, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      }).then((response) => {
        this.cargarTexto();
        this.link = null;
        this.dialogTable = false;
        this.registroExistente = true;
        this.$toast.add({
          severity: "success",
          summary: "Éxito",
          detail: "Registro exitoso",
          life: 3000
        });
      }).catch((error) => {
        console.log(error);
      });
    },
    editarTexto() {
      this.submitted = true;
      if (this.datosArreglo.link == null) {
        this.$toast.add({
          severity: "error",
          summary: "Error",
          detail: "Todos los campos son obligatorios",
          life: 3000
        });
        return false;
      }

      const formData = new FormData();
      formData.append('id', this.datosArreglo.id);
      formData.append('link', this.datosArreglo.link);

      axios.post(this.editBannerUrl, formData, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      }).then((response) => {
        this.cargarTexto();
        this.datosArreglo = {};
        this.editarDialog = false;
        this.$toast.add({
          severity: "success",
          summary: "Éxito",
          detail: "Edición exitosa",
          life: 3000
        });
      }).catch((error) => {
        console.log(error);
      });
    },
    editarSelect(datosArreglo) {
      this.datosArreglo = { ...datosArreglo };
      this.editarDialog = true;
    },
    confirmarEliminar(datosArreglo) {
      this.datosArreglo = datosArreglo;
      this.eliminarDialog = true;
    },
    eliminarTexto() {
      const data = {
        id: this.datosArreglo.id
      };

      axios.post(this.deleteBannerUrl, data).then((response) => {
        this.cargarTexto();
        this.eliminarDialog = false;
        this.datosArreglo = {};
        this.registroExistente = false; // Restablecer para permitir otro registro
        this.$toast.add({
          severity: "success",
          summary: "Éxito",
          detail: "Eliminación exitosa",
          life: 3000
        });
      }).catch((error) => {
        console.log(error);
      });
    },
    openRegistro() {
      if (this.registroExistente) {
        this.$toast.add({
          severity: "error",
          summary: "Error",
          detail: "Ya existe un registro. Solo se permite un registro.",
          life: 3000
        });
      } else {
        this.datosArreglo = {};
        this.submitted = false;
        this.dialogTable = true;

        this.titulo = null;
        this.contenido = null;
      }
    }
  },
  data() {
    return {
      texto: [],
      link: null,
      contenido: null,
      searchQuery: '',
      mensajeSinDatos: "No hay datos disponibles",
      dialogTable: false,
      editarDialog: false,
      eliminarDialog: false,
      registroExistente: false
    };
  }
};
</script>
  
<style lang="scss" scoped>
.card-header {
  display: flex;
  justify-content: center;
  align-items: center;
}

.imagen-resolucion {
  width: 90%;
  height: width;
}

.cards-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
}

.card {
  margin: 10px;
  width: 30em;
  margin-bottom: 40px;
}
</style>
  