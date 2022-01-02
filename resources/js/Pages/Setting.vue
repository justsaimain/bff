<template>
    <div>
        <top-nav class="d-md-none"></top-nav>
        <div class="content-bg pt-3" style="margin-top: -1px">
            <div class="d-flex justify-content-center mb-2">
                <div
                    class="bg-white rounded-circle"
                    style="padding: 2px; width: 100px; height: 100px"
                >
                    <img
                        class="img img-fluid rounded-circle p-1"
                        style="border: 1px solid #4c2fe3"
                        src="https://www.shareicon.net/data/512x512/2016/06/30/788946_people_512x512.png"
                        alt=""
                    />
                </div>
            </div>
            <div class="text-center">
                <template>
                    <div class="mt-3">
                        <router-link
                            to="/login"
                            class="btn btn-primary px-3"
                            style="
                                font-size: 13px;
                                font-weight: 700;
                                letter-spacing: 1px;
                            "
                        >
                            Login to Account
                        </router-link>
                        <div class="mt-3">
                            <router-link
                                to="register"
                                class=""
                                style="text-decoration: none; color: #848484"
                                >Create an account</router-link
                            >
                        </div>
                    </div>
                </template>
                <div v-show="false">
                    <p
                        class="mb-0"
                        style="
                            font-size: 18px;
                            font-weight: 700;
                            letter-spacing: 1px;
                            color: #505050;
                        "
                    >
                        Sai Main
                    </p>
                    <div style="color: #848484" class="mb-2">
                        <p class="mb-0">Man Utd | 0998939399</p>
                        <p class="mb-0">Yangon</p>
                    </div>
                    <button
                        class="btn btn-primary px-3"
                        style="
                            font-size: 13px;
                            font-weight: 700;
                            letter-spacing: 1px;
                        "
                    >
                        Edit Profile
                    </button>
                </div>
            </div>
        </div>
        <div class="container" style="margin-top: 200px">
            <div class="row">
                <div class="col">
                    <ul class="list-group list-group-flush">
                        <a
                            href="#"
                            class="list-group-item ist-group-item-action d-flex justify-content-between align-items-center"
                        >
                            <div class="d-flex align-items-center">
                                <TextBoxCheckIcon
                                    class="me-2"
                                ></TextBoxCheckIcon>
                                Terms & Conditions
                            </div>
                            <ChevronRightIcon></ChevronRightIcon>
                        </a>
                        <a
                            href="#"
                            class="list-group-item ist-group-item-action d-flex justify-content-between align-items-center"
                        >
                            <div class="d-flex align-items-center">
                                <HelpIcon class="me-2"></HelpIcon>
                                Frequently Asked Questions
                            </div>
                            <ChevronRightIcon></ChevronRightIcon>
                        </a>
                        <a
                            href="#"
                            class="list-group-item ist-group-item-action d-flex justify-content-between align-items-center"
                        >
                            <div class="d-flex align-items-center">
                                <StarFaceIcon class="me-2"></StarFaceIcon>
                                Give Us Feedbacks
                            </div>
                            <ChevronRightIcon></ChevronRightIcon>
                        </a>
                        <a
                            href="#"
                            class="list-group-item ist-group-item-action d-flex justify-content-between align-items-center"
                        >
                            <div class="d-flex align-items-center">
                                <PhoneInTalkIcon class="me-2"></PhoneInTalkIcon>
                                Contact Us
                            </div>
                            <ChevronRightIcon></ChevronRightIcon>
                        </a>
                        <a
                            href="#"
                            class="list-group-item ist-group-item-action d-flex justify-content-between align-items-center"
                        >
                            <div class="d-flex align-items-center">
                                <LogoutIcon class="me-2"></LogoutIcon>
                                Logout
                            </div>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import TopNav from "../Components/TopNav.vue";
import TextBoxCheckIcon from "vue-material-design-icons/TextBoxCheck.vue";
import HelpIcon from "vue-material-design-icons/Help.vue";
import StarFaceIcon from "vue-material-design-icons/StarFace.vue";
import PhoneInTalkIcon from "vue-material-design-icons/PhoneInTalk.vue";
import LogoutIcon from "vue-material-design-icons/Logout.vue";
import ChevronRightIcon from "vue-material-design-icons/ChevronRight.vue";

export default {
    components: {
        TopNav,
        TextBoxCheckIcon,
        HelpIcon,
        StarFaceIcon,
        PhoneInTalkIcon,
        LogoutIcon,
        ChevronRightIcon,
    },
};
</script>

<style scoped>
.content-bg {
    height: 70px;
    background: var(--first-color);
    border-radius: 0 0 2rem 2rem;
}
</style>
