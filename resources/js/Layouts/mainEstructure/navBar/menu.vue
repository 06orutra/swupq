<template>
  <div id="app">
    <img src="/storage/img/icon_menu.svg" alt="Menu Icon" class="menu-icon" @click="showMenu = !showMenu" />

    <ul class="menu" v-show="showMenu" @mouseleave="closeActiveSubMenu">
      <li v-for="(menuItem, index) in menuItems" :key="index">
        <div @mouseover="expandSubMenu(index)" :style="{ color: menuItem.textColor }"
          :class="{ 'menu-block': true, 'active': menuItem.expanded }">
          {{ menuItem.label }}
        </div>
        <transition name="fade">
          <ul v-if="menuItem.expanded" class="sub-menu">
            <li v-for="(subMenuItem, subIndex) in menuItem.subMenuItems" :key="subIndex">
              <div :style="{ color: subMenuItem.textColor }"
                :class="{ 'sub-menu-block': true, 'active': subMenuItem.expanded }"
                @click="navigateToRoute(subMenuItem.routeName)">
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
            { label: '- Mensaje del rector', routeName: '/institucion/filosofia' },
            { label: '- Filosofía', routeName: 'institucion/filosofia/' },
            { label: '- Directorio', routeName: 'institucion/filosofia' },
            { label: '- Organigrama', routeName: '/institucion/filosofia/' },
            { label: '- Marco jurídico', routeName: '/institucion/filosofia/' },
            { label: '- Igualdad Laboral y No Discriminacion', routeName: '/institucion/filosofia/' },
            { label: '- Sistema de Gestión de la Calidad', routeName: '/institucion/filosofia/' },
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
            { label: 'Opción 1' },
            { label: 'Opción 2' },
            { label: 'Opción 3' },
          ],
        },
        {
          expanded: false,
          textColor: '#ffffff',
          label: 'VINCULACIÓN',
          subMenuItems: [
            { label: 'Opción 1' },
            { label: 'Opción 2' },
            { label: 'Opción 3' },
          ],
        },
        {
          expanded: false,
          textColor: '#ffffff',
          label: 'SERVICIOS ESTUDIANTILES',
          subMenuItems: [
            { label: 'Opción 1' },
            { label: 'Opción 2' },
            { label: 'Opción 3' },
          ],
        },
        {
          expanded: false,
          textColor: '#ffffff',
          label: 'CONVOCATORIAS',
          subMenuItems: [
            { label: 'Opción 1' },
            { label: 'Opción 2' },
            { label: 'Opción 3' },
          ],
        },
        {
          expanded: false,
          textColor: '#ffffff',
          label: 'CALENDARIO ESCOLAR',
          subMenuItems: [
            { label: 'Opción 1' },
            { label: 'Opción 2' },
            { label: 'Opción 3' },
          ],
        },
      ],
    };
  },
  methods: {
    navigateToRoute(routeName) {
      window.location.href = routeName;
      console.log('hola: ' + routeName);
    },

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
    closeActiveSubMenu() {
      if (this.activeSubMenuIndex !== null) {
        this.menuItems[this.activeSubMenuIndex].expanded = false;
        this.activeSubMenuIndex = null;
      }
    },
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
    closeActiveSubMenu() {
      if (this.activeSubMenuIndex !== null) {
        this.menuItems[this.activeSubMenuIndex].expanded = false;
        this.activeSubMenuIndex = null;
        this.showMenu = false;
        this.activeSubMenuIndex = null;
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
  transform: translateX(20px) translateY(95px);
}

.content {
  margin-left: 15%;
  /* Resto de los estilos para el contenido principal */
}

.menu {
  list-style-type: none;
  padding: 0;
  position: fixed;
  left: 3%;
  top: calc(24% + 1vh);
  z-index: 999;
  width: 15%;
  background-color: rgba(0, 10, 87, 0.8);
  transition: transform 0.5s ease;
}

.menu li {
  display: block;
  background: transparent;
  color: #fff;
}

.menu .menu-block {
  display: block;
  padding: 10px;
  transition: background-color 0.3s;
}

.menu .menu-block:hover {
  background-color: rgba(0, 30, 255, 0.8);
}

/* Corrección de posición y recursividad */
.menu .sub-menu {
  position: absolute;
  left: 100%;
  top: 0;
  margin-left: 0;
  padding: 0;
  width: 300px;
  z-index: 2;
  background-color: rgba(0, 26, 226, 0.8);
}

.menu .sub-menu-block {
  display: block;
  padding: 10px;
  transition: background-color 0.3s;
}

.menu .sub-menu-block:hover {
  background-color: rgba(0, 10, 87, 0.8);
}

/*Vista del tamanño del icono de menu en 768px */
@media (min-width: 701px) {

  /*Este estilo es para el tamaño del icono*/
  .menu-icon {
    width: 6vh;
    height: 6vh;
    margin-right: 4%;
  }

  .content {
    margin-left: 20%;
    /* Resto de los estilos para el contenido principal */
  }
}

/*Aqui se modifica la posocion del menu para la resolucion en 768px*/
.menu {
  width: 20%;
  top: calc(36% + 1vh);
}

/*Vista 1024px*/
@media (min-width: 1001px) {
  .menu-icon {
    width: 7.5vh;
    height: 7.5vh;
  }

  .menu {
    width: 15%;
    top: calc(38% + 1vh);
  }
}

/*Vista normal, ajuste del menu y submenu*/
@media(min-width: 1141px) {
  .menu-icon {
    width: 7.5vh;
    height: 7.5vh;
  }

  .menu {
    width: 15%;
    top: calc(30% + 1vh);
  }
}

/*Vista 4k*/
@media (min-width: 2560px) {
  .menu-icon {
    width: 7.5vh;
    height: 7.5vh;
  }

  .menu {
    width: 15%;
    top: calc(19% + 1vh);
  }
}

/* Estilo para la vista movil, acomoda los botones de forma automatica con coordenadas */
/*Este sirve para la vision movil*/
@media (max-width: 520px) {
  .menu-icon {
    width: 4.7vh;
    height: 4.7vh;
    transform: translateX(275px) translateY(4px);
    margin: .9%;
  }
}

/*vista movil*/
@media (max-width: 320px) {
  .menu-icon {
    width: 4.7vh;
    height: 4.7vh;
    transform: translateX(245px) translateY(4px);
    margin: .9%;
  }
}

/*Aqui se terminan los estilos de reposicionamiento */
/* e inician los de vista movil*/
@media (min-width: 320px) and (max-width: 520px) {
  .menu {
    list-style-type: none;
    padding: 0;
    position: fixed;
    /* Cambia de "absolute" a "relative" para que los elementos se coloquen en el flujo normal del documento */
    width: 40%;
    /* Ocupa todo el ancho disponible */
    background-color: rgba(0, 10, 87, 0.8);
    transition: transform 0.5s ease;
    top: calc(-10% + 20vh);
    left: 6%;
  }

  .menu li {
    display: block;
    background: transparent;
    color: #ffffff;
  }

  .menu .menu-block {
    display: block;
    padding: 10px;
    transition: background-color 0.3s;
  }

  .menu .menu-block:hover {
    background-color: rgba(0, 30, 255, 0.8);
  }

  .menu .sub-menu {
    position: absolute;
    left: 100%;
    /* Coloca el sub-menú a la derecha del primer bloque */
    top: 0;
    margin: 0;
    padding: 0;
    width: 250px;
    z-index: 2;
    background-color: rgba(0, 26, 226, 0.8);
  }

  .menu .sub-menu-block {
    display: block;
    padding: 10px;
    transition: background-color 0.3s;
  }

  .menu .sub-menu-block:hover {
    background-color: rgba(0, 10, 87, 0.8);
  }
}
</style>