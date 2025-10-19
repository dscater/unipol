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
                    <!-- CONTACTOS -->
                    <div class="col-12">
                        <div class="container">
                            <h2 class="titulo-seccion text-center">
                                CONTACTOS
                            </h2>
                        </div>
                    </div>
                    <div class="col-12 py-5">
                        <div class="container">
                            <h4 class="subtitulo-seccion">Dirección:</h4>
                            <p>
                                Dpto. de Cochabamba, Prov. Chapare, Municipio de
                                Sacaba, Z/ Chimboco, Av. Barrientos km 12
                                1/2, S/N
                            </p>
                        </div>
                    </div>
                    <div class="col-12">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d531.6952515246761!2d-66.0432055!3d-17.3933413!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93e37a0bd3855283%3A0x41c66121a7760d48!2sEscuela%20Basica%20Policial%20de%20M%C3%BAsica!5e1!3m2!1ses-419!2sbo!4v1760898201793!5m2!1ses-419!2sbo"
                            width="100%"
                            height="450"
                            style="border: 0"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                        ></iframe>
                    </div>
                    <div class="col-12 py-4">
                        <div class="container redes_sociales">
                            <h4 class="subtitulo-seccion">
                                Nuestras redes sociales
                            </h4>
                            <a
                                href="https://www.facebook.com/profile.php?id=100083387019121"
                                target="_blank"
                                ><i class="fab fa-facebook"></i
                            ></a>
                            <a
                                href="https://www.tiktok.com/@esbapolmus?_t=ZM-90QzCZQG1Oa&_r=1"
                                target="_blank"
                                ><i class="fab fa-tiktok"></i
                            ></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.img_admicion {
    height: 50px;
}
.redes_sociales {
    text-align: center;
}
.redes_sociales a {
    color: white;
    margin: 10px;
    font-size: 2em;
}

.redes_sociales a i {
    transition: 0.3s;
}

.redes_sociales a:hover i {
    transform: scale(1.1);
}
</style>
