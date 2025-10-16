<script setup>
// includes
import { ref, onMounted, onBeforeMount } from "vue";
import { Link, usePage } from "@inertiajs/vue3";
import Footer from "./includes/Footer.vue";
import NavBar from "./includes/NavBar.vue";
import SideBar from "./includes/SideBar.vue";
import { useAppStore } from "@/stores/aplicacion/appStore";
const appStore = useAppStore();
const { auth } = usePage().props;
onBeforeMount(() => {
    appStore.initUserInfo();
});
</script>
<template>
    <div class="loading" :class="[appStore.getLoading == true ? 'show' : '']">
        <!-- <div class="loading show"> -->
        <template v-if="$slots.loading">
            <slot name="loading"></slot>
        </template>
        <template v-else>
            <i class="fa fa-spin fa-spinner fa-4x"></i>
        </template>
    </div>

    <div class="wrapper" v-if="auth.user.tipo != 'POSTULANTE'">
        <NavBar></NavBar>
        <SideBar></SideBar>
        <slot />
        <Footer></Footer>
    </div>
    <div v-else>
        <slot />
    </div>
</template>
