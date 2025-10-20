<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { onMounted, onUnmounted, ref } from "vue";
const { auth, url_assets } = usePage().props;
const user = ref(auth.user);
const requisito = ref(auth.requisito);
const toggleUsuario = ref(false);
const showUsuario = ref(false);

const salir = () => {
    Swal.fire({
        icon: "question",
        title: "Cerrar sesión",
        html: `¿Esta seguro(a) de cerrar sesión?`,
        showCancelButton: true,
        confirmButtonText: "Si, salir",
        cancelButtonText: "Cancelar",
        denyButtonText: `Cancelar`,
        customClass: {
            confirmButton: "btn-success",
        },
    }).then(async (result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            axios
                .post(route("logout"))
                .then((response) => {})
                .finally(() => {
                    window.location.href = route("portal.index");
                });
        }
    });
};

const isFixed = ref(false);
const handleScroll = () => {
    const y = window.scrollY;
    isFixed.value = y > 125;
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
    <div class="main">
        <div class="header p-0">
            <div class="col-12 border_bot">
                <img :src="url_assets + '/imgs/ADMINICION.png'" alt="" />
            </div>
            <div
                class="navbar-nav"
                :class="[isFixed ? 'fixed-top shadow' : '']"
            >
                <div class="container-fluid">
                    <div class="row py-2 justify-content-center">
                        <div class="col-2">
                            <Link
                                class="rounded-0 btn btn-default w-100"
                                :href="route('inicio')"
                            >
                                <i class="fa fa-home"></i>
                                <span class="desc_menu">INICIO</span>
                            </Link>
                        </div>
                        <div
                            class="col-2"
                            v-if="
                                user?.postulante.estado == 'INSCRITO' &&
                                user?.postulante.validDocs == 1
                            "
                        >
                            <Link
                                class="rounded-0 btn btn-info w-100"
                                :href="route('vestibulares')"
                            >
                                <i class="fa fa-clipboard-check"></i>
                                <span class="desc_menu">PREFACULTATIVOS</span>
                            </Link>
                        </div>
                        <div
                            class="col-2"
                            v-if="
                                user?.postulante.estado == 'INSCRITO' &&
                                user?.postulante.validDocs == 1
                            "
                        >
                            <Link
                                class="rounded-0 btn btn-success w-100"
                                :href="route('evaluaciones')"
                            >
                                <i class="fa fa-clipboard-check"></i>
                                <span class="desc_menu">EVALUACIONES</span>
                            </Link>
                        </div>
                        <div class="col-2" v-if="!requisito">
                            <Link
                                class="rounded-0 btn btn-default w-100"
                                :href="route('inscripcions.index')"
                            >
                                <i class="fa fa-clipboard-list"></i>
                                <span class="desc_menu">INSCRIPCIÓN</span>
                            </Link>
                        </div>
                        <div class="col-2">
                            <button
                                class="rounded-0 btn btn-principal w-100"
                                @click.prevent="salir()"
                            >
                                <i class="fa fa-power-off"></i>
                                <span class="desc_menu">CERRAR SESIÓN</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="principal"
            :class="[toggleUsuario ? 'toggle' : '', showUsuario ? 'show' : '']"
        >
            <button class="toggle_usuario" @click="showUsuario = !showUsuario">
                <i
                    class="fa"
                    :class="[
                        showUsuario == true
                            ? 'fa-angle-left'
                            : 'fa-angle-right',
                    ]"
                ></i>
            </button>
            <button
                class="toggle_usuario_normal"
                @click="toggleUsuario = !toggleUsuario"
            >
                <i
                    class="fa"
                    :class="[
                        toggleUsuario == true
                            ? 'fa-angle-right'
                            : 'fa-angle-left',
                    ]"
                ></i>
            </button>
            <div
                class="usuario pb-5 overflow-auto"
                :class="[
                    toggleUsuario ? 'toggle' : '',
                    showUsuario ? 'show' : '',
                ]"
            >
                <div class="container pb-5">
                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <img
                                :src="user.url_foto"
                                alt="Foto"
                                class="fotoPostulante"
                            />
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4">
                            <b class="text-principal">Código:</b>
                        </div>
                        <div class="col-8">{{ user.postulante.codigoPre }}</div>
                    </div>
                    <div class="row mt-2" v-if="user.postulante.codigoInsc">
                        <div class="col-12">
                            <b class="text-principal">Código Inscripción:</b>
                        </div>
                        <div class="col-12 text-center">
                            {{ user.postulante.codigoInsc }}
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <b class="text-principal"
                                >Unidad Académica al que Postula:</b
                            >
                        </div>
                        <div class="col-12 text-center">
                            {{ user.postulante.unidad }}
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <b class="text-principal">Cédula de Identidad:</b>
                        </div>
                        <div class="col-12 text-center">
                            {{ user.postulante.full_ci }}
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <b class="text-principal">Nombre:</b>
                        </div>
                        <div class="col-12 text-center">
                            {{ user.postulante.full_name }}
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <b class="text-principal">Fecha de Nacimiento:</b>
                        </div>
                        <div class="col-12 text-center">
                            {{ user.postulante.fecha_nac_t }}
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <b class="text-principal">Lugar de Inscripción:</b>
                        </div>
                        <div class="col-12 text-center">
                            {{ user.postulante.lugar_preins }}
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <b class="text-principal">Sede de Evaluación:</b>
                        </div>
                        <div class="col-12 text-center">
                            {{ user.postulante.sede }}
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <b class="text-principal">Celular:</b>
                        </div>
                        <div class="col-12 text-center">
                            {{ user.postulante.cel }}
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <b class="text-principal">Correo:</b>
                        </div>
                        <div class="col-12 text-center">
                            {{ user.postulante.correo }}
                        </div>
                    </div>
                    <!-- <div class="row mt-2" v-if="user.postulante.codigoInsc">
                        <div class="col-12 text-center">
                            <a
                                class="btn btn-success"
                                :href="url_assets + '/files/declaracion.pdf'"
                                target="_blank"
                            >
                                Descargar declaración jurada
                            </a>
                        </div>
                    </div> -->
                </div>
            </div>
            <div
                class="contenidoPostulante"
                :class="[
                    toggleUsuario ? 'content-100' : '',
                    showUsuario ? 'content-100' : '',
                ]"
            >
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <slot />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer d-flex">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <p class="text-center text-white pt-4">
                            <b>UNIPOL</b> {{ new Date().getFullYear() }} &copy;
                            Todos los derechos reservado
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
.main {
    min-height: calc(100vh);
    width: 100%;
    max-width: 100%;
    background-color: var(--bg5);
}

