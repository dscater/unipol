<script setup>
import FormLogin from "@/Pages/Auth/FormLogin.vue";
import { Link, usePage, router } from "@inertiajs/vue3";
import { ref } from "vue";
const muestra_formulario = ref(false);
</script>
<template>
    <div class="container-fluid footer-paginas">
        <div class="row">
            <div class="col-12 py-3 text-center">
                <h4 class="text-white">
                    <i>ESCRIBE TU PROPIA HISTORIA</i>
                </h4>
            </div>
            <div class="col-12 pb-3">
                <div class="container redes_sociales">
                    <h4 class="subtitulo-seccion text-secundario">
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
</template>
<style></style>
