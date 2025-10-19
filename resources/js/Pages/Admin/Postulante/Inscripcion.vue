<script setup>
import App from "@/Layouts/App.vue";
defineOptions({
    layout: App,
});
import ContentPostulante from "@/Components/ContentPostulante.vue";
import { usePage, Head, Link, useForm, router } from "@inertiajs/vue3";
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

const form = useForm({
    file1: null,
    file2: null,
    file3: null,
    file4: null,
    file5: null,
    file6: null,
    file7: null,
    file8: null,
    file9: null,
    file10: null,
    file11: null,
    file12: null,
    file13: null,
    file14: null,
    edad: 0,
});

const cargarArchivo = (e, key) => {
    form[key] = e.target.files[0];
};

const enviando = ref(false);
const guardar = () => {
    Swal.fire({
        icon: "question",
        title: "¿Está seguro(a)?",
        html: `Se enviarán todos los archivos adjuntos para proceder con su inscripción`,
        showCancelButton: true,
        confirmButtonText: "Si, registrar",
        cancelButtonText: "Cancelar",
        denyButtonText: `Cancelar`,
        customClass: {
            confirmButton: "btn-success",
        },
    }).then(async (result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            enviando.value = true;
            let url = route("requisitos.store");

            form.post(url, {
                preserveScroll: true,
                forceFormData: true,
                onSuccess: (response) => {
                    console.log("correcto");
                    console.log(response.props);
                    const success =
                        response.props.flash.success ??
                        "Proceso realizado con éxito";
                    const codigoInsc = response.props.flash.codigoInsc ?? "S/C";
                    // const mensaje = `Código de Inscripción ${codigoInsc}.<br/>Debe presentarse en un lapso de 3 días a su Evaluación Médico-psicológica`;
                    const mensaje = `Código de Inscripción ${codigoInsc}`;
                    Swal.fire({
                        icon: "success",
                        title: "Registro finalizado!",
                        html: mensaje,
                        confirmButtonText: `Aceptar`,
                        customClass: {
                            confirmButton: "btn-alert-success",
                        },
                    });
                    form.reset();
                },
                onError: (err, code) => {
                    console.log(code ?? "");
                    console.log(form.errors);
                    if (form.errors) {
                        const error =
                            "Existen errores en el formulario, por favor verifique";
                        Swal.fire({
                            icon: "info",
                            title: "Error",
                            html: `<strong>${error}</strong>`,
                            confirmButtonText: `Aceptar`,
                            customClass: {
                                confirmButton: "btn-error",
                            },
                        });
                    } else {
                        const error =
                            "Ocurrió un error inesperado contactese con el Administrador";
                        Swal.fire({
                            icon: "info",
                            title: "Error",
                            html: `<strong>${error}</strong>`,
                            confirmButtonText: `Aceptar`,
                            customClass: {
                                confirmButton: "btn-error",
                            },
                        });
                    }
                    console.log("error: " + err.error);
                },
                onFinish: () => {
                    enviando.value = false;
                },
            });
        }
    });
};

