<script>
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
import ChatBot from '@/Pages/Componentes/Chat/ChatAdmin/chatbot.vue';

export default {
    components: {
        TabView,
        TabPanel,
        ChatBot,
    },
    
};
</script>

<template>
    <TabView ref="tabview1" class="p-3">
        <TabPanel header="ChatBot">
            <ChatBot/>
        </TabPanel>
        
    </TabView>
</template>