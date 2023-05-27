<template>
    <div id="technicians">  
        <v-container fluid>
            <v-row>
                <v-col cols="12">
                    <v-sheet class="d-flex justify-space-between">
                        <h2 class="">Technician's Detail's</h2>
                        <div><v-btn :to="{name: 'createTechnicians'}" color="primary" class="">Add New</v-btn></div>
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
                            Category
                        </th>
                        <th class="text-center">
                            Address
                        </th>
                        <th class="text-center">
                            Experience
                        </th>
                        <th class="text-center">
                            Age
                        </th>
                        <th class="text-center">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    <tr
                        v-for="technician in technicians"
                        :key="technician.id"
                    >
                    
                        <td>{{ technician.id }}</td>
                        <td>{{ technician.name }}</td>
                        <td>{{ technician.email }}</td>
                        <td>{{ technician.category }}</td>
                        <td>{{ technician.address }}</td>
                        <td>{{ technician.experience }}</td>
                        <td>{{ technician.age }}</td>
                        <td>
                        <v-btn :to="{name: 'editTechnicians',params: {id: technician.id}}" class="mr-3" color="success">Edit</v-btn>
                        <v-btn @click="deleteATechnician(technician.id)" color="red-darken-1">Delete</v-btn>
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


    const technicians = ref([])         
    function getAllTechnicians(){
        axios.get('technicians/')
        .then(response => {
            // console.log(response.data);
            technicians.value = response.data?.data
        } )
        .catch(error => {
            console.error(error);
        });
    }
    onMounted(()=>{
        getAllTechnicians()
    })
    // delete a technician
    function deleteATechnician(id){
        axios.delete('technicians/'+id)
        .then(response => {
            getAllTechnicians()
            showSnackbar(response.data?.message)
            // console.log(response.data);
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