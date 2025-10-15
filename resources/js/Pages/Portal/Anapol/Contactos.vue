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
import NavBar from "@/Pages/Portal/Anapol/Parcial/Navbar.vue";
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
                    <div class="col-12">
                        <iframe
                            width="100%"
                            height="450"
                            style="border: 0"
                            loading="lazy"
                            allowfullscreen
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1dxxx!2d-68.0961685!3d-16.5410194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915f20d86919df05%3A0x1b71529ec45a9bbd!2sAcademia%20Nacional%20de%20Polic%C3%ADas!5e0!3m2!1ses!2sbo!4vXXXXXXXXXX"
                        ></iframe>
                    </div>
                    <div class="col-12 py-5">
                        <div class="container">
                            <h4 class="subtitulo-seccion">Dirección:</h4>
                            <p>
                                Dpto. de La Paz, Prov. Murillo, Ciudad de La
                                Paz, Z. Bajo Seguencoma (Zona Sur), Av. Hugo
                                Ernest, No. 7404, La Paz – Bolivia
                            </p>
                        </div>
                    </div>
                    <div class="col-12 py-4">
                        <div class="container redes_sociales">
                            <h4 class="subtitulo-seccion">
                                Nuestras redes sociales
                            </h4>
                            <a
                                href="https://www.facebook.com/profile.php?id=61569121413644"
                                target="_blank"
                                ><i class="fab fa-facebook"></i
                            ></a>
                            <a
                                href="https://www.instagram.com/academia_nacional_de_policias?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
                                target="_blank"
                                ><i class="fab fa-instagram"></i
                            ></a>
                            <a
                                href="https://www.tiktok.com/@anapol?_t=ZM-90QyrPI1xXM&_r=1"
                                target="_blank"
                                ><i class="fab fa-tiktok"></i
                            ></a>
                            <a
                                href="https://www.youtube.com/@academianacionaldepolicias481"
                                target="_blank"
                                ><i class="fab fa-youtube"></i
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
