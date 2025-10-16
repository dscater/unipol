<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { ref } from "vue";
const { auth, url_assets } = usePage().props;
const user = ref(auth.user);
const requisito = ref(auth.requisito);
const toggleUsuario = ref(false);
const showUsuario = ref(false);

const salir = () => {
    axios
        .post(route("logout"))
        .then((response) => {})
        .finally(() => {
            window.location.href = route("portal.index");
        });
};
</script>
<template>
    <div class="main">
        <div class="header">
            <img :src="url_assets + '/imgs/ADMINICION.png'" alt="" />
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
                class="usuario pb-5"
                :class="[
                    toggleUsuario ? 'toggle' : '',
                    showUsuario ? 'show' : '',
                ]"
            >
                <div class="container">
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
                        <div class="col-4 text-right">
                            <b class="text-principal">Código:</b>
                        </div>
                        <div class="col-8">{{ user.postulante.codigo }}</div>
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
                            {{ user.postulante.lugar_preins }}
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
                            <b class="text-principal">Coreo:</b>
                        </div>
                        <div class="col-12 text-center">
                            {{ user.postulante.correo }}
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="contenido"
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
        <div class="footer d-flex justify-content-end pr-3">
            <div class="row mt-4">
                <div class="col-12">
                    <Link
                        v-if="!requisito"
                        class="btn btn-default mr-2"
                        :href="route('inscripcions.index')"
                    >
                        <i class="fa fa-clipboard-list"></i> INSCRIPCIÓN
                    </Link>
                    <button class="btn btn-principal" @click.prevent="salir()">
                        <i class="fa fa-power-off"></i> CERRAR SESIÓN
                    </button>
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

.principal {
    display: flex;
    min-height: calc(100vh - 112px);
    height: auto;
    padding-bottom: 100px;
}

.footer {
    position: fixed;
    bottom: -1px;
    height: 100px;
    width: 100%;
    z-index: 5;
    background-color: var(--bg3);
}
.usuario {
    z-index: -1;
    opacity: 0;
    width: 0px;
    left: -370px;
    background-color: white;
    transition: all 0.4s;
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
    top: 0px;
    right: 0;
    font-size: 1.2rem;
    z-index: 999;
    transition: all 0.5s;
}

.toggle_usuario_normal {
    z-index: 999;
    color: white;
    border: none;
    background-color: var(--bg6);
    position: fixed;
    top: 120px;
    left: 348px;
    font-size: 1.2rem;
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
.contenido {
    width: 100%;
    transition: all 0.4s;
    padding-left: 15px;
}

.contenido.content-100 {
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

    .principal.toggle .contenido {
        position: relative;
        flex: 0 0 98vw;
        left: -370px;
    }
}
</style>
