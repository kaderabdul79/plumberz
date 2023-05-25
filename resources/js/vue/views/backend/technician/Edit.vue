<template>
    <div>
        Edit {{ props.id }}
    </div>
</template>

<script setup>
import {ref,onMounted} from 'vue'
console.log(route.params.id);
const props = defineProps(['id']);
// 
import axios from 'axios'
axios.defaults.baseURL = "http://127.0.0.1:8000/api/"


    const technicians = ref([])         
    function getATechnicians(){
        axios.get('technicians/'+route.params.id+'/edit')
        .then(response => {
            console.log(response);
            // technicians.value = response.data?.data
        } )
        .catch(error => {
            console.error(error);
        });
    }
    onMounted(()=>{
        getATechnicians()
    })
</script>

<style scoped>

</style>