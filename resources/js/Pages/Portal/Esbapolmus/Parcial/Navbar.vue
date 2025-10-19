<script setup>
import FormLogin from "@/Pages/Auth/FormLogin.vue";
import { Link, usePage, router } from "@inertiajs/vue3";
import { onBeforeMount, onMounted, onUnmounted, ref } from "vue";
const muestra_formulario = ref(false);

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
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <Link class="nav-link" :href="route('esbapolmus')"
                        >INICIO <span class="sr-only">(current)</span></Link
                    >
                </li>
                <li class="nav-item dropdown" @click.stop>
                    <!-- 1er nivel de submenú -->
                    <a
                        class="nav-link dropdown-toggle text-wrap"
                        href="#"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        ASPECTOS INSTITUCIONALES
                    </a>

                    <div class="dropdown-menu miSubmenu">
                        <li class="nav-item dropdown" @click.stop>
                            <a
                                class="nav-link dropdown-toggle text-wrap"
                                href="#"
                                data-bs-toggle="dropdown"
                            >
                                <p>NUESTRAS AUTORIDADES</p>
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <!-- 2di nivel de submenú -->
                            <div class="dropdown-menu miSubmenu">
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('esbapolmus.nuestra_academia') +
                                        '#esb_aspectos1'
                                    "
                                    >SEÑOR COMANDANTE GENERAL DE LA POLICÍA
                                    BOLIVIANA</Link
                                >
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('esbapolmus.nuestra_academia') +
                                        '#esb_aspectos2'
                                    "
                                    >MAGNIFICO RECTOR DE LA UNIPOL</Link
                                >
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('esbapolmus.nuestra_academia') +
                                        '#esb_aspectos3'
                                    "
                                    >MENSAJE DEL SEÑOR DIRECTOR DE LA
                                    ESBAPOLMUS</Link
                                >
                            </div>
                        </li>
                        <li class="nav-item dropdown" @click.stop>
                            <a
                                class="nav-link dropdown-toggle text-wrap"
                                href="#"
                                data-bs-toggle="dropdown"
                            >
                                <p>VALORES Y PRINCIPIOS DEL CADETE</p>
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <!-- 2di nivel de submenú -->
                            <div class="dropdown-menu miSubmenu">
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('esbapolmus.nuestra_academia') +
                                        '#esb_aspectos4'
                                    "
                                    >ALUMNO</Link
                                >
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('esbapolmus.nuestra_academia') +
                                        '#esb_aspectos5'
                                    "
                                    >VALORES Y PRINCIPIOS</Link
                                >
                            </div>
                        </li>
                        <li class="nav-item dropdown" @click.stop>
                            <a
                                class="nav-link dropdown-toggle text-wrap"
                                href="#"
                                data-bs-toggle="dropdown"
                            >
                                <p>RESEÑA HISTORICA</p>
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <!-- 2di nivel de submenú -->
                            <div class="dropdown-menu miSubmenu">
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('esbapolmus.nuestra_academia') +
                                        '#esb_aspectos6'
                                    "
                                    >POLICIA BOLIVIANA</Link
                                >
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('esbapolmus.nuestra_academia') +
                                        '#esb_aspectos7'
                                    "
                                    >ACADEMIA NACIONAL DE POLICÍAS</Link
                                >
                            </div>
                        </li>
                        <li class="nav-item dropdown" @click.stop>
                            <a
                                class="nav-link dropdown-toggle text-wrap"
                                href="#"
                                data-bs-toggle="dropdown"
                            >
                                <p>HIMNOS</p>
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <!-- 2di nivel de submenú -->
                            <div class="dropdown-menu miSubmenu">
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('esbapolmus.nuestra_academia') +
                                        '#esb_aspectos8'
                                    "
                                    >HIMNO AL POLICIA</Link
                                >
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('esbapolmus.nuestra_academia') +
                                        '#esb_aspectos9'
                                    "
                                    >HIMNO A LA ESBAPOLMUS</Link
                                >
                            </div>
                        </li>
                        <li class="nav-item dropdown" @click.stop>
                            <a
                                class="nav-link dropdown-toggle text-wrap"
                                href="#"
                                data-bs-toggle="dropdown"
                            >
                                <p>MISIÓN Y VISIÓN</p>
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <!-- 2di nivel de submenú -->
                            <div class="dropdown-menu miSubmenu">
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('esbapolmus.nuestra_academia') +
                                        '#esb_aspectos10'
                                    "
                                    >MISIÓN</Link
                                >
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('esbapolmus.nuestra_academia') +
                                        '#esb_aspectos11'
                                    "
                                    >VISIÓN</Link
                                >
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('esbapolmus.nuestra_academia') +
                                        '#esb_aspectos12'
                                    "
                                    >FILOSOFÍA</Link
                                >
                            </div>
                        </li>
                        <Link
                            class="nav-link"
                            :href="
                                route('esbapolmus.nuestra_academia') +
                                '#esb_aspectos13'
                            "
                            >PERFIL DE INGRESO</Link
                        >
                        <li class="nav-item dropdown" @click.stop>
                            <a
                                class="nav-link dropdown-toggle text-wrap"
                                href="#"
                                data-bs-toggle="dropdown"
                            >
                                <p>FORMACIÓN PROFESIONAL</p>
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <!-- 2di nivel de submenú -->
                            <div class="dropdown-menu miSubmenu">
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('esbapolmus.nuestra_academia') +
                                        '#esb_aspectos14'
                                    "
                                    >CARACTERISTICAS DEL REGIMEN DE
                                    ESTUDIOS</Link
                                >
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('esbapolmus.nuestra_academia') +
                                        '#esb_aspectos15'
                                    "
                                    >FORMACIÓN ACADÉMICA-POLICIAL</Link
                                >
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('esbapolmus.nuestra_academia') +
                                        '#esb_aspectos16'
                                    "
                                    >FORMACIÓN FÍSICA Y DEPORTES</Link
                                >
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('esbapolmus.nuestra_academia') +
                                        '#esb_aspectos17'
                                    "
                                    >FORMACIÓN ÉTICO Y MORAL (DISCIPLINA)</Link
                                >
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('esbapolmus.nuestra_academia') +
                                        '#esb_aspectos18'
                                    "
                                    >FORMACIÓN INTEGRAL</Link
                                >
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('esbapolmus.nuestra_academia') +
                                        '#esb_aspectos19'
                                    "
                                    >FORMACIÓN CON PERSPECTIVA DE GÉNERO</Link
                                ><Link
                                    class="dropdown-item"
                                    :href="
                                        route('esbapolmus.nuestra_academia') +
                                        '#esb_aspectos20'
                                    "
                                    >INSTRUCCIÓN POLICIAL</Link
                                ><Link
                                    class="dropdown-item"
                                    :href="
                                        route('esbapolmus.nuestra_academia') +
                                        '#esb_aspectos21'
                                    "
                                    >PRACTICA INSTRUMENTAL
                                </Link>
                            </div>
                        </li>
                        <li class="nav-item dropdown" @click.stop>
                            <a
                                class="nav-link dropdown-toggle text-wrap"
                                href="#"
                                data-bs-toggle="dropdown"
                            >
                                <p>JERARQUÍA INTERNA Y DISTINCIONES</p>
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <!-- 2di nivel de submenú -->
                            <div class="dropdown-menu miSubmenu">
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('esbapolmus.nuestra_academia') +
                                        '#esb_aspectos22'
                                    "
                                    >JERARQUIA INTERNA Y ASCENSOS</Link
                                >
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('esbapolmus.nuestra_academia') +
                                        '#esb_aspectos23'
                                    "
                                    >DISTINCIONES</Link
                                >
                            </div>
                        </li>
                        <Link
                            class="nav-link"
                            :href="
                                route('esbapolmus.nuestra_academia') +
                                '#esb_aspectos24'
                            "
                            >INFRAESTRUCTURA</Link
                        >
                        <li class="nav-item dropdown" @click.stop>
                            <a
                                class="nav-link dropdown-toggle text-wrap"
                                href="#"
                                data-bs-toggle="dropdown"
                            >
                                <p>TÍTULO PROFESIONAL</p>
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <!-- 2di nivel de submenú -->
                            <div class="dropdown-menu miSubmenu">
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('esbapolmus.nuestra_academia') +
                                        '#esb_aspectos25'
                                    "
                                    >COMPETENCIAS DEL EGRESADO</Link
                                >
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('esbapolmus.nuestra_academia') +
                                        '#esb_aspectos26'
                                    "
                                    >GRADOS JERARQUICOS</Link
                                >
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('esbapolmus.nuestra_academia') +
                                        '#esb_aspectos27'
                                    "
                                    >CAMPO OCUPACIONAL</Link
                                >
                            </div>
                        </li>
                        <!-- <Link
                            class="nav-link"
                            :href="
                                route('esbapolmus.nuestra_academia') +
                                '#esb_aspectos28'
                            "
                            >FUNCIONES DE LA POLICÍA BOLIVIANA</Link
                        > -->
                    </div>
                </li>
                <li class="nav-item">
                    <Link
                        class="nav-link"
                        :href="route('esbapolmus.requisitos')"
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
                            :href="route('esbapolmus.fase_convocatoria')"
                            >FASE DE CONVOCATORIA</Link
                        >
                        <Link
                            class="nav-link"
                            :href="route('esbapolmus.fase_seleccion')"
                            >FASE DE SELECCIÓN</Link
                        >
                        <Link
                            class="nav-link"
                            :href="route('esbapolmus.fase_incorporacion')"
                            >FASE DE INCORPORACIÓN</Link
                        >
                    </div>
                </li>
                <li class="nav-item"></li>
                <li class="nav-item">
                    <Link
                        class="nav-link"
                        :href="route('esbapolmus.comunicados')"
                        >COMUNICADOS</Link
                    >
                </li>
                <li class="nav-item">
                    <Link class="nav-link" :href="route('esbapolmus.contactos')"
                        >CONTACTOS</Link
                    >
                </li>

                <li class="nav-item dropdown" @click.stop>
                    <!-- 1er nivel de submenú -->
                    <a
                        class="nav-link dropdown-toggle text-wrap"
                        href="#"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        SERVICIOS
                    </a>

                    <div
                        class="dropdown-menu miSubmenu"
                        style="min-width: 300px"
                    >
                        <Link
                            class="nav-link"
                            :href="route('esbapolmus.antecedentes')"
                            >CERTIFICADO DE ANTECEDENTES POLICIALES</Link
                        >
                        <li class="nav-item dropdown" @click.stop>
                            <a
                                class="nav-link dropdown-toggle text-wrap"
                                href="#"
                                data-bs-toggle="dropdown"
                            >
                                <p>EVALUACIÓN MÉDICA Y PSICOLÓGICA</p>
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <!-- 2di nivel de submenú -->
                            <div class="dropdown-menu miSubmenu">
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('esbapolmus.evaluacion_medica') +
                                        '#esb_evaluacion1'
                                    "
                                    >ASPECTOS IMPORTANTES Y CANJE DE
                                    FOLDER</Link
                                >
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('esbapolmus.evaluacion_medica') +
                                        '#esb_evaluacion2'
                                    "
                                    >EVALUACIÓN MÉDICA</Link
                                >
                                <Link
                                    class="dropdown-item"
                                    :href="
                                        route('esbapolmus.evaluacion_medica') +
                                        '#esb_evaluacion3'
                                    "
                                    >EVALUACIÓN PSICOLÓGICA</Link
                                >
                            </div>
                        </li>
                    </div>
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
