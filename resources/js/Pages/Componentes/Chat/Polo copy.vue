    
    <script>
    import "/node_modules/primeflex/primeflex.css";
    export default {
        data() {
            return {
                //Se mantiene oculto el chatbot al cargar la página
                showChatbot: false,
                //Mensajes del bot nada más iniciar
                messages: [
                    {
                        id: 1, //Identificador meramente para interpretación del código
                        text: '¡Bienvenido! Somos Poli y Polo.\n¿Necesitas que te demos un ala?', //Textos a mostrar
                        link: '', //Hipervínculos que tendrán algunos mensajes
                        option: '',//Texto de los mensajes de hipervínculo. Estos tienen un formato levemente diferente y se llaman sólo si existe una adición link y option en el javascript
                        user: ''
                    }, //Los mensajes del usuario, solamente un reflejo del botón de selección.
    
                    //Próximamente reemplazable para conectar con una Base de datos
                ],
                //newMessageText: '',
                showButtons: true,
                currentButtons: [
                    { text: 'Carreras', value: 1 },
                    { text: 'Convocatorias', value: 2 },
                    { text: 'Admisión', value: 3 },
                    { text: 'Tour Cardenal', value: 4 },
                    { text: 'Centro de Idiomas', value: 5 },
                    { text: 'Trámites', value: 6 },
                    { text: 'Posgrados', value: 7 },
                ],
            };
        },
        methods: {
            toggleChatbot() {
                this.showChatbot = !this.showChatbot;
            },
    
            handleButtonClick(button) {
    
                switch (button.value) {
                    case 1:
                        this.messages.push({
                            id: this.messages.length + 1,
                            text: 'Nuestra oferta educativa se conforma por 5 ingenierías:\nMecatrónica, Tecnología Automotriz, Tecnologías de Manufactura, Sistemas Computacionales y Redes y Telecomunicaciones.\nAsí como dos licenciaturas:\nNegocios Internacionales y Administración y Gestión Empresarial.',
                        });
                        this.messages.push({
                            id: this.messages.length + 1,
                            option: 'Mecatrónica',
                            link: 'https://www.upq.mx/media/curriculum_pdf/mapa_mecatronica_2021.pdf',
                        });
                        this.messages.push({
                            id: this.messages.length + 1,
                            option: 'Tecnología Automotriz',
                            link: 'https://www.upq.mx/media/curriculum_pdf/mapa_automotriz.pdf',
                        });
                        this.messages.push({
                            id: this.messages.length + 1,
                            option: 'Tecnologías de Manufactura',
                            link: 'https://www.upq.mx/media/curriculum_pdf/mapa_manufactura_2021.pdf',
                        });
                        this.messages.push({
                            id: this.messages.length + 1,
                            option: 'Sistemas Computacionales',
                            link: 'https://www.upq.mx/media/curriculum_pdf/mapa_sistemas.pdf',
                        });
                        this.messages.push({
                            id: this.messages.length + 1,
                            option: 'Redes y Telecomunicaciones',
                            link: 'https://www.upq.mx/media/curriculum_pdf/MAPA_REDES_Y_TELECOMUNICACIONES.pdf',
                        });
                        this.messages.push({
                            id: this.messages.length + 1,
                            option: 'Negocios Internacionales',
                            link: 'https://www.upq.mx/media/curriculum_pdf/mapa_negocios.pdf',
                        });
                        this.messages.push({
                            id: this.messages.length + 1,
                            option: 'Administración y Gestión Empresarial',
                            link: 'https://www.upq.mx/media/curriculum_pdf/UPQ_Mapa_Curricular_LAGE.pdf',
                        });
    
                        break;
                    //EN TEORÍA debería mandarse un link... EN TEORÍA >:(
                    case 2:
                        this.messages.push({
                            id: this.messages.length + 1,
                            text: 'Te comentamos que al año contamos con dos procesos de admisión. La segunda convocatoria ya se encuentra abierta ¡Regístrate!\n\nEl costo del proceso de admisión ronda los 1,500 pesos y el cuatrimestre (una vez admitida) asciende a alrededor de 3,800 pesos.\n\nNuestras carreras se cursan en modalidad escolarizada: es decir, de lunes a viernes, durante el primer año todos los estudiantes cursan el turno matutino (07:00 a 13:40 hrs.), a partir del segundo año puede que curses estudios en el horario vespertino (14:00 a 20:40 hrs.). \nPara más información puedes consultar aquí en la página web o al teléfono:\n442 101 9000 ext. 352, 353 o 354',
                        });
                        this.messages.push({
                            id: this.messages.length + 1,
                            link: 'https://drive.google.com/file/d/1YN8lvzfVsKPE1vPHGTxASkxXE77usYhu/view',
                            //Acá favor de no usar acortadores de links :(
                            //Ah, y de actualizar las fechas del pdf, que dice 2022 aún :C
                            option: 'Convocatoria',
                        });
                        /* this.currentButtons.splice(0, this.currentButtons.length);
                        this.currentButtons.push({
                            text: 'Inscripciones a la universidad',
                            value: 2.1,
                        });
                        this.currentButtons.push({
                            text: 'Becas y apoyos económicos',
                            value: 2.2,
                        });
                        this.currentButtons.push({
                            text: 'Movilidad estudiantil',
                            value: 2.3,
                        }); */
                        break;
                    case 3:
                        this.messages.push({
                            id: this.messages.length + 1,
                            text: 'El proceso de admisión consta del examen de conocimientos , examen de habilidades del pensamiento y cursos de inducción.\n\nLos cursos (al igual que todas las facetas del proceso de admisión) son sumamente importantes para el cumplimiento exitoso de tu ingreso. Te recomendamos mínimo asistir a 3 de las 4 sesiones.\n\nRecuerda que todo el proceso es en línea. Para más información puedes navegar en la página o preguntar al teléfono 442 101 9000 ext. 352, 353 o 354.',
                        });
                        /* this.currentButtons.splice(0, this.currentButtons.length);
                        this.currentButtons.push({
                            text: 'Convenios y tratos',
                            value: 3.1,
                        });
                        this.currentButtons.push({
                            text: 'Ver más información general',
                            value: 3.2,
                        }); */
                        break;
                    case 4:
                        this.messages.push({
                            id: this.messages.length + 1,
                            text: 'Gracias por tu interés en los recorridos en nuestras instalaciones, te pedimos que puedas responder este cuestionario y mandarnos una captura de pantalla de que lo has respondido al correo captacion@upq.edu.mx.\n\nPor el momento solo los días martes y jueves se estarán realizando.',
                        });
                        this.messages.push({
                            id: this.messages.length + 1,
                            link: "https://forms.gle/M9jtADLP34Zhj2yk6",
                            option: "Formulario"
                        })
                        break;
                    case 5:
                        this.messages.push({
                            id: this.messages.length + 1,
                            text: "Sé parte de nuestro Centro de Idiomas UPQ.\n¡Es abierto al público en general a partir de los 15 años!\n\nInscríbete en alguno de nuestros niveles. Más información:\neducacion.continua@upq.edu.mx"
                        });
                        this.messages.push({
                            id: this.messages.length + 1,
                            link: "https://bit.ly/3iQoNFv",
                            option: "Inglés"
                        });
                        this.messages.push({
                            id: this.messages.length + 1,
                            link: "https://bit.ly/3uAPmUK",
                            option: "Francés"
                        });
                        this.messages.push({
                            id: this.messages.length + 1,
                            link: "https://bit.ly/38fOA8f",
                            option: "Alemán"
                        });
                        break;
    
                    case 6:
                        this.messages.push({
                            id: this.messages.length + 1,
                            text: "¿Qué tramite te gustaría realizar?"
                        });
                        this.messages.push({
                            id: this.messages.length + 1,
                            link: "https://bit.ly/3iQoNFv",
                            option: "Inscripción"
                        });
                        this.messages.push({
                            id: this.messages.length + 1,
                            link: "https://www.upq.mx/servicios-estudiantiles/",
                            option: "Becas"
                        });
                        this.messages.push({
                            id: this.messages.length + 1,
                            link: "https://www.upq.mx/media/services/03.pdf",
                            option: "Comprobantes de Estudios"
                        });
                        this.messages.push({
                            id: this.messages.length + 1,
                            link: "https://www.upq.mx/servicios-estudiantiles/",
                            option: "Equivalencias"
                        });
                        this.messages.push({
                            id: this.messages.length + 1,
                            link: "https://www.upq.mx/media/services/01.pdf",
                            option: "Estacionamiento"
                        });
                        this.messages.push({
                            id: this.messages.length + 1,
                            link: "https://www.upq.mx/media/services/05.pdf",
                            option: "Facturación"
                        });
                        this.messages.push({
                            id: this.messages.length + 1,
                            link: "https://www.upq.mx/media/services/06.pdf",
                            option: "Reactivar/Liberar pagos"
                        });
                        this.messages.push({
                            id: this.messages.length + 1,
                            link: "https://www.upq.mx/servicios-estudiantiles/",
                            option: "Reinscripción"
                        });
                        this.messages.push({
                            id: this.messages.length + 1,
                            link: "https://www.upq.mx/media/services/04.pdf",
                            option: "Reposición de credencial"
                        });
                        this.messages.push({
                            id: this.messages.length + 1,
                            link: "https://www.upq.mx//media/services/02_OIWrE5D.pdf",
                            option: "Seguro Facultativo"
                        });
                        this.messages.push({
                            id: this.messages.length + 1,
                            link: "https://www.upq.mx/servicios-estudiantiles/",
                            option: "Titulación"
                        });
                        this.messages.push({
                            id: this.messages.length + 1,
                            link: "https://www.upq.mx/transporte/",
                            option: "Transporte"
                        });
                        break;
                    case 7:
                        this.messages.push({
                            id: this.messages.length + 1,
                            text: "¡Dale un vistazo a nuestras maestrías!"
                        });
                        this.messages.push({
                            id: this.messages.length + 1,
                            link: "https://www.upq.mx/maestria/assets/mapa_curricular_maestria.pdf",
                            option: "MAESTRÍA EN INGENIERÍA EN SISTEMAS PRODUCTIVOS E INDUSTRIA 4.0"
                        });
                        this.messages.push({
                            id: this.messages.length + 1,
                            link: "https://www.upq.mx/maestria_admin/",
                            option: "MAESTRÍA EN INGENIERÍA ADMINISTRATIVA"
                        });
                    default:
                        break;
                }
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
                <img src='/storage/img/boton_chatbot.svg'
                    alt="Chatbot Icon">
            </button>
        </div>
        <div v-if="showChatbot" class="chatbot-container z-10
                dark:bg-[url('/public/img/FondoOscuroChatBot.jpg')]
                bg-[url('/public/img/FondoClaroChatBot.jpg')]">
            <!-- CHATBOT CONTENIDO EN EL DESTE -->
            <!-- Header del chatbot container -->
            <div class="
                bg-gradient-to-r from-red-800 to-blue-900 hover:from-blue-900 hover:to-red-800
                dark:bg-gradient-to-r dark:from-red-900 dark:to-purple-900 dark:hover:from-purple-900 dark:hover:to-red-900
                h-3rem flex items-center justify-between px-4 py-4 text-white sticky top-0 z-20
                text-3xl text-center
                
                ">
                <a>Poli & Polo</a>
                <!-- Botón para cerrar el chat, su única función es hacer un toggleChatbot
                        mientras el chat esté abierto. Y cambia de colorcito por el hover owo -->
                <!-- Descubrimiento: Al usar "h3" o similares con PrimeVue, no se respetan los estilos.
                Pero si utilizamos "p" o "span" sí se respetan a medias.
                Con  "a" se respetan al completo. -->
                <button
                    class="w-32 h-10 bg-red-600 hover:bg-red-400 text-white text-sm font-semibold rounded-full shadow-md cursor-pointer transform hover:scale-105"
                    @click="closeChatAndReset">Cerrar Chat <span class="ml-1">✕</span></button>


            </div>
            <div class="px-4 py-6 z-10 ">
                <!-- Z-10 y Z-20 son las posiciones "delante de..." 
                    Se crea un div conm un FOR de los mensajes que se agreguen
                a una key llamada "message.id", que será el número de mensaje actual-->
                <div v-for="message in messages" :key="message.id" class="flex flex-grow-1">
                    <!-- Este flex grow ayuda a que no se encimen las cosas-->
                    <!-- <pre> sirve para... la neta no sé, pero carga un estilo diferente y deja usar saltos de línea en objetos :D De mientras lo quito porque se bugea lo demás xD. La opción definitiva es la propiedad style="white-space: pre-line"-->
                    <p v-if="message.text" class='rounded-lg py-3 px-4 inline-block mb-2 relative text-2xl font-sans
                        bg-gray-100 text-gray-800 hover:bg-white float-left ml-2 mr-20 mt-2
                        dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500' style="white-space: pre-line">{{
                            message.text }}</p>
                    <a v-if="message.link" :href="message.link" target="_blank" class="rounded-lg py-2 px-4 inline-block mb-2 relative text-2xl 
                        bg-gray-400 text-gray-900 hover:bg-white float-left ml-2 mr-20 mt-2
                        dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500">{{ message.option }}</a>
                    <!-- Ya viendo esto, se puede decir que se pueden agregar muchas
                        cosas por cada array del javascript para mandar acá, incluso en mensajes separados y acoplados a diferentes partes.-->
                </div>
            </div>
            <!-- BOTONES DEL CHAT -->
            <div v-if="showButtons" class="px-4 py-3 text-center">
                <!-- Generar los botones que están guardados en un array como "currentButtons"
                    Recibiendo así "handleButtonClick como disparador para la siguiente acción" -->
                <button v-for="button in currentButtons" :key="button.text" @click="handleButtonClick(button)"
                    class="m-1 rounded-sm w-auto h-auto relative bottom-2 mt-6 text-2xl cursor-pointer p-2.5
                    bg-gradient-to-r from-gray-300 to-gray-500 hover:from-red-500 hover:to-blue-500 text-black
                    dark:bg-gradient-to-r dark:from-gray-800 dark:to-gray-600 dark:hover:from-blue-900 dark:hover:to-purple-900 dark:text-white">
                    {{ button.text }}
                </button>
            </div>
            <!-- Pequeña leyenda de que el chatbot es hecho en UPQ -->
            <a class="fixed bottom-0 right-6 mb-4 mr-4 text-gray-500
                    font-bold text-xs
                    hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200" href="https://www.upq.mx/">Hecho
                en UPQ</a>
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
        max-height: 1080px;
        max-width: 360px;
    }
}

