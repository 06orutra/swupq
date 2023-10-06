<template>
    <div :class="['video-component', { 'admin-view': isAdmin }]">
        <div class="language-selector" @click="toggleLanguages" @touchstart.prevent="toggleLanguages">
            <span class="dots">•••</span>
            <ul v-if="showLanguages">
                <li @click="changeVideo('Español')">Español</li>
                <li @click="changeVideo('Inglés')">Inglés</li>
                <li @click="changeVideo('Francés')">Francés</li>
                <li @click="changeVideo('Portugués')">Portugués</li>
            </ul>
        </div>
        <iframe ref="videoElement" :src="currentEmbedUrl" frameborder="0" allowfullscreen class="fullscreen-video">
        </iframe>
    </div>
</template>

<script>
export default {
    data() {
        return {
            showLanguages: false,
            videos: {
                'Español': 'https://youtu.be/koWfeJPQkEk',
                'Inglés': 'https://youtu.be/YQ3GDTqI-yQ',
                'Francés': 'https://youtu.be/XDdznpG5NIU',
                'Portugués': 'https://youtu.be/guJvmvDDSAk'
            },
            currentUrl: 'https://youtu.be/koWfeJPQkEk',
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
}</style>
