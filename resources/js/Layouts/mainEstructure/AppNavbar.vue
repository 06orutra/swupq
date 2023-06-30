<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from "vue";
import Menubar from 'primevue/menubar';


const items = ref([
    {
        label: 'INSTITUCIÓN'
    },
    {
        label: 'CARRERAS',
        items: [
            {
                label: 'Ingenieria en Mecatrónica'
            },
            {
                label: 'Ingenieria en Sistemas Computacionales'
            },
            {
                label: 'Ingenieria en Redes y telecomunicación'
            }
        ]
    },
    {
        label: 'POSGRADO',
    },
    {
        label: 'VINCULACIÓN'
    },
    {
        label: 'EDUCACIÓN CONTINUA'
    },
    {
        label: 'DEPORTE Y CULTURA',

    },
    {
        label: 'SERVICIOS ESTUDIANTILES'
    }
])
</script>

<template >
    <div>
        <Menubar :model="items" class="font-bold justify-content-between mr-5 bg-white-alpha-80">
            <template #start>
                <img alt="logo" src="/storage/img/logo.svg" height="80" class="mr-2" />
            </template>
        </Menubar>
    </div>

<!--
    <div>
        <Menubar :model="items" class="font-bold bg-white-alpha-80 justify-content-evenly text-white bar">

        </Menubar>
    </div>
-->
</template>

<style lang="scss" scoped>
::v-deep(.bar) {

    .p-menuitem-link,
    .-menuitem-content,
    .p-menubar,
    .p-menuitem-icon,
    .p-submenu-icon,

    .p-menubar-button {
        background-color: #24356A;
        border-color: #24356A;
        color: var(primary-50);
        margin-left: 1rem;
        margin-right: 1rem;
    }

    .p-menuitem-text{
        color: var(primary-50);
    }
}
</style>


