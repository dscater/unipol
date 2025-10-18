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
import NavBar from "@/Pages/Portal/Anapol/Parcial/Navbar.vue";
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
        url_imagen: url_asset.value + "/imgs/F14 COD 001.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/F15 COD 001.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/F16 COD 001.jpg",
    },
]);

const listImagensInstruccion = ref([
    {
        url_imagen: url_asset.value + "/imgs/f18 cod 001.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/F22 COD 001.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/F20 COD 001.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/F23 COD 001.jpg",
    },
]);
const listDistinciones = ref([
    {
        url_imagen: url_asset.value + "/imgs/F28 COD 001.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/F29 COD 001.jpg",
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
        url_imagen: url_asset.value + "/imgs/F28 COD 001.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/F25 COD 001.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/F5 COD 001.jpg",
    },
]);

const listCampoOcupacional = ref([
    {
        url_imagen: url_asset.value + "/imgs/F38 COD 001.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/F39 COD 001.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/F40 COD 001.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/F41 COD 001.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/F42 COD 001.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/F43 COD 001.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/F44 COD 001.jpg",
    },
    {
        url_imagen: url_asset.value + "/imgs/F45 COD 001.jpg",
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
                                    id="ana_aspectos1"
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
                                            nuestro país. Ser policía es más que
                                            una profesión, es un compromiso con
                                            la protección y el servicio al
                                            pueblo, el valor, la virtud y la
                                            voluntad necesaria para construir
                                            una sociedad justa, segura por el
                                            bien de todos. La Academia Nacional
                                            de Policías, alma mater de la
                                            institución, es el lugar donde se
                                            forjan mujeres y hombres con
                                            decisión, con espíritu
                                            inquebrantable, carácter, coraje y
                                            sentido del deber. Estén seguros
                                            que; en su futura casa de estudios,
                                            les serán entregados conocimientos,
                                            habilidades, destrezas y valores
                                            suficientes como para enfrentar los
                                            desafíos del siglo XXI, que los
                                            convertirán en héroes silenciosos,
                                            respetuosos de la ley y el orden,
                                            comprometidos con la patria y la
                                            sociedad, disciplinados y leales
                                            cuyo propósito es el servicio a
                                            Bolivia. A nombre de la institución,
                                            les invito a sumarse a la Policía
                                            del Bicentenario, reto que se inicia
                                            con ustedes, con quienes se
                                            escribirá las nuevas páginas de la
                                            historia policial.
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
                                    id="ana_aspectos2"
                                >
                                    <div class="col-12 text-center">
                                        <img
                                            :src="
                                                url_asset +
                                                '/imgs/emblemaUnipol.png'
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
                                            La Academia Nacional de Policías, es
                                            la Facultad de Ciencias Policiales a
                                            nivel licenciatura de la Universidad
                                            Policial, constituyéndose en el
                                            primer y único instituto de
                                            formación de oficiales de la Policía
                                            de Bolivia, que ha apostado por la
                                            generación de oportunidades para las
                                            y los jóvenes que tienen vocación de
                                            servicio a la comunidad, porque la
                                            dama o caballero Cadete se forma de
                                            manera integral, en distintos campos
                                            de las ciencias policiales, con
                                            valores y principios éticos, con
                                            pensamiento analítico, estratégico y
                                            táctico; flexible y capaz de
                                            adaptarse a cualquier situación, con
                                            capacidad de trabajo en equipo,
                                            disciplinado, respetuoso de las
                                            normas legales, morales y de trato
                                            social, desarrollando un buen estado
                                            físico, preparándose para liderar y
                                            comandar unidades policiales:
                                            operativas, técnicas, logísticas y
                                            administrativas, en cumplimiento de
                                            la misión constitucional de la
                                            Policía Boliviana. La dama o
                                            caballero Cadete, es el futuro
                                            Oficial de Policía, con vocación de
                                            servicio a la comunidad, con una
                                            actitud de permanente disponibilidad
                                            y compromiso institucional,
                                            preparado para afrontar los riesgos
                                            y peligros de la profesión y si
                                            fuera necesario ofrendar su propia
                                            vida, en defensa de la sociedad y la
                                            patria. Como Rector de la
                                            Universidad Policial, tengo el honor
                                            de extender una invitación especial
                                            a todos los bachilleres de Bolivia,
                                            que cumplan los requisitos para ser
                                            Oficial de Policía y ser parte de la
                                            Policía Boliviana, dedicada a
                                            proteger y servir con integridad y
                                            valentía a nuestra sociedad.
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
                                    id="ana_aspectos3"
                                >
                                    <div class="col-12 text-center">
                                        <img
                                            :src="
                                                url_asset +
                                                '/imgs/emblemaUnipol.png'
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
                                            FACULTAD DE CIENCIAS POLICIALES
                                            “ACADEMIA NACIONAL DE POLICÍAS”
                                        </h5>
                                        Juventud de toda Bolivia<br />
                                        <p>
                                            Reciban un cordial saludo y nuestras
                                            felicitaciones por tomar la valiente
                                            decisión de aspirar a formar parte
                                            de la Academia Nacional de Policías,
                                            en donde se forman futuros policías
                                            para brindar seguridad y lograr el
                                            bienestar de nuestra sociedad. Al
                                            asumir este compromiso, están dando
                                            un paso firme hacia una profesión
                                            noble, de responsabilidad y entrega,
                                            donde el servicio al ciudadano será
                                            su vocación diaria. La carrera
                                            policial es mucho más que un
                                            trabajo; es una forma de vida que
                                            exige integridad, disciplina,
                                            lealtad y valor. Durante su
                                            formación, se enfrentarán a desafíos
                                            que pondrán a prueba no solo sus
                                            conocimientos, sino también su
                                            carácter y su fortaleza. La
                                            capacitación en la Academia Nacional
                                            de Policías les brindará
                                            herramientas para actuar con
                                            profesionalismo, respeto a los
                                            derechos humanos y una ética
                                            intachable, valores esenciales en un
                                            policía que tiene como misión
                                            proteger y servir a la comunidad.
                                            Ser policía requiere el compromiso
                                            de contribuir a la construcción de
                                            una sociedad justa y segura,
                                            defendiendo la ley y protegiendo la
                                            paz con honor. Cada uno de ustedes
                                            será un pilar en el fortalecimiento
                                            de la seguridad ciudadana y, sobre
                                            todo, en la confianza que la
                                            sociedad deposita en nosotros. Los
                                            animamos a vivir este proceso con
                                            esfuerzo y dedicación, para que al
                                            final del camino puedan llevar el
                                            uniforme con orgullo, siendo ejemplo
                                            de servicio y dignidad.
                                        </p>
                                        <p class="w-100 text-center">
                                            Cnl. MSc. CAD. Jesús Silva
                                            Villafuerte
                                        </p>
                                        <p
                                            class="w-100 text-center font-weight-bold"
                                        >
                                            DIRECTOR DE LA FACULTAD DE CIENCIAS
                                            POLICIALES “ACADEMIA NACIONAL DE
                                            POLICÍAS”
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- VALORES Y PRINCIPIOS DEL CADETE -->
                    <div class="col-12 seccion py-5" id="ana_aspectos4">
                        <div class="container">
                            <h2 class="titulo-seccion">
                                VALORES Y PRINCIPIOS DEL CADETE
                            </h2>

                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInUp"
                                id="ana_aspectos5"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset + '/imgs/F2 COD 001.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        CADETE
                                    </h5>
                                    <p class="text-justify">
                                        La palabra “Cadete” tiene sus raíces en
                                        el francés “cadet”, que significa “hijo
                                        menor” o “joven noble”, históricamente
                                        hacía referencia a los jóvenes de
                                        familias nobles que ingresaban a la
                                        milicia para buscar honor y formación.
                                        Esta tradición se expandió por Europa y
                                        América, siendo adoptada por
                                        instituciones militares y policiales
                                        como símbolo de disciplina y liderazgo
                                        en formación. En Bolivia, la historia de
                                        los caballeros cadetes policiales se
                                        remonta al año 1937, cuando se recibió
                                        una misión de los Carabineros de Italia
                                        para establecer la primera formación
                                        profesional de oficiales con
                                        entrenamiento especializado en la
                                        profesión de policía. Posteriormente el
                                        año 1973, se incorpora las damas
                                        cadetes, este hito permitió que las
                                        mujeres accedieran a roles operativos y
                                        administrativos dentro de la policía,
                                        contribuyendo a una perspectiva más
                                        inclusiva y diversa en las fuerzas del
                                        orden.
                                    </p>
                                    <p class="text-justify">
                                        El Caballero y Dama Cadete, no solo es
                                        un estudiante, es el futuro Oficial de
                                        Policía, que encarna los valores de una
                                        institución de más de 198 años, que
                                        avanza hacia la Policía del Bicentenario
                                        con un enfoque más profesional, más
                                        centrado en el factor humano y la
                                        cercanía con la comunidad. Los cadetes
                                        representan la promesa de una nueva
                                        generación de policías formados bajo una
                                        doctrina que prioriza el conocimiento,
                                        la ética, el servicio, y el respeto a
                                        los derechos humanos.
                                    </p>
                                    <p class="text-justify">
                                        La inclusión de damas cadetes en la
                                        formación policial no solo ha
                                        enriquecido la diversidad de la
                                        institución, sino que también ha
                                        reforzado el compromiso con la equidad
                                        de género y la integración. Tanto los
                                        caballeros como las damas cadetes son
                                        formados para enfrentar los desafíos del
                                        servicio policial con valentía,
                                        inteligencia y sensibilidad, aportando
                                        una perspectiva más inclusiva y adaptada
                                        a las demandas contemporáneas.
                                    </p>
                                    <p class="text-justify">
                                        Finalmente, en un momento crucial para
                                        la transformación institucional, los
                                        caballeros y damas Cadetes representan
                                        el futuro de la Policía del
                                        Bicentenario. Su formación no solo
                                        implica adquirir conocimientos
                                        operativos, legales, técnicos y
                                        administrativos, sino también adoptar
                                        una nueva visión de servicio, donde el
                                        respeto por los derechos humanos y la
                                        cercanía con la comunidad son aspectos
                                        fundamentales.
                                    </p>
                                </div>
                            </div>

                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInRight"
                                id
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset + '/imgs/F37 COD 001.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        VALORES Y PRINCIPIOS
                                    </h5>
                                    <p class="text-justify">
                                        La formación de caballero o dama cadete
                                        policial, está basada en valores y
                                        principios que forjan el carácter, que
                                        generan sentido de pertenencia a su
                                        institución y guían su desempeño futuro.
                                        Entre los valores más importantes se
                                        encuentran:
                                    </p>
                                    <ul class="list-unstyled">
                                        <li>
                                            <b>A. DISCIPLINA:</b> Es la base de
                                            la formación del cadete, permitiendo
                                            desarrollar autocontrol y la
                                            capacidad de actuar con precisión en
                                            situaciones críticas.
                                        </li>
                                        <li>
                                            <b>B. HONOR Y LEALTAD:</b> El Cadete
                                            se compromete a ser ejemplo de
                                            integridad, manteniendo siempre el
                                            respeto hacia la institución y la
                                            sociedad.
                                        </li>
                                        <li>
                                            <b>C. VOCACIÓN DE SERVICIO:</b> La
                                            misión principal del Cadete es
                                            servir a la comunidad, priorizando
                                            siempre el bienestar de los
                                            ciudadanos, actuando con humanidad y
                                            empatía.
                                        </li>
                                        <li>
                                            <b>D. RESILIENCIA Y VALENTÍA:</b>
                                            Durante su formación, el Cadete
                                            enfrenta desafíos físicos y mentales
                                            que fortalecen su capacidad para
                                            superar adversidades y actuar con
                                            coraje ante el peligro.
                                        </li>
                                        <li>
                                            <b
                                                >E. TRABAJO EN EQUIPO Y
                                                LIDERAZGO:</b
                                            >
                                            Se fomenta la cooperación y el
                                            desarrollo de habilidades de
                                            liderazgo, preparando al Cadete para
                                            dirigir y trabajar en equipo con
                                            otros miembros de la fuerza
                                            policial.
                                        </li>
                                        <li>
                                            <b>F. ENERGÍA:</b> La energía y
                                            dinamismo caracteriza al Cadete como
                                            jóvenes dinámicos y proactivos. Se
                                            refleja en su entusiasmo, vigor
                                            físico y disposición para enfrentar
                                            retos con determinación.
                                        </li>
                                        <li>
                                            <b>G. ESPÍRITU DE CUERPO:</b> Este
                                            valor representa la unidad y la
                                            cohesión entre los cadetes,
                                            promoviendo el sentido de
                                            pertenencia y camaradería. El
                                            espíritu de cuerpo fortalece el
                                            compromiso mutuo y la moral,
                                            enseñando a los cadetes a trabajar
                                            como un equipo sólido y a apoyarse
                                            unos a otros, especialmente en
                                            situaciones difíciles.
                                        </li>
                                        <li>
                                            <b>H. ESPÍRITU DE SACRIFICIO:</b> Es
                                            la disposición del caballero o dama
                                            Cadete que le impulsa a aceptar y
                                            anteponer el cumplimiento del deber
                                            a las 8 comodidades, los intereses y
                                            las aspiraciones personales y si
                                            fuera necesario la entrega de la
                                            propia vida, por el servicio a la
                                            sociedad y cumplimiento del deber.
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
                                id="ana_aspectos6"
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
                                id="ana_aspectos7"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset + '/imgs/F5 COD 001.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        HISTORIA DE LA ACADEMIA NACIONAL DE
                                        POLICÍAS
                                    </h5>
                                    <p class="text-justify">
                                        La Academia Nacional de Policías, fue
                                        creada mediante D.S. del 26 de febrero
                                        de 1937, durante la presidencia del Cnl.
                                        David Toro Ruilova, con el nombre de
                                        “Escuela Nacional de Policías y
                                        Carabineros”, inició sus actividades en
                                        el entonces cuartel “Calama”, para luego
                                        trasladarse a la calle Loayza. El 27 de
                                        junio de 1955, por Decreto Supremo N°
                                        4103 cambia el nombre de “Escuela
                                        Nacional de Policías y Carabineros” por
                                        “Academia de Carabineros y Policías”,
                                        asignándole funciones de preparación,
                                        habilitación, especialización y
                                        perfeccionamiento. En el año 1963,
                                        mediante Decreto Supremo N° 06338, de
                                        conformidad con la Ley Orgánica de la
                                        Policía Nacional de 9 de enero de 1962
                                        se aprobó el Reglamento Orgánico de la
                                        Academia Nacional de Policías,
                                        Reglamento Interno, de Disciplina y el
                                        Plan de Enseñanza, adoptando las
                                        características que al presente ostenta
                                        iniciando sus actividades en 1964 en los
                                        predios que se encuentran ubicados en la
                                        zona de Bajo Següencoma de la ciudad de
                                        La Paz; en el año 2012 la ANAPOL celebró
                                        sus Bodas de Diamante que representan 75
                                        años de vida Institucional, formando a
                                        hombres y mujeres comprometidos con el
                                        servicio a la Patria y a su pueblo.
                                    </p>
                                    <p class="text-justify">
                                        Mediante R. M. No. 408/06 fechada el 28
                                        de noviembre de 2006, se autoriza la
                                        apertura de la Universidad Policial
                                        “Mcal. Antonio José de Sucre”, siendo la
                                        Academia Nacional de Policías, una
                                        Unidad Académica de Formación Policial
                                        de Grado a nivel Licenciatura, 10
                                        otorgando a sus egresados el grado
                                        jerárquico de Subteniente de Policía y
                                        el grado académico de Licenciado en
                                        Ciencias Policiales.
                                    </p>
                                    <p
                                        class="text-center w-100 font-weight-bold"
                                    >
                                        88 años formando a los futuros Oficiales
                                        de la Policía Boliviana…
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
                                id="ana_aspectos8"
                            >
                                <div class="col-12">
                                    <iframe
                                        src="https://www.youtube.com/embed/FcK5HvGr9do"
                                        frameborder="0"
                                        allowfullscreen
                                        width="100%"
                                        height="400px"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    ></iframe>
                                </div>
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
                            </div>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInRight"
                                id="ana_aspectos9"
                            >
                                <div class="col-12">
                                    <iframe
                                        src="https://www.youtube.com/embed/FcK5HvGr9do"
                                        frameborder="0"
                                        allowfullscreen
                                        width="100%"
                                        height="400px"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    ></iframe>
                                </div>
                                <div class="col-md-6 offset-md-3">
                                    <h5 class="subtitulo-seccion text-center">
                                        Himno a la Academia Nacional de Policías
                                    </h5>
                                    <div class="d-block w-100 text-sm italic">
                                        <b>Letra y Música:</b> Tcnl. Adrián
                                        Patiño Carpio
                                    </div>
                                    <p class="text-center w-100 mt-3">
                                        Disciplina y amor al trabajo Sacro lema
                                        de aqueste plantel Forjarán el ideal que
                                        nos trajo Para hacer de la patria un
                                        edén.
                                    </p>
                                    <p class="text-center w-100">
                                        Caballero de honor y energía Por el
                                        orden velando y la ley Son tu emblema
                                        blasón policía Más que cetro y corona de
                                        rey.
                                    </p>
                                    <p class="text-center w-100">
                                        En la escuela del buen policía Forja el
                                        hombre su gran porvenir Los poblados
                                        tendrán garantía Las naciones tranquilo
                                        vivir.
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
                                id="ana_aspectos10"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset + '/imgs/F7 COD 001.jpg'
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
                                        Ciencias Policiales, Oficiales de
                                        Policía, destinados a brindar servicios
                                        intangibles de seguridad y defensa de la
                                        sociedad, enmarcados en altos valores de
                                        disciplina, ética, honestidad,
                                        transparencia, justicia, equidad,
                                        igualdad y respeto a los derechos
                                        humanos.
                                    </p>
                                </div>
                            </div>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInRight"
                                id="ana_aspectos11"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset + '/imgs/F25 COD 001.jpg'
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
                                        de los futuros Oficiales de la Policía
                                        Boliviana, profesionales idóneos,
                                        capaces de responder y cumplir la misión
                                        asignada por el Estado Plurinacional de
                                        Bolivia.
                                    </p>
                                </div>
                            </div>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInLeft"
                                id="ana_aspectos12"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset + '/imgs/F41 COD 001.jpg'
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
                                        José de Sucre” a través de la Facultad
                                        de Ciencias Policiales “Academia
                                        Nacional de Policías”, impulsa y
                                        desarrolla valores ÉTICO MORALES en sus
                                        componentes para hacer de la acción de
                                        servicio a la sociedad un apostolado,
                                        respetando los principios universales de
                                        los derechos y garantías
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
                                id="ana_aspectos13"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset + '/imgs/F8 COD 001.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <p class="text-justify">
                                        Señoritas y jóvenes bolivianos, quienes
                                        cuentan con: educación humanística,
                                        educación técnica - tecnológica,
                                        formación integral, formación
                                        científica, formación espiritual, ética,
                                        moral, formación artística y cultural,
                                        formación deportiva; conscientes de las
                                        exigencias y retos que deben afrontar en
                                        su Formación Profesional, acorde a las
                                        exigencias que conlleva ser Oficial de
                                        Policía con el grado académico de
                                        Licenciado en Ciencias Policiales y el
                                        grado jerárquico de Subteniente de
                                        Policía.
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
                                id="ana_aspectos14"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset + '/imgs/F9 COD 001.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        CARACTERISTICAS DEL REGIMEN DE ESTUDIOS
                                    </h5>
                                    <p class="text-justify">
                                        La formación es de Régimen Especial,
                                        cuenta con un currículo establecido en 8
                                        semestres (4 años), siendo de gran
                                        importancia resaltar que en el último
                                        semestre de formación realizan prácticas
                                        policiales en las distintas unidades
                                        policiales, que permitirán al futuro
                                        profesional desenvolverse en sus
                                        funciones.
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
                                id="ana_aspectos15"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset + '/imgs/F10 COD 001.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        FORMACIÓN ACADÉMICA-POLICIAL
                                    </h5>
                                    <p class="text-justify">
                                        Comprende actividades de instrucción de
                                        orden cerrado y orden abierto.
                                        Entrenamiento policial, que se
                                        desarrollan en aulas y en espacios
                                        abiertos y acordes para la práctica,
                                        proporcionando conocimientos
                                        filosóficos, teóricos doctrinarios y
                                        técnicos de las Ciencias Policiales,
                                        necesarios para el ejercicio profesional
                                        en las unidades bajo su responsabilidad,
                                        como el planeamiento, conducción y
                                        ejecución de servicios y operaciones
                                        policiales de seguridad interna y
                                        desarrollo del Estado Plurinacional de
                                        Bolivia.
                                    </p>
                                </div>
                            </div>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInLeft"
                                id="ana_aspectos16"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset + '/imgs/F11 COD 001.jpg'
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
                                        mejorar la condición física de la Dama y
                                        Caballero Cadete, orientada a forjar
                                        exigencias propias de la profesión
                                        mejorando condiciones de agilidad,
                                        resistencia física y técnicas de defensa
                                        personal, pero además de formar en el
                                        futuro policía hábitos saludables de
                                        vida que le permitan enfrentar los
                                        rigores de las exigencias profesionales
                                        en diferentes ambientes y entornos
                                        generalmente desafiantes y de naturaleza
                                        extrema y peculiar.
                                    </p>
                                </div>
                            </div>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInRight"
                                id="ana_aspectos17"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset + '/imgs/F12 COD 001.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        FORMACIÓN ÉTICO Y MORAL (DISCIPLINA)
                                    </h5>
                                    <p class="text-justify">
                                        La formación integral del futuro Oficial
                                        de Policía, requiere la aprensión de
                                        normas que adecúen su comportamiento a
                                        exigencias sociales, estatales e
                                        institucionales, en la pretensión de
                                        convertirlo en referente de servidor
                                        público, depositario de la confianza
                                        ciudadana, guardián de la seguridad
                                        pública y garante de los derechos
                                        humanos.
                                    </p>
                                </div>
                            </div>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInLeft"
                                id="ana_aspectos18"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset + '/imgs/F12 COD 001.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        FORMACIÓN INTEGRAL
                                    </h5>
                                    <p class="text-justify">
                                        La Academia Nacional de Policías,
                                        desarrolla una formación académica
                                        integral impartiendo a los futuros
                                        Oficiales de Policía programas
                                        académicos de profesionalización
                                        complementados con actividades socio
                                        culturales que desarrollan la
                                        creatividad artística, literaria,
                                        musical, pictórica y otros talentos en
                                        las Damas y Caballeros Cadetes; si bien
                                        estimula las prácticas deportivas como
                                        actividad recreativa, lo más importante
                                        es la formación intelectual con valores,
                                        principios y compromiso en un entorno de
                                        exigencia disciplinario riguroso.
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
                                id="ana_aspectos19"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset + '/imgs/F17 COD 001.jpg'
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
                                        Academia Nacional de Policías, forma a
                                        hombres y mujeres comprometidos a
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
                                id="ana_aspectos20"
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
                                        Oficiales de Policía es integral,
                                        dirigida a generar competencias
                                        profesionales policiales, que le
                                        permitan planificar y ejecutar, en forma
                                        óptima las funciones operativas y
                                        administrativas de acuerdo con la misión
                                        de cada Unidad Operativa institucional,
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
                    <!-- JERARQUIA INTERNA Y DISTINCIONES -->
                    <div class="col-12 seccion py-5">
                        <div class="container">
                            <h2 class="titulo-seccion">
                                JERARQUIA INTERNA Y DISTINCIONES
                            </h2>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInUp"
                                id="ana_aspectos21"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset + '/imgs/F26 COD 001.jpg'
                                        "
                                        alt=""
                                    />
                                </div>
                                <div class="col-12">
                                    <h5 class="subtitulo-seccion text-center">
                                        ASCENSOS
                                    </h5>
                                    <p class="text-justify">
                                        La jerarquía entre las Damas y
                                        Caballeros Cadetes está determinada por
                                        el curso al que pertenecen y por el
                                        Grado Honorífico que ostentan en su
                                        último año de formación quienes
                                        conforman el “Batallón de Cadetes” de la
                                        Academia Nacional de Policías.
                                    </p>
                                    <p class="text-justify">
                                        A la culminación de cada gestión, se
                                        confiere los ascensos correspondientes a
                                        Damas y Caballeros Cadetes que
                                        cumplieron satisfactoriamente su
                                        formación, que a continuación se
                                        detalla:
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
                                                    De Aspirante a Cadete de 1er
                                                    año
                                                </li>
                                                <li>
                                                    <i
                                                        class="fa fa-caret-right"
                                                    ></i>
                                                    De Cadete de 1er año a
                                                    Cadete de 2do año
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
                                                    De Cadete de 2do año a
                                                    Cadete de 3er año
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="mb-3">
                                            <b
                                                >3er. AÑO DE FORMACIÓN
                                                PROFESIONAL</b
                                            >
                                            <ul class="list-unstyled pl-3">
                                                <li>
                                                    <i
                                                        class="fa fa-caret-right"
                                                    ></i>
                                                    De Cadete de 3er año a
                                                    Cadete de 4to año
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <b
                                                >4to. AÑO DE FORMACIÓN
                                                PROFESIONAL</b
                                            >
                                            <br />
                                            Cadetes destacados de 4to año, son
                                            ascendidos con grados Honoríficos
                                            de:

                                            <ul class="list-unstyled pl-3">
                                                <li>
                                                    <i
                                                        class="fa fa-caret-right"
                                                    ></i>
                                                    Brigadier Mayor
                                                </li>
                                                <li>
                                                    <i
                                                        class="fa fa-caret-right"
                                                    ></i>
                                                    Brigadier
                                                </li>
                                                <li>
                                                    <i
                                                        class="fa fa-caret-right"
                                                    ></i>
                                                    Sub Brigadier
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInRight"
                                id="ana_aspectos22"
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
                                        Las Damas y Caballeros Cadetes que se
                                        destaquen en el estudio. La eficiencia
                                        en instrucción, el destacado rendimiento
                                        físico y su conducta sobrepasando el
                                        cumplimiento del deber, se les otorga
                                        las siguientes distinciones:
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
                                                    o el Cadete de 1er. año que
                                                    ocupa el primer lugar en
                                                    antigüedad, en el Cuadro de
                                                    Calificaciones del primer
                                                    Semestre.
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
                                                    CORDÓN AZUL: A la o el
                                                    Cadete de 2do. Año que ocupa
                                                    el primer lugar en
                                                    antigüedad en el cuadro de
                                                    calificaciones del 1er año
                                                    de formación profesional
                                                </li>
                                                <li>
                                                    <i
                                                        class="fa fa-caret-right"
                                                    ></i>
                                                    ESCOLTA DE LA BANDERA DEL
                                                    ORDEN: A la o el Cadete que
                                                    ocupa el primer lugar en
                                                    antigüedad de 2do. año.
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="mb-3">
                                            <b
                                                >3er. AÑO DE FORMACIÓN
                                                PROFESIONAL</b
                                            >
                                            <ul class="list-unstyled pl-3">
                                                <li>
                                                    <i
                                                        class="fa fa-caret-right"
                                                    ></i>
                                                    CORDÓN CELESTE: A la o el
                                                    Cadete de 3er año que ocupa
                                                    el primer lugar en el cuadro
                                                    de calificaciones del 1er al
                                                    4to semestre de formación
                                                    profesional.
                                                </li>
                                                <li>
                                                    <i
                                                        class="fa fa-caret-right"
                                                    ></i>
                                                    ESCOLTA DE LA BANDERA DEL
                                                    ORDEN: A la o el Cadete que
                                                    ocupo el primer en
                                                    antigüedad de 3er. año.
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <b
                                                >4to. AÑO DE FORMACIÓN
                                                PROFESIONAL</b
                                            >
                                            <ul class="list-unstyled pl-3">
                                                <li>
                                                    <i
                                                        class="fa fa-caret-right"
                                                    ></i>
                                                    ABANDERADO DEL ESTANDARTE
                                                    NACIONAL DEL INSTITUTO: A la
                                                    o el Brigadier Mayor.
                                                </li>
                                                <li>
                                                    <i
                                                        class="fa fa-caret-right"
                                                    ></i>
                                                    ABANDERADO DE LA BANDERA DEL
                                                    ORDEN DEL INSTITUTO: A la o
                                                    el Brigadier más destacado
                                                    después del Brigadier Mayor.
                                                </li>
                                                <li>
                                                    <i
                                                        class="fa fa-caret-right"
                                                    ></i>
                                                    ESCOLTAS DEL ESTANDARTE
                                                    NACIONAL DEL INSTITUTO:
                                                    Cadetes de 4to año más
                                                    destacados.
                                                </li>
                                                <li>
                                                    <i
                                                        class="fa fa-caret-right"
                                                    ></i>
                                                    CORDÓN ROJO “De
                                                    aprovechamiento”: A la o el
                                                    Brigadier Mayor.
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
                    <!-- BECAS AL EXTERIOR -->
                    <div class="col-12 seccion py-5">
                        <div class="container">
                            <h2 class="titulo-seccion">BECAS AL EXTERIOR</h2>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInUp"
                                id="ana_aspectos23"
                            >
                                <div class="col-12">
                                    <SliderImagenes
                                        :imagenes="listBecas"
                                        :height="'400px'"
                                        :interval="3000"
                                    ></SliderImagenes>
                                </div>
                                <div class="col-12">
                                    <p class="text-justify">
                                        El Comando General de la Policía
                                        Boliviana dispone y otorga anualmente
                                        becas para Damas y Caballeros Cadetes
                                        destacados durante el proceso de
                                        enseñanza - aprendizaje, para continuar
                                        recibiendo formación profesional en
                                        institutos académicos similares en otros
                                        países. Por su parte la Academia
                                        Nacional de Policías recibe a Damas y
                                        Caballeros Cadetes extranjeros, este
                                        intercambio de reciprocidad académica
                                        muestra el nivel de formación superior
                                        que ostenta la Academia Nacional de
                                        Policías y que con justicia se hizo
                                        merecedora al reconocimiento tanto a
                                        nivel nacional como internacional.
                                    </p>
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
                                id="ana_aspectos24"
                            >
                                <div class="col-md-12">
                                    <SliderImagenes
                                        :imagenes="listInfraestructura"
                                        :height="'400px'"
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
                                id="ana_aspectos25"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset + '/imgs/F35 COD 001.jpg'
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
                                        título profesional de “OFICIAL DE
                                        POLICÍA” con el grado jerárquico de
                                        Subteniente y grado académico de
                                        “LICENCIADO EN CIENCIAS POLICIALES”, que
                                        se obtienen luego de haber culminado
                                        satisfactoriamente todo el programa de
                                        estudios y habiendo aprobado una de las
                                        modalidades de graduación.
                                    </p>
                                </div>
                            </div>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInRight"
                                id="ana_aspectos25"
                            >
                                <div class="col-12 text-center">
                                    <img
                                        :src="
                                            url_asset + '/imgs/F37 COD 001.jpg'
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
                                id="ana_aspectos26"
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
                                                    '/imgs/F36 COD 001.svg',
                                            },
                                        ]"
                                        :height="'450px'"
                                    ></SliderImagenes>
                                </div>
                            </div>
                            <div
                                class="row py-3 info_seccion wow animate__animated animate__slideInRight"
                                id="ana_aspectos27"
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
                                        Las y los Oficiales de Policía, serán
                                        destinados a cumplir servicios en
                                        reparticiones policiales de la
                                        institución del orden EN CUALQUIER PUNTO
                                        DEL TERRITORIO NACIONAL, de acuerdo con
                                        las necesidades del servicio, la
                                        especialidad y el plan de carrera;
                                        debiendo para el efecto firmar un Acta
                                        de Consentimiento, mediante el cual
                                        acepta de manera voluntaria, ser
                                        destinado y ejercer funciones policiales
                                        en cualquier punto del país y así
                                        hallarse al servicio de toda la sociedad
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
                            <div class="row py-3" id="ana_aspectos28">
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
