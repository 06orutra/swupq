<script>
import AppEstructure from '@/Layouts/mainEstructure/AppEstructure.vue';

export default {
  components: {
    AppEstructure
  },
  data() {
    return {
      ultimoNumero: null,
      banner: [],
      seccion: '',
    }
  },
  mounted() {
    // Suponiendo que quieres obtener el número de la URL actual
    this.ultimoNumero = this.obtenerUltimoNumero(window.location.pathname);
    this.cargarBanner();
  },
  methods: {
    obtenerUltimoNumero(url) {
      const partes = url.split('/');
      const ultimoElemento = partes.pop(); // Obtiene el último elemento del array

      // Verifica si el último elemento es un número
      if (!isNaN(ultimoElemento) && ultimoElemento.trim() !== '') {
        return ultimoElemento;
      } else {
        return null; // O manejar de otra manera si el último elemento no es un número
      }
    },

    cargarBanner() {
      let url = '/prensa/' + this.ultimoNumero;
      axios.post(url)
        .then((response) => {
          this.banner = response.data;
          this.seccion = this.banner.seccion.nombre;
        })
        .catch((error) => {
          console.error('Error en la solicitud:', error);
        });
    },

    fechaFormateada() {
      const meses = [
        "enero", "febrero", "marzo", "abril", "mayo", "junio",
        "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"
      ];

      const partesFecha = this.fecha.split(" ")[0].split("-");
      const dia = partesFecha[2];
      const mes = meses[parseInt(partesFecha[1]) - 1];
      const ano = partesFecha[0];

      return `${dia} de ${mes} de ${ano}`;
    },
  },
}



</script>

<template>
  <AppEstructure>

    <div>
      <h1 class="titulo">PRENSA {{ ultimoNumero }}</h1>
      <hr>
  

      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="blog-post">
              <div>
                <img class="img-fluid w-100"
                  :src="'/storage/' + banner.imagen" alt="">
              </div>
              {{ banner  }}
              <h2>{{ banner.titulo}}</h2>
              <h6>{{ seccion }}</h6>
              
              <ul class="blog-post-info list-inline">
                <i class="pi pi-clock"></i>
                <span class="font-lato">{{ fechaFormateada }}</span>
              </ul>
              <p>
                La secretaria de la Juventud, Virginia Hernández Vázquez y el director de Querétaro Digital e Innovación
                de la Secretaría de Finanzas, Juan Carlos Nieves Torres, encabezaron la premiación de la segunda edición
                del Hackathon Querétaro Digital, actividad que busca desarrollar aplicaciones, sistemas o herramientas
                digitales para mejorar los servicios de Gobierno del Estado.



                <br><br>En esta edición se destinó una bolsa de 225 mil pesos para premiar a los tres primeros lugares y
                participaron 140 jóvenes divididos en 28 equipos multidisciplinarios, quienes en 30 horas trabajaron y
                desarrollaron sus proyectos enfocados en: conectividad, movilidad, empleos y empresas, vivienda y entorno
                construido, salud, educación, E-gobierno, energía, agua y residuos.



                <br><br>“Siempre el Gobernador dice que tenemos que trabajar en equipo, tanto ciudadanos como gobierno
                porque solo así podemos hacer que las cosas sucedan y esto es un claro ejemplo de cómo las juventudes
                estamos haciendo que las cosas sucedan, estamos proponiendo, estamos levantando la voz y estamos de verdad
                generando un cambio en nuestro estado”, expresó la funcionaria.



                <br><br>El ganador del primer lugar fue el equipo “Los 13” de la Universidad Politécnica de Querétaro
                (UPQ) con el proyecto “V My Eyes”, el cual es un intérprete digital del entorno para atención y apoyo de
                personas con debilidad visual; el segundo lugar fue para “Zorrotronics” del Tecnológico Nacional de México
                campus Querétaro con “TactoGraph” que es un teclado en sistema Braille para dispositivos móviles y la
                tercera posición la obtuvo el equipo “Schlombis” de la UPQ con la propuesta denominada “Harvey”, el primer
                asistente virtual inteligente de apoyo y consulta legal gratuita.
              </p>
            </div>



          </div>

          <div class="col-lg-4">

            <div class="blog-post">
              <div>
                <img class="img-fluid w-full"
                  src="https://www.upq.mx/media/post/banner/WhatsApp_Image_2023-11-12_at_12.05.30.jpeg" alt="">
              </div>
              <h6 style="font-size: small">SECCIÓN</h6>
              <h2 style="font-size: medium;">TÍTULO DE LA NOTA</h2>
              <hr>
            </div>

            <div class="blog-post">
              <div>
                <img class="img-fluid w-full"
                  src="https://www.upq.mx/media/post/banner/WhatsApp_Image_2023-11-12_at_12.05.30.jpeg" alt="">
              </div>
              <h6 style="font-size: small">SECCIÓN</h6>
              <h2 style="font-size: medium;">TÍTULO DE LA NOTA</h2>
              <hr>
            </div>

            <br><br>
            <div class="blog-post">
              <div>
                <img class="img-fluid w-full"
                  src="https://www.upq.mx/media/post/banner/WhatsApp_Image_2023-11-06_at_16.38.18.jpeg" alt="">
              </div>
              <br>
              <hr>
              <iframe width="100%" height="180" src="https://www.youtube.com/embed/g3uxeG1rrlE?si=fx-FUpS4ZfjuZlbC"
                frameborder="0" allowfullscreen></iframe>
              <h6 style="font-size: small">SECCIÓN</h6>
              <h2 style="font-size: medium;">TÍTULO DE LA NOTA</h2>
              <hr>

              <div>
                <br>
                <img class="img-fluid w-full"
                  src="https://www.upq.mx/media/post/banner/WhatsApp_Image_2023-11-06_at_16.38.18.jpeg" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AppEstructure>
