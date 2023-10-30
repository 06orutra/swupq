<script>
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
import lenguaExtranjera from "@/Pages/Componentes/FormacionIntegral/formacionAdmin/lenguaExtranjera.vue";
import desarrolloHumano from "@/Pages/Componentes/FormacionIntegral/formacionAdmin/desarrolloHumano.vue";

export default {
    components: {
        TabView,
        TabPanel,
        lenguaExtranjera,
        desarrolloHumano,
    },
}
</script>

<template>
    <TabView ref="tabview1" class="p-3">
        <TabPanel header="Lengua Extranjera">
            <lenguaExtranjera></lenguaExtranjera>
        </TabPanel>
        <TabPanel header="Desarrollo Humano">
            <desarrolloHumano/>
        </TabPanel>

    </TabView>
</template>