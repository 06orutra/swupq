<script>
import carruselDivididoVista from "/resources/js/Pages/Componentes/Welcome/carruselDivididoVista.vue";
import Videos from "/resources/js/Pages/Componentes/Home/Videos.vue";

export default {
    components: {
        carruselDivididoVista,
        Videos,
    },
};
</script>

<template>
    <div class="cards-container">
        <div class="card">
            <Videos class="imagen-resolucion"/>
        </div>
        <div class="card">
            <carruselDivididoVista :loadDataUrl="'bannerDataprimero'" class="imagen-resolucion"/>
        </div>
        <div class="card">
            <carruselDivididoVista :loadDataUrl="'bannerDatasegundo'" class="imagen-resolucion"/>
        </div>
        <div class="card">
            <carruselDivididoVista :loadDataUrl="'bannerDatatercero'" class="imagen-resolucion"/>
        </div>
    </div>
</template>

<style scoped>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.cards-container {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    border: none;
    height: 100vh; /* Ocupa toda la altura de la ventana */
}

.card {
    width: 100%; /* Ocupa toda la fila en dispositivos pequeños por defecto */
    height: 50%; /* Ocupa la mitad de la altura del contenedor */
    overflow: hidden; /* En caso de que el contenido sea más grande que el contenedor */
    border: none;
    border-radius: 0; /* Asegura que no haya redondeo */
}

.imagen-resolucion {
    width: 100%;
    display: block;
    border: none;
    height: 100%; /* Ocupa toda la altura del .card */
    object-fit: cover; /* Asegura que la imagen cubra todo el espacio sin distorsionarse */
}

/* Media query para pantallas medianas y grandes */
@media (min-width: 768px) {
    .card {
        width: 50%; /* En pantallas medianas y grandes, los .card ocuparán la mitad de la fila */
    }
}
</style>