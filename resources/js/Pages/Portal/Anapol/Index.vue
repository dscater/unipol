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
import NavBar from "@/Pages/Portal/Anapol/Parcial/Navbar.vue";
const appStore = useAppStore();
const { oConfiguracion } = useConfiguracion();
const { props: props_page } = usePage();
const user = ref(props_page.auth?.user);
const url_asset = ref(props_page.url_assets);

const accion_formulario = ref(0);
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
            <img
                :src="url_asset + '/imgs/EANAPOL.png'"
                alt=""
                class="img-seccion"
            />
            <span class="text-seccion">ACADEMIA NACIONAL DE POLICÍAS</span>

            <Link
                :href="route('portal.index')"
                class="btn btn-principal mt-5 btn-volver-principal"
                ><i class="fa fa-arrow-left"></i> VOLVER A PÁGINA
                PRINCIPAL</Link
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
.img_admicion {
    height: 50px;
}
.img-seccion {
    width: 200px;
    filter: drop-shadow(5px 5px 10px rgba(255, 255, 255, 0.5));
}

.text-seccion {
    color: white;
    font-weight: bold;
    font-size: 2rem;
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
    .img_admicion {
        height: 150px;
    }
    .contenido .imgs img {
        width: 140px;
    }

    .tituloAdmicion {
        width: 620px;
    }
}

.navbar-nav li a {
    font-size: 0.9em;
    color: white;
}
</style>
