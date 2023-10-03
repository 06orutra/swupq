<script>
import InputText from "primevue/inputtext";
import Column from "primevue/column";
import Button from "primevue/button";
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
import Menu from 'primevue/menu';

export default {
    components: {
        TabView,
        TabPanel,
        InputText,
        Column,
        Button,
        Menu,
    },
}
</script>

<template>
    <AppLayout title="Video">
        <TabView ref="tabview2" class="p-2">
            <TabPanel header="Español">
                <video src="./Videos/video1.mp4" width="854"  height="480" controls poster="../Img/IMGUPQ.png"/>
            </TabPanel>
            <TabPanel header="Ingles">
                <video src="./Videos/video2.mp4" width="854"  height="480" controls poster="../Img/IMGUPQ.png"/>
            </TabPanel>
            <TabPanel header="Frances">
                <video src="./Videos/video1.mp4" width="854"  height="480" controls poster="../Img/IMGUPQ.png"/>
            </TabPanel>
            <TabPanel header="Portugues">
                <video src="./Videos/video2.mp4" width="854"  height="480" controls poster="../Img/IMGUPQ.png"/>
            </TabPanel>
        </TabView>
    </AppLayout>

    


</template>

<style lang="scss" scoped>

</style>