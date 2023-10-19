<script setup>
//cicloAlumnado.vue es el componente que hace referencia al ciclo escolar en curso
//Es el que en "Modelo Educativo" hace que aparezca
//El texto "Ciclo escolar Enero - Abril 2023"
import estructuraTextos from '@/Pages/Componentes/Home/estructuraTextos.vue';
</script>

<template>
    <estructuraTextos :Titulo="'Introducción'" :Subtitulo="'Ciclo en curso'" :loadDataUrl="'/ciclo/bannerData'" :registerBannerUrl="'/ciclo/registrarBanner'"
        :editBannerUrl="'/ciclo/editarBanner'" :deleteBannerUrl="'/ciclo/eliminarBanner'" />
</template>