<template>
  <div class="w-full" style="width: 100%">
    <div class="floating-component">
      <Toolbar class="bg-white-alpha-80 p-0" style="width: 100%;">
        <template #start style="width: 100%">
          <div class="mx-2">
            <Button icon="pi pi-search-plus" class="left font-bold" @click="incrementScale"
              :disabled="layoutConfig.scale.value === scales[scales.length - 1]" />
            <i v-for="s in scales" :key="s" :class="{ 'text-primary-500': s === layoutConfig.scale.value }"></i>
            <Button icon="pi pi-undo" severity="danger"
              class="center font-bold bg-gray-600 border-gray-500 border-noround" @click="resetScale" />
            <Button icon="pi pi-search-minus" severity="danger" class="right font-bold text-xl" @click="decrementScale"
              :disabled="layoutConfig.scale.value === scales[0]" />
          </div>
          <div class="mx-2">
            <Button icon="pi pi-moon" class="left surface-900 border-900"
              @click="onChangeTheme('bootstrap4-dark-purple', 'dark')"></Button>
            <Button icon="pi pi-sun" class="right surface-500 border-500"
              @click="onChangeTheme('bootstrap4-light-blue', 'light')" />
          </div>
          <div class="mx-2">
            <Button :icon="isVolumeOn ? 'pi pi-volume-up' : 'pi pi-volume-off'"
              :class="['center', isVolumeOn ? 'bg-blue-400' : 'bg-red-500']" @click="toggleVolume" />
          </div>
        </template>
        <template #center class="inline-flex" style="width: 100%">
          <h2 class="title hidden xl:inline-flex" style="white-space: pre-wrap;">
            UNIVERSIDAD <span>POLITÉCNICA</span> DE QUERÉTARO
          </h2>
          <h2 class="title hidden md:inline-flex xl:hidden" style="white-space: pre-wrap;">
            U.P.Q.
          </h2>
        </template>
        <template #end style="width: 100%">
          <div class="relative sm:left-0">
            <Button label="SII" link class="sii text-4xl">S <span>I<span>I</span></span></Button>
            <Button type="button" @click="toggle" aria-controls="overlay_menu" rounded class="comuni mr-6 mb-3">
              COMUNIDAD
              <Menu ref="menu" id="overlay_menu" :model="item" :popup="true" />
            </Button>
            <div v-if="windowWidth >= 320 && windowWidth <= 520">
              <menuvue />
              <polovue />
            </div>
          </div>
        </template>
      </Toolbar>
    </div>
  </div>
</template>


<script setup>
import { ref, onMounted } from 'vue';
import { useLayout } from '@/Layouts/composables/layout';
import menuvue from "@/Layouts/mainEstructure/navBar/menu.vue";
import polovue from "@/Layouts/mainEstructure/navBar/Polo.vue";


const isVolumeOn = ref(true); // Inicialmente el volumen está activo
const scales = ref([8, 10, 12, 14, 16, 18, 20]);
const { changeThemeSettings, setScale, layoutConfig } = useLayout();
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

const toggleVolume = () => {
  isVolumeOn.value = !isVolumeOn.value;
};

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
</script>

<style lang="scss" scoped>
.floating-component {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  background-color: rgba(255, 255, 255, 0.9);
  z-index: 999;
}

.comuni {
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

.center {
  width: 40px;
  height: 25px;
}

.right {
  border-radius: 0 25px 25px 0;
}
</style>
