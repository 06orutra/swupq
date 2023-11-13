<script setup>
import RedesSociales from '@/Pages/Componentes/Home/RedesSociales.vue';
import AppEstructure from '@/Layouts/mainEstructure/AppEstructure.vue';
</script>

<script>
import 'primeflex/primeflex.css';
import 'primeicons/primeicons.css';
import axios from 'axios';

export default {
  data() {
    return {
      showModal: false,
      modalTitle: "",
      docUrl: "",
      activeAccordion: null,
      showPDFModal: false,
      currentPDF: '',
      currentPDFName: '',
      ConstitucionDocumentos: [],
      TratadosInternacionalesDocumentos: [],
      LeyesEstatales: [],
      LeyesFederales: [],
      LeyesGenerales: [],
      CodigosDocumentos: [],
      AcuerdosDocumentos: [],
      ConveniosInstitucionalesDocumentos: [],
      CircularesDocumentos: [],
      CatalogoDocumentos: [],
      DecretosDocumentos: [],
      LineamientosDocumentos: [],
      ManualesDocumentos: [],
      ReglamentosDocumentos: [],
      ProtocolosDocumentos: [],
      PlanDeDesarolloInstitucionalDocumentos: [],
    };
  },

  mounted() {
    this.loadConstitucionDocumentos();
    this.loadTratadosInternacionalesDocumentos();
    this.loadLeyesEstatales();
    this.loadLeyesFederales();
    this.loadLeyesGenerales();
    this.loadCodigosDocumentos();
    this.loadAcuerdosDocumentos();
    this.loadConveniosInstitucionalesDocumentos();
    this.loadCircularesDocumentos();
    this.loadCatalogoDocumentos();
    this.loadDecretosDocumentos();
    this.loadLineamientosDocumentos();
    this.loadManualesDocumentos();
    this.loadReglamentosDocumentos();
    this.loadProtocolosDocumentos();
    this.loadPlanDeDesarolloInstitucionalDocumentos();
  },

  methods: {
    openModal(docUrl, modalTitle) {
      this.docUrl = docUrl;
      this.modalTitle = modalTitle;
      this.showModal = true;
    },
    closePDFModal() {
      this.showPDFModal = false;
    },
    openPDFModal(pdf, name) {
      this.currentPDF = '/storage/pdfs/' + pdf;
      this.currentPDFName = name;
      this.showPDFModal = true;
    },
    closeModal() {
      this.showModal = false;
    },
    toggleAccordion(accordion) {
      if (this.activeAccordion === accordion) {
        this.activeAccordion = null;
      } else {
        this.activeAccordion = accordion;
      }
    },
    loadConstitucionDocumentos() {
      axios
        .post('/ConstitucionDocumentos/bannerData')
        .then((response) => {
          this.ConstitucionDocumentos = response.data;
        })
        .catch((error) => {
          console.error("Error en la solicitud Axios: ", error);
        });
    },
    loadTratadosInternacionalesDocumentos() {
      axios
        .post('/TratadosInternacionalesDocumentos/bannerData')
        .then((response) => {
          this.TratadosInternacionalesDocumentos = response.data;
        })
        .catch((error) => {
          console.error("Error en la solicitud Axios: ", error);
        });
    },
    loadLeyesEstatales() {
      axios
        .post('/LeyesEstatales/bannerData')
        .then((response) => {
          this.LeyesEstatales = response.data;
        })
        .catch((error) => {
          console.error("Error en la solicitud Axios: ", error);
        });
    },
    loadLeyesFederales() {
      axios
        .post('/LeyesFederales/bannerData')
        .then((response) => {
          this.LeyesFederales = response.data;
        })
        .catch((error) => {
          console.error("Error en la solicitud Axios: ", error);
        });
    },
    loadLeyesGenerales() {
      axios
        .post('/LeyesGenerales/bannerData')
        .then((response) => {
          this.LeyesGenerales = response.data;
        })
        .catch((error) => {
          console.error("Error en la solicitud Axios: ", error);
        });
    },
    loadCodigosDocumentos() {
      axios
        .post('/CodigosDocumentos/bannerData')
        .then((response) => {
          this.CodigosDocumentos = response.data;
        })
        .catch((error) => {
          console.error("Error en la solicitud Axios: ", error);
        });
    },
    loadAcuerdosDocumentos() {
      axios
        .post('/AcuerdosDocumentos/bannerData')
        .then((response) => {
          this.AcuerdosDocumentos = response.data;
        })
        .catch((error) => {
          console.error("Error en la solicitud Axios: ", error);
        });
    },
    loadConveniosInstitucionalesDocumentos() {
      axios
        .post('/ConveniosInstitucionalesDocumentos/bannerData')
        .then((response) => {
          this.ConveniosInstitucionalesDocumentos = response.data;
        })
        .catch((error) => {
          console.error("Error en la solicitud Axios: ", error);
        });
    },
    loadCircularesDocumentos() {
      axios
        .post('/CircularesDocumentos/bannerData')
        .then((response) => {
          this.CircularesDocumentos = response.data;
        })
        .catch((error) => {
          console.error("Error en la solicitud Axios: ", error);
        });
    },
    loadCatalogoDocumentos() {
      axios
        .post('/CatalogoDocumentos/bannerData')
        .then((response) => {
          this.CatalogoDocumentos = response.data;
        })
        .catch((error) => {
          console.error("Error en la solicitud Axios: ", error);
        });
    },
    loadDecretosDocumentos() {
      axios
        .post('/DecretosDocumentos/bannerData')
        .then((response) => {
          this.DecretosDocumentos = response.data;
        })
        .catch((error) => {
          console.error("Error en la solicitud Axios: ", error);
        });
    },
    loadLineamientosDocumentos() {
      axios
        .post('/LineamientosDocumentos/bannerData')
        .then((response) => {
          this.LineamientosDocumentos = response.data;
        })
        .catch((error) => {
          console.error("Error en la solicitud Axios: ", error);
        });
    },
    loadManualesDocumentos() {
      axios
        .post('/ManualesDocumentos/bannerData')
        .then((response) => {
          this.ManualesDocumentos = response.data;
        })
        .catch((error) => {
          console.error("Error en la solicitud Axios: ", error);
        });
    },
    loadReglamentosDocumentos() {
      axios
        .post('/ReglamentosDocumentos/bannerData')
        .then((response) => {
          this.ReglamentosDocumentos = response.data;
        })
        .catch((error) => {
          console.error("Error en la solicitud Axios: ", error);
        });
    },
    loadProtocolosDocumentos() {
      axios
        .post('/ProtocolosDocumentos/bannerData')
        .then((response) => {
          this.ProtocolosDocumentos = response.data;
        })
        .catch((error) => {
          console.error("Error en la solicitud Axios: ", error);
        });
    },
    loadPlanDeDesarolloInstitucionalDocumentos() {
      axios
        .post('/PlanDeDesarolloInstitucionalDocumentos/bannerData')
        .then((response) => {
          this.PlanDeDesarolloInstitucionalDocumentos = response.data;
        })
        .catch((error) => {
          console.error("Error en la solicitud Axios: ", error);
        });
    },
  },
};
</script>

