<template>
    <img id="responsive-image" src="https://www.upq.mx/media/slider/INSTALACIONES.png" alt="Image" />
    <div class="blue-box, box">
      <slot>
        
      </slot>
    </div>
  </template>
  
  <style>
  #responsive-image {
    width: 100%; 
    height: auto; 
    display: block; /* Asegura que la imagen sea un elemento de bloque para eliminar cualquier espacio en línea */
  }
  .box{
    width: auto ; 
    height: 80px; 
    background-color: #8C2437;
  }
  @media (max-width: 2560px) {
    /* Por ejemplo, ajustar el tamaño del texto en pantallas más pequeñas */
    .box{
      width: auto ; 
    height: 80px; 
    }
  }
  @media (max-width: 1440px) {
    /* Por ejemplo, ajustar el tamaño del texto en pantallas más pequeñas */
    .box{
      width: auto ; 
    height: 80px; 
    }
  }
  @media (max-width: 1024px) {
    /* Por ejemplo, ajustar el tamaño del texto en pantallas más pequeñas */
    .box{
      width: auto ; 
    height: 70px; 
    }
  }
  @media (max-width: 768px) {
    /* Por ejemplo, ajustar el tamaño del texto en pantallas más pequeñas */
    .box{
      width: auto ; 
    height: 60px; 
    }
  }
  @media (max-width: 425px) {
    /* Por ejemplo, ajustar el tamaño del texto en pantallas más pequeñas */
    .box{
      width: auto ; 
    height: 50px; 
    }
  }
  @media (max-width: 375px) {
    /* Por ejemplo, ajustar el tamaño del texto en pantallas más pequeñas */
    .box{
      width: auto ; 
    height: 35px; 
    }
  }
  @media (max-width: 320px) {
    /* Por ejemplo, ajustar el tamaño del texto en pantallas más pequeñas */
    .box{
      width: auto ; 
    height: 25px; 
    }
  }
  </style>