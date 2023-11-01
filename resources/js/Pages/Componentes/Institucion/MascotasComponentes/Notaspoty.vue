<template>
  <div class="medida">
    <div class="card-title"><strong>¿Qué playlist prefieres?</strong></div>
    <div class="card-content">
      <br>
      Descubre si eres más Polo o Poli
    </div>
  </div>
</template>
  
<style scoped>
.medida {
  width: 600px;
  height: 200px;
  background-color: transparent;
  text-align: center;
  display: flex;
  /* Agregamos display: flex; */
  flex-direction: column;
  /* Alineamos el contenido verticalmente */
  justify-content: center;
  /* Centramos verticalmente */
  margin: 0 auto;
  /* Centramos horizontalmente */
  margin-top: 50px;
  margin-bottom: 50px;
}

.card-title {
  font-size: 32px;
  color: #414141;
  border-bottom: 1px solid rgba(70, 67, 82, 0.418);
  padding-bottom: 10px;
  display: inline-block;
  /* Hace que el título sea un elemento en línea */
  width: 100%;
  /* Ancho del 100% para extender el borde hacia los lados */
  text-align: center;
  /* Para centrar el texto */
}

.card-content {
  font-size: 24px;
  color: #414141;
  text-align: center;
}

@media (max-width: 2560px) {
}

@media (max-width: 1440px) {}

@media (max-width: 1024px) {}

@media (max-width: 768px) {
  .medida {
    width: auto;
    height: auto;
    margin: 20px;
    padding: 20px;
  }
  .card-content{
    width: 100%;
    height: auto;
    font-size: 20px;
  }
  .card-title {
    width: 100%;
    height: auto;
    font-size: 28px;
  }
}

@media (max-width: 425px) {
}

@media (max-width: 375px) {}

@media (max-width: 320px) {}
</style>
  
  
