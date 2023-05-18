<template>
    <div id="login" class="h-100 bg-blue-lighten-1 pa-3 rounded">
        <v-sheet width="500" class="mx-auto">
            <div class="text-h3 bg-blue-darken-2 text-center py-4">Login</div>
            <v-form class="pa-3" fast-fail @submit.prevent="formSubmit">
            <v-text-field
                v-model="firstName"
                label="First name"
            ></v-text-field>

            <v-text-field
                v-model="lastName"
                label="Last name"
            ></v-text-field>

            <v-btn type="submit" block class="mt-2 bg-blue-darken-2">Submit</v-btn>
            </v-form>
            <!--  -->
            <div class="social-login pa-3 d-flex align-items-center justify-content-between">
                <v-card
                class="my-2 pr-2 mr-2 text-subtitle-2"
                title="Login with Github"
                prepend-icon="mdi-github"
                href="https://github.com/vuetifyjs/vuetify/"
                target="_blank"
                rel="noopener"
            ></v-card>
            <v-card
                class="my-2 pr-2 text-subtitle-2"
                title="Login with Google"
                prepend-icon="mdi-google"
                href="https://github.com/vuetifyjs/vuetify/"
                target="_blank"
                rel="noopener"
            ></v-card>
            </div>
        </v-sheet>
    </div>
</template>

<script setup>
import {ref} from 'vue'
const firstName = ref("")
const lastName = ref("")
function formSubmit(){
    alert("submit",firstName.value)
    // return ;
}
</script>

<style scoped>
div#login {
    display: flex;
    align-items: center;
}
div.v-card-item{
    padding: 0px !important;
    background-color: red;
}
.social-login a .v-card-item{
    padding: 0px !important;
    background-color: red;
}
</style>