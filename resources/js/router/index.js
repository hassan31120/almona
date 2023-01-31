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
import infoPage from "../pages/info/infoPage.vue";
import edit_infoPage from "../pages/info/edit_infoPage.vue";
import teamPage from "../pages/team/teamPage.vue";
import add_teamPage from "../pages/team/add_teamPage.vue";
import edit_teamPage from "../pages/team/edit_teamPage.vue";
import partnersPage from "../pages/partners/partnersPage.vue";
import add_partnerPage from "../pages/partners/add_partnerPage.vue";
import edit_partnerPage from "../pages/partners/edit_partnerPage.vue";

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
    {
        path: "/info",
        name: "info",
        component: infoPage,
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
        path: "/edit_info",
        name: "edit_info",
        component: edit_infoPage,
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
        path: "/team",
        name: "team",
        component: teamPage,
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
        path: "/add_team",
        name: "add_team",
        component: add_teamPage,
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
        path: "/edit_team/:id",
        name: "edit_team",
        component: edit_teamPage,
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
        path: "/partners",
        name: "partners",
        component: partnersPage,
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
        path: "/add_partner",
        name: "add_partner",
        component: add_partnerPage,
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
        path: "/edit_partner/:id",
        name: "edit_partner",
        component: edit_partnerPage,
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
