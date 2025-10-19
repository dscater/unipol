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
import Footer from "./Parcial/Footer.vue";
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
    <div class="container-fluid pagina">
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
                    <!-- COMUNICADOS -->
                    <div class="col-12 seccion" id="ana_evaluacion1">
                        <div class="container">
                            <h2 class="titulo-seccion">
                                ASPECTOS IMPORTANTES Y CANJE DE FOLDER
                            </h2>
                            <div class="row info_seccion">
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        Dirección Nacional de Salud y Bienestar
                                        Social
                                    </h5>
                                </div>
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/evaluacion/DNSBS 001.png'
                                        "
                                        height="200px"
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <h4 class="font-weight-bold text-center">
                                        ¡Atención Postulantes!
                                    </h4>
                                    <p class="text-justify">
                                        Información importante sobre las
                                        Evaluaciones Médicas, Odontológicas y
                                        Psicológicas para el Proceso de Admisión
                                        de postulantes a las Unidades Académicas
                                        de Pregrado de la UNIPOL: ANAPOL –
                                        FATESCIPOL – ESBAPOLMUS, gestión 2026
                                    </p>
                                    <h4 class="font-weight-bold">
                                        Aspectos generales:
                                    </h4>
                                    <ul class="list-unstyled pl-4">
                                        <li class="mb-3">
                                            <i class="fa fa-check"></i> Una vez
                                            realizada la inscripción en la
                                            Plataforma de la UNIPOL, deberás
                                            realizar el depósito en el Banco
                                            Unión la suma de 3.700 Bs., al Nro.
                                            de cuenta: 00000000 del Banco Unión
                                            (Hospital Policial Nº 1 “Virgen de
                                            Copacabana”) a nombre del
                                            Postulante, por concepto de
                                            Evaluaciones médicas, odontológicas
                                            y psicológicas.
                                        </li>
                                        <li>
                                            <i class="fa fa-check"></i> Con el
                                            baucher original deberás
                                            constituirte a las Direcciones
                                            Departamentales de Salud y Bienestar
                                            Social a nivel Nacional, para el
                                            respectivo CANJE DEL FOLDER que
                                            contendrá los formularios de los
                                            exámenes médicos.
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12 text-center">
                                    <div class="alert alert-danger">
                                        NOTA: Debes tener en cuenta que donde
                                        realices el canje de folder, será el
                                        lugar donde de manera obligatoria
                                        deberás empezar y concluir todos los
                                        exámenes médicos, odontológico y
                                        psicológico.
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        Lugares para el Canje de Folders
                                    </h5>
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion">LA PAZ:</h5>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <iframe
                                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15300.85513846876!2d-68.13753668441466!3d-16.515301348739396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915f2089a6855555%3A0xe1ee3458ac98009c!2sHospital%20Virgen%20de%20Copacabana!5e0!3m2!1ses-419!2sbo!4v1760886206304!5m2!1ses-419!2sbo"
                                                width="100%"
                                                height="250"
                                                style="border: 0"
                                                allowfullscreen=""
                                                loading="lazy"
                                                referrerpolicy="no-referrer-when-downgrade"
                                            ></iframe>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <img
                                                :src="
                                                    url_asset +
                                                    '/imgs/evaluacion/QRSUBICACION/LA PAZ ADMI 2026.png'
                                                "
                                                height="250px"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion">
                                        COCHABAMBA:
                                    </h5>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <iframe
                                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3807.4091864025827!2d-66.1488306!3d-17.3921399!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93e373f8dc35ce4f%3A0x31d1902003c4faff!2sClinica%20Policial%20Virgen%20De%20Copacabana!5e0!3m2!1ses-419!2sbo!4v1760886412590!5m2!1ses-419!2sbo"
                                                width="100%"
                                                height="250"
                                                style="border: 0"
                                                allowfullscreen=""
                                                loading="lazy"
                                                referrerpolicy="no-referrer-when-downgrade"
                                            ></iframe>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <img
                                                :src="
                                                    url_asset +
                                                    '/imgs/evaluacion/QRSUBICACION/COCHABAMBA ADMISION 2026.png'
                                                "
                                                height="250px"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion">
                                        SANTA CRUZ:
                                    </h5>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <iframe
                                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3798.649390281229!2d-63.2000888!3d-17.808167599999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93f1e82661dfe9b3%3A0x3bc8fca7207cab2d!2sClinica%20Policial%20Virgen%20De%20Copacabana!5e0!3m2!1ses-419!2sbo!4v1760886464729!5m2!1ses-419!2sbo"
                                                width="100%"
                                                height="250"
                                                style="border: 0"
                                                allowfullscreen=""
                                                loading="lazy"
                                                referrerpolicy="no-referrer-when-downgrade"
                                            ></iframe>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <img
                                                :src="
                                                    url_asset +
                                                    '/imgs/evaluacion/QRSUBICACION/SANTA CRUZ ADMISION 2026.png'
                                                "
                                                height="250px"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion">ORURO:</h5>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <iframe
                                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3795.89125255596!2d-67.1157577!3d-17.9372254!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93e2ba148fc531c9%3A0x71d1a8bed2287bf0!2sPoliconsultorio%20Policial!5e0!3m2!1ses-419!2sbo!4v1760886500024!5m2!1ses-419!2sbo"
                                                width="100%"
                                                height="250"
                                                style="border: 0"
                                                allowfullscreen=""
                                                loading="lazy"
                                                referrerpolicy="no-referrer-when-downgrade"
                                            ></iframe>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <img
                                                :src="
                                                    url_asset +
                                                    '/imgs/evaluacion/QRSUBICACION/ORURO ADMISION 2026.png'
                                                "
                                                height="250px"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion">POTOSI:</h5>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <iframe
                                                src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3759.1106888585855!2d-65.765935!3d-19.579757999999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTnCsDM0JzQ3LjEiUyA2NcKwNDUnNTcuNCJX!5e0!3m2!1ses-419!2sbo!4v1760886538764!5m2!1ses-419!2sbo"
                                                width="100%"
                                                height="250"
                                                style="border: 0"
                                                allowfullscreen=""
                                                loading="lazy"
                                                referrerpolicy="no-referrer-when-downgrade"
                                            ></iframe>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <img
                                                :src="
                                                    url_asset +
                                                    '/imgs/evaluacion/QRSUBICACION/POTOSI ADMISION 2026.png'
                                                "
                                                height="250px"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion">
                                        CHUQUISACA:
                                    </h5>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <iframe
                                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d263.3278108377946!2d-65.2657172!3d-19.0507103!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93fbcf90aa4f707b%3A0xe26276fe19ecf63f!2sCLINICA%20POLICIAL%20VIRGEN%20DE%20COPACABANA!5e1!3m2!1ses-419!2sbo!4v1760886571244!5m2!1ses-419!2sbo"
                                                width="100%"
                                                height="250"
                                                style="border: 0"
                                                allowfullscreen=""
                                                loading="lazy"
                                                referrerpolicy="no-referrer-when-downgrade"
                                            ></iframe>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <img
                                                :src="
                                                    url_asset +
                                                    '/imgs/evaluacion/QRSUBICACION/CHUQUISACA ADMISION 2026.png'
                                                "
                                                height="250px"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion">TARIJA:</h5>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <iframe
                                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d518.2772972038464!2d-64.7378813!3d-21.5351075!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x940647e038fa4085%3A0x722b5a6c3f1f8a31!2sComando%20DPTAL.%20TARIJA!5e1!3m2!1ses-419!2sbo!4v1760886608710!5m2!1ses-419!2sbo"
                                                width="100%"
                                                height="250"
                                                style="border: 0"
                                                allowfullscreen=""
                                                loading="lazy"
                                                referrerpolicy="no-referrer-when-downgrade"
                                            ></iframe>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <img
                                                :src="
                                                    url_asset +
                                                    '/imgs/evaluacion/QRSUBICACION/TARIJA ADMISION 2026.png'
                                                "
                                                height="250px"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion">PANDO:</h5>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <iframe
                                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4375.13271473281!2d-68.7573594!3d-11.0234125!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x917eb0ddd68c3337%3A0xf3cea0a10ac53c4d!2sX6GV%2BJ3J%2C%20Cobija!5e1!3m2!1ses-419!2sbo!4v1760886641156!5m2!1ses-419!2sbo"
                                                width="100%"
                                                height="250"
                                                style="border: 0"
                                                allowfullscreen=""
                                                loading="lazy"
                                                referrerpolicy="no-referrer-when-downgrade"
                                            ></iframe>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <img
                                                :src="
                                                    url_asset +
                                                    '/imgs/evaluacion/QRSUBICACION/PANDO ADMISION 2026.png'
                                                "
                                                height="250px"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion">BENI:</h5>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <iframe
                                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1077.194797657837!2d-64.9035135!3d-14.8359546!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93dd6fd5c58de499%3A0xdfafec68112e14ba!2sComando%20Departamental%20de%20Policia!5e1!3m2!1ses-419!2sbo!4v1760886671396!5m2!1ses-419!2sbo"
                                                width="100%"
                                                height="250"
                                                style="border: 0"
                                                allowfullscreen=""
                                                loading="lazy"
                                                referrerpolicy="no-referrer-when-downgrade"
                                            ></iframe>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <img
                                                :src="
                                                    url_asset +
                                                    '/imgs/evaluacion/QRSUBICACION/BENI ADMISION 2026.png'
                                                "
                                                height="250px"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 seccion" id="ana_evaluacion2">
                        <div class="container">
                            <h2 class="titulo-seccion">EVALUACIÓN MÉDICA</h2>
                            <div class="row info_seccion py-3">
                                <h5 class="subtitulo-seccion">
                                    Ruta de la evaluación Médica
                                </h5>
                                <div class="col-12">
                                    <p class="text-justify">
                                        Cuando tengas el Archivador, encontrarás
                                        en el interior los formularios de
                                        Evaluación. La primera hoja será la
                                        Declaración Jurada, deberás leerla con
                                        atención, luego un Notario de Fe Pública
                                        deberá firmarla y sellarla.
                                    </p>
                                </div>
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/evaluacion/DNSBS 002.png'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <p class="font-weight-bold">
                                        Primer día de Evaluación:
                                    </p>
                                    <ul class="list-unstyled pl-3">
                                        <li class="mb-2">
                                            <i class="fa fa-caret-right"></i>
                                            <b>PASO 1:</b> Acudirás a los
                                            Centros Médicos Autorizados en cada
                                            Departamento.
                                        </li>
                                        <li>
                                            <i class="fa fa-caret-right"></i>
                                            <b>PASO 2:</b> Entregarás los
                                            formularios correspondientes para
                                            que te realicen los estudios, de:
                                            <b
                                                ><u
                                                    >Laboratorio, Ecografía,
                                                    Tomografía,
                                                    Electrocardiograma, RX y RX
                                                    panorámica dental.</u
                                                ></b
                                            >
                                        </li>
                                    </ul>
                                    <div
                                        class="alert alert-danger text-justify"
                                    >
                                        <b class="text-warning"
                                            >NOTA IMPORTANTE:</b
                                        >
                                        Al iniciar tu Evaluación Médica,
                                        entregarás tu Archivador Personal, para
                                        su análisis, desde ese momento, solo el
                                        personal de salud tendrá acceso a él.
                                    </div>
                                </div>
                                <div class="col-12">
                                    <p class="font-weight-bold">
                                        Segundo día de Evaluación:
                                    </p>
                                    <ul class="list-unstyled pl-3">
                                        <li class="mb-2">
                                            <i class="fa fa-caret-right"></i>
                                            <b>PASO 3:</b> Acude a los Centros
                                            Médicos Autorizados, donde personal
                                            de apoyo te guiará para la
                                            Evaluación por especialidades:
                                            <b
                                                ><u
                                                    >Neurología, Cardiología,
                                                    Ginecología, Oftalmología,
                                                    Medicina Interna y
                                                    Otorrinolaringología.</u
                                                ></b
                                            >
                                        </li>
                                        <li class="mb-2">
                                            <i class="fa fa-caret-right"></i>
                                            <b>PASO 4:</b> Apersónate a la
                                            Clínica Policial de tu Departamento,
                                            para la
                                            <b
                                                ><u
                                                    >VALORACIÓN ODONTOLÓGICA.</u
                                                ></b
                                            >
                                        </li>
                                        <li>
                                            <i class="fa fa-caret-right"></i>
                                            <b>PASO 5:</b> Finalmente en la
                                            misma Clínica Policial de tu
                                            Departamento, te realizarán la
                                            Evaluación por
                                            <b><u>MEDICINA GENERAL</u></b
                                            >.
                                        </li>
                                    </ul>
                                    <div
                                        class="alert alert-danger text-justify"
                                    >
                                        <b class="text-warning"
                                            >NOTA IMPORTANTE:</b
                                        >
                                        Al concluir tu Evaluación Médica, tu
                                        Archivador Personal, permanecerá en
                                        custodia de la Clínica Policial, tu
                                        deberás esperar la publicación de
                                        resultados por medios de comunicación
                                        oficiales.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 seccion" id="ana_evaluacion3">
                        <div class="container">
                            <h2 class="titulo-seccion">
                                EVALUACIÓN PSICOLÓGICA
                            </h2>
                            <div class="row info_seccion">
                                <div class="col-12 pb-0">
                                    <p class="text-justify mb-0">
                                        Aspectos importantes a tomar en cuenta,
                                        antes de rendir la Evaluación
                                        Psicológica:
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="text-justify">
                                        <b>IMPORTANTE:</b> Para garantizar el
                                        correcto funcionamiento del Sistema de
                                        Evaluación Psicológica y evitar
                                        inconvenientes durante tu evaluación, te
                                        recomendamos utilizar uno de los
                                        siguientes navegadores actualizados:
                                    </p>
                                </div>
                                <div
                                    class="col-12 text-center d-flex justify-content-center align-items-center"
                                    style="gap: 5px"
                                >
                                    <div class="col-3 text-center">
                                        <img
                                            height="70px"
                                            class="img_hover"
                                            :src="
                                                url_asset +
                                                '/imgs/evaluacion/DNSBS 003.png'
                                            "
                                            alt=""
                                        /><br />
                                        <b>CHROME</b>
                                    </div>
                                    <div class="col-3 text-center">
                                        <img
                                            height="70px"
                                            class="img_hover"
                                            :src="
                                                url_asset +
                                                '/imgs/evaluacion/DNSBS 004.png'
                                            "
                                            alt=""
                                        /><br />
                                        <b>BRAVE</b>
                                    </div>
                                    <div class="col-3 text-center">
                                        <img
                                            height="70px"
                                            class="img_hover"
                                            :src="
                                                url_asset +
                                                '/imgs/evaluacion/DNSBS 005.png'
                                            "
                                            alt=""
                                        /><br />
                                        <b>EDGE</b>
                                    </div>
                                    <div class="col-3 text-center">
                                        <img
                                            height="70px"
                                            class="img_hover"
                                            :src="
                                                url_asset +
                                                '/imgs/evaluacion/DNSBS 006.png'
                                            "
                                            alt=""
                                        /><br />
                                        <b>FIREFOX</b>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <ul class="pl-5">
                                        <li>
                                            El uso de otros navegadores o
                                            versiones antiguas puede provocar
                                            errores de carga o incompatibilidad
                                            con algunas funciones del sistema.
                                        </li>
                                        <li>
                                            Actualiza tu navegador antes de
                                            ingresar para asegurar una mejor
                                            experiencia.
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12">
                                    <p class="font-weight-bold">
                                        Proceso de la Evaluación Psicológica:
                                    </p>
                                    <ul class="pl-5">
                                        <li class="mb-2">
                                            <b>PASO 1:</b> Asistir a la
                                            Evaluación Psicológica en fecha,
                                            hora y lugar programado.
                                        </li>
                                        <li>
                                            <b>PASO 2:</b> Debes portar tu
                                            cédula de identidad y Ficha de
                                            Inscripción, que serán requisitos
                                            indispensables y excluyentes para la
                                            evaluación
                                        </li>
                                        <li>
                                            <b>PASO 3:</b> Debes contar con un
                                            Dispositivo Electrónico (Teléfono
                                            Celular, Tablet, o Laptop), el cual
                                            deberá tener datos móviles y batería
                                            suficiente con la finalidad de
                                            garantizar su buen funcionamiento y
                                            sin interrupciones durante el
                                            desarrollo de tu Evaluación
                                            Psicológica.
                                        </li>
                                    </ul>
                                </div>

                                <div
                                    class="col-12 text-center d-flex justify-content-center align-items-center"
                                    style="gap: 5px"
                                >
                                    <div class="col-4 text-center">
                                        <img
                                            height="100px"
                                            class="img_hover"
                                            :src="
                                                url_asset +
                                                '/imgs/evaluacion/DNSBS 007.png'
                                            "
                                            alt=""
                                        /><br />
                                    </div>
                                    <div class="col-4 text-center">
                                        <img
                                            height="100px"
                                            class="img_hover"
                                            :src="
                                                url_asset +
                                                '/imgs/evaluacion/DNSBS 008.jpg'
                                            "
                                            alt=""
                                        /><br />
                                    </div>
                                    <div class="col-4 text-center">
                                        <img
                                            height="100px"
                                            class="img_hover"
                                            :src="
                                                url_asset +
                                                '/imgs/evaluacion/DNSBS 009.png'
                                            "
                                            alt=""
                                        /><br />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <p class="font-weight-bold mb-0">
                                        Características de la Fotocopia de
                                        Cédula de Identidad:
                                    </p>
                                </div>
                                <div class="col-12">
                                    <img
                                        width="100%"
                                        :src="
                                            url_asset +
                                            '/imgs/evaluacion/DNSBS 010.png'
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
