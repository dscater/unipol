<script>
import Portal from "@/Layouts/Portal.vue";
export default {
    layout: Portal,
};
</script>
<script setup>
import { nextTick, onMounted, ref } from "vue";
import { Link, usePage, router } from "@inertiajs/vue3";
import { useAxios } from "@/composables/axios/useAxios";
import { useConfiguracion } from "@/composables/configuracion/useConfiguracion";
import FormLogin from "@/Pages/Auth/FormLogin.vue";
import { useAppStore } from "@/stores/aplicacion/appStore";
import NavBar from "./Parcial/Navbar.vue";
import Footer from "@/Pages/Portal/Anapol/Parcial/Footer.vue";
import SliderImagenes from "@/Components/SliderImagenes.vue";
const appStore = useAppStore();
const { oConfiguracion } = useConfiguracion();
const { props: props_page } = usePage();
const user = ref(props_page.auth?.user);
const url_asset = ref(props_page.url_assets);

const accion_formulario = ref(0);
const muestra_formulario = ref(false);

const listMensajeBienvenida = ref([
    {
        tipo: "img",
        url_imagen: "/imgs/fatescipol/FOTO FAT 003.jpg",
        html: `<p class="pt-1">Tcnl. DEAP. Jaime Rigoberto Larrea Álvarez<br/><b class="text-secundario2">DIRECTOR DE LA FATESCIPOL “El Alto”</b></p>`,
    },
    {
        tipo: "img",
        url_imagen: "/imgs/fatescipol/FOTO FAT 004.png",
        html: `<p class="pt-1">Tcnl. DEAP. Pablo Patiño Cuba<br/><b class="text-secundario2">DIRECTOR DE LA FATESCIPOL “Colquiri”</b></p>`,
    },
    {
        tipo: "img",
        url_imagen: "/imgs/fatescipol/FOTO FAT 005.png",
        html: `<p class="pt-1">Tcnl. DEAP. Juan Arnez Peña<br/><b class="text-secundario2">DIRECTOR DE LA FATESCIPOL “Caracollo”</b></p>`,
    },
    {
        tipo: "img",
        url_imagen: "/imgs/fatescipol/FOTO FAT 006.jpg",
        html: `<p class="pt-1">Tcnl. DEAP. Claudia Yusela Miranda Averanga<br/><b class="text-secundario2">DIRECTOR DE LA FATESCIPOL “Huanuni”</b></p>`,
    },
    {
        tipo: "img",
        url_imagen: "/imgs/fatescipol/FOTO FAT 007.png",
        html: `<p class="pt-1">Tcnl. DEAP. Ramiro Jesús Camacho Borda<br/><b class="text-secundario2">DIRECTOR DE LA FATESCIPOL “Potosí”</b></p>`,
    },
    {
        tipo: "img",
        url_imagen: "/imgs/fatescipol/FOTO FAT 008.jpg",
        html: `<p class="pt-1">Tcnl. DEAP. Ronny Oswaldo Yañez Villanueva<br/><b class="text-secundario2">DIRECTOR DE LA FATESCIPOL “Llallagua”</b></p>`,
    },
    {
        tipo: "img",
        url_imagen: "/imgs/fatescipol/FOTO FAT 009.jpg",
        html: `<p class="pt-1">Tcnl. DEAP. Porfirio René Torrez Riveros<br/><b class="text-secundario2">DIRECTOR DE LA FATESCIPOL “Sucre”</b></p>`,
    },
    {
        tipo: "img",
        url_imagen: "/imgs/fatescipol/FOTO FAT 010.png",
        html: `<p class="pt-1">Tcnl. DEAP. Edwar Olmar Pereira Dávila<br/><b class="text-secundario2">DIRECTOR DE LA FATESCIPOL “Tarija”</b></p>`,
    },
    {
        tipo: "img",
        url_imagen: "/imgs/fatescipol/FOTO FAT 011.png",
        html: `<p class="pt-1">Tcnl. DEAP. Erick Velásquez Suarez<br/><b class="text-secundario2">DIRECTOR DE LA FATESCIPOL “Gran Chaco”</b></p>`,
    },
    {
        tipo: "img",
        url_imagen: "/imgs/fatescipol/FOTO FAT 012.jpg",
        html: `<p class="pt-1">Tcnl. DEAP. Carlos Abdías Valdivia Diaz<br/><b class="text-secundario2">DIRECTOR DE LA FATESCIPOL “Pando”</b></p>`,
    },
    {
        tipo: "img",
        url_imagen: "/imgs/fatescipol/FOTO FAT 013.jpg",
        html: `<p class="pt-1">Tcnl. DEAP. Ludwin Antonio Miranda Fanola<br/><b class="text-secundario2">DIRECTOR DE LA FATESCIPOL “Riberalta”</b></p>`,
    },
    {
        tipo: "img",
        url_imagen: "/imgs/fatescipol/FOTO FAT 014.jpg",
        html: `<p class="pt-1">Tcnl. DEAP. Carlos Antonio Flores Prieto<br/><b class="text-secundario2">DIRECTOR DE LA FATESCIPOL “Cochabamba”</b></p>`,
    },
    {
        tipo: "img",
        url_imagen: "/imgs/fatescipol/FOTO FAT 015.png",
        html: `<p class="pt-1">Tcnl. DEAP. Iván Ignacio Calderón Valle<br/><b class="text-secundario2">DIRECTOR DE LA FATESCIPOL “Santa Cruz”</b></p>`,
    },
]);

function scrollToHash() {
    const hash = window.location.hash;
    if (hash) {
        const el = document.querySelector(hash);
        if (el) {
            // Scroll suave al elemento
            el.scrollIntoView({ behavior: "smooth", block: "start" });
        }
    }
}

// Detectar navegación con Inertia
router.on("navigate", () => {
    nextTick(() => {
        scrollToHash();
    });
});

// O cuando se carga directamente la página
onMounted(() => {
    nextTick(() => {
        scrollToHash();
    });
});

const listImagensIntegral = ref([
    {
        url_imagen: url_asset.value + "/imgs/fatescipol/FOTO FAT 034.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/fatescipol/FOTO FAT 033.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/fatescipol/FOTO FAT 030.jpg",
    },
]);

const listImagensInstruccion = ref([
    {
        url_imagen: url_asset.value + "/imgs/fatescipol/FOTO FAT 063.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/fatescipol/FOTO FAT 032.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/fatescipol/FOTO FAT 063.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/fatescipol/FOTO FAT 059.jpg",
    },
]);
const listDistinciones = ref([
    {
        url_imagen: url_asset.value + "/imgs/fatescipol/FOTO FAT 042.jpg",
    },
]);

