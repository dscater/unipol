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
import FormLogin from "@/Pages/Auth/FormLogin.vue";
import { useAppStore } from "@/stores/aplicacion/appStore";
const appStore = useAppStore();
const { oConfiguracion } = useConfiguracion();
const { props: props_page } = usePage();
const user = ref(props_page.auth?.user);
const url_asset = ref(props_page.url_assets);

const muestra_formulario = ref(false);

const listItems = ref([
    {
        tipo: "img",
        ruta: "/imgs/F12 COD 001.jpg",
    },
    {
        tipo: "video",
        ruta: "/videos/video1.mp4",
    },
]);

onMounted(() => {});
</script>
<template>
    <el-carousel height="100vh">
        <el-carousel-item v-for="item in listItems">
            <div class="carusel">
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
            <div class="imgs">
                <Link :href="route('anapol')">
                    <img :src="url_asset + '/imgs/EANAPOL.png'" alt="" />
                    <br />ANAPOL</Link
                >
                <Link :href="route('fatescipol')">
                    <img :src="url_asset + '/imgs/EFATESCIPOL.png'" alt="" />
                    <br />FATESCIPOL
                </Link>
                <Link :href="route('esbapolmus')">
                    <img :src="url_asset + '/imgs/EESBAPOLMUS.png'" alt="" />
                    <br />
                    ESBAPOLMUS</Link
                >
            </div>
            <img
                :src="url_asset + '/imgs/ADMINICION.png'"
                class="tituloAdmicion"
                alt=""
            />

            <button
                class="btn btn-principal btn-iniciar-sesion"
                @click.prevent="muestra_formulario = true"
                v-if="!user"
            >
                INICIAR SESIÓN
            </button>
            <Link v-else :href="route('inicio')" class="btn btn-principal"
                >VOLVER AL INICIO</Link
            >
        </div>
        <div class="bg-carusel"></div>
    </el-carousel>

    <FormLogin
        :muestra_formulario="muestra_formulario"
        @cerrar-formulario="muestra_formulario = false"
    ></FormLogin>
</template>

<style scoped>
.carusel {
    width: 100%;
    height: 100%;
}

.carusel img {
    object-fit: cover;
}

.carusel video {
    height: 100%;
    width: 177.77777778vh; /* 100 * 16 / 9 */
    min-width: 100%;
    min-height: 56.25vw; /* 100 * 9 / 16 */
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
    transition: 0.3s;
}

.contenido .imgs a:hover {
    transform: scale(1.09);
}

.contenido .imgs img {
    width: 90px;
    filter: drop-shadow(5px 5px 10px rgba(255, 255, 255, 0.5));
}

.tituloAdmicion {
    width: 400px;
    text-align: center;
    margin-top: 10px;
}

@media (min-width: 900px) {
    .contenido .imgs img {
        width: 140px;
    }

    .tituloAdmicion {
        width: 620px;
    }
}
</style>
