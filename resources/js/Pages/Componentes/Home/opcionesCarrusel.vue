<template>
    <div class="card flex flex-wrap justify-content-center gap-3">
        <div class="flex align-items-center">
            <label class="ml-2">Flechas: </label><input type="checkbox" v-model="navigation">
        </div>
        <div class="flex align-items-center">
            <label class="ml-2">Circulos: </label><input type="checkbox" v-model="pagination">
        </div>
        <div class="flex align-items-center">
            <label class="ml-2">Auto: </label><input type="checkbox" v-model="startAutoPlay">
        </div>
        <div class="flex align-items-center">
            <label class="ml-2">Tiempo: </label><input type="number" v-model="timeout">
        </div>
        <Button @click="guardarConfiguracion">Guardar Configuración</button>
    </div>
</template>

<script>
export default {
    name: 'OpcionesCarrusel',
    props: {
        id: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            navigation: localStorage.getItem(this.id + 'navigation') === 'true',
            pagination: localStorage.getItem(this.id + 'pagination') === 'true',
            startAutoPlay: localStorage.getItem(this.id + 'startAutoPlay') === 'true',
            timeout: localStorage.getItem(this.id + 'timeout') || 5000
        };
    },
    methods: {
        guardarConfiguracion() {
            localStorage.setItem(this.id + 'navigation', this.navigation);
            localStorage.setItem(this.id + 'pagination', this.pagination);
            localStorage.setItem(this.id + 'startAutoPlay', this.startAutoPlay);
            localStorage.setItem(this.id + 'timeout', this.timeout);
            this.$emit('configuracion-guardada', {
                navigation: this.navigation,
                pagination: this.pagination,
                startAutoPlay: this.startAutoPlay,
                timeout: this.timeout
            });
        }
    }
};
</script>