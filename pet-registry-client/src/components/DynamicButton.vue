<template>
    <button :type="buttonType" :class="buttonClasses" @click="handleClick">
        {{ label }}
    </button>
</template>
  
<script>
export default {
    props: {
        gender: String,
        selectedGender: String,
        onClick: Function,
    },
    computed: {
        buttonType() {
            return 'button';
        },
        buttonClasses() {
            return {
                'btn': true,
                'btn-outline-primary': this.gender !== this.selectedGender,
                'btn-primary': this.gender === this.selectedGender,
                'text-white': this.gender === this.selectedGender,
            };
        },
        label() {
            return this.gender.charAt(0).toUpperCase() + this.gender.slice(1);
        },
    },
    methods: {
        handleClick() {
            this.onClick(this.gender);
        },
    },
};
</script>
  