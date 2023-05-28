<template>
    <div class="updateuser">
        <v-container fluid>
            <v-row>
                <v-col cols="6" xs="12" offset="3">
                    <v-sheet>
                        <v-sheet class="text-h4 py-2 text-center">Edit User Detail's</v-sheet>
                        <v-form @submit.prevent="updateUser">
                            <v-text-field v-model="form.name" label="Name" variant="outlined"></v-text-field>
                            <div class="text-subtitle-2 text-red" v-if="form.errors.has('name')" v-html="form.errors.get('name')" />
                            <v-text-field v-model="form.email" label="Email address" variant="outlined" type="email"></v-text-field>
                            <div class="text-subtitle-2 text-red" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
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
import {ref,onMounted} from 'vue'
const props = defineProps(['id']);
import Form from 'vform'
import {useRouter} from 'vue-router'
const router = useRouter()
import axios from 'axios'
axios.defaults.baseURL = "http://127.0.0.1:8000/api/"

import useSnackbar from '../../../composables/useSnackbar';
const { message, snackbar, showSnackbar } = useSnackbar();
const form = ref(new Form(
    {
        name: '',
        email: '',
    }
));
       
    function getAUsers(){
        axios.get('users/'+props.id+'/edit')
        .then(response => {
            console.log(response.data.data);
            form.value.fill(response.data?.data)
        } )
        .catch(error => {
            console.log(error);
        });
    }
    onMounted(()=>{
        getAUsers()
    })

    function updateUser(){
        axios.put('users/'+props.id, {
                                    name: form.value.name,
                                    email: form.value.email,
                                })
            .then(response => {
                showSnackbar(response.data?.message)
                setTimeout(()=>{
                    router.push({name: "users"})
                },4000)
                console.log(response.data);
            })
            .catch(error => {
                // console.error(error.response.data.errors);
                showSnackbar("failed to edit details, try again")
                form.value.errors.errors = error.response.data.errors;
                // Log the error messages for debugging
                console.error(error);
            });
    }
</script>

<style scoped>

</style>