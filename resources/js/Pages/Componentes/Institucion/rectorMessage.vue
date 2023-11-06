<script>
import AppEstructure from '@/Layouts/mainEstructure/AppEstructure.vue';
import axios from 'axios';
export default {
  components: {
    AppEstructure
  },

  mounted() {
    this.cargarDatosRector();
    this.cargarMensaje();
    this.obtenerPDF();
  },

  data() {
    return {
      selectedOption: null,
      datos: [],
      //Mostrar PDF o no.
      mostrarPDF: false,
      //Objeto de los informes
      informes: [
      { ruta: "/storage/pdfs/1698694086_Formulario integrales.pdf", mostrar: false },
      ],
      mensaje: [],
      pdfLinks: {
        politica: "https://www.upq.mx/igualdad_laboral/assets/pol%c3%adtica-de-igualdad-laboral-y-no-discriminaci%c3%b3n..pdf",
      },
    };
  },

  methods: {
    mostrarInforme(index) {
    this.informes.forEach((informe, i) => {
      if (i !== index) {
        informe.mostrar = false; // Oculta los otros informes
      }
    });
    this.informes[index].mostrar = !this.informes[index].mostrar;
  },
    mostrarPDF() {
      this.informes.forEach(informe => informe.mostrar = false);
      this.mostrarPDF = !this.mostrarPDF;
    },
    handleSelection() {
      if (this.selectedOption) {
        const pdfPath = `ruta_a_tu_pdf/${this.selectedOption}.pdf`;
        window.open(pdfPath, '_blank');
      }
    },
    cargarDatosRector() {
      return axios.post('/rector/bannerData').then((response) => {
        this.datos = response.data;
      }).catch((error) => {
        console.log(error);
      });
    },
    cargarMensaje() {
      return axios.post('/rectorParrafo/bannerData').then((response) => {
        this.mensaje = response.data;
      }).catch((error) => {
        console.log(error);
      });
    },
    /* obtenerPDF() {
      return axios.post('/informe/bannerData').then((response) => {
        this.informes = response.data;
      }).catch((error) => {
        console.log(error);
      });
    }, */

  }
}


</script>

<template>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <div class="mx-auto">
    <div class="overflow-hidden shadow-6 sm:border-round-lg">

      <AppEstructure :controllerName="'/rectorBanner/bannerData'">

        <div class="flex items-center justify-center my-1">
          <img v-if="datos.length > 0" class="h-96 w-100 p-8" :src="'/storage/' + datos[0].imagen" alt="">
        </div>
        <div class="col-md-8 offset-md-8 text-center md:text-justify  text-aling: center text-xl"
          style="width: 50%; margin: 0 auto;">
          <div style="text-align: center;">
            <h3 style="margin:0">
              <strong v-if="datos.length > 0">{{ datos[0].nombre }}</strong>
            </h3>
            <h4 v-if="datos.length > 0">{{ datos[0].link }}</h4>

            <p v-if="mensaje.length > 0"
              style="text-align: justify; white-space: pre-line;margin-top: 2em; margin-bottom:1em;">
              {{ mensaje[0].contenido }}
            </p>

          </div>
          <br><br>
          <div class="bg-white  shadow-6 sm:border-round-lg">
            <div class="card">
              <h1>INFORMES DEL RECTOR</h1>
              <button @click="mostrarPDF">Abrir</button>
              <iframe v-if="mostrarPDF" src="/storage/pdfs/1698694086_Formulario integrales.pdf" width="100%" height="500px"></iframe>
              <details class="warning">
                <summary>DOCUMENTOS </summary><br>
                <div v-for="(informe, index) in informes" :key="index">
                  <button @click="mostrarInforme(index)">Abrir</button>
                  <iframe v-if="informe.mostrar" :src="informe.ruta" width="100%" height="500px"></iframe>
                </div>

              </details>
            </div>
          </div>
        </div>
        <br><br>
      </AppEstructure>

    </div>
  </div>
</template>

<style >
:root {
  --color-bg: #EEEDEB;
  --color-title: #0E1C4E;
  --color-summary-1: #FAFAFF;
  --color-summary-1-highlight: #4176c7;

}


.card {
  margin-bottom: 40px;
  border-radius: 4px;
  border-color: black;
  width: 100%;
  padding: 20px;
  /* Añade un relleno interno para separar el contenido del borde */
  box-sizing: border-box;
  /* Asegúrate de que el padding se incluya en el ancho total */
}

h1 {
  font-family: var(--font-ibm-plex-sans);
  font-style: normal;
  font-weight: bold;
  font-size: 20px;
  line-height: 1.2;
  color: var(--color-title);
  margin-bottom: 20px;
  text-align: center;
  /* Centra el texto */
}

details {
  display: flex;
  border-radius: 5px;
  overflow: hidden;
  background: rgba(0, 0, 0, .05);
  border-left: 15px solid gray;
  padding: 15px;
  margin-top: 15px;
  box-sizing: border-box;
  /* Asegúrate de que el padding se incluya en el ancho total */
}

.warning {
  --highlight: var(--color-summary-1-highlight);
  background: var(--color-summary-1);
  border-left-color: var(--color-summary-1-highlight);
}

.info {
  --highlight: var(--color-summary-2-highlight);
  background: var(--color-summary-2);
  border-left-color: var(--color-summary-2-highlight);

}

.alert {
  --highlight: var(--color-summary-3-highlight);
  background: var(--color-summary-3);
  border-left-color: var(--highlight);

}

summary {
  position: relative;
  display: flex;
  flex-direction: row;
  align-content: center;
  justify-content: center;
  font-family: var(--font-ibm-plex-sans);
  font-style: normal;
  font-weight: normal;
  font-size: 18px;
  color: var(--color-title);
  padding: 20px;
  cursor: pointer;
  text-align: center;
  /* Centra el texto */
}

p {
  cursor: default;
  list-style-type: corona;
}

summary::before {
  cursor: pointer;
  position: absolute;
  display: inline-flex;
  width: 1rem;
  height: 1rem;
  left: 0rem;
  margin-right: .5rem;
  content: url("data:image/svg+xml,%3Csvg width='100%' height='100%' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M22.6066 12H1.3934' stroke='%23202842' stroke-width='1.875' stroke-linecap='round' stroke-linejoin='round'/%3E%3Cpath d='M12 1.39343V22.6066' stroke='%23202842' stroke-width='1.875' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E%0A");

}

@media (max-width: 767px) {
  .card {
    padding: 1%;
    font-size: 16px;
    /* Ajusta el tamaño de la fuente según sea necesario */
  }
}
</style>
