<template>
    <div>
        <top-nav class="d-md-none"></top-nav>
        <div class="content-bg pt-3" style="margin-top: -1px">
            <div class="text-center">
                <h3 class="page-title">Confirm</h3>
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
    mounted(){
        console.log(this.$store.getters['user']);
    },
    methods: {},
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
