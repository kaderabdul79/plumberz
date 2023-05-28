<template>
    <div id="users">  
        <v-container fluid>
            <v-row>
                <v-col cols="12">
                    <v-sheet class="d-flex justify-space-between">
                        <h2 class="">user's Detail's</h2>
                        <div><v-btn :to="{name: 'createUsers'}" color="primary" class="">Add New</v-btn></div>
                    </v-sheet>
                    <v-table
                    fixed-header
                    height="600px"
                >
                    <thead class="">
                    <tr>
                        <th class="text-center">
                            Id
                        </th>
                        <th class="text-center">
                            Name
                        </th>
                        <th class="text-center">
                            Email
                        </th>
                        <th class="text-center">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    <tr
                        v-for="user in users"
                        :key="user.id"
                    >
                    
                        <td>{{ user.id }}</td>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>
                        <v-btn :to="{name: 'editUsers',params: {id: user.id}}" class="mr-3" color="success">Edit</v-btn>
                        <v-btn @click="deleteAUser(user.id)" color="red-darken-1">Delete</v-btn>
                        </td>
                    </tr>
                    </tbody>
                </v-table>
                <!-- snackbar -->
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
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>

<script setup>
import { ref,onMounted } from 'vue';
import useSnackbar from '../../../composables/useSnackbar';
const { message, snackbar, showSnackbar } = useSnackbar();
import axios from 'axios'
axios.defaults.baseURL = "http://127.0.0.1:8000/api/"
const users = ref([])         

    function getAllUsers(){
        axios.get('users/')
        .then(response => {
            console.log(response.data);
            users.value = response.data?.data
        } )
        .catch(error => {
            console.error(error);
        });
    }
    onMounted(()=>{
        getAllUsers()
    })
    // delete a user
    function deleteAUser(id){
        axios.delete('users/'+id)
        .then(response => {
            getAllUsers()
            showSnackbar(response.data?.message)
            console.log(response.data);
        })
        .catch(error => {
            // console.error(error.response.data.errors);
            showSnackbar("failed to delete, try again")
            // form.value.errors.errors = error.response.data.errors;
            // Log the error messages for debugging
            console.error(error.response.data);
        });
    }
</script>

<style scoped>

</style>