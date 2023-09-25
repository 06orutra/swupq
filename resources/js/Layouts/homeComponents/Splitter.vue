<template>
    <div class="cards-container">
        <div class="card">
            <img src="https://www.comparapps.com/wp-content/uploads/2020/03/imagenes-para-paginas-web.png"
                class="imagen-resolucion">
        </div>
        <div class="card">
            <img src="https://www.comparapps.com/wp-content/uploads/2020/03/imagenes-para-paginas-web.png"
                class="imagen-resolucion">
        </div>
        <div class="card">
            <img src="https://www.comparapps.com/wp-content/uploads/2020/03/imagenes-para-paginas-web.png"
                class="imagen-resolucion">
        </div>
        <div class="card">
            <img src="https://www.comparapps.com/wp-content/uploads/2020/03/imagenes-para-paginas-web.png"
                class="imagen-resolucion">
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



