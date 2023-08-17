<script setup>
import { ref } from 'vue';
const menu = ref();
const item = ref([
    {
        label: 'INFORMACIÓN PÚBLICA',
    },
    {
        label: 'ASPIRANTE',
    },
    {
        label: 'ALUMNADO',
    },
    {
        label: 'EGRESADA/EGRASADO',
    },
    {
        label: 'DOCENTE',
    },
]);

const toggle = (event) => {
    menu.value.toggle(event);
};
</script>


<template>
    <div>
        <Toolbar class="bg-white-alpha-80 p-0">
            <template #start>

                <div class="mx-2">
                    <Button label="A+" class="left font-bold text-xl"></Button>
                    <Button label="A-" severity="danger" class="right font-bold text-xl" />

                </div>
                <div class="mx-2">
                    <Button icon="pi pi-moon" class="left surface-900 border-900"></Button>
                    <Button icon="pi pi-sun" class="right surface-500 border-500" />
                </div>
                <div class="mx-2">
                    <Button icon="pi pi-volume-up" class="left"></Button>
                    <Button icon="pi pi-volume-off" severity="danger" class="right" />

                </div>

            </template>

            <template #center>
                <h2 class="title">UNIVERSIDAD <span>POLITÉCNICA</span> DE QUERÉTARO</h2>
            </template>

            <template #end>
                <Button label="SII" link class="sii text-4xl">S <span>I<span>I</span></span></Button>
                <Button type="button" label="COMUNIDAD" @click="toggle" aria-haspopup="true" aria-controls="overlay_menu" rounded class="comuni mr-6"/>
                <Menu ref="menu" id="overlay_menu" :model="item" :popup="true" />
                <Toast />

            </template>
        </Toolbar>
    </div>
</template>



<style lang="scss" scoped>
/*::v-deep(.comuni) {

    .p-splitbutton-menubutton,
    .p-splitbutton-defaultbutton,
    .p-splitbutton {
        font-weight: bold;
        color: var(surface-0);
        background-color: #24356A;
        border-color: #24356A;

    }
}*/

.comuni{
    background-color: #24356A;
    height: 25px;
    font-weight: bold;
}


.title {
    color: #24356A;
    font-weight: bold;
    border-color: #24356A;
}

.title span {
    color: #D71E39;
}

.sii {
    color: #24356A;
    font-weight: bold;
}

.sii span {
    color: #1B4D9A;
}

.sii span span {
    color: #D71E39;
}

.left {
    border-radius: 25px 0 0 25px;
}

.left,
.right {
    width: 40px;
    height: 25px;
}

.right {
    border-radius: 0 25px 25px 0;
}
</style>