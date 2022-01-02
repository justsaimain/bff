<template>
    <div>
        <top-nav class="d-md-none"></top-nav>
        <div class="content-bg pt-3" style="margin-top: -1px">
            <div class="text-center">
                <h3 class="page-title">Verify Phone</h3>
            </div>

            <div
                class="card card-body mx-3 border-0 shadow-sm"
                style="margin-top: 60px; border-radius: 10px"
            >
                <div v-if="this.$store.getters['user'].phone != ''">
                    <form @submit.prevent="verify()">
                        <div>
                            <p>
                                OTP Code has been sent to
                                {{ this.$store.getters["user"].phone }}
                            </p>
                            <div class="form-floating mb-3">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="otp"
                                    v-model="otp"
                                    placeholder="1234"
                                />
                                <label for="otp">Enter Code</label>
                            </div>
                            <div class="mt-3 text-center">
                                <p class="text-muted" style="font-size: 13px">
                                    Code expire in {{ countDown }} s
                                </p>
                                <button
                                    type="submit"
                                    class="btn btn-primary px-3 login-btn"
                                >
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div v-else>
                    <p class="border-0 rounded-3 font-monospace text-danger">
                        Sorry, We can not get your phone number. Please go back
                        and register again.
                    </p>
                    <div class="mt-3 text-center">
                        <router-link
                            to="/register"
                            class="btn btn-primary px-3 login-btn"
                        >
                            Go Back
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import TopNav from "../../Components/TopNav.vue";
export default {
    components: { TopNav },
    data() {
        return {
            otp: "",
            countDown: 60,
        };
    },
    created() {
        this.countDownTimer();
    },
    methods: {
        countDownTimer() {
            if (this.countDown > 0) {
                setTimeout(() => {
                    this.countDown -= 1;
                    this.countDownTimer();
                }, 1000);
            }
        },
        verify() {
            const request_id = this.$store.getters["user"].request_id;
            let frmData = new FormData();
            frmData.append("phone", this.$store.getters["user"].phone);
            frmData.append("request_id", parseInt(request_id));
            frmData.append("code", parseInt(this.otp));
            axios
                .post("/verify", frmData)
                .then((res) => {
                    if (res.data.success === true) {
                        alert("Account Verified");
                        window.location.href = "/";
                    }else{
                        alert(res.data.message);
                    }
                })
                .catch((err) => {
                    console.log(err);
                });
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
