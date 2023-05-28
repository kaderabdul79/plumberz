<template>
    <div id="createusers">  
        <v-container fluid>
            <v-row>
                <v-col cols="6" xs="12" offset="3">
                    <v-sheet>
                        <v-sheet class="text-h4 py-2 text-center">Add user</v-sheet>
                        <v-form @submit.prevent="addNewUser">
                            <v-text-field v-model="form.name" label="Name" variant="outlined"></v-text-field>
                            <div class="text-subtitle-2 text-red" v-if="form.errors.has('name')" v-html="form.errors.get('name')" />
                            <v-text-field v-model="form.email" label="Email address" variant="outlined" type="email"></v-text-field>
                            <div class="text-subtitle-2 text-red" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
                            <v-text-field v-model="form.password" label="Password" variant="outlined" type="password"></v-text-field>
                            <div class="text-subtitle-2 text-red" v-if="form.errors.has('password')" v-html="form.errors.get('password')" />
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
import {useRouter} from 'vue-router'
import useSnackbar from '../../../composables/useSnackbar';
const { message, snackbar, showSnackbar } = useSnackbar();
import axios from 'axios'
axios.defaults.baseURL = "http://127.0.0.1:8000/api/"
const router = useRouter()
const form = ref(new Form(
    {
        name: '',
        email: '',
        password: '',
    }
));

    function addNewUser(){
        // console.log(form.value);
            axios.post('users/', {
                                    name: form.value.name,
                                    email: form.value.email,
                                    password: form.value.password,
                                })
            .then(response => {
                showSnackbar(response.data.message)
                setTimeout(()=>{
                    router.push({name: "users"})
                },2000)
                console.log(response.data);
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