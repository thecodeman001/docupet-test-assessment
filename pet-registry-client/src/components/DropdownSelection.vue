<template>
    <div>
        <label class="form-label"> {{ label }} </label>
        <input type="text" @input="onChange" v-model="selectedOption" class="form-control" />
        <div class="search-results">
            <ul id="autocomplete-results" v-show="isOpen">
                <li v-if="results.length === 0" @click="setResult(notFoundOption)">
                    {{ notFoundOption }}
                </li>
                <li v-else v-for="(result, index) in results" :key="index" @click="setResult(result)">
                    {{ result }}
                </li>
            </ul>
        </div>
    </div>
</template>
    
<script>
export default {
    props: {
        label: String,
        keyProp: String,
        selectableOptions: {
            type: Array,
            required: false,
            default: () => [],
        },
        notFoundOption: {
            type: String,
            required: false,
            default: "Can't find it?",
        }
    },
    data() {
        return {
            isOpen: false,
            results: [],
            selectedOption: '',
        };
    },
    watch: {
        selectedOption(newVal) {
            if (newVal === '') {
                this.setResult(null);
            }
        },
    },
    mounted() {
        document.addEventListener('click', this.handleClickOutside);
    },
    unmounted() {
        document.removeEventListener('click', this.handleClickOutside);
    },
    methods: {
        setResult(result) {
            this.selectedOption = result;
            this.isOpen = false;
            this.$emit('update:updatePetProps',this.keyProp, this.selectedOption);
        },
        filterResults() {
            this.results = this.selectableOptions.filter((item) => {
                return item.toLowerCase().indexOf(this.selectedOption.toLowerCase()) > -1;
            });
        },
        onChange() {
            this.filterResults();
            this.isOpen = true;
        },
        handleClickOutside(event) {
            if (!this.$el.contains(event.target)) {
                this.isOpen = false;
            }
        },
    },
};
</script>
    
<style>
.search-results {
    position: inherit;
    top: 100%;
    left: 0;
    width: 100%;
    background-color: white;
    border: 1px solid white;
    max-height: 150px;
    overflow-y: auto;
    margin-top: 4px;

    ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    li {
        padding: 5px;
        cursor: pointer;
    }
}
</style>
    