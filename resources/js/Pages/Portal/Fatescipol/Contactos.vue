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
            <!-- CONTACTOS -->
            <div class="col-12">
                <div class="container">
                    <h2 class="titulo-seccion text-center">CONTACTOS</h2>
                </div>
            </div>
            <div class="col-12">
                <div class="row contenedor_secciones">
                    <div class="col-12 seccion">
                        <div class="container">
                            <h4 class="titulo-seccion text-center">La Paz:</h4>
                            <div class="row info_seccion py-3">
                                <h4 class="subtitulo-seccion">
                                    FATESCIPOL “El Alto”:
                                </h4>
                                <p class="justify">
                                    <b>Dirección:</b> Dpto. de La Paz, Prov.
                                    Murillo, Ciudad de El Alto, Z/ Villa Adela,
                                    Av. Circunvalación y C/ José Manuel Pando,
                                    S/N
                                </p>

                                <div class="col-12">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d534.163977277649!2d-68.215884!3d-16.5229508!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915ede8a9f592105%3A0xf77d963211d1ecee!2sFATESCIPOL%20EL%20ALTO!5e1!3m2!1ses-419!2sbo!4v1760898948800!5m2!1ses-419!2sbo"
                                        width="100%"
                                        height="450"
                                        style="border: 0"
                                        allowfullscreen=""
                                        loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"
                                    ></iframe>
                                </div>
                                <div class="col-12">
                                    <div class="container redes_sociales">
                                        <h4 class="subtitulo-seccion">
                                            Nuestras redes sociales
                                        </h4>
                                        <a
                                            href="https://www.facebook.com/profile.php?id=100027305662896"
                                            target="_blank"
                                            class="text-principal"
                                            ><i class="fab fa-facebook"></i
                                        ></a>
                                        <a
                                            href="https://www.tiktok.com/@fatescipol_el_alto?_t=ZM-8t5UEWKWVS1&_r=1"
                                            target="_blank"
                                            class="text-principal"
                                            ><i class="fab fa-tiktok"></i
                                        ></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row info_seccion">
                                <div class="col-12">
                                    <div class="container">
                                        <h4 class="subtitulo-seccion">
                                            FATESCIPOL “El Alto”:
                                        </h4>
                                        <p class="justify">
                                            <b>Dirección:</b> Dpto. de La Paz,
                                            Prov. Inquisivi, Municipio de
                                            Colquiri, Z/ Nueva Esperanza - Cala
                                            Calita, S/N
                                        </p>

                                        <div class="col-12">
                                            <iframe
                                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4253.467840009225!2d-67.1265054!3d-17.397390299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93e263d3be4d963d%3A0x5ee06aaffc90d16!2sFatescipol%20colquiri!5e1!3m2!1ses-419!2sbo!4v1760899150388!5m2!1ses-419!2sbo"
                                                width="100%"
                                                height="450"
                                                style="border: 0"
                                                allowfullscreen=""
                                                loading="lazy"
                                                referrerpolicy="no-referrer-when-downgrade"
                                            ></iframe>
                                        </div>
                                        <div class="col-12">
                                            <div
                                                class="container redes_sociales"
                                            >
                                                <h4 class="subtitulo-seccion">
                                                    Nuestras redes sociales
                                                </h4>
                                                <a
                                                    href="https://www.facebook.com/profile.php?id=100089589194922"
                                                    target="_blank"
                                                    class="text-principal"
                                                    ><i
                                                        class="fab fa-facebook"
                                                    ></i
                                                ></a>
                                                <a
                                                    href="https://www.tiktok.com/@fatescipolcolquir1?_t=ZM-8t5UlDZf7rC&_r=1"
                                                    target="_blank"
                                                    class="text-principal"
                                                    ><i
                                                        class="fab fa-tiktok"
                                                    ></i
                                                ></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 seccion">
                        <div class="container">
                            <h4 class="titulo-seccion text-center">Oruro:</h4>
                            <div class="row info_seccion py-4">
                                <h4 class="subtitulo-seccion">
                                    FATESCIPOL “Caracollo”
                                </h4>
                                <p class="justify">
                                    <b>Dirección:</b> Dpto. de Oruro, Prov.
                                    Cercado, Municipio de Caracollo, Z/ Alto
                                    Caracollo, Av. Rene Bernal y C. Ayacucho,
                                    S/N
                                </p>
                                <div class="col-12">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d4247.753240429289!2d-67.2263597!3d-17.6414082!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93e29b44d991a6ef%3A0xf835d364620fce1c!2sFATESCIPOL%20(ex-esbapol%20Oruro)!5e1!3m2!1ses-419!2sbo!4v1760899435514!5m2!1ses-419!2sbo"
                                        width="100%"
                                        height="450"
                                        style="border: 0"
                                        allowfullscreen=""
                                        loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"
                                    ></iframe>
                                </div>
                                <div class="col-12 py-2">
                                    <div class="container redes_sociales">
                                        <h4 class="subtitulo-seccion">
                                            Nuestras redes sociales
                                        </h4>
                                        <a
                                            href="https://www.facebook.com/profile.php?id=100083100133849"
                                            target="_blank"
                                            class="text-principal"
                                            ><i class="fab fa-facebook"></i
                                        ></a>
                                        <a
                                            href="google.com/url?sa=D&q=https://www.tiktok.com/%40fatescipol.caracollo%3F_t%3DZM-8t5UPDiCqoQ%26_r%3D1&ust=1760985240000000&usg=AOvVaw1NB3Gi-LF2Yl1OMhUw1HhH&hl=es&source=gmail"
                                            target="_blank"
                                            class="text-principal"
                                            ><i class="fab fa-tiktok"></i
                                        ></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row info_seccion py-4">
                                <div class="col-12 seccion">
                                    <div class="container">
                                        <h4 class="subtitulo-seccion">
                                            FATESCIPOL “Huanuni”
                                        </h4>
                                        <p class="justify">
                                            <b>Dirección:</b> Dpto. de Oruro,
                                            Prov. Pantaleón, Z/ Final Villa
                                            Santiaguito, S/N
                                        </p>

                                        <div class="col-12">
                                            <iframe
                                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4232.308287739171!2d-66.8451309!3d-18.285143899999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93fd3b562af680cd%3A0x390d6fbdb990fa22!2sFatescipol%20huanuni!5e1!3m2!1ses-419!2sbo!4v1760899473924!5m2!1ses-419!2sbo"
                                                width="100%"
                                                height="450"
                                                style="border: 0"
                                                allowfullscreen=""
                                                loading="lazy"
                                                referrerpolicy="no-referrer-when-downgrade"
                                            ></iframe>
                                        </div>
                                        <div class="col-12">
                                            <div
                                                class="container redes_sociales"
                                            >
                                                <h4 class="subtitulo-seccion">
                                                    Nuestras redes sociales
                                                </h4>
                                                <a
                                                    href="https://www.facebook.com/fatescipolhuanuni2022"
                                                    target="_blank"
                                                    class="text-principal"
                                                    ><i
                                                        class="fab fa-facebook"
                                                    ></i
                                                ></a>
                                                <a
                                                    href="https://www.tiktok.com/@fatescipol_huanuni?_t=ZM-8t5ULULSJJm&_r=1"
                                                    target="_blank"
                                                    class="text-principal"
                                                    ><i
                                                        class="fab fa-tiktok"
                                                    ></i
                                                ></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 py-5 seccion">
                        <div class="container">
                            <h4 class="titulo-seccion text-center">Potosí:</h4>
                            <div class="row info_seccion py-4">
                                <h4 class="subtitulo-seccion">
                                    FATESCIPOL “Potosí”
                                </h4>
                                <p class="justify">
                                    <b>Dirección:</b> Dpto. de Potosí, Prov.
                                    Tomas Frías, Z/ Pailaviri, Av. Del Minero,
                                    S/N
                                </p>

                                <div class="col-12">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4198.925237283983!2d-65.7413378!3d-19.6068291!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93f94f503accdc2d%3A0xd92dad51177e9a28!2sFATESCIPOL-POTOSI%20(EX-ESBAPOL)!5e1!3m2!1ses-419!2sbo!4v1760899683449!5m2!1ses-419!2sbo"
                                        width="100%"
                                        height="450"
                                        style="border: 0"
                                        allowfullscreen=""
                                        loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"
                                    ></iframe>
                                </div>
                                <div class="col-12 py-2">
                                    <div class="container redes_sociales">
                                        <h4 class="subtitulo-seccion">
                                            Nuestras redes sociales
                                        </h4>
                                        <a
                                            href="https://www.facebook.com/profile.php?id=100083401059202"
                                            target="_blank"
                                            class="text-principal"
                                            ><i class="fab fa-facebook"></i
                                        ></a>
                                        <a
                                            href="https://www.tiktok.com/@fatescipol.potosi?_t=ZM-8t5UUb84aXt&_r=1"
                                            target="_blank"
                                            class="text-principal"
                                            ><i class="fab fa-tiktok"></i
                                        ></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row info_seccion py-4">
                                <div class="col-12 seccion">
                                    <div class="container">
                                        <h4 class="subtitulo-seccion">
                                            FATESCIPOL “Llallagua”
                                        </h4>
                                        <p class="justify">
                                            <b>Dirección:</b> Dpto. de Potosí,
                                            Prov. Rafael Bustillo, Municipio de
                                            Llallagua, Distrito Siglo XX,
                                            Campamento Villarroel, S/N
                                        </p>

                                        <div class="col-12">
                                            <iframe
                                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4228.854320230238!2d-66.59681979999999!3d-18.4261278!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93fce00a55fe3469%3A0x83661c2b777d3769!2sESBAPOL!5e1!3m2!1ses-419!2sbo!4v1760899736502!5m2!1ses-419!2sbo"
                                                width="100%"
                                                height="450"
                                                style="border: 0"
                                                allowfullscreen=""
                                                loading="lazy"
                                                referrerpolicy="no-referrer-when-downgrade"
                                            ></iframe>
                                        </div>
                                        <div class="col-12">
                                            <div
                                                class="container redes_sociales"
                                            >
                                                <h4 class="subtitulo-seccion">
                                                    Nuestras redes sociales
                                                </h4>
                                                <a
                                                    href="https://www.facebook.com/profile.php?id=1000829163934602"
                                                    target="_blank"
                                                    class="text-principal"
                                                    ><i
                                                        class="fab fa-facebook"
                                                    ></i
                                                ></a>
                                                <a
                                                    href="https://www.tiktok.com/@fatescipol_llallagua?_t=ZM-8t5URF1Go3J&_r=1"
                                                    target="_blank"
                                                    class="text-principal"
                                                    ><i
                                                        class="fab fa-tiktok"
                                                    ></i
                                                ></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 py-5 seccion">
                        <div class="container">
                            <h4 class="titulo-seccion text-center">
                                Chuquisaca:
                            </h4>
                            <div class="row info_seccion py-4">
                                <h4 class="subtitulo-seccion">
                                    FATESCIPOL “Sucre”
                                </h4>
                                <p class="justify">
                                    <b>Dirección:</b> Dpto. de Chuquisaca, Prov.
                                    Oropeza, Ciudad de Sucre, Z/ Lajastambo
                                    Barrio 25 de Mayo, C/ Innominada, S/N
                                </p>

                                <div class="col-12">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4214.486813237019!2d-65.3177197!3d-19.0017448!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93fbc7000594cd03%3A0xcfde05073fd17bae!2sFATESCIPOL!5e1!3m2!1ses-419!2sbo!4v1760899776422!5m2!1ses-419!2sbo"
                                        width="100%"
                                        height="450"
                                        style="border: 0"
                                        allowfullscreen=""
                                        loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"
                                    ></iframe>
                                </div>
                                <div class="col-12 py-2">
                                    <div class="container redes_sociales">
                                        <h4 class="subtitulo-seccion">
                                            Nuestras redes sociales
                                        </h4>
                                        <a
                                            href="https://www.facebook.com/profile.php?id=100083133081133"
                                            target="_blank"
                                            class="text-principal"
                                            ><i class="fab fa-facebook"></i
                                        ></a>
                                        <a
                                            href="https://www.tiktok.com/@fatescipol.sucre?_t=ZM-8t5UX9gk3JG&_r=1"
                                            target="_blank"
                                            class="text-principal"
                                            ><i class="fab fa-tiktok"></i
                                        ></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 py-5 seccion">
                        <div class="container">
                            <h4 class="titulo-seccion text-center">Tarija:</h4>
                            <div class="row info_seccion py-4">
                                <h4 class="subtitulo-seccion">
                                    FATESCIPOL “Tarija”
                                </h4>
                                <p class="justify">
                                    <b>Dirección:</b> Dpto. de Tarija, Prov.
                                    Cercado, Ciudad de Tarija, Z/ Barrio El
                                    Tejar, C/ Camargo y Av. Seledonio Avila, S/N
                                </p>

                                <div class="col-12">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4145.7455953113285!2d-64.7195752!3d-21.551657400000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x940647f4e134993f%3A0xe409205c833841d4!2sEscuela%20B%C3%A1sica%20Policial%20de%20Tarija!5e1!3m2!1ses-419!2sbo!4v1760899832053!5m2!1ses-419!2sbo"
                                        width="100%"
                                        height="450"
                                        style="border: 0"
                                        allowfullscreen=""
                                        loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"
                                    ></iframe>
                                </div>
                                <div class="col-12 py-2">
                                    <div class="container redes_sociales">
                                        <h4 class="subtitulo-seccion">
                                            Nuestras redes sociales
                                        </h4>
                                        <a
                                            href="https://www.facebook.com/profile.php?id=100083267556411"
                                            target="_blank"
                                            class="text-principal"
                                            ><i class="fab fa-facebook"></i
                                        ></a>
                                        <a
                                            href="https://www.tiktok.com/@fatescipoltarija8?_t=ZM-8t5UZvTmatq&_r=1"
                                            target="_blank"
                                            class="text-principal"
                                            ><i class="fab fa-tiktok"></i
                                        ></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row info_seccion py-4">
                                <h4 class="subtitulo-seccion">
                                    FATESCIPOL “Gran Chaco”
                                </h4>
                                <p class="justify">
                                    <b>Dirección:</b> Dpto. de Tarija, Prov.
                                    Gran Chaco, Municipio de Yacuiba/Palmar
                                    Chico, Z/ Comunidad Palmar Chico/ O.T.B.
                                    Barrio La Purisima, C/ Maestranza, S/N
                                </p>

                                <div class="col-12">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4136.428486100514!2d-63.6164802!3d-21.8753729!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9408d52d78bd460f%3A0x3d880a13b04f439d!2sESBAPOL%20Escuela%20Basica%20Policial!5e1!3m2!1ses-419!2sbo!4v1760899872015!5m2!1ses-419!2sbo"
                                        width="100%"
                                        height="450"
                                        style="border: 0"
                                        allowfullscreen=""
                                        loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"
                                    ></iframe>
                                </div>
                                <div class="col-12 py-2">
                                    <div class="container redes_sociales">
                                        <h4 class="subtitulo-seccion">
                                            Nuestras redes sociales
                                        </h4>
                                        <a
                                            href="https://www.facebook.com/profile.php?id=100083104483612"
                                            target="_blank"
                                            class="text-principal"
                                            ><i class="fab fa-facebook"></i
                                        ></a>
                                        <a
                                            href="https://www.tiktok.com/@fatescipolgranchaco?_t=ZM-8t5UdMrYQ9m&_r=1"
                                            target="_blank"
                                            class="text-principal"
                                            ><i class="fab fa-tiktok"></i
                                        ></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 py-5 seccion">
                        <div class="container">
                            <h4 class="titulo-seccion text-center">Pando:</h4>
                            <div class="row info_seccion py-4">
                                <h4 class="subtitulo-seccion">
                                    FATESCIPOL “Pando”
                                </h4>
                                <p class="justify">
                                    <b>Dirección:</b> Dpto. de Pando, Prov.
                                    Nicolas Suarez, Ciudad Nueva Santa Cruz, S/N
                                </p>

                                <div class="col-12">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4374.126169921551!2d-68.756798!3d-11.0908739!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x917eb031fa33d26b%3A0x57806ea7499262fd!2sFATESCIPOL-%20PANDO%20(EX%20ESBAPOL%20)!5e1!3m2!1ses-419!2sbo!4v1760899910795!5m2!1ses-419!2sbo"
                                        width="100%"
                                        height="450"
                                        style="border: 0"
                                        allowfullscreen=""
                                        loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"
                                    ></iframe>
                                </div>
                                <div class="col-12 py-2">
                                    <div class="container redes_sociales">
                                        <h4 class="subtitulo-seccion">
                                            Nuestras redes sociales
                                        </h4>
                                        <a
                                            href="https://www.facebook.com/profile.php?id=100083120271535"
                                            target="_blank"
                                            class="text-principal"
                                            ><i class="fab fa-facebook"></i
                                        ></a>
                                        <a
                                            href="https://www.tiktok.com/@fatescipol.pando?_t=ZM-8t5Uf00ATqA&_r=1"
                                            target="_blank"
                                            class="text-principal"
                                            ><i class="fab fa-tiktok"></i
                                        ></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 py-5 seccion">
                        <div class="container">
                            <h4 class="titulo-seccion text-center">Beni:</h4>
                            <div class="row info_seccion py-4">
                                <h4 class="subtitulo-seccion">
                                    FATESCIPOL “Riberalta”
                                </h4>
                                <p class="justify">
                                    <b>Dirección:</b> Dpto. de Beni, Prov. Vaca
                                    Diez, Municipio de Riberalta, Z/ Villa
                                    Fernanda, Av. Verdolago, S/N
                                </p>

                                <div class="col-12">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4375.309317627502!2d-66.0348696!3d-11.011534!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93d4036ad6c12f5b%3A0x27bae82357945090!2sEscuela%20Basica%20policial%20-%20Riberalta!5e1!3m2!1ses-419!2sbo!4v1760899961848!5m2!1ses-419!2sbo"
                                        width="100%"
                                        height="450"
                                        style="border: 0"
                                        allowfullscreen=""
                                        loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"
                                    ></iframe>
                                </div>
                                <div class="col-12 py-2">
                                    <div class="container redes_sociales">
                                        <h4 class="subtitulo-seccion">
                                            Nuestras redes sociales
                                        </h4>
                                        <a
                                            href="https://www.facebook.com/profile.php?id=100083481693742"
                                            target="_blank"
                                            class="text-principal"
                                            ><i class="fab fa-facebook"></i
                                        ></a>
                                        <a
                                            href="https://www.tiktok.com/@fatescipol_riberalta?_t=ZM-8t5UiAd3bUM&_r=1"
                                            target="_blank"
                                            class="text-principal"
                                            ><i class="fab fa-tiktok"></i
                                        ></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 py-5 seccion">
                        <div class="container">
                            <h4 class="titulo-seccion text-center">
                                Cochabamba:
                            </h4>
                            <div class="row info_seccion py-4">
                                <h4 class="subtitulo-seccion">
                                    FATESCIPOL “Cochabamba”
                                </h4>
                                <p class="justify">
                                    <b>Dirección:</b> Dpto. de Cochabamba, Prov.
                                    Chapare, Municipio de Sacaba, Z/ Chimboco,
                                    Av. Barrientos Km. 12 1/2, S/N
                                </p>

                                <div class="col-12">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4253.5941500772915!2d-66.04287889999999!3d-17.3919593!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93e37b830e4b8a77%3A0x770f1f5385531077!2sFATESCIPOL%20CBBA!5e1!3m2!1ses-419!2sbo!4v1760900005395!5m2!1ses-419!2sbo"
                                        width="100%"
                                        height="450"
                                        style="border: 0"
                                        allowfullscreen=""
                                        loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"
                                    ></iframe>
                                </div>
                                <div class="col-12 py-2">
                                    <div class="container redes_sociales">
                                        <h4 class="subtitulo-seccion">
                                            Nuestras redes sociales
                                        </h4>
                                        <a
                                            href="https://www.facebook.com/profile.php?id=100063650586376"
                                            target="_blank"
                                            class="text-principal"
                                            ><i class="fab fa-facebook"></i
                                        ></a>
                                        <a
                                            href="https://www.tiktok.com/@fat..cochabamba.r?_t=ZM-8t5UHBVe95R&_r=1"
                                            target="_blank"
                                            class="text-principal"
                                            ><i class="fab fa-tiktok"></i
                                        ></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 py-5 seccion">
                        <div class="container">
                            <h4 class="titulo-seccion text-center">
                                Santa Cruz:
                            </h4>
                            <div class="row info_seccion py-4">
                                <h4 class="subtitulo-seccion">
                                    FATESCIPOL “Santa Cruz”
                                </h4>
                                <p class="justify">
                                    <b>Dirección:</b> Dpto. de Santa Cruz, Prov.
                                    Andres Ibañez, Ciudad de Santa Cruz de la
                                    Sierra, Z/ Norte, Av. Alemana y 4to. Anillo,
                                    S/N
                                </p>

                                <div class="col-12">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1061.2907356337605!2d-63.1635474!3d-17.7509458!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93f1e721b0c75ce1%3A0x7f60723e8ed949bf!2sFATESCIPOL!5e1!3m2!1ses-419!2sbo!4v1760900078917!5m2!1ses-419!2sbo"
                                        width="100%"
                                        height="450"
                                        style="border: 0"
                                        allowfullscreen=""
                                        loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"
                                    ></iframe>
                                </div>
                                <div class="col-12 py-2">
                                    <div class="container redes_sociales">
                                        <h4 class="subtitulo-seccion">
                                            Nuestras redes sociales
                                        </h4>
                                        <a
                                            href="https://www.facebook.com/profile.php?id=100083052496261"
                                            target="_blank"
                                            class="text-principal"
                                            ><i class="fab fa-facebook"></i
                                        ></a>
                                        <a
                                            href="https://www.tiktok.com/@fatescipol.santacruz?_t=ZM-8t5UJmNwE5t&_r=1"
                                            target="_blank"
                                            class="text-principal"
                                            ><i class="fab fa-tiktok"></i
                                        ></a>
                                    </div>
                                </div>
                            </div>
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