const listSedes = ref([
    {
        url_imagen: url_asset.value + "/imgs/fatescipol/FOTO FAT 047.jpg",

        html: `<p class="pt-1 text-center"><b class="text-secundario2">FATESCIPOL “El Alto”</b></p>`,
    },
    {
        url_imagen: url_asset.value + "/imgs/fatescipol/F32 COD 001.jpg",

        html: `<p class="pt-1 text-center"><b class="text-secundario2">FATESCIPOL “Colquiri”</b></p>`,
    },
    {
        url_imagen: url_asset.value + "/imgs/fatescipol/F33 COD 001.jpg",

        html: `<p class="pt-1 text-center"><b class="text-secundario2">FATESCIPOL “Caracollo”</b></p>`,
    },
    {
        url_imagen: url_asset.value + "/imgs/fatescipol/F34 COD 001.jpg",

        html: `<p class="pt-1 text-center"><b class="text-secundario2">FATESCIPOL “Huanuni”</b></p>`,
    },
    {
        url_imagen: url_asset.value + "/imgs/fatescipol/FOTO FAT 048.jpg",

        html: `<p class="pt-1 text-center"><b class="text-secundario2">FATESCIPOL “Potosí”</b></p>`,
    },
    {
        url_imagen: url_asset.value + "/imgs/fatescipol/FOTO FAT 026.jpg",

        html: `<p class="pt-1 text-center"><b class="text-secundario2">FATESCIPOL “Llallagua”</b></p>`,
    },
    {
        url_imagen: url_asset.value + "/imgs/fatescipol/F30 COD 001.jpg",

        html: `<p class="pt-1 text-center"><b class="text-secundario2">FATESCIPOL “Sucre”</b></p>`,
    },
    {
        url_imagen: url_asset.value + "/imgs/fatescipol/F30 COD 001.jpg",

        html: `<p class="pt-1 text-center"><b class="text-secundario2">FATESCIPOL “Tarija”</b></p>`,
    },
    {
        url_imagen: url_asset.value + "/imgs/fatescipol/F30 COD 001.jpg",

        html: `<p class="pt-1 text-center"><b class="text-secundario2">FATESCIPOL “Gran Chaco”</b></p>`,
    },
    {
        url_imagen: url_asset.value + "/imgs/fatescipol/FOTO FAT 041.jpg",

        html: `<p class="pt-1 text-center"><b class="text-secundario2">FATESCIPOL “Pando””</b></p>`,
    },
    {
        url_imagen: url_asset.value + "/imgs/fatescipol/FOTO FAT 055.jpg",

        html: `<p class="pt-1 text-center"><b class="text-secundario2">FATESCIPOL “Riberalta”</b></p>`,
    },
    {
        url_imagen: url_asset.value + "/imgs/fatescipol/FOTO FAT 021.jpg",

        html: `<p class="pt-1 text-center"><b class="text-secundario2">FATESCIPOL “Cochabamba”</b></p>`,
    },
    {
        url_imagen: url_asset.value + "/imgs/fatescipol/F30 COD 001.jpg",

        html: `<p class="pt-1 text-center"><b class="text-secundario2">FATESCIPOL “Santa Cruz”</b></p>`,
    },
]);

