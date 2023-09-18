<script>
import carruselPrincipal from "@/Pages/Componentes/Home/carruselPrincipal.vue";
import Videos from "@/Pages/Componentes/Home/Videos.vue";
import carruselNoticias from "@/Pages/Componentes/Home/carruselNoticias.vue";

import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';

export default {
    components: {
    TabView,
    TabPanel,
    carruselPrincipal,
    Videos,
    carruselNoticias,
},
}
</script>

<template>
    <AppLayout title="Home">
        <TabView ref="tabview1" class="p-3">
            <TabPanel header="Banner Principal">
                <carruselPrincipal />
            </TabPanel>
            <TabPanel header="Banner Noticias">
                <carruselNoticias />
            </TabPanel>
            <TabPanel header="Videos">
                <Videos />
            </TabPanel>
            <TabPanel header="Certificaciones">
                <Certificaciones />
            </TabPanel>
        </TabView>
    </AppLayout>
</template>