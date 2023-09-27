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
    data() {
        return {
            navigation: localStorage.getItem(this.id + 'navigation') === 'true' || false,
            pagination: localStorage.getItem(this.id + 'pagination') === 'true' || false,
            startAutoPlay: localStorage.getItem(this.id + 'startAutoPlay') === 'true' || false,
            timeout: Number(localStorage.getItem(this.id + 'timeout')) || 5000
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
    },
    props: {
        id: {
            type: String,
            required: true
        }
    }
}
</script>
