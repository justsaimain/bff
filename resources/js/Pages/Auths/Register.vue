<template>
    <div>
        <top-nav class="d-md-none"></top-nav>
        <div class="content-bg pt-3" style="margin-top: -1px">
            <div class="text-center">
                <h3 class="page-title">Register</h3>
            </div>

            <div
                class="card card-body mx-3 border-0 shadow-sm"
                style="margin-top: 60px; border-radius: 10px"
            >
                <form @submit.prevent="register()">
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            v-model="name"
                            placeholder="Mg Mg"
                        />
                        <label for="name">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            id="phone"
                            placeholder="0997981234"
                        />
                        <label for="phone">Phone Number</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input
                            type="password"
                            class="form-control"
                            id="password"
                            placeholder="Password"
                        />
                        <label for="password">Password</label>
                    </div>
                    <div class="form-floating">
                        <input
                            type="password"
                            class="form-control"
                            id="password_confirmation"
                            placeholder="Confirm Password"
                        />
                        <label for="password_confirmation"
                            >Confirm Password</label
                        >
                    </div>
                    <div class="mt-3 text-center">
                        <button
                            type="submit"
                            class="btn btn-primary px-3 login-btn"
                        >
                            Register account
                        </button>
                    </div>
                </form>
            </div>

            <div class="mt-3 text-center">
                <router-link
                    to="/login"
                    class=""
                    style="text-decoration: none; color: #848484"
                    >Login existing account</router-link
                >
            </div>
        </div>
    </div>
</template>

<script>
import TopNav from "../../Components/TopNav.vue";
export default {
    components: { TopNav },
    computed: {
        name: {
            get() {
                return this.$store.getters["user"].name;
            },
            set(newValue) {
                return this.$store.dispatch("storeName", newValue);
            },
        },
        phone: {
            get() {
                return this.$store.getters["user"].phone;
            },
            set(newValue) {
                return this.$store.dispatch("storePhone", newValue);
            },
        },
        password: {
            get() {
                return this.$store.getters["user"].password;
            },
            set(newValue) {
                return this.$store.dispatch("storePassword", newValue);
            },
        },
    },
    methods: {
        register() {
            this.$router.push("/confirm");
        },
    },
};
</script>

<style scoped>
.content-bg {
    height: 70px;
    background: var(--first-color);
    border-radius: 0 0 2rem 2rem;
}

.page-title {
    font-size: 25px;
    color: #fff;
    font-weight: bold;
    letter-spacing: 2px;
}

.form-floating input,
.form-floating input:focus {
    border: none;
    outline: none;
    box-shadow: none;
    color: #534d4d;
}

.form-floating label {
    color: #534d4d;
}

.login-btn {
    font-size: 15px;
    letter-spacing: 1px;
}
</style>
