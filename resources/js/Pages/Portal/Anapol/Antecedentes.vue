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
import NavBar from "./Parcial/Navbar.vue";
import Footer from "./Parcial/Footer.vue";
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
    <div class="container-fluid pagina">
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
        <div class="row">
            <div class="col-12">
                <div class="row contenedor_secciones">
                    <!-- COMUNICADOS -->
                    <div class="col-12 seccion">
                        <div class="container">
                            <h2 class="titulo-seccion">
                                CERTIFICADO DE ANTECEDENTES POLICIALES
                            </h2>
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        Dirección Nacional de Servicios Técnicos
                                        Auxiliares
                                    </h5>
                                </div>
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset + '/imgs/LOGO DNSTA 2.png'
                                        "
                                        height="200px"
                                        alt=""
                                    />
                                </div>
                                <div class="col-12 text-center">
                                    <video
                                        :src="
                                            url_asset +
                                            '/imgs/VIDEO DNSTA 1 .mp4'
                                        "
                                        style="max-width: 100%; width: 800px"
                                        controls
                                    ></video>
                                </div>
                                <div class="col-12">
                                    <p class="text-center font-weight-bold">
                                        ¡Atención postulantes al Proceso de
                                        Admisión 2026!
                                    </p>
                                    <p class="text-justify">
                                        Ingresa a través del código QR o
                                        mediante el enlace directo a la
                                        Plataforma directa donde podrás obtener
                                        el requisito de Certificado de
                                        Antecedentes Policiales:
                                    </p>
                                </div>
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset + '/imgs/QR DNSTA 003.jpg'
                                        "
                                        height="250px"
                                        alt=""
                                    />
                                </div>
                                <div class="col-12 text-center">
                                    <a
                                        href="https://sinarap-01.github.io/bob/"
                                        target="_blank"
                                        class="btn btn-principal"
                                        >ACCEDE A NUESTRA PLATAFORMA</a
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <Footer></Footer>
</template>

<style scoped>
.img_admicion {
    height: 50px;
}
</style>
