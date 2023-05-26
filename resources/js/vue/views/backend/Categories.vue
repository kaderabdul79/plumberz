<template>
    <div id="categories">  
        <v-container fluid>
            <v-row>
                <v-col cols="4">
                    <v-sheet>
                        <v-sheet class="text-h4 py-2">Add new Category</v-sheet>
                        <v-form @submit.prevent="createNewCategory">
                            <v-text-field v-model="form.name" label="Name" variant="outlined"></v-text-field>
                            <div class="text-subtitle-2 text-red" v-if="form.errors.has('name')" v-html="form.errors.get('name')" />
                            <v-btn  type="submit" color="success">Submit</v-btn>
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
                <v-col cols="8">
                    <v-sheet class="text-h4 py-2">Categorie's Table</v-sheet>
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
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr
                        v-for="category in categories"
                        :key="category.id"
                    >
                    
                        <td>{{ category.id }}</td>
                        <td>{{ category.name }}</td>
                        <td>
                        <v-btn :to="{name: 'editcategories',params: {id: category.id}}" class="mr-3" color="success">Edit</v-btn>
                        <v-btn @click="deleteACategory(category.id)" color="red-darken-1">Delete</v-btn>
                        </td>
                    </tr>
                    </tbody>
                </v-table>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>

<script setup>
import {ref,onMounted} from "vue"
import Form from 'vform'

import axios from 'axios'
axios.defaults.baseURL = "http://127.0.0.1:8000/api/"
// const name = ref("") 
import useSnackbar from '../../composables/useSnackbar';
const { message, snackbar, showSnackbar } = useSnackbar();
const form = ref(new Form(
    {
        name: '',
    }
));
// 
  const categories = ref([])         
    function fetchCategories(){
        axios.get('categories/')
        .then(response => categories.value = response.data?.categories )
        .catch(error => {
            console.error(error);
        });
    }
onMounted(()=>{
    fetchCategories()
})
    function createNewCategory(e){
        axios.post('categories/',{"name":form.value.name})
        .then(response => {
            form.value.name = ''
            // console.log(values.name);
            showSnackbar(response.data.message)
            fetchCategories()
            console.log(response);
        })
        .catch(error => {
            form.value.errors.errors = error.response.data.errors;
            showSnackbar("failed to create,try again!")
            console.error(error);
        });
    }

    function deleteACategory(id){
        axios.delete('categories/'+id)
        .then(response => {
            fetchCategories()
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
<!--  -->