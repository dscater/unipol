<script setup>
import App from "@/Layouts/App.vue";
defineOptions({
    layout: App,
});
import ContentPostulante from "@/Components/ContentPostulante.vue";
import { usePage, Head, Link } from "@inertiajs/vue3";
import { onMounted, onBeforeMount, ref, computed } from "vue";
import Highcharts from "highcharts";
import exporting from "highcharts/modules/exporting";
import accessibility from "highcharts/modules/accessibility";
import { useAppStore } from "@/stores/aplicacion/appStore";
import axios from "axios";
const { auth } = usePage().props;
const user = ref(auth.user);

exporting(Highcharts);
accessibility(Highcharts);
Highcharts.setOptions({
    lang: {
        downloadPNG: "Descargar PNG",
        downloadJPEG: "Descargar JPEG",
        downloadPDF: "Descargar PDF",
        downloadSVG: "Descargar SVG",
        printChart: "Imprimir gráfico",
        contextButtonTitle: "Menú de exportación",
        viewFullscreen: "Pantalla completa",
        exitFullscreen: "Salir de pantalla completa",
    },
});

const props_page = defineProps({
    array_infos: {
        type: Array,
    },
});

const appStore = useAppStore();
onBeforeMount(() => {
    appStore.startLoading();
});

const { props } = usePage();

onMounted(() => {
    appStore.stopLoading();
});
</script>
<template>
    <Head title="Inicio"></Head>
    <ContentPostulante>
        <div class="row contenedor_botones pb-3">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-12 mt-2">
                        <h5 class="text-principal">
                            Condiciones generales del Proceso de Admisión:
                        </h5>
                    </div>
                    <div class="col-12 mt-2">
                        <button>Número de Plazas Vacantes</button>
                    </div>
                    <div class="col-12 mt-2">
                        <button>Esc. de Calificación de Evaluaciones</button>
                    </div>
                    <div class="col-12 mt-2">
                        <button>
                            Condiciones para la Admisión e Incorporación
                        </button>
                    </div>
                    <div class="col-12 mt-2">
                        <button>
                            Causales de Separación del Proceso de Admisión
                        </button>
                    </div>
                    <div class="col-12 mt-2">
                        <button>
                            Causales de Separación del Proceso de Admisión
                        </button>
                    </div>
                    <div class="col-12 mt-2">
                        <h5 class="text-principal">
                            Fases del Proceso de Admisión:
                        </h5>
                    </div>
                    <div class="col-12 mt-2">
                        <button>Fase de Convocatoria</button>
                    </div>
                    <div class="col-12 mt-2">
                        <button>Tabla de Precios</button>
                    </div>
                    <div class="col-12 mt-2">
                        <button>Requisitos de Inscripción</button>
                    </div>
                    <div class="col-12 mt-2">
                        <button>Fase de Selección</button>
                    </div>
                    <div class="col-12 mt-2">
                        <button>Etapa de Evaluación Médica</button>
                    </div>
                    <div class="col-12 mt-2">
                        <button>Etapa de Evaluación Psicológica</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-12 mt-2">
                        <button>Etapa del Prefacultativo</button>
                    </div>
                    <div class="col-12 mt-2">
                        <button>Evaluación del Área de Conocimientos</button>
                    </div>
                    <div class="col-12 mt-2">
                        <button>Evaluación del Área de Aptitud Física</button>
                    </div>
                    <div class="col-12 mt-2">
                        <button>
                            Evaluación del Área de Instrucción Policial
                        </button>
                    </div>
                    <div class="col-12 mt-2">
                        <button>
                            Admisión Directa por el Perfil Policial idóneo
                        </button>
                    </div>
                    <div class="col-12 mt-2">
                        <button>Fase de Incorporación</button>
                    </div>
                    <div class="col-12 mt-2">
                        <button>
                            Publicación del Cuadro General de Admitidos
                        </button>
                    </div>
                    <div class="col-12 mt-2">
                        <button>Cantidad de postulantes Admitidos</button>
                    </div>
                    <div class="col-12 mt-2">
                        <button>
                            Publicación de Lista de Admitidos e Incorporación
                        </button>
                    </div>
                    <div class="col-12 mt-2">
                        <button>Validez de la Aceptación</button>
                    </div>
                    <div class="col-12 mt-2">
                        <button>Plazo de Incorporación</button>
                    </div>
                    <div class="col-12 mt-2">
                        <button>Documentos para la Incorporación</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-12 mt-2">
                        <h5 class="text-principal">
                            Documentos para Descargar
                        </h5>
                    </div>
                    <div class="col-12 mt-2">
                        <button>Reglamento de Admisión</button>
                    </div>
                    <div class="col-12 mt-2">
                        <h5 class="text-principal">Videotutoriales</h5>
                    </div>
                    <div class="col-12 mt-2">
                        <button>Reglamento de Admisión</button>
                    </div>
                </div>
            </div>
        </div>
    </ContentPostulante>
</template>
<style scoped>
.contenedor_botones button {
    border: solid 1px var(--bg3);
    background-color: white;
    color: var(--bg2);
    font-weight: bold;
    width: 100%;
    padding: 6px;
    text-align: center;
}

.contenedor_botones button:hover {
    background-color: var(--bg1);
}
</style>