const cancelar = () => {
    form.reset();
    router.get(route("inicio"));
};

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
        <div class="row pb-3 pt-3">
            <div class="col-12 mb-1">
                <h4 class="subtitulo-seccion text-principal mb-0">
                    Requisitos:
                </h4>
                Para realizar su registro, deberá subir en archivo digital(pdf)
                todos los requisitos solicitados.
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-12">
                        <label
                            for="file1"
                            class="contenedorFile"
                            :class="form.file1 ? 'cargado' : 'sinCargar'"
                        >
                            <div class="principal">
                                <div class="icon icon-pdf">
                                    <i class="fa fa-file-pdf"></i>
                                </div>
                                <div class="contInfo">
                                    <div class="title">Subir Archivo PDF</div>
                                    <el-tooltip
                                        class="box-item"
                                        effect="dark"
                                        content="Fotocopia de Cédula de Identidad a
                                            Colores"
                                        placement="top"
                                    >
                                        <div class="descripcion">
                                            Fotocopia de Cédula de Identidad a
                                            Colores
                                        </div>
                                    </el-tooltip>
                                    <div
                                        class="descripcion"
                                        v-text="
                                            form.file1
                                                ? form.file1.name
                                                : 'Ningún archivo seleccionado'
                                        "
                                    ></div>
                                </div>
                                <div class="icon icon-loaded">
                                    <i
                                        class="fa"
                                        :class="[
                                            form.file1
                                                ? 'fa-check-circle'
                                                : 'fa-download',
                                        ]"
                                    ></i>
                                </div>
                            </div>
                            <input
                                type="file"
                                name="file1"
                                id="file1"
                                @change="cargarArchivo($event, 'file1')"
                                accept="application/pdf"
                            />
                            <ul
                                v-if="form.errors?.file1 && !form.file1"
                                class="list-unstyled text-danger db-block pl-4"
                            >
                                <li>{{ form.errors?.file1 }}</li>
                            </ul>
                        </label>
                        <label
                            for="file2"
                            class="contenedorFile"
                            :class="form.file2 ? 'cargado' : 'sinCargar'"
                        >
                            <div class="principal">
                                <div class="icon icon-pdf">
                                    <i class="fa fa-file-pdf"></i>
                                </div>
                                <div class="contInfo">
                                    <div class="title">Subir Archivo PDF</div>
                                    <el-tooltip
                                        class="box-item"
                                        effect="dark"
                                        content="Certificado de Nacimiento Original"
                                        placement="top"
                                    >
                                        <div class="descripcion">
                                            Certificado de Nacimiento Original
                                        </div>
                                    </el-tooltip>
                                    <div
                                        class="descripcion"
                                        v-text="
                                            form.file2
                                                ? form.file2.name
                                                : 'Ningún archivo seleccionado'
                                        "
                                    ></div>
                                </div>
                                <div class="icon icon-loaded">
                                    <i
                                        class="fa"
                                        :class="[
                                            form.file2
                                                ? 'fa-check-circle'
                                                : 'fa-download',
                                        ]"
                                    ></i>
                                </div>
                            </div>
                            <input
                                type="file"
                                name="file2"
                                id="file2"
                                @change="cargarArchivo($event, 'file2')"
                                accept="application/pdf"
                            />
                            <ul
                                v-if="form.errors?.file2 && !form.file2"
                                class="list-unstyled text-danger db-block pl-4"
                            >
                                <li>{{ form.errors?.file2 }}</li>
                            </ul>
                        </label>
                        <label
                            for="file3"
                            class="contenedorFile"
                            :class="form.file3 ? 'cargado' : 'sinCargar'"
                        >
                            <div class="principal">
                                <div class="icon icon-pdf">
                                    <i class="fa fa-file-pdf"></i>
                                </div>
                                <div class="contInfo">
                                    <div class="title">Subir Archivo PDF</div>
                                    <el-tooltip
                                        class="box-item"
                                        effect="dark"
                                        content="Certificado de No Militancia Pollítica"
                                        placement="top"
                                    >
                                        <div class="descripcion">
                                            Certificado de No Militancia
                                            Pollítica
                                        </div>
                                    </el-tooltip>
                                    <div
                                        class="descripcion"
                                        v-text="
                                            form.file3
                                                ? form.file3.name
                                                : 'Ningún archivo seleccionado'
                                        "
                                    ></div>
                                </div>
                                <div class="icon icon-loaded">
                                    <i
                                        class="fa"
                                        :class="[
                                            form.file3
                                                ? 'fa-check-circle'
                                                : 'fa-download',
                                        ]"
                                    ></i>
                                </div>
                            </div>
                            <input
                                type="file"
                                name="file3"
                                id="file3"
                                @change="cargarArchivo($event, 'file3')"
                                accept="application/pdf"
                            />
                            <ul
                                v-if="form.errors?.file3 && !form.file3"
                                class="list-unstyled text-danger db-block pl-4"
                            >
                                <li>{{ form.errors?.file3 }}</li>
                            </ul>
                        </label>
                        <label
                            for="file4"
                            class="contenedorFile"
                            :class="form.file4 ? 'cargado' : 'sinCargar'"
                        >
                            <div class="principal">
                                <div class="icon icon-pdf">
                                    <i class="fa fa-file-pdf"></i>
                                </div>
                                <div class="contInfo">
                                    <div class="title">Subir Archivo PDF</div>
                                    <el-tooltip
                                        class="box-item"
                                        effect="dark"
                                        content="Certificado de Soltería"
                                        placement="top"
                                    >
                                        <div class="descripcion">
                                            Certificado de Soltería
                                        </div>
                                    </el-tooltip>
                                    <div
                                        class="descripcion"
                                        v-text="
                                            form.file4
                                                ? form.file4.name
                                                : 'Ningún archivo seleccionado'
                                        "
                                    ></div>
                                </div>
                                <div class="icon icon-loaded">
                                    <i
                                        class="fa"
                                        :class="[
                                            form.file4
                                                ? 'fa-check-circle'
                                                : 'fa-download',
                                        ]"
                                    ></i>
                                </div>
                            </div>
                            <input
                                type="file"
                                name="file4"
                                id="file4"
                                @change="cargarArchivo($event, 'file4')"
                                accept="application/pdf"
                            />
                            <ul
                                v-if="form.errors?.file4 && !form.file4"
                                class="list-unstyled text-danger db-block pl-4"
                            >
                                <li>{{ form.errors?.file4 }}</li>
                            </ul>
                        </label>
                        <label
                            v-if="user?.postulante.genero == 'F'"
                            for="file5"
                            class="contenedorFile"
                            :class="form.file5 ? 'cargado' : 'sinCargar'"
                        >
                            <div class="principal">
                                <div class="icon icon-pdf">
                                    <i class="fa fa-file-pdf"></i>
                                </div>
                                <div class="contInfo">
                                    <div class="title">Subir Archivo PDF</div>
                                    <el-tooltip
                                        class="box-item"
                                        effect="dark"
                                        content="Certificado Médico de No encontrarse en estado de gestación"
                                        placement="top"
                                    >
                                        <div class="descripcion">
                                            Certificado Médico de No encontrarse
                                            en estado de gestación
                                        </div>
                                    </el-tooltip>
                                    <div
                                        class="descripcion"
                                        v-text="
                                            form.file5
                                                ? form.file5.name
                                                : 'Ningún archivo seleccionado'
                                        "
                                    ></div>
                                </div>
                                <div class="icon icon-loaded">
                                    <i
                                        class="fa"
                                        :class="[
                                            form.file5
                                                ? 'fa-check-circle'
                                                : 'fa-download',
                                        ]"
                                    ></i>
                                </div>
                            </div>
                            <input
                                type="file"
                                name="file5"
                                id="file5"
                                @change="cargarArchivo($event, 'file5')"
                                accept="application/pdf"
                            />
                            <ul
                                v-if="form.errors?.file5 && !form.file5"
                                class="list-unstyled text-danger db-block pl-4"
                            >
                                <li>{{ form.errors?.file5 }}</li>
                            </ul>
                        </label>
                        <label
                            for="file6"
                            class="contenedorFile"
                            :class="form.file6 ? 'cargado' : 'sinCargar'"
                        >
                            <div class="principal">
                                <div class="icon icon-pdf">
                                    <i class="fa fa-file-pdf"></i>
                                </div>
                                <div class="contInfo">
                                    <div class="title">Subir Archivo PDF</div>
                                    <el-tooltip
                                        class="box-item"
                                        effect="dark"
                                        content="Diploma de Bachiller o Certificado de 6to. de Secundaria"
                                        placement="top"
                                    >
                                        <div class="descripcion">
                                            Diploma de Bachiller o Certificado
                                            de 6to. de Secundaria
                                        </div>
                                    </el-tooltip>
                                    <div
                                        class="descripcion"
                                        v-text="
                                            form.file6
                                                ? form.file6.name
                                                : 'Ningún archivo seleccionado'
                                        "
                                    ></div>
                                </div>
                                <div class="icon icon-loaded">
                                    <i
                                        class="fa"
                                        :class="[
                                            form.file6
                                                ? 'fa-check-circle'
                                                : 'fa-download',
                                        ]"
                                    ></i>
                                </div>
                            </div>
                            <input
                                type="file"
                                name="file6"
                                id="file6"
                                @change="cargarArchivo($event, 'file6')"
                                accept="application/pdf"
                            />
                            <ul
                                v-if="form.errors?.file6 && !form.file6"
                                class="list-unstyled text-danger db-block pl-4"
                            >
                                <li>{{ form.errors?.file6 }}</li>
                            </ul>
                        </label>
                        <label
                            for="file7"
                            class="contenedorFile"
                            :class="form.file7 ? 'cargado' : 'sinCargar'"
                        >
                            <div class="principal">
                                <div class="icon icon-pdf">
                                    <i class="fa fa-file-pdf"></i>
                                </div>
                                <div class="contInfo">
                                    <div class="title">Subir Archivo PDF</div>
                                    <el-tooltip
                                        class="box-item"
                                        effect="dark"
                                        content="Certificado de Registro Judicial de Antecedentes Penales"
                                        placement="top"
                                    >
                                        <div class="descripcion">
                                            Certificado de Registro Judicial de
                                            Antecedentes Penales
                                        </div>
                                    </el-tooltip>
                                    <div
                                        class="descripcion"
                                        v-text="
                                            form.file7
                                                ? form.file7.name
                                                : 'Ningún archivo seleccionado'
                                        "
                                    ></div>
                                </div>
                                <div class="icon icon-loaded">
                                    <i
                                        class="fa"
                                        :class="[
                                            form.file7
                                                ? 'fa-check-circle'
                                                : 'fa-download',
                                        ]"
                                    ></i>
                                </div>
                            </div>
                            <input
                                type="file"
                                name="file7"
                                id="file7"
                                @change="cargarArchivo($event, 'file7')"
                                accept="application/pdf"
                            />
                            <ul
                                v-if="form.errors?.file7 && !form.file7"
                                class="list-unstyled text-danger db-block pl-4"
                            >
                                <li>{{ form.errors?.file7 }}</li>
                            </ul>
                        </label>
                        <label
                            for="file8"
                            class="contenedorFile"
                            :class="form.file8 ? 'cargado' : 'sinCargar'"
                        >
                            <div class="principal">
                                <div class="icon icon-pdf">
                                    <i class="fa fa-file-pdf"></i>
                                </div>
                                <div class="contInfo">
                                    <div class="title">Subir Archivo PDF</div>
                                    <el-tooltip
                                        class="box-item"
                                        effect="dark"
                                        content="Certificado de Antecedentes de No Violencia en Razón de Genero"
                                        placement="top"
                                    >
                                        <div class="descripcion">
                                            Certificado de Antecedentes de No
                                            Violencia en Razón de Genero
                                        </div>
                                    </el-tooltip>
                                    <div
                                        class="descripcion"
                                        v-text="
                                            form.file8
                                                ? form.file8.name
                                                : 'Ningún archivo seleccionado'
                                        "
                                    ></div>
                                </div>
                                <div class="icon icon-loaded">
                                    <i
                                        class="fa"
                                        :class="[
                                            form.file8
                                                ? 'fa-check-circle'
                                                : 'fa-download',
                                        ]"
                                    ></i>
                                </div>
                            </div>
                            <input
                                type="file"
                                name="file8"
                                id="file8"
                                @change="cargarArchivo($event, 'file8')"
                                accept="application/pdf"
                            />
                            <ul
                                v-if="form.errors?.file8 && !form.file8"
                                class="list-unstyled text-danger db-block pl-4"
                            >
                                <li>{{ form.errors?.file8 }}</li>
                            </ul>
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-12">
                        <label
                            for="file9"
                            class="contenedorFile"
                            :class="form.file9 ? 'cargado' : 'sinCargar'"
                        >
                            <div class="principal">
                                <div class="icon icon-pdf">
                                    <i class="fa fa-file-pdf"></i>
                                </div>
                                <div class="contInfo">
                                    <div class="title">Subir Archivo PDF</div>
                                    <el-tooltip
                                        class="box-item"
                                        effect="dark"
                                        content="Certificado de Antecedentes Policiales"
                                        placement="top"
                                    >
                                        <div class="descripcion">
                                            Certificado de Antecedentes
                                            Policiales
                                        </div>
                                    </el-tooltip>
                                    <div
                                        class="descripcion"
                                        v-text="
                                            form.file9
                                                ? form.file9.name
                                                : 'Ningún archivo seleccionado'
                                        "
                                    ></div>
                                </div>
                                <div class="icon icon-loaded">
                                    <i
                                        class="fa"
                                        :class="[
                                            form.file9
                                                ? 'fa-check-circle'
                                                : 'fa-download',
                                        ]"
                                    ></i>
                                </div>
                            </div>
                            <input
                                type="file"
                                name="file9"
                                id="file9"
                                @change="cargarArchivo($event, 'file9')"
                                accept="application/pdf"
                            />
                            <ul
                                v-if="form.errors?.file9 && !form.file9"
                                class="list-unstyled text-danger db-block pl-4"
                            >
                                <li>{{ form.errors?.file9 }}</li>
                            </ul>
                        </label>

                        <label
                            for="file10"
                            class="contenedorFile"
                            :class="form.file10 ? 'cargado' : 'sinCargar'"
                        >
                            <div class="principal">
                                <div class="icon icon-pdf">
                                    <i class="fa fa-file-pdf"></i>
                                </div>
                                <div class="contInfo">
                                    <div class="title">Subir Archivo PDF</div>
                                    <el-tooltip
                                        class="box-item"
                                        effect="dark"
                                        content="Certificado de No haber sido dado de Baja en Unidades Académicas"
                                        placement="top"
                                    >
                                        <div class="descripcion">
                                            Certificado de No haber sido dado de
                                            Baja en Unidades Académicas
                                        </div>
                                    </el-tooltip>
                                    <div
                                        class="descripcion"
                                        v-text="
                                            form.file10
                                                ? form.file10.name
                                                : 'Ningún archivo seleccionado'
                                        "
                                    ></div>
                                </div>
                                <div class="icon icon-loaded">
                                    <i
                                        class="fa"
                                        :class="[
                                            form.file10
                                                ? 'fa-check-circle'
                                                : 'fa-download',
                                        ]"
                                    ></i>
                                </div>
                            </div>
                            <input
                                type="file"
                                name="file10"
                                id="file10"
                                @change="cargarArchivo($event, 'file10')"
                                accept="application/pdf"
                            />
                            <ul
                                v-if="form.errors?.file10 && !form.file10"
                                class="list-unstyled text-danger db-block pl-4"
                            >
                                <li>{{ form.errors?.file10 }}</li>
                            </ul>
                        </label>

                        <label
                            for="file11"
                            class="contenedorFile"
                            :class="form.file11 ? 'cargado' : 'sinCargar'"
                        >
                            <div class="principal">
                                <div class="icon icon-pdf">
                                    <i class="fa fa-file-pdf"></i>
                                </div>
                                <div class="contInfo">
                                    <div class="title">Subir Archivo PDF</div>
                                    <el-tooltip
                                        class="box-item"
                                        effect="dark"
                                        content="Compromiso Notariado de consentimiento y sometimiento a Evaluaciones"
                                        placement="top"
                                    >
                                        <div class="descripcion">
                                            Compromiso Notariado de
                                            consentimiento y sometimiento a
                                            Evaluaciones
                                        </div>
                                    </el-tooltip>
                                    <div
                                        class="descripcion"
                                        v-text="
                                            form.file11
                                                ? form.file11.name
                                                : 'Ningún archivo seleccionado'
                                        "
                                    ></div>
                                </div>
                                <div class="icon icon-loaded">
                                    <i
                                        class="fa"
                                        :class="[
                                            form.file11
                                                ? 'fa-check-circle'
                                                : 'fa-download',
                                        ]"
                                    ></i>
                                </div>
                            </div>
                            <input
                                type="file"
                                name="file11"
                                id="file11"
                                @change="cargarArchivo($event, 'file11')"
                                accept="application/pdf"
                            />
                            <ul
                                v-if="form.errors?.file11 && !form.file11"
                                class="list-unstyled text-danger db-block pl-4"
                            >
                                <li>{{ form.errors?.file11 }}</li>
                            </ul>
                        </label>

                        <label
                            for="file12"
                            class="contenedorFile"
                            :class="form.file12 ? 'cargado' : 'sinCargar'"
                        >
                            <div class="principal">
                                <div class="icon icon-pdf">
                                    <i class="fa fa-file-pdf"></i>
                                </div>
                                <div class="contInfo">
                                    <div class="title">Subir Archivo PDF</div>
                                    <el-tooltip
                                        class="box-item"
                                        effect="dark"
                                        content="Compromiso notariado de cumplimiento del Reglamento de Admisión"
                                        placement="top"
                                    >
                                        <div class="descripcion">
                                            Compromiso notariado de cumplimiento
                                            del Reglamento de Admisión
                                        </div>
                                    </el-tooltip>
                                    <div
                                        class="descripcion"
                                        v-text="
                                            form.file12
                                                ? form.file12.name
                                                : 'Ningún archivo seleccionado'
                                        "
                                    ></div>
                                </div>
                                <div class="icon icon-loaded">
                                    <i
                                        class="fa"
                                        :class="[
                                            form.file12
                                                ? 'fa-check-circle'
                                                : 'fa-download',
                                        ]"
                                    ></i>
                                </div>
                            </div>
                            <input
                                type="file"
                                name="file12"
                                id="file12"
                                @change="cargarArchivo($event, 'file12')"
                                accept="application/pdf"
                            />
                            <ul
                                v-if="form.errors?.file12 && !form.file12"
                                class="list-unstyled text-danger db-block pl-4"
                            >
                                <li>{{ form.errors?.file12 }}</li>
                            </ul>
                        </label>

                        <label
                            for="file13"
                            class="contenedorFile"
                            :class="form.file13 ? 'cargado' : 'sinCargar'"
                        >
                            <div class="principal">
                                <div class="icon icon-pdf">
                                    <i class="fa fa-file-pdf"></i>
                                </div>
                                <div class="contInfo">
                                    <div class="title">Subir Archivo PDF</div>
                                    <el-tooltip
                                        class="box-item"
                                        effect="dark"
                                        content="Boleta de Deposito para el Registro al Proceso de Admisión"
                                        placement="top"
                                    >
                                        <div class="descripcion">
                                            Boleta de Deposito para el Registro
                                            al Proceso de Admisión
                                        </div>
                                    </el-tooltip>
                                    <div
                                        class="descripcion"
                                        v-text="
                                            form.file13
                                                ? form.file13.name
                                                : 'Ningún archivo seleccionado'
                                        "
                                    ></div>
                                </div>
                                <div class="icon icon-loaded">
                                    <i
                                        class="fa"
                                        :class="[
                                            form.file13
                                                ? 'fa-check-circle'
                                                : 'fa-download',
                                        ]"
                                    ></i>
                                </div>
                            </div>
                            <input
                                type="file"
                                name="file13"
                                id="file13"
                                @change="cargarArchivo($event, 'file13')"
                                accept="application/pdf"
                            />
                            <ul
                                v-if="form.errors?.file13 && !form.file13"
                                class="list-unstyled text-danger db-block pl-4"
                            >
                                <li>{{ form.errors?.file13 }}</li>
                            </ul>
                        </label>
                        <label
                            for="file14"
                            class="contenedorFile"
                            :class="form.file14 ? 'cargado' : 'sinCargar'"
                            v-if="auth.user.postulante.edad_lim < 18"
                        >
                            <div class="principal">
                                <div class="icon icon-pdf">
                                    <i class="fa fa-file-pdf"></i>
                                </div>
                                <div class="contInfo">
                                    <div class="title">Subir Archivo PDF</div>
                                    <el-tooltip
                                        class="box-item"
                                        effect="dark"
                                        content="Declaración Jurada notariada para postulantes de 17 años"
                                        placement="top"
                                    >
                                        <div class="descripcion">
                                            Declaración Jurada notariada para
                                            postulantes de 17 años
                                        </div>
                                    </el-tooltip>
                                    <div
                                        class="descripcion"
                                        v-text="
                                            form.file14
                                                ? form.file14.name
                                                : 'Ningún archivo seleccionado'
                                        "
                                    ></div>
                                </div>
                                <div class="icon icon-loaded">
                                    <i
                                        class="fa"
                                        :class="[
                                            form.file14
                                                ? 'fa-check-circle'
                                                : 'fa-download',
                                        ]"
                                    ></i>
                                </div>
                            </div>
                            <input
                                type="file"
                                name="file14"
                                id="file14"
                                @change="cargarArchivo($event, 'file14')"
                                accept="application/pdf"
                            />
                            <ul
                                v-if="form.errors?.file14 && !form.file14"
                                class="list-unstyled text-danger db-block pl-4"
                            >
                                <li>{{ form.errors?.file14 }}</li>
                            </ul>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-12 text-right">
                <button class="btn btn-danger mr-2" @click="cancelar">
                    <i class="fa fa-times"></i> CANCELAR
                </button>
                <button
                    v-if="user?.postulante.edad_lim >= 17"
                    class="btn btn-success"
                    @click.prevent="guardar"
                    :disabled="enviando"
                >
                    <i class="fa fa-save"></i>
                    <span
                        v-text="enviando ? ' GUARDANDO....' : ' GUARDAR'"
                    ></span>
                </button>
            </div>
        </div>
    </ContentPostulante>
</template>
<style scoped></style>
