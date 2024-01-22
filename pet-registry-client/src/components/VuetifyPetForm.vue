<template>
    <v-container class="text-center">
        <v-row justify="center">
            <v-col cols="12" md="6">
                <v-form @submit.prevent="submitForm">
                    <v-row>
                        <v-col class="text-left" cols="12">
                            <v-subheader>What is your pet's name?</v-subheader>
                            <v-text-field v-model="form.name" required variant='outlined' color="white"></v-text-field>
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col cols="12">
                            <div class="button-group">
                                <v-btn v-for="(type, index) in typeOptions" :key="index" @click="selectType(type)"
                                    :color="form.type === type ? 'primary' : ''" outlined class="custom-button"
                                    :style="{ color: form.type === type ? 'white' : '#1976d2', borderRight: index === typeOptions.length - 1 ? '1px solid #1976d2' : 'none', borderTopLeftRadius: index === 0 ? '4px' : '0', borderBottomLeftRadius: index === 0 ? '4px' : '0', borderTopRightRadius: index === typeOptions.length - 1 ? '4px' : '0', borderBottomRightRadius: index === typeOptions.length - 1 ? '4px' : '0' }">
                                    {{ type }}
                                </v-btn>
                            </div>
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col class="text-left" cols="12">
                            <v-subheader>What breed are they?</v-subheader>
                            <v-autocomplete v-model="form.breed" :items="breedOptions" variant='outlined'
                                ref="breedAutocomplete" color="white">
                                <template #no-data>
                                    <v-list-item @click="selectCantFind">
                                        <v-list-item-content>
                                            <v-list-item-title>Can't find it?</v-list-item-title>
                                        </v-list-item-content>
                                    </v-list-item>
                                </template>
                            </v-autocomplete>
                        </v-col>
                    </v-row>

                    <v-row v-if="form.breed === 'Can\'t find it?'">
                        <v-col cols="12">
                            <v-radio-group v-model="form.chooseOne" label="Choose One">
                                <v-radio label="I don't know" value="I don't know"></v-radio>
                                <v-radio label="It's a mix" value="It's a mix"></v-radio>
                            </v-radio-group>
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col cols="12">
                            <div class="button-group">
                                <v-btn v-for="(gender, index) in genderOptions" :key="index" @click="selectGender(gender)"
                                    :color="form.gender === gender ? 'primary' : ''" outlined class="custom-button"
                                    :style="{ color: form.gender === gender ? 'white' : '#1976d2', borderRight: index === genderOptions.length - 1 ? '1px solid #1976d2' : 'none', borderTopLeftRadius: index === 0 ? '4px' : '0', borderBottomLeftRadius: index === 0 ? '4px' : '0', borderTopRightRadius: index === genderOptions.length - 1 ? '4px' : '0', borderBottomRightRadius: index === genderOptions.length - 1 ? '4px' : '0' }">
                                    {{ gender }}
                                </v-btn>
                            </div>
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col cols="12">
                            <v-btn type="submit" color="primary" :disabled="!canSubmit" outlined class="custom-button"
                                :style="{ color: canSubmit ? 'white' : '#1976d2' }">Continue</v-btn>
                        </v-col>
                    </v-row>
                </v-form>
            </v-col>
        </v-row>
    </v-container>
</template>
  
<script>
export default {
    data() {
        return {
            form: {
                name: '',
                type: '',
                breed: '',
                chooseOne: '',
                gender: '',
            },
            typeOptions: ['Cat', 'Dog'],
            genderOptions: ['Male', 'Female'],
            breedOptions: ['Breed1_Cat', 'Breed2_Cat', 'Breed3_Cat', 'Breed1_Dog', 'Breed2_Dog', 'Breed3_Dog'],
        };
    },
    computed: {
        canSubmit() {
            return (this.form.breed !== 'Can\'t find it?' && this.form.breed) && this.form.name && this.form.gender;
        }
    },
    methods: {
        selectType(type) {
            this.form.type = type;
            this.form.breed = '';
            this.form.chooseOne = '';
        },
        selectGender(gender) {
            this.form.gender = gender;
        },
        submitForm() {
            console.log('Form submitted:', this.form);
        },
        selectCantFind() {
            this.$nextTick(() => {
                this.$refs.breedAutocomplete.hideMenu();
            });
            this.form.breed = "Can't find it?";
        },
    },
};
</script>
  
<style scoped>
.button-group {
    display: flex;
    justify-content: flex-start;
    gap: 0;
}

.v-text-field--outlined.v-input--is-focused:not(.v-text-field--readonly) {
    background-color: white;
    border-color: #1976d2;
}

.custom-button {
    box-shadow: none;
    margin: 0;
    border: 1px solid #1976d2;
}

.custom-text-field {
    background-color: white;
    border-radius: 4px;
    border: 1px solid black;
}
</style>
  