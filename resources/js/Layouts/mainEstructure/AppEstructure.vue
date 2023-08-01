<!-- HOME -->
<script setup>

import AppFooter from '@/Layouts/mainEstructure/AppFooter.vue';
import AppNavtools from '@/Layouts/mainEstructure/AppNavtools.vue'
</script>

<template>
    <div>
        <AppNavtools></AppNavtools>
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
