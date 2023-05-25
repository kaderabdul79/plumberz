<template>
    <div id="createtechnicians">  
        <v-container fluid>
            <v-row>
                <v-col cols="6" xs="12" offset="3">
                    <v-sheet>
                        <v-sheet class="text-h4 py-2 text-center">Add Technician</v-sheet>
                        <v-form @submit.prevent="addNewTechnician">
                            <v-text-field v-model="form.name" label="Name" variant="outlined"></v-text-field>
                            <div class="text-subtitle-2 text-red" v-if="form.errors.has('name')" v-html="form.errors.get('name')" />
                            <v-text-field v-model="form.email" label="Email address" variant="outlined" type="email"></v-text-field>
                            <div class="text-subtitle-2 text-red" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
                            <v-select label="Select Category" v-model="form.category" :items="form.categories" variant="outlined"></v-select>
                            <div class="text-subtitle-2 text-red" v-if="form.errors.has('category')" v-html="form.errors.get('category')" />
                            <v-text-field v-model="form.address" label="Write address" variant="outlined"></v-text-field>
                            <div class="text-subtitle-2 text-red" v-if="form.errors.has('address')" v-html="form.errors.get('address')" />
                            <v-text-field v-model="form.age" label="Age" variant="outlined"></v-text-field>
                            <div class="text-subtitle-2 text-red" v-if="form.errors.has('age')" v-html="form.errors.get('age')" />
                            <v-text-field v-model="form.experience" label="Year's of Experience" variant="outlined"></v-text-field>
                            <div class="text-subtitle-2 text-red" v-if="form.errors.has('experience')" v-html="form.errors.get('experience')" />
                            <v-btn type="submit" color="success" block>Submit</v-btn>
                        </v-form>
                        <v-sheet>
                            <v-snackbar
                                timeout="3000"
                                v-model="snackbar"
                                right
                                >
                                {{ message }}

                                <template v-slot:actions>
                                    <v-btn
                                    color="pink"
                                    variant="text"
                                    @click="snackbar = false"
                                    >
                                    Close
                                    </v-btn>
                                </template>
                            </v-snackbar>
                        </v-sheet>
                    </v-sheet>
                </v-col>
            </v-row>
        </v-container>        
    </div>
</template>

<script setup>
import Form from 'vform'
import { ref,onMounted } from 'vue';
import useSnackbar from '../../../composables/useSnackbar';
const { message, snackbar, showSnackbar } = useSnackbar();
import axios from 'axios'
axios.defaults.baseURL = "http://127.0.0.1:8000/api/"
const form = ref(new Form(
    {
        name: '',
        email: '',
        category: '',
        categories: ['Electrician', 'Mason', 'Cleaner'],
        address: '',
        age: null,
        experience: null,
    }
));

    function addNewTechnician(){
        // console.log("test form");
        // console.log(form.value);
            axios.post('technicians/', {
                                    name: form.value.name,
                                    email: form.value.email,
                                    address: form.value.address,
                                    age: form.value.age,
                                    experience: form.value.experience,
                                })
            .then(response => {
                showSnackbar(response.data.message)
                form.value = originalData
                // console.log(response.data);
            })
            .catch(error => {
                // console.error(error.response.data.errors);
                form.value.errors.errors = error.response.data.errors;
                showSnackbar("failed,try again!")
                // Log the error messages for debugging
                console.error(error.response.data);
            });
    }
</script>

<style scoped>

</style>