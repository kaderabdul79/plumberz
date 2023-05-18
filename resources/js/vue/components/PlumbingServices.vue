<template>
    <v-sheet class="services py-10">
        <v-container>
            <v-row>
                <v-col cols="4">
                    <div class="">
                        <v-img class="services-img overflow-hidden"
                            :width="400"
                            aspect-ratio="16/9"
                            cover
                            src="https://demo.htmlcodex.com/2195/free-plumbing-website-template/img/service-1.jpg"
                            ></v-img>
                            <v-sheet class="px-4 py-2 d-flex align-items-center justify-content-between">
                                <v-card-title class="d-inline">Residential Plumbing</v-card-title>
                                <v-btn :ripple="false"><v-icon>mdi mdi-arrow-right</v-icon></v-btn>
                            </v-sheet>
                    </div>
                </v-col>
                <v-col cols="4">
                    <div>
                        <v-img
                            :width="400"
                            aspect-ratio="16/9"
                            cover
                            src="https://demo.htmlcodex.com/2195/free-plumbing-website-template/img/service-2.jpg"
                            ></v-img>
                            <v-sheet class="px-4 py-2 d-flex align-items-center justify-content-between">
                                <v-card-title class="d-inline">Residential Plumbing</v-card-title>
                                <v-btn :ripple="false"><v-icon>mdi mdi-arrow-right</v-icon></v-btn>
                            </v-sheet>
                    </div>
                </v-col>
                <v-col cols="4">
                    <div>
                        <v-img
                            :width="400"
                            aspect-ratio="16/9"
                            cover
                            src="https://demo.htmlcodex.com/2195/free-plumbing-website-template/img/service-1.jpg"
                            ></v-img>
                            <v-sheet class="px-4 py-2 d-flex align-items-center justify-content-between">
                                <v-card-title class="d-inline">Residential Plumbing</v-card-title>
                                <v-btn :ripple="false"><v-icon>mdi mdi-arrow-right</v-icon></v-btn>
                            </v-sheet>
                    </div>
                </v-col>
            </v-row>
        </v-container>
    </v-sheet>
</template>

<script setup>

</script>

<style scoped>
.services-img{
    position: relative;
}
.services-img:hover.services-img::after{
    content: "";
    position: absolute;
    width: 100%;height: 100%;
    top: 0;left: 0;right: 0;bottom: 0;
    transform: scale(1.5);
}
.services{
    width: 1170px;
    padding: 0 15px;
    margin: auto;
}
</style>