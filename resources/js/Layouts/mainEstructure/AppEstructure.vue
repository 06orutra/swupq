<!-- HOME -->
<script setup>

import AppFooter from '@/Layouts/mainEstructure/AppFooter.vue';
import AppNavtools from '@/Layouts/mainEstructure/AppNavtools.vue'
import AppBar from '@/Layouts/mainEstructure/navBar/barStructure.vue';
</script>

<template>
    <div>
        <AppNavtools></AppNavtools>
    </div>
    

    <div>
        <AppBar />
        <slot></slot>
    </div>

    <br>
    <div>
        <AppFooter />
    </div>
</template>
