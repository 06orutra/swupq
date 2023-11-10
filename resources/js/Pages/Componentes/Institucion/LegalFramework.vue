<script>
import 'primeflex/primeflex.css';
import 'primeicons/primeicons.css'

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
      LeyesEstatales: [],
    };
  },

  mounted() {
    this.loadConstitucionDocumentos();
    this.loadLeyesEstatales();
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
  },
};
</script>

<template>
  <div class="container">
    <div class="portafolio-gutter">
      <br>
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
            <div class="toggle-content" v-show="activeAccordion === 'tratados'"  v-for="msj in LeyesEstatales" :key="msj.id">
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

      <br>
      <div class="col-md-12 col-sm-12" style="margin-bottom: 1em;">
        <h4>Leyes</h4>
        <div class="toggle toggle-transparent-body toggle-acordion">
          <div class="toggle" :class="{ active: activeAccordion === 'leyes' }">
            <label @click="toggleAccordion('leyes')">
              GENERALES.
              <span
                class="arrow pi pi-chevron-down arrow-custom"
                :class="{ rotated: activeAccordion === 'leyes' }"
              ></span>
            </label>
            <div class="toggle-content" v-show="activeAccordion === 'leyes'">
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal('.pdf','441.0&nbsp;MB','LEY GENERAL DE ARCHIVOS','https://www.upq.mx/media/legal/docs/LEY_GENERAL_DE_ARCHIVOS.pdf')" style="color:#151830">
                  <i class="fa fa-book"></i>&nbsp;LEY GENERAL DE ARCHIVOS.
                </a>
              </p>
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal('.pdf','637.8&nbsp;MB','LEY GENERAL DE EDUCACIÓN','https://www.upq.mx/media/legal/docs/LEY_GENERAL_DE_EDUCACI%C3%93N.pdf')" style="color:#151830">
                  <i class="fa fa-book"></i>&nbsp; LEY GENERAL DE EDUCACIÓN.
                </a>
              </p>
              <p class="font-lato" style="margin-bottom: 1em;">
                  <a @click="openModal('.pdf','286.1&nbsp;MB','LEY GENERAL DE LA INFRAESTRUCUTRA FÍSICA EDUCATIVA','https://www.upq.mx/media/legal/docs/LGIFE_190118ley_genraldeinfraestructurafisicaeducativa.pdf')" style="color:#151830">
                    <i class="fa fa-book"></i>&nbsp; LEY GENERAL DE LA INFRAESTRUCTURA FÍSICA EDUCATIVA.
                  </a>
                </p>
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal('.pdf','435.3&nbsp;MB','LEY GENERAL DE EDUCACIÓN SUPERIOR','https://www.upq.mx/media/legal/docs/LGES.pdf')" style="color:#151830">
                  <i class="fa fa-book"></i>&nbsp; LEY DE EDUCACIÓN SUPERIOR.
                </a>
              </p>
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal('.pdf','586.8&nbsp;MB','LEY GENERAL DE RESPONSABILIDADES ADMINISTRATIVAS','https://www.upq.mx/media/legal/docs/LGRA_200521.pdf')" style="color:#151830">
                  <i class="fa fa-book"></i>&nbsp; LEY GENERAL DE RESPONSABILIDADES ADMINISTRATIVAS.
                </a>
              </p>
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal('.pdf','740.3&nbsp;MB','LEY GENERAL DE TRANSPARENCIA Y ACCESO A LA INFORMACIÓN PÚBLICA','https://www.upq.mx/media/legal/docs/LGTAIP_200521.pdf')" style="color:#151830">
                  <i class="fa fa-book"></i>&nbsp; LEY GENERAL DE TRANSPARENCIA Y ACCESO A LA INFORMACIÓN PÚBLICA.
                </a>
              </p>
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal('.pdf','102.5&nbsp;MB','LEY GENERAL DEL SISTEMA ANTICORRUPCIÓN','https://www.upq.mx/media/legal/docs/LEY_GENERAL_DEL_SISTEMA_NACIONAL_ANTICORRUPCION.pdf')" style="color:#151830">
                  <i class="fa fa-book"></i>&nbsp; LEY GENERAL DEL SISTEMA ANTICORRUPCIÓN.
                </a>
              </p>
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal('.pdf','480.1&nbsp;MB','LEY GENERAL DE PROTECCIÓN DE DATOS PERSONALES EN POSESIÓN DE SUJETOS OBLIGADOS','https://www.upq.mx/media/legal/docs/LEY_GENERAL_DE_PROTECCI%C3%93N_DE_DATOS_PERSONALES_EN_POSESION_DE_SUJETOS_OBLIGADOS.pdf')" style="color:#151830">
                  <i class="fa fa-book"></i>&nbsp; LEY GENERAL DE PROTECCIÓN DE DATOS PERSONALES EN POSESIÓN DE SUJETOS OBLIGADOS.
                </a>
              </p>
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal('.pdf','501.0&nbsp;MB','LEY GENERAL DE DISCIPLINA FINANCIERA DE LAS ENTIDADES FEDERATIVAS Y LOS MUNICIPIOS','https://www.upq.mx/media/legal/docs/LEY_DE_DISCIPLINA_FINANCIERA_DELAS_ENTIDADE_FEDERTIVAS_Y_LOS_MUNICIPIOS.pdf')" style="color:#151830">
                  <i class="fa fa-book"></i>&nbsp; LEY GENERAL DE DISCIPLINA FINANCIERA DE LAS ENTIDADES FEDERATIVAS Y LOS MUNICIPIOS.
                </a>
              </p>
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal('.pdf','1.4&nbsp;MB','LEY ORGÁNICA DE LA ADMINISTRACIÓN PÚBLICA FEDERAL','https://www.upq.mx/media/legal/docs/LEYORGANICADELAADMINISTRACIONPUBLICAFEDERAL.pdf')" style="color:#151830">
                  <i class="fa fa-book"></i>&nbsp; LEY ORGÁNICA DE LA ADMINISTRACIÓN PÚBLICA FEDERAL.
                </a>
              </p>
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal('.pdf','237.7&nbsp;MB','LEY GENERAL DE BIBLIOTECAS','https://www.upq.mx/media/legal/docs/LGB_010621.pdf')" style="color:#151830">
                  <i class="fa fa-book"></i>&nbsp; LEY GENERAL DE BIBLIOTECAS.
                </a>
              </p>
            </div>
          </div>
        </div>

        <div class="toggle toggle-transparent-body toggle-acordion">
          <div class="toggle" :class="{ active: activeAccordion === 'leyes1' }">
            <label @click="toggleAccordion('leyes1')">
              FEDERALES.
              <span
                class="arrow pi pi-chevron-down arrow-custom"
                :class="{ rotated: activeAccordion === 'leyes1' }"
              ></span>
            </label>
            <div class="toggle-content" v-show="activeAccordion === 'leyes1'">
              <p class="font-lato" style="margin-bottom: 1em;">
                  <a @click="openModal('.pdf','286.1&nbsp;MB','LEY GENERAL DE LA INFRAESTRUCUTRA FÍSICA EDUCATIVA','https://www.upq.mx/media/legal/docs/LGIFE_190118ley_genraldeinfraestructurafisicaeducativa.pdf')" style="color:#151830">
                    <i class="fa fa-book"></i>&nbsp; LEY...
                  </a>
                </p>
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal('.pdf','435.3&nbsp;MB','LEY GENERAL DE EDUCACIÓN SUPERIOR','https://www.upq.mx/media/legal/docs/LGES.pdf')" style="color:#151830">
                  <i class="fa fa-book"></i>&nbsp; LEY DE...
                </a>
              </p>

            </div>
          </div>
        </div>
        <div class="toggle toggle-transparent-body toggle-acordion">
          <div class="toggle" :class="{ active: activeAccordion === 'leyes2' }">
            <label @click="toggleAccordion('leyes2')">
              ESTATALES.
              <span
                class="arrow pi pi-chevron-down arrow-custom"
                :class="{ rotated: activeAccordion === 'leyes2' }"
              ></span>
            </label>
            <div class="toggle-content" v-show="activeAccordion === 'leyes2'">
              <p class="font-lato" style="margin-bottom: 1em;">
                  <a @click="openModal('.pdf','286.1&nbsp;MB','LEY GENERAL DE LA INFRAESTRUCUTRA FÍSICA EDUCATIVA','https://www.upq.mx/media/legal/docs/LGIFE_190118ley_genraldeinfraestructurafisicaeducativa.pdf')" style="color:#151830">
                    <i class="fa fa-book"></i>&nbsp; LEY...
                  </a>
                </p>
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal('.pdf','435.3&nbsp;MB','LEY GENERAL DE EDUCACIÓN SUPERIOR','https://www.upq.mx/media/legal/docs/LGES.pdf')" style="color:#151830">
                  <i class="fa fa-book"></i>&nbsp; LEY DE...
                </a>
              </p>

            </div>
          </div>
        </div>
      </div>

      <br>
      <div class="col-md-12 col-sm-12" style="margin-bottom: 1em;">
        <h4>Códigos</h4>
        <div class="toggle toggle-transparent-body toggle-acordion">
          <div class="toggle" :class="{ active: activeAccordion === 'codigos' }">
            <label @click="toggleAccordion('codigos')">
              Documentos.
              <span
                class="arrow pi pi-chevron-down arrow-custom"
                :class="{ rotated: activeAccordion === 'codigos' }"
              ></span>
            </label>
            <div class="toggle-content" v-show="activeAccordion === 'codigos'">              
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal('.pdf','2.1&nbsp;MB','CONSTITUCIÓN POLÍTICA DE LOS ESTADOS UNIDOS MEXICANOS','https://www.upq.mx/media/legal/docs/CONSTITUCION_POLITICA_DE_LOS_ESTADOS_UNIDOS_MEXICANOS.pdf')" style="color:#151830">
                  <i class="fa fa-book"></i>&nbsp;CÓDIGO...
                </a>
              </p>
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal('.pdf','356.3&nbsp;MB','CONSTITUCIÓN POLÍTICA DEL ESTADO LIBRE Y SOBREANO DE QUERÉTARO','https://www.upq.mx/media/legal/docs/CONSTITUCION_POLITICA_DE_QUER%C3%89TARO.pdf')" style="color:#151830">
                  <i class="fa fa-book"></i>&nbsp;CÓDIGO...
                </a>
              </p>
            </div>

          </div>
        </div>
      </div>

      <br>
      <div class="col-md-12 col-sm-12" style="margin-bottom: 1em;">
        <h4>Acuerdos</h4>
        <div class="toggle toggle-transparent-body toggle-acordion">
          <div class="toggle" :class="{ active: activeAccordion === 'acuerdos' }">
            <label @click="toggleAccordion('acuerdos')">
              Documentos.
              <span
                class="arrow pi pi-chevron-down arrow-custom"
                :class="{ rotated: activeAccordion === 'acuerdos' }"
              ></span>
            </label>
            <div class="toggle-content" v-show="activeAccordion === 'acuerdos'">
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal('.pdf','21.2&nbsp;MB','ACUERDO QUE ESTABLECE LAS DISPOSICIONES EN MATERIA DE CONTROL INTERNO, PARA LOS SUJETOS OBLIGADOS DEL PODER EJECUTIVO DEL ESTADO DE QUERÉTARO','https://www.upq.mx/media/legal/docs/Acuerdo_queestablecendispoenmateri_controlinterno.pdf')" style="color:#151830">
                  <i class="fa fa-book"></i>&nbsp;ACUERDO QUE ESTABLECE LAS DISPOSICIONES EN MATERIA DE CONTROL INTERNO, PARA LOS SUJETOS OBLIGADOS DEL PODER EJECUTIVO DEL ESTADO DE QUERÉTARO.
                </a>
              </p>
            </div>

          </div>
        </div>
      </div>
      
      <br>
      <div class="col-md-12 col-sm-12" style="margin-bottom: 1em;">
        <h4>Convenios Institucionales</h4>
        <div class="toggle toggle-transparent-body toggle-acordion">
          <div class="toggle" :class="{ active: activeAccordion === 'convenio' }">
            <label @click="toggleAccordion('convenio')">
              Documentos.
              <span
                class="arrow pi pi-chevron-down arrow-custom"
                :class="{ rotated: activeAccordion === 'convenio' }"
              ></span>
            </label>
            <div class="toggle-content" v-show="activeAccordion === 'convenio'">
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal('.pdf','950.7&nbsp;MB',' CONVENIO DE COORDINACIÓN CREACIÓN PARA LA CREACIÓN Y APOYO FINANCIERO.','https://www.upq.mx/media/legal/docs/CONVENIO_DE_COORDINACION_CREACION_PARA_LA_CREACION_Y_APOYO_FINANCIERO_CjFiJ8M.pdf')" style="color:#151830">
                  <i class="fa fa-book"></i>&nbsp;  CONVENIO DE COORDINACIÓN CREACIÓN PARA LA CREACIÓN Y APOYO FINANCIERO.
                </a>
              </p>
            </div>

          </div>
        </div>
      </div>

      <br>
      <div class="col-md-12 col-sm-12" style="margin-bottom: 1em;">
        <h4>Circulares</h4>
        <div class="toggle toggle-transparent-body toggle-acordion">
          <div class="toggle" :class="{ active: activeAccordion === 'circulares' }">
            <label @click="toggleAccordion('circulares')">
              Documentos.
              <span
                class="arrow pi pi-chevron-down arrow-custom"
                :class="{ rotated: activeAccordion === 'circulares' }"
              ></span>
            </label>
            <div class="toggle-content" v-show="activeAccordion === 'circulares'">
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal('.pdf','21.2&nbsp;MB','','https://www.upq.mx/media/legal/docs/Acuerdo_queestablecendispoenmateri_controlinterno.pdf')" style="color:#151830">
                  <i class="fa fa-book"></i>&nbsp;""
                </a>
              </p>
            </div>

          </div>
        </div>
      </div>

      <br>
      <div class="col-md-12 col-sm-12" style="margin-bottom: 1em;">
        <h4>Catágolo</h4>
        <div class="toggle toggle-transparent-body toggle-acordion">
          <div class="toggle" :class="{ active: activeAccordion === 'catagolo' }">
            <label @click="toggleAccordion('catagolo')">
              Documentos.
              <span
                class="arrow pi pi-chevron-down arrow-custom"
                :class="{ rotated: activeAccordion === 'catalogo' }"
              ></span>
            </label>
            <div class="toggle-content" v-show="activeAccordion === 'catalogo'">
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal('.pdf','21.2&nbsp;MB','','https://www.upq.mx/media/legal/docs/Acuerdo_queestablecendispoenmateri_controlinterno.pdf')" style="color:#151830">
                  <i class="fa fa-book"></i>&nbsp;""
                </a>
              </p>
            </div>

          </div>
        </div>
      </div>

      <br>
      <div class="col-md-12 col-sm-12" style="margin-bottom: 1em;">
        <h4>Decretos</h4>
        <div class="toggle toggle-transparent-body toggle-acordion">
          <div class="toggle" :class="{ active: activeAccordion === 'decreto' }">
            <label @click="toggleAccordion('decreto')">
              Documentos.
              <span
                class="arrow pi pi-chevron-down arrow-custom"
                :class="{ rotated: activeAccordion === 'decreto' }"
              ></span>
            </label>
            <div class="toggle-content" v-show="activeAccordion === 'decreto'">
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal('.pdf','21.2&nbsp;MB','','https://www.upq.mx/media/legal/docs/Acuerdo_queestablecendispoenmateri_controlinterno.pdf')" style="color:#151830">
                  <i class="fa fa-book"></i>&nbsp;""
                </a>
              </p>
            </div>

          </div>
        </div>
      </div>

      <br>
      <div class="col-md-12 col-sm-12" style="margin-bottom: 1em;">
        <h4>Lineamientos</h4>
        <div class="toggle toggle-transparent-body toggle-acordion">
          <div class="toggle" :class="{ active: activeAccordion === 'lineamientos' }">
            <label @click="toggleAccordion('lineamientos')">
              Documentos.
              <span
                class="arrow pi pi-chevron-down arrow-custom"
                :class="{ rotated: activeAccordion === 'lineamientos' }"
              ></span>
            </label>
            <div class="toggle-content" v-show="activeAccordion === 'lineamientos'">
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal('.pdf','21.2&nbsp;MB','','https://www.upq.mx/media/legal/docs/Acuerdo_queestablecendispoenmateri_controlinterno.pdf')" style="color:#151830">
                  <i class="fa fa-book"></i>&nbsp;""
                </a>
              </p>
            </div>

          </div>
        </div>
      </div>

      <br>
      <div class="col-md-12 col-sm-12" style="margin-bottom: 1em;">
        <h4>Manuales</h4>
        <div class="toggle toggle-transparent-body toggle-acordion">
          <div class="toggle" :class="{ active: activeAccordion === 'manuales' }">
            <label @click="toggleAccordion('manuales')">
              Documentos.
              <span
                class="arrow pi pi-chevron-down arrow-custom"
                :class="{ rotated: activeAccordion === 'manuales' }"
              ></span>
            </label>
            <div class="toggle-content" v-show="activeAccordion === 'manuales'">
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal('.pdf','21.2&nbsp;MB','','https://www.upq.mx/media/legal/docs/Acuerdo_queestablecendispoenmateri_controlinterno.pdf')" style="color:#151830">
                  <i class="fa fa-book"></i>&nbsp;""
                </a>
              </p>
            </div>

          </div>
        </div>
      </div>

      <br>
      <div class="col-md-12 col-sm-12" style="margin-bottom: 1em;">
        <h4>Reglamentos</h4>
        <div class="toggle toggle-transparent-body toggle-acordion">
          <div class="toggle" :class="{ active: activeAccordion === 'regla' }">
            <label @click="toggleAccordion('regla')">
              Documentos.
              <span
                class="arrow pi pi-chevron-down arrow-custom"
                :class="{ rotated: activeAccordion === 'regla' }"
              ></span>
            </label>
            <div class="toggle-content" v-show="activeAccordion === 'regla'">
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal('.pdf','21.2&nbsp;MB','','https://www.upq.mx/media/legal/docs/Acuerdo_queestablecendispoenmateri_controlinterno.pdf')" style="color:#151830">
                  <i class="fa fa-book"></i>&nbsp;""
                </a>
              </p>
            </div>

          </div>
        </div>
      </div>

      <br>
      <div class="col-md-12 col-sm-12" style="margin-bottom: 1em;">
        <h4>Protocolos</h4>
        <div class="toggle toggle-transparent-body toggle-acordion">
          <div class="toggle" :class="{ active: activeAccordion === 'protocolo' }">
            <label @click="toggleAccordion('protocolo')">
              Documentos.
              <span
                class="arrow pi pi-chevron-down arrow-custom"
                :class="{ rotated: activeAccordion === 'protocolo' }"
              ></span>
            </label>
            <div class="toggle-content" v-show="activeAccordion === 'protocolo'">
              <p class="font-lato" style="margin-bottom: 1em;">
                <h4>1.- Protocolos:</h4>
                <a @click="openModal('.pdf','21.2&nbsp;MB','','https://www.upq.mx/media/legal/docs/Acuerdo_queestablecendispoenmateri_controlinterno.pdf')" style="color:#151830">
                  <i class="fa fa-book"></i>&nbsp;""
                </a>
              </p>
            </div>

          </div>
        </div>
      </div>

      <br>
      <div class="col-md-12 col-sm-12" style="margin-bottom: 1em;">
        <h4>Plan de Desarrollo Institucional</h4>
        <div class="toggle toggle-transparent-body toggle-acordion">
          <div class="toggle" :class="{ active: activeAccordion === 'plan' }">
            <label @click="toggleAccordion('plan')">
              Documentos.
              <span
                class="arrow pi pi-chevron-down arrow-custom"
                :class="{ rotated: activeAccordion === 'plan' }"
              ></span>
            </label>
            <div class="toggle-content" v-show="activeAccordion === 'plan'">
              <p class="font-lato" style="margin-bottom: 1em;">
                <a @click="openModal('.pdf','21.2&nbsp;MB','','https://www.upq.mx/media/legal/docs/Acuerdo_queestablecendispoenmateri_controlinterno.pdf')" style="color:#151830">
                  <i class="fa fa-book"></i>&nbsp;""
                </a>
              </p>
            </div>

          </div>
        </div>
      </div>

      <br><br><hr><br>
      
      <!-- Modal -->
      <div id="modalContainer" :style="{ display: showModal ? 'block' : 'none' }" v-if="showModal" class="center-modal">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 id="modal_Title" class="modal-title">{{ modalTitle }}</h4>
            </div>
            <div class="modal-body">
              <div class="containerr">
                <div class="text-center">
                  <a id="doc_url" :href="docUrl" class="btn btn-featured btn-red" target="_blank" download="">
                    <span class="btn-content">
                      <i class="pi pi-file-pdf"></i> DESCARGAR DOCUMENTO
                    </span>
                  </a>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" @click="closeModal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>

      
    </div>
  </div>
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