<template>
    <div id="login" class="h-100 bg-blue-lighten-1 pa-3 rounded">
        <v-sheet width="500" class="mx-auto">
            <div class="text-h3 bg-blue-darken-2 text-center py-4">Registration</div>
            <!--  -->
            <v-timeline direction="horizontal" line-inset="12">
                <v-timeline-item class="one common text-blue-darken-2"></v-timeline-item>

                <v-timeline-item class="two common text-blue-darken-2"></v-timeline-item>

                <v-timeline-item class="three common text-blue-darken-2"></v-timeline-item>
            </v-timeline>
            <!-- timeline progress -->
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
.v-timeline{
    position: relative;
}
.v-timeline-item.common::after {
    position: absolute;
    top: 25px;
    font-size: 25px;
    z-index: 55;
    width: 28px;
    height: 28px;
}
.v-timeline-item.one::after{
    content: "1";
    left: 67px;
}
.v-timeline-item.two::after{
    content: "2";
    left: 243px;
}
.v-timeline-item.three::after{
    content: "3";
    right: 55px;
}
.v-timeline .v-timeline-divider__dot{
    background-color: antiquewhite !important;
}
</style>