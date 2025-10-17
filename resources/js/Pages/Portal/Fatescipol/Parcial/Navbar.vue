<script setup>
import FormLogin from "@/Pages/Auth/FormLogin.vue";
import { Link, usePage, router } from "@inertiajs/vue3";
import { onBeforeMount, onMounted, onUnmounted, ref } from "vue";
import { useSubmenu } from "@/composables/Submenu";
const muestra_formulario = ref(false);

const { toggleSubmenu, onHover } = useSubmenu();

const isFixed = ref(false);
const showButton = ref(false);
const handleScroll = () => {
    const y = window.scrollY;
    isFixed.value = y > 100;
    showButton.value = y > 300;
};

const scrollTop = () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
};

onMounted(() => {
    window.addEventListener("scroll", handleScroll);
});
onUnmounted(() => {
    window.removeEventListener("scroll", handleScroll);
});
</script>
<template>
    <nav
        class="navbar navbar-expand-lg bg-secundario px-5 b-0"
        :class="[{ 'fixed-top shadow': isFixed }]"
    >
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
                <li class="nav-item dropdown" @click.stop>
                    <a
                        class="nav-link dropdown-toggle text-wrap"
                        href="#"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        ASPECTOS INSTITUCIONALES
                    </a>

                    <div class="dropdown-menu miSubmenu">
                        <!-- 1er nivel de submenú -->
                        <div
                            class="dropdown-submenu"
                            @mouseenter="onHover($event, true)"
                            @mouseleave="onHover($event, false)"
                        >
                            <a
                                href="#"
                                class="dropdown-item dropdown-toggle text-wrap"
                                @click="toggleSubmenu"
                                ><p>NUESTRAS AUTORIDADES</p>
                                <i class="fa fa-caret-right"></i
                            ></a>

                            <div class="dropdown-menu">
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('fatescipol.nuestra_academia') +
                                        '#fat_aspectos1'
                                    "
                                    >SEÑOR COMANDANTE GENERAL DE LA POLICÍA
                                    BOLIVIANA</Link
                                >
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('fatescipol.nuestra_academia') +
                                        '#fat_aspectos2'
                                    "
                                    >MAGNIFICO RECTOR DE LA UNIPOL</Link
                                >
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('fatescipol.nuestra_academia') +
                                        '#fat_aspectos2'
                                    "
                                    >SEÑORES DIRECTORES DE LA FATESCIPOL</Link
                                >
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('fatescipol.nuestra_academia') +
                                        '#fat_aspectos3'
                                    "
                                    >SEÑOR SUBOFICIAL DEL ESTADO MAYOR</Link
                                >
                            </div>
                        </div>
                        <div
                            class="dropdown-submenu"
                            @mouseenter="onHover($event, true)"
                            @mouseleave="onHover($event, false)"
                        >
                            <a
                                href="#"
                                class="dropdown-item dropdown-toggle text-wrap"
                                @click="toggleSubmenu"
                                ><p>VALORES Y PRINCIPIOS DEL CADETE</p>
                                <i class="fa fa-caret-right"></i
                            ></a>
                            <div class="dropdown-menu">
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('fatescipol.nuestra_academia') +
                                        '#fat_aspectos4'
                                    "
                                    >ALUMNO</Link
                                >
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('fatescipol.nuestra_academia') +
                                        '#fat_aspectos5'
                                    "
                                    >VALORES Y PRINCIPIOS</Link
                                >
                            </div>
                        </div>
                        <div
                            class="dropdown-submenu"
                            @mouseenter="onHover($event, true)"
                            @mouseleave="onHover($event, false)"
                        >
                            <a
                                href="#"
                                class="dropdown-item dropdown-toggle text-wrap"
                                @click="toggleSubmenu"
                                ><p>RESEÑA HISTORICA</p>
                                <i class="fa fa-caret-right"></i
                            ></a>
                            <div class="dropdown-menu">
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('fatescipol.nuestra_academia') +
                                        '#fat_aspectos6'
                                    "
                                    >POLICIA BOLIVIANA</Link
                                >
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('fatescipol.nuestra_academia') +
                                        '#fat_aspectos7'
                                    "
                                    >HISTORIA DE LA FATESCIPOL</Link
                                >
                            </div>
                        </div>
                        <div
                            class="dropdown-submenu"
                            @mouseenter="onHover($event, true)"
                            @mouseleave="onHover($event, false)"
                        >
                            <a
                                href="#"
                                class="dropdown-item dropdown-toggle text-wrap"
                                @click="toggleSubmenu"
                                ><p>HIMNOS</p>
                                <i class="fa fa-caret-right"></i
                            ></a>
                            <div class="dropdown-menu">
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('fatescipol.nuestra_academia') +
                                        '#fat_aspectos8'
                                    "
                                    >HIMNO AL POLICIA</Link
                                >
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('fatescipol.nuestra_academia') +
                                        '#fat_aspectos9'
                                    "
                                    >HIMNO A LA ANAPOL</Link
                                >
                            </div>
                        </div>
                        <div
                            class="dropdown-submenu"
                            @mouseenter="onHover($event, true)"
                            @mouseleave="onHover($event, false)"
                        >
                            <a
                                href="#"
                                class="dropdown-item dropdown-toggle text-wrap"
                                @click="toggleSubmenu"
                                ><p>MISIÓN Y VISIÓN</p>
                                <i class="fa fa-caret-right"></i
                            ></a>
                            <div class="dropdown-menu">
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('fatescipol.nuestra_academia') +
                                        '#fat_aspectos10'
                                    "
                                    >MISIÓN</Link
                                >
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('fatescipol.nuestra_academia') +
                                        '#fat_aspectos11'
                                    "
                                    >VISIÓN</Link
                                >
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('fatescipol.nuestra_academia') +
                                        '#fat_aspectos12'
                                    "
                                    >FILOSOFÍA</Link
                                >
                            </div>
                        </div>
                        <Link
                            class="nav-link"
                            :href="
                                route('fatescipol.nuestra_academia') +
                                '#fat_aspectos13'
                            "
                            >PERFIL DE INGRESO</Link
                        >
                        <div
                            class="dropdown-submenu"
                            @mouseenter="onHover($event, true)"
                            @mouseleave="onHover($event, false)"
                        >
                            <a
                                href="#"
                                class="dropdown-item dropdown-toggle text-wrap"
                                @click="toggleSubmenu"
                                ><p>FORMACIÓN PROFESIONAL</p>
                                <i class="fa fa-caret-right"></i
                            ></a>
                            <div class="dropdown-menu">
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('fatescipol.nuestra_academia') +
                                        '#fat_aspectos14'
                                    "
                                    >CARACTERISTICAS DEL REGIMEN DE
                                    ESTUDIOS</Link
                                >
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('fatescipol.nuestra_academia') +
                                        '#fat_aspectos15'
                                    "
                                    >FORMACIÓN ACADÉMICA-POLICIAL</Link
                                >
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('fatescipol.nuestra_academia') +
                                        '#fat_aspectos16'
                                    "
                                    >FORMACIÓN FÍSICA Y DEPORTES</Link
                                >
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('fatescipol.nuestra_academia') +
                                        '#fat_aspectos17'
                                    "
                                    >FORMACIÓN ÉTICO Y MORAL (DISCIPLINA)</Link
                                >
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('fatescipol.nuestra_academia') +
                                        '#fat_aspectos18'
                                    "
                                    >FORMACIÓN INTEGRAL</Link
                                >
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('fatescipol.nuestra_academia') +
                                        '#fat_aspectos19'
                                    "
                                    >FORMACIÓN CON PERSPECTIVA DE GÉNERO</Link
                                ><Link
                                    class="dropdown-item"
                                    :href="
                                        route('fatescipol.nuestra_academia') +
                                        '#fat_aspectos20'
                                    "
                                    >INSTRUCCIÓN POLICIAL</Link
                                >
                            </div>
                        </div>
                        <div
                            class="dropdown-submenu"
                            @mouseenter="onHover($event, true)"
                            @mouseleave="onHover($event, false)"
                        >
                            <a
                                href="#"
                                class="dropdown-item dropdown-toggle text-wrap"
                                @click="toggleSubmenu"
                                ><p>JERARQUÍA INTERNA Y DISTINCIONES</p>
                                <i class="fa fa-caret-right"></i
                            ></a>
                            <div class="dropdown-menu">
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('fatescipol.nuestra_academia') +
                                        '#fat_aspectos21'
                                    "
                                    >JERARQUIA INTERNA Y ASCENSOS</Link
                                >
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('fatescipol.nuestra_academia') +
                                        '#fat_aspectos22'
                                    "
                                    >DISTINCIONES</Link
                                >
                            </div>
                        </div>
                        <Link
                            class="nav-link"
                            :href="
                                route('fatescipol.nuestra_academia') +
                                '#fat_aspectos23'
                            "
                            >SEDES DE LA FATESCIPOL</Link
                        >
                        <div
                            class="dropdown-submenu"
                            @mouseenter="onHover($event, true)"
                            @mouseleave="onHover($event, false)"
                        >
                            <a
                                href="#"
                                class="dropdown-item dropdown-toggle text-wrap"
                                @click="toggleSubmenu"
                                ><p>TÍTULO PROFESIONAL</p>
                                <i class="fa fa-caret-right"></i
                            ></a>
                            <div class="dropdown-menu">
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('fatescipol.nuestra_academia') +
                                        '#fat_aspectos25'
                                    "
                                    >COMPETENCIAS DEL EGRESADO</Link
                                >
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('fatescipol.nuestra_academia') +
                                        '#fat_aspectos26'
                                    "
                                    >GRADOS JERARQUICOS</Link
                                >
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('fatescipol.nuestra_academia') +
                                        '#fat_aspectos27'
                                    "
                                    >CAMPO OCUPACIONAL</Link
                                >
                            </div>
                        </div>
                        <!-- <Link
                            class="nav-link"
                            :href="
                                route('fatescipol.nuestra_academia') +
                                '#fat_aspectos28'
                            "
                            >FUNCIONES DE LA POLICÍA BOLIVIANA</Link
                        > -->
                    </div>
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
                    <Link class="nav-link" :href="route('fatescipol.contactos')"
                        >CONTACTOS</Link
                    >
                </li>
            </ul>
        </div>
    </nav>
    <button
        v-show="showButton"
        class="btn btn-principal rounded-circle"
        id="btnUp"
        @click="scrollTop"
    >
        <i class="fa fa-arrow-up"></i>
    </button>
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
