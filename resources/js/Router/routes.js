const routes = [
    {
        path: "",
        name: "index",
        component: () => import("../Pages/Index.vue"),
    },
    {
        path: "/tournament",
        name: "tournament",
        component: () => import("../Pages/Tournament.vue"),
    },
    {
        path: "/leaderboard",
        name: "leaderboard",
        component: () => import("../Pages/Leaderboard.vue"),
    },
    {
        path: "/setting",
        name: "setting",
        component: () => import("../Pages/Setting.vue"),
    },
    {
        path: "/login",
        name: "login",
        component: () => import("../Pages/Auths/Login.vue"),
    },
    {
        path: "/register",
        name: "register",
        component: () => import("../Pages/Auths/Register.vue"),
    },
];

export default routes;
