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
                            <h2 class="titulo-seccion">
                                FASE DE INCORPORACIÓN
                            </h2>
                            <p>
                                La Fase de Selección para el Proceso de
                                Admisión, estará comprendida por las siguientes
                                etapas:
                            </p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="container">
                            <h4 class="titulo-seccion">
                                CUADRO GENERAL DE LOS ADMITIDOS
                            </h4>
                            <p>
                                Concluidas las fases de Convocatoria y
                                Selección, la Comisión Nacional del Proceso de
                                Admisión, de acuerdo al Cronograma de
                                Actividades del Proceso de Admisión, aprobará y
                                validará el Cuadro General de las y los
                                postulantes admitidos y consignará: El número de
                                Cedula de Identidad o Código de Inscripción de
                                la o el postulante para su publicación.
                            </p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="container">
                            <h4 class="titulo-seccion">
                                CANTIDAD DE POSTULANTES ADMITIDOS
                            </h4>
                            <ul>
                                <li>
                                    La cantidad de las y los postulantes
                                    admitidos, se rige en base a la cantidad de
                                    plazas habilitadas y/o vacantes existentes
                                    para cada Unidad Académica, conforme lo
                                    establecido en el Artículo 27 del Reglamento
                                    de Admisión a las Unidades Académicas de
                                    pregrado de la UNIPOL.
                                </li>
                                <li>
                                    Las y los postulantes admitidos a la
                                    Facultad en Ciencias Policiales “Academia
                                    Nacional de policías”, será asignada
                                    conforme a la cantidad de plazas habilitadas
                                    y/o aprobadas y el orden de prelación de los
                                    promedios más altos obtenidos durante la
                                    etapa del Prefacultativo.
                                </li>
                            </ul>
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
