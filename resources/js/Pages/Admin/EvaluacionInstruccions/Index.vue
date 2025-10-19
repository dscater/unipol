<script setup>
import Content from "@/Components/Content.vue";
import { Head, Link, usePage, useForm } from "@inertiajs/vue3";
import { ref, onMounted, onBeforeMount, computed } from "vue";
import { useAppStore } from "@/stores/aplicacion/appStore";
import MiTable from "@/Components/MiTable.vue";
const { props: props_page } = usePage();
const appStore = useAppStore();

onBeforeMount(() => {
    appStore.startLoading();
});

onMounted(async () => {
    appStore.stopLoading();
});

const descargar = () => {
    const url = route("evaluacion_instruccions.descargar");
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
            route("evaluacion_instruccions.subir"),
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
        updateDatatable();
    } catch (error) {
        inputArchivo.value.value = null;
        archivo.value = null;
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

const miTable = ref(null);
const headers = [
    {
        label: "UNIDAD",
        key: "postulante.unidad",
        sortable: true,
        fixed: true,
    },
    {
        label: "CÓDIGO PROSPECTO",
        key: "postulante.codigoPre",
        sortable: true,
        fixed: true,
    },
    {
        label: "C.I.",
        key: "postulante.full_ci",
        sortable: true,
        fixed: true,
    },
    {
        label: "FOTO",
        key: "foto",
        sortable: false,
        width: "3%",
        fixed: true,
    },
    {
        label: "NOMBRE POSTULANTE",
        key: "postulante.full_name",
        sortable: true,
        fixed: true,
    },
    {
        label: "SEXO",
        key: "postulante.genero",
    },
    {
        label: "FECHA DE NACIMIENTO",
        key: "postulante.fecha_nac_t",
    },
    {
        label: "CELULAR",
        key: "postulante.cel",
    },
    {
        label: "CORREO",
        key: "postulante.correo",
        sortable: true,
    },
    {
        label: "DONDE POSTULO",
        key: "postulante.lugar_preins",
        sortable: true,
    },
    {
        label: "NOTA",
        key: "nota",
        sortable: true,
    },
    {
        label: "RESULTADO",
        key: "descripcion",
        keySortable: "descripcion",
        sortable: true,
        width: "11%",
    },
];

const multiSearch = ref({
    search: "",
    filtro: [],
});

const updateDatatable = async () => {
    if (miTable.value) {
        await miTable.value.cargarDatos();
        muestra_formulario.value = false;
    }
};
</script>
<template>
    <Head title="Evaluación del Área de Instrucción Policial"></Head>

    <Content>
        <template #header>
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        Evaluación del Área de Instrucción Policial
                    </h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <Link :href="route('inicio')">Inicio</Link>
                        </li>
                        <li class="breadcrumb-item active">
                            Evaluación del Área de Instrucción Policial
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
            <div class="col-12">
                <div class="row">
                    <div class="col-md-8 my-1">
                        <div class="row justify-content-end">
                            <div class="col-md-5">
                                <div
                                    class="input-group"
                                    style="align-items: end"
                                >
                                    <input
                                        v-model="multiSearch.search"
                                        placeholder="Buscar"
                                        class="form-control border-1 border-right-0"
                                    />
                                    <div class="input-append">
                                        <button
                                            class="btn btn-default rounded-0 border-left-0"
                                            @click="updateDatos"
                                        >
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <MiTable
                    :tableClass="'bg-white mitabla'"
                    ref="miTable"
                    :cols="headers"
                    :api="true"
                    :url="route('evaluacion_fisicas.paginado')"
                    :numPages="5"
                    :multiSearch="multiSearch"
                    :syncOrderBy="'id'"
                    :syncOrderAsc="'DESC'"
                    table-responsive
                    :header-class="'bg__primary'"
                    fixed-header
                >
                    <template #estado="{ item }">
                        <div
                            class="badge text-sm text-wrap"
                            :class="[
                                item.estado == 'INSCRITO'
                                    ? 'badge-success'
                                    : 'bg-gray',
                            ]"
                        >
                            {{ item.estado }}
                        </div>
                    </template>
                    <template #foto="{ item }">
                        <img
                            class="direct-chat-img"
                            :src="item.postulante.url_foto"
                            alt="Foto"
                        />
                    </template>

                    <template #acceso="{ item }">
                        <div
                            class="badge text-sm"
                            :class="[
                                item.user.acceso == 1
                                    ? 'bg-success'
                                    : 'bg-danger',
                            ]"
                        >
                            {{
                                item.user.acceso == 1
                                    ? "HABILITADO"
                                    : "DESHABILITADO"
                            }}
                        </div>
                    </template>
                </MiTable>
            </div>
        </div>
    </Content>
</template>
<style scoped>
.fileCargar {
    display: none;
}
</style>
