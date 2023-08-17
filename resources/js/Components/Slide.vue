<template>
    <div class="slide">
        <Transition name="slide">
            <slot />
        </Transition>
    </div>
</template>

<script>
export default {

}
</script>

<style scoped>
    .slide {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.slide img {
    max-width: 100%;  /* Asegura que la imagen no sobrepase el ancho del carrusel */
    max-height: 100%; /* Asegura que la imagen no sobrepase el alto del carrusel */
    object-fit: contain; /* Mantiene las proporciones de la imagen y la ajusta dentro del carrusel */
}
</style>