<template>
  
  <AppEstructure :controllerName="'/BannerMarcoJuridico/bannerData'">
  <div class="container">
    <div class="portafolio-gutter">
      <br>

      <div v-if="showPDFModal" class="pdf-modal">
        <div class="pdf-container">
          <button @click="closePDFModal" class="close-x">&#10005;</button>
          <div class="pdf-header" :style="{ backgroundColor: '#8c2437' }">
            {{ currentPDFName }}
          </div>
          <embed :src="currentPDF" type="application/pdf" width="100%" height="500px">
          <div class="pdf-buttons">
            <button @click="closePDFModal" class="close-button">Cerrar</button>
            <a :href="currentPDF" download :download="currentPDFName" class="download-button">
              Descargar
            </a>
          </div>
        </div>
      </div>

      <div class="col-md-12 col-sm-12" style="margin-bottom: 1em;">
        <h4>Constitución</h4>
        <div class="toggle toggle-transparent-body toggle-acordion">
          <div class="toggle" :class="{ active: activeAccordion === 'constitucion' }">
            <label @click="toggleAccordion('constitucion')">
              Documentos
              <span
                class="arrow pi pi-chevron-down arrow-custom"
                :class="{ rotated: activeAccordion === 'constitucion' }"
              ></span>
            </label>
            <div class="toggle-content" v-show="activeAccordion === 'constitucion'"  v-for="msj in ConstitucionDocumentos" :key="msj.id">
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal(msj.pdf, msj.nombre)" style="color:#151830 ">
                </a>
                <a @click="openPDFModal(msj.pdf, msj.nombre)" style="color:#151830 ">
                  <i class="fa fa-eye pi pi-file-pdf"></i> {{ msj.nombre }} 
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12 col-sm-12" style="margin-bottom: 1em;">
        <h4>Tratados Internacionales</h4>
        <div class="toggle toggle-transparent-body toggle-acordion">
          <div class="toggle" :class="{ active: activeAccordion === 'tratados' }">
            <label @click="toggleAccordion('tratados')">
              Documentos
              <span
                class="arrow pi pi-chevron-down arrow-custom"
                :class="{ rotated: activeAccordion === 'tratados' }"
              ></span>
            </label>
            <div class="toggle-content" v-show="activeAccordion === 'tratados'"  v-for="msj in TratadosInternacionalesDocumentos" :key="msj.id">
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal(msj.pdf, msj.nombre)" style="color:#151830 ">
                </a>
                <a @click="openPDFModal(msj.pdf, msj.nombre)" style="color:#151830 ">
                  <i class="fa fa-eye pi pi-file-pdf"></i> {{ msj.nombre }} 
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12 col-sm-12" style="margin-bottom: 1em;">
        <h4>Leyes</h4>
        <div class="toggle toggle-transparent-body toggle-acordion">
          <div class="toggle" :class="{ active: activeAccordion === 'leyes2' }">
            <label @click="toggleAccordion('leyes2')">
              Estatales
              <span
                class="arrow pi pi-chevron-down arrow-custom"
                :class="{ rotated: activeAccordion === 'leyes2' }"
              ></span>
            </label>
            <div class="toggle-content" v-show="activeAccordion === 'leyes2'"  v-for="msj in LeyesEstatales" :key="msj.id">
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal(msj.pdf, msj.nombre)" style="color:#151830 ">
                </a>
                <a @click="openPDFModal(msj.pdf, msj.nombre)" style="color:#151830 ">
                  <i class="fa fa-eye pi pi-file-pdf"></i> {{ msj.nombre }} 
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12 col-sm-12" style="margin-bottom: 1em;">
        <div class="toggle toggle-transparent-body toggle-acordion">
          <div class="toggle" :class="{ active: activeAccordion === 'leyes1' }">
            <label @click="toggleAccordion('leyes1')">
              Federales
              <span
                class="arrow pi pi-chevron-down arrow-custom"
                :class="{ rotated: activeAccordion === 'leyes1' }"
              ></span>
            </label>
            <div class="toggle-content" v-show="activeAccordion === 'leyes1'"  v-for="msj in LeyesFederales" :key="msj.id">
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal(msj.pdf, msj.nombre)" style="color:#151830 "> 
                </a>
                <a @click="openPDFModal(msj.pdf, msj.nombre)" style="color:#151830 ">
                  <i class="fa fa-eye pi pi-file-pdf"></i> {{ msj.nombre }} 
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12 col-sm-12" style="margin-bottom: 1em;">
        <div class="toggle toggle-transparent-body toggle-acordion">
          <div class="toggle" :class="{ active: activeAccordion === 'leyes' }">
            <label @click="toggleAccordion('leyes')">
              Generales
              <span
                class="arrow pi pi-chevron-down arrow-custom"
                :class="{ rotated: activeAccordion === 'leyes' }"
              ></span>
            </label>
            <div class="toggle-content" v-show="activeAccordion === 'leyes'"  v-for="msj in LeyesGenerales" :key="msj.id">
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal(msj.pdf, msj.nombre)" style="color:#151830 "> 
                </a>
                <a @click="openPDFModal(msj.pdf, msj.nombre)" style="color:#151830 ">
                  <i class="fa fa-eye pi pi-file-pdf"></i> {{ msj.nombre }} 
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12 col-sm-12" style="margin-bottom: 1em;">
        <h4>Códigos</h4>
        <div class="toggle toggle-transparent-body toggle-acordion">
          <div class="toggle" :class="{ active: activeAccordion === 'codigos' }">
            <label @click="toggleAccordion('codigos')">
              Documentos
              <span
                class="arrow pi pi-chevron-down arrow-custom"
                :class="{ rotated: activeAccordion === 'codigos' }"
              ></span>
            </label>
            <div class="toggle-content" v-show="activeAccordion === 'codigos'"  v-for="msj in CodigosDocumentos" :key="msj.id">
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal(msj.pdf, msj.nombre)" style="color:#151830 ">
                </a>
                <a @click="openPDFModal(msj.pdf, msj.nombre)" style="color:#151830 ">
                  <i class="fa fa-eye pi pi-file-pdf"></i> {{ msj.nombre }} 
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12 col-sm-12" style="margin-bottom: 1em;">
        <h4>Acuerdos</h4>
        <div class="toggle toggle-transparent-body toggle-acordion">
          <div class="toggle" :class="{ active: activeAccordion === 'acuerdos' }">
            <label @click="toggleAccordion('acuerdos')">
              Documentos
              <span
                class="arrow pi pi-chevron-down arrow-custom"
                :class="{ rotated: activeAccordion === 'acuerdos' }"
              ></span>
            </label>
            <div class="toggle-content" v-show="activeAccordion === 'acuerdos'"  v-for="msj in AcuerdosDocumentos" :key="msj.id">
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal(msj.pdf, msj.nombre)" style="color:#151830 ">
                </a>
                <a @click="openPDFModal(msj.pdf, msj.nombre)" style="color:#151830 ">
                  <i class="fa fa-eye pi pi-file-pdf"></i> {{ msj.nombre }} 
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12 col-sm-12" style="margin-bottom: 1em;">
        <h4>Convenios Institucionales</h4>
        <div class="toggle toggle-transparent-body toggle-acordion">
          <div class="toggle" :class="{ active: activeAccordion === 'Convenios' }">
            <label @click="toggleAccordion('Convenios')">
              Documentos
              <span
                class="arrow pi pi-chevron-down arrow-custom"
                :class="{ rotated: activeAccordion === 'Convenios' }"
              ></span>
            </label>
            <div class="toggle-content" v-show="activeAccordion === 'Convenios'"  v-for="msj in ConveniosInstitucionalesDocumentos" :key="msj.id">
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal(msj.pdf, msj.nombre)" style="color:#151830 ">
                </a>
                <a @click="openPDFModal(msj.pdf, msj.nombre)" style="color:#151830 ">
                  <i class="fa fa-eye pi pi-file-pdf"></i> {{ msj.nombre }} 
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12 col-sm-12" style="margin-bottom: 1em;">
        <h4>Circulares</h4>
        <div class="toggle toggle-transparent-body toggle-acordion">
          <div class="toggle" :class="{ active: activeAccordion === 'Circulares' }">
            <label @click="toggleAccordion('Circulares')">
              Documentos
              <span
                class="arrow pi pi-chevron-down arrow-custom"
                :class="{ rotated: activeAccordion === 'Circulares' }"
              ></span>
            </label>
            <div class="toggle-content" v-show="activeAccordion === 'Circulares'"  v-for="msj in CircularesDocumentos" :key="msj.id">
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal(msj.pdf, msj.nombre)" style="color:#151830 "> 
                </a>
                <a @click="openPDFModal(msj.pdf, msj.nombre)" style="color:#151830 ">
                  <i class="fa fa-eye pi pi-file-pdf"></i> {{ msj.nombre }} 
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>


      <div class="col-md-12 col-sm-12" style="margin-bottom: 1em;">
        <h4>Catálogo </h4>
        <div class="toggle toggle-transparent-body toggle-acordion">
          <div class="toggle" :class="{ active: activeAccordion === 'CatalogoDocumentos' }">
            <label @click="toggleAccordion('CatalogoDocumentos')">
              Documentos
              <span
                class="arrow pi pi-chevron-down arrow-custom"
                :class="{ rotated: activeAccordion === 'CatalogoDocumentos'}"
              ></span>
            </label>
            <div class="toggle-content" v-show="activeAccordion === 'CatalogoDocumentos'"  v-for="msj in CatalogoDocumentos" :key="msj.id">
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal(msj.pdf, msj.nombre)" style="color:#151830 ">
                </a>
                <a @click="openPDFModal(msj.pdf, msj.nombre)" style="color:#151830 ">
                  <i class="fa fa-eye pi pi-file-pdf"></i> {{ msj.nombre }} 
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12 col-sm-12" style="margin-bottom: 1em;">
        <h4>Decretos </h4>
        <div class="toggle toggle-transparent-body toggle-acordion">
          <div class="toggle" :class="{ active: activeAccordion === 'CatalogoDoDecretosDocumentos' }">
            <label @click="toggleAccordion('CatalogoDoDecretosDocumentos')">
              Documentos
              <span
                class="arrow pi pi-chevron-down arrow-custom"
                :class="{ rotated: activeAccordion === 'CatalogoDoDecretosDocumentos'}"
              ></span>
            </label>
            <div class="toggle-content" v-show="activeAccordion === 'CatalogoDoDecretosDocumentos'"  v-for="msj in DecretosDocumentos" :key="msj.id">
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal(msj.pdf, msj.nombre)" style="color:#151830 ">
                </a>
                <a @click="openPDFModal(msj.pdf, msj.nombre)" style="color:#151830 ">
                  <i class="fa fa-eye pi pi-file-pdf"></i> {{ msj.nombre }} 
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-md-12 col-sm-12" style="margin-bottom: 1em;">
        <h4>Lineamientos </h4>
        <div class="toggle toggle-transparent-body toggle-acordion">
          <div class="toggle" :class="{ active: activeAccordion === 'LineamientosDocumentos' }">
            <label @click="toggleAccordion('LineamientosDocumentos')">
              Documentos
              <span
                class="arrow pi pi-chevron-down arrow-custom"
                :class="{ rotated: activeAccordion === 'LineamientosDocumentos'}"
              ></span>
            </label>
            <div class="toggle-content" v-show="activeAccordion === 'LineamientosDocumentos'"  v-for="msj in LineamientosDocumentos" :key="msj.id">
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal(msj.pdf, msj.nombre)" style="color:#151830 ">
                </a>
                <a @click="openPDFModal(msj.pdf, msj.nombre)" style="color:#151830 ">
                  <i class="fa fa-eye pi pi-file-pdf"></i> {{ msj.nombre }} 
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12 col-sm-12" style="margin-bottom: 1em;">
        <h4>Manuales </h4>
        <div class="toggle toggle-transparent-body toggle-acordion">
          <div class="toggle" :class="{ active: activeAccordion === 'ManualesDocumentos' }">
            <label @click="toggleAccordion('ManualesDocumentos')">
              Documentos
              <span
                class="arrow pi pi-chevron-down arrow-custom"
                :class="{ rotated: activeAccordion === 'ManualesDocumentos'}"
              ></span>
            </label>
            <div class="toggle-content" v-show="activeAccordion === 'ManualesDocumentos'"  v-for="msj in ManualesDocumentos" :key="msj.id">
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal(msj.pdf, msj.nombre)" style="color:#151830 ">
                </a>
                <a @click="openPDFModal(msj.pdf, msj.nombre)" style="color:#151830 ">
                  <i class="fa fa-eye pi pi-file-pdf"></i> {{ msj.nombre }} 
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 col-sm-12" style="margin-bottom: 1em;">
        <h4>Reglamentos </h4>
        <div class="toggle toggle-transparent-body toggle-acordion">
          <div class="toggle" :class="{ active: activeAccordion === 'ReglamentosDocumentos' }">
            <label @click="toggleAccordion('ReglamentosDocumentos')">
              Documentos
              <span
                class="arrow pi pi-chevron-down arrow-custom"
                :class="{ rotated: activeAccordion === 'ReglamentosDocumentos'}"
              ></span>
            </label>
            <div class="toggle-content" v-show="activeAccordion === 'ReglamentosDocumentos'"  v-for="msj in ReglamentosDocumentos" :key="msj.id">
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal(msj.pdf, msj.nombre)" style="color:#151830 ">
                </a>
                <a @click="openPDFModal(msj.pdf, msj.nombre)" style="color:#151830 ">
                  <i class="fa fa-eye pi pi-file-pdf"></i> {{ msj.nombre }} 
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12 col-sm-12" style="margin-bottom: 1em;">
        <h4>Protocolos </h4>
        <div class="toggle toggle-transparent-body toggle-acordion">
          <div class="toggle" :class="{ active: activeAccordion === 'ProtocolosDocumentos' }">
            <label @click="toggleAccordion('ProtocolosDocumentos')">
              Documentos
              <span
                class="arrow pi pi-chevron-down arrow-custom"
                :class="{ rotated: activeAccordion === 'ProtocolosDocumentos'}"
              ></span>
            </label>
            <div class="toggle-content" v-show="activeAccordion === 'ProtocolosDocumentos'"  v-for="msj in ProtocolosDocumentos" :key="msj.id">
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal(msj.pdf, msj.nombre)" style="color:#151830 ">
                </a>
                <a @click="openPDFModal(msj.pdf, msj.nombre)" style="color:#151830 ">
                  <i class="fa fa-eye pi pi-file-pdf"></i> {{ msj.nombre }} 
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12 col-sm-12" style="margin-bottom: 1em;">
        <h4>Plan De Desarollo Institucional </h4>
        <div class="toggle toggle-transparent-body toggle-acordion">
          <div class="toggle" :class="{ active: activeAccordion === 'PlanDeDesarolloInstitucionalDocumentos' }">
            <label @click="toggleAccordion('PlanDeDesarolloInstitucionalDocumentos')">
              Documentos
              <span
                class="arrow pi pi-chevron-down arrow-custom"
                :class="{ rotated: activeAccordion === 'PlanDeDesarolloInstitucionalDocumentos'}"
              ></span>
            </label>
            <div class="toggle-content" v-show="activeAccordion === 'PlanDeDesarolloInstitucionalDocumentos'"  v-for="msj in PlanDeDesarolloInstitucionalDocumentos" :key="msj.id">
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal(msj.pdf, msj.nombre)" style="color:#151830 ">
                </a>
                <a @click="openPDFModal(msj.pdf, msj.nombre)" style="color:#151830 ">
                  <i class="fa fa-eye pi pi-file-pdf"></i> {{ msj.nombre }} 
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
      <br>
      <br>
      <br>
      <br>

    </div>
  </div>
  
