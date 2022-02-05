import {createRouter, createWebHistory} from "vue-router";

const routes = [{}]

const router = createRouter({
    history: createWebHistory(), routes
});

router.beforeEach((to, from, next) => {
    // TODO check the meta of to route consist requiresAuth and manage authorization
    next();
})

export default router;
