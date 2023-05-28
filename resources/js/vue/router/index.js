import { createRouter, createWebHistory } from "vue-router";
const routes = [
    { path: "/", component: () => import("../views/frontend/HomePage.vue") },
    {
        path: "/registration",
        component: () => import("../views/Registration.vue"),
    },
    { path: "/login", component: () => import("../views/Login.vue") },
    { path: "/logout", redirect: "/login" },
    {
        path: "/dashboard",
        name: "dashboard",
        component: () => import("../views/backend/Dashboard.vue"),
        children: [
          {
            path: '',
            name: 'dashboardOverview',
            component: () => import('../views/backend/Overview.vue'),
          },
          {
            path: 'categories',
            name: 'categories',
            component: () => import('../views/backend/Categories.vue'),
          },
          {
            path: 'categories/:id/edit',
            props: true,
            name: 'editcategories',
            component: () => import('../views/backend/EditCategory.vue'),
          },
          {
            path: 'technicians',
            name: 'technicians',
            component: () => import('../views/backend/technician/Technicians.vue'),
          },
          {
            path: 'technicians/create',
            name: 'createTechnicians',
            component: () => import('../views/backend/technician/create.vue'),
          },
          {
            path: 'technicians/:id/edit',
            name: 'editTechnicians',
            props: true,
            component: () => import('../views/backend/technician/Edit.vue'),
          },
          // users
          {
            path: 'users',
            name: 'users',
            component: () => import('../views/backend/user/Users.vue'),
          },
          {
            path: 'users/create',
            name: 'createUsers',
            component: () => import('../views/backend/user/Create.vue'),
          },
          {
            path: 'users/:id/edit',
            name: 'editUsers',
            props: true,
            component: () => import('../views/backend/user/Edit.vue'),
          },
        ],
    },
];

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes,
});

export default router;