</AppEstructure>
  <RedesSociales />
</template>

<style scoped>
.container{
  position: relative;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}
.col-md-12,
col-sm-12{
  position: relative;
    width: 100%;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}
h4 {
  font-size: 18px;
  letter-spacing: normal;
  margin: 0 0 14px 0;
  display: block;
  margin-block-start: 1.33em;
  margin-block-end: 1.33em;
  margin-inline-start: 0px;
  margin-inline-end: 0px;
  font-family: 'Open Sans',Arial,Helvetica,sans-serif;
  font-weight: 600;
  color: #414141;
  position: relative;
  line-height: 1.5;
  z-index: 0;
}
div.toggle{
  margin: 10px 0 0;
  position: relative;
  clear: both;
}
.toggle.toggle-transparent-body label{
  background: rgba(0,0,0,0.03);
}
label{
  margin-bottom: 0.5rem;
}
div.toggle > label {
    color: #333;
    cursor: pointer;
    font-size: 16px;
    font-weight: normal;
    padding: 13px 20px;
    position: relative;
    display: block;
    border-bottom: rgba(0,0,0,0.03) 1px solid;
    border-radius: 0;
    border: 1px solid #ccc;
    transition: all 300ms ease;
    background: rgba(0, 0, 0, 0.03);
    transition: background 0.4s ease;
}
div.toggle > label:hover {
    background: rgba(0, 0, 0, 0.1); 
  }
