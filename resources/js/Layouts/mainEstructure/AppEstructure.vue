<!-- HOME -->
<script setup>

import AppFooter from '@/Layouts/mainEstructure/AppFooter.vue';
import AppNavbar from '@/Layouts/mainEstructure/AppNavbar.vue'
import AppNavtools from '@/Layouts/mainEstructure/AppNavtools.vue'
</script>

<template>
    <div>
        <AppNavtools></AppNavtools>
        <AppNavbar></AppNavbar>
    </div>
    <br>

    <div>
        <slot></slot>
    </div>

    <br>
    <div>
        <AppFooter />
    </div>
</template>
