<script>
import Portal from "@/Layouts/Portal.vue";
export default {
    layout: Portal,
};
</script>
<script setup>
import { onMounted, ref } from "vue";
import { Link, usePage, router } from "@inertiajs/vue3";
import { useAxios } from "@/composables/axios/useAxios";
import { useConfiguracion } from "@/composables/configuracion/useConfiguracion";
import { useAppStore } from "@/stores/aplicacion/appStore";
import NavBar from "./Parcial/Navbar.vue";
import Footer from "./Parcial/Footer.vue";
const appStore = useAppStore();
const { oConfiguracion } = useConfiguracion();
const { props: props_page } = usePage();
const user = ref(props_page.auth?.user);
const url_asset = ref(props_page.url_assets);

const listItems = ref([
    {
        tipo: "img",
        ruta: "/imgs/anapol/FOTO ANA 46.jpg",
    },
    {
        tipo: "img",
        ruta: "/imgs/anapol/FOTO ANA 47.jpg",
    },
    {
        tipo: "img",
        ruta: "/imgs/anapol/FOTO ANA 48.jpg",
    },
    {
        tipo: "img",
        ruta: "/imgs/anapol/FOTO ANA 49.jpg",
    },
    {
        tipo: "img",
        ruta: "/imgs/anapol/FOTO ANA 50.jpg",
    },
    {
        tipo: "img",
        ruta: "/imgs/anapol/FOTO ANA 51.jpg",
    },
    {
        tipo: "img",
        ruta: "/imgs/anapol/FOTO ANA 52.jpg",
    },
    {
        tipo: "img",
        ruta: "/imgs/anapol/FOTO ANA 53.jpg",
    },
    {
        tipo: "img",
        ruta: "/imgs/anapol/FOTO ANA 54.jpg",
    },
    {
        tipo: "img",
        ruta: "/imgs/anapol/FOTO ANA 55.jpg",
    },
]);

onMounted(() => {});
</script>
<template>
    <div class="container-fluid">
        <div class="row bg-principal p-2 pt-4 pb-4">
            <div class="col-12 text-center">
                <img
                    :src="url_asset + '/imgs/ADMINICION.png'"
                    alt="admicion"
                    class="img_admicion"
                />
            </div>
        </div>
        <div class="row">
            <div class="col-12 p-0">
                <NavBar></NavBar>
            </div>
        </div>
    </div>
    <el-carousel height="calc(100vh - 200px)">
        <el-carousel-item v-for="item in listItems">
            <div
                class="carusel"
                :style="{
                    color: 'black',
                    backgroundImage: `url(' ${url_asset + item.ruta} ')`,
                }"
            >
                <template v-if="item.tipo == 'img'">
                    <img :src="url_asset + item.ruta" alt="Foto" />
                </template>
                <template v-if="item.tipo == 'video'">
                    <video
                        :src="url_asset + item.ruta"
                        muted
                        loop
                        playsinline
                        autoplay
                    ></video>
                </template>
            </div>
        </el-carousel-item>
        <div class="contenido">
            <img
                :src="url_asset + '/imgs/EANAPOL.png'"
                alt=""
                class="img-seccion"
            />
            <span class="text-seccion text-center"
                >ACADEMIA NACIONAL DE POLICÍAS</span
            >

            <Link
                :href="route('portal.index')"
                class="btn btn-principal mt-5 btn-volver-principal"
                ><i class="fa fa-arrow-left"></i> VOLVER A PÁGINA
                PRINCIPAL</Link
            >
        </div>
        <div class="bg-carusel"></div>
    </el-carousel>
    <Footer></Footer>
</template>

<style scoped></style>
