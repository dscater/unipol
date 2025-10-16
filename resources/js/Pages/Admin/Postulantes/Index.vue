<script setup>
import Content from "@/Components/Content.vue";
import MiTable from "@/Components/MiTable.vue";
import { Head, Link, usePage } from "@inertiajs/vue3";
import { usePostulantes } from "@/composables/postulantes/usePostulantes";
import { ref, onMounted, onBeforeMount } from "vue";
import { useAppStore } from "@/stores/aplicacion/appStore";
import { useAxios } from "@/composables/axios/useAxios";
const { props: props_page } = usePage();
const appStore = useAppStore();
const { axiosDelete } = useAxios();

onBeforeMount(() => {
    appStore.startLoading();
});

const { setPostulante, limpiarPostulante } = usePostulantes();

const miTable = ref(null);
const headers = [
    {
        label: "UNIDAD",
        key: "unidad",
        sortable: true,
        fixed: true,
    },
    {
        label: "ESTADO",
        key: "estado",
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
        key: "full_name",
        sortable: true,
        fixed: true,
    },
    {
        label: "C.I.",
        key: "full_ci",
        sortable: true,
    },
    {
        label: "FECHA DE NACIMIENTO",
        key: "fecha_nac_t",
    },
    {
        label: "CELULAR",
        key: "cel",
    },
    {
        label: "CORREO",
        key: "correo",
        sortable: true,
    },
    {
        label: "NRO. CUENTA",
        key: "nro_cuenta",
        sortable: true,
    },
    {
        label: "LUGAR DE PREINSCRIPCIÓN",
        key: "lugar_preins",
        sortable: true,
    },
    {
        label: "OBSERVACIÓN",
        key: "observacion",
        sortable: true,
    },
    {
        label: "ACCESO",
        key: "acceso",
        keySortable: "acceso",
        sortable: true,
        width: "11%",
    },
];

const multiSearch = ref({
    search: "",
    filtro: [],
});

const accion_formulario = ref(0);
const muestra_formulario = ref(false);
const accion_formulario_pass = ref(0);
const muestra_formulario_pass = ref(false);

const agregarRegistro = () => {
    limpiarPostulante();
    accion_formulario.value = 0;
    muestra_formulario.value = true;
};

const updateDatatable = async () => {
    if (miTable.value) {
        await miTable.value.cargarDatos();
        muestra_formulario.value = false;
    }
};

const eliminarPostulante = (item) => {
    Swal.fire({
        title: "¿Quierés eliminar este registro?",
        html: `<strong>${item.full_name}</strong>`,
        showCancelButton: true,
        confirmButtonText: "Si, eliminar",
        cancelButtonText: "No, cancelar",
        denyButtonText: `No, cancelar`,
        customClass: {
            confirmButton: "btn-danger",
        },
    }).then(async (result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            let respuesta = await axiosDelete(
                route("postulantes.destroy", item.id)
            );
            if (respuesta && respuesta.sw) {
                updateDatatable();
            }
        }
    });
};

onMounted(async () => {
    appStore.stopLoading();
});
</script>
<template>
    <Head title="Lista Postulantes"></Head>

    <Content>
        <template #header>
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Lista Postulantes</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <Link :href="route('inicio')">Inicio</Link>
                        </li>
                        <li class="breadcrumb-item active">
                            Lista Postulantes
                        </li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </template>

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <Link
                            v-if="
                                props_page.auth?.user.permisos == '*' ||
                                props_page.auth?.user.permisos.includes(
                                    'postulantes.preinscripcion'
                                )
                            "
                            class="btn btn-success"
                            :href="route('postulantes.preinscripcion')"
                        >
                            <i class="fa fa-plus"></i> Preinscripción
                        </Link>
                    </div>
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
                <div class="row">
                    <div class="col-12">
                        <MiTable
                            :tableClass="'bg-white mitabla'"
                            ref="miTable"
                            :cols="headers"
                            :api="true"
                            :url="route('postulantes.paginado')"
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
                                    :class="{
                                        'bg-success': (item.user.estado =
                                            'INSCRITO'),
                                        'bg-gray': (item.user.estado =
                                            'PREINSCRITO'),
                                    }"
                                >
                                    {{ item.user.estado }}
                                </div>
                            </template>
                            <template #foto="{ item }">
                                <img
                                    class="direct-chat-img"
                                    :src="item.url_foto"
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
                            <!-- <template #accion="{ item }">
                                <el-tooltip
                                    class="box-item"
                                    effect="dark"
                                    content="Eliminar"
                                    placement="left-start"
                                >
                                    <button
                                        class="btn btn-danger"
                                        @click="eliminarPostulante(item)"
                                        v-if="
                                            props_page.auth?.user.permisos ==
                                                '*' ||
                                            props_page.auth?.user.permisos.includes(
                                                'postulantes.destroy'
                                            )
                                        "
                                    >
                                        <i class="fa fa-trash-alt"></i></button
                                ></el-tooltip>
                            </template> -->
                        </MiTable>
                    </div>
                </div>
            </div>
        </div>
    </Content>
</template>
