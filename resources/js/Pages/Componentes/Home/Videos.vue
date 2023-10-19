<template>
    <div :class="['video-component', { 'admin-view': isAdmin }]">
        <div class="language-selector" @click="toggleLanguages" @touchstart.prevent="toggleLanguages">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-language" width="32" height="32"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M4 5h7" />
                <path d="M9 3v2c0 4.418 -2.239 8 -5 8" />
                <path d="M5 9c0 2.144 2.952 3.908 6.7 4" />
                <path d="M12 20l4 -9l4 9" />
                <path d="M19.1 18h-6.2" />
            </svg>
            <ul v-if="showLanguages">
                <li v-for="language in lenguajesDisponibles" :key="language" @click="changeVideo(language)">
                    {{ language }}
                </li>
            </ul>
        </div>
        <iframe ref="videoElement" :src="currentEmbedUrl" frameborder="0" allowfullscreen class="fullscreen-video">
        </iframe>
    </div>
</template>

<script>

export default {
    mounted() {
        this.cargarTexto();
    },
    data() {
        return {
            lenguajesDisponibles: [], // nueva variable para almacenar los lenguajes disponibles
            texto: [],
            showLanguages: false,
            videos: {

            },
            currentUrl: '',
            isAdmin: true,
        }
    },
    computed: {
        currentEmbedUrl() {
            // Extraer el ID del video de la URL completa
            const videoId = this.extractVideoId(this.currentUrl);
            // Devolver la URL de embebido con los parámetros deseados
            return `https://www.youtube.com/embed/${videoId}?controls=1&modestbranding=1&rel=0`;
        }
    },
    methods: {
        cargarTexto() {
            axios.post("/videolenguajes")
                .then((response) => {
                    this.videos = {};
                    this.lenguajesDisponibles = []; // restablecer los lenguajes disponibles

                    response.data.forEach((item, index) => {
                        const tituloTraducido = this.traducirTitulo(item.titulo);
                        if (item.contenido.includes("youtube.com")) {
                            this.videos[tituloTraducido] = this.convertirUrlYoutube(item.contenido);
                            this.lenguajesDisponibles.push(tituloTraducido); // agregar el lenguaje a la lista

                            // Si es el primer elemento, actualizar currentUrl
                            if (index === 0) {
                                this.currentUrl = this.convertirUrlYoutube(item.contenido);
                            }
                        }
                    });
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        // Método para convertir URLs normales de YouTube a formato corto
        convertirUrlYoutube(url) {
            return url.replace("https://www.youtube.com/watch?v=", "https://youtu.be/");
        },

        // Método para traducir el título si es necesario
        traducirTitulo(titulo) {
            const traducciones = {
                'English': 'Inglés',
                // Agrega más traducciones según sea necesario
            };

            return traducciones[titulo] || titulo;
        },
        toggleLanguages() {
            this.showLanguages = !this.showLanguages;
        },
        changeVideo(language) {
            this.currentUrl = this.videos[language];  // Aquí es donde se actualiza currentUrl
        },
        extractVideoId(url) {
            // Si es una URL corta (p.ej., "https://youtu.be/koWfeJPQkEk")
            if (url.includes('youtu.be/')) {
                return url.split('youtu.be/')[1];
            }
            // Si es una URL completa (p.ej., "https://www.youtube.com/watch?v=2UuRNQE8qUc")
            const match = url.match(/v=([^&]+)/);
            return match ? match[1] : null;
        }
    }
}
</script>

<style scoped>
.video-component {
    position: relative;
    width: 100vw;
    height: 100vh;
}

.admin-view {
    width: 50vw;
    height: 50vh;
    margin: auto;
}

.fullscreen-video {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.language-selector {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.6);
    padding: 10px;
    border-radius: 10px;
    cursor: pointer;
    z-index: 1;
}


.dots {
    color: white;
    font-size: 15px;
}


.language-selector ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

.language-selector li {
    padding: 5px;
    background-color: #fff;
    margin-top: 5px;
    cursor: pointer;
}
</style>
