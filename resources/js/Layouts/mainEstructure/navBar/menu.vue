<template>
  <div id="app">
      <img src="/storage/img/icon_menu.svg"  alt="Menu Icon" class="menu-icon" @click="showMenu = !showMenu" />

    <ul class="combined-menu" v-show="showMenu" @mouseleave="closeActiveSubMenu">
      <li v-for="(menuItem, index) in menuItems.concat(menuus)" :key="index">
        <div v-if="menuItem.subMenuItems" @mouseover="expandSubMenu(index)" @click="toggleSubMenu(index)"
          :style="{ color: menuItem.textColor }" :class="{ 'menu-block': true, 'active': menuItem.expanded }">
          {{ menuItem.label }}
        </div>

        <div v-else @click="redirectTo(menuItem.path)" :style="{ color: menuItem.textColor }" class="menu-block">
          {{ menuItem.label }}
        </div>

        <transition name="fade">
          <ul v-if="menuItem.expanded && menuItem.subMenuItems" class="sub-menu">
            <li v-for="(subMenuItem, subIndex) in menuItem.subMenuItems" :key="subIndex">
              <div @click="redirectTo(subMenuItem.path)" :style="{ color: subMenuItem.textColor }"
                class="sub-menu-block">
                {{ subMenuItem.label }}
              </div>
            </li>
          </ul>
        </transition>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      menuicon: {
        top: '28.1%', // Ajusta esto a la posición inicial del menú-icon
        left: '10px', // Ajusta esto a la posición inicial del menú-icon
      },
      showMenu: false,
      activeSubMenuIndex: null,
      menuItems: [
        {
          expanded: false,
          textColor: '#ffffff',
          label: 'INSTITUCIÓN',
          subMenuItems: [
            { label: '- Mensaje del rector', path: '/institucion/mensajeRector/' },
            { label: '- Historia', path: '/institucion/mensajeRector/' },
            { label: '- Filosofia', path: '/institucion/mensajeRector/' },
            { label: '- Modelo educativo', path: '/institucion/mensajeRector/' },
            { label: '- Mascotas', path: '/institucion/mascotas/' },
            { label: '- Marco jurídico', path: '/institucion/marcoJuridico/' },
            { label: '- Organigrama' },
            { label: '- Directorio', path: '/institucion/directorio/' },
            { label: '- Ubicación', path: '/institucion/ubicacion/' },
            { label: '- Instalaciones', path: '/institucion/instalaciones/' },
            { label: '- Igualdad Laboral y No Discriminacion', path: '/institucion/laborEq/' },
            { label: '- Sistema de Gestión de la Calidad', path: '/institucion/sistemaCalidad/' },
          ],
        },
        {
          expanded: false,
          textColor: '#ffffff',
          label: 'CARRERAS',
          subMenuItems: [
            { label: 'Opción 1' },
            { label: 'Opción 2' },
            { label: 'Opción 3' },
          ],
        },
        {
          expanded: false,
          textColor: '#ffffff',
          label: 'POSGRADO',
          subMenuItems: [
            { label: 'Opción 1' },
            { label: 'Opción 2' },
            { label: 'Opción 3' },
          ],
        },
        {
          expanded: false,
          textColor: '#ffffff',
          label: 'EDUCACIÓN CONTINUA',
          subMenuItems: [
            { label: 'Opción 1' },
            { label: 'Opción 2' },
            { label: 'Opción 3' },
          ],
        },
        {
          expanded: false,
          textColor: '#ffffff',
          label: 'DEPORTE Y CULTURA',
          subMenuItems: [
            { label: 'Lengua extranjera', path:'/FormacionIntegral/lenguaExtranjera/' },
            { label: 'Desarrollo Humano', path:'/FormacionIntegral/DesarrolloHumano/' },
            { label: 'Representativos', path:'/FormacionIntegral/Representativos/' },
          ],
        },
      ],
      menuus: [
      {
          expanded: false,
          textColor: '#ffffff',
          label: 'VINCULACIÓN',
          path: 'https://guao.org/sites/default/files/biblioteca/Álgebra%20de%20Baldor.pdf',
        },
        {
          expanded: false,
          textColor: '#ffffff',
          label: 'SERVICIOS ESTUDIANTILES',
          path: 'https://guao.org/sites/default/files/biblioteca/Álgebra%20de%20Baldor.pdf',
        },
        {
          expanded: false,
          textColor: '#ffffff',
          label: 'CONVOCATORIAS',
          path: 'https://guao.org/sites/default/files/biblioteca/Álgebra%20de%20Baldor.pdf',
        },
        {
          expanded: false,
          textColor: '#ffffff',
          label: 'CALENDARIO ESCOLAR',
          path: 'https://guao.org/sites/default/files/biblioteca/Álgebra%20de%20Baldor.pdf',
        },
      ]
    };
  },
  methods: {
    expandSubMenu(index) {
      if (this.activeSubMenuIndex !== null) {
        this.menuItems[this.activeSubMenuIndex].expanded = false;
      }
      this.menuItems[index].expanded = true;
      this.activeSubMenuIndex = index;
    },
    toggleSubMenu(index) {
      if (this.activeSubMenuIndex !== null && this.activeSubMenuIndex !== index) {
        this.menuItems[this.activeSubMenuIndex].expanded = false;
      }

      this.menuItems[index].expanded = !this.menuItems[index].expanded;
      this.activeSubMenuIndex = this.menuItems[index].expanded ? index : null;
    },
    redirectTo(path) {
      if (path.startsWith('/')) {
        // Si es una ruta interna, redirige internamente
        window.location.href = path;
      } else {
        // Si es un enlace externo, redirige a la URL externa
        window.open(path);
      }
    },
    closeActiveSubMenu() {
      if (this.activeSubMenuIndex !== null) {
        this.menuItems[this.activeSubMenuIndex].expanded = false;
        this.activeSubMenuIndex = null;
        setTimeout(() => {
          this.showMenu = false;
        }, 2000);
      }
    },
    closeMenuAndSubMenu() {
      if (this.showMenu || this.activeSubMenuIndex !== null) {
        this.showMenu = false;
        this.activeSubMenuIndex = null;
      }
    },
  },
};
</script>

