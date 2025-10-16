<script>
import Login from "@/Layouts/Login.vue";
import { onMounted, ref } from "vue";
import { useProps } from "element-plus/es/components/select-v2/src/useProps";
export default {
    layout: Login,
};
</script>
<script setup>
import { Head, Link, router, useForm, usePage } from "@inertiajs/vue3";

import { useConfiguracion } from "@/composables/configuracion/useConfiguracion";
import FormLogin from "@/Pages/Auth/FormLogin.vue";
const { props } = usePage();
const { url_assets } = usePage().props;
const { oConfiguracion } = useConfiguracion();
const propsForm = defineProps({
    postulante: {
        type: Object,
        default: null,
    },
});
const muestra_formulario = ref(false);
const enviando = ref(false);
const errorPass = ref(false);
const errorPassword = ref("");
const muestra_password = ref(false);
const form = useForm({
    correo: propsForm.postulante.correo,
    password: "",
    foto: "",
    _method: "put",
});

const foto = ref(null);
const cargarFoto = (e) => {
    form["foto"] = e.target.files[0];
};

const validarPassword = () => {
    errorPassword.value = "";
    errorPass.value = false;
    if (!/^\d{6}$/.test(form.password)) {
        errorPass.value = true;
        errorPassword.value =
            "La contraseña debe tener exactamente 6 dígitos numéricos.";
    }
};

const submit = () => {
    enviando.value = true;
    let url = route("formularioRegistro.update", propsForm.postulante.id);
    form.post(url, {
        preserveScroll: true,
        forceFormData: true,
        onSuccess: (response) => {
            console.log("correcto");
            const success =
                response.props.flash.success ??
                "Registro éxitoso. Ahora puedes Iniciar Sesión";
            Swal.fire({
                icon: "success",
                title: "Correcto",
                html: `<strong>${success}</strong>`,
                confirmButtonText: `Aceptar`,
                customClass: {
                    confirmButton: "btn-alert-success",
                },
            });
            // limpiarPostulante();
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

onMounted(() => {});
</script>

<template>
    <Head title="Finalizar Registro"></Head>
    <div class="contenedor">
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <div class="card-header bg-principal text-center">
                    <img
                        :src="url_assets + '/imgs/logo.png'"
                        alt=""
                        class="img_logo"
                    />
                </div>
                <div
                    class="card-body"
                    v-if="postulante.epass == 0 && postulante.ecodigo == 1"
                >
                    <form @submit.prevent="submit">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="w-100 text-center">
                                    Finalizar registro<br />
                                    <small>Asignar Contraseña y Foto</small>
                                </h4>
                            </div>
                            <div class="col-12">
                                <p class="mb-0 w-100 text-center">
                                    <strong>Potulante: </strong
                                    >{{ postulante.full_name }}
                                </p>
                            </div>
                            <div class="col-12">
                                <div class="input-group form-floating mt-3">
                                    <span class="input-group-text">
                                        <i class="fa fa-id-card"></i>
                                    </span>
                                    <input
                                        type="text"
                                        name="correo"
                                        class="form-control fs-13px h-45p"
                                        v-model="form.correo"
                                        autocomplete="false"
                                        placeholder="Correo electrónico"
                                        readonly
                                    />
                                    <label
                                        for="correo"
                                        class="d-flex align-items-center text-gray-600 fs-13px ml-5"
                                        style="z-index: 100"
                                        >Correo electrónico</label
                                    >
                                </div>
                                <ul
                                    v-if="form.errors?.correo"
                                    class="text-danger list-unstyled mb-0"
                                >
                                    <li class="parsley-required">
                                        {{ form.errors?.correo }}
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12">
                                <div class="input-group form-floating mt-3">
                                    <span class="input-group-text">
                                        <i class="fa fa-key"></i>
                                    </span>
                                    <input
                                        :type="
                                            muestra_password
                                                ? 'text'
                                                : 'password'
                                        "
                                        name="password"
                                        class="form-control fs-13px h-45p"
                                        v-model="form.password"
                                        @input="validarPassword"
                                        autocomplete="false"
                                        placeholder="Ingrese Nueva Contraseña de 6 Dígitos"
                                    />
                                    <label
                                        for="password"
                                        class="d-flex align-items-center text-gray-600 fs-13px ml-5"
                                        style="z-index: 100"
                                        >Ingrese Nueva Contraseña de 6
                                        Dígitos</label
                                    >
                                    <button
                                        class="btn btn-default"
                                        type="button"
                                        @click="
                                            muestra_password = !muestra_password
                                        "
                                    >
                                        <i
                                            class="fa"
                                            :class="[
                                                muestra_password
                                                    ? 'fa-eye'
                                                    : 'fa-eye-slash',
                                            ]"
                                        ></i>
                                    </button>
                                </div>
                                <ul
                                    v-if="errorPassword && errorPass"
                                    class="text-danger list-unstyled mb-0"
                                >
                                    <li class="parsley-required">
                                        {{ errorPassword }}
                                    </li>
                                </ul>
                                <ul
                                    v-if="form.errors?.password"
                                    class="text-danger list-unstyled mb-0"
                                >
                                    <li class="parsley-required">
                                        {{ form.errors?.password }}
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12">
                                <div class="input-group mt-3">
                                    <span class="input-group-text">
                                        <i class="fa fa-camera"></i>
                                    </span>
                                    <input
                                        type="file"
                                        name="foto"
                                        class="form-control h-45p"
                                        autocomplete="false"
                                        placeholder="Correo electrónico"
                                        ref="foto"
                                        @change="cargarFoto($event)"
                                    />
                                    <span class="input-group-text">
                                        320x320
                                    </span>
                                </div>
                                <ul
                                    v-if="form.errors?.foto"
                                    class="text-danger list-unstyled mb-0"
                                >
                                    <li class="parsley-required">
                                        {{ form.errors?.foto }}
                                    </li>
                                </ul>
                            </div>
                            <div
                                class="col-12 justify-content-between d-flex pt-3"
                            >
                                <Link
                                    :href="route('portal.index')"
                                    class="btn btn-danger"
                                    >Cancelar</Link
                                >
                                <button
                                    class="btn btn-success"
                                    :disabled="enviando || errorPass"
                                >
                                    <span
                                        v-text="
                                            enviando
                                                ? 'Registrando...'
                                                : 'Registrar'
                                        "
                                    ></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body" v-else>
                    <div class="row">
                        <div class="col-12">
                            <p class="mb-0 w-100 text-center">
                                <strong>Potulante: </strong
                                >{{ postulante.full_name }}
                            </p>
                        </div>
                        <div class="col-12 text-center">
                            <h4 class="w-100 text-center">
                                Ya se realizó el proceso de registro.
                            </h4>
                            <button
                                class="btn btn-principal"
                                @click.prevent="muestra_formulario = true"
                            >
                                Inicie sesión aquí
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <FormLogin
            :muestra_formulario="muestra_formulario"
            @cerrar-formulario="muestra_formulario = false"
        ></FormLogin>
    </div>
</template>

<style scoped>
.img_logo {
    width: 120px;
}
.contenedor {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: var(--bg5);
}
</style>
