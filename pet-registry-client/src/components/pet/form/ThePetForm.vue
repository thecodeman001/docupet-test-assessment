<template>
    <div class="container mt-4">
        <form @submit.prevent="handleContinue" @input="updateContinueStatus">
            <div class="border p-5 shadow m-auto w-50">
                <h3 class="mb-4 text-primary">{{ petTypeHeading }}</h3>

                <TagSelect label="Type of pet?" :tag-options="petTypes" @update:updatePetProps="updatePetProps"
                    :on-tag-select="tagSelect('localPetType')" />

                <PetInfoSection :petName="petName" :petType="localPetType" @update:updatePetProps="updatePetProps"
                    :keyProp="'petName'" />

                <DropdownSelection :selectable-options=breeds :label="'What breed are they?'"
                    not-found-option:="notFoundOption" @update:updatePetProps="updatePetProps" :keyProp="'breed'" />
                <BreedNotFoundOptions v-if="breed === notFoundOption" :keyOptionProp="'breedNotFoundOption'"
                    :keyMixBreedProp="'mixBreed'" @update:updatePetProps="updatePetProps" />

                <TagSelect label="What gender are they?" :tag-options="genders" @update:updatePetProps="updatePetProps"
                    :on-tag-select="tagSelect('localGender')" />

                <div class="d-flex justify-content-center mt-4">
                    <button class="btn btn-primary" type="submit" :disabled="isContinueDisabled">
                        Continue
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>
  
<script>
import axios from 'axios';
import PetInfoSection from './PetInfoSection.vue';
import DropdownSelection from '../../DropdownSelection.vue'
import TagSelect from '../../TagSelect.vue';
import BreedNotFoundOptions from './BreedNotFoundOptions.vue'

export default {
    data() {
        return {
            petName: '',
            breed: '',
            localGender: '',
            genders: ['female', 'male'],
            petTypes: ['dog', 'cat'],
            localPetType: 'pet',
            dogBreeds: [
                'Labrador Retriever',
                'German Shepherd',
                'Golden Retriever',
                'Bulldog',
                'Beagle',
                'Poodle',
                'Rottweiler',
                'Siberian Husky',
                'Dachshund',
                'Shih Tzu',
            ],
            catBreeds: [
                'Persian',
                'Siamese',
                'Maine Coon',
                'Sphynx',
                'Bengal',
                'Ragdoll',
                'British Shorthair',
                'Abyssinian',
                'Scottish Fold',
                'Norwegian Forest',
            ],
            notFoundOption: 'Can\'t find it?',
            mixBreed: '',
            breedNotFoundOption: '',
            tagSelect: (keyProp) => {
                return function customEmitter(tag) {
                    this.$emit('update:updatePetProps', keyProp, tag);
                };
            }
        };
    },
    computed: {
        petTypeHeading() {
            return `Tell us about your ${this.localPetType || 'pet'}`;
        },
        breeds() {
            switch (this.localPetType) {
                case 'cat':
                    return this.catBreeds
                case 'dog':
                    return this.dogBreeds
                default:
                    return [];
            }
        },
        isContinueDisabled() {
            return !(
                this.petName &&
                this.localPetType &&
                this.localGender &&
                (this.breed || this.mixBreed)
            );
        },
    },
    methods: {
        handleContinue() {
            axios
                .post('http://localhost:8000/api/v1/pet', {
                    petType: this.localPetType,
                    petName: this.petName,
                    breed: this.breed,
                    gender: this.localGender,
                    option: this.option,
                    mixBreed: this.mixBreed,
                }).then((response) => {
                    console.log(response.data.message);
                })
                .catch((error) => {
                    console.error('Error submitting form:', error);
                });
        },
        updatePetProps(key, value) {
            this[key] = value;
            console.log(this[key]);
        },
    },
    components: {
        PetInfoSection,
        DropdownSelection,
        TagSelect,
        BreedNotFoundOptions,
    },
};
</script>
  