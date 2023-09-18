<template>
    <div id="app">
      <img
        src="storage/img/icon_menu.png"
        alt="Menu Icon"
        class="menu-icon"
        @click="showMenu = !showMenu"
      />
  
      <ul class="menu" v-show="showMenu" @mouseleave="closeActiveSubMenu">
        <li v-for="(menuItem, index) in menuItems" :key="index">
          <div
            @mouseover="expandSubMenu(index)"
            @click="toggleSubMenu(index)"
            :style="{ color: menuItem.textColor }"
            :class="{ 'menu-block': true, 'active': menuItem.expanded }"
          >
            {{ menuItem.label }}
          </div>
          <transition name="fade">
            <ul v-if="menuItem.expanded" class="sub-menu">
              <li
                v-for="(subMenuItem, subIndex) in menuItem.subMenuItems"
                :key="subIndex"
              >
                <div
                  :style="{ color: subMenuItem.textColor }"
                  :class="{ 'sub-menu-block': true, 'active': subMenuItem.expanded }"
                >
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
                  { label: '- Mensaje del rector' },
              { label: '- Directorio' },
              { label: '- Organigrama' },
              { label: '- Marco jurídico' },
              { label: '- Igualdad Laboral y No Discriminacion' },
              { label: '- Sistema de Gestión de la Calidad' },
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
  };
  </script>
  
  
  <style scoped>
  .menu-icon {
    cursor: pointer;
    width: 7vh;
    height: 7vh;
    border: 1px solid black;
    position: absolute;
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
    position: absolute;
    left: 6%;
    top: calc(37% + 1vh);
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
    margin: 0;
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
  
  @media (min-width: 769px) and (max-width: 1200px) {
      .menu-icon {
      width:7vh ;
      height: 7vh;
    }
    .menu {
      width:35%;
      top: calc(50% + 1vh);
    }
  
  }
  
  @media (min-width: 1201px) {
      .menu-icon {
      width:7.5vh ;
      height: 7.5vh;
    }
  }
  </style>