<template>
  <div class="vertical-split">
    <div class="icon_logo_UPQ">
      <img
        src='/storage/img/icon_logo_UPQ.png'
        style="border-radius: 50%; width: 120px; height: 120px; object-fit: cover; border: 1px solid rgb(0, 0, 0); background-color: rgb(255, 255, 255);"
      />
    </div>
    <div class="component-a">
      <!-- Contenido del componente A -->
    </div>
    <div class="component-b">
      <!-- Contenido del componente B -->
    </div>
    <div class="component-c">
      <!-- Contenido del componente C -->
    </div>
    <div class="component-d">
      <!-- Contenido del componente D -->
    </div>
  </div>
</template>

<style>
/* Estilos del componente */
.vertical-split {
  display: flex;
  flex-direction: row; /* Cambiar a "row" para que los elementos estén uno al lado del otro */
  width: 10%;
  height: 16vh; /* Ajusta la altura de acuerdo a tus necesidades */
  position: relative; /* Para que .icon_logo_UPQ pueda usar posición absoluta */
}


/* Agregar margen del 0.9% para icon_menu y icon_chatbot */
.icon_menu,
.icon_chatbot {
  margin: 2%;
}

.vertical-split > div {
  flex: 1;
  margin-left: 2%;
  margin-right: 2%;
  margin-top: 20%;
}

.component-a {
  background-color: rgb(4, 4, 102);
  border: 1px solid rgb(1, 1, 1); /* Borde para visualizar las divisiones */
}

.component-b {
  background-color: rgb(71, 71, 224);
  border: 1px solid rgb(1, 1, 1); /* Borde para visualizar las divisiones */
}

.component-c {
  background-color: rgb(246, 29, 29);
  border: 1px solid rgb(1, 1, 1); /* Borde para visualizar las divisiones */
}

.component-d {
  background-color: rgb(255, 255, 255);
  border: 1px solid rgb(1, 1, 1); /* Borde para visualizar las divisiones */
}

/* Ajustar tamaños de las imágenes y agregar más margen */

.icon_logo_UPQ {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 80px; /* Ajusta el tamaño de acuerdo a tus necesidades */
  height: 80px; /* Ajusta el tamaño de acuerdo a tus necesidades */
  position: absolute;
  top: 53%;
  left: 0;
  right: -1%;
  transform: translate(15.5%, -100%);
  z-index: 3;
  border-radius: 50%; /* Agregar el borde circular */

}
</style>