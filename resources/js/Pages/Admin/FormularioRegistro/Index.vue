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
const { props } = usePage();
const { url_assets } = usePage().props;
const { oConfiguracion } = useConfiguracion();
const propsForm = defineProps({
    postulante: {
        type: Object,
        default: null,
    },
});
const form = useForm({
    ci: "",
    codigo: "",
});

const submit = () => {
    axios
        .post(route("login"), form)
        .then((response) => {
            form.reset("password");
            if (response.data.user.role_id != 2) {
                router.get(route("inicio"));
            } else {
                window.location.reload();
            }
        })
        .catch((error) => {
            console.log(error.response);
            if (error.response.data.errors) {
                const errors = error.response.data.errors;
                form.errors = {};
                for (const field in errors) {
                    if (errors.hasOwnProperty(field)) {
                        form.errors[field] = errors[field][0]; // Asignar solo el primer error
                    }
                }
            }
        });

    // form.post(route("login"), {
    //     onFinish: () => {
    //         window.location.reload();
    //     },
    // });
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
                <div class="card-body">
                    <form @submit.prevent="submit">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="w-100 text-center">
                                    Finalizar Registro
                                </h4>
                            </div>
                            <div class="col-12">
                                <div class="input-group form-floating mt-3">
                                    <button
                                        class="btn btn-default"
                                        type="button"
                                    >
                                        <i class="fa fa-id-card"></i>
                                    </button>
                                    <input
                                        type="password"
                                        name="password"
                                        class="form-control fs-13px h-45p"
                                        v-model="form.password"
                                        autocomplete="false"
                                        placeholder="Contraseña"
                                    />

                                    <label
                                        for="password"
                                        class="d-flex align-items-center text-gray-600 fs-13px ml-5"
                                        style="z-index: 100"
                                        >Número de Carnet</label
                                    >
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group form-floating mt-3">
                                    <button
                                        class="btn btn-default"
                                        type="button"
                                    >
                                        <i class="fa fa-key"></i>
                                    </button>
                                    <input
                                        type="password"
                                        name="password"
                                        class="form-control fs-13px h-45p"
                                        v-model="form.password"
                                        autocomplete="false"
                                        placeholder="Contraseña"
                                    />

                                    <label
                                        for="password"
                                        class="d-flex align-items-center text-gray-600 fs-13px ml-5"
                                        style="z-index: 100"
                                        >Código de Preinscripción</label
                                    >
                                </div>
                            </div>
                            <div
                                class="col-12 justify-content-between d-flex pt-3"
                            >
                                <Link
                                    :href="route('portal.index')"
                                    class="btn btn-danger"
                                    >Cancelar</Link
                                >
                                <button class="btn btn-success">
                                    Ingresar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
