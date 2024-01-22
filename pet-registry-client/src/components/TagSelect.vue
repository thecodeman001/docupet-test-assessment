<template>
  <div class="form-label">{{ label }}</div>
  <div class="btn-group">
    <DynamicButton v-for="tag in tagOptions" :key="tag" :inner-text="tag" :on-click="selectTag"
      :button-class="getButtonClass(tag)" />
  </div>
</template>
  
<script>
import DynamicButton from './DynamicButton.vue';

export default {
  data() {
    return {
      selectedTag: null,
    };
  },
  components: {
    DynamicButton,
  },
  props: {
    label: String,
    tagOptions: {
      type: Array,
      required: true,
    },
    onTagSelect: {
      type: Function,
      required: false,
      default: null,
    },
  },
  methods: {
    selectTag(selectedTag) {
      this.selectedTag = selectedTag;
      this.onTagSelect(selectedTag);
    },
    getButtonClass(tag) {
      return tag === this.selectedTag ? 'btn text-white btn-primary' : 'btn btn-outline-primary';
    },
  },
};
</script>

