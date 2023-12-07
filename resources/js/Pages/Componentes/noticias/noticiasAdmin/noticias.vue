<template>
    <div>
        {{ prensas  }}
        <div v-for="item in prensas" :key="item.id">
            <h3>{{ item.titulo }}</h3>
            <p>{{ item.seccion.nombre }}</p>
            <h2>{{ item.contenido }}</h2>
            <!-- Botones y acciones aquí -->
        </div>
    </div>
    <br><br><br>
    <noticias2></noticias2>
</template>
  
<script>
import axios from 'axios';
import noticias2 from './noticias2.vue';

export default {
    components: {
        noticias2
    },
    data() {
        return {
            prensas: []
        };
    },
    mounted() {
        this.obtenerPrensas();
    },
    methods: {
        obtenerPrensas() {
            axios.post('/prensa')
                .then(response => {
                    this.prensas = response.data;
                })
                .catch(error => {
                    console.error('Error al obtener las prensas:', error);
                });
        },
    }
};
</script>
  