.toggle.toggle-transparent-body .toggle-content {
    background: transparent;
}
div.toggle div.toggle-content{
  margin-top: -5px;
  padding: 0px 20px;
  border-radius: 0;
}
.font-lato{
  font-weight: 300;
  font-family: 'Lato',Arial,Helvetica,sans-serif !important;
}
p {
  display: block;
  -webkit-margin-before: 0.1em;
  -webkit-margin-after: 0.1em;
  -webkit-margin-start: 0px;
  -webkit-margin-end: 0px;
}
.toggle label {
  position: relative;
}
.arrow.rotated{
  transform: rotate(180deg);
  transition: transform 0.3s;
}
.toggle .arrow {
  transition: transform 0.3s ease; 
}
.toggle label::after {
  content: "";
}
.toggle.active label::after {
  transform: none; 
}
.toggle label .pi.pi-chevron-down {
  font-size: 20px; 
  margin-left: auto; 
  vertical-align: middle; 
}
.arrow-custom {
  position: absolute;
  bottom: 15px; 
  right: 30px; 
}
/* Modal */
.modal-dialog{
  position:relative;
  box-shadow: 0 10px 25px rgba(0,0,0,0.5);
  width: 90%; 
  max-width: 600px; 
  height: auto;
  max-height: 80vh;
  display: flex;
  flex-direction: column;
  background-color: #fff;
  overflow: hidden; 
  border-radius: 8px;
  margin: 0 auto;
  transition: all 0.3s;
  margin: 5% auto 0; 
}
#modalContainer {
  display: flex;
  align-items: center;
  justify-content: center;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 9999;
  overflow: auto;
}
.containerr{
  position: relative;
}
.center-modal{
  display:flex;
  align-items: center;
  justify-content: center;
}
.modal-content{
  width: 100%;
  height: 100%;box-shadow: none;
  display: flex;
  flex-direction: column;
  pointer-events: auto;
  background-color: #fff;
  display:flex;
  justify-content: center;
}
.modal-header{
  background: #8C2437;
  display: flex;
  -webkit-box-align: start;
  -webkit-box-pack: justify;
  padding: 1rem;
  border-bottom: 1px solid #e9ecef;
  border-top-left-radius: 8px;
  border-top-right-radius: 8px;
}
.modal-title{
  margin-bottom: 0;
  color: #fff;
  line-height: 1.5;
}
h4 {
  font-size: 18px;
  letter-spacing: normal;    
  margin: 0 0 14px 0;
  font-family: 'Open Sans',Arial,Helvetica,sans-serif;
  font-weight: 600;
  z-index: 0;
}
.modal-body {
  position: relative;
  -webkit-box-flex: 1;
  flex: 1;
  padding: 1rem;
}
.modal-footer {
  display:flex;
  -webkit-box-align: center;
  align-items: center;
  -webkit-box-pack: end;
  justify-content: flex-start;
  padding: 1rem;
  border-top: 1px solid #e9ecef; 
}
.modal-footer .btn{
  margin-top: 0;
  margin-bottom: 0;
}
.btn-primary{
  background-color: #8C2437;
  color:#fff;
  align-items: center;
}
.text-center{
  text-align: center !important;
}
.btn{
  display: inline-block; 
  border-radius: 3px;
  font-weight: 400;
  text-align: center;
  vertical-align: middle;
  font-size: 15px;
  border-radius: 3px;
  height:40px;
}
button{
  background: none;
  overflow: visible;
  font-family: inherit;
}
.btn-featured span {
    float: left;
    height: 70px;
    line-height: 70px;
    text-align: center;
    width: calc(100% - 70px);
    color: #fff;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.btn-featured {
  width: 100%;
  display: inline-block;
  height: 70px;
  padding: 0 !important;
  border: 0;
  font-size: 13px !important;
  transform: translateZ(0);
  box-shadow: 0 0 1px rgba(0, 0, 0, 0);
  backface-visibility: hidden;
  transition-duration: 0.3s;
  transition-property: transform;
}
.btn-featured i {
  background-color: rgba(0,0,0,0.1);
  float: left;
  width: 70px;
  height: 70px;
  line-height: 70px;
  text-align: center;
  color: #fff;
  font-size: 30px;
  margin: 0;
  padding: 0;
}
.btn-red{
  background-color: #C02942;
  COLOR: #fff !important;
}
.pdf-iframe {
    width: 100%;
    height: 100%;
    border: none;
}

.close-x {
    position: absolute;
    top: 5px;
    right: 15px;
    background-color: transparent;
    border: none;
    font-size: 24px;
    color: black;
    cursor: pointer;
    transition: color 0.3s ease;
}

.close-x:hover {
    color: #ffffff;
}

.pdf-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 10000;
}

.pdf-container {
    position: relative;
    width: 75%;
    height: 80%;
    background-color: white;
    border-radius: 10px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
}

.pdf-header {
    height: 40px;
    line-height: 40px;
    text-align: center;
    color: white;
    font-size: medium;
    font-weight: bold;
}

embed {
    width: 100%;
    height: calc(100vh - 80px);
}

.pdf-buttons {
    display: flex;
    justify-content: space-between;
    padding: 10px;
    margin-top: 10px;
    margin-bottom: 10px;
}

.close-button {
    background-color: grey;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
}

.download-button {
    background-color: #8c2437;
    color: white;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 5px;
}

</style>