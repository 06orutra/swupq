    
<script>
    import "/node_modules/primeflex/primeflex.css";
    export default {
        mounted() {
            this.cargarBienvenida();
            this.cargarBotones();
            this.cargarRespuestas();
        },
        data() {
            return {
                //Se mantiene oculto el chatbot al cargar la página
                showChatbot: false,
                respuestas: [],
                messages: [], //jUNTA RESPUESTAS CON CURRENTBUTTONS EN UNO SOLO
                //newMessageText: '',
                showButtons: true,
                currentButtons: [],
                welcomeMessages: [],
            };
        },
        methods: {
            cargarBienvenida() {
                return axios.post('/chatWelcome/bannerData').then((response) => {
                    this.welcomeMessages = response.data;
                }).catch((error) => {
                    console.log('Error al cargar los datos: ', error);
                });
            },
            cargarBotones() {
                return axios.post('/chatButtons/bannerData').then((response) => {
                    this.currentButtons = response.data;
                }).catch((error) => {
                    console.log('Error al cargar los botones: ', error);
                });
            },
            cargarRespuestas() {
                return axios.post('/chatResponse/bannerData').then((response) => {
                    this.respuestas = response.data;
                }).catch((error) => {
                    console.log('Error al cargar las respuestas: ', error);
                });
            },
            toggleChatbot() {
                this.showChatbot = !this.showChatbot;
            },
            handleButtonClick(button) {
                // Agregar el mensaje del botón seleccionado
                this.messages.push({
                    id: this.messages.length,
                    text: button.contenido,
                });
                //Repetir solamente cuando haya un button.identificador igual a respuesta.correlacion
                this.respuestas.forEach((respuesta) => {
                    if (respuesta.correlacion == button.identificador) {
                        this.messages.push({
                            id: this.messages.length,
                            option: respuesta.nombre,
                            link: respuesta.enlace,
                        });
                    }
                });
                this.$nextTick(() => {
                    const messages = this.$refs.messages;
                    const lastMessage = messages[messages.length - 1 ];
                    if (lastMessage) {
                        lastMessage.scrollIntoView({ behavior: 'smooth', block: 'end' });
                    }
                });
            },



            closeChatAndReset() {
                this.showChatbot = false;
                this.messages = [];
                this.showButtons = true;
            }
        },
    };
</script>

    
<template>
    <div>
        <div class="fixed">
            <button class="chatButton" @click="toggleChatbot">
                <img src='/storage/img/boton_chatbot.svg' alt="Chatbot Icon">
            </button>
        </div>
        <div v-if="showChatbot"
            class="chatbot-container z-10 bg-[url('/public/img/FondoChatBot.jpg')]">
            <!-- CHATBOT CONTENIDO EN EL DESTE -->
            <!-- Header del chatbot container -->
            <div class="
                bg-gradient-to-r from-red-800 to-blue-900 hover:from-blue-900 hover:to-red-800
                dark:bg-gradient-to-r dark:from-red-900 dark:to-purple-900 dark:hover:from-purple-900 dark:hover:to-red-900
                h-3rem flex items-center justify-between px-4 py-4 text-white sticky top-0 z-20
                text-3xl text-center">
                <a>Poli & Polo</a>
                <!-- Botón para cerrar el chat, su única función es hacer un toggleChatbot
                        mientras el chat esté abierto. Y cambia de colorcito por el hover owo -->
                <!-- Descubrimiento: Al usar "h3" o similares con PrimeVue, no se respetan los estilos.
                Pero si utilizamos "p" o "span" sí se respetan a medias.
                Con  "a" se respetan al completo. -->
                <button
                    class="pi pi-times w-24 h-10 bg-red-600 hover:bg-red-400 text-white text-sm font-semibold rounded-full shadow-md cursor-pointer transform hover:scale-105"
                    @click="closeChatAndReset" />
                <!-- <button
                    class="w-32 h-10 bg-red-600 hover:bg-red-400 text-white text-sm font-semibold rounded-full shadow-md cursor-pointer transform hover:scale-105"
                    @click="closeChatAndReset">Cerrar Chat <span class="ml-1">✕</span></button> -->

            </div>


            <div class="px-4 pt-6 z-10 ">
                <div v-for="text in welcomeMessages" class="flex flex-grow-1">
                    <a v-if="text.contenido" class='rounded-lg py-3 px-4 inline-block mb-2 relative text-lg md:text-xl xl:text-2xl
                    font-sans bg-gray-100 text-gray-800 hover:bg-white float-left ml-2 mr-20 mt-2
                        dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500' style="white-space: pre-line">
                        {{ text.contenido }}</a>
                </div>
            </div>


            <div class="px-4 py-2 z-10 ">
                <div v-for="message in messages" :key="message.id" class="flex flex-grow-1">
                    <a v-if="message.text" class='rounded-lg py-3 px-4 inline-block mb-2 relative text-lg md:text-xl xl:text-2xl font-sans
                        bg-gray-100 text-gray-800 hover:bg-white float-left ml-2 mr-20 mt-2
                        dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500' style="white-space: pre-line">
                        {{ message.text }}</a>
                    <a v-if="message.link" :href="message.link" target="_blank" class="rounded-lg py-2 px-4 inline-block mb-2 relative 
                    text-lg md:text-xl xl:text-2xl bg-gray-400 text-gray-900 hover:bg-white float-left ml-2 mr-20 mt-2
                        dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500" style="white-space: pre-line">
                        {{ message.option }}</a>
                </div>
            </div>




            <!-- BOTONES DEL CHAT -->
            <div v-if="showButtons" class="px-4 py-5 text-center">
                <!-- Generar los botones que están guardados en un array como "currentButtons"
                    Recibiendo así "handleButtonClick como disparador para la siguiente acción" -->
                <button v-for="button in currentButtons" :key="button.id" @click="handleButtonClick(button)"
                    class="m-1 rounded-sm w-auto h-auto relative bottom-2 mt-2 text-md md:text-xl xl:text-2xl cursor-pointer p-2.5
                    bg-gradient-to-r from-gray-300 to-gray-500 hover:from-red-500 hover:to-blue-500 text-black
                    dark:bg-gradient-to-r dark:from-gray-800 dark:to-gray-600 dark:hover:from-blue-900 dark:hover:to-purple-900 dark:text-white" style="white-space: pre-line" :data-index="index"  ref="messages">
                    {{ button.titulo }}
                </button>
            </div>

            <!-- Pequeña leyenda de que el chatbot es hecho en UPQ -->
            <a class="fixed bottom-0 right-6 mb-4 mr-4 text-gray-500
                    font-bold text-xs
                    hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200" href="https://www.upq.mx/">
                    Hecho en UPQ</a>
            <!-- CONTENIDO DEL SHAT -->
        </div>
    </div>