.border_bot {
    border-bottom: solid 1px var(--bg6);
}

.navbar-nav {
    z-index: 9999;
    padding: 0;
    width: 100%;
    background-color: var(--bg3);
    box-shadow: 0px 3px 10px black;
}

.principal {
    margin-top: 0px;
    display: flex;
    min-height: calc(100vh - 112px);
    height: auto;
}

.navbar-nav .btn {
    height: 100%;
}

.desc_menu {
    margin-left: 5px;
    text-wrap: wrap;
    word-wrap: break-word;
}

@media (max-width: 1000px) {
    .desc_menu {
        display: none;
    }
}

.footer {
    bottom: -1px;
    min-height: 100px;
    width: 100%;
    z-index: 5;
    background-color: var(--bg3);
}
.usuario {
    margin-top: 3px;
    z-index: -1;
    opacity: 0;
    width: 0px;
    left: -370px;
    background-color: white;
    transition: all 0.4s;
    /* max-height: 100vh; */
    overflow: auto;
}

.fotoPostulante {
    height: 120px;
    border-radius: 50%;
    border: solid 1px var(--bg5);
}

.toggle_usuario {
    color: white;
    border: none;
    background-color: var(--bg6);
    position: fixed;
    bottom: 10px;
    right: 0;
    font-size: 1.4rem;
    width: 30px;
    z-index: 999;
    transition: all 0.5s;
}

.toggle_usuario_normal {
    z-index: 999;
    color: white;
    border: none;
    background-color: var(--bg6t);
    position: fixed;
    top: 138px;
    left: 340px;
    font-size: 1.4rem;
    width: 30px;
    display: none;
    transition: all 0.5s;
}

.usuario.show {
    opacity: 1;
    position: fixed;
    width: 80%;
    height: 100%;
    left: 0;
    top: 0;
    z-index: 9999;
}

.usuario.toggle {
    left: -500px;
    width: 0;
}
.principal.toggle .toggle_usuario_normal,
.usuario.toggle .toggle_usuario_normal {
    left: 0px;
}
.contenidoPostulante {
    width: 100%;
    transition: all 0.4s;
}

.contenidoPostulante.content-100 {
    flex-basis: 100%;
}

.header {
    padding: 20px 30px;
    background-color: var(--bg3);
    text-align: center;
}

.header img {
    height: 50px;
}

@media (min-width: 900px) {
    .header img {
        height: 80px;
    }

    .toggle_usuario {
        display: none;
    }

    .toggle_usuario_normal {
        display: block;
    }

    .usuario {
        position: relative;
        left: 0px;
        flex: 0 0 370px;
        opacity: 1;
        z-index: 2;
    }

    .principal.toggle .contenidoPostulante {
        position: relative;
        flex: 0 0 98vw;
        left: -370px;
    }
}
</style>
