<template>
  <div class="card">
    <div class="flex flex-wrap gap-3 mb-5">
      <div v-for="option in positionOptions" :key="option.label" class="flex align-items-center">
        <RadioButton :value="option.value" :id="option.label" v-model="position" />
        <label :for="option.label" class="ml-2">{{ option.label }}</label>
      </div>
    </div>
    <Galleria
      :value="images"
      :numVisible="5"
      containerStyle="auto"
      :showThumbnails="false"
      :showIndicators="true"
      :changeItemOnIndicatorHover="true"
      :showIndicatorsOnItem="false" 
      :indicatorsPosition="position"
    >
      <template #item="slotProps">
        <img
          :src="slotProps.item.itemImageSrc"
          :alt="slotProps.item.alt"
          class="centered-image"
        />
      </template>
    </Galleria>
  </div>
</template>

<script>
export default {
  data() {
    return {
      images: [
        {
          itemImageSrc: 'https://www.upq.mx/media/institucion/02_INSTALACIONES.png',
          thumbnailImageSrc: 'https://www.upq.mx/media/institucion/02_INSTALACIONES.png',
          alt: 'Description for Image 1',
          title: 'Title 1'
        },
        {
          itemImageSrc: 'https://www.upq.mx/media/institucion/05_INSTALACIONES.png',
          thumbnailImageSrc: 'https://www.upq.mx/media/institucion/05_INSTALACIONES.png',
          alt: 'Description for Image 2',
          title: 'Title 2'
        },
        {
          itemImageSrc: 'https://www.upq.mx/media/institucion/16_INSTALACIONES.png',
          thumbnailImageSrc: 'https://www.upq.mx/media/institucion/16_INSTALACIONES.png',
          alt: 'Description for Image 3',
          title: 'Title 3'
        },
        {
          itemImageSrc: 'https://www.upq.mx/media/institucion/17_INSTALACIONES.png',
          thumbnailImageSrc: 'https://www.upq.mx/media/institucion/17_INSTALACIONES.png',
          alt: 'Description for Image 4',
          title: 'Title 4'
        },
      ],
      position: "bottom",
      positionOptions: [
        {
          label: "Bottom",
          value: "bottom"
        },
        {
          label: "Top",
          value: "top"
        },
        {
          label: "Left",
          value: "left"
        },
        {
          label: "Right",
          value: "right"
        }
      ]
    };
  }
};
</script>

<style scoped>
.centered-image {
  max-width: 100%;
  max-height: 100%;
  display: block;
  margin: 0 auto; /* Centra la imagen horizontalmente */
}
</style>
