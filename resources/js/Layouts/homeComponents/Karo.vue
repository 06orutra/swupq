<template>
    <div class="contenedor">
      <div class="parallax">
        <div class="caja">
            <a href="https://www.upq.mx/igualdad_laboral/assets/pol%c3%adtica-de-igualdad-laboral-y-no-discriminaci%c3%b3n..pdf" target="_blank">
                <p><strong>CONSULTA AQUÍ</strong></p>
                <P style="line-height: 0.1;">LA POLÍTICA DE IGUALDAD LABORAL Y NO DISCRIMANCIÓN A DETALLE</P>
                <p style="line-height: 1;"></p>
            </a>
        </div>
      </div>
    </div>
  </template>
  
  <style scoped>
  .contenedor {
    width: 100%;
    height: 300px;
    overflow: hidden;
    position: relative;
    display: flex;
    z-index: 999;
    top: 0px;
    left: 0px;
  }
  
  .parallax {
    background-image: url('http://127.0.0.1:8000/storage/2023-10-10%2017-37-35_fondo_banner_2-01.jpg');
    background-size: cover;
    background-attachment: fixed; /* Esto crea el efecto de parallax */
    width: 100%;
    height: 100%;
    position: absolute;
    z-index: -10;
    background-position: center center;
  }

  .caja{
    border: 2px solid rgb(255, 255, 255);
    left: 350px;
    right: 350px;
    border-radius: 10px;
    position: absolute;
    top: 100px;
    width: auto;
    padding: 20px;
    text-align: center;
    font-size: 20px;
    margin-bottom: 5px;
    color: white;
    transition: border-color 0.3s, background-color 0.3s;
    z-index: -2;
  }

  .caja:hover {
    border-color: rgb(168, 14, 14); /* Cambia el color del borde a rojo al pasar el mouse */
    background-color: rgba(255, 255, 255, 0.571); /* Cambia el fondo a blanco al pasar el mouse */
    color:rgb(168, 14, 14);
  }

  .caja a {
    text-decoration: none; /* Quita el subrayado del enlace */
    color: inherit; /* Hereda el color del texto de la caja */
    display: block; /* Hace que el enlace ocupe todo el espacio de la caja */
    width: 100%;
    height: 100%;
  }
  </style>
  