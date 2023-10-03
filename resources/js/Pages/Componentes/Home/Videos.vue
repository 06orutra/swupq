<template>
    <AppLayout title="Video" >
        <TabView ref="tabview2">
            <TabPanel header="Español">
                <video src="Videos/video1.mp4" controls poster="../Img/IMGUPQ.png" class="responsive-video"/>
            </TabPanel>
            <TabPanel header="Ingles">
                <video src="Videos/video2.mp4" controls poster="../Img/IMGUPQ.png" class="responsive-video"/>
            </TabPanel>
            <TabPanel header="Frances">
                <video src="Videos/video1.mp4" controls poster="../Img/IMGUPQ.png" class="responsive-video"/>
            </TabPanel>
            <TabPanel header="Portugues">
                <video src="Videos/video2.mp4" controls poster="../Img/IMGUPQ.png" class="responsive-video"/>
            </TabPanel>
        </TabView>
    </AppLayout>


    



</template>

<style scoped>
.responsive-video {
    width: 100%; /* Ocupa todo el ancho del contenedor */
    height: 100%; /* Se ajusta automáticamente según el aspecto del video */
    max-height: 100%; /* No excede la altura del contenedor */
}
</style>
