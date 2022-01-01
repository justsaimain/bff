require("./bootstrap");

import Vue from "vue";
import VueRouter from "vue-router";
import App from "./App.vue";
import VueProgressBar from "vue-progressbar";
import router from "./Router/index";
import store from "./Store/index";

Vue.use(VueRouter);
Vue.use(VueProgressBar, {
    color: "#bffaf3",
    failedColor: "#874b4b",
    thickness: "3px",
    transition: {
        speed: "0.5s",
        opacity: "0.6s",
        termination: 300,
    },
    autoRevert: true,
    location: "top",
    inverse: false,
});

const app = new Vue({
    el: "#app",
    router,
    store,
    components: { App },
});
