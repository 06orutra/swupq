<template>
    <div class="carousel">
        <slot :currentSlide="currentSlide" />

        <!-- Navegation -->
        <!-- <div class="navigate">
            <div class="toogle-page left">
                <i @click="prevSlide" class="pi pi-arrow-left"></i>
            </div>
            <div class="toogle-page right">
                <i @click="nextSlide" class="pi pi-arrow-right"></i>
            </div>
        </div> -->

        <!-- Pagination -->
        <div class="pagination">
            <span @click="goToSlide(index)" v-for="(slide, index) in getSlideCount" :key="index"
                :class="{ active: index + 1 === currentSlide }">
            </span>
        </div>

    </div>
</template>

<script>
import { ref, onMounted } from 'vue';
import 'primeicons/primeicons.css';

export default {
    setup() {
        const currentSlide = ref(1);
        const getSlideCount = ref(null);
        const autoPlayEnabled = ref(true);
        const timeoutDuration = ref(5000);

        // Next slide
        const nextSlide = () => {
            updateSlideCount();
            if (currentSlide.value === getSlideCount.value) {
                currentSlide.value = 1;
                return;
            }
            currentSlide.value += 1;
        };

        // prev slide
        const prevSlide = () => {
            updateSlideCount();
            if (currentSlide.value === 1) {
                currentSlide.value = getSlideCount.value;
                return;
            }
            currentSlide.value -= 1;
        }

        const goToSlide = (index) => {
            currentSlide.value = index + 1;
        }

        // auto play
        const autoPlay = () => {
            setInterval(() => {
                nextSlide();
            }, timeoutDuration.value);
        }

        if (autoPlayEnabled.value) {
            autoPlay();
        }

        const updateSlideCount = () => {
            getSlideCount.value = document.querySelectorAll('.slide').length;
            console.log(getSlideCount.value);
        };

        onMounted(updateSlideCount)

        return { currentSlide, nextSlide, prevSlide, getSlideCount, goToSlide };
    }
}
</script>

<style lang="scss">
.navigate {
    padding: 0 16px;
    height: 100%;
    width: 100%;
    position: absolute;
    display: flex;
    justify-content: center;
    align-items: center;

    .toogle-page {
        display: flex;
        flex: 1;
    }

    .right {
        justify-content: flex-end;
    }

    i {
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        background-color: black;
        color: white;
    }
}

.pagination {
    position: absolute;
    bottom: 10px;
    width: 100%;
    display: flex;
    gap: 16px;
    justify-content: center;
    align-items: center;

    span {
        cursor: pointer;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: #fff;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
    }

    .active {
        background-color: #23356A;
    }

    // Para pantallas pequeñas
    @media (max-width: 399px) {
        span {
            width: 10px;
            height: 10px;
        }
    }

    @media (min-width: 400px) and (max-width: 499px) {
        span {
            width: 12px;
            height: 12px;
        }
    }

    @media (min-width: 500px) and (max-width: 599px) {
        span {
            width: 14px;
            height: 14px;
        }
    }

    @media (min-width: 600px) and (max-width: 699px) {
        span {
            width: 16px;
            height: 16px;
        }
    }

    @media (min-width: 700px) and (max-width: 799px) {
        span {
            width: 18px;
            height: 18px;
        }
    }

    @media (min-width: 800px) and (max-width: 899px) {
        span {
            width: 20px;
            height: 20px;
        }
    }

    @media (min-width: 900px) {
        span {
            width: 25px;
            height: 25px;
        }
    }
}
</style>