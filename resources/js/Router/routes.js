const routes = [
    {
        path: "",
        name: "index",
        component: () => import('../Pages/Index.vue')
    },
    {
        path: "/login",
        name: "login",
        component: () => import('../Pages/Auths/Login.vue')
    },
    {
        path: "/register",
        name: "register",
        component: () => import('../Pages/Auths/Register.vue')
    },
]


export default routes;
