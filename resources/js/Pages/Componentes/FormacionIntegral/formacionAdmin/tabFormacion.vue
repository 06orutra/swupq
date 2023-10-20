<script>
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
import lenguaExtranjera from "@/Pages/Componentes/FormacionIntegral/formacionAdmin/lenguaExtranjera.vue";

export default {
    components: {
        TabView,
        TabPanel,
        lenguaExtranjera,
    },
}
</script>

<template>
    <TabView ref="tabview1" class="p-3">
        <TabPanel header="Lengua Extranjera">
            <lenguaExtranjera></lenguaExtranjera>
        </TabPanel>
        <TabPanel header="Desarrollo Humano">
            <h1>Aun no existo</h1>
        </TabPanel>

    </TabView>
</template>