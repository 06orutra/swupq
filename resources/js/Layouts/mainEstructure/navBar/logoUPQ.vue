<template>
  <div class="vertical-split">
    <div class="icon_logo_UPQ">
      <img
        src='/storage/img/icon_logo_UPQ.png'
        style="border-radius: 50%; width: 145px; height: 145px; object-fit: cover; border: 1px solid rgb(0, 0, 0); background-color: rgb(255, 255, 255);"
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
  width: 9%;
  height: 18vh; /* Ajusta la altura de acuerdo a tus necesidades */
  position: relative; /* Para que .icon_logo_UPQ pueda usar posición absoluta */
  margin-left: 1.7%;
  margin-top:20px;
}

.component-a,
.component-b,
.component-c,
.component-d {
  flex: 1;
  margin-left: 8%;
  margin-right: 1%;
  margin-top: 5%; /* Ubicar en la mitad de la altura de la imagen */
  border: 2px solid rgb(1, 1, 1);
}

.component-a {
  background-color: rgb(4, 4, 102);
  height: 50%;
}

.component-b {
  background-color: rgb(71, 71, 224);
  height: 50%;
}

.component-c {
  background-color: rgb(246, 29, 29);
  height: 50%;
}

.component-d {
  background-color: rgb(255, 255, 255);
  height: 50%;
}

/* Ajustar tamaños de las imágenes y agregar más margen */

.icon_logo_UPQ {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 50px; /* Ajusta el tamaño de acuerdo a tus necesidades */
  height: 50px; /* Ajusta el tamaño de acuerdo a tus necesidades */
  position: absolute;
  top: 50%;
  left: 25%; /* Ajustar posición izquierda */
  right: -1%; /* Ajustar posición derecha */
  transform: translate(25%, -250%); /* Ajustar la posición vertical */
  z-index: 1;
  border-radius: 50%; /* Agregar el borde circular */}
</style>