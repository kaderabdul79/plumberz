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
        ],
    },
];

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes,
});

export default router;
