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
import NavBar from "@/Pages/Portal/Anapol/Parcial/Navbar.vue";
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
                    <!-- FASES -->
                    <div class="col-12">
                        <div class="container">
                            <h2 class="titulo-seccion">FASE DE CONVOCATORIA</h2>
                            <p>
                                <h4 class="subtitulo-seccion">CONVOCATORIA</h4>
La Convocatoria para el Proceso de Admisión de las y los postulantes a la Facultad de Ciencias Policiales “Academia Nacional de Policías”, se realizará según Cronograma de Actividades del Proceso de Admisión.
                            </p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="container">
                            <h4 class="titulo-seccion">TABLA DE PRECIOS</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="4" class="text-center bg-dark-principal">TABLA DE PRECIOS - ANAPOL</th>
                                    </tr>
                                    <tr>
                                        <th colspan="4" class="text-center">FASES DEL PROCESO DE ADMISIÓN</th>
                                    </tr>
                                    <tr>
                                        <th>CONCEPTO</th>
                                        <th>IMPORTE</th>
                                        <th>NRO. DE CUENTA</th>
                                        <th>OBSERVACIONES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Prospecto de Admisión</td>
                                        <td>650 Bs.</td>
                                        <td rowspan="2" align="middle">1-3872161<br/>Banco Unión</td>
                                        <td rowspan="2" align="middle">Boletas a nombre de la o el postulante</td>
                                    </tr>
                                    <tr>
                                        <td>Prefacultativo</td>
                                        <td>4,600 Bs.</td>
                                    </tr>
                                </tbody>
                                <thead>
                                    <tr>
                                        <th colspan="4" class="text-center">INSCRIPCIÓN Y MATRICULA SEMESTRAL (Solo postulantes admitidos)</th>
                                    </tr>
                                </thead>
                                  <tbody>
                                    <tr>
                                        <td>Inscripción</td>
                                        <td>15,200 Bs.</td>
                                        <td rowspan="2" align="middle">1-3872161<br/>Banco Unión</td>
                                        <td rowspan="2" align="middle">Boletas a nombre de la o el Postulante Admitido</td>
                                    </tr>
                                    <tr>
                                        <td>Prefacultativo</td>
                                        <td>550 Bs.</td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="italic"><b>*NOTA: </b> La Dirección Nacional de Salud y Bienestar Social, según normativa vigente, fijará la tabla de precios de las evaluaciones Médicas, Odontológicas, Psicológicas y afines, en el ámbito de sus competencias, en coordinación con la Comisión Nacional del Proceso de Admisión.</p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="container">
                            <h2 class="titulo-seccion">IRREVERSIBILIDAD DE LOS DEPÓSITOS BANCARIOS</h2>
                            <p>Una vez realizados los depósitos bancarios establecidos para el Proceso de Admisión por las y los postulantes a favor de la Universidad Policial, en cualquiera de las fases y/o etapas de este proceso según modalidad, no serán devueltos por ningún motivo.</p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="container">
                            <h2 class="titulo-seccion">ACCESO AL PROSPECTO</h2>
                            <p>Las y los postulantes a la Facultad de Ciencias Policiales “Academia Nacional de Policías”, para acceder al “Prospecto de Admisión”, realizarán el depósito bancario en la entidad financiera autorizada, con el precio establecido conforme a la Tabla de Precios para el efecto.</p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="container">
                            <h2 class="titulo-seccion">PREINSCRIPCIÓN</h2>
                          La o el postulante que desee acceder al “Prospecto de Admisión”, al momento de la preinscripción deberá realizar las siguientes acciones:
                            <ul class="list-unstyled pl-2">
                                <li>
                                   <b> a)</b>	Llenar el formulario digital con la información personal u otra que sea requerida.

                                </li>
                                <li><b>b)</b>	Aceptar los términos y condiciones de postulación para continuar con la Fase de Evaluación.</li>
                                <li><b>c)</b>	Y otras establecida de acuerdo a comunicado.</li>
                            </ul>
 <p class="italic"><b>*NOTA IMPORTANTE: </b> La o el postulante será responsable de la veracidad de la información ingresada o presentada, al momento de la preinscripción. Esta información será considerada como Declaración Jurada y estará sujeta a verificación por la Universidad Policial y la Policía Boliviana, para que, en caso de advertirse información falsa, se asuman las acciones legales que correspondan.</p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="container">
                            <div class="h2 titulo-seccion">REQUISITOS DE INSCRIPCIÓN</div>
                            <div class="row">
                                <div class="col-12 text-center">
                            <Link class="btn btn-principal" :href="route('anapol.requisitos')">VER REQUISITOS</Link>        
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
