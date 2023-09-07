<template>
    <div class="carousel-settings">
        <div>
            <label>Flechas: </label><input type="checkbox" v-model="navigation">
        </div>
        <div>
            <label>Circulos: </label><input type="checkbox" v-model="pagination">
        </div>
        <div>
            <label>Auto: </label><input type="checkbox" v-model="startAutoPlay">
        </div>
        <div>
            <label>Tiempo: </label><input type="number" v-model="timeout">
        </div>
        <button @click="guardarConfiguracion">Guardar Configuración</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            navigation: localStorage.getItem('navigation') === 'true' || false,
            pagination: localStorage.getItem('pagination') === 'true' || false,
            startAutoPlay: localStorage.getItem('startAutoPlay') === 'true' || false,
            timeout: Number(localStorage.getItem('timeout')) || 5000
        };
    },
    methods: {
        guardarConfiguracion() {
            // Storing the selections to local storage
            localStorage.setItem('navigation', this.navigation);
            localStorage.setItem('pagination', this.pagination);
            localStorage.setItem('startAutoPlay', this.startAutoPlay);
            localStorage.setItem('timeout', this.timeout);

            // Emitting the event with the selections
            this.$emit('configuracion-guardada', {
                navigation: this.navigation,
                pagination: this.pagination,
                startAutoPlay: this.startAutoPlay,
                timeout: this.timeout
            });
        }
    }
}
</script>
