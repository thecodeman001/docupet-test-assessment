import { createRouter, createWebHistory } from 'vue-router';
import NotFound from "../components/NotFound.vue";

const routes = [
    {
        path: "/",
        name: "Pet",
        component: () => import('../components/pet/form/ThePetForm.vue'),

    },
    {
        path: "/:notFound",
        component: NotFound,
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router
