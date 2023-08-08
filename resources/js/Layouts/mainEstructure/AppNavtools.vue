<script setup>
import { ref } from 'vue';
import { useLayout } from '@/Layouts/composables/layout';

const scales = ref([8, 10, 12, 14, 16, 18, 20]);

const { changeThemeSettings, setScale, layoutConfig } = useLayout();

/* const onConfigButtonClick = () => {
    visible.value = !visible.value;
}; */
const onChangeTheme = (theme, mode) => {
    const elementId = 'theme-css';
    const linkElement = document.getElementById(elementId);
    const cloneLinkElement = linkElement.cloneNode(true);
    const newThemeUrl = linkElement.getAttribute('href').replace(layoutConfig.theme.value, theme);
    cloneLinkElement.setAttribute('id', elementId + '-clone');
    cloneLinkElement.setAttribute('href', newThemeUrl);
    cloneLinkElement.addEventListener('load', () => {
        linkElement.remove();
        cloneLinkElement.setAttribute('id', elementId);
        changeThemeSettings(theme, mode === 'dark');
    });
    linkElement.parentNode.insertBefore(cloneLinkElement, linkElement.nextSibling);
};

const decrementScale = () => {
    setScale(layoutConfig.scale.value - 2);
    applyScale();
};
//Se disminuye en 2 cada que se apriete el botón de menos
const incrementScale = () => {
    setScale(layoutConfig.scale.value + 2);
    applyScale();
};

const resetScale = () => {
    setScale(14);
    applyScale();
};
const applyScale = () => {
    document.documentElement.style.fontSize = layoutConfig.scale.value + 'px';
};

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
                    <Button icon="pi pi-plus" class=" left font-bold" @click="incrementScale()" :disabled="layoutConfig.scale.value === scales[scales.length - 1]" />
                    <i v-for="s in scales" :key="s" :class="{ 'text-primary-500': s === layoutConfig.scale.value }"></i>
                    <Button icon="pi pi-undo" severity="danger" class="center font-bold text-xl bg-gray-500 border-gray-500 border-noround" @click="resetScale()"/>
                    <Button icon="pi pi-minus" severity="danger" class="right font-bold text-xl" @click="decrementScale()" :disabled="layoutConfig.scale.value === scales[0]"/>

                </div>
                <div class="mx-2">
                    <Button icon="pi pi-moon" class="left surface-900 border-900" @click="onChangeTheme('bootstrap4-dark-purple', 'dark')">
                    </Button>
                    <Button icon="pi pi-sun" class="right surface-500 border-500" @click="onChangeTheme('bootstrap4-light-blue', 'light')"/>
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

.sii span span{
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
.center{
    width: 40px;
    height: 25px;
}

.right {
    border-radius: 0 25px 25px 0;
}
</style>