<script>
export default {
  data() {
    return {
      imageUrl: 'https://www.upq.mx/assets/images/banners/location-map.png',
      direccion: 'Carretera Estatal 420 SN El Marqués Querétaro',
      telefono: '+52 (442) - 101 - 9000',
      email: 'recepcion@upq.mx',
      showMapModal: false, 
    };
  },
  methods: {
    openInNewTab(url) {
      window.open(url, '_blank');
    },
    openMapModal() {
      this.showMapModal = true;
    },
    closeMapModal() {
      this.showMapModal = false;
    },
  }
}
</script>

<template>
  <div class="container">
    <div class="row">
      <!-- Div que contiene la imagen -->
      <div class="image-and-contact">
        <img :src="imageUrl" class="img-fluid" style="width: 100%;">
      </div>
      <!-- fin del div imagen -->
      <!-- Div para la información y los botones -->
      <div class="contact-and-buttons">
        <div class="contact-info">
          <h3 style="text-align: left;">Contáctanos</h3>
          <hr>
          <p>
            <span class="block">
              <strong>
                <i class="pi pi-map-marker"></i>
                Dirección:
              </strong>
              {{ direccion }}
            </span>

            <span class="block">
              <strong>
                <i class="pi pi-phone"></i>
                Teléfono:
              </strong>
              {{ telefono }}
            </span>

            <span class="block">
              <strong>
                <i class="pi pi-envelope"></i>
                Email:
              </strong>
              <a :href="'mailto:' + email">{{ email }}</a>
            </span>
          </p>
        </div>

        <!-- Botón para abrir el modal -->
        <button @click="openMapModal" class="btn-flotante items-center">
          <span>Ver Google Maps</span>
          <i class="et-map"></i>
        </button>

        <a @click="openInNewTab('https://www.google.com/maps/@20.5467271,-100.2740307,3a,75y,26.3h,82.01t/data=!3m4!1e1!3m2!1s07OO4RHQFK4tgNDDGdR5tA!2e0'); "
          class="btn-flotante items-center">
          <span>Ver Recorrido Virtual</span>
          <i class="fas fa-location"></i>
        </a>
      </div>
      <hr>
    </div>
  </div>
  
<!-- Modal como un pop-up -->
<div v-if="showMapModal" class="popup-modal">
  <div class="popup-content"> 
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="color: #fff; text-align: left;"">Ubicación de la Universidad</h4>
      </div>
      <div class="modal-body">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3736.0105098241406!2d-100.27699468507546!3d20.54675088626154!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d3452b278e7259%3A0xeb40a967d716216c!2sUniversidad+Polit%C3%A9cnica+de+Quer%C3%A9taro!5e0!3m2!1ses-419!2smx!4v1520618862387" width="100%" height="480" frameborder="0" style="border:0" allowfullscreen=""></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" @click="closeMapModal">Cerrar</button>
        <button type="button" class="btn btn-primary" @click="openInNewTab('https://www.google.com/maps/place/Universidad+Politécnica+de+Querétaro/@20.5467559,-100.2769947,17z/data=!3m1!4b1!4m5!3m4!1s0x85d3452b278e7259:0xeb40a967d716216c!8m2!3d20.5467509!4d-100.274806')">Ver en Google Maps</button>
      </div>
    </div>
  </div>
</div>
</template>

<style scoped>
.row{
  display:flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}
.image-and-contact{
  display: flex;
  align-items: center;
  max-width: 100%;
  padding-left: 50px;
  padding-right: 50px;
}
.contact-and-buttons{
  display: flex;
  align-items: center;
  flex-direction: column;
  width: 100%;
}
.button-container{
  flex: 1;
  margin-top: 50px;
  display: flex;
  flex-direction: column;
}
.contact-info {
  flex: 1;
  padding-right: 20px;
}
.btn-flotante {
	font-size: 16px; 
	text-transform: uppercase; 
	font-weight: bold; 
	color: #ffffff; 
	border-radius: 5px; 
	letter-spacing: 2px; 
	background-color: #8C2437; 
	padding: 18px 30px; 
	bottom: 40px;
	right: 40px;
	transition: all 300ms ease 0ms;
	box-shadow: 0px 8px 15px #08162fe6;
	z-index: 99;
  margin-bottom: 15px;
}
.btn-flotante:hover {
	background-color: #08162fe6; /* Color de fondo al pasar el cursor */
	box-shadow: 0px 15px 20px rgba(8, 22, 47, 0.9);
	transform: translateY(-7px);
}
.block {
  margin-bottom: 10px;
  font-family: 'Open Sans',Arial,Helvetica,sans-serif;
  font-size: 16px;
  -webkit-font-smoothing: antialiased;
  line-height: 1.5;
  color: #666;
}
.strong {
  font-weight: bolder;
  
  font-size: 16px;
  line-height: 1.5;
  box-sizing: border-box;
}
.popup-modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.7);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 9999;
  border: 0;
}

.popup-content {
  background: #fff;
  padding: 20px;
  border-radius: 5px;
  text-align: center;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
  max-width: 90%;
  overflow: auto;
  width: 95%; max-width: 1000px;
}

.close-popup {
  position: absolute;
  top: 10px;
  right: 10px;
  font-size: 20px;
  cursor: pointer;
}
.modal-header{
  background: #8C2437;
  display: block;
  -webkit-box-align: start;
  -webkit-box-pack: justify;
  padding: 1rem;
  border-bottom: 1px solid #e9ecef;
  border-top-left-radius: 0.3rem;
  border-top-right-radius: 0.3rem;
  box-sizing: border-box;
}

@media (min-width: 768px) {
  .image-and-contact{
  display: flex;
  align-items: center;
  max-width: 60%;
  padding-left: 30px;
  padding-right: 30px;
  }
}

@media (max-width: 425px) {
  .row {
  display: flex;
  flex-direction: column; /* Cambia el flujo a columna */
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.image-and-contact {
  width: 100%;
  padding-left: 50px;
  padding-right: 50px;
  text-align: center; /* Centra la imagen en pantallas pequeñas */
}

.contact-and-buttons {
  width: 100%;
}

.button-container {
  display: flex;
  flex-direction: column;
  align-items: center; /* Centra los botones en pantallas pequeñas */
  margin-top: 20px; /* Espacio entre la información y los botones */
}

.contact-info {
  text-align: center; /* Centra la información en pantallas pequeñas */
}

.btn-flotante {
  font-size: 16px;
  text-transform: uppercase;
  font-weight: bold;
  color: #ffffff;
  border-radius: 5px;
  letter-spacing: 2px;
  background-color: #8C2437;
  padding: 18px 30px;
  margin-bottom: 15px;
  transition: all 300ms ease 0ms;
  box-shadow: 0px 8px 15px #08162fe6;
  z-index: 99;
}

.btn-flotante:hover {
  background-color: #08162fe6;
  box-shadow: 0px 15px 20px rgba(8, 22, 47, 0.9);
  transform: translateY(-7px);
}

.block {
  margin-bottom: 10px;
  font-family: 'Open Sans', Arial, Helvetica, sans-serif;
  font-size: 16px;
  -webkit-font-smoothing: antialiased;
  line-height: 1.5;
  color: #666;
}

.strong {
  font-weight: bolder;
  font-size: 16px;
  line-height: 1.5;
  box-sizing: border-box;
}
}
</style>