const listCampoOcupacional = ref([
    {
        url_imagen: url_asset.value + "/imgs/fatescipol/FOTO FAT 064.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/fatescipol/FOTO FAT 059.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/fatescipol/FOTO FAT 034.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/fatescipol/FOTO FAT 028.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/fatescipol/FOTO FAT 030.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/fatescipol/FOTO FAT 029.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/fatescipol/FOTO FAT 031.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/fatescipol/FOTO FAT 063.jpg",
    },
]);
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
                    <!-- AUTORIDADES -->
                    <div class="col-12 seccion py-5">
                        <div class="container">
                            <h2 class="titulo-seccion">NUESTRAS AUTORIDADES</h2>
                            <div class="col-12">
                                <div
                                    class="row py-3 info_seccion wow animate__animated animate__slideInUp"
                                    id="fat_aspectos1"
                                >
                                    <div class="col-12 text-center">
                                        <img
                                            :src="
                                                url_asset +
                                                '/imgs/anapol/FOTO ANA 001.png'
                                            "
                                            class="img_seccion1"
                                            alt=""
                                        />
                                    </div>
                                    <div class="col-12">
                                        <h5
                                            class="subtitulo-seccion text-center"
                                        >
                                            MENSAJE DEL SEÑOR COMANDANTE GENERAL
                                            DE LA POLICÍA BOLIVIANA
                                        </h5>
                                        Apreciada juventud boliviana:<br />
                                        <p class="text-justify">
                                            Tengo el grato honor al hacer
                                            propicia esta invitación y abrir la
                                            oportunidad a las y los jóvenes de
                                            Bolivia que quieran ser parte de
                                            nuestra noble institución policial,
                                            donde se forman lideres
                                            comprometidos con el futuro de
                                            nuestro país.
                                        </p>
                                        <p class="text-justify">
                                            Ser policía es más que una
                                            profesión, es un compromiso con la
                                            protección y el servicio al pueblo,
                                            el valor, la virtud y la voluntad
                                            necesaria para construir una
                                            sociedad justa, segura por el bien
                                            de todos.
                                        </p>
                                        <p class="text-justify">
                                            La Academia Nacional de Policías,
                                            alma mater de la institución, es el
                                            lugar donde se forjan mujeres y
                                            hombres con decisión, con espíritu
                                            inquebrantable, carácter, coraje y
                                            sentido del deber.
                                        </p>
                                        <p class="text-justify">
                                            Estén seguros que; en su futura casa
                                            de estudios, les serán entregados
                                            conocimientos, habilidades,
                                            destrezas y valores suficientes como
                                            para enfrentar los desafíos del
                                            siglo XXI, que los convertirán en
                                            héroes silenciosos, respetuosos de
                                            la ley y el orden, comprometidos con
                                            la patria y la sociedad,
                                            disciplinados y leales cuyo
                                            propósito es el servicio a Bolivia.
                                        </p>
                                        <p class="text-justify">
                                            A nombre de la institución, les
                                            invito a sumarse a la Policía del
                                            Bicentenario, reto que se inicia con
                                            ustedes, con quienes se escribirá
                                            las nuevas páginas de la historia
                                            policial.
                                        </p>
                                        <p
                                            class="w-100 font-weight-bold text-center mb-3"
                                        >
                                            DISCIPLINA, VALOR Y VOCACIÓN DE
                                            SERVICIO
                                        </p>
                                        <p class="w-100 text-center mb-0">
                                            Gral. Sup. Augusto Juan Russo
                                            Sandoval
                                        </p>
                                        <p
                                            class="w-100 font-weight-bold text-center"
                                        >
                                            COMANDANTE GENERAL DE LA POLICÍA
                                            BOLIVIANA
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="row py-3 info_seccion wow animate__animated animate__slideInRight"
                                    id="fat_aspectos2"
                                >
                                    <div class="col-12 text-center">
                                        <img
                                            :src="
                                                url_asset +
                                                '/imgs/anapol/FOTO ANA 003.png'
                                            "
                                            class="img_seccion1"
                                            alt=""
                                        />
                                    </div>
                                    <div class="col-12">
                                        <h5
                                            class="subtitulo-seccion text-center"
                                        >
                                            MENSAJE DEL MAGNIFICO RECTOR DE LA
                                            UNIVERSIDAD POLICIAL “MCAL. ANTONIO
                                            JOSÉ DE SUCRE”
                                        </h5>
                                        <p class="text-justify">
                                            A las señoritas y jóvenes
                                            postulantes a la Escuela Básica
                                            Policial de Música.
                                        </p>
                                        <p class="text-justify">
                                            Reciban un saludo afectuoso y
                                            fraterno de la Dirección Nacional de
                                            Instrucción y Enseñanza y del
                                            Rectorado de la Universidad Policial
                                            &quot;Mariscal Antonio José de
                                            Sucre&quot;
                                        </p>
                                        <p class="text-justify">
                                            Hoy, la UNIPOL abre sus puertas e
                                            inicia el proceso de postulaciones y
                                            admisiones para la Gestión 2026,
                                            invitando a todos aquellos que
                                            sienten en su corazón la vocación de
                                            servir a la sociedad.
                                        </p>
                                        <p class="text-justify">
                                            Les invitamos a ingresar a nuestro
                                            portal informativo y dar el primer
                                            paso hacia una institución que exige
                                            entrega, disciplina y principios
                                            éticos inquebrantables.
                                        </p>
                                        <p class="text-justify">
                                            Esta Unidad Académica es el pilar en
                                            la formación de futuros servidores
                                            policiales íntegros, con visión
                                            humanista, profesional y
                                            comprometidos con la defensa del
                                            bien común.
                                        </p>
                                        <p class="text-justify">
                                            En este camino de formación, no solo
                                            recibirán conocimientos, sino
                                            también valores: respeto,
                                            honestidad, responsabilidad y honor,
                                            esenciales para portar el uniforme y
                                            proteger con firmeza a nuestra
                                            sociedad.
                                        </p>
                                        <p class="text-justify">
                                            Les insto a asumir este desafío con
                                            humildad, valentía y pasión.
                                        </p>
                                        <p class="text-justify">
                                            Bolivia necesita mujeres y hombres
                                            con convicción, comprometidos con
                                            nuestra misión constitucional.
                                        </p>
                                        <p class="text-justify">
                                            Este es el inicio de una vida de
                                            servicio, de deber y honor.
                                        </p>
                                        <p class="text-center font-weight-bold">
                                            ¡Sean bienvenidos a la Universidad
                                            Policial!
                                        </p>
                                        <p class="w-100 text-center">
                                            Gral. My. José Gregorio Illanes
                                            Rivero
                                        </p>
                                        <p
                                            class="w-100 text-center font-weight-bold"
                                        >
                                            DIRECTOR NACIONAL DE INSTRUCCIÓN Y
                                            ENSEÑANZA<br />
                                            RECTOR DE LA UNIVERSIDAD POLICIAL
                                            “MCAL. ANTONIO JOSÉ DE SUCRE”
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="row py-3 info_seccion wow animate__animated animate__slideInLeft"
                                    id="fat_aspectos3"
                                >
                                    <div class="col-12 text-center">
                                        <SliderImagenes
                                            :imagenes="listMensajeBienvenida"
                                            :height="'430px'"
                                            :htmnl="``"
                                        ></SliderImagenes>
                                    </div>
                                    <div class="col-12">
                                        <h5
                                            class="subtitulo-seccion text-center"
                                        >
                                            MENSAJE DE BIENVENIDA A LA FACULTAD
                                            TÉCNICA SUPERIOR EN CIENCIAS
                                            POLICIALES
                                        </h5>
                                        Estimada juventud de nuestra Bolivia:<br />
                                        <p>
                                            Reciban una cálida bienvenida de
                                            parte de todo el equipo de esta
                                            institución. Es un verdadero placer
                                            darles la bienvenida a un espacio
                                            dedicado a la formación musical y al
                                            desarrollo de profesionales
                                            comprometidos con la seguridad y el
                                            servicio a la comunidad.
                                        </p>
                                        <p class="text-justify">
                                            Su llegada marca el inicio de un
                                            camino lleno de retos y
                                            oportunidades. En esta escuela, no
                                            solo perfeccionarán sus habilidades
                                            musicales, sino que también
                                            interiorizarán los valores
                                            fundamentales de la disciplina, la
                                            perseverancia y el honor, pilares
                                            esenciales del músico policial.
                                        </p>
                                        <p class="text-justify">
                                            Les insto a sumergirse de lleno en
                                            esta experiencia, a abrazar el
                                            aprendizaje con pasión, a colaborar
                                            entre ustedes y a aprovechar cada
                                            momento para crecer como músicos y
                                            como personas.
                                        </p>
                                        <p class="text-justify">
                                            Estamos seguros de que, con su
                                            dedicación y nuestro apoyo, se
                                            convertirán en músicos policiales
                                            ejemplares, capaces de honrar la
                                            tradición y el legado de esta
                                            escuela.
                                        </p>
                                        <p class="text-center font-weight-bold">
                                            ¡Bienvenidos a la Escuela Básica
                                            Policial de Música!
                                        </p>
                                        <p
                                            class="w-100 text-center font-weight-bold"
                                        >
                                            FACULTAD TÉCNICA SUPERIOR EN
                                            CIENCIAS POLICIALES
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="row py-3 info_seccion wow animate__animated animate__slideInRight"
                                    id="fat_aspectos4"
                                >
                                    <div class="col-12 text-center">
                                        <img
                                            :src="
                                                url_asset +
                                                '/imgs/fatescipol/FOTO FAT 002.jpg'
                                            "
                                            class="img_seccion1"
                                            alt=""
                                        />
                                    </div>
                                    <div class="col-12">
                                        <h5
                                            class="subtitulo-seccion text-center"
                                        >
                                            MENSAJE DEL SEÑOR SUBOFICIAL DE
                                            ESTADO MAYOR DE LA POLICÍA BOLIVIANA
                                        </h5>
                                        <p class="text-justify">
                                            Estimados postulantes a la Facultad
                                            Técnica en Ciencias Policiales
                                            “FATESCIPOL”, la Unidad Académica de
                                            formación en Técnico Superior en
                                            Ciencias Policiales, donde se
                                            formarán en la carrera policial con
                                            firme convicción de ser un servidor
                                            público que protegerán la vida,
                                            mantener el orden y brindar
                                            seguridad a la sociedad boliviana en
                                            todas sus dimensiones. No todos
                                            tienen el valor ni la vocación para
                                            hacerlo, ustedes serán parte de ese
                                            cuerpo policial comprometido con el
                                            deber y la disciplina preparados
                                            física, moral y académicamente,
                                            aprenderán no solo leyes,
                                            procedimientos y tácticas
                                            policiales, sino también los valores
                                            que definen a un verdadero policía:
                                            honor, lealtad, sacrificio y
                                            servicio.
                                        </p>
                                        <p class="text-justify">
                                            Serán guiados por instructores
                                            experimentados que los acompañarán
                                            paso a paso en el fortalecimiento de
                                            su carácter y su espíritu de
                                            servicio. Este camino no será fácil:
                                            exige esfuerzo, puntualidad,
                                            respeto, y sobre todo, amor a la
                                            institución. Pero cada sacrificio
                                            valdrá la pena, porque los
                                            convertirá en servidores públicos
                                            dignos, respetados y valorados por
                                            la sociedad. Como futuros sargentos,
                                            estarán al frente de misiones de
                                            seguridad ciudadana, prevención del
                                            delito, auxilio a la comunidad,
                                            investigación técnica y muchas otras
                                            tareas por el bienestar de la
                                            sociedad. Su trabajo será reconocido
                                            no solo con el respeto del pueblo
                                            boliviano, sino también con una
                                            remuneración justa y digna, acorde a
                                            la responsabilidad que asumirán como
                                            miembros activos de la Policía
                                            Boliviana, cada día de estudio y
                                            cada jornada de formación es una
                                            inversión en su propio futuro. La
                                            institución recompensará su
                                            compromiso con oportunidades de
                                            ascenso, capacitación continua y
                                            estabilidad laboral, siempre y
                                            cuando actúen con integridad y
                                            demuestren vocación de servicio.
                                        </p>
                                        <p class="text-justify">
                                            El desafío es grande por ello
                                            convoco a todas y todos los jóvenes
                                            bachilleres postulantes a enfrentar
                                            este desafío para vestir
                                            orgullosamente el uniforme verde
                                            olivo, ser postulante en esta Unidad
                                            Académica de pregrado constituye un
                                            reto porque debaten su identidad
                                            entre un modelo de vida que llevaran
                                            en una disciplina de régimen
                                            vertical como un inicio de un camino
                                            largo de mucha responsabilidad y de
                                            entrega a una formación policial con
                                            mucha vocación de servicio al
                                            prójimo de constante ayuda a la
                                            población en general.
                                        </p>

                                        <p class="w-100 text-center">
                                            Sof. Sup. DAP. Juan Carlos Huanca
                                            Condori
                                        </p>
                                        <p
                                            class="w-100 text-center font-weight-bold"
                                        >
                                            SUBOFICIAL DE ESTADO MAYOR DE LA
                                            POLICÍA BOLIVIANA
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- VALORES Y PRINCIPIOS DEL ALUMNO -->
                    <div class="col-12 seccion py-5">
                        <div class="container">
                            <h2 class="titulo-seccion">
                                VALORES Y PRINCIPIOS DEL ALUMNO
                            </h2>

                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInUp"
                                id="fat_aspectos5"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/fatescipol/FOTO FAT 010.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        ALUMNO
                                    </h5>
                                    <p class="text-justify">
                                        El Alumno(a) es el estudiante de la
                                        Facultad Técnica Superior en Ciencias
                                        Policiales, que se forma de manera
                                        integral, en distintas áreas técnicas de
                                        las Ciencias Policiales, con valores y
                                        principios éticos, con pensamiento
                                        crítico; flexible y capaz de adaptarse a
                                        cualquier situación, con capacidad de
                                        trabajo en equipo, disciplinado,
                                        respetuoso de las normas legales,
                                        morales y de trato social; desarrollando
                                        permanentemente un buen estado físico,
                                        preparándose para cumplir funciones
                                        operativas, técnicas, logísticas y
                                        administrativas en unidades
                                        organizacionales de la Policía
                                        Boliviana.
                                    </p>
                                    <p class="text-justify">
                                        El Alumno(a), es el futuro Sargento de
                                        Policía, con vocación de servicio a la
                                        comunidad, con una actitud de permanente
                                        disponibilidad y compromiso
                                        institucional, preparado para afrontar
                                        los riesgos y peligros de la profesión y
                                        si fuera necesario ofrendar su propia
                                        vida, en defensa de la sociedad y la
                                        patria.
                                    </p>
                                    <p class="text-justify">
                                        Finalmente, en un momento crucial para
                                        la transformación institucional, los
                                        Alumnos representan el futuro de la
                                        Policía del Bicentenario. Su formación
                                        no solo implica adquirir conocimientos
                                        operativos y técnicos, sino también
                                        adoptar una nueva visión de servicio,
                                        donde el respeto por los derechos
                                        humanos y la cercanía con la comunidad
                                        son aspectos fundamentales.
                                    </p>
                                </div>
                            </div>

                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInRight"
                                id="fat_aspectos6"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/fatescipol/FOTO FAT 004.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        VALORES Y PRINCIPIOS DE LOS ALUMNOS
                                    </h5>
                                    <p class="text-justify">
                                        La formación del Alumno(a) de la
                                        Facultad Técnica Superior en Ciencias
                                        Policiales, está basada en valores y
                                        principios que forjan el carácter, que
                                        generan sentido de pertenencia a su
                                        institución, y guían su desempeño
                                        futuro. Entre los valores más
                                        importantes se encuentran:
                                    </p>
                                    <ul class="list-unstyled text-justify">
                                        <li class="mb-2">
                                            <b>A. DISCIPLINA:</b> Es la base de
                                            la formación del Alumno, permitiendo
                                            desarrollar autocontrol y la
                                            capacidad de actuar con precisión en
                                            situaciones críticas.
                                        </li>
                                        <li class="mb-2">
                                            <b>B. HONOR Y LEALTAD:</b> El Alumno
                                            se compromete a ser ejemplo de
                                            integridad, manteniendo siempre el
                                            respeto hacia la institución y la
                                            sociedad.
                                        </li>
                                        <li class="mb-2">
                                            <b>C. VOCACIÓN DE SERVICIO:</b> La
                                            misión principal del Alumno es
                                            servir a la comunidad priorizando
                                            siempre el bienestar de los
                                            ciudadanos y actuando con humanidad
                                            y empatía.
                                        </li>
                                        <li class="mb-2">
                                            <b>D. RESILIENCIA Y VALENTÍA:</b>
                                            Durante su formación, el Alumno
                                            enfrenta desafíos físicos y mentales
                                            que fortalecen su capacidad para
                                            superar adversidades y actuar con
                                            coraje ante el peligro.
                                        </li>
                                        <li class="mb-2">
                                            <b>E. TRABAJO EN EQUIPO:</b>
                                            Se fomenta la cooperación y el
                                            desarrollo de habilidades del Alumno
                                            para trabajar en equipo con otros
                                            miembros de la fuerza policial.
                                        </li>
                                        <li class="mb-2">
                                            <b>F. ENERGÍA:</b> La energía y
                                            dinamismo caracteriza al Alumno como
                                            jóvenes damas y varones dinámicos y
                                            proactivos. Se refleja en su
                                            entusiasmo, vigor físico y
                                            disposición para enfrentar retos con
                                            determinación.
                                        </li>
                                        <li class="mb-2">
                                            <b>G. ESPÍRITU DE CUERPO:</b> Este
                                            valor representa la unidad y la
                                            cohesión entre los Alumnos,
                                            promoviendo el sentido de
                                            pertenencia y camaradería. El
                                            espíritu de cuerpo fortalece el
                                            compromiso mutuo y la moral,
                                            enseñando a los Alumnos a trabajar
                                            como un equipo sólido y a apoyarse
                                            unos a otros, especialmente en
                                            situaciones difíciles.
                                        </li>
                                        <li class="mb-2">
                                            <b>H. ESPÍRITU DE SACRIFICIO:</b>Es
                                            la disposición del Alumno que le
                                            impulsa a aceptar y anteponer el
                                            cumplimiento del deber a las
                                            comodidades, los intereses y las
                                            aspiraciones personales y si fuera
                                            necesario la entrega de la propia
                                            vida, por el servicio a la sociedad
                                            y cumplimiento del deber.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- RESEÑA HISTORICA -->
                    <div class="col-12 seccion py-5">
                        <div class="container">
                            <h2 class="titulo-seccion">RESEÑA HISTORICA</h2>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInUp"
                                id="fat_aspectos7"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset + '/imgs/F4 COD 001.png'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        HISTORIA DE LA POLICÍA BOLIVIANA
                                    </h5>
                                    <p class="text-justify">
                                        Al proclamarse la Independencia
                                        Nacional, en la solemne sesión de la
                                        Asamblea Constituyente del. 6 de Agosto
                                        de 1825, el país hereda la mayoría de
                                        las instituciones públicas del Alto Perú
                                        colonial, consiguientemente, la
                                        protección de vidas y haciendas sigue a
                                        cargo de los Cabildos hasta la llegada
                                        al país del Libertador Simón Bolivar,
                                        quien echa los cimientos para la
                                        organización de las instituciones
                                        republicanas entre las que se encuentra
                                        la Policía, para cuya creación y
                                        sostenimiento dicta atinadas
                                        disposiciones que se materializan al
                                        enviar junto con el Proyecto de
                                        primitiva Constitución, las bases para
                                        la organización de una &quot;Milicia
                                        para la conservación del Orden&quot;,
                                        que vendría a ser la primera entidad
                                        policial.
                                    </p>
                                    <p class="text-justify">
                                        A su sucesor el Mariscal Antonio José de
                                        Sucre, le correspondió rubricar la
                                        &quot;Partida de Nacimiento de la
                                        Policía Boliviana&quot;, con la
                                        promulgación de la Ley Reglamentaria de
                                        Policías el 24 de junio de 1826, creando
                                        las &quot;Intendencias de Policía&quot;
                                        en las capitales de Departamento, con
                                        determinación de sus atribuciones y
                                        normando las modalidades destinadas a
                                        precautelar la paz pública, garantizar
                                        la vida y la propiedad de las personas.
                                    </p>
                                    <p class="text-justify">
                                        Esta sabia Ley emanada del verdadero
                                        constructor de la nueva nacionalidad
                                        boliviana, constituye la piedra miliar
                                        del edificio institucional policiario,
                                        por eso es que algunos visionarios
                                        directivos resolvieron que se la
                                        recuerde en la perennidad, consagrando
                                        como “Día del Policía Boliviano” el 24
                                        de junio de cada año.
                                    </p>
                                    <p
                                        class="text-center w-100 font-weight-bold"
                                    >
                                        199 años de historia… con Disciplina,
                                        Valor y Vocación de Servicio Rumbo al
                                        BICENTENARIO…
                                    </p>
                                </div>
                            </div>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInRight"
                                id="fat_aspectos8"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/fatescipol/FOTO FAT 006.png'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        HISTORIA DE LA FACULTAD TÉCNICA SUPERIOR
                                        EN CIENCIAS POLICIALES
                                    </h5>
                                    <p class="text-justify">
                                        En el año de 1941 se convocó al Primer
                                        Curso para Carabineros, llegando a
                                        capacitarse a 30 de ellos, sin embargo,
                                        recién en 1973 y mediante Resolución
                                        Ministerial Nro. 271 de 20 de diciembre,
                                        se crea la “Escuela Básica Policial”
                                        para capacitar a los Guardias, Agentes
                                        de Parada y de Investigaciones, sujeta a
                                        un Plan de estudios previamente
                                        elaborado. Inicia labores en
                                        instalaciones anexas a la Academia
                                        Nacional de Policías un 4 de febrero de
                                        1974 con 50 alumnos, seleccionados en la
                                        ciudad de La Paz.
                                    </p>
                                    <p class="text-justify">
                                        Su estructura orgánica fue básicamente
                                        similar a los otros institutos. Los
                                        alumnos se agrupaban en una Compañía. En
                                        la actualidad el Sistema Educativo
                                        Policial SEP. y el Estatuto Orgánico de
                                        la Universidad Policial UNIPOL, creado
                                        mediante R. S. 222297 de 18 de febrero
                                        de 2004 autoriza el funcionamiento de la
                                        Universidad Policial. debiendo ofrecer
                                        Grados y Diplomas Académicos de igual
                                        jerarquía a los otorgados por las
                                        universidades del país, de acuerdo a
                                        disposiciones legales en vigencia.
                                    </p>
                                    <p class="text-justify">
                                        Con la promulgación de la Ley 1387 en
                                        fecha 16 de agosto de 2021, se dio
                                        inicio a la reestructuración de los
                                        grados jerárquicos dentro del Nivel de
                                        Sub Oficiales y Sargentos de la Policía
                                        Boliviana. Dando lugar al Egreso de la
                                        Primera Promoción a quienes se les
                                        otorgo el Grado Jerárquico de
                                        “Sargentos”. eliminando el grado de
                                        “Policía Profesional” y constituyéndose
                                        un logro de dignificación del futuro
                                        profesional de la Policía Boliviana.
                                    </p>
                                    <p class="text-justify">
                                        Actualmente se encuentran funcionando
                                        trece (13) Facultades Técnicas
                                        Superiores en Ciencias Policiales
                                        (FATESCIPOL): La Paz (El Alto y
                                        Colquiri), Cochabamba (Sacaba). Tarija
                                        (Capital y Gran Chaco- Yaculba), Beni
                                        (Riberalta). Chuquisaca (Sucre). Oruro
                                        (Caracollo y Huanuni), Santa Cruz
                                        (Capital), Potosí (Capital y Llallagua).
                                        Pando (Cobija).
                                    </p>
                                    <p
                                        class="text-center w-100 font-weight-bold"
                                    >
                                        52 años de vida institucional, formando
                                        a hombres y mujeres, Sargentos de
                                        Policía para Bolivia…
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- HIMNOS -->
                    <div class="col-12 seccion py-5">
                        <div class="container">
                            <h2 class="titulo-seccion">HIMNOS</h2>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInUp"
                                id="fat_aspectos9"
                            >
                                <div class="col-md-6 offset-md-3">
                                    <h5 class="subtitulo-seccion text-center">
                                        Himno del Policía y del Carabinero
                                    </h5>
                                    <div class="d-block w-100 text-sm italic">
                                        <b>Letra:</b> Dn. Adrián Pereira
                                    </div>
                                    <div class="d-block w-100 text-sm italic">
                                        <b>Música:</b> Tcnl. Adrián Patiño
                                        Carpio
                                    </div>
                                    <p class="text-center w-100 mt-3">
                                        <b>I</b><br />
                                        Del derecho en la antorcha encendida, te
                                        dio el cielo su inmenso poder Guardia
                                        fiel qué te importa la vida, si
                                        alumbrando te mata el deber.
                                    </p>
                                    <p class="text-center w-100">
                                        Contra el crimen tu pecho es muralla,
                                        que defiende la paz y el honor, si la
                                        guerra tu predio avasalla, mata al
                                        monstruo que siembra el terror.
                                    </p>
                                    <p class="text-center w-100">
                                        Las palomas defienden su nido, de las
                                        garras del pérfido halcón; de tiranos
                                        protege al vencido, hiere al pueblo, si
                                        el pueblo es felón.
                                    </p>
                                    <p class="text-center w-100">
                                        <b>CORO.</b> Del derecho... <br />
                                        <b>II</b>
                                    </p>
                                    <p class="text-center w-100">
                                        En tus manos está la balanza: De la ley
                                        que el hombre igualó Por dar vida a su
                                        muerta esperanza Temis justa, tus ojos
                                        vendó.
                                    </p>
                                    <p class="text-center w-100">
                                        Sin amor y sin odios domina A los caídos
                                        que alienta tu voz; Hasta el sol
                                        justiciero se inclina Cuando ampara tu
                                        sombra de Dios
                                    </p>
                                    <p class="text-center w-100">
                                        <b>CORO.</b> Del derecho... <br />
                                        <b>III</b>
                                    </p>
                                    <p class="text-center w-100">
                                        Que perdure tu grito profundo Libertad,
                                        Igualdad, Paz y Unión; A tu sombra los
                                        pueblos del mundo Que enarbolan un solo
                                        pendón.
                                    </p>
                                    <p class="text-center w-100">
                                        Entonces un himno sonoro Por el guardia
                                        valiente y leal; Eternicen los pueblos
                                        en coro Las hazañas del gran policía.
                                    </p>
                                    <p class="text-center w-100">
                                        <b>CORO.</b> Del derecho... <br />
                                    </p>
                                </div>
                                <div class="col-12">
                                    <iframe
                                        src="https://www.youtube.com/embed/as7kOARuJZg"
                                        frameborder="0"
                                        allowfullscreen
                                        width="100%"
                                        height="400px"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    ></iframe>
                                </div>
                            </div>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInRight"
                                id="fat_aspectos10"
                            >
                                <!-- <div class="col-12">
                                    <iframe
                                        src="https://www.youtube.com/embed/as7kOARuJZg"
                                        frameborder="0"
                                        allowfullscreen
                                        width="100%"
                                        height="400px"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    ></iframe>
                                </div> -->
                                <div class="col-md-6 offset-md-3">
                                    <h5 class="subtitulo-seccion text-center">
                                        Himno a la Facultad Técnica Superior en
                                        Ciencias Policiales
                                    </h5>
                                    <div class="d-block w-100 text-sm italic">
                                        <b>Letra:</b> Tte. MSc. Roger A. Yujra
                                        Chipana
                                    </div>
                                    <div class="d-block w-100 text-sm italic">
                                        <b>Música:</b> Sof. 2do. Valentín Quispe
                                        Huanca
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sgto.
                                        My. Teófilo J. Osco Luque<br />
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sgto.
                                        2do. Cesar A. Mamani Sarzuri
                                    </div>
                                    <p class="text-center w-100 mt-3">
                                        FATESCIPOL, cuna de historia Donde nacen
                                        guardianes de gloria Hombres y mujeres
                                        valientes En la lucha del bien contra el
                                        mal.
                                    </p>
                                    <p class="text-center w-100">
                                        En tus aulas de ciencia y saber Van
                                        formando ideales con deber Para cumplir
                                        nuestra noble misión Fieles siempre a
                                        nuestra nación.
                                    </p>
                                    <p class="text-center w-100">
                                        <b>CORO</b><br />
                                        Quiero ser un Policía Con valor,
                                        disciplina, lealtad Ostentando el verde
                                        olivo con orgullo Contra el crimen yo
                                        siempre luchare. Quiero ser un policía
                                        Con valor, disciplina, lealtad Con
                                        justicia de noche y de día Si es
                                        necesario mi vida entregare.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- MISIÓN Y VISIÓN -->
                    <div class="col-12 seccion py-5">
                        <div class="container">
                            <h2 class="titulo-seccion">MISIÓN Y VISIÓN</h2>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInUp"
                                id="fat_aspectos11"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/fatescipol/FOTO FAT 011.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        MISIÓN
                                    </h5>
                                    <p class="text-justify">
                                        Formar profesionales en el ámbito de las
                                        Ciencias Policiales, Sargentos de
                                        Policía destinados a brindar servicios
                                        intangibles de seguridad y defensa de la
                                        sociedad enmarcados en altos valores de
                                        disciplina, ética, honestidad,
                                        transparencia, justicia, equidad,
                                        igualdad y respeto a los derechos
                                        humanos.
                                    </p>
                                </div>
                            </div>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInRight"
                                id="fat_aspectos12"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/fatescipol/FOTO FAT 016.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        Visión
                                    </h5>
                                    <p class="text-justify">
                                        Constituirse en una Unidad Académica de
                                        excelencia, reconocida y acreditada
                                        nacional e internacionalmente, con
                                        sólidos valores que tienen su fundamento
                                        en una educación abierta, humanista,
                                        científica, técnica y tecnológica,
                                        productiva, territorial, teórica -
                                        práctica, crítica y solidaria; haciendo
                                        de los futuros Sargentos de la Policía
                                        Boliviana, profesionales idóneos capaces
                                        de responder y cumplir la misión
                                        asignada por el Estado Plurinacional de
                                        Bolivia.
                                    </p>
                                </div>
                            </div>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInLeft"
                                id="fat_aspectos13"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/fatescipol/FOTO FAT 018.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        FILOSOFÍA
                                    </h5>
                                    <p class="text-justify">
                                        La Universidad Policial “Mcal. Antonio
                                        José de Sucre“, a través de la Facultad
                                        Técnica Superior en Ciencias Policiales,
                                        impulsa y desarrolla valores
                                        <b>ÉTICO MORALES</b> en sus componentes
                                        para hacer de la acción de servicio a la
                                        sociedad un apostolado; respetando los
                                        principios universales de los derechos y
                                        las garantías constitucionales,
                                        principios que van aún más allá de la
                                        vida misma, en el sublime acto de
                                        entrega por el bien mayor, bajo la
                                        premisa “Contra el Mal por el Bien de
                                        Todos”.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- PERFIL DE INGRESO -->
                    <div class="col-12 seccion py-5">
                        <div class="container">
                            <h2 class="titulo-seccion">PERFIL DE INGRESO</h2>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInUp"
                                id="fat_aspectos14"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/fatescipol/FOTO FAT 027.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <p class="text-justify">
                                        Señoritas y Jóvenes Bolivianos, quienes
                                        cuentan con: educación humanística,
                                        educación técnica – tecnológica,
                                        formación integral, formación
                                        científica, formación espiritual, ética,
                                        moral, formación artística y cultural,
                                        formación deportiva; conscientes de las
                                        exigencias y retos que deben afrontar en
                                        su Formación Profesional, acorde a las
                                        exigencias que conlleva ser Sargento de
                                        Policía con el grado académico de
                                        Técnico Superior en Ciencias Policiales.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FORMACIÓN PROFESIONAL -->
                    <div class="col-12 seccion py-5">
                        <div class="container">
                            <h2 class="titulo-seccion">
                                FORMACIÓN PROFESIONAL
                            </h2>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInUp"
                                id="fat_aspectos15"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/fatescipol/FOTO FAT 029.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        CARACTERISTICAS DEL REGIMEN DE ESTUDIOS
                                    </h5>
                                    <p class="text-justify">
                                        La formación es de Régimen Especial; la
                                        Facultad Técnica Superior en Ciencias
                                        Policiales cuenta con un currículo
                                        establecido en 4 Semestres (2 años),
                                        siendo de gran importancia resaltar que,
                                        en el último semestre de formación,
                                        realizan prácticas en distintas Unidades
                                        Policiales, que permitirán al futuro
                                        profesional desenvolverse en sus
                                        funciones de manera eficiente.
                                    </p>
                                    <p class="text-justify">
                                        Todo el programa académico, en
                                        circunstancias normales, se desarrolla
                                        bajo el régimen cerrado (internado), con
                                        limitación de salidas y con dedicación a
                                        tiempo completo. Por ello, es importante
                                        que la y el postulante tengan en cuenta
                                        estas características si acaso no es de
                                        su agrado permanecer estudiando y
                                        profesionalizándose en un régimen que
                                        restringe las salidas, pero además que
                                        tiene una vida en la que los niveles de
                                        privacidad absoluta no existen en vista
                                        de las características de la
                                        infraestructura y medios que se disponen
                                        que son compatibles con la vida en
                                        acuartelamiento que prepara al futuro
                                        profesional para la vida en las Unidades
                                        Policiales y para enfrentar dificultades
                                        en la vida profesional.
                                    </p>
                                </div>
                            </div>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInRight"
                                id="fat_aspectos16"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/fatescipol/FOTO FAT 061.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        FORMACIÓN ACADÉMICA-POLICIAL
                                    </h5>
                                    <p class="text-justify">
                                        En la Facultad Técnica Superior en
                                        Ciencias Policiales, la formación
                                        comprende actividades de instrucción de
                                        orden cerrado y orden abierto,
                                        entrenamiento policial, que se
                                        desarrollan en aulas y de manera
                                        práctica; proporcionando conocimientos
                                        filosóficos, teóricos – doctrinarios y
                                        técnicos de las Ciencias Policiales,
                                        necesarios para el desempeño de
                                        funciones en las Unidades Policiales y
                                        ejecución de servicios y operaciones
                                        policiales de Seguridad Interna y
                                        Desarrollo del Estado Plurinacional de
                                        Bolivia.
                                    </p>
                                </div>
                            </div>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInLeft"
                                id="fat_aspectos17"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/fatescipol/FOTO FAT 036.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        FORMACIÓN FÍSICA Y DEPORTES
                                    </h5>
                                    <p class="text-justify">
                                        Esta área es la encargada de mantener y
                                        mejorar la condición física de las y los
                                        Alumnos, orientada a forjar exigencias
                                        propias de la profesión mejorando
                                        condiciones de agilidad, resistencia
                                        física y técnicas de defensa personal,
                                        pero además de formar en el futuro
                                        Sargento de Policía hábitos saludables
                                        de vida, que le permitan enfrentar los
                                        rigores de las exigencias profesionales
                                        en diferentes ambientes y entornos
                                        generalmente desafiantes y de naturaleza
                                        extrema y peculiar. Participar en
                                        ejercicios de defensa personal de
                                        diferente grado y progresión, donde
                                        implique el contacto físico en
                                        condiciones muy similares a los posibles
                                        escenarios que pudiese encontrar el
                                        futuro profesional.
                                    </p>
                                </div>
                            </div>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInRight"
                                id="fat_aspectos18"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/fatescipol/FOTO FAT 019.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        FORMACIÓN ÉTICO Y MORAL (DISCIPLINA)
                                    </h5>
                                    <p class="text-justify">
                                        La formación integral del futuro
                                        Sargento de Policía, requiere la
                                        aprehensión de normas que adecuen su
                                        comportamiento a exigencias sociales,
                                        estatales e institucionales, en la
                                        pretensión de convertirlo en referente
                                        de servidor público policial,
                                        depositario de la confianza ciudadana,
                                        guardián de la seguridad pública y
                                        garante de los derechos humanos.
                                    </p>
                                </div>
                            </div>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInLeft"
                                id="fat_aspectos19"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/fatescipol/FOTO FAT 011.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        FORMACIÓN INTEGRAL
                                    </h5>
                                    <p class="text-justify">
                                        La Facultad Técnica Superior en Ciencias
                                        Policiales a Nivel Nacional, desarrollan
                                        una formación académica integral
                                        impartiendo a los futuros Sargentos de
                                        Policía, programas académicos de
                                        profesionalización complementados con
                                        actividades socio culturales que
                                        desarrollan la creatividad artística,
                                        literaria, musical, pictórica, y otros
                                        talentos en las Alumnas y Alumnos; si
                                        bien estimula las prácticas deportivas
                                        como actividad recreativa, lo más
                                        importante es la formación intelectual
                                        con valores, principios y compromiso en
                                        un entorno de exigencia disciplinaria
                                        rigurosa.
                                    </p>
                                </div>
                                <div class="col-12 d-flex">
                                    <SliderImagenes
                                        :imagenes="listImagensIntegral"
                                        :height="'400px'"
                                        :interval="3000"
                                    ></SliderImagenes>
                                </div>
                            </div>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInRight"
                                id="fat_aspectos20"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/fatescipol/FOTO FAT 061.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        FORMACIÓN CON PERSPECTIVA DE GÉNERO
                                    </h5>
                                    <p class="text-justify">
                                        La Policía Boliviana a través de la
                                        Facultad Técnica Superior en Ciencias
                                        Policiales, forman a hombres y mujeres
                                        comprometidos a garantizar el ejercicio
                                        de los derechos humanos, en particular
                                        de las poblaciones vulnerables,
                                        asumiendo la igualdad de género,
                                        orientados a la equidad y no
                                        discriminación, incorporando la
                                        perspectiva de género en todo su
                                        accionar institucional.
                                    </p>
                                </div>
                            </div>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInLeft"
                                id="fat_aspectos21"
                            >
                                <div class="col-12">
                                    <SliderImagenes
                                        :imagenes="listImagensInstruccion"
                                        :height="'400px'"
                                        :interval="3000"
                                    ></SliderImagenes>
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        INSTRUCCIÓN POLICIAL
                                    </h5>
                                    <p class="w-100 text-justify">
                                        La formación de las y los futuros
                                        Sargentos de Policía es integral,
                                        dirigida a generar competencias
                                        profesionales policiales, que le
                                        permitan planificar y ejecutar, en forma
                                        óptima las funciones operativas y
                                        administrativas de acuerdo con la misión
                                        de cada Unidad Operativa Institucional,
                                        estando relacionados con lo siguiente:
                                    </p>
                                    <ul class="list-unstyled text-justify pl-4">
                                        <li class="mb-3">
                                            <b>a)</b> Portar armas de fuego y,
                                            en su caso utilizarlas en diferentes
                                            modalidades e intensidades.
                                        </li>
                                        <li class="mb-3">
                                            <b>b)</b> Portar equipo, armamento,
                                            munición policial-militar, y en su
                                            caso utilizarlo en diferentes
                                            modalidades e intensidades.
                                        </li>
                                        <li class="mb-3">
                                            <b>c)</b> Participar en
                                            entrenamientos, capacitaciones,
                                            eventos y similares en ambientes
                                            peculiares extremos, en diferentes
                                            regiones del Estado Boliviano.
                                        </li>
                                        <li class="mb-3">
                                            <b>d)</b> Realizar ejercicios
                                            físicos, con o sin equipo y
                                            armamento que implican diferentes
                                            niveles de intensidad y desafío de
                                            resistencia física y psicológica con
                                            niveles graduales y progresivos.
                                        </li>
                                        <li class="mb-3">
                                            <b>e)</b> Participar en ejercicios,
                                            prácticas y pruebas, que incluyen
                                            varios niveles de estrés operativo,
                                            simulando la cercanía a la realidad
                                            operacional, implicando ruidos
                                            molestos, gritos, exclamaciones,
                                            fuego, incendios, detonaciones de
                                            explosivos, uso de Agentes Químicos
                                            (humo y gas para el mantenimiento
                                            del orden público) a diferentes
                                            niveles de intensidad y presión,
                                            según el periodo de instrucción en
                                            el que se encuentren y el objetivo
                                            al que se debe llegar para tener un
                                            servidor público policial con la
                                            templanza y equilibrio deseado para
                                            la actividad policial.
                                        </li>
                                        <li class="mb-3">
                                            <b>f)</b> Participar en ejercicios e
                                            instrucción a realizarse en
                                            diferentes alturas y profundidades,
                                            infraestructuras, montaña, peñascos,
                                            riscos, cañones cavernas, espacios
                                            confinados y similares.
                                        </li>

                                        <li class="mb-3">
                                            <b>g)</b> Participar en ejercicios e
                                            instrucción de natación utilitaria y
                                            desempeñar entrenamiento en
                                            supervivencia en aguas de diferente
                                            caudal, además de rescate acuático.
                                        </li>
                                        <li class="mb-3">
                                            <b>h)</b> Conducir vehículos de dos
                                            y cuatro ruedas.
                                        </li>
                                        <li class="mb-3">
                                            <b>i)</b> Participar en ejercicios y
                                            entrenamientos con animales,
                                            especialmente con caballos y canes.
                                        </li>
                                        <li class="mb-3">
                                            <b>j)</b> Participar en ejercicios e
                                            instrucción en modalidades
                                            combinadas de uno o varios de los
                                            establecidos en el presente artículo
                                            y que además incluyen periodos de
                                            práctica según el plan académico y
                                            plan, de estudios aprobado; además
                                            de la participación en revistas de
                                            evaluación.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- JERARQUIA INTERNA Y ASCENSOS -->
                    <div class="col-12 seccion py-5">
                        <div class="container">
                            <h2 class="titulo-seccion">
                                JERARQUIA INTERNA Y ASCENSOS
                            </h2>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInUp"
                                id="fat_aspectos22"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/fatescipol/FOTO FAT 023.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <p class="text-justify">
                                        La jerarquía entre los Alumnos(as) está
                                        determinada por el curso al que
                                        pertenecen y por el Grado Honorífico que
                                        ostentan en su último año de formación
                                        quienes conforman el “Batallón de
                                        Alumnos” de la Facultad Técnica Superior
                                        en Ciencias Policiales.
                                    </p>
                                    <p class="text-justify">
                                        A la culminación de cada gestión, se
                                        confiere los ascensos correspondientes a
                                        Alumnos(as) que cumplieron
                                        satisfactoriamente su formación, que a
                                        continuación se detalla:
                                    </p>
                                    <ul>
                                        <li class="mb-3">
                                            <b
                                                >1er. AÑO DE FORMACIÓN
                                                PROFESIONAL</b
                                            >
                                            <ul class="list-unstyled pl-3">
                                                <li>
                                                    <i
                                                        class="fa fa-caret-right"
                                                    ></i>
                                                    De Aspirante a Alumno de 1er
                                                    año
                                                </li>
                                                <li>
                                                    <i
                                                        class="fa fa-caret-right"
                                                    ></i>
                                                    De Alumno de 1er año a
                                                    Alumno de 2do año
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="mb-3">
                                            <b
                                                >2do. AÑO DE FORMACIÓN
                                                PROFESIONAL</b
                                            >
                                            <p class="text-justify">
                                                Alumnos destacados de 2do. año,
                                                son ascendidos con grados
                                                Honoríficos de:
                                            </p>
                                            <ul class="list-unstyled pl-3">
                                                <li>
                                                    <i
                                                        class="fa fa-caret-right"
                                                    ></i>
                                                    Alumno Mayor
                                                </li>
                                                <li>
                                                    <i
                                                        class="fa fa-caret-right"
                                                    ></i>
                                                    Alumno Primero
                                                </li>
                                                <li>
                                                    <i
                                                        class="fa fa-caret-right"
                                                    ></i>
                                                    Alumno Segundo
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInRight"
                                id="fat_aspectos23"
                            >
                                <div class="col-12">
                                    <SliderImagenes
                                        :imagenes="listDistinciones"
                                        :height="'400px'"
                                        :interval="3000"
                                    ></SliderImagenes>
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        DISTINCIONES
                                    </h5>
                                    <p class="text-justify">
                                        Las Alumnas y Alumnos que se destaquen
                                        en el estudio, la eficiencia en
                                        instrucción, el destacado rendimiento
                                        físico y su conducta sobrepasando el
                                        cumplimiento del deber, se les otorga
                                        las siguientes distinciones:
                                    </p>
                                    <ul class="text-justify">
                                        <li class="mb-3">
                                            <b class="d-block mb-2"
                                                >1er. AÑO DE FORMACIÓN
                                                PROFESIONAL</b
                                            >
                                            <ul class="list-unstyled pl-3">
                                                <li class="mb-2">
                                                    <i
                                                        class="fa fa-carot-right"
                                                    ></i>
                                                    <b>CORDÓN NARANJA:</b> A la
                                                    o el Alumno de 1er. año que
                                                    ocupa el primer lugar en
                                                    antigüedad, en el Cuadro de
                                                    Calificaciones del primer
                                                    Semestre.
                                                </li>
                                                <li class="mb-2">
                                                    <i
                                                        class="fa fa-carot-right"
                                                    ></i>
                                                    <b
                                                        >ESCOLTA DE LA BANDERA
                                                        DEL ORDEN:</b
                                                    >
                                                    A la o el Alumno que ocupa
                                                    el primer lugar en
                                                    antigüedad de 1er. año.
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="mb-3">
                                            <b class="mb-2 d-block"
                                                >2do. AÑO DE FORMACIÓN
                                                PROFESIONAL</b
                                            >
                                            <ul class="list-unstyled pl-3">
                                                <li class="mb-2">
                                                    <i
                                                        class="fa fa-caret-right"
                                                    ></i>
                                                    <b
                                                        >ABANDERADO DEL
                                                        ESTANDARTE NACIONAL DEL
                                                        INSTITUTO:</b
                                                    >
                                                    A la o el Alumno Mayor.
                                                </li>
                                                <li class="mb-2">
                                                    <i
                                                        class="fa fa-caret-right"
                                                    ></i>
                                                    <b
                                                        >AABANDERADO DE LA
                                                        BANDERA DEL ORDEN DEL
                                                        INSTITUTO:</b
                                                    >
                                                    A la o el Alumno Primero más
                                                    destacado después del Alumno
                                                    Mayor.
                                                </li>
                                                <li class="mb-2">
                                                    <i
                                                        class="fa fa-caret-right"
                                                    ></i>
                                                    <b
                                                        >ESCOLTAS DEL ESTANDARTE
                                                        NACIONAL DEL
                                                        INSTITUTO:</b
                                                    >
                                                    Alumnos de 2do. año más
                                                    destacados.
                                                </li>
                                                <li class="mb-2">
                                                    <i
                                                        class="fa fa-caret-right"
                                                    ></i>
                                                    <b>CORDÓN AZUL</b> “De
                                                    aprovechamiento”: A la o el
                                                    Alumno Mayor.
                                                </li>
                                                <li class="mb-2">
                                                    <i
                                                        class="fa fa-caret-right"
                                                    ></i>
                                                    <b>CORDÓN VERDE Y BLANCO</b>
                                                    “De Espíritu Policial”.
                                                </li>
                                                <li class="mb-2">
                                                    <i
                                                        class="fa fa-caret-right"
                                                    ></i>
                                                    <b>CORDÓN BLANCO</b> “De
                                                    Disciplina y Conducta”.
                                                </li>
                                                <li class="mb-2">
                                                    <i
                                                        class="fa fa-caret-right"
                                                    ></i>
                                                    <b>CORDÓN AMARILLO</b> “De
                                                    Tiro Policial”.
                                                </li>
                                                <li class="mb-2">
                                                    <i
                                                        class="fa fa-caret-right"
                                                    ></i>
                                                    <b>CORDÓN VERDE</b> “De
                                                    Deportes y Educación
                                                    Física”.
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- SEDES DE LA FACULTAD TÉCNICA SUPERIOR EN CIENCIAS POLICIALES -->
                    <div class="col-12 seccion py-5">
                        <div class="container">
                            <h2 class="titulo-seccion">
                                SEDES DE LA FACULTAD TÉCNICA SUPERIOR EN
                                CIENCIAS POLICIALES
                            </h2>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInUp"
                                id="fat_aspectos24"
                            >
                                <div class="col-12">
                                    <SliderImagenes
                                        :imagenes="listSedes"
                                        :height="'450px'"
                                        :interval="3000"
                                    ></SliderImagenes>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- TÍTULO PROFESIONAL -->
                    <div class="col-12 seccion py-5">
                        <div class="container">
                            <h2 class="titulo-seccion">TÍTULO PROFESIONAL</h2>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInUp"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/fatescipol/FOTO FAT 056.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <p class="text-justify">
                                        El plan de formación profesional es
                                        altamente selectivo, de permanente
                                        evaluación del desempeño académico y
                                        formativo por las exigencias de la
                                        profesión, por lo que se le otorga el
                                        Título y Diploma de
                                        <b>SARGENTO DE POLICÍA</b>, con el Grado
                                        Académico de
                                        <b
                                            >TÉCNICO SUPERIOR EN CIENCIAS
                                            POLICIALES</b
                                        >, se obtienen luego de haber culminado
                                        satisfactoriamente todo el programa de
                                        estudios y habiendo aprobado la
                                        modalidad de graduación.
                                    </p>
                                </div>
                            </div>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInRight"
                                id="fat_aspectos26"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/fatescipol/FOTO FAT 062.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        COMPETENCIAS DEL EGRESADO
                                    </h5>
                                    <p class="text-justify">
                                        Subteniente de la Policía Boliviana,
                                        Licenciado en Ciencias Policiales, quien
                                        luego de cuatro años de formación
                                        profesional, egresa preparado para
                                        liderar y conducir al personal
                                        subalterno en pro de la misión
                                        constitucional.
                                    </p>

                                    <p class="text-justify">
                                        Con capacidad para delegar, trabajar en
                                        equipo y manejar conflictos, con
                                        conocimientos técnico-científicos y
                                        tecnológicos policiales, manteniendo en
                                        todo momento una condición física que le
                                        permita dar respuesta a los desafíos de
                                        esta profesión. Posee habilidades
                                        comunicativas que le permiten
                                        interactuar con la sociedad en forma
                                        efectiva; con capacidades para formar e
                                        instruir a personal subalterno,
                                        motivándolos y estimulando en ellos la
                                        auto preparación y el auto
                                        entrenamiento, conforme a los estándares
                                        exigidos por la institución verde olivo.
                                    </p>
                                </div>
                            </div>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInLeft"
                                id="fat_aspectos28"
                            >
                                <div class="col-12 text-center">
                                    <h5 class="subtitulo-seccion text-center">
                                        GRADOS JERARQUICOS
                                    </h5>
                                    <SliderImagenes
                                        :imagenes="[
                                            {
                                                url_imagen:
                                                    url_asset +
                                                    '/imgs/fatescipol/FOTO FAT 057.svg',
                                            },
                                        ]"
                                        :height="'450px'"
                                    ></SliderImagenes>
                                </div>
                            </div>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInRight"
                                id="fat_aspectos27"
                            >
                                <div class="col-12">
                                    <SliderImagenes
                                        :imagenes="listCampoOcupacional"
                                        :height="'400px'"
                                        :interval="3000"
                                    ></SliderImagenes>
                                </div>
                                <div class="col-md-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        CAMPO OCUPACIONAL
                                    </h5>
                                    <p class="text-justify">
                                        Las y los Sargentos de Policía
                                        egresados, serán destinados a cumplir
                                        servicio en reparticiones policiales de
                                        la institución del orden
                                        <b
                                            >EN CUALQUIER PUNTO DEL TERRITORIO
                                            NACIONAL</b
                                        >, de acuerdo con las necesidades del
                                        servicio, la especialidad y plan de
                                        carrera.
                                    </p>
                                    <p class="text-justify">
                                        Para el efecto deberán firmar un acta de
                                        consentimiento, mediante el cual acepta
                                        de manera voluntaria el ser destinado y
                                        ejercer funciones policiales en
                                        cualquier punto del país y así hallarse
                                        al servicio de toda la sociedad
                                        boliviana.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FUNCIONES DE LA POLICIA -->
                    <!-- <div class="col-12 py-5">
                        <div class="container">
                            <h2 class="titulo-seccion">
                                FUNCIONES DE LA POLICÍA BOLIVIANA
                            </h2>
                            <div class="row py-3" id="fat_aspectos28">
                                <div class="col-md-4">
                                    <img
                                        :src="
                                            url_asset + '/imgs/F14 COD 001.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-md-8">
                                    <h5 class="subtitulo-seccion">
                                        Lorem Ipsum is simply dummy
                                    </h5>
                                    Lorem Ipsum is simply dummy text of the
                                    printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy
                                    text ever since the 1500s, when an unknown
                                    printer took a galley of type and scrambled
                                    it to make a type specimen book. It has
                                    survived not only five centuries, but also
                                    the leap into electronic typesetting,
                                    remaining essentially unchanged. It was
                                    popularised in the 1960s with the release of
                                    Letraset sheets containing Lorem Ipsum
                                    passages, and more recently with desktop
                                    publishing software like Aldus PageMaker
                                    including versions of Lorem Ipsum
                                </div>
                            </div>
                        </div>
                    </div> -->
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
