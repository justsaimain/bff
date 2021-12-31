<template>
    <div class="top-div border-0">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="title">Burmese Fantasy</h3>
            <a href="#" class="text-white">
                <i class="bx bxs-bell" style="font-size: 25px"></i>
            </a>
        </div>
    </div>
</template>
<script>
export default {
    name: "TopNav",
};
</script>

<style scoped>
.top-div {
    background: var(--first-color);
    color: #fff;
    padding: 1rem;
}

.title {
    font-weight: 600;
    font-size: 18px;
    font-family: sans-serif;
}
</style>
