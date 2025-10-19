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
        url_imagen: url_asset.value + "/imgs/esbapolmus/FOTO ESB 044.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/esbapolmus/FOTO ESB 041.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/esbapolmus/FOTO ESB 043.jpg",
    },
]);

const listImagensInstruccion = ref([
    {
        url_imagen: url_asset.value + "/imgs/esbapolmus/FOTO ESB 033.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/esbapolmus/FOTO ESB 032.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/esbapolmus/FOTO ESB 031.jpg",
    },
]);
const listDistinciones = ref([
    {
        url_imagen: url_asset.value + "/imgs/esbapolmus/FOTO ESB 052.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/esbapolmus/FOTO ESB 054.jpg",
    },
]);

const listBecas = ref([
    {
        url_imagen: url_asset.value + "/imgs/F31 COD 001.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/F32 COD 001.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/F33 COD 001.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/F34 COD 001.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/F30 COD 001.jpg",
    },
]);

const listInfraestructura = ref([
    {
        url_imagen: url_asset.value + "/imgs/esbapolmus/FOTO ESB 049.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/esbapolmus/FOTO ESB 002.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/esbapolmus/FOTO ESB 051.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/esbapolmus/FOTO ESB 048.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/esbapolmus/FOTO ESB 047.jpg",
    },
]);

