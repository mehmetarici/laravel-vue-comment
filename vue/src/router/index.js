import {createRouter, createWebHistory} from "vue-router";
import {DefaultLayout} from "../components";
import {Dashboard} from "../views";

const routes = [{
    path: "/",
    redirect: "/dashboard",
    component: DefaultLayout,
    meta: {requiresAuth: true},
    children: [
        {path: "/dashboard", name: "Dashboard", component: Dashboard},
    ]
}]

const router = createRouter({
    history: createWebHistory(), routes
});

router.beforeEach((to, from, next) => {
    // TODO check the meta of to route consist requiresAuth and manage authorization
    next();
})

export default router;
