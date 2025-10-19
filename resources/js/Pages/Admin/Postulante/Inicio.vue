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
import InfoBoton from "./Parcials/InfoBoton.vue";
import DescargarDocumento from "./Parcials/DescargarDocumento.vue";
import VerVideo from "./Parcials/VerVideo.vue";
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
    listDescargaDocumentos: {
        type: Array,
        default: [],
    },
    listVideos: {
        type: Array,
        default: [],
    },
});

const appStore = useAppStore();
onBeforeMount(() => {
    appStore.startLoading();
});

const muestra_info = ref(false);
const nro_info = ref(-1);
const mostrarContenido = (nro) => {
    muestra_info.value = true;
    nro_info.value = nro;
};

// DESCARGAS
const oDescargaDocumento = ref(null);
const muestraDescargaDocumento = ref(false);
const mostrarDescarga = (item) => {
    oDescargaDocumento.value = item;
    muestraDescargaDocumento.value = true;
};

// VIDEOS
const oVideo = ref(null);
const muestraVideo = ref(false);
const mostrarVideo = (item) => {
    oVideo.value = item;
    muestraVideo.value = true;
};

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
                        <h5 class="text-principal font-weight-bold">
                            Condiciones generales del Proceso de Admisión:
                        </h5>
                    </div>
                    <div class="col-12 mt-2">
                        <button @click="mostrarContenido(1)">
                            Número de Plazas Vacantes
                        </button>
                    </div>
                    <div class="col-12 mt-2">
                        <button @click="mostrarContenido(2)">
                            Esc. de Calificación de Evaluaciones
                        </button>
                    </div>
                    <div class="col-12 mt-2">
                        <button @click="mostrarContenido(3)">
                            Condiciones para la Admisión e Incorporación
                        </button>
                    </div>
                    <div class="col-12 mt-2">
                        <button @click="mostrarContenido(4)">
                            Causales de Separación del Proceso de Admisión
                        </button>
                    </div>
                    <div class="col-12 mt-2">
                        <button @click="mostrarContenido(5)">
                            Causales de Separación del Proceso de Admisión
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-12 mt-2">
                        <h5 class="text-principal font-weight-bold">
                            Fases del Proceso de Admisión:
                        </h5>
                    </div>
                    <div class="col-12 mt-2">
                        <button @click="mostrarContenido(6)">
                            Fase de Convocatoria
                        </button>
                    </div>
                    <div class="col-12 mt-2">
                        <button @click="mostrarContenido(7)">
                            Tabla de Precios
                        </button>
                    </div>
                    <div class="col-12 mt-2">
                        <button @click="mostrarContenido(8)">
                            Requisitos de Inscripción
                        </button>
                    </div>
                    <div class="col-12 mt-2">
                        <button @click="mostrarContenido(9)">
                            Fase de Selección
                        </button>
                    </div>
                    <div class="col-12 mt-2">
                        <button @click="mostrarContenido(10)">
                            Etapa de Evaluación Médica
                        </button>
                    </div>
                    <div class="col-12 mt-2">
                        <button @click="mostrarContenido(11)">
                            Etapa de Evaluación Psicológica
                        </button>
                    </div>
                    <div class="col-12 mt-2">
                        <button @click="mostrarContenido(12)">
                            Etapa de Evaluación Física
                        </button>
                    </div>
                    <div class="col-12 mt-2">
                        <button @click="mostrarContenido(13)">
                            Etapa del Prefacultativo
                        </button>
                    </div>
                    <div class="col-12 mt-2">
                        <button @click="mostrarContenido(14)">
                            Fase de Incorporación
                        </button>
                    </div>
                    <div class="col-12 mt-2">
                        <button @click="mostrarContenido(15)">
                            Cantidad de Postulantes Admitidos
                        </button>
                    </div>
                    <div class="col-12 mt-2">
                        <button @click="mostrarContenido(16)">
                            Publicación de la lista de admitidos e incorporación
                            de Postulantes
                        </button>
                    </div>
                    <div class="col-12 mt-2">
                        <button @click="mostrarContenido(17)">
                            Documentos para la incorporación
                        </button>
                    </div>
                    <div class="col-12 mt-2">
                        <button @click="mostrarContenido(18)">
                            Validez de la aceptación
                        </button>
                    </div>
                    <div class="col-12 mt-2">
                        <button @click="mostrarContenido(19)">
                            Plazo de incorporación
                        </button>
                    </div>
                    <div class="col-12 mt-2">
                        <button>Resultados de las evaluaciones</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-12 mt-2">
                        <h5 class="text-principal font-weight-bold">
                            Documentos para Descargar
                        </h5>
                    </div>
                    <div
                        class="col-12 mt-2"
                        v-for="item in listDescargaDocumentos"
                    >
                        <button @click="mostrarDescarga(item)">
                            {{ item.descripcion }}
                        </button>
                    </div>
                    <div class="col-12 mt-2">
                        <h5 class="text-principal font-weight-bold">
                            Videotutoriales
                        </h5>
                    </div>
                    <div class="col-12 mt-2" v-for="item in listVideos">
                        <button @click="mostrarVideo(item)">
                            {{ item.descripcion }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <InfoBoton
            :archivo="nro_info"
            :muestra_formulario="muestra_info"
            @cerrar-formulario="
                muestra_info = false;
                nro_info = -1;
            "
        ></InfoBoton>
        <DescargarDocumento
            :muestra_formulario="muestraDescargaDocumento"
            :archivo="oDescargaDocumento"
            @cerrar-formulario="muestraDescargaDocumento = false"
        ></DescargarDocumento>
        <VerVideo
            :muestra_formulario="muestraVideo"
            :archivo="oVideo"
            @cerrar-formulario="muestraVideo = false"
        ></VerVideo>
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
    transition: all 0.3s;
}

.contenedor_botones button:hover {
    background-color: var(--bg1);
}
</style>
