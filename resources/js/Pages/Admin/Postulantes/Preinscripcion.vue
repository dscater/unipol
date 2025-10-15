<script setup>
import Content from "@/Components/Content.vue";
import { Head, Link, usePage, useForm } from "@inertiajs/vue3";
import { usePostulantes } from "@/composables/postulantes/usePostulantes";
import { ref, onMounted, onBeforeMount, computed } from "vue";
import { useAppStore } from "@/stores/aplicacion/appStore";
import { useAxios } from "@/composables/axios/useAxios";
const { props: props_page } = usePage();
const appStore = useAppStore();
const { axiosDelete } = useAxios();

onBeforeMount(() => {
    appStore.startLoading();
});

const { oPostulante, limpiarPostulante } = usePostulantes();

const listExpedido = [
    { value: "LP", label: "La Paz" },
    { value: "CB", label: "Cochabamba" },
    { value: "SC", label: "Santa Cruz" },
    { value: "CH", label: "Chuquisaca" },
    { value: "OR", label: "Oruro" },
    { value: "PT", label: "Potosi" },
    { value: "TJ", label: "Tarija" },
    { value: "PD", label: "Pando" },
    { value: "BN", label: "Beni" },
];

const listUnidads = ref([
    {
        label: "ANAPOL",
        value: "ANAPOL",
    },
    {
        label: "FATESCIPOL",
        value: "FATESCIPOL",
    },
    {
        label: "ESBAPOLMUS",
        value: "ESBAPOLMUS",
    },
]);

const listLugares = ref([
    {
        label: "ANAPOL",
        value: "ANAPOL",
    },
    {
        label: 'FATESCIPOL "EL ALTO"',
        value: 'FATESCIPOL "EL ALTO"',
    },
    {
        label: 'FATESCIPOL "COLQUIRI"',
        value: 'FATESCIPOL "COLQUIRI"',
    },
    {
        label: 'FATESCIPOL "HUANUNI"',
        value: 'FATESCIPOL "HUANUNI"',
    },
    {
        label: 'FATESCIPOL "CARACOLLO"',
        value: 'FATESCIPOL "CARACOLLO"',
    },
    {
        label: "COMANDO DPTAL. DE ORURO",
        value: "COMANDO DPTAL. DE ORURO",
    },
    {
        label: 'FATESCIPOL "POTOSÍ”',
        value: 'FATESCIPOL "POTOSÍ”',
    },
    {
        label: 'FATESCIPOL "LLALLAGUA”',
        value: 'FATESCIPOL "LLALLAGUA”',
    },
    {
        label: 'FATESCIPOL "SUCRE”',
        value: 'FATESCIPOL "SUCRE”',
    },
    {
        label: 'FATESCIPOL "TARIJA”',
        value: 'FATESCIPOL "TARIJA”',
    },
    {
        label: 'FATESCIPOL "GRAN CHACO”',
        value: 'FATESCIPOL "GRAN CHACO”',
    },
    {
        label: 'FATESCIPOL "PANDO”',
        value: 'FATESCIPOL "PANDO”',
    },
    {
        label: "COMANDO DPTAL. DE BEN",
        value: "COMANDO DPTAL. DE BEN",
    },
    {
        label: 'FATESCIPOL "RIBERALTA"',
        value: 'FATESCIPOL "RIBERALTA"',
    },
    {
        label: 'FATESCIPOL "SANTA CRUZ"',
        value: 'FATESCIPOL "SANTA CRUZ"',
    },
    {
        label: 'FATESCIPOL "COCHABAMBA"',
        value: 'FATESCIPOL "COCHABAMBA"',
    },
    {
        label: "ESBAPOLMUS",
        value: "ESBAPOLMUS",
    },
]);

let form = useForm(oPostulante.value);
const enviando = ref(false);
const textBtn = computed(() => {
    if (enviando.value) {
        return `<i class="fa fa-spin fa-spinner"></i> Enviando...`;
    }
    return `<i class="fa fa-save"></i> Guardar`;
});

const cancelar = () => {
    form.reset();
};

