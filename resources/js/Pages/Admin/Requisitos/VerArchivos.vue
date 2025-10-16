<script setup>
import MiModal from "@/Components/MiModal.vue";
import { useForm, usePage } from "@inertiajs/vue3";
import { watch, ref, computed, defineEmits, onMounted, nextTick } from "vue";
const { props: props_page } = usePage();
const props = defineProps({
    muestra_formulario: {
        type: Boolean,
        default: false,
    },
    postulante: {
        type: Object,
        default: 0,
    },
});

const accion_form = ref(props.accion_formulario);
const muestra_form = ref(props.muestra_formulario);
const enviando = ref(false);
let form = useForm({
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
    _method: "put",
});

const cargarArchivo = (e, key) => {
    form[key] = e.target.files[0];
};

watch(
    () => props.muestra_formulario,
    (newValue) => {
        muestra_form.value = newValue;
        if (muestra_form.value) {
            document
                .getElementsByTagName("body")[0]
                .classList.add("modal-open");
        } else {
            document
                .getElementsByTagName("body")[0]
                .classList.remove("modal-open");
        }
    }
);
watch(
    () => props.accion_formulario,
    (newValue) => {
        accion_form.value = newValue;
    }
);

const { flash } = usePage().props;

const tituloDialog = computed(() => {
    return `<i class="fa fa-eye"></i> Requisitos`;
});

const textBtn = computed(() => {
    if (enviando.value) {
        return `<i class="fa fa-spin fa-spinner"></i> Enviando...`;
    }
    if (accion_form.value == 0) {
        return `<i class="fa fa-save"></i> Guardar`;
    }
    return `<i class="fa fa-edit"></i> Actualizar`;
});

const emits = defineEmits(["cerrar-formulario", "envio-formulario"]);

watch(muestra_form, (newVal) => {
    if (!newVal) {
        emits("cerrar-formulario");
    }
});

