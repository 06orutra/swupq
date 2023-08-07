<template>
  <logoUPQvue/>
  <polovue/>
  <menuvue/>


</template>

<script>
import logoUPQvue from '@/Layouts/mainEstructure/navBar/logoUPQ.vue';
import menuvue from '@/Layouts/mainEstructure/navBar/menu.vue';
import polovue from '@/Layouts/mainEstructure/navBar/Polo.vue';

export default {
  components: {
    logoUPQvue,
    menuvue,
    polovue
  },
};
</script>s