</template>


<style scoped>
.chatButton {
    cursor: pointer;
    width: 7vh;
    height: 7vh;
    border: 1px solid black;
    position: fixed;
    z-index: 999;
    transform: translateX(80px) translateY(105px);
}


.chatButton img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 999;
}

.chatbot-container {
    top: 40px;
    position: fixed;
    bottom: 10px;
    right: 20px;
    border-radius: 10px;
    overflow-y: scroll;
    max-width: 640px;
    max-height: 1080px;
    border: 1px solid black;
    z-index: 999;
}

@media (min-width: 522px) and (max-width: 769px) {
    .chatButton {
        width: 43px;
        height: 43px;
        margin-left: 2%;
        transform: translateX(77px) translateY(75px);
    }

    .chatbot-container {
        top: 15%;
        bottom: 2%;
        max-height: 1080px;
        max-width: 400px;
    }
}

@media (min-width: 770px) and (max-width:1201px) {
    .chatButton {
        width: 43px;
        height: 43px;
        margin-left: 1.5%;
        transform: translateX(77px) translateY(75px);
    }

    .chatbot-container {
        top: 25%;
        max-height: 1080px;
        max-width: 480px;
    }
}

@media (min-width: 1201px) and (max-width: 1441px) {
    .chatButton {
        width: 55px;
        height: 55px;
        margin-left: 1.5%;
        transform: translateX(82px) translateY(105px);
    }

    .chatButton img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 999;
    }
    .chatbot-container {
        top: 20%;
        max-height: 1920px;
        max-width: 520px;
    }
}

@media (min-width: 1442px) and (max-width: 1499px) {
    .chatButton {
        width: 55px;
        height: 55px;
        margin-left: 1.5%;
        transform: translateX(80px) translateY(105px);
    }

    .chatbot-container {
        top: 20%;
        max-height: 1080px;
        max-width: 640px;
    }
}

@media (min-width: 1500px) and (max-width: 1920px) {
    .chatButton {
        width: 55px;
        height: 55px;
        margin-left: 1.5%;
        transform: translateX(75px) translateY(103px);
    }

    .chatbot-container {
        max-height: 1080px;
        max-width: 640px;
    }
}

@media (min-width: 1921px) and (max-width: 2561px) {
    .chatButton {
        width: 85px;
        height: 85px;
        margin-left: 2%;
        transform: translateX(80px) translateY(150px);
    }

    .chatbot-container {
        max-height: 1080px;
        max-width: 640px;
        top: 195px;
        right: 20px;
    }

    .chatButton img {
        width: 85px;
        height: 85px;
        z-index: 999;
    }
}

@media (min-width: 321px) and (max-width: 415px) {
    .chatButton {
        width: 30px;
        height: 30px;
        transform: translateX(190px) translateY(5px);
        margin: .9%;
    }

    .chatbot-container {
        bottom: 2%;
        top: 20%;
        left: 10%;
        right: 5px;
        /* Ajusta la posición a tu preferencia */
        max-width: 360px;
        /* Ajusta el ancho máximo a tu preferencia */
        max-height: 85%;
        /* Permite que el chat se expanda verticalmente */
        overflow-y: auto;
        /* Agrega scroll si el contenido es largo */
        /* Otros estilos aquí... */
    }
}

@media (min-width: 419px) and (max-width: 520px) {
    .chatButton {
        width: 30px;
        height: 30px;
        transform: translateX(195px) translateY(10px);
        margin: .9%;
    }

    .chatbot-container {
        bottom: 2%;
        top: 20%;
        right: 10px;
        /* Ajusta la posición a tu preferencia */
        max-width: 360px;
        /* Ajusta el ancho máximo a tu preferencia */
        max-height: 100%;
        /* Permite que el chat se expanda verticalmente */
        overflow-y: auto;
        /* Agrega scroll si el contenido es largo */
        /* Otros estilos aquí... */
    }
}

@media(max-width: 320px) {
    .chatButton {
        width: 30px;
        height: 30px;
        transform: translateX(195px) translateY(4px);
        margin: .9%;
    }

    .chatbot-container {
        bottom: 5%;
        top: 25%;
        right: 5px;
        left: 10%;
        /* Ajusta la posición a tu preferencia */
        max-width: 360px;
        /* Ajusta el ancho máximo a tu preferencia */
        max-height: 100%;
        /* Permite que el chat se expanda verticalmente */
        overflow-y: auto;
        /* Agrega scroll si el contenido es largo */
        /* Otros estilos aquí... */
    }
}
</style>