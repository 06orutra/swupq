<template>
  <div>
    <AppEstructure :controllerName="'/BannerDirectorio/bannerData'">
      <div class="directory">
        <div class="column column-left">
          <h4>RECTORÍA</h4>
          <div v-for="msj in rectoria" :key="msj.id">
            <ul>
              <li>
                <i class="pi pi-briefcase"></i>
                {{ msj.titulo }}
              </li>
              <li>
                <i class="pi pi-phone phone-icon"></i><span class="contact-name">{{ msj.contenido }}</span>
              </li>
            </ul>
          </div>
        </div>
        <div class="column column-center">
          <h4>SECRETARÍA ACADÉMICA</h4>
          <div v-for="msj in Sacademica" :key="msj.id">
            <ul>
              <li>
                <i class="pi pi-briefcase"></i>
                {{ msj.titulo }}
              </li>
              <li>
                <i class="pi pi-phone phone-icon"></i><span class="contact-name">{{ msj.contenido }}</span>
              </li>
            </ul>
          </div>
        </div>
        <div class="column column-right">
          <h4>SECRETARÍA ADMINISTRATIVA</h4>
          <div v-for="msj in Sadministrativa" :key="msj.id">
            <ul>
              <li>
                <i class="pi pi-briefcase"></i>
                {{ msj.titulo }}
              </li>
              <li>
                <i class="pi pi-phone phone-icon"></i><span class="contact-name">{{ msj.contenido }}</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="directory2">
        <div class="column column-left">
          <h4>DIRECCIÓN DE VINCULACIÓN</h4>
          <div v-for="msj in dirvin" :key="msj.id">
            <ul>
              <li>
                <i class="pi pi-briefcase"></i>
                {{ msj.titulo }}
              </li>
              <li>
                <i class="pi pi-phone phone-icon"></i><span class="contact-name">{{ msj.contenido }}</span>
              </li>
            </ul>
          </div>
        </div>
        <div class="column column-center">
          <h4>ABOGADO GENERAL</h4>
          <div v-for="msj in abogen" :key="msj.id">
            <ul>
              <li>
                <i class="pi pi-briefcase"></i>
                {{ msj.titulo }}
              </li>
              <li>
                <i class="pi pi-phone phone-icon"></i><span class="contact-name">{{ msj.contenido }}</span>
              </li>
            </ul>
          </div>
        </div>
        <div class="column column-right">
          <h4>DIRECCIÓN DE TECNOLOGÍAS DE INFORMACIÓN Y COMUNICACIÓN</h4>
          <div v-for="msj in DTecInfCom" :key="msj.id">
            <ul>
              <li>
                <i class="pi pi-briefcase"></i>
                {{ msj.titulo }}
              </li>
              <li>
                <i class="pi pi-phone phone-icon"></i><span class="contact-name">{{ msj.contenido }}</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="directory3">
        <div class="column column-left">
          <h4>DIRECCIÓN DE PLANEACIÓN</h4>
          <div v-for="msj in dirplan" :key="msj.id">
            <ul>
              <li>
                <i class="pi pi-briefcase">
                </i>
                {{ msj.titulo }}
              </li>
              <li>
                <i class="pi pi-phone phone-icon"></i><span class="contact-name">{{ msj.contenido }}</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </AppEstructure>
    <RedesSociales />a
  </div>
</template>


<script>
import axios from "axios";
import AppEstructure from '@/Layouts/mainEstructure/AppEstructure.vue';

export default {
  components: {
        AppEstructure,
    },
  data() {
    return {
      dirplan: [],
      dirvin: [],
      abogen: [],
      DTecInfCom: [],
      Sacademica: [],
      rectoria: [],
      Sadministrativa: [],// Propiedad para almacenar los mensajes y enlaces
    };
  },

  mounted() {
    this.loaddirplan();
    this.loaddirvin();
    this.loadabogen();
    this.loadSacademica();
    this.loadrectoria();
    this.loadSadministrativa();
    this.loadDTecInfCom();
  },

  methods: {
    loaddirplan() {
      // Realiza una solicitud HTTP para obtener los mensajes y enlaces desde el controlador de Laravel
      axios
        .post('/DPlanneacion/bannerData')
        .then((response) => {
          this.dirplan = response.data;
        })
        .catch((error) => {
          console.error("Error en la solicitud Axios: ", error);
        });

    },
    loaddirvin() {
      // Realiza una solicitud HTTP para obtener los mensajes y enlaces desde el controlador de Laravel
      axios
        .post('/Dvinculacion/bannerData')
        .then((response) => {
          this.dirvin = response.data;
        })
        .catch((error) => {
          console.error("Error en la solicitud Axios: ", error);
        });

    },
    loadabogen() {
      // Realiza una solicitud HTTP para obtener los mensajes y enlaces desde el controlador de Laravel
      axios
        .post('/AboGeneral/bannerData')
        .then((response) => {
          this.abogen = response.data;
        })
        .catch((error) => {
          console.error("Error en la solicitud Axios: ", error);
        });

    },
    loadDTecInfCom() {
      // Realiza una solicitud HTTP para obtener los mensajes y enlaces desde el controlador de Laravel
      axios
        .post('/DTecInfCom/bannerData')
        .then((response) => {
          this.DTecInfCom = response.data;
        })
        .catch((error) => {
          console.error("Error en la solicitud Axios: ", error);
        });

    },
    loadSadministrativa() {
      // Realiza una solicitud HTTP para obtener los mensajes y enlaces desde el controlador de Laravel
      axios
        .post('/Sadministrativa/bannerData')
        .then((response) => {
          this.Sadministrativa = response.data;
        })
        .catch((error) => {
          console.error("Error en la solicitud Axios: ", error);
        });

    },
    loadSacademica() {
      // Realiza una solicitud HTTP para obtener los mensajes y enlaces desde el controlador de Laravel
      axios
        .post('/Sacademica/bannerData')
        .then((response) => {
          this.Sacademica = response.data;
        })
        .catch((error) => {
          console.error("Error en la solicitud Axios: ", error);
        });

    },
    loadrectoria() {
      // Realiza una solicitud HTTP para obtener los mensajes y enlaces desde el controlador de Laravel
      axios
        .post('/rectoria/bannerData')
        .then((response) => {
          this.rectoria = response.data;
        })
        .catch((error) => {
          console.error("Error en la solicitud Axios: ", error);
        });

    },
  },
};
</script>

<style scoped>
.directory {
  display: flex;
  align-items: flex-start;
}

.directory2 {
  display: flex;
}

.directory3 {
  display: flex;
}

.column {
  flex: 1;
  padding: 20px;
  box-sizing: border-box;
}

.column-left {
  margin-left: 150px;
  flex-basis: 5%;
  margin-right: 15px;
}

.column-center {
  flex: 2;
  flex-basis: 1%;
  margin-left: 100px;
}

.column-right {
  margin-right: 300px;
  flex-basis: 10%;
  margin-left: 0px;
}

h4 {
  font-size: 1.25em;
}

ul {
  list-style: none;
  padding: 0;
}

li {
  margin: 1px 0;
}

.Saltos {
  visibility: hidden;
  height: 100000;
}

.pi {
  font-size: 1.2em;
  margin-right: 8px;
  color: #081630;
}

.phone-icon {
  font-size: 1.2em;
  margin-right: 8px;
  color: #666666;
}

.contact-name {
  color: #666666;
}

@media (max-width: 765px) {

  .directory,
  .directory2 {
    flex-direction: column;
  }

  .column {
    flex: 1;
    margin: 0;
    padding: 50px;
  }

  .Saltos {
    display: none
  }
}
</style>
