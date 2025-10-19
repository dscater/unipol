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
                    <!-- FASES -->
                    <div class="col-12">
                        <div class="container">
                            <h2 class="titulo-seccion">FASE DE SELECCIÓN</h2>
                            <p>
                                La Fase de Selección para el Proceso de
                                Admisión, estará comprendida por las siguientes
                                etapas:
                            </p>
                        </div>
                    </div>
                    <div class="col-12 py-5">
                        <div class="container">
                            <h4 class="titulo-seccion">
                                a) Etapa de Evaluación Médica y Odontológica
                            </h4>
                            <p>
                                La Evaluación Médica tiene como finalidad
                                determinar el estado de salud integral de las y
                                los postulantes, asegurando que sean aptos para
                                cumplir con las exigencias físicas y de salud
                                requeridas para la formación profesional
                                policial, mediante evaluaciones de Medicina
                                General, Odontología, laboratorio clínico y
                                pruebas complementarias de diagnóstico
                            </p>
                        </div>
                    </div>
                    <div class="col-12 py-5">
                        <div class="container">
                            <h4 class="titulo-seccion">
                                b) Etapa de Evaluación Psicológica.
                            </h4>
                            <p>
                                Tiene por finalidad detectar las cualidades de
                                personalidad, el temperamento y las
                                características tipológicas de las y los
                                postulantes, aptos para la profesión policial,
                                así como de establecer el adecuado manejo de los
                                valores, capacidad de liderazgo y adaptabilidad
                                a la vida policial.
                            </p>
                        </div>
                    </div>
                    <div class="col-12 py-5">
                        <div class="container">
                            <h4 class="titulo-seccion">
                                c) Etapa de Evaluación de Aptitud Física
                            </h4>
                            <p>
                                Tiene por finalidad determinar el grado de
                                resistencia, fuerza, flexibilidad, potencia y
                                destreza de las y los postulantes, a fin de
                                comprobar su capacidad, nivel de rendimiento y
                                preparación física, debiendo satisfacer las
                                marcas exigidas acordes a la formación
                                profesional policial.
                            </p>
                        </div>
                    </div>
                    <div class="col-12 py-5">
                        <div class="container">
                            <h4 class="titulo-seccion">
                                d) Etapa del Prefacultativo
                            </h4>
                            <p>
                                El Programa Académico Prefacultativo tiene como
                                finalidad capacitar y fortalecer las
                                competencias cognitivas, físicas y
                                disciplinarias de las y los postulantes en el
                                proceso de selección y admisión, mediante
                                lineamientos técnicos, académicos y
                                administrativos, para facilitar su adaptación a
                                la formación profesional policial, garantizando
                                un proceso transparente, equitativo e inclusivo
                                en el proceso de admisión a las Unidades
                                Académicas de Pregrado de la UNIPOL.
                            </p>
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
