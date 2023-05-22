<template>
    <div id="categories">  
        <v-container fluid>
            <v-row>
                <v-col cols="4">
                    <v-sheet>
                        <v-sheet class="text-h4 py-2">Add new Category</v-sheet>
                        <v-form @submit="onSubmit">
                            <v-text-field v-bind="name" label="Name" variant="outlined"></v-text-field>
                            <v-sheet class="text-red text-subtitle-2 py-0 my-0">{{ errors.name }}</v-sheet>
                            <v-btn @click="createNewCategory" color="success">Submit</v-btn>
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
                        <v-btn class="mr-3" color="success">Edit</v-btn>
                        <v-btn color="red-darken-1">Delete</v-btn>
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

import { useForm } from 'vee-validate';
import * as yup from 'yup';

const { errors, handleSubmit, defineInputBinds, meta, values } = useForm({
  validationSchema: yup.object({
    name: yup.string().required(),
  }),
});

const onSubmit = handleSubmit(values => {
  alert(JSON.stringify(values, null, 2));
});

const name = defineInputBinds('name');
// 
import axios from 'axios'
axios.defaults.baseURL = "http://127.0.0.1:8000/api/"
// const name = ref("") 
const snackbar = ref(false)
const message = ref("")
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
        axios.post('categories/',{"name":values.name})
        .then(response => {
            values.name = ''
            // console.log(values.name);
            snackbar.value = true
            message.value = response.data.message
            fetchCategories()
            console.log(response);
        })
        .catch(error => {
            console.error(error.message);
        });
    }
</script>

<style scoped>

</style>
<!--  -->