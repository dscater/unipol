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
            <div class="col-12">
                <div class="row contenedor_secciones">
                    <!-- REQUISITOS -->
                    <div class="col-12">
                        <div class="container">
                            <h2 class="titulo-seccion">REQUISITOS</h2>
                            <div class="row">
                                <div class="col-12">
                                    <p>
                                        <img
                                            :src="
                                                url_asset +
                                                '/imgs/F3 COD 001.jpg'
                                            "
                                            alt=""
                                            width="240px"
                                            style="float: right"
                                        />
                                        <b>I.</b> Los requisitos para inscribirse como
                                        postulantes a la Facultad de Ciencias
                                        Policiales “Academia Nacional de
                                        Policías”, son los siguientes:
                                        <ul class="list-unstyled pl-3">
                                            <li><b>a)</b> Ser
                                        boliviana o boliviano de nacimiento.</li>
                                        <li><b>b)</b>
                                        Presentar Cédula de Identidad original
                                        vigente, además de una fotocopia a color
                                        con la firma de la o el postulante.</li>
                                        <li> <b>c)</b>
                                        Certificado de Nacimiento original, que
                                        acredite que al momento de la
                                        inscripción el postulante cuenta con la
                                        edad entre los diecisiete (17) y
                                        veintidós (22) años cumplidos hasta el
                                        31 de diciembre de la gestión en la que
                                        se lleve a cabo el Proceso de Admisión.</li>
                                        <li><b>d)</b> Certificado de No Militancia
                                        Política.</li>
                                        <li><b>e)</b> Certificado de Soltería (No
                                        contar con vínculo matrimonial o unión
                                        libre).</li>
                                        <li>
<b>f)</b> No encontrarse en estado de
                                        gestación al momento de postular.
                                        (Certificado Médico)
                                        </li>
                                        <li><b>g)</b> Presentar
                                        fotocopia legalizada y original del
                                        Diploma de Bachiller, para fines de
                                        verificación. En caso de no contar con
                                        el Diploma de Bachiller, la o el
                                        postulante podrá presentar el
                                        certificado de notas emitido por la
                                        Dirección Departamental de Educación.
                                        Excepcionalmente se podrá presentar el
                                        Certificado de estudiante regular del
                                        nivel de 6to. de secundaria, emitido por
                                        la Unidad Educativa correspondiente,
                                        condicionándose la incorporación a la
                                        Facultad de Ciencias Policiales
                                        “Academia Nacional de Policías” con la
                                        presentación obligatoria del Diploma de
                                        Bachiller.</li>
                                        <li>
<b>h)</b> Certificado de Registro
                                        Judicial de Antecedentes Penales, SIN
                                        ANTECEDENTES, para la o el postulante.
                                        </li>
                                        <li>
  <b>i)</b> Certificado de Antecedentes de No
                                        Violencia en Razón de Género, SIN
                                        ANTECEDENTES, para la o el postulante.
                                        </li>
                                        <li>
<b>j)</b> Certificado de Antecedentes
                                        Policiales (FELCC, FELCN, TRANSITO), sin
                                        antecedentes, para la o el postulante.
                                        </li>
                                        <li>
 <b>k)</b> Certificados de NO haber sido dado de
                                        baja por faltas disciplinarias de
                                        cualquier Unidad Académica de Pregrado
                                        de la Universidad Policial y/o de los
                                        Institutos Militares (Ejército, Fuerza
                                        Aérea y Armada Boliviana).
                                        </li>
                                        <li>
<b>l)</b> Compromiso
                                        Notariado de autorización expresa y
                                        consentimiento por parte de la o el
                                        postulante, para someterse a las
                                        evaluaciones médicas, odontológicas,
                                        clínicas, radiológicas, de laboratorio,
                                        físicas, psicológicas, de conocimientos,
                                        al Programa Académico Prefacultativo y a
                                        todas las disposiciones legales y
                                        reglamentarias de este; además del
                                        consentimiento informado del uso de
                                        datos personales de la o el postulante.
                                        </li>
                                        <li>
 <b>m)</b> Compromiso Notariado de cumplimiento
                                        del Reglamento de Admisión a las
                                        Unidades Académicas de Pregrado de la
                                        Universidad Policial.
                                        </li>
                                        <li>
<b>n)</b> Cuatro (4)
                                        fotografías a color (sin editar), de
                                        frente, tamaño 4x4 y una (1) tamaño
                                        postal de cuerpo entero; todas con traje
                                        formal y fondo blanco, en físico y en
                                        formato digital (CD).
                                        </li>
                                        <li>
<b>o)</b> Original y
                                        fotocopia de la Boleta de Depósito
                                        Bancario para el Prospecto de Admisión o
                                        transferencia electrónica.
                                        </li>
                                        <li>
<b>p)</b> Contar con
                                        domicilio virtual (número de WhatsApp y
                                        correo electrónico activo), que será
                                        proporcionado por la o el postulante al
                                        momento de su inscripción y será
                                        utilizado para recibir notificaciones
                                        durante el Proceso de Admisión hasta su
                                        conclusión.
                                        </li>
                                        <li>
<b>q)</b> Otras, establecidas de
                                        acuerdo a necesidad y expresamente
                                        aprobadas por la Comisión Nacional del
                                        Proceso de Admisión. II. Las y los
                                        postulantes que tengan diecisiete (17)
                                        años de edad y cumplan los demás
                                        requisitos exigidos para la inscripción,
                                        además de lo señalado, deberán adjuntar
                                        una Declaración Jurada debidamente
                                        Notariada, mediante la cual el padre,
                                        madre o tutor autoricen su postulación a
                                        la Unidad Académica de Pregrado,
                                        asumiendo la responsabilidad por el
                                        mismo, en tanto cumpla la mayoría de
                                        edad. III. La documentación requerida,
                                        deberá ser presentada en un folder
                                        rotulado, debidamente ordenada y con
                                        separadores plásticos transparentes
                                        individuales. IV. Las o los postulantes
                                        que cuenten con antecedentes penales o
                                        policiales exigidos para la inscripción,
                                        serán separados del Proceso de Admisión.
                                        </li>
                                        </ul>
                                    </p>
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
</style>
