<script setup>
import App from "@/Layouts/App.vue";
defineOptions({
    layout: App,
});
import ContentPostulante from "@/Components/ContentPostulante.vue";
import { usePage, Head, Link } from "@inertiajs/vue3";
import { onMounted, onBeforeMount, ref, computed } from "vue";
import { useAppStore } from "@/stores/aplicacion/appStore";
const { auth } = usePage().props;
const user = ref(auth.user);

const props_page = defineProps({
    evaluacionMedica: {
        type: Object,
        default: null,
    },
    evaluacionPsicologica: {
        type: Object,
        default: null,
    },
    evaluacionFisica: {
        type: Object,
        default: null,
    },
    evaluacionInstruccion: {
        type: Object,
        default: null,
    },
    evaluacionConocimiento: {
        type: Object,
        default: null,
    },
    evaluacionOdontologica: {
        type: Object,
        default: null,
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
            <div class="col-12 mt-3">
                <h4 class="text-principal font-weight-bold">VESTIBULARES</h4>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div
                                class="col-md-8 font-weight-bold text-principal"
                            >
                                LENGUA CASTELLANA
                            </div>
                            <div class="col-md-2 text-center">
                                <span>{{
                                    evaluacionConocimiento
                                        ? evaluacionConocimiento.nota
                                        : 0
                                }}</span
                                ><br /><b>NOTA</b>
                            </div>
                            <div class="col-md-2 text-center">
                                <span>{{
                                    evaluacionConocimiento
                                        ? evaluacionConocimiento.descripcion
                                        : "S/R"
                                }}</span
                                ><br /><b>Resultado</b>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div
                                class="col-md-8 font-weight-bold text-principal"
                            >
                                MATEMÁTICAS - FÍSICA
                            </div>
                            <div class="col-md-2 text-center">
                                <span>{{
                                    evaluacionConocimiento
                                        ? evaluacionConocimiento.nota
                                        : 0
                                }}</span
                                ><br /><b>NOTA</b>
                            </div>
                            <div class="col-md-2 text-center">
                                <span>{{
                                    evaluacionConocimiento
                                        ? evaluacionConocimiento.descripcion
                                        : "S/R"
                                }}</span
                                ><br /><b>Resultado</b>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div
                                class="col-md-8 font-weight-bold text-principal"
                            >
                                CIENCAS SOCIALES
                            </div>
                            <div class="col-md-2 text-center">
                                <span>{{
                                    evaluacionConocimiento
                                        ? evaluacionConocimiento.nota
                                        : 0
                                }}</span
                                ><br /><b>NOTA</b>
                            </div>
                            <div class="col-md-2 text-center">
                                <span>{{
                                    evaluacionConocimiento
                                        ? evaluacionConocimiento.descripcion
                                        : "S/R"
                                }}</span
                                ><br /><b>Resultado</b>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div
                                class="col-md-8 font-weight-bold text-principal"
                            >
                                HISTORIAS POLICIALES
                            </div>
                            <div class="col-md-2 text-center">
                                <span>{{
                                    evaluacionConocimiento
                                        ? evaluacionConocimiento.nota
                                        : 0
                                }}</span
                                ><br /><b>NOTA</b>
                            </div>
                            <div class="col-md-2 text-center">
                                <span>{{
                                    evaluacionConocimiento
                                        ? evaluacionConocimiento.descripcion
                                        : "S/R"
                                }}</span
                                ><br /><b>Resultado</b>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div
                                class="col-md-8 font-weight-bold text-principal"
                            >
                                INSTRUCCIÓN POLICIAL
                            </div>
                            <div class="col-md-2 text-center">
                                <span>{{
                                    evaluacionConocimiento
                                        ? evaluacionConocimiento.nota
                                        : 0
                                }}</span
                                ><br /><b>NOTA</b>
                            </div>
                            <div class="col-md-2 text-center">
                                <span>{{
                                    evaluacionConocimiento
                                        ? evaluacionConocimiento.descripcion
                                        : "S/R"
                                }}</span
                                ><br /><b>Resultado</b>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div
                                class="col-md-8 font-weight-bold text-principal"
                            >
                                ACONDICIONAMIENTO FÍSICO
                            </div>
                            <div class="col-md-2 text-center">
                                <span>{{
                                    evaluacionConocimiento
                                        ? evaluacionConocimiento.nota
                                        : 0
                                }}</span
                                ><br /><b>NOTA</b>
                            </div>
                            <div class="col-md-2 text-center">
                                <span>{{
                                    evaluacionConocimiento
                                        ? evaluacionConocimiento.descripcion
                                        : "S/R"
                                }}</span
                                ><br /><b>Resultado</b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </ContentPostulante>
</template>
<style scoped></style>
