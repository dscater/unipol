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
                                ASPECTOS IMPORTANTES Y CANJE DE FOLDER
                            </h2>
                            <div class="row info_seccion">
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        Dirección Nacional de Salud y Bienestar
                                        Social
                                    </h5>
                                </div>
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/evaluacion/DNSBS 001.png'
                                        "
                                        height="200px"
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <p class="text-center font-weight-bold">
                                        <h4 class="font-weight-bold text-center">¡Atención Postulantes!</h4>
                                    </p>
                                    <p class="text-justify">
                                        Información importante sobre las
                                        Evaluaciones Médicas, Odontológicas y
                                        Psicológicas para el Proceso de Admisión
                                        de postulantes a las Unidades Académicas
                                        de Pregrado de la UNIPOL: ANAPOL –
                                        FATESCIPOL – ESBAPOLMUS, gestión 2026
                                    </p>
                                    <p class="text-justify font-weight-bold">
                                        <h4 class="font-weight-bold">Aspectos generales:</h4>
                                    </p>
                                    <ul class="list-unstyled pl-4">
                                        <li class="mb-3">
                                            <i class="fa fa-check"></i> Una vez
                                            realizada la inscripción en la
                                            Plataforma de la UNIPOL, deberás
                                            realizar el depósito en el Banco
                                            Unión la suma de 3.700 Bs., al Nro.
                                            de cuenta: 00000000 del Banco Unión
                                            (Hospital Policial Nº 1 “Virgen de
                                            Copacabana”) a nombre del
                                            Postulante, por concepto de
                                            Evaluaciones médicas, odontológicas
                                            y psicológicas.
                                        </li>
                                        <li>
                                            <i class="fa fa-check"></i> Con el
                                            baucher original deberás
                                            constituirte a las Direcciones
                                            Departamentales de Salud y Bienestar
                                            Social a nivel Nacional, para el
                                            respectivo CANJE DEL FOLDER que
                                            contendrá los formularios de los
                                            exámenes médicos.
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12 text-center">
                                    <div class="alert alert-danger">
                                        NOTA: Debes tener en cuenta que donde realices el canje de folder, será el lugar
donde de manera obligatoria deberás empezar y concluir todos los exámenes
médicos, odontológico y psicológico.
                                    </div>
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
