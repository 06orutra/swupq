<template>
    <div>
        <br><br><br>
        <div class="fixed bottom-4 right-4">
            <!-- Se llama a la función de ToggleChatbot para que se muestre el chat, así como
            la clase "chatButton" para que se muestre el botón de chatbot del Style -->
            <button class="chatButton" @click="toggleChatbot">
                <div>
                    <img src="data:image/jpeg;base64,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"
                        class="w-8rem h-8rem">
                </div>

            </button>
        </div>
        <!-- If sobre showChatbot para mostrar el chatbot y configurar todo el 
        contenedor del chatbot. El fondo cambia según si es modo claro u oscuro -->
        <div v-if="showChatbot" class="chatbot-container
                dark:bg-[url('C:\laragon\www\swupq\public\img\FondoOscuroChatBot.jpg')]
                bg-[url('C:\laragon\www\swupq\public\img\FondoClaroChatBot.jpg')]">
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
                <button class=" w-5rem h-2rem bg-red-700 hover:bg-red-500 rounded-md cursor-pointer" @click="toggleChatbot">x</button>
            </div>
            <!-- SECCIÓN DE MENSAJES -->
            <div class="px-4 py-6 z-10 ">
                <!-- Z-10 y Z-20 son las posiciones "delante de..." 
                    Se crea un div conm un FOR de los mensajes que se agreguen
                a una key llamada "message.id", que será el número de mensaje actual-->
                <div v-for="message in messages" :key="message.id" class="flex flex-grow-1">
                    <!-- Este flex grow ayuda a que no se encimen las cosas-->
                    <!-- <pre> sirve para... la neta no sé, pero carga un estilo diferente y deja usar saltos de línea en objetos :D De mientras lo quito porque se bugea lo demás xD. La opción definitiva es la propiedad style="white-space: pre-line"-->
                    <p v-if="message.text" class='rounded-lg py-3 px-4 inline-block mb-2 relative text-2xl font-sans
                        bg-gray-100 text-gray-800 hover:bg-white float-left ml-2 mr-20 mt-2
                        dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500' style="white-space: pre-line">{{ message.text }}</p>
                    <a v-if="message.link" :href="message.link" target="_blank" class="rounded-lg py-2 px-4 inline-block mb-2 relative text-2xl 
                        bg-gray-400 text-gray-900 hover:bg-white float-left ml-2 mr-20 mt-2
                        dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500">{{message.option}}</a>
                        <!-- Ya viendo esto, se puede decir que se pueden agregar muchas
                        cosas por cada array del javascript para mandar acá, incluso en mensajes separados y acoplados a diferentes partes.-->
                </div>
            </div>
            <!-- BOTONES DEL CHAT -->
            <div v-if="showButtons" class="px-4 py-3 text-center">
                <!-- Generar los botones que están guardados en un array como "currentButtons"
                    Recibiendo así "handleButtonClick como disparador para la siguiente acción" -->
                <button v-for="button in currentButtons" :key="button.text" @click="handleButtonClick(button)"
                    class="m-1 rounded-sm max-w-md w-1/4 relative bottom-2 mt-6 text-2xl cursor-pointer
                    bg-gradient-to-r from-gray-300 to-gray-500 hover:from-red-500 hover:to-blue-500 text-black
                    dark:bg-gradient-to-r dark:from-gray-800 dark:to-gray-600 dark:hover:from-blue-900 dark:hover:to-purple-900 dark:text-white">
                    {{ button.text }}
                </button>
            </div>
            <!-- Pequeña leyenda de que el chatbot es hecho en UPQ -->
            <a class="fixed bottom-0 right-6 mb-4 mr-4 text-gray-500
                    font-bold text-xs
                    hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200" href="https://www.upq.mx/">Hecho en UPQ</a>
            <!-- CONTENIDO DEL SHAT -->
        </div>
    </div>
</template>

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
                    user: ''}, //Los mensajes del usuario, solamente un reflejo del botón de selección.

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

                default:
                    break;
            }

            setTimeout(() => {
                this.showButtons = true;
            }, 500);
        },
    },
};

</script>

<style>
.chatbot-container {
    top: 70px;
    position: fixed;
    bottom: 10px;
    right: 20px;
    border-radius: 10px;
    overflow-y: scroll;
    max-width: 640px;
    max-height: 1080px;

}

.chatButton {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: rgb(146, 4, 4);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    border-radius: 13333px;
    overflow: hidden;
    max-width: 720px;
    max-height: 1080px;
}
</style>