const listCampoOcupacional = ref([
    {
        url_imagen: url_asset.value + "/imgs/esbapolmus/FOTO ESB 055.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/esbapolmus/FOTO ESB 057.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/esbapolmus/FOTO ESB 059.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/esbapolmus/FOTO ESB 060.jpg",
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
                                    id="esb_aspectos1"
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
                                    id="esb_aspectos2"
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
                                    id="esb_aspectos3"
                                >
                                    <div class="col-12 text-center">
                                        <img
                                            :src="
                                                url_asset +
                                                '/imgs/esbapolmus/FOTO ESB 002.png'
                                            "
                                            class="img_seccion1"
                                            alt=""
                                        />
                                    </div>
                                    <div class="col-12">
                                        <h5
                                            class="subtitulo-seccion text-center"
                                        >
                                            MENSAJE DEL SEÑOR DIRECTOR DE LA
                                            ESCUELA BÁSICA POLICIAL DE MÚSICA
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
                                        <p class="w-100 text-center">
                                            My. MSc. Cesar Augusto Fernández
                                            Cabrera
                                        </p>
                                        <p
                                            class="w-100 text-center font-weight-bold"
                                        >
                                            DIRECTOR DE LA ESCUELA BÁSICA
                                            POLICIAL DE MÚSICA
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
                                id="esb_aspectos4"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/esbapolmus/FOTO ESB 004.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        ALUMNO
                                    </h5>
                                    <p class="text-justify">
                                        Alumno(a), es el estudiante de la
                                        Escuela Básica Policial de Música, que
                                        se forma de manera integral, en
                                        distintas áreas técnicas de las Ciencias
                                        Policiales y Artes Musicales, con
                                        valores y principios éticos, con
                                        pensamiento crítico; flexible y capaz de
                                        adaptarse a cualquier situación, con
                                        capacidad de trabajo en equipo,
                                        disciplinado, respetuoso de las normas
                                        legales, morales y de trato social;
                                        desarrollando permanentemente un buen
                                        estado físico, preparándose para cumplir
                                        funciones operativas, técnicas,
                                        logísticas y administrativas en unidades
                                        organizacionales de la Policía
                                        Boliviana, así como de cultivar el
                                        espíritu cívico y patriótico de las y
                                        los bolivianos.
                                    </p>
                                    <p class="text-justify">
                                        Alumno(a), es el futuro Sargento de
                                        Policía con especialidad en Artes
                                        Musicales, quien demuestra vocación de
                                        servicio a la sociedad, con actitud de
                                        permanente disponibilidad y compromiso
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
                                        humanos y la cercanía con la comunidad,
                                        son aspectos fundamentales.
                                    </p>
                                </div>
                            </div>

                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInRight"
                                id="esb_aspectos5"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/esbapolmus/FOTO ESB 006.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        VALORES Y PRINCIPIOS
                                    </h5>
                                    <p class="text-justify">
                                        La formación del Alumno(a) de la
                                        ESBAPOLMUS, está basada en valores y
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
                                            <b
                                                >E. TRABAJO EN EQUIPO Y
                                                LIDERAZGO:</b
                                            >
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
                                            <b>H. ESPÍRITU DE SACRIFICIO:</b> Es
                                            la disposición del Alumno que le
                                            impulsa a aceptar y anteponer el
                                            cumplimiento del deber a las
                                            comodidades, los intereses y las
                                            aspiraciones personales y si fuera
                                            necesario la entrega de la propia
                                            vida, por el servicio a la sociedad
                                            y cumplimiento del deber.
                                        </li>
                                        <li class="mb-2">
                                            <b>I. PERSEVERANCIA:</b> Es la
                                            determinación y constancia para
                                            alcanzar una meta a pesar de las
                                            dificultades, obstáculos o
                                            contratiempos. Implica la capacidad
                                            de seguir adelante, mantener el
                                            esfuerzo y la disciplina, incluso
                                            cuando las condiciones son adversas
                                            o el progreso es lento. servicio a
                                            la sociedad y cumplimiento del
                                            deber.
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
                                id="esb_aspectos6"
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
                                id="esb_aspectos7"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/esbapolmus/FOTO ESB 006.png'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        HISTORIA DE LA ESCUELA BÁSICA POLICIAL
                                        DE MÚSICA
                                    </h5>
                                    <p class="text-justify">
                                        La Escuela Básica Policial de Música, es
                                        una unidad Académica de Pregrado
                                        dependiente de la Universidad Policial
                                        “Mcal. Antonio José de Sucre”, creada
                                        mediante Resolución Administrativa de la
                                        Dirección Nacional de Instrucción y
                                        Enseñanza No. 039/2011, de fecha 29 de
                                        marzo de 2011, emitida por la Dirección
                                        Nacional de Instrucción y Enseñanza y
                                        rectorado de la Universidad Policial
                                        “Mcal. Antonio José de Sucre” a través
                                        de la misma se dispone la creación de la
                                        Escuela Básica Policial de Música en la
                                        comunidad de Kasapata, distrito Rural de
                                        Ucuchi del municipio de Sacaba,
                                        Provincia Chapare del Departamento de
                                        Cochabamba, homologada por Resolución
                                        Administrativa del Comando General de la
                                        Policía Boliviana No. 0765/11 de fecha
                                        10 de agosto de 2011; se encuentra bajo
                                        la tuición de la UNIPOL, quien ejerce
                                        normas y reglamentos para que este
                                        instituto cumpla su misión de educar y
                                        capacitar a sus recursos humanos.
                                    </p>
                                    <p class="text-justify">
                                        La Escuela Básica Policial de Música,
                                        comienza sus actividades a partir del
                                        mes de agosto de la gestión 2011, en la
                                        comunidad de Kasapata, distrito Rural de
                                        Ucuchi del municipio de Sacaba,
                                        Provincia Chapare del Departamento de
                                        Cochabamba, posteriormente por la falta
                                        de una infraestructura adecuada, a
                                        partir de inicios de la gestión 2012
                                        hasta la fecha desarrolla sus
                                        actividades en los ambientes ubicados en
                                        la zona Chimboco del municipio de
                                        Sacaba.
                                    </p>
                                    <p class="text-justify">
                                        Esta Unidad Académica, se encarga de la
                                        formación integral en Ciencias
                                        Policiales y Artes Musicales, para que
                                        los profesionales egresados, a la
                                        conclusión del plan de estudios, reciban
                                        el título en provisión nacional como
                                        Técnico Superior en Ciencias Policiales
                                        y Artes Musicales, prestando servicios
                                        en las diferentes Unidades Operativas y
                                        Comandos Departamentales de Policía del
                                        país, beneficiando a la ciudadanía con
                                        los servicios de seguridad e interacción
                                        social a través de la música.
                                    </p>
                                    <p
                                        class="text-center w-100 font-weight-bold"
                                    >
                                        14 años de vida institucional, formando
                                        a hombres y mujeres, Sargentos Músicos
                                        de Policía para Bolivia…
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
                                id="esb_aspectos8"
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
                                id="esb_aspectos9"
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
                                        Himno a la Escuela Básica Policial de
                                        Música
                                    </h5>
                                    <div class="d-block w-100 text-sm italic">
                                        <b>Letra:</b> Cap. MSc. Roger A. Yujra
                                        Chipana
                                    </div>
                                    <div class="d-block w-100 text-sm italic">
                                        <b>Música:</b>Sgto. 1ro. José C. Mitma
                                        Condori
                                    </div>
                                    <p class="text-center w-100 mt-3">
                                        De nuestra patria el legado es la
                                        ESCUELA Que lleva en alto el honor
                                        nacional Donde se forja los nobles
                                        guardianes Con honor, disciplina y
                                        lealtad.
                                    </p>
                                    <p class="text-center w-100">
                                        En tus aulas se escriben melodías
                                        Solemnes notas que entonamos con fervor
                                        Y resuenan en un canto infinito Que
                                        enaltecen a nuestra tricolor.
                                    </p>
                                    <p class="text-center w-100">
                                        <b>CORO</b><br />
                                        Policía, valiente y leal Investidos con
                                        nuestro verde olivo Al futuro de la
                                        patria juramos Que el bien, sobre el mal
                                        reinara. (bis)
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
                                id="esb_aspectos10"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/esbapolmus/FOTO ESB 007.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        MISIÓN
                                    </h5>
                                    <p class="text-justify">
                                        La Escuela Básica Policial de Música
                                        tiene como misión formar integralmente
                                        futuros servidores públicos en el Nivel
                                        Técnico Superior en Ciencias Policiales
                                        y Artes Musicales, para el fiel
                                        cumplimiento de la misión
                                        constitucional, respondiendo de manera
                                        efectiva a las demandas y requerimientos
                                        del Estado y la sociedad.
                                    </p>
                                </div>
                            </div>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInRight"
                                id="esb_aspectos11"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/esbapolmus/FOTO ESB 009.jpg'
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
                                        artística, científica, técnica y
                                        tecnológica; haciendo de los futuros
                                        Sargentos de la Policía Boliviana,
                                        profesionales idóneos capaces de
                                        responder y cumplir la misión asignada
                                        por el Estado Plurinacional de Bolivia.
                                    </p>
                                </div>
                            </div>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInLeft"
                                id="esb_aspectos12"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/esbapolmus/FOTO ESB 006.jpg'
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
                                        José de Sucre“, a través de la Escuela
                                        Básica Policial de Música, impulsa y
                                        desarrolla valores ÉTICO MORALES en sus
                                        componentes para hacer de la acción de
                                        servicio a la sociedad un apostolado;
                                        respetando los principios universales de
                                        los derechos y las garantías
                                        constitucionales, principios que van aún
                                        más allá de la vida misma, en el sublime
                                        acto de entrega por el bien mayor, bajo
                                        la premisa “Contra el Mal por el Bien de
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
                                id="esb_aspectos13"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/esbapolmus/FOTO ESB 010.jpg'
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
                                        su formación profesional, acorde a las
                                        exigencias que conlleva ser Sargento de
                                        Policía con el grado académico de
                                        Técnico Superior en Ciencias Policiales
                                        y Artes Musicales.
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
                                id="esb_aspectos14"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/esbapolmus/FOTO ESB 012.jpg'
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
                                        Escuela Básica Policial de Música cuenta
                                        con un currículo establecido en 4
                                        Semestres (2 años), siendo de gran
                                        importancia resaltar que en el último
                                        semestre de formación, realizan
                                        prácticas en distintas Unidades
                                        Policiales, que permitirán al futuro
                                        profesional desenvolverse en sus
                                        funciones de manera eficiente.
                                    </p>
                                    <p class="text-justify">
                                        Todo el programa académico, en
                                        circunstancias normales, se desarrolla
                                        bajo el régimen cerrado de internado,
                                        con limitación de salidas y con
                                        dedicación a tiempo completo. Por ello,
                                        es importante que la y el postulante
                                        tengan en cuenta estas características
                                        si acaso no es de su agrado permanecer
                                        estudiando y profesionalizándose en un
                                        régimen que restringe las salidas, pero
                                        además que tiene una vida en la que los
                                        niveles de privacidad absoluta no
                                        existen en vista de las características
                                        de la infraestructura y medios que se
                                        disponen que son compatibles con la vida
                                        en acuartelamiento que prepara al futuro
                                        profesional para la vida en las Unidades
                                        Policiales y para enfrentar dificultades
                                        en la vida profesional.
                                    </p>
                                </div>
                            </div>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInRight"
                                id="esb_aspectos15"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/esbapolmus/FOTO ESB 005.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        FORMACIÓN ACADÉMICA-POLICIAL
                                    </h5>
                                    <p class="text-justify">
                                        En la Escuela Básica Policial de Música,
                                        uno de los aspectos fundamentales para
                                        cumplimiento de la misión, es
                                        desarrollar actividades que permitan
                                        elevar la moral, civismo y el
                                        patriotismo así como el de coadyuvar a
                                        forjar el carácter y la disciplina de
                                        las y los Alumnos en formación
                                        profesional, a través de la música, así
                                        mismo se constituye en el nexo más
                                        eficaz entre la Policía Boliviana y
                                        sociedad, cumpliendo actividades cívico
                                        - patrióticas, culturales, sociales,
                                        deportivas y otras.
                                    </p>
                                </div>
                            </div>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInLeft"
                                id="esb_aspectos16"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/esbapolmus/FOTO ESB 014.jpg'
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
                                        policía hábitos saludables de vida, que
                                        le permitan enfrentar los rigores de las
                                        exigencias profesionales en diferentes
                                        ambientes y entornos generalmente
                                        desafiantes y de naturaleza extrema y
                                        peculiar.
                                    </p>
                                    <p class="text-justify">
                                        Participar en ejercicios de defensa
                                        personal de diferente grado y
                                        progresión, donde implique el contacto
                                        físico en condiciones muy similares a
                                        los posibles escenarios que pudiese
                                        encontrar el futuro profesional.
                                    </p>
                                </div>
                            </div>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInRight"
                                id="esb_aspectos17"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/esbapolmus/FOTO ESB 042.jpg'
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
                                        Sargento de Policía Músico, requiere la
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
                                id="esb_aspectos18"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/esbapolmus/FOTO ESB 040.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        FORMACIÓN INTEGRAL
                                    </h5>
                                    <p class="text-justify">
                                        La Escuela Básica Policial de Música
                                        como el primer instituto de formación
                                        integral en Ciencias Policiales y Artes
                                        Musicales única a nivel Nacional,
                                        desarrolla la formación académica
                                        integral impartiendo a los futuros
                                        Sargentos de Policía con especialidad en
                                        el Arte Musical, programas académicos de
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
                                id="esb_aspectos19"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/esbapolmus/FOTO ESB 024.jpg'
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
                                        Escuela Básica Policial de Música, forma
                                        a hombres y mujeres comprometidos a
                                        garantizar el ejercicio de los derechos
                                        humanos, en particular de las
                                        poblaciones vulnerables, asumiendo la
                                        igualdad de género, orientados a la
                                        equidad y no discriminación,
                                        incorporando la perspectiva de género en
                                        todo su accionar institucional.
                                    </p>
                                </div>
                            </div>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInLeft"
                                id="esb_aspectos20"
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
                                        Sargentos de Policía Músicos es
                                        integral, dirigida a generar
                                        competencias profesionales policiales,
                                        que le permitan planificar y ejecutar,
                                        en forma óptima las funciones operativas
                                        y administrativas de acuerdo con la
                                        misión de cada Unidad Operativa
                                        institucional, estando relacionados con
                                        lo siguiente:
                                    </p>
                                    <ul class="list-unstyled text-justify pl-4">
                                        <li class="mb-3">
                                            <b>a)</b> Participar en desfiles
                                            cívicos, paradas policiales y
                                            militares, eventos culturales,
                                            retretas musicales, presentaciones
                                            especiales, asistencias y otros
                                            relacionados con las Artes
                                            Musicales.
                                        </li>
                                        <li class="mb-3">
                                            <b>b)</b> Portar armas de fuego y,
                                            en su caso utilizarlas en diferentes
                                            modalidades e intensidades.
                                        </li>
                                        <li class="mb-3">
                                            <b>c)</b> Portar equipo, armamento,
                                            munición policial-militar, y en su
                                            caso utilizarlo en diferentes
                                            modalidades e intensidades.
                                        </li>
                                        <li class="mb-3">
                                            <b>d)</b> Participar en
                                            entrenamientos, capacitaciones,
                                            eventos y similares en ambientes
                                            peculiares extremos, en diferentes
                                            regiones del Estado Boliviano.
                                        </li>
                                        <li class="mb-3">
                                            <b>e)</b> Realizar ejercicios
                                            físicos, con o sin equipo y
                                            armamento que implican diferentes
                                            niveles de intensidad y desafío de
                                            resistencia física y psicológica con
                                            niveles graduales y progresivos.
                                        </li>
                                        <li class="mb-3">
                                            <b>f)</b> Participar en ejercicios,
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
                                            <b>g)</b> Participar en ejercicios e
                                            instrucción a realizarse en
                                            diferentes alturas y profundidades,
                                            infraestructuras, montaña, peñascos,
                                            riscos, cañones cavernas, espacios
                                            confinados y similares.
                                        </li>
                                        <li class="mb-3">
                                            <b>h)</b> Participar en ejercicios e
                                            instrucción de natación utilitaria y
                                            desempeñar entrenamiento en
                                            supervivencia en aguas de diferente
                                            caudal, además de rescate acuático.
                                        </li>
                                        <li class="mb-3">
                                            <b>i)</b> Conducir vehículos de dos
                                            y cuatro ruedas.
                                        </li>
                                        <li class="mb-3">
                                            <b>j)</b> Participar en ejercicios y
                                            entrenamientos con animales,
                                            especialmente con caballos y canes.
                                        </li>
                                        <li class="mb-3">
                                            <b>k)</b> Participar en ejercicios e
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
                    <!-- PRÁCTICA INSTRUMENTAL -->
                    <div class="col-12 seccion py-5">
                        <div class="container">
                            <h2 class="titulo-seccion">
                                PRÁCTICA INSTRUMENTAL
                            </h2>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInUp"
                                id="esb_aspectos21"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/esbapolmus/FOTO ESB 037.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion">
                                        INSTRUMENTOS DE PERCUSIÓN
                                    </h5>
                                    <p class="justify-text">
                                        En las Bandas de Música de la Policía
                                        Boliviana, los instrumentos de percusión
                                        son la base fundamental del ritmo y los
                                        más empleados son: El bombo, tambor,
                                        atabales, platillos y timbales.
                                    </p>
                                    <ul>
                                        <li>
                                            <b>TAMBOR:</b><br />
                                            Es un instrumento de percusión de
                                            sonido indeterminado, de resonancia
                                            brillante, se interpreta en un
                                            dialogo constante con el bombo, muy
                                            apto para efectos rítmicos y de
                                            redoble en la interpretación de
                                            marchas policiales y militares.
                                        </li>
                                        <li>
                                            <b>BOMBO:</b><br />
                                            El bombo es un instrumento de
                                            grandes dimensiones, las cualidades
                                            que caracterizan este instrumento es
                                            la grandeza del sonido que emite,
                                            por esta razón es la base
                                            fundamental del ritmo.
                                        </li>
                                        <li>
                                            <b>PLATILLOS:</b><br />
                                            Los platillos son dos discos de
                                            bronce, la resonancia se prolonga
                                            por largo tiempo, mayormente
                                            participa en ataques junto con el
                                            bombo en los sectores fuertes de la
                                            música.
                                        </li>
                                        <li>
                                            <b>ATABALES:</b><br />
                                            El atabal o redoblante tiene la
                                            forma más prolongada que el tambor,
                                            carece de bordón o cuerdas en la
                                            parte inferior; la ausencia de estas
                                            cuerdas le da una sonoridad sorda y
                                            sombría, pero más llena y grave que
                                            la del tambor. Las figuras rítmicas
                                            son las mismas que del tambor, muy
                                            adecuado para reforzar los ritmos de
                                            las marchas policiales y militares.
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/esbapolmus/FOTO ESB 040.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion">
                                        INSTRUMENTOS DE VIENTO
                                    </h5>
                                    <ul>
                                        <li>
                                            <b>SAXOFON:</b><br />
                                            Son considerados como instrumentos
                                            melódicos, sin embargo, es posible
                                            utilizarlos como instrumentos de
                                            acompañamiento, su mejor sonoridad
                                            se encuentra del registro medio al
                                            agudo, son instrumentos
                                            transpositores, porque sus
                                            afinaciones se encuentran en “Eb” y
                                            “Sib”. Los saxófonos en una Banda de
                                            Música, constituyen un elemento de
                                            unión entre los instrumentos de
                                            madera y metal; atenúan y dulcifican
                                            la aspereza del timbre de los
                                            instrumentos de metal. Todos los
                                            saxófonos se escriben en clave de
                                            Sol y todos ellos tienen poco más o
                                            menos la misma extensión en cuanto a
                                            su lectura, “no en sonido”.
                                        </li>
                                        <li>
                                            <b>CLARINETE:</b><br />
                                            Es un instrumento de caña simple
                                            puesta sobre una boquilla, tiene un
                                            registro amplio, abarca algo más de
                                            3 octavas, es un instrumento
                                            transpositor porque su afinación se
                                            encuentra en “Si bemol”; es
                                            considerado como un instrumento
                                            melódico, sin embargo es posible
                                            utilizarlo como un instrumento de 23
                                            acompañamiento, su mejor sonoridad
                                            se encuentra del registro medio al
                                            agudo, el registro grave tiene un
                                            timbre retumbante y obscuro.
                                        </li>
                                        <li>
                                            <b>FLAUTA:</b><br />
                                            Es un instrumento de boca, de
                                            notación y efecto real, se escribe
                                            en clave de SOL. La extensión de
                                            este instrumento es de tres octavas
                                            y un poco más, todos los pasajes
                                            melódicos rápidos, arpegios, saltos
                                            y escalas son cómodos en su
                                            interpretación, así como todos los
                                            trinos.
                                        </li>
                                        <li>
                                            <b>TROMBON:</b><br />
                                            La función del Trombón dentro de una
                                            Banda de Música es el acompañamiento
                                            armónico, sin embargo es posible
                                            utilizarlo también como instrumento
                                            melódico, su mejor sonoridad se
                                            encuentra del registro medio al
                                            agudo, se escribe en clave de FA
                                            4ta. Línea. El trombón a vara es un
                                            instrumento no transpositor, porque
                                            su afinación se encuentra en “Do”,
                                            las notas que interpreta este
                                            instrumento son sonidos reales
                                            idénticas al piano.
                                        </li>
                                        <li>
                                            <b>TROMPETA:</b><br />
                                            Es considerado como instrumento
                                            melódico, sin embargo es posible
                                            utilizarlo también como instrumento
                                            de acompañamiento, su mejor
                                            sonoridad se encuentra del registro
                                            medio al agudo, Se escribe en clave
                                            de SOL, es un instrumento
                                            transpositor, porque su afinación se
                                            encuentra en “Bb”.
                                        </li>
                                        <li>
                                            <b>FLISCORNO BARITONO:</b><br />
                                            La función del Barítono dentro de
                                            una Banda de Música es el
                                            acompañamiento armónico, sin
                                            embargo, es posible utilizarlo
                                            también como instrumento melódico,
                                            su mejor sonoridad se encuentra del
                                            registro medio al agudo, se escribe
                                            en clave de SOL, su efecto sonoro se
                                            encuentra a una 8va. Inferior por
                                            debajo de su escritura, esto con
                                            relación a la trompeta.
                                        </li>
                                        <li>
                                            <b>FLISCORNO BAJO GRAVE (TUBA):</b
                                            ><br />
                                            La función del Contrabajo dentro de
                                            una Banda de Música es el
                                            acompañamiento armónico,
                                            generalmente interpreta la
                                            fundamental de los acordes, sin
                                            embargo es posible utilizarlo
                                            también como instrumento melódico,
                                            su mejor sonoridad se encuentra del
                                            registro medio al agudo, Se escribe
                                            en clave de FA 4ta. línea y
                                            pertenece a la familia de los
                                            instrumentos transpositores.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- JERARQUIA INTERNA Y DISTINCIONES -->
                    <div class="col-12 seccion py-5">
                        <div class="container">
                            <h2 class="titulo-seccion">
                                JERARQUIA INTERNA Y DISTINCIONES
                            </h2>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInUp"
                                id="esb_aspectos22"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/esbapolmus/FOTO ESB 044.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        ASCENSOS
                                    </h5>
                                    <p class="text-justify">
                                        La jerarquía entre los Alumnos(as) está
                                        determinada por el curso al que
                                        pertenecen y por el Grado Honorífico que
                                        ostentan en su último año de formación
                                        quienes conforman el “Batallón de
                                        Alumnos” de la Escuela Básica Policial
                                        de Música.
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
                                            Alumnos destacados de 2do. año, son
                                            ascendidos con grados Honoríficos
                                            de:
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
                                id="esb_aspectos23"
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
                                    <p class="justify-text">
                                        Las Alumnas y Alumnos que se destaquen
                                        en el estudio. La eficiencia en
                                        instrucción, el Arte Musical, el
                                        destacado rendimiento físico y su
                                        conducta sobrepasando el cumplimiento
                                        del deber, se les otorga las siguientes
                                        distinciones:
                                    </p>
                                    <ul class="text-justify">
                                        <li class="mb-3">
                                            <b
                                                >1er. AÑO DE FORMACIÓN
                                                PROFESIONAL</b
                                            >
                                            <ul class="list-unstyled pl-3">
                                                <li>
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
                                                <li>
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
                                            <b
                                                >2do. AÑO DE FORMACIÓN
                                                PROFESIONAL</b
                                            >
                                            <ul class="list-unstyled pl-3">
                                                <li>
                                                    <i
                                                        class="fa fa-caret-right"
                                                    ></i>
                                                    ABANDERADO DEL ESTANDARTE
                                                    NACIONAL DEL INSTITUTO: A la
                                                    o el A la o el Alumno Mayor.
                                                </li>
                                                <li>
                                                    <i
                                                        class="fa fa-caret-right"
                                                    ></i>
                                                    ABANDERADO DE LA BANDERA DEL
                                                    ORDEN DEL INSTITUTO:A la o
                                                    el Alumno Primero más
                                                    destacado después del Alumno
                                                    Mayor.
                                                </li>
                                                <li>
                                                    <i
                                                        class="fa fa-caret-right"
                                                    ></i>
                                                    ESCOLTAS DEL ESTANDARTE
                                                    NACIONAL DEL INSTITUTO:
                                                    Alumnos de 2do. año más
                                                    destacados.
                                                </li>
                                                <li>
                                                    <i
                                                        class="fa fa-caret-right"
                                                    ></i>
                                                    CORDÓN AZUL “De
                                                    aprovechamiento”: A la o el
                                                    Alumno Mayor.
                                                </li>
                                                <li>
                                                    <i
                                                        class="fa fa-caret-right"
                                                    ></i>
                                                    CORDÓN VERDE Y BLANCO “De
                                                    Espíritu Policial”.
                                                </li>
                                                <li>
                                                    <i
                                                        class="fa fa-caret-right"
                                                    ></i>
                                                    CORDON VERDE Y AMARILLO “Al
                                                    Arte Musical”
                                                </li>
                                                <li>
                                                    <i
                                                        class="fa fa-caret-right"
                                                    ></i>
                                                    CORDÓN BLANCO “De Disciplina
                                                    y Conducta”.
                                                </li>
                                                <li>
                                                    <i
                                                        class="fa fa-caret-right"
                                                    ></i>
                                                    CORDÓN AMARILLO “De Tiro
                                                    Policial”.
                                                </li>
                                                <li>
                                                    <i
                                                        class="fa fa-caret-right"
                                                    ></i>
                                                    CORDÓN VERDE “De Deportes y
                                                    Educación Física”.
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- INFRAESTRUCTURA -->
                    <div class="col-12 py-5">
                        <div class="container">
                            <h2 class="titulo-seccion">INFRAESTRUCTURA</h2>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInUp"
                                id="esb_aspectos24"
                            >
                                <div class="col-md-12">
                                    <SliderImagenes
                                        :imagenes="listInfraestructura"
                                        :height="'400px'"
                                        :interval="3000"
                                    ></SliderImagenes>
                                </div>
                                <div class="col-12">
                                    La Escuela Básica Policial de Música cuenta
                                    con los siguientes ambientes:
                                    <ul>
                                        <li>
                                            <b>Área administrativa: </b>Oficinas
                                            (Dirección, Subdirección, Dpto. de
                                            Instrucción, etc.).
                                        </li>
                                        <li>
                                            <b>Área Académica:</b> Aulas,
                                            Auditorio, Laboratorios, Biblioteca,
                                            etc.
                                        </li>
                                        <li>
                                            <b>Área de Instrucción:</b> Patio de
                                            Honor, Campo de Instrucción,
                                            Polígono de Tiro, Jardín de
                                            Obstáculos, campo de estrés, etc.
                                        </li>
                                        <li>
                                            <b>Área de Descanso:</b>
                                            Dormitorios, duchas y baños (Damas y
                                            Varones)
                                        </li>
                                        <li>
                                            <b>Área de Servicios:</b> Cocina,
                                            Comedor, Lavandería, etc.
                                        </li>
                                        <li>
                                            <b>Área deportiva:</b> Canchas,
                                            Multifuncional, Piscina, etc.
                                        </li>
                                    </ul>
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
                                id="esb_aspectos25"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset +
                                            '/imgs/esbapolmus/FOTO ESB 004.jpg'
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
                                        Título Profesional de Técnico Superior
                                        en Ciencias Policiales y Artes Musicales
                                        con el grado jerárquico de Sargento, que
                                        se obtienen luego de haber culminado
                                        satisfactoriamente todo el programa de
                                        estudios y habiendo aprobado una de las
                                        modalidades de graduación.
                                    </p>
                                </div>
                            </div>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInLeft"
                                id="esb_aspectos26"
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
                                                    '/imgs/esbapolmus/FOTO ESB 053.svg',
                                            },
                                        ]"
                                        :height="'450px'"
                                    ></SliderImagenes>
                                </div>
                            </div>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInRight"
                                id="esb_aspectos27"
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
                                        Las y los Sargentos de Policía Músicos,
                                        serán destinados a desempeñarse como
                                        intérpretes y componentes de las Bandas
                                        de Música en reparticiones policiales de
                                        la institución del orden y
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
                            <div class="row py-3" id="esb_aspectos28">
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
