<script setup>
import FormLogin from "@/Pages/Auth/FormLogin.vue";
import { Link, usePage, router } from "@inertiajs/vue3";
import { ref } from "vue";
const muestra_formulario = ref(false);
</script>
<template>
    <nav class="navbar navbar-expand-lg bg-secundario px-5 b-0">
        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <i class="fa fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <Link class="nav-link" :href="route('fatescipol')"
                        >INICIO <span class="sr-only">(current)</span></Link
                    >
                </li>
                <!-- <li class="nav-item mi-submenu">
                    <a href="" class="submenu"> ASPECTOS INSTITUCIONALES </a>
                    <div class="level1">
                        <a href="" class="submenu2">NUESTRAS AUTORIDADES</a>
                        <div class="level2">
                            <a href=""
                                >MENSAJE DEL SEÑOR COMANDANTE GENERAL DE LA
                                POLICÍA BOLIVIANA</a
                            >
                            <a href=""
                                >MENSAJE DEL MAGNIFICO RECTOR DE LA UNIPOL</a
                            >
                        </div>
                        <a href="" class="nav-link">SEDES DE LA FATESCIPOL</a>
                    </div>
                </li> -->

                <li class="nav-item">
                    <Link
                        class="nav-link"
                        :href="route('fatescipol.nuestra_academia')"
                        >ASPECTOS INSTITUCIONALES</Link
                    >
                </li>
                <li class="nav-item">
                    <Link
                        class="nav-link"
                        :href="route('fatescipol.requisitos')"
                        >REQUISITOS</Link
                    >
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        role="button"
                        data-toggle="dropdown"
                        aria-expanded="false"
                    >
                        FASES DEL PROCESO
                    </a>
                    <div class="dropdown-menu">
                        <Link
                            class="nav-link"
                            :href="route('fatescipol.fase_convocatoria')"
                            >FASE DE CONVOCATORIA</Link
                        >
                        <Link
                            class="nav-link"
                            :href="route('fatescipol.fase_seleccion')"
                            >FASE DE SELECCIÓN</Link
                        >
                        <Link
                            class="nav-link"
                            :href="route('fatescipol.fase_incorporacion')"
                            >FASE DE INCORPORACIÓN</Link
                        >
                    </div>
                </li>
                <li class="nav-item"></li>
                <li class="nav-item">
                    <Link
                        class="nav-link"
                        :href="route('fatescipol.comunicados')"
                        >COMUNICADOS</Link
                    >
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="#"
                        @click.prevent="muestra_formulario = true"
                        >INSCRIPCIÓN</a
                    >
                </li>
                <li class="nav-item">
                    <Link class="nav-link" :href="route('fatescipol.contactos')"
                        >CONTACTOS</Link
                    >
                </li>
            </ul>
        </div>
    </nav>

    <FormLogin
        :muestra_formulario="muestra_formulario"
        @cerrar-formulario="muestra_formulario = false"
    ></FormLogin>
</template>
<style>
.navbar-toggler {
    position: relative;
    background-color: var(--bg2);
    right: 0;
    font-size: 1.5rem;
    color: white;
}

.navbar-nav li a {
    font-size: 0.9em;
    color: white;
}
</style>
