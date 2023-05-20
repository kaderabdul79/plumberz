<template>
    <div id="categories">
        <v-container fluid>
            <v-row>
                <v-col col="4">
                    <v-btn color="success">Add new Category</v-btn>
                </v-col>
                <v-col col="8">
                    <v-sheet class="text-h4">Categorie's Table</v-sheet>
                    <v-table
                    fixed-header
                    height="420px"
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
import {ref} from "vue"
  const categories = ref([
    {
        id: 1,
        name: "mason"
    },
    {
        id: 2,
        name: "wilding"
    },
  ])
</script>

<style scoped>

</style>