@media (min-width: 1024px) and (max-width:1201px) {
    .chatButton {
        width: 43px;
        height: 43px;
        margin-left: 1.5%;
        transform: translateX(77px) translateY(75px);
    }
    .chatbot-container {
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
}

@media (min-width: 1442px) and (max-width: 1499px) {
    .chatButton {
        width: 55px;
        height: 55px;
        margin-left: 1.5%;
        transform: translateX(80px) translateY(105px);
    }

    .chatbot-container {
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
        top:195px;
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
        bottom: 10px;
        right: 10px;
        /* Ajusta la posición a tu preferencia */
        max-width: 360px;
        /* Ajusta el ancho máximo a tu preferencia */
        max-height: 100%;
        /* Permite que el chat se expanda verticalmente */
        overflow-y: auto;
        /* Agrega scroll si el contenido es largo */
    }
}

@media (min-width: 420px) and (max-width: 520px) {
    .chatButton {
        width: 30px;
        height: 30px;
        transform: translateX(195px) translateY(10px);
        margin: .9%;
    }
    .chatbot-container {
        bottom: 10px;
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

@media(max-width: 320px){
    .chatButton {
        width: 30px;
        height: 30px;
        transform: translateX(195px) translateY(4px);
        margin: .9%;
    }
    .chatbot-container {
        bottom: 10px;
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
</style>