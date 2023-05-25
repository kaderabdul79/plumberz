<template>
    <div>
        Edit {{ props.id }}
    </div>
</template>

<script setup>
import {useRoute} from 'vue-router'
const route = useRoute()
console.log(route.params.id);
const props = defineProps(['id']);
</script>

<style scoped>

</style>