const enviarFormulario = () => {
    enviando.value = true;
    let url = route("postulantes.store");

    form.post(url, {
        preserveScroll: true,
        forceFormData: true,
        onSuccess: (response) => {
            console.log("correcto");
            const success =
                response.props.flash.success ?? "Proceso realizado con éxito";
            Swal.fire({
                icon: "success",
                title: "Correcto",
                html: `<strong>${success}</strong>`,
                confirmButtonText: `Aceptar`,
                customClass: {
                    confirmButton: "btn-success",
                },
            });
            limpiarPostulante();
        },
        onError: (err, code) => {
            console.log(code ?? "");
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
};

onMounted(async () => {
    appStore.stopLoading();
});
</script>
<template>
    <Head title="Preinscripción"></Head>

    <Content>
        <template #header>
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Preinscripción</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <Link :href="route('inicio')">Inicio</Link>
                        </li>
                        <li class="breadcrumb-item active">Preinscripción</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </template>

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form @submit.prevent="enviarFormulario()">
                                    <p class="text-muted text-xs mb-0">
                                        Todos los campos con
                                        <span class="text-danger">(*)</span> son
                                        obligatorios.
                                    </p>
                                    <div class="row">
                                        <div class="col-md-4 mt-2">
                                            <label class="required"
                                                >Número de C.I.</label
                                            >
                                            <input
                                                type="number"
                                                class="form-control"
                                                :class="{
                                                    'parsley-error':
                                                        form.errors?.ci,
                                                }"
                                                v-model="form.ci"
                                            />

                                            <ul
                                                v-if="form.errors?.ci"
                                                class="text-danger list-unstyled mb-0"
                                            >
                                                <li class="parsley-required">
                                                    {{ form.errors?.ci }}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label class="required"
                                                >Expedido</label
                                            >
                                            <select
                                                class="form-control"
                                                :class="{
                                                    'parsley-error':
                                                        form.errors?.ci_exp,
                                                }"
                                                v-model="form.ci_exp"
                                            >
                                                <option value="">
                                                    - Seleccione -
                                                </option>
                                                <option
                                                    v-for="item in listExpedido"
                                                    :value="item.value"
                                                >
                                                    {{ item.label }}
                                                </option>
                                            </select>
                                            <ul
                                                v-if="form.errors?.ci_exp"
                                                class="text-danger list-unstyled mb-0"
                                            >
                                                <li class="parsley-required">
                                                    {{ form.errors?.ci_exp }}
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <label class="">Complemento</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                :class="{
                                                    'parsley-error':
                                                        form.errors
                                                            ?.complemento,
                                                }"
                                                v-model="form.complemento"
                                            />

                                            <ul
                                                v-if="form.errors?.complemento"
                                                class="text-danger list-unstyled mb-0"
                                            >
                                                <li class="parsley-required">
                                                    {{
                                                        form.errors?.complemento
                                                    }}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label class="required"
                                                >Nombre(s)</label
                                            >
                                            <input
                                                type="text"
                                                class="form-control"
                                                :class="{
                                                    'parsley-error':
                                                        form.errors?.nombre,
                                                }"
                                                v-model="form.nombre"
                                            />
                                            <ul
                                                v-if="form.errors?.nombre"
                                                class="text-danger list-unstyled mb-0"
                                            >
                                                <li class="parsley-required">
                                                    {{ form.errors?.nombre }}
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <label class="required"
                                                >Ap. Paterno</label
                                            >
                                            <input
                                                type="text"
                                                class="form-control"
                                                :class="{
                                                    'parsley-error':
                                                        form.errors?.paterno,
                                                }"
                                                v-model="form.paterno"
                                            />

                                            <ul
                                                v-if="form.errors?.paterno"
                                                class="text-danger list-unstyled mb-0"
                                            >
                                                <li class="parsley-required">
                                                    {{ form.errors?.paterno }}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>Ap. Materno</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                :class="{
                                                    'parsley-error':
                                                        form.errors?.materno,
                                                }"
                                                v-model="form.materno"
                                            />

                                            <ul
                                                v-if="form.errors?.materno"
                                                class="text-danger list-unstyled mb-0"
                                            >
                                                <li class="parsley-required">
                                                    {{ form.errors?.materno }}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 mt-2 text-center">
                                            <label class="required"
                                                >Género</label
                                            ><br />
                                            <el-radio-group
                                                v-model="form.genero"
                                            >
                                                <el-radio
                                                    value="M"
                                                    size="large"
                                                    border
                                                    >M</el-radio
                                                >
                                                <el-radio
                                                    value="F"
                                                    size="large"
                                                    border
                                                    >F</el-radio
                                                >
                                            </el-radio-group>
                                            <ul
                                                v-if="form.errors?.genero"
                                                class="text-danger list-unstyled mb-0"
                                            >
                                                <li class="parsley-required">
                                                    {{ form.errors?.genero }}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label class="required"
                                                >Unidad Académica a la cual
                                                postula</label
                                            >
                                            <select
                                                class="form-control"
                                                :class="{
                                                    'parsley-error':
                                                        form.errors?.unidad,
                                                }"
                                                v-model="form.unidad"
                                            >
                                                <option value="">
                                                    - Seleccione -
                                                </option>
                                                <option
                                                    v-for="item in listUnidads"
                                                    :value="item.value"
                                                >
                                                    {{ item.label }}
                                                </option>
                                            </select>

                                            <ul
                                                v-if="form.errors?.unidad"
                                                class="text-danger list-unstyled mb-0"
                                            >
                                                <li class="parsley-required">
                                                    {{ form.errors?.unidad }}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label class="required"
                                                >Fecha de Nacimiento</label
                                            >
                                            <input
                                                type="date"
                                                class="form-control"
                                                :class="{
                                                    'parsley-error':
                                                        form.errors?.fecha_nac,
                                                }"
                                                v-model="form.fecha_nac"
                                            />

                                            <ul
                                                v-if="form.errors?.fecha_nac"
                                                class="text-danger list-unstyled mb-0"
                                            >
                                                <li class="parsley-required">
                                                    {{ form.errors?.fecha_nac }}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label class="required"
                                                >Número de
                                                celular(Whatsapp)</label
                                            >
                                            <input
                                                type="text"
                                                class="form-control"
                                                :class="{
                                                    'parsley-error':
                                                        form.errors?.cel,
                                                }"
                                                v-model="form.cel"
                                            />

                                            <ul
                                                v-if="form.errors?.cel"
                                                class="text-danger list-unstyled mb-0"
                                            >
                                                <li class="parsley-required">
                                                    {{ form.errors?.cel }}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label class="required"
                                                >Correo electrónico</label
                                            >
                                            <input
                                                type="email"
                                                class="form-control"
                                                :class="{
                                                    'parsley-error':
                                                        form.errors?.correo,
                                                }"
                                                v-model="form.correo"
                                            />

                                            <ul
                                                v-if="form.errors?.correo"
                                                class="text-danger list-unstyled mb-0"
                                            >
                                                <li class="parsley-required">
                                                    {{ form.errors?.correo }}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label class="required"
                                                >Número de depósito o
                                                transferencia bancaria</label
                                            >
                                            <input
                                                type="text"
                                                class="form-control"
                                                :class="{
                                                    'parsley-error':
                                                        form.errors?.nro_cuenta,
                                                }"
                                                v-model="form.nro_cuenta"
                                            />

                                            <ul
                                                v-if="form.errors?.nro_cuenta"
                                                class="text-danger list-unstyled mb-0"
                                            >
                                                <li class="parsley-required">
                                                    {{
                                                        form.errors?.nro_cuenta
                                                    }}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label class="required"
                                                >Lugar de preinscripción</label
                                            >
                                            <el-select
                                                class="w-100"
                                                :class="{
                                                    'parsley-error':
                                                        form.errors
                                                            ?.lugar_preins,
                                                }"
                                                v-model="form.lugar_preins"
                                                placeholder="- Seleccione -"
                                                filterable
                                            >
                                                <el-option
                                                    v-for="item in listLugares"
                                                    :value="item.value"
                                                >
                                                    {{ item.label }}
                                                </el-option>
                                            </el-select>

                                            <ul
                                                v-if="form.errors?.lugar_preins"
                                                class="text-danger list-unstyled mb-0"
                                            >
                                                <li class="parsley-required">
                                                    {{
                                                        form.errors
                                                            ?.lugar_preins
                                                    }}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label class="r">Observación</label>
                                            <el-input
                                                type="textarea"
                                                :class="{
                                                    'parsley-error':
                                                        form.errors
                                                            ?.observacion,
                                                }"
                                                v-model="form.observacion"
                                                autosize
                                            >
                                            </el-input>

                                            <ul
                                                v-if="form.errors?.observacion"
                                                class="text-danger list-unstyled mb-0"
                                            >
                                                <li class="parsley-required">
                                                    {{
                                                        form.errors?.observacion
                                                    }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row mt-3 justify-content-end">
                                        <div class="col-md-3">
                                            <button
                                                type="button"
                                                class="btn btn-danger w-100"
                                                :disabled="enviando"
                                                @click.prevent="cancelar"
                                            >
                                                <i class="fa fa-times"></i>
                                                Cancelar
                                            </button>
                                        </div>
                                        <div class="col-md-3">
                                            <button
                                                type="button"
                                                class="btn btn-success w-100"
                                                :disabled="enviando"
                                                @click.prevent="
                                                    enviarFormulario
                                                "
                                                v-html="textBtn"
                                            ></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Content>
</template>
