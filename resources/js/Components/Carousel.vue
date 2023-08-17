<template>
    <div class="carousel">
        <slot :currentSlide="currentSlide" />

        <!-- Navegation -->
        <div class="navigate">
            <div class="toogle-page left">
                <i @click="prevSlide" class="pi pi-arrow-left"></i>
            </div>
            <div class="toogle-page right">
                <i @click="nextSlide" class="pi pi-arrow-right"></i>
            </div>
        </div>

        <!-- Pagination -->
        <!-- <div class="pagination">
            
        </div> -->

    </div>
</template>

<script>
import { ref, onMounted } from 'vue';
import 'primeicons/primeicons.css';

export default {
    setup() {
        const currentSlide = ref(1);
        const getSlideCount = ref(null);
        console.log(getSlideCount.value);

        // Next slide
        const nextSlide = () => {
            updateSlideCount();
            if(currentSlide.value === getSlideCount.value) {
                currentSlide.value = 1;
                return;
            }
            currentSlide.value += 1;
        };

        // prev slide min
        const prevSlide = () => {
            updateSlideCount();
            if(currentSlide.value === 1){
                currentSlide.value = getSlideCount.value;
                return;
            }
            currentSlide.value -= 1;
        }

        const updateSlideCount = () => {
            getSlideCount.value = document.querySelectorAll('.slide').length;
            console.log(getSlideCount.value);
        };

        onMounted(updateSlideCount)

        return { currentSlide, nextSlide, prevSlide};
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

</style>