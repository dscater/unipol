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
const appStore = useAppStore();
const { oConfiguracion } = useConfiguracion();
const { props: props_page } = usePage();
const user = ref(props_page.auth?.user);
const url_asset = ref(props_page.url_assets);

const listItems = ref([
    {
        tipo: "img",
        ruta: "/imgs/esbapolmus/FOTO ESB 001.jpg",
    },
    {
        tipo: "img",
        ruta: "/imgs/esbapolmus/FOTO ESB 002.jpg",
    },
    {
        tipo: "img",
        ruta: "/imgs/esbapolmus/FOTO ESB 003.jpg",
    },
    {
        tipo: "img",
        ruta: "/imgs/esbapolmus/FOTO ESB 004.jpg",
    },
    {
        tipo: "img",
        ruta: "/imgs/esbapolmus/FOTO ESB 005.jpg",
    },
    {
        tipo: "img",
        ruta: "/imgs/esbapolmus/FOTO ESB 006.jpg",
    },
    {
        tipo: "img",
        ruta: "/imgs/esbapolmus/FOTO ESB 007.jpg",
    },
    {
        tipo: "img",
        ruta: "/imgs/esbapolmus/FOTO ESB 008.jpg",
    },
    {
        tipo: "img",
        ruta: "/imgs/esbapolmus/FOTO ESB 009.jpg",
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
            <span class="text-seccion">ESCUELA BÁSICA POLICIAL DE MÚSICA</span>

            <Link
                :href="route('portal.index')"
                class="btn btn-principal mt-5 btn-volver-principal"
                ><i class="fa fa-arrow-left"></i> VOLVER A PÁGINA
                PRINCIPAL</Link
            >
        </div>
        <div class="bg-carusel"></div>
    </el-carousel>
</template>

<style scoped>
.img-seccion {
    width: 200px;
    filter: drop-shadow(5px 5px 10px rgba(255, 255, 255, 0.5));
}

.text-seccion {
    color: white;
    font-weight: bold;
    font-size: 1rem;
}

.carusel {
    width: 100%;
    height: 100%;
}

.btn-volver-principal {
    position: absolute;
    bottom: 20px;
    right: 20px;
}

.carusel img {
    object-fit: cover;
}

.carusel video {
    height: 100%;
}
.bg-carusel {
    position: absolute;
    background-color: rgba(0, 0, 0, 0.5);
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.contenido {
    z-index: 1;
    position: absolute;
    top: 0;
    left: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
    flex-direction: column;
}

.contenido .imgs {
    display: flex;
    gap: 20px;
}

.btn-iniciar-sesion {
    margin-top: 20px;
}

.contenido .imgs a {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    color: white;
    font-weight: 700;
}

.contenido .imgs img {
    width: 90px;
}

.tituloAdmicion {
    width: 400px;
    text-align: center;
    margin-top: 10px;
}

@media (min-width: 900px) {
    .text-seccion {
        color: white;
        font-weight: bold;
        font-size: 2rem;
    }

    .carusel video {
        height: 100%;
        width: 177.77777778vh; /* 100 * 16 / 9 */
        min-width: 100%;
        min-height: 56.25vw; /* 100 * 9 / 16 */
    }
}
</style>
