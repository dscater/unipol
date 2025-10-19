<script>
import Portal from "@/Layouts/Portal.vue";
export default {
    layout: Portal,
};
</script>
<script setup>
import { onMounted, ref } from "vue";
import { Link, usePage, router } from "@inertiajs/vue3";
import { useAxios } from "@/composables/axios/useAxios";
import { useConfiguracion } from "@/composables/configuracion/useConfiguracion";
import FormLogin from "@/Pages/Auth/FormLogin.vue";
import { useAppStore } from "@/stores/aplicacion/appStore";
import NavBar from "./Parcial/Navbar.vue";
import Footer from "./Parcial/Footer.vue";
import MiPaginacion from "@/Components/MiPaginacion.vue";
const appStore = useAppStore();
const { oConfiguracion } = useConfiguracion();
const { props: props_page } = usePage();
const user = ref(props_page.auth?.user);
const url_asset = ref(props_page.url_assets);
const comunicados = ref([]);
const total = ref([]);

const getComunicados = () => {
    axios
        .get(route("anapol.getComunicados"), {
            params: {
                page: currentPage.value,
            },
        })
        .then((response) => {
            console.log(response.data);
            comunicados.value = response.data.comunicados.data;
            total.value = response.data.comunicados.total;
        });
};

const currentPage = ref(1);

const cambioPagina = (val) => {
    console.log(val);
    currentPage.value = val;
    getComunicados();
};
onMounted(() => {
    getComunicados();
});
</script>
<template>
    <div class="container-fluid pagina">
        <div class="row bg-principal p-2 pt-4 pb-4">
            <div class="col-12 text-center">
                <img
                    :src="url_asset + '/imgs/ADMINICION.png'"
                    alt="admicion"
                    class="img_admicion"
                />
            </div>
        </div>
        <div class="row">
            <div class="col-12 p-0">
                <NavBar></NavBar>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row contenedor_secciones">
                    <!-- COMUNICADOS -->
                    <div class="col-12">
                        <div class="container">
                            <h2 class="titulo-seccion">COMUNICADOS</h2>
                            <div class="row" v-if="comunicados.length > 0">
                                <div class="col-12" v-for="item in comunicados">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img
                                                        :src="item.url_imagen"
                                                        alt=""
                                                    />
                                                </div>
                                                <div class="col-md-8">
                                                    {{ item.descripcion }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <MiPaginacion
                                        :current-page="currentPage"
                                        per-page="10"
                                        :total-data="total"
                                        @update-page="cambioPagina"
                                    ></MiPaginacion>
                                </div>
                            </div>
                            <div class="row" v-else>
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="w-100 text-center">
                                                NO SE ENCONTRARÓN COMUNICADOS
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <Footer></Footer>
</template>

<style scoped>
img {
    max-width: 100%;
    height: 80%;
}
</style>
