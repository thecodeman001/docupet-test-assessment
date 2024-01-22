<template>
    <button type='button' :class="buttonClass" @click="handleClick">
        {{ label }}
    </button>
</template>
  
<script>
export default {
    props: {
        innerText: String,
        onClick: Function,
        buttonClass: String,
    },
    computed: {
        label() {
            return this.innerText.charAt(0).toUpperCase() + this.innerText.slice(1);
        },
    },
    methods: {
        handleClick() {
            this.onClick(this.innerText);
        },
    },
};
</script>
