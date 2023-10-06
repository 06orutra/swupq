<template>
  <div class="card">
    <div class="medida">
      <div class="card-title"><strong>Polo y Poli</strong></div>
      <div class="card-content">
        <br>
        Gracias a nuestra ubicación, en las inmediaciones de la Universidad Politécnica de Querétaro es posible encontrar
        una gran cantidad de fauna salvaje que da vida y color a nuestra institución. De entre las diferentes especies que
        aquí habitan, destaca la presencia del “Mosquero Cardenal”, un ave de un intenso plumaje rojo que al emprender el
        vuelo despliega no solo su colorido plumaje, sino también su fuerza, calidez y vibrante energía.
        <br><br><br>
        Así nacen Polo y Poli, un par de cardenales cuyas características principales son la astucia, disciplina, pasión y
        vitalidad. Polo y Poli destacan en todo lo que hacen, ya sea en las aulas preparando sus proyectos escolares, en
        las canchas practicando algún deporte o sobre el escenario mientras demuestran alguno de sus múltiples talentos.
        <br><br><br>
        ¡Somos Cardenales!, ¡Somos UPQ!
      </div>
    </div>
  </div>
</template>
  
<script>

</script>
  
<style scoped>
.medida {
  width: 600px;
  height: auto;
  background-color: #f2f2f2;
}

.card-title {
  font-size: 24px;
  color: #414141;
  border-bottom: 1px solid rgba(70, 67, 82, 0.418);
  padding-bottom: 10px;
  margin: 0 auto;
  text-align: left;
  width: 580px;
}

.card-content {
  font-size: 16px;
  color: #666666;
  text-align: justify;
}

.card {
  background-color: #f2f2f2;
  border-top: 3px solid rgba(140, 36, 55, 1);
  border-top-left-radius: 0;
  border-top-right-radius: 0;
  border-bottom-left-radius: 0.50rem;
  border-bottom-right-radius: 0.50rem;
}

@media (max-width: 2560px) {

  
}

@media (max-width: 1024px) {
  .card{
    width: auto;
    margin-right: 15px;
  }
  .medida {
  width: 550px;
  height: auto;
}
}

@media (max-width: 768px) {
  .card {
    height: auto;
    margin: 20px;
  }

  .medida {
    width: auto;
    height: auto;
  }

  .card-title {
    font-size: 16px;
    width: auto;
  }

  .card-content {
    font-size: 14px;
  }
}

@media (max-width: 425px) {}

@media (max-width: 375px) {}

@media (max-width: 320px) {}
</style>
