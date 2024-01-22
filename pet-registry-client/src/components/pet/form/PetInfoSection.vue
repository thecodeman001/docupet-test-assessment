<template>
  <div class="mb-3">
    <label for="petName" class="form-label">What is your {{ petType }}'s name?</label>
    <input type="text" class="form-control" id="petName" :value="petName" @input="updatePetName" />
  </div>
</template>

<script>
export default {
  props: {
    petName: String,
    petType: String,
    keyProp: String,
  },
  methods: {
    updatePetName(event) {
      this.$emit('update:updatePetProps', this.keyProp, event.target.value);
    },
  },
};
</script>
