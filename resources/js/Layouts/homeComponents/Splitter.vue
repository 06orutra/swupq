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
            <Videos/>
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
    justify-content: center ;
    border: none;
    
}

.card {
    width: 100%;
    border: none;
}

.imagen-resolucion {
    width: 100%;
    display: block;
    border: none; /* En caso de que haya algún borde predeterminado */
    
}

/* Media query para pantallas medianas y grandes */
@media (min-width: 768px) {
    .card {
        width: 50%; /* Ajustado ligeramente para asegurar que no haya espacios */
    }
}
</style>



