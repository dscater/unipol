<script setup>
import Content from "@/Components/Content.vue";
import { Head, Link, usePage, useForm } from "@inertiajs/vue3";
import { ref, onMounted, onBeforeMount, computed } from "vue";
import { useAppStore } from "@/stores/aplicacion/appStore";
import VerArchivos from "./VerArchivos.vue";
const { props: props_page } = usePage();
const appStore = useAppStore();

onBeforeMount(() => {
    appStore.startLoading();
});

onMounted(async () => {
    appStore.stopLoading();
});

const sCI = ref("");
const resultados = ref([]);
const buscarPostulantes = () => {
    axios
        .get(route("postulantes.listadoByCi"), {
            params: {
                ci: sCI.value,
            },
        })
        .then((response) => {
            resultados.value = response.data.postulantes;
        })
        .catch((error) => {
            console.log(error);
            resultados.value = [];
        });
};

const actualizado = () => {
    muestraArchivos.value = false;
    buscarPostulantes();
};

const oPostulante = ref(null);
const muestraArchivos = ref(false);
const verRequisito = (item) => {
    oPostulante.value = item;
    muestraArchivos.value = true;
};

const aprobarInscripcion = (id) => {
    Swal.fire({
        icon: "question",
        title: "Aprobar",
        html: `¿Esta seguro(a) de aprobar esta Inscripción?`,
        showCancelButton: true,
        confirmButtonText: "Si, aprobar",
        cancelButtonText: "Cancelar",
        denyButtonText: `Cancelar`,
        customClass: {
            confirmButton: "btn-success",
        },
    }).then(async (result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            axios
                .post(route("requisitos.aprobarInscripcion", id), {
                    _method: "patch",
                })
                .then((response) => {
                    const success = `Registro actualizado correctamente`;
                    Swal.fire({
                        icon: "success",
                        title: "Correcto",
                        html: `<strong>${success}</strong>`,
                        confirmButtonText: `Aceptar`,
                        customClass: {
                            confirmButton: "btn-alert-success",
                        },
                    });
                })
                .catch((error) => {
                    const errorMsg =
                        "Ocurrió un error, no se pudo actualizar el registro";
                    Swal.fire({
                        icon: "info",
                        title: "Error",
                        html: `<strong>${errorMsg}</strong>`,
                        confirmButtonText: `Aceptar`,
                        customClass: {
                            confirmButton: "btn-error",
                        },
                    });
                })
                .finally(() => {
                    buscarPostulantes();
                });
        }
    });
};
</script>
<template>
    <Head title="Verificación de requisitos"></Head>

    <Content>
        <template #header>
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Verificación de requisitos</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <Link :href="route('inicio')">Inicio</Link>
                        </li>
                        <li class="breadcrumb-item active">
                            Verificación de requisitos
                        </li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </template>

        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <label for=""
                                            >Ingresar Nro. de C.I.</label
                                        >
                                        <div
                                            class="input-group form-floating mt-3"
                                        >
                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder="Ej.: 6355555"
                                                v-model="sCI"
                                                @keypress.enter="
                                                    buscarPostulantes
                                                "
                                            />
                                            <button
                                                class="btn btn-principal rounded-0"
                                                type="button"
                                                @click="buscarPostulantes"
                                            >
                                                Buscar
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12" v-if="resultados.length > 0">
                <div class="row" v-for="item in resultados">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2 text-center">
                                        <div class="contenedor_foto">
                                            <img
                                                :src="item.url_foto"
                                                alt="foto"
                                                class="foto"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <strong class="mb-1">{{
                                                    item.full_name
                                                }}</strong>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="mb-1">
                                                    <strong>Unidad: </strong
                                                    >{{ item.unidad }}
                                                </p>
                                                <p class="mb-1">
                                                    <strong
                                                        >Lugar de Inscripción: </strong
                                                    >{{ item.lugar_preins }}
                                                </p>
                                                <p class="mb-1">
                                                    <strong>C.I.: </strong
                                                    >{{ item.full_ci }}
                                                </p>
                                                <p class="mb-1">
                                                    <strong>Estado: </strong>
                                                    <span
                                                        class="badge"
                                                        :class="[
                                                            item.estado ==
                                                            'INSCRITO'
                                                                ? 'badge-success'
                                                                : 'badge-info',
                                                        ]"
                                                    >
                                                        {{ item.estado }}
                                                    </span>
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="mb-1">
                                                    <strong
                                                        >Fecha de Nacimiento: </strong
                                                    >{{ item.fecha_nac_t }}
                                                </p>
                                                <p class="mb-1">
                                                    <strong>Celular: </strong
                                                    >{{ item.cel }}
                                                </p>
                                                <p class="mb-1">
                                                    <strong>Correo: </strong
                                                    >{{ item.correo }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <button
                                            class="btn btn-principal mb-2 w-100"
                                            @click="verRequisito(item)"
                                            v-if="item?.requisito"
                                        >
                                            <i class="fa fa-eye"></i> Ver
                                            Archivos
                                        </button>
                                        <span
                                            v-else
                                            class="bg-gray p-2 w-100 d-block text-center"
                                            >No se cargaron archivos</span
                                        >
                                        <button
                                            class="btn btn-success w-100"
                                            @click="aprobarInscripcion(item.id)"
                                            v-if="
                                                item?.requisito &&
                                                item.estado == 'PREINSCRITO'
                                            "
                                        >
                                            <i class="fa fa-check"></i> Aprobar
                                            Inscripción
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12" v-else>
                <div class="card">
                    <div class="card-body">
                        <h4 class="w-100 text-center">No hay resultados</h4>
                    </div>
                </div>
            </div>
        </div>
        <VerArchivos
            :muestra_formulario="muestraArchivos"
            :postulante="oPostulante"
            @cerrar-formulario="muestraArchivos = false"
            @envio-formulario="actualizado"
        ></VerArchivos>
    </Content>
</template>
<style scoped>
.contenedor_foto {
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.foto {
    position: relative;
    min-height: 90px;
    max-width: 80%;
    border-radius: 50%;
    border: solid 1px var(--bg5);
    margin: auto;
}
</style>
