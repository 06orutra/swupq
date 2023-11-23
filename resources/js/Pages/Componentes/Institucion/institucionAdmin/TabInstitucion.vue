<script>
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
import carruselEstructura from "@/Pages/Componentes/Home/carruselEstructura.vue";
import opcionesCarrusel from "@/Pages/Componentes/Home/opcionesCarrusel.vue";
import estructuraTextos from "@/Pages/Componentes/Home/estructuraTextos.vue";
import estructuraTexto2 from "@/Pages/Componentes/Home/estructuraTexto2.vue";
import estructuraImg from "@/Pages/Componentes/Home/estructuraImg.vue";
import Mascotas from "@/Pages/Componentes/Institucion/institucionAdmin/Mascotas.vue";
import filosofia from "@/Pages/Componentes/Institucion/institucionAdmin/filosofia.vue";
import Instalaciones from "@/Pages/Componentes/Institucion/institucionAdmin/Instalaciones.vue";
import Directorios from "@/Pages/Componentes/Institucion/institucionAdmin/Directorios.vue";
import historia from './historia.vue';
import igualdadLaboral from "@/Pages/Componentes/Institucion/institucionAdmin/igualdadLaboral.vue";
import MarcoJuridico from "@/Pages/Componentes/Institucion/institucionAdmin/MarcoJuridico.vue";
import MensajeRector from '@/Pages/Componentes/Institucion/institucionAdmin/mensajeRector.vue';
import ubicacion from "@/Pages/Componentes/Institucion/institucionAdmin/ubicacion.vue";
import modeloEducativo from "@/Pages/Componentes/Institucion/institucionAdmin/modeloEducativo.vue";
import sistemaCalidad from "@/Pages/Componentes/Institucion/institucionAdmin/sistemaCalidad.vue";

export default {
    components: {
        TabView,
        TabPanel,
        carruselEstructura,
        opcionesCarrusel,
        estructuraTextos,
        estructuraTexto2,
        estructuraImg,
        Mascotas,
        filosofia,
        historia,
        igualdadLaboral,
        Instalaciones,
        Directorios,
        MarcoJuridico,
        ubicacion,
        modeloEducativo,
        MensajeRector,
        sistemaCalidad,
    },
    methods: {
        updateCarouselSettings(settings) {
            this.navigation = settings.navigation;
            this.pagination = settings.pagination;
            this.startAutoPlay = settings.startAutoPlay;
            this.timeout = settings.timeout;
        }
    }
};
</script>

<template>
    <TabView ref="tabview1" class="p-3">
        <TabPanel header="Rector">
            <MensajeRector/>
        </TabPanel>
        <TabPanel header="Historia">
            <historia />
        </TabPanel>
        <TabPanel header="Filosofía">
            <filosofia />
        </TabPanel>
        <TabPanel header="Modelo Educativo">
            <modeloEducativo />
        </TabPanel>
        <TabPanel header="Mascotas">
            <Mascotas/>
        </TabPanel>
        <TabPanel header="Ubicación">
            <ubicacion />
        </TabPanel>
        <TabPanel header="Igualdad Laboral">
            <igualdadLaboral />
        </TabPanel>
        <TabPanel header="Directorios">
            <Directorios />
        </TabPanel>
        <TabPanel header="Marco Juridico">
            <MarcoJuridico />
        </TabPanel>
        <TabPanel header="Sistema de calidad">
            <sistemaCalidad/>
        </TabPanel>
        <TabPanel header="Instalaciones">
            <Instalaciones />
        </TabPanel>

    </TabView>
</template>