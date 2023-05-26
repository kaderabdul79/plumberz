<template>
    <div id="technicians">  
        <v-container fluid>
            <v-row>
                <v-col cols="12">
                    <v-sheet class="text-h4 py-2">Technician's Detail's</v-sheet>
                    <v-table
                    fixed-header
                    height="600px"
                >
                    <thead class="text-center">
                    <tr class="text-center">
                        <th>
                            Id
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Email
                        </th>
                        <th class="text-left">
                            Category
                        </th>
                        <th class="text-left">
                            Address
                        </th>
                        <th class="text-left">
                            Year's of Experience
                        </th>
                        <th class="text-left">
                            Age
                        </th>
                        <th class="text-left">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
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
            console.log(response.data);
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
            form.value.errors.errors = error.response.data.errors;
            // Log the error messages for debugging
            console.error(error.response.data);
        });
    }
</script>

<style scoped>

</style>