const actualizar = () => {
    Swal.fire({
        type: "question",
        title: "¿Está seguro(a)?",
        html: `Se actualizarán todos los archivos adjuntos`,
        showCancelButton: true,
        confirmButtonText: "Si, actualizar",
        cancelButtonText: "Cancelar",
        denyButtonText: `Cancelar`,
        customClass: {
            confirmButton: "btn-success",
        },
    }).then(async (result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            enviando.value = true;
            let url = route(
                "requisitos.update",
                props.postulante?.requisito.id
            );
            form.post(url, {
                preserveScroll: true,
                forceFormData: true,
                onSuccess: (response) => {
                    const success =
                        response.props.flash.success ??
                        "Proceso realizado con éxito";
                    Swal.fire({
                        icon: "success",
                        title: "Correcto",
                        html: `${success}`,
                        confirmButtonText: `Aceptar`,
                        customClass: {
                            confirmButton: "btn-alert-success",
                        },
                    });
                    form.reset();
                    emits("envio-formulario");
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

const cerrarFormulario = () => {
    form.reset();
    muestra_form.value = false;
    document.getElementsByTagName("body")[0].classList.remove("modal-open");
};

onMounted(() => {});
</script>

<template>
    <MiModal
        :open_modal="muestra_form"
        @close="cerrarFormulario"
        :size="'modal-xl modal-90vw'"
        :header-class="'bg-principal'"
        :footer-class="'justify-content-end'"
        :max-height-body="'75vh'"
    >
        <template #header>
            <h4 class="modal-title text-white" v-html="tituloDialog"></h4>
            <button
                type="button"
                class="close"
                @click.prevent="cerrarFormulario()"
            >
                <span aria-hidden="true">×</span>
            </button>
        </template>

        <template #body>
            <form @submit.prevent="enviarFormulario()">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <table class="w-100 table_archivo">
                                    <tbody>
                                        <tr class="border">
                                            <td
                                                class=""
                                                :class="[
                                                    form.file1
                                                        ? 'modificando'
                                                        : '',
                                                ]"
                                            >
                                                <el-tooltip
                                                    class="box-item"
                                                    effect="dark"
                                                    content="Fotocopia de Cédula de Identidad a
                                            Colores"
                                                    placement="top"
                                                >
                                                    <div class="descripcion">
                                                        Fotocopia de Cédula de
                                                        Identidad a Colores
                                                    </div>
                                                </el-tooltip>
                                                <div
                                                    v-if="form.file1"
                                                    class="descripcion descripcion_modificando"
                                                >
                                                    {{ form.file1.name }}
                                                </div>
                                            </td>
                                            <td width="60px">
                                                <a
                                                    class="btn btn-success w-100 rounded-0 mt-1"
                                                    :href="
                                                        postulante?.requisito
                                                            .url_file1
                                                    "
                                                    target="_blank"
                                                >
                                                    <i
                                                        class="fa fa-download"
                                                    ></i>
                                                </a>
                                                <input
                                                    type="file"
                                                    name="file1"
                                                    id="file1"
                                                    @change="
                                                        cargarArchivo(
                                                            $event,
                                                            'file1'
                                                        )
                                                    "
                                                    accept="application/pdf"
                                                />
                                                <label
                                                    for="file1"
                                                    class="btn btn-warning w-100 rounded-0 mt-1"
                                                >
                                                    <i class="fa fa-edit"></i>
                                                </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12">
                                <table class="w-100 table_archivo">
                                    <tbody>
                                        <tr class="border">
                                            <td
                                                class=""
                                                :class="[
                                                    form.file2
                                                        ? 'modificando'
                                                        : '',
                                                ]"
                                            >
                                                <el-tooltip
                                                    class="box-item"
                                                    effect="dark"
                                                    content="Certificado de Nacimiento Original"
                                                    placement="top"
                                                >
                                                    <div class="descripcion">
                                                        Certificado de
                                                        Nacimiento Original
                                                    </div>
                                                </el-tooltip>
                                                <div
                                                    v-if="form.file2"
                                                    class="descripcion descripcion_modificando"
                                                >
                                                    {{ form.file2.name }}
                                                </div>
                                            </td>
                                            <td width="60px">
                                                <a
                                                    class="btn btn-success w-100 rounded-0 mt-1"
                                                    :href="
                                                        postulante?.requisito
                                                            .url_file2
                                                    "
                                                    target="_blank"
                                                >
                                                    <i
                                                        class="fa fa-download"
                                                    ></i>
                                                </a>
                                                <input
                                                    type="file"
                                                    name="file2"
                                                    id="file2"
                                                    @change="
                                                        cargarArchivo(
                                                            $event,
                                                            'file2'
                                                        )
                                                    "
                                                    accept="application/pdf"
                                                />
                                                <label
                                                    for="file2"
                                                    class="btn btn-warning w-100 rounded-0 mt-1"
                                                >
                                                    <i class="fa fa-edit"></i>
                                                </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12">
                                <table class="w-100 table_archivo">
                                    <tbody>
                                        <tr class="border">
                                            <td
                                                class=""
                                                :class="[
                                                    form.file3
                                                        ? 'modificando'
                                                        : '',
                                                ]"
                                            >
                                                <el-tooltip
                                                    class="box-item"
                                                    effect="dark"
                                                    content="Certificado de No Militancia Pollítica"
                                                    placement="top"
                                                >
                                                    <div class="descripcion">
                                                        Certificado de No
                                                        Militancia Pollítica
                                                    </div>
                                                </el-tooltip>
                                                <div
                                                    v-if="form.file3"
                                                    class="descripcion descripcion_modificando"
                                                >
                                                    {{ form.file3.name }}
                                                </div>
                                            </td>
                                            <td width="60px">
                                                <a
                                                    class="btn btn-success w-100 rounded-0 mt-1"
                                                    :href="
                                                        postulante?.requisito
                                                            .url_file3
                                                    "
                                                    target="_blank"
                                                >
                                                    <i
                                                        class="fa fa-download"
                                                    ></i>
                                                </a>
                                                <input
                                                    type="file"
                                                    name="file3"
                                                    id="file3"
                                                    @change="
                                                        cargarArchivo(
                                                            $event,
                                                            'file3'
                                                        )
                                                    "
                                                    accept="application/pdf"
                                                />
                                                <label
                                                    for="file3"
                                                    class="btn btn-warning w-100 rounded-0 mt-1"
                                                >
                                                    <i class="fa fa-edit"></i>
                                                </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12">
                                <table class="w-100 table_archivo">
                                    <tbody>
                                        <tr class="border">
                                            <td
                                                class=""
                                                :class="[
                                                    form.file4
                                                        ? 'modificando'
                                                        : '',
                                                ]"
                                            >
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
                                                    v-if="form.file4"
                                                    class="descripcion descripcion_modificando"
                                                >
                                                    {{ form.file4.name }}
                                                </div>
                                            </td>
                                            <td width="60px">
                                                <a
                                                    class="btn btn-success w-100 rounded-0 mt-1"
                                                    :href="
                                                        postulante?.requisito
                                                            .url_file4
                                                    "
                                                    target="_blank"
                                                >
                                                    <i
                                                        class="fa fa-download"
                                                    ></i>
                                                </a>
                                                <input
                                                    type="file"
                                                    name="file4"
                                                    id="file4"
                                                    @change="
                                                        cargarArchivo(
                                                            $event,
                                                            'file4'
                                                        )
                                                    "
                                                    accept="application/pdf"
                                                />
                                                <label
                                                    for="file4"
                                                    class="btn btn-warning w-100 rounded-0 mt-1"
                                                >
                                                    <i class="fa fa-edit"></i>
                                                </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div
                                class="col-12"
                                v-if="postulante?.genero == 'F'"
                            >
                                <table class="w-100 table_archivo">
                                    <tbody>
                                        <tr class="border">
                                            <td
                                                class=""
                                                :class="[
                                                    form.file5
                                                        ? 'modificando'
                                                        : '',
                                                ]"
                                            >
                                                <el-tooltip
                                                    class="box-item"
                                                    effect="dark"
                                                    content="Certificado Médico de No encontrarse en estado de gestación"
                                                    placement="top"
                                                >
                                                    <div class="descripcion">
                                                        Certificado Médico de No
                                                        encontrarse en estado de
                                                        gestación
                                                    </div>
                                                </el-tooltip>
                                                <div
                                                    v-if="form.file5"
                                                    class="descripcion descripcion_modificando"
                                                >
                                                    {{ form.file5.name }}
                                                </div>
                                            </td>
                                            <td width="60px">
                                                <a
                                                    class="btn btn-success w-100 rounded-0 mt-1"
                                                    :href="
                                                        postulante?.requisito
                                                            .url_file5
                                                    "
                                                    target="_blank"
                                                >
                                                    <i
                                                        class="fa fa-download"
                                                    ></i>
                                                </a>
                                                <input
                                                    type="file"
                                                    name="file5"
                                                    id="file5"
                                                    @change="
                                                        cargarArchivo(
                                                            $event,
                                                            'file5'
                                                        )
                                                    "
                                                    accept="application/pdf"
                                                />
                                                <label
                                                    for="file5"
                                                    class="btn btn-warning w-100 rounded-0 mt-1"
                                                >
                                                    <i class="fa fa-edit"></i>
                                                </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12">
                                <table class="w-100 table_archivo">
                                    <tbody>
                                        <tr class="border">
                                            <td
                                                class=""
                                                :class="[
                                                    form.file6
                                                        ? 'modificando'
                                                        : '',
                                                ]"
                                            >
                                                <el-tooltip
                                                    class="box-item"
                                                    effect="dark"
                                                    content="Diploma de Bachiller o Certificado de 6to. de Secundaria"
                                                    placement="top"
                                                >
                                                    <div class="descripcion">
                                                        Diploma de Bachiller o
                                                        Certificado de 6to. de
                                                        Secundaria
                                                    </div>
                                                </el-tooltip>
                                                <div
                                                    v-if="form.file6"
                                                    class="descripcion descripcion_modificando"
                                                >
                                                    {{ form.file6.name }}
                                                </div>
                                            </td>
                                            <td width="60px">
                                                <a
                                                    class="btn btn-success w-100 rounded-0 mt-1"
                                                    :href="
                                                        postulante?.requisito
                                                            .url_file1
                                                    "
                                                    target="_blank"
                                                >
                                                    <i
                                                        class="fa fa-download"
                                                    ></i>
                                                </a>
                                                <input
                                                    type="file"
                                                    name="file6"
                                                    id="file6"
                                                    @change="
                                                        cargarArchivo(
                                                            $event,
                                                            'file6'
                                                        )
                                                    "
                                                    accept="application/pdf"
                                                />
                                                <label
                                                    for="file6"
                                                    class="btn btn-warning w-100 rounded-0 mt-1"
                                                >
                                                    <i class="fa fa-edit"></i>
                                                </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12">
                                <table class="w-100 table_archivo">
                                    <tbody>
                                        <tr class="border">
                                            <td
                                                class=""
                                                :class="[
                                                    form.file7
                                                        ? 'modificando'
                                                        : '',
                                                ]"
                                            >
                                                <el-tooltip
                                                    class="box-item"
                                                    effect="dark"
                                                    content="Certificado de Registro Judicial de Antecedentes Penales"
                                                    placement="top"
                                                >
                                                    <div class="descripcion">
                                                        Certificado de Registro
                                                        Judicial de Antecedentes
                                                        Penales
                                                    </div>
                                                </el-tooltip>
                                                <div
                                                    v-if="form.file7"
                                                    class="descripcion descripcion_modificando"
                                                >
                                                    {{ form.file7.name }}
                                                </div>
                                            </td>
                                            <td width="60px">
                                                <a
                                                    class="btn btn-success w-100 rounded-0 mt-1"
                                                    :href="
                                                        postulante?.requisito
                                                            .url_file7
                                                    "
                                                    target="_blank"
                                                >
                                                    <i
                                                        class="fa fa-download"
                                                    ></i>
                                                </a>
                                                <input
                                                    type="file"
                                                    name="file7"
                                                    id="file7"
                                                    @change="
                                                        cargarArchivo(
                                                            $event,
                                                            'file7'
                                                        )
                                                    "
                                                    accept="application/pdf"
                                                />
                                                <label
                                                    for="file7"
                                                    class="btn btn-warning w-100 rounded-0 mt-1"
                                                >
                                                    <i class="fa fa-edit"></i>
                                                </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12">
                                <table class="w-100 table_archivo">
                                    <tbody>
                                        <tr class="border">
                                            <td
                                                class=""
                                                :class="[
                                                    form.file8
                                                        ? 'modificando'
                                                        : '',
                                                ]"
                                            >
                                                <el-tooltip
                                                    class="box-item"
                                                    effect="dark"
                                                    content="Certificado de Antecedentes de No Violencia en Razón de Genero"
                                                    placement="top"
                                                >
                                                    <div class="descripcion">
                                                        Certificado de
                                                        Antecedentes de No
                                                        Violencia en Razón de
                                                        Genero
                                                    </div>
                                                </el-tooltip>
                                                <div
                                                    v-if="form.file8"
                                                    class="descripcion descripcion_modificando"
                                                >
                                                    {{ form.file8.name }}
                                                </div>
                                            </td>
                                            <td width="60px">
                                                <a
                                                    class="btn btn-success w-100 rounded-0 mt-1"
                                                    :href="
                                                        postulante?.requisito
                                                            .url_file8
                                                    "
                                                    target="_blank"
                                                >
                                                    <i
                                                        class="fa fa-download"
                                                    ></i>
                                                </a>
                                                <input
                                                    type="file"
                                                    name="file8"
                                                    id="file8"
                                                    @change="
                                                        cargarArchivo(
                                                            $event,
                                                            'file8'
                                                        )
                                                    "
                                                    accept="application/pdf"
                                                />
                                                <label
                                                    for="file8"
                                                    class="btn btn-warning w-100 rounded-0 mt-1"
                                                >
                                                    <i class="fa fa-edit"></i>
                                                </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12">
                                <table class="w-100 table_archivo">
                                    <tbody>
                                        <tr class="border">
                                            <td
                                                class=""
                                                :class="[
                                                    form.file9
                                                        ? 'modificando'
                                                        : '',
                                                ]"
                                            >
                                                <el-tooltip
                                                    class="box-item"
                                                    effect="dark"
                                                    content="Certificado de Antecedentes Policiales"
                                                    placement="top"
                                                >
                                                    <div class="descripcion">
                                                        Certificado de
                                                        Antecedentes Policiales
                                                    </div>
                                                </el-tooltip>
                                                <div
                                                    v-if="form.file9"
                                                    class="descripcion descripcion_modificando"
                                                >
                                                    {{ form.file9.name }}
                                                </div>
                                            </td>
                                            <td width="60px">
                                                <a
                                                    class="btn btn-success w-100 rounded-0 mt-1"
                                                    :href="
                                                        postulante?.requisito
                                                            .url_file9
                                                    "
                                                    target="_blank"
                                                >
                                                    <i
                                                        class="fa fa-download"
                                                    ></i>
                                                </a>
                                                <input
                                                    type="file"
                                                    name="file9"
                                                    id="file9"
                                                    @change="
                                                        cargarArchivo(
                                                            $event,
                                                            'file9'
                                                        )
                                                    "
                                                    accept="application/pdf"
                                                />
                                                <label
                                                    for="file9"
                                                    class="btn btn-warning w-100 rounded-0 mt-1"
                                                >
                                                    <i class="fa fa-edit"></i>
                                                </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12">
                                <table class="w-100 table_archivo">
                                    <tbody>
                                        <tr class="border">
                                            <td
                                                class=""
                                                :class="[
                                                    form.file10
                                                        ? 'modificando'
                                                        : '',
                                                ]"
                                            >
                                                <el-tooltip
                                                    class="box-item"
                                                    effect="dark"
                                                    content="Certificado de No haber sido dado de Baja en Unidades Académicas"
                                                    placement="top"
                                                >
                                                    <div class="descripcion">
                                                        Certificado de No haber
                                                        sido dado de Baja en
                                                        Unidades Académicas
                                                    </div>
                                                </el-tooltip>
                                                <div
                                                    v-if="form.file10"
                                                    class="descripcion descripcion_modificando"
                                                >
                                                    {{ form.file10.name }}
                                                </div>
                                            </td>
                                            <td width="60px">
                                                <a
                                                    class="btn btn-success w-100 rounded-0 mt-1"
                                                    :href="
                                                        postulante?.requisito
                                                            .url_file1
                                                    "
                                                    target="_blank"
                                                >
                                                    <i
                                                        class="fa fa-download"
                                                    ></i>
                                                </a>
                                                <input
                                                    type="file"
                                                    name="file10"
                                                    id="file10"
                                                    @change="
                                                        cargarArchivo(
                                                            $event,
                                                            'file10'
                                                        )
                                                    "
                                                    accept="application/pdf"
                                                />
                                                <label
                                                    for="file10"
                                                    class="btn btn-warning w-100 rounded-0 mt-1"
                                                >
                                                    <i class="fa fa-edit"></i>
                                                </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12">
                                <table class="w-100 table_archivo">
                                    <tbody>
                                        <tr class="border">
                                            <td
                                                class=""
                                                :class="[
                                                    form.file11
                                                        ? 'modificando'
                                                        : '',
                                                ]"
                                            >
                                                <el-tooltip
                                                    class="box-item"
                                                    effect="dark"
                                                    content="Compromiso Notariado de consentimiento y sometimiento a Evaluaciones"
                                                    placement="top"
                                                >
                                                    <div class="descripcion">
                                                        Compromiso Notariado de
                                                        consentimiento y
                                                        sometimiento a
                                                        Evaluaciones
                                                    </div>
                                                </el-tooltip>
                                                <div
                                                    v-if="form.file11"
                                                    class="descripcion descripcion_modificando"
                                                >
                                                    {{ form.file11.name }}
                                                </div>
                                            </td>
                                            <td width="60px">
                                                <a
                                                    class="btn btn-success w-100 rounded-0 mt-1"
                                                    :href="
                                                        postulante?.requisito
                                                            .url_file11
                                                    "
                                                    target="_blank"
                                                >
                                                    <i
                                                        class="fa fa-download"
                                                    ></i>
                                                </a>
                                                <input
                                                    type="file"
                                                    name="file11"
                                                    id="file11"
                                                    @change="
                                                        cargarArchivo(
                                                            $event,
                                                            'file11'
                                                        )
                                                    "
                                                    accept="application/pdf"
                                                />
                                                <label
                                                    for="file11"
                                                    class="btn btn-warning w-100 rounded-0 mt-1"
                                                >
                                                    <i class="fa fa-edit"></i>
                                                </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12">
                                <table class="w-100 table_archivo">
                                    <tbody>
                                        <tr class="border">
                                            <td
                                                class=""
                                                :class="[
                                                    form.file12
                                                        ? 'modificando'
                                                        : '',
                                                ]"
                                            >
                                                <el-tooltip
                                                    class="box-item"
                                                    effect="dark"
                                                    content="Compromiso notariado de cumplimiento del Reglamento de Admisión"
                                                    placement="top"
                                                >
                                                    <div class="descripcion">
                                                        Compromiso notariado de
                                                        cumplimiento del
                                                        Reglamento de Admisión
                                                    </div>
                                                </el-tooltip>
                                                <div
                                                    v-if="form.file12"
                                                    class="descripcion descripcion_modificando"
                                                >
                                                    {{ form.file12.name }}
                                                </div>
                                            </td>
                                            <td width="60px">
                                                <a
                                                    class="btn btn-success w-100 rounded-0 mt-1"
                                                    :href="
                                                        postulante?.requisito
                                                            .url_file12
                                                    "
                                                    target="_blank"
                                                >
                                                    <i
                                                        class="fa fa-download"
                                                    ></i>
                                                </a>
                                                <input
                                                    type="file"
                                                    name="file12"
                                                    id="file12"
                                                    @change="
                                                        cargarArchivo(
                                                            $event,
                                                            'file12'
                                                        )
                                                    "
                                                    accept="application/pdf"
                                                />
                                                <label
                                                    for="file12"
                                                    class="btn btn-warning w-100 rounded-0 mt-1"
                                                >
                                                    <i class="fa fa-edit"></i>
                                                </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12">
                                <table class="w-100 table_archivo">
                                    <tbody>
                                        <tr class="border">
                                            <td
                                                class=""
                                                :class="[
                                                    form.file13
                                                        ? 'modificando'
                                                        : '',
                                                ]"
                                            >
                                                <el-tooltip
                                                    class="box-item"
                                                    effect="dark"
                                                    content="Boleta de Deposito para el Registro al Proceso de Admisión"
                                                    placement="top"
                                                >
                                                    <div class="descripcion">
                                                        Boleta de Deposito para
                                                        el Registro al Proceso
                                                        de Admisión
                                                    </div>
                                                </el-tooltip>
                                                <div
                                                    v-if="form.file13"
                                                    class="descripcion descripcion_modificando"
                                                >
                                                    {{ form.file13.name }}
                                                </div>
                                            </td>
                                            <td width="60px">
                                                <a
                                                    class="btn btn-success w-100 rounded-0 mt-1"
                                                    :href="
                                                        postulante?.requisito
                                                            .url_file13
                                                    "
                                                    target="_blank"
                                                >
                                                    <i
                                                        class="fa fa-download"
                                                    ></i>
                                                </a>
                                                <input
                                                    type="file"
                                                    name="file13"
                                                    id="file13"
                                                    @change="
                                                        cargarArchivo(
                                                            $event,
                                                            'file13'
                                                        )
                                                    "
                                                    accept="application/pdf"
                                                />
                                                <label
                                                    for="file13"
                                                    class="btn btn-warning w-100 rounded-0 mt-1"
                                                >
                                                    <i class="fa fa-edit"></i>
                                                </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12">
                                <table class="w-100 table_archivo">
                                    <tbody>
                                        <tr class="border">
                                            <td
                                                class=""
                                                :class="[
                                                    form.file14
                                                        ? 'modificando'
                                                        : '',
                                                ]"
                                            >
                                                <el-tooltip
                                                    class="box-item"
                                                    effect="dark"
                                                    content="Declaración Jurada notariada para postulantes de 17 años"
                                                    placement="top"
                                                >
                                                    <div class="descripcion">
                                                        Declaración Jurada
                                                        notariada para
                                                        postulantes de 17 años
                                                    </div>
                                                </el-tooltip>
                                                <div
                                                    v-if="form.file14"
                                                    class="descripcion descripcion_modificando"
                                                >
                                                    {{ form.file14.name }}
                                                </div>
                                            </td>
                                            <td width="60px">
                                                <a
                                                    class="btn btn-success w-100 rounded-0 mt-1"
                                                    :href="
                                                        postulante?.requisito
                                                            .url_file14
                                                    "
                                                    target="_blank"
                                                >
                                                    <i
                                                        class="fa fa-download"
                                                    ></i>
                                                </a>
                                                <input
                                                    type="file"
                                                    name="file14"
                                                    id="file14"
                                                    @change="
                                                        cargarArchivo(
                                                            $event,
                                                            'file14'
                                                        )
                                                    "
                                                    accept="application/pdf"
                                                />
                                                <label
                                                    for="file14"
                                                    class="btn btn-warning w-100 rounded-0 mt-1"
                                                >
                                                    <i class="fa fa-edit"></i>
                                                </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </template>
        <template #footer>
            <button
                type="button"
                class="btn btn-default"
                @click.prevent="cerrarFormulario()"
            >
                Cerrar
            </button>
            <button
                v-if="
                    props_page.auth?.user.permisos == '*' ||
                    props_page.auth?.user.permisos.includes('requisitos.update')
                "
                type="button"
                class="btn btn-success"
                :disabled="enviando"
                @click.prevent="actualizar"
                v-html="textBtn"
            ></button>
        </template>
    </MiModal>
</template>
<style scoped>
.table_archivo tbody tr td:nth-child(1) {
    padding-top: 6px;
    padding-bottom: 5px;
    padding-left: 6px;
    color: rgb(95, 95, 95);
    font-weight: 500;
}

.table_archivo tbody tr td.modificando {
    background-color: var(--bg8);
}
.table_archivo tbody tr td:nth-child(2) {
    padding-top: 6px;
    padding-bottom: 5px;
}

.table_archivo tbody tr td:nth-child(2) input {
    display: none;
}
.descripcion_modificando {
    font-style: italic;
    font-size: 0.8em;
    font-weight: bold;
    color: var(--bg4);
}
</style>
