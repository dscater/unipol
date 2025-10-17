<script setup>
import Content from "@/Components/Content.vue";
import { Head, Link, usePage, useForm } from "@inertiajs/vue3";
import { ref, onMounted, onBeforeMount, computed } from "vue";
import { useAppStore } from "@/stores/aplicacion/appStore";
const { props: props_page } = usePage();
const appStore = useAppStore();

onBeforeMount(() => {
    appStore.startLoading();
});

onMounted(async () => {
    appStore.stopLoading();
});

const descargar = () => {
    const url = route("evaluacion_medicas.descargar");
    window.open(url, "_blank");
};

const archivo = ref(null);
const subiendo = ref(false);
const inputArchivo = ref(null);
const cargarArchivo = (e) => {
    archivo.value = e.target.files[0];
};
const subirArchivo = async () => {
    const formData = new FormData();
    formData.append("archivo", archivo.value);
    try {
        const response = await axios.post(
            route("evaluacion_medicas.subir"),
            formData,
            {
                headers: {
                    "Content-Type": "multipart/form-data",
                },
            }
        );

        console.log("Archivo subido correctamente:", response.data);
        inputArchivo.value.value = null;
        archivo.value = null;
        Swal.fire({
            icon: "success",
            title: "Correcto",
            html: `<strong>Archivo subido correctamente</strong>`,
            confirmButtonText: `Aceptar`,
            customClass: {
                confirmButton: "btn-alert-success",
            },
        });
    } catch (error) {
        console.error("Error al subir el archivo:", error);
        console.log(error.response);
        if (
            error.response &&
            error.response.data &&
            error.response.data.message
        ) {
            Swal.fire({
                icon: "error",
                title: "Error",
                html: `<strong>${error.response.data.message}</strong>`,
                confirmButtonText: `Aceptar`,
                customClass: {
                    confirmButton: "btn-error",
                },
            });
        } else {
            Swal.fire({
                icon: "error",
                title: "Error",
                html: `<strong>Error al subir el archivo</strong>`,
                confirmButtonText: `Aceptar`,
                customClass: {
                    confirmButton: "btn-error",
                },
            });
        }
    }
};

const txtSubir = computed(() => {
    if (subiendo.value) {
        return `<i class="fa fa-spin fa-spinner"></i> Subiendo`;
    }
    return `<i class="fa fa-upload fa-spinner"></i> Subir`;
});
</script>
<template>
    <Head title="Evaluación Médica"></Head>

    <Content>
        <template #header>
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Evaluación Médica</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <Link :href="route('inicio')">Inicio</Link>
                        </li>
                        <li class="breadcrumb-item active">
                            Evaluación Médica
                        </li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </template>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <p class="mb-1 font-weight-bold">Pasos</p>
                        <p class="mb-0">
                            <b>1)</b> Descargar postulantes inscritos
                            <b>2)</b> Llenar los campos <b>3)</b> Cargar el
                            archivo
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <button
                                    class="btn btn-success w-100"
                                    @click="descargar"
                                >
                                    Descargar lista de postulantes
                                    <i class="fa fa-file-excel"></i>
                                </button>
                            </div>
                            <div class="col-md-4 text-center">
                                <label
                                    class="btn w-100"
                                    :class="[
                                        archivo
                                            ? 'btn-principal'
                                            : 'btn-outline-principal',
                                    ]"
                                    for="fileCargar"
                                >
                                    Cargar archivo
                                    <i class="fa fa-file-excel"></i>
                                </label>
                                <input
                                    type="file"
                                    id="fileCargar"
                                    class="fileCargar"
                                    ref="inputArchivo"
                                    @change="cargarArchivo($event)"
                                />
                                <button
                                    v-if="archivo"
                                    class="btn btn-default"
                                    type="button"
                                    @click="subirArchivo"
                                    v-html="txtSubir"
                                    :disabled="subiendo"
                                ></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Content>
</template>
<style scoped>
.fileCargar {
    display: none;
}
</style>
