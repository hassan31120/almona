import { createRouter, createWebHistory } from "vue-router";
import axios from "axios";
import homePage from "../pages/HomePage.vue";
import allusersPage from "../pages/users/allusersPage.vue";
import add_userPage from "../pages/users/add_userPage.vue";
import edit_userPage from "../pages/users/edit_userPage.vue";
import catsPage from "../pages/cats/catsPage.vue";
import add_catPage from "../pages/cats/add_catPage.vue";
import edit_catPage from "../pages/cats/edit_catPage.vue";
import login from "../components/auth/login.vue";
import error404 from "../components/errors/error404.vue";
import error500 from "../components/errors/error500.vue";

const routes = [
    {
        path: "/",
        name: "home",
        component: homePage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/:catchAll(.*)*",
        name: "error404",
        component: error404,
    },
    {
        path: "/serverErr",
        name: "error500",
        component: error500,
    },
    {
        path: "/login",
        name: "login",
        component: login,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    return next({ name: "home" });
                })
                .catch((err) => {
                    next();
                });
        },
    },
    {
        path: "/users",
        name: "users",
        component: allusersPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/add_user",
        name: "add_user",
        component: add_userPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/cats",
        name: "cats",
        component: catsPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/add_cat",
        name: "add_cat",
        component: add_catPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/edit_cat/:id",
        name: "edit_cat",
        component: edit_catPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch(() => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/edit_user/:id",
        name: "edit_user",
        component: edit_userPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch(() => {
                    return next({ name: "login" });
                });
        },
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
