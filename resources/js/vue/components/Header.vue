<template>
    <v-card
        color="grey-lighten-4"
        flat
        rounded="0"
    >
        <v-toolbar density="compact">

        <v-toolbar-title>Plumberz</v-toolbar-title>

        <v-spacer></v-spacer>

        <span><v-list-item><v-icon>mdi mdi-map-marker</v-icon> 123 Street, New York, USA</v-list-item></span>
        <span><v-list-item><v-icon>mdi-email</v-icon> info@example.com</v-list-item></span>
        <v-btn icon>
            <v-icon>mdi-facebook</v-icon>
        </v-btn>

        <v-btn icon>
            <v-icon>mdi-linkedin</v-icon>
        </v-btn>

        <v-btn icon>
            <v-icon>mdi-twitter</v-icon>
        </v-btn>
        <v-btn icon>
            <v-icon><v-icon>mdi-instagram</v-icon></v-icon>
        </v-btn>
        
        </v-toolbar>
    </v-card>
    <!--  -->
    <v-card
        color="grey-lighten-4"
        flat
        rounded="0"
    >
        <v-toolbar>
            <div class="menu">
                <li><a href="">Home</a></li>
                <li><a href="">Service</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="">Buy now</a></li>
            </div>

        <v-spacer></v-spacer>
        <v-btn>
            <v-icon>mdi-phone</v-icon>+012 345 6789
        </v-btn>
        </v-toolbar>
    </v-card>
</template>

<script setup>
import {ref} from 'vue'
 const items =  ref([
    {
      title: 'Item #1',
      value: 1,
    },
    {
      title: 'Item #2',
      value: 2,
    },
    {
      title: 'Item #3',
      value: 3,
    },
  ])
</script>

<style scoped>
.menu{
display: flex;
}
.menu li{
list-style-type: none;
padding: 42px 35px;
padding-left: 0;
}
.menu li a{
display: inline-block;
text-decoration: none;
text-transform: uppercase;
padding: 12px 18px;
color: rgb(14, 14, 14);
transition: .3s;
}
.menu li a:hover{
color: blue;
}
</style>