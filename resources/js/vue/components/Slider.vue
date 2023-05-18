<template>
    <div class="slider">
        <v-carousel hide-delimiters>
            <v-carousel-item
            v-for="(item,i) in items"
            :key="i"
            :src="item.src"
            cover
            cycle
            interval="1000"
            height="600"
            >
            
        </v-carousel-item>
        </v-carousel>
    </div>
</template>

<script setup>
  const items = [
    {
      src: 'https://demo.htmlcodex.com/2195/free-plumbing-website-template/img/carousel-1.jpg',
    },
    {
      src: 'https://demo.htmlcodex.com/2195/free-plumbing-website-template/img/carousel-1.jpg',
    },
    {
      src: 'https://demo.htmlcodex.com/2195/free-plumbing-website-template/img/carousel-1.jpg',
    },
    {
      src: 'https://demo.htmlcodex.com/2195/free-plumbing-website-template/img/carousel-1.jpg',
    },
  ]
</script>

<style scoped>
.slider{
    
}
</style>