<template>
    <div id="dashboard">
        <!-- header -->
        <v-navigation-drawer
            v-model="drawer"
            :rail="rail"
            permanent
            @click="rail = false"
        >
        <v-list class="pa-0">
        </v-list>
            <v-list-item class="py-2" nav>
                <span class="text-h4 text-center pa-3">Plumberz</span>
                <template v-slot:append>
                    <v-btn
                        variant="flat"
                        icon="mdi mdi-view-dashboard-outline"
                        @click.stop="rail = !rail"
                    ></v-btn>
                </template>
            </v-list-item>

            <v-divider></v-divider>

            <v-list density="compact" nav>
                <v-list-item
                    prepend-icon="mdi-home-city"
                    title="Home"
                    value="home"
                ></v-list-item>
                <v-list-item
                    prepend-icon="mdi-account"
                    title="My Account"
                    value="account"
                ></v-list-item>
                <!-- categories -->
                <v-list-group value="categories">
                    <template v-slot:activator="{ props }">
                        <v-list-item
                            v-bind="props"
                            prepend-icon="mdi mdi-shape-plus-outline"
                            title="categories"
                        ></v-list-item>
                    </template>

                    <v-list-item
                        v-for="category in categories"
                        :key="category.id"
                        :title="category.title"
                        :prepend-icon="category.icon"
                        :value="category.title"
                    ></v-list-item>
                </v-list-group>
                <!-- categories end -->
                <!-- technicians -->
                <v-list-group value="Technicians">
                    <template v-slot:activator="{ props }">
                        <v-list-item
                            v-bind="props"
                            prepend-icon="mdi mdi-account-hard-hat-outline"
                            title="Technicians"
                        ></v-list-item>
                    </template>

                    <v-list-item
                        v-for="technician in technicians"
                        :key="technician.id"
                        :title="technician.title"
                        :prepend-icon="technician.icon"
                        :value="technician.title"
                    ></v-list-item>
                </v-list-group>
                <!-- technicians end -->
                <v-list-group value="Users">
                    <template v-slot:activator="{ props }">
                        <v-list-item
                            v-bind="props"
                            prepend-icon="mdi-account-group-outline"
                            title="Users"
                        ></v-list-item>
                    </template>

                    <v-list-item
                        v-for="user in users"
                        :key="user.id"
                        :title="user.title"
                        :prepend-icon="user.icon"
                        :value="user.title"
                    ></v-list-item>
                </v-list-group>
                <!-- users end -->
                <v-list-item
                    prepend-icon="mdi-account-group-outline"
                    title="Users"
                    value="users"
                ></v-list-item>
            </v-list>

            <v-list-item
                class="logout"
                prepend-icon="mdi mdi-logout"
                title="Logout"
                value="logout"
            ></v-list-item>
        </v-navigation-drawer>
        <!-- drawer -->
        <v-app-bar class="px-2" :elevation="2">
            <div class="my-header w-100">
            <div class="pt-2">Abdul Kader</div>
            <div class="profile">
                <v-avatar size="36px">
                    <v-img
                        alt="Avatar"
                        src="https://avatars0.githubusercontent.com/u/9064066?v=4&s=460"
                    ></v-img>
                </v-avatar>
                <span class="ml-2 subtitle-2">Mr John</span>
                <!--  -->
                <v-menu>
                    <template v-slot:activator="{ props }">
                        <v-btn
                            size="small"
                            variant="text"
                            icon="mdi-menu-down"
                            :ripple="false"
                            v-bind="props"
                        ></v-btn>
                    </template>
                    <v-list>
                        <v-list-item
                            prepend-icon="mdi-account"
                            title="Users Profile"
                            value="users"
                        ></v-list-item>
                        <v-list-item to="/logout"
                            prepend-icon="mdi mdi-logout"
                            title="Logout"
                            value="Logout"
                        ></v-list-item>
                    </v-list>
                </v-menu>
            </div></div>
        </v-app-bar>
        <!-- rendering all other dashboard pages/components from here -->
        <router-view />
        <!--  -->
    </div>
</template>

<script setup>
import { ref } from "vue";
const profileDrawer = ref(false);
const drawer = ref(true);
const rail = ref(true);
function profileDrawerChange() {
    return (profileDrawer.value = !profileDrawer.value);
}
const items = ref([
    { title: "Click Me" },
    { title: "Click Me" },
    { title: "Click Me" },
    { title: "Click Me 2" },
]);
const users = ref([
    { id: 1, title: "Create User", icon: "mdi mdi-plus", url: "/users" },
    { id: 2, title: "Edit User", icon: "mdi mdi-human-edit", url: "/users" },
]);
const technicians = ref([
    { id: 1, title: "Add Technicians", icon: "mdi mdi-plus", url: "/technicians" },
    { id: 2, title: "Edit Technicians", icon: "mdi mdi-human-edit", url: "/technicians" },
])
const categories = ref([
    { id: 1, title: "Add Category", icon: "mdi mdi-plus", url: "/categories" },
    { id: 2, title: "Edit Category", icon: "mdi mdi-human-edit", url: "/categories" },
])
</script>

<style scoped>
.my-header{
    display: flex;
    justify-content: space-between;
}
.v-list-item.logout {
    position: absolute;
    bottom: 0;
}
</style>