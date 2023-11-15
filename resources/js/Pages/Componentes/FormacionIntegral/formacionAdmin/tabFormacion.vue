<script>
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
import lenguaExtranjera from "@/Pages/Componentes/FormacionIntegral/formacionAdmin/lenguaExtranjera.vue";
import desarrolloHumano from "@/Pages/Componentes/FormacionIntegral/formacionAdmin/desarrolloHumano.vue";
import Representativos from  "@/Pages/Componentes/FormacionIntegral/formacionAdmin/representativo.vue";

export default {
    components: {
        TabView,
        TabPanel,
        lenguaExtranjera,
        desarrolloHumano,
        Representativos
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
        <TabPanel header="Representativos">
            <Representativos/>
        </TabPanel>

    </TabView>
</template>