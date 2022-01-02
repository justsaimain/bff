import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        temp_user: {
            name: "",
            phone: "",
            password: "",
            request_id: "",
        },
    },
    mutations: {
        STORE_TEMP_USER_NAME(state, name) {
            state.temp_user.name = name;
        },
        STORE_TEMP_USER_PHONE(state, phone) {
            state.temp_user.phone = phone;
        },
        STORE_TEMP_USER_PASSWORD(state, password) {
            state.temp_user.password = password;
        },
        STORE_REQUEST_ID(state, request_id){
            state.temp_user.request_id = request_id;
        }
    },
    actions: {
        storeName({ commit }, newValue) {
            commit("STORE_TEMP_USER_NAME", newValue);
        },
        storePhone({ commit }, newValue) {
            commit("STORE_TEMP_USER_PHONE", newValue);
        },
        storePassword({ commit }, newValue) {
            commit("STORE_TEMP_USER_PASSWORD", newValue);
        }
    },
    getters: {
        user: (state) => {
            return state.temp_user;
        },
    },
});

export default store;
