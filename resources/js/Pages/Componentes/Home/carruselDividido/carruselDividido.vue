<script setup>
import Videos from "@/Pages/Componentes/Home/carruselDividido/Videos.vue";
import primerCarrusel from "./primerCarrusel.vue";
</script>


<template>
        <TabView ref="tabview2" class="p-2">
            <TabPanel header="Videos">
                <Videos/>
            </TabPanel>
            <TabPanel header="Carrusel 1">
                <primerCarrusel/>
            </TabPanel>
            <TabPanel header="Carrusel 2">
                <Videos/>
            </TabPanel>
            <TabPanel header="Carrusel 3">
                <Videos/>
            </TabPanel>
        </TabView>
</template>

