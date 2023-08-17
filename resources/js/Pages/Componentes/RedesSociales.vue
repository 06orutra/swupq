<template class="sticky">
    
            <div v-for="pos of positions" :key="pos.label" class="flex align-items-center">
                <RadioButton v-model="position" :value="pos.value" :inputId="pos.label" name="dock" />
                <label :for="pos.label" class="ml-2"> {{ pos.label }} </label>
            </div>
            
            <Dock :model="redes" class="custom-dock fixed z-1" position="right">
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
    const position = ref('right');
    
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
</style>