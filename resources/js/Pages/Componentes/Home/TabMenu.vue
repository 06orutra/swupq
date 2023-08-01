<script>
import Banner from "@/Pages/Componentes/Home/Banner.vue";
import Videos from "@/Pages/Componentes/Home/Videos.vue";

import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';

export default {
    components: {
    TabView,
    TabPanel,
    Banner,
    Videos,
},
}
</script>

<template>
    <AppLayout title="Home">
        <TabView ref="tabview1" class="p-3">
            <TabPanel header="Banner">
                <Banner />
            </TabPanel>
            <TabPanel header="Videos">
                <Videos />
            </TabPanel>
            <TabPanel header="Certificaciones">
                <Certificaciones />
            </TabPanel>
            <TabPanel header="Galeria">
                <Galeria />
            </TabPanel>
        </TabView>
    </AppLayout>
</template>