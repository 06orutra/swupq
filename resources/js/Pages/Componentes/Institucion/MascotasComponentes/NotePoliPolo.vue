<template>
  <div class="card">
    <div class="medida" v-for="msj in mensajepp" :key="msj.id">
      <div class="card-title">
        <strong>{{ msj.titulo }}</strong>
      </div>
      <div class="card-content">
        {{ msj.contenido }}
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      mensajepp: [], // Propiedad para almacenar los mensajes y enlaces
    };
  },
  
  mounted() {
    this.loadmensajepp();
  },

  methods: {
    loadmensajepp() {
      // Realiza una solicitud HTTP para obtener los mensajes y enlaces desde el controlador de Laravel
      axios
        .post('/MensajePoliPolo/bannerData')
        .then((response) => {
          this.mensajepp = response.data;
        })
        .catch((error) => {
          console.error("Error en la solicitud Axios: ", error);
        });
    },
  },
};
</script>

<style scoped>
.medida {
  width: 600px;
  height: auto;
  background-color: #f2f2f2;
}

.card-title {
  font-size: 24px;
  color: #414141;
  border-bottom: 1px solid rgba(70, 67, 82, 0.418);
  padding-bottom: 10px;
  margin: 0 auto;
  text-align: left;
  width: 580px;
}

.card-content {
  font-size: 16px;
  color: #666666;
  text-align: justify;
  white-space: pre-line;
}

.card {
  background-color: #f2f2f2;
  border-top: 3px solid rgba(140, 36, 55, 1);
  border-top-left-radius: 0;
  border-top-right-radius: 0;
  border-bottom-left-radius: 0.50rem;
  border-bottom-right-radius: 0.50rem;
}

@media (max-width: 2560px) {}

@media (max-width: 1024px) {
  .card{
    width: auto;
    margin-right: 15px;
  }
  .medida {
  width: 550px;
  height: auto;
}
}

@media (max-width: 768px) {
  .card {
    height: auto;
    margin: 20px;
  }

  .medida {
    width: auto;
    height: auto;
  }

  .card-title {
    font-size: 16px;
    width: auto;
  }

  .card-content {
    font-size: 14px;
  }
}

@media (max-width: 425px) {}

@media (max-width: 375px) {}

@media (max-width: 320px) {}
</style>
