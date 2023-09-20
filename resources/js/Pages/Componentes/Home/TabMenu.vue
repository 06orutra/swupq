<script>
import carruselPrincipal from "@/Pages/Componentes/Home/carruselPrincipal.vue";
import carruselNoticias from "@/Pages/Componentes/Home/carruselNoticias.vue";
import carruselDividido from "@/Pages/Componentes/Home/carruselDividido/carruselDividido.vue";
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';

export default {
    components: {
    TabView,
    TabPanel,
    carruselPrincipal,
    carruselNoticias,
    carruselDividido,
},
}
</script>

<template>
        <TabView ref="tabview1" class="p-3">
            <TabPanel header="Carrusel Principal">
                <carruselPrincipal />
            </TabPanel>
            <TabPanel header="Carrusel Secundario">
                <carruselNoticias />
            </TabPanel>
            <TabPanel header="Carrusel Dividido">
                <carruselDividido/>
            </TabPanel>
        </TabView>
</template>