</template>

<style scoped>
.titulo {
  margin-top: 60px;
  text-align: center;
  color: rgba(13, 39, 85, 0.902);
  font-size: 36px;
  letter-spacing: 1px;
  font-weight: 900;
}

section {
  display: block;
  position: relative;
  padding: 100px 0;
  border-bottom: rgba(0, 0, 0, 0.1) 1px solid;
}

.container {
  position: relative;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}

.row {
  display: flex;
  flex-wrap: wrap;
  margin-right: -15px;
  margin-left: -15px;
}

.col-lg-8 {
  position: relative;
  width: 100%;
  min-height: 1px;
  padding-right: 15px;
  padding-left: 15px;
  flex: 0 0 75%
}

.col-lg-4 {
  position: relative;
  width: 100%;
  min-height: 1px;
  padding-right: 15px;
  padding-left: 15px;
  flex: 0 0 25%
}

.row.d-flex {
  display: flex;
}

.blog-post {
  display: block;
  margin-bottom: 20px;

  border-bottom: #eee 1px solid;
  position: relative;
}

div.row>div img.img-fluid {
  width: 100%;
}

img.img-fluid {
  width: 100%;
  height: auto;
}

.img-fluid {
  width: 100%;
  height: auto;
}

img {
  border: 0;
}

ul.blog-post-info {
  display: block;
  border-bottom: #eaeaea 1px dotted;
  padding-bottom: 20px;
  font-size: 14px;
}

.list-inline {
  padding-left: 0;
  list-style: none;
}

h2 {
  letter-spacing: 0;
  font-family: 'Open Sans', Arial, Helvetica, sans-serif;
  font-size: 22px;
  margin-bottom: 10px;
  font-weight: 600;
  color: #414141;
  position: relative;
  line-height: 1.5;
}

p {
  margin-bottom: 30px;
  display: block;
  -webkit-margin-before: 0.1em;
  -webkit-margin-after: 0.1em;
  -webkit-margin-start: 0px;
  -webkit-margin-end: 0px;
  text-align: justify;
  text-align: justify;
}
</style>