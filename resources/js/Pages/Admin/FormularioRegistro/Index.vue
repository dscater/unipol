<script>
import Login from "@/Layouts/Login.vue";
import { onMounted, ref } from "vue";
export default {
    layout: Login,
};
</script>
<script setup>
import { Head, Link, router, useForm, usePage } from "@inertiajs/vue3";
import { useConfiguracion } from "@/composables/configuracion/useConfiguracion";
import FormLogin from "@/Pages/Auth/FormLogin.vue";
const { url_assets } = usePage().props;
const { oConfiguracion } = useConfiguracion();
const propsForm = defineProps({
    postulante: {
        type: Object,
        default: null,
    },
});
const muestra_formulario = ref(false);
const form = useForm({
    ci: "",
    codigo: "",
});
const enviando = ref(false);

const submit = () => {
    enviando.value = true;
    let url = route("formularioRegistro.store", propsForm.postulante.id);
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
                    confirmButton: "btn-alert-success",
                },
            });
        },
        onError: (err, code) => {
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
                <div class="card-body" v-if="postulante.ecodigo == 0">
                    <form @submit.prevent="submit">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="w-100 text-center">
                                    Finalizar Registro
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
                                    <span class="input-group-text bg-principal">
                                        <i class="fa fa-id-card"></i>
                                    </span>
                                    <input
                                        type="text"
                                        name="ci"
                                        class="form-control fs-13px h-45p"
                                        v-model="form.ci"
                                        autocomplete="false"
                                        placeholder="Contraseña"
                                    />
                                    <label
                                        for="ci"
                                        class="d-flex align-items-center text-gray-600 fs-13px ml-5"
                                        style="z-index: 100"
                                        >Número de Carnet</label
                                    >
                                </div>
                                <ul
                                    v-if="form.errors?.ci"
                                    class="text-danger list-unstyled mb-0"
                                >
                                    <li class="parsley-required">
                                        {{ form.errors?.ci }}
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12">
                                <div class="input-group form-floating mt-3">
                                    <span class="input-group-text bg-principal">
                                        <i class="fa fa-key"></i>
                                    </span>
                                    <input
                                        type="password"
                                        name="codigo"
                                        class="form-control fs-13px h-45p"
                                        v-model="form.codigo"
                                        autocomplete="false"
                                        placeholder="Código de Preinscripción"
                                    />
                                    <label
                                        for="codigo"
                                        class="d-flex align-items-center text-gray-600 fs-13px ml-5"
                                        style="z-index: 100"
                                        >Código de Preinscripción</label
                                    >
                                </div>
                                <ul
                                    v-if="form.errors?.codigo"
                                    class="text-danger list-unstyled mb-0"
                                >
                                    <li class="parsley-required">
                                        {{ form.errors?.codigo }}
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
                                    @click="submit"
                                    :disabled="enviando"
                                >
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body" v-else>
                    <div class="row" v-if="postulante.epass == 1">
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
                    <div class="row" v-else>
                        <div class="col-12">
                            <p class="mb-0 w-100 text-center">
                                <strong>Potulante: </strong
                                >{{ postulante.full_name }}
                            </p>
                        </div>
                        <div class="col-12 text-center">
                            <h4 class="w-100 text-center">
                                Debes registrar tu nueva contraseña y cargar tu
                                fotografía.
                            </h4>
                            <Link
                                class="btn btn-principal"
                                :href="
                                    route(
                                        'formularioRegistro.registro',
                                        postulante.id
                                    )
                                "
                            >
                                Haz click aquí
                            </Link>
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
