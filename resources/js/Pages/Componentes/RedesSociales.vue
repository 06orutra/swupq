
<template class="sticky">
            <Dock :model="redes" class="custom-dock fixed mr-2 z-2 hidden
            lg:inline-flex"
            position="right">
                <template #icon="{ item }">
                    <a :href="item.link" target="_blank">
                        <img :alt="item.label" :src="item.icon" style="width:60%"/>
                    </a>
                </template>
            </Dock>
            
            <!-- DOCK cuando la pantalla es demasiado chica, por ejemplo, tablets y teléfonos -->
            <Dock :model="redes" class="custom-dockTop absolute z-2 inline-flex lg:hidden" position="top">
        <template #icon="{ item }">
            <a :href="item.link" target="_blank">
                <img :alt="item.label" :src="item.icon" style="width:60%"/>
            </a>
        </template>
    </Dock>
</template>

<script setup>
    import { ref } from "vue";

    const redes = ref([
        {
            label: 'Facebook',
            icon: 'https://img.icons8.com/?size=512&id=118497&format=png',
            link: 'https://www.facebook.com/UPQoficial/'
        },
        {
            label: 'Twitter',
            icon: 'https://img.icons8.com/?size=512&id=13963&format=png',
            link: 'https://twitter.com/UPQoficial'
        },
        {
            label: 'Instagram',
            icon: 'https://img.icons8.com/?size=512&id=Xy10Jcu1L2Su&format=png',
            link: 'https://www.instagram.com/soyupq/'
        },
        {
            label: 'TikTok',
            icon: 'https://img.icons8.com/?size=512&id=118640&format=png',
            link: 'https://www.tiktok.com/@upqoficial/'
        }
    ]);
    
</script>

<style scoped>
.custom-dock {
    background-color: transparent;
    border-radius: 10px;
    padding: 15px;
    width: 60px;
    height: 50%;
    transition: all .3s ease;
    cursor: pointer;
    margin-top: 10%;
}
.custom-dockTop {
    background-color: transparent;
    border-radius: 10px;
    width: 320px;
    transition: all .3s ease;
    cursor: pointer;
    margin-top: 80px; /* Opcional, si no se requiere, borrar y ya :D */
    left: 50%; /* Centra horizontalmente */
    transform: translateX(-50%); /* Ajusta la posición */
}
</style>