<script>
import AppEstructure from '@/Layouts/mainEstructure/AppEstructure.vue';
export default {
  components: {
    AppEstructure
  },

  mounted() {
    this.cargarMensaje();
    
  },

  data() {
    return {
      selectedOption: null,
      mensaje: [],
      parrafo1: "Un nuevo año implica nuevos retos, nuevas metas y más empuje. Es por eso que la Unversidad Politécnica de Querétaro (UPQ) está lista para recibir y formar a líderes en la industria automotriz.",
      parrafo2: "Sin duda, el 2020 y 2021 obligaron a que el sector educativo se reinventara y la UPQ no fue la excepción; relfexionamos, evolucionamos y mejorarmos para adaptarnos a esta nueva normalidad. Hoy, estamos preparados para afianzar nuestro lugar en el sector educativo estatal, nacional e internacional.",
      parrafo3: "Uno de los motores que nos dará fortaleza este 2022 será la vinculación de nuestros estudiantes con la industria automotriz a través del Modelo de Formación Dual, un sistema característico de nuestra institución. También sabemos que la salud física y mental de nuestros alumnos es primordial, por eso a través de la cultura y el deporte fortaleceremos las destrezas y competencias de nuestros alumnos. Así que ¡vamos, Cardenales! ¡Volemos alto y formemos al talento automotriz que Querétaro y México necesitan!",
      parrafos: [],
    }
  },

  methods: {
    handleSelection() {
      if (this.selectedOption) {
        const pdfPath = `ruta_a_tu_pdf/${this.selectedOption}.pdf`;
        window.open(pdfPath, '_blank');
      }
    },
    cargarMensaje() {
      return axios.post('/rector/bannerData').then((response) => {
        this.mensaje = response.data;
      }).catch((error) => {
        console.log(error);
      });
    },

  }
}


</script>

<template>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <div class="mx-auto">
    <div class="bg-white overflow-hidden shadow-6 sm:border-round-lg">

      <AppEstructure :controllerName="'/rectorBanner/bannerData'">

        <div class="flex items-center justify-center my-1">
          <img v-for="img in mensaje" class="h-96 w-100 p-8" :src="'/storage/' + img.imagen" alt="">
        </div>
        <div class="col-md-8 offset-md-8 text-justify  text-aling: center text-xl" style="width: 50%; margin: 0 auto;">
          <div style="text-align: center;">
            <h3 style="margin:0">
              <strong v-for="name in mensaje">{{ name.nombre }}</strong>
            </h3>
            <h4 v-for="position in mensaje">{{ position.link }}</h4>

            <div style="text-align:justify;">
              <p class="" style="margin-top: 2em; margin-bottom:1em; text-lg">
                {{ parrafo1 }}
              </p><br>

              <p class="" style="margin-bottom: 1em;">
                {{ parrafo2 }}
              </p><br>

              <p class="" style="margin-bottom: 1em;">
                {{ parrafo3 }}
              </p><br><br>
            </div>

          </div>
          <div>
            <select v-model="selectedOption" @change="handleSelection">
              <option value="indiana">Indiana</option>
              <option value="michigan">Michigan</option>
              <option value="ohio">Ohio</option>
            </select>
          </div>
        </div>
      </AppEstructure>
    </div>
  </div>
</template>

<style></style>