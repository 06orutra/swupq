<script setup>

    import cicloAlumnado from './cicloAlumnado.vue';
    import modalModEdu from './modalModEdu.vue';

</script>

<template>
    <TabView ref="tabview1" class="p-3">
        <TabPanel header="Ciclo Alumnado">
            <cicloAlumnado/>
        </TabPanel>
        <TabPanel header="Modal">
            <modalModEdu/>
        </TabPanel>
    </TabView>
</template>