<template>
    <span class="p-float-label">
        <AutoComplete v-model="selectedCountry" optionLabel="name" :suggestions="filteredCountries" @complete="search" />
        <label for="ac">Buscar Registro</label>
    </span>
</template>

<script setup>



const props = defineProps({
    valores: {
        type: Array,
        required: true
    }
})

const { valores } = props
</script>