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
import Footer from "@/Pages/Portal/Anapol/Parcial/Footer.vue";
const appStore = useAppStore();
const { oConfiguracion } = useConfiguracion();
const { props: props_page } = usePage();
const user = ref(props_page.auth?.user);
const url_asset = ref(props_page.url_assets);

const accion_formulario = ref(0);
const muestra_formulario = ref(false);

const listItems = ref([
    {
        tipo: "img",
        ruta: "/imgs/F12 COD 001.jpg",
    },
    {
        tipo: "video",
        ruta: "/videos/video1.mp4",
    },
]);

onMounted(() => {});
</script>
<template>
    <div class="container-fluid">
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
                    <!-- AUTORIDADES -->
                    <div class="col-12 py-5">
                        <div class="container">
                            <h2 class="titulo-seccion">NUESTRAS AUTORIDADES</h2>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img
                                            :src="
                                                url_asset +
                                                '/imgs/F1 COD 001.jpg'
                                            "
                                            alt=""
                                        />
                                    </div>
                                    <div class="col-md-8">
                                        <h5 class="subtitulo-seccion">
                                            MENSAJE DEL SEÑOR COMANDANTE GENERAL
                                            DE LA POLICÍA BOLIVIANA
                                        </h5>
                                        Lorem Ipsum is simply dummy text of the
                                        printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard
                                        dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type
                                        and scrambled it to make a type specimen
                                        book. It has survived not only five
                                        centuries, but also the leap into
                                        electronic typesetting, remaining
                                        essentially unchanged. It was
                                        popularised in the 1960s with the
                                        release of Letraset sheets containing
                                        Lorem Ipsum passages, and more recently
                                        with desktop publishing software like
                                        Aldus PageMaker including versions of
                                        Lorem Ipsum
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-8">
                                        <h5 class="subtitulo-seccion">
                                            MENSAJE DEL MAGNIFICO RECTOR DE LA
                                            UNIPOL
                                        </h5>
                                        Lorem Ipsum is simply dummy text of the
                                        printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard
                                        dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type
                                        and scrambled it to make a type specimen
                                        book. It has survived not only five
                                        centuries, but also the leap into
                                        electronic typesetting, remaining
                                        essentially unchanged. It was
                                        popularised in the 1960s with the
                                        release of Letraset sheets containing
                                        Lorem Ipsum passages, and more recently
                                        with desktop publishing software like
                                        Aldus PageMaker including versions of
                                        Lorem Ipsum
                                    </div>
                                    <div class="col-md-4">
                                        <img
                                            :src="
                                                url_asset +
                                                '/imgs/F1 COD 001.jpg'
                                            "
                                            alt=""
                                        />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <img
                                            :src="
                                                url_asset +
                                                '/imgs/F1 COD 001.jpg'
                                            "
                                            alt=""
                                        />
                                    </div>
                                    <div class="col-md-8">
                                        <h5 class="subtitulo-seccion">
                                            MENSAJE DE LOS SEÑORES DIRECTORES DE
                                            LA FATESCIPOL
                                        </h5>
                                        Lorem Ipsum is simply dummy text of the
                                        printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard
                                        dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type
                                        and scrambled it to make a type specimen
                                        book. It has survived not only five
                                        centuries, but also the leap into
                                        electronic typesetting, remaining
                                        essentially unchanged. It was
                                        popularised in the 1960s with the
                                        release of Letraset sheets containing
                                        Lorem Ipsum passages, and more recently
                                        with desktop publishing software like
                                        Aldus PageMaker including versions of
                                        Lorem Ipsum
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-8">
                                        <h5 class="subtitulo-seccion">
                                            MENSAJE DEL SEÑOR SUBOFICIAL DE
                                            ESTADO MAYOR
                                        </h5>
                                        Lorem Ipsum is simply dummy text of the
                                        printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard
                                        dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type
                                        and scrambled it to make a type specimen
                                        book. It has survived not only five
                                        centuries, but also the leap into
                                        electronic typesetting, remaining
                                        essentially unchanged. It was
                                        popularised in the 1960s with the
                                        release of Letraset sheets containing
                                        Lorem Ipsum passages, and more recently
                                        with desktop publishing software like
                                        Aldus PageMaker including versions of
                                        Lorem Ipsum
                                    </div>
                                    <div class="col-md-4">
                                        <img
                                            :src="
                                                url_asset +
                                                '/imgs/F1 COD 001.jpg'
                                            "
                                            alt=""
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- VALORES Y PRINCIPIOS DEL CADETE -->
                    <div class="col-12 py-5">
                        <div class="container">
                            <h2 class="titulo-seccion">
                                VALORES Y PRINCIPIOS DEL CADETE
                            </h2>

                            <div class="row">
                                <div class="col-md-4">
                                    <img
                                        :src="
                                            url_asset + '/imgs/F2 COD 001.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-md-8">
                                    <h5 class="subtitulo-seccion">
                                        What is Lorem Ipsum
                                    </h5>
                                    Lorem Ipsum is simply dummy text of the
                                    printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy
                                    text ever since the 1500s, when an unknown
                                    printer took a galley of type and scrambled
                                    it to make a type specimen book. It has
                                    survived not only five centuries, but also
                                    the leap into electronic typesetting,
                                    remaining essentially unchanged. It was
                                    popularised in the 1960s with the release of
                                    Letraset sheets containing Lorem Ipsum
                                    passages, and more recently with desktop
                                    publishing software like Aldus PageMaker
                                    including versions of Lorem Ipsum
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- RESEÑA HISTORICA -->
                    <div class="col-12 py-5">
                        <div class="container">
                            <h2 class="titulo-seccion">RESEÑA HISTORICA</h2>
                            <div class="row">
                                <div class="col-md-4">
                                    <img
                                        :src="
                                            url_asset + '/imgs/F4 COD 001.png'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-md-8">
                                    <h5 class="subtitulo-seccion">
                                        What is Lorem Ipsum
                                    </h5>
                                    Lorem Ipsum is simply dummy text of the
                                    printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy
                                    text ever since the 1500s, when an unknown
                                    printer took a galley of type and scrambled
                                    it to make a type specimen book. It has
                                    survived not only five centuries, but also
                                    the leap into electronic typesetting,
                                    remaining essentially unchanged. It was
                                    popularised in the 1960s with the release of
                                    Letraset sheets containing Lorem Ipsum
                                    passages, and more recently with desktop
                                    publishing software like Aldus PageMaker
                                    including versions of Lorem Ipsum
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="subtitulo-seccion">
                                        What is Lorem Ipsum
                                    </h5>
                                    Lorem Ipsum is simply dummy text of the
                                    printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy
                                    text ever since the 1500s, when an unknown
                                    printer took a galley of type and scrambled
                                    it to make a type specimen book. It has
                                    survived not only five centuries, but also
                                    the leap into electronic typesetting,
                                    remaining essentially unchanged. It was
                                    popularised in the 1960s with the release of
                                    Letraset sheets containing Lorem Ipsum
                                    passages, and more recently with desktop
                                    publishing software like Aldus PageMaker
                                    including versions of Lorem Ipsum
                                </div>
                                <div class="col-md-4">
                                    <img
                                        :src="
                                            url_asset + '/imgs/F5 COD 001.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- HIMNOS -->
                    <div class="col-12 py-5">
                        <div class="container">
                            <h2 class="titulo-seccion">HIMNOS</h2>
                            <div class="row">
                                <div class="col-md-4">
                                    <img
                                        :src="
                                            url_asset + '/imgs/F6 COD 001.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-md-8">
                                    <h5 class="subtitulo-seccion">
                                        What is Lorem Ipsum
                                    </h5>
                                    Lorem Ipsum is simply dummy text of the
                                    printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy
                                    text ever since the 1500s, when an unknown
                                    printer took a galley of type and scrambled
                                    it to make a type specimen book. It has
                                    survived not only five centuries, but also
                                    the leap into electronic typesetting,
                                    remaining essentially unchanged. It was
                                    popularised in the 1960s with the release of
                                    Letraset sheets containing Lorem Ipsum
                                    passages, and more recently with desktop
                                    publishing software like Aldus PageMaker
                                    including versions of Lorem Ipsum
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- MISIÓN Y VISIÓN -->
                    <div class="col-12 py-5">
                        <div class="container">
                            <h2 class="titulo-seccion">MISIÓN Y VISIÓN</h2>
                            <div class="row">
                                <div class="col-md-4">
                                    <img
                                        :src="
                                            url_asset + '/imgs/F7 COD 001.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-md-8">
                                    <h5 class="subtitulo-seccion">Misión</h5>
                                    Lorem Ipsum is simply dummy text of the
                                    printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy
                                    text ever since the 1500s, when an unknown
                                    printer took a galley of type and scrambled
                                    it to make a type specimen book. It has
                                    survived not only five centuries, but also
                                    the leap into electronic typesetting,
                                    remaining essentially unchanged. It was
                                    popularised in the 1960s with the release of
                                    Letraset sheets containing Lorem Ipsum
                                    passages, and more recently with desktop
                                    publishing software like Aldus PageMaker
                                    including versions of Lorem Ipsum
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="subtitulo-seccion">Visión</h5>
                                    Lorem Ipsum is simply dummy text of the
                                    printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy
                                    text ever since the 1500s, when an unknown
                                    printer took a galley of type and scrambled
                                    it to make a type specimen book. It has
                                    survived not only five centuries, but also
                                    the leap into electronic typesetting,
                                    remaining essentially unchanged. It was
                                    popularised in the 1960s with the release of
                                    Letraset sheets containing Lorem Ipsum
                                    passages, and more recently with desktop
                                    publishing software like Aldus PageMaker
                                    including versions of Lorem Ipsum
                                </div>
                                <div class="col-md-4">
                                    <img
                                        :src="
                                            url_asset + '/imgs/F8 COD 001.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- PERFIL DE INGRESO -->
                    <div class="col-12 py-5">
                        <div class="container">
                            <h2 class="titulo-seccion">PERFIL DE INGRESO</h2>
                            <div class="row">
                                <div class="col-md-4">
                                    <img
                                        :src="
                                            url_asset + '/imgs/F9 COD 001.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-md-8">
                                    <h5 class="subtitulo-seccion">
                                        What is Lorem Ipsum
                                    </h5>
                                    Lorem Ipsum is simply dummy text of the
                                    printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy
                                    text ever since the 1500s, when an unknown
                                    printer took a galley of type and scrambled
                                    it to make a type specimen book. It has
                                    survived not only five centuries, but also
                                    the leap into electronic typesetting,
                                    remaining essentially unchanged. It was
                                    popularised in the 1960s with the release of
                                    Letraset sheets containing Lorem Ipsum
                                    passages, and more recently with desktop
                                    publishing software like Aldus PageMaker
                                    including versions of Lorem Ipsum
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FORMACIÓN PROFESIONAL -->
                    <div class="col-12 py-5">
                        <div class="container">
                            <h2 class="titulo-seccion">
                                FORMACIÓN PROFESIONAL
                            </h2>
                            <div class="row">
                                <div class="col-md-4">
                                    <img
                                        :src="
                                            url_asset + '/imgs/F10 COD 001.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-md-8">
                                    <h5 class="subtitulo-seccion">
                                        What is Lorem Ipsum
                                    </h5>
                                    Lorem Ipsum is simply dummy text of the
                                    printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy
                                    text ever since the 1500s, when an unknown
                                    printer took a galley of type and scrambled
                                    it to make a type specimen book. It has
                                    survived not only five centuries, but also
                                    the leap into electronic typesetting,
                                    remaining essentially unchanged. It was
                                    popularised in the 1960s with the release of
                                    Letraset sheets containing Lorem Ipsum
                                    passages, and more recently with desktop
                                    publishing software like Aldus PageMaker
                                    including versions of Lorem Ipsum
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- JERARQUIA INTERNA Y DISTINCIONES -->
                    <div class="col-12 py-5">
                        <div class="container">
                            <h2 class="titulo-seccion">
                                JERARQUIA INTERNA Y DISTINCIONES
                            </h2>
                            <div class="row">
                                <div class="col-md-4">
                                    <img
                                        :src="
                                            url_asset + '/imgs/F11 COD 001.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-md-8">
                                    <h5 class="subtitulo-seccion">
                                        What is Lorem Ipsum
                                    </h5>
                                    Lorem Ipsum is simply dummy text of the
                                    printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy
                                    text ever since the 1500s, when an unknown
                                    printer took a galley of type and scrambled
                                    it to make a type specimen book. It has
                                    survived not only five centuries, but also
                                    the leap into electronic typesetting,
                                    remaining essentially unchanged. It was
                                    popularised in the 1960s with the release of
                                    Letraset sheets containing Lorem Ipsum
                                    passages, and more recently with desktop
                                    publishing software like Aldus PageMaker
                                    including versions of Lorem Ipsum
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- BECAS AL EXTERIOR -->
                    <div class="col-12 py-5">
                        <div class="container">
                            <h2 class="titulo-seccion">BECAS AL EXTERIOR</h2>
                            <div class="row">
                                <div class="col-md-4">
                                    <img
                                        :src="
                                            url_asset + '/imgs/F12 COD 001.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-md-8">
                                    <h5 class="subtitulo-seccion">
                                        What is Lorem Ipsum
                                    </h5>
                                    Lorem Ipsum is simply dummy text of the
                                    printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy
                                    text ever since the 1500s, when an unknown
                                    printer took a galley of type and scrambled
                                    it to make a type specimen book. It has
                                    survived not only five centuries, but also
                                    the leap into electronic typesetting,
                                    remaining essentially unchanged. It was
                                    popularised in the 1960s with the release of
                                    Letraset sheets containing Lorem Ipsum
                                    passages, and more recently with desktop
                                    publishing software like Aldus PageMaker
                                    including versions of Lorem Ipsum
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- INFRAESTRUCTURA -->
                    <div class="col-12 py-5">
                        <div class="container">
                            <h2 class="titulo-seccion">INFRAESTRUCTURA</h2>
                            <div class="row">
                                <div class="col-md-4">
                                    <img
                                        :src="
                                            url_asset + '/imgs/F13 COD 001.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-md-8">
                                    <h5 class="subtitulo-seccion">
                                        What is Lorem Ipsum
                                    </h5>
                                    Lorem Ipsum is simply dummy text of the
                                    printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy
                                    text ever since the 1500s, when an unknown
                                    printer took a galley of type and scrambled
                                    it to make a type specimen book. It has
                                    survived not only five centuries, but also
                                    the leap into electronic typesetting,
                                    remaining essentially unchanged. It was
                                    popularised in the 1960s with the release of
                                    Letraset sheets containing Lorem Ipsum
                                    passages, and more recently with desktop
                                    publishing software like Aldus PageMaker
                                    including versions of Lorem Ipsum
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- TÍTULO PROFESIONAL -->
                    <div class="col-12 py-5">
                        <div class="container">
                            <h2 class="titulo-seccion">TÍTULO PROFESIONAL</h2>
                            <div class="row">
                                <div class="col-md-4">
                                    <img
                                        :src="
                                            url_asset + '/imgs/F14 COD 001.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-md-8">
                                    <h5 class="subtitulo-seccion">
                                        What is Lorem Ipsum
                                    </h5>
                                    Lorem Ipsum is simply dummy text of the
                                    printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy
                                    text ever since the 1500s, when an unknown
                                    printer took a galley of type and scrambled
                                    it to make a type specimen book. It has
                                    survived not only five centuries, but also
                                    the leap into electronic typesetting,
                                    remaining essentially unchanged. It was
                                    popularised in the 1960s with the release of
                                    Letraset sheets containing Lorem Ipsum
                                    passages, and more recently with desktop
                                    publishing software like Aldus PageMaker
                                    including versions of Lorem Ipsum
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="subtitulo-seccion">
                                        What is Lorem Ipsum
                                    </h5>
                                    Lorem Ipsum is simply dummy text of the
                                    printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy
                                    text ever since the 1500s, when an unknown
                                    printer took a galley of type and scrambled
                                    it to make a type specimen book. It has
                                    survived not only five centuries, but also
                                    the leap into electronic typesetting,
                                    remaining essentially unchanged. It was
                                    popularised in the 1960s with the release of
                                    Letraset sheets containing Lorem Ipsum
                                    passages, and more recently with desktop
                                    publishing software like Aldus PageMaker
                                    including versions of Lorem Ipsum
                                </div>
                                <div class="col-md-4">
                                    <img
                                        :src="
                                            url_asset + '/imgs/F15 COD 001.jpg'
                                        "
                                        alt=""
                                    />
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
.img_admicion {
    height: 50px;
}
</style>
