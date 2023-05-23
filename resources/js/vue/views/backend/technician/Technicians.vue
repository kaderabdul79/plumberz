<template>
    <div id="technicians">  
        <v-container fluid>
            <v-row>
                <v-col md="4" sm="12" xs="12">{{ form.errors }}{{ form.email }}{{ form.experience }}{{ form.address }}
                    <v-sheet>{{ form.category }}{{ form.age }}{{ form.name }}
                        <v-sheet class="text-h4 py-2">Add Technician</v-sheet>
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
                            <v-btn type="submit" color="success">Submit</v-btn>
                        </v-form>
                        <!-- <v-sheet>
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
                        </v-sheet> -->
                    </v-sheet>
                </v-col>
                <v-col md="8" sm="12" xs="12">
                    <v-sheet class="text-h4 py-2">Technician's Detail's</v-sheet>
                    <v-table
                    fixed-header
                    height="600px"
                >
                    <thead>
                    <tr>
                        <th class="text-left">
                            Id
                        </th>
                        <th class="text-left">
                            Name
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
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- <tr
                        v-for="category in categories"
                        :key="category.id"
                    >
                    
                        <td>{{ category.id }}</td>
                        <td>{{ category.name }}</td>
                        <td>
                        <v-btn :to="{name: 'editcategories',params: {id: category.id}}" class="mr-3" color="success">Edit</v-btn>
                        <v-btn color="red-darken-1">Delete</v-btn>
                        </td>
                    </tr> -->
                    </tbody>
                </v-table>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>

<script setup>
import Form from 'vform'
import { ref } from 'vue';
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
                                    category: form.value.category,
                                    address: form.value.address,
                                    age: form.value.age,
                                    experience: form.value.experience,
                                })
            .then(response => {
                console.log(response.data);
            })
            .catch(error => {
                // console.error(error.response.data.errors);
                form.value.errors.errors = error.response.data.errors;

                // Log the error messages for debugging
                console.error(error.response.data);
            });
    }
</script>

<style scoped>

</style>