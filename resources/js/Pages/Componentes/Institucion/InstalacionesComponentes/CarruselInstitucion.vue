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
      images: [],
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
  },
  mounted() {
    this.cargarDatosDesdeLaBaseDeDatos();
  },
  methods: {
    cargarDatosDesdeLaBaseDeDatos() {
      // Realiza una solicitud a tu punto final de base de datos
      axios.post('/CarruselInstalaciones/bannerData')
        .then((response) => {
          this.images = response.data.map(item => {
            return {
              itemImageSrc: '/storage/' + item.imagen,
              alt: item.alt,
              // Otras propiedades si las tienes en tu base de datos
            };
          });
        })
        .catch((error) => {
          console.error(error);
        });
    }
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
