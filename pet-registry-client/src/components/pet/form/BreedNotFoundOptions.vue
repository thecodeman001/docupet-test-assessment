<template>
  <div class="breed-options-container">
    <label class="form-label">Options:</label>
    <div>
      <label>
        <input type="radio" v-model="selectedOption" value="unknown" /> I don't know
      </label>
    </div>
    <div>
      <label>
        <input type="radio" v-model="selectedOption" value="mix" /> It's a mix
      </label>
    </div>
    <div v-if="selectedOption === 'mix'" class="mix-details-container">
      <input type="text" v-model="mixDetails" class="form-control mix-details-input" />
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      selectedOption: null,
      mixDetails: '',
      keyOptionProp: {
        type: String,
        required: true,
        default: '',
      },
      keyMixBreedProp: {
        type: String,
        required: true,
        default: '',
      },
    };
  },
  watch: {
    selectedOption(newVal) {
      this.$emit('update:updatePetProps', this.keyOptionProp, newVal);
    },
    mixDetails(newVal) {
      this.$emit('update:updatePetProps', this.keyMixBreedProp, newVal);
    },
  },
};
</script>

<style>
.breed-options-container {
  padding: 1em; 
}

.mix-details-container {
  padding: 0.66em; 
}

.mix-details-input {
  margin-top: 0.33em; 
}
</style>