<style scoped>

.menu-icon {
  cursor: pointer;
  width: 7vh;
  height: 7vh;
  border: 1px solid black;
  position: fixed;
  z-index: 999;
  transform: translateX(40px) translateY(105px);
}

.content {
  margin-left: 15%;
  /* Resto de los estilos para el contenido principal */
}

.combined-menu {
  list-style-type: none;
  padding: 0;
  position: fixed;
  left: 4%;
  top: calc(32% + 1vh);
  z-index: 999;
  width: 15%;
  background: rgba(0, 10, 87, 0.8);
  transition: transform 0.5s ease;
}

.combined-menu li {
  display: block;
  background: transparent;
  color: #fff;
  position: relative;
  width: 100%;
}

.combined-menu .menu-block {
  display: block;
  padding: 10px;
  transition: background-color 0.3s;
}

.combined-menu .menu-block:hover {
  background-color: rgba(0, 30, 255, 0.8);
}

/* Corrección de posición y recursividad */
.combined-menu .sub-menu {
  position: absolute;
  left: 100%;
  top: 0.1rem;
  margin-left: 0;
  padding: 0;
  width: 250px;
  z-index: 2;
  background-color: rgba(0, 26, 226, 0.8);
}

.combined-menu .sub-menu-block {
  display: block;
  padding: 10px;
  transition: background-color 0.3s;
}

.combined-menu .sub-menu-block:hover {
  background-color: rgba(0, 10, 87, 0.8);
}

@media (min-width: 521px) and (max-width: 768px) {
  .menu-icon {
    width: 6vh;
    height: 43px;
    cursor: pointer;
    border: 1px solid black;
    position: fixed;
    z-index: 999;
    transform: translateX(45px) translateY(75px);
  }
  .combined-menu {
    width:20%;
    left: 55px;
    top: 230px;
  }
}

@media (min-width: 1024px) and (max-width: 1201px) {
  .menu-icon {
    width: 43px;
    height: 43px;
    cursor: pointer;
    border: 1px solid black;
    position: fixed;
    z-index: 999;
    transform: translateX(45px) translateY(75px);
  }

  .combined-menu {
    width: 20%;
    left: 55px;
    top: 230px;
  }
}

@media (min-width: 1202px) and (max-width: 1441px) {
  .menu-icon {
    width: 55px;
    height: 55px;
  }

  .combined-menu {
    width: 15%;
    left: 50px;
    top: 247px;
  }
}

@media (min-width: 1442px) and (max-width: 1499px) {
  .menu-icon {
    width: 55px;
    height: 55px;
    transform: translateX(42px) translateY(105px);
  }

  .combined-menu {
    width: 15%;
    left: 52px;
    top: 250px;
  }
}

@media (min-width: 1500px) and (max-width: 1920px) {
  .menu-icon {
    width: 55px;
    height: 55px;
    transform: translateX(42px) translateY(103px);
  }

  .combined-menu {
    width: 15%;
    left: 53px;
    top: 250px;
  }
}

@media (min-width: 1921px) and (max-width:2561px) {
  .menu-icon {
    width: 85px;
    height: 85px;
    transform: translateX(40px) translateY(150px);
  }

  .combined-menu {
    width: 8%;
    left: 50px;
    top: 325px;
  }
}

/* Estilo para la vista movil, acomoda los botones de forma automatica con coordenadas */

@media (min-width:420px) and (max-width: 520px) {
  .menu-icon {
    width: 30px;
    height: 30px;
    transform: translateX(240px) translateY(10px);
    margin: .9%;
  }

  .combined-menu {
    width: 40%;
    left: 0%;
    top: 69px;
  }
}

@media (min-width: 522px) and (max-width: 769px) {
  .menu-icon {
    width: 43px;
    height: 43px;
    transform: translateX(46px) translateY(75px);
  }

  .combined-menu {
    width: 26%;
    left: 37px;
    top: 235px;
  }
}

@media (max-width: 320px) {
  .menu-icon {
    width: 30px;
    height: 30px;
    margin: 0%;
    transform: translateX(240px) translateY(8px);
  }

  .combined-menu {
    width: 40%;
    left: 0%;
    top: 70px;
  }
}

@media (min-width: 321px) and (max-width: 415px) {
  .menu-icon {
    width: 30px;
    height: 30px;
    transform: translateX(240px) translateY(8px);
  }

  .combined-menu {
    width: 40%;
    left: 0%;
    top: 70px;
  }
}
</style>
