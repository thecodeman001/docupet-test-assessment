<template>
    <div for="petName" class="form-label">{{ label }}</div>
    <div class="btn-group">
      <DynamicButton
        v-for="gender in genderOptions"
        :key="gender"
        :gender="gender"
        :selectedGender="selectedGender"
        @click="selectGender"
      />
    </div>
  </template>
  
  <script>
  import DynamicButton from './DynamicButton.vue';
  
  export default {
    components: {
      DynamicButton,
    },
    props: {
      label: String,
      items: Array,
      selectedItem: String,
      keyProp: String,
    },
    data() {
      return {
        selectedGender: this.selectedItem,
        genderOptions: this.items,
      };
    },
    methods: {
      selectGender(selectedGender) {
        this.selectedGender = selectedGender;
        this.$emit('update:updatePetProps', this.keyProp, selectedGender);
      },
    },
    watch: {
      selectedItem(newValue) {
        this.selectedGender = newValue;
      },
    },
  };
  </script>

