import { onMounted, ref } from "vue";

const oPostulante = ref({
    id: 0,
    nombre: "",
    paterno: "",
    materno: "",
    ci: "",
    ci_exp: "",
    complemento: "",
    genero: "",
    unidad: "",
    fecha_nac: "",
    cel: "",
    correo: "",
    nro_cuenta: "",
    lugar_preins: "",
    observacion: "",
    _method: "POST",
});

export const usePostulantes = () => {
    const setPostulante = (item = null, ver = false) => {
        if (item) {
            oPostulante.value.id = item.id;
            oPostulante.value.nombre = item.nombre;
            oPostulante.value.paterno = item.paterno;
            oPostulante.value.materno = item.materno;
            oPostulante.value.ci = item.ci;
            oPostulante.value.ci_exp = item.ci_exp;
            oPostulante.value.complemento = item.complemento;
            oPostulante.value.genero = item.genero;
            oPostulante.value.unidad = item.unidad;
            oPostulante.value.fecha_nac = item.fecha_nac;
            oPostulante.value.cel = item.cel;
            oPostulante.value.correo = item.correo;
            oPostulante.value.nro_cuenta = item.nro_cuenta;
            oPostulante.value.lugar_preins = item.lugar_preins;
            oPostulante.value.observacion = item.observacion;
            oPostulante.value._method = "PUT";
            return oPostulante;
        }
        return false;
    };

    const limpiarPostulante = () => {
        oPostulante.value.id = 0;
        oPostulante.value.nombre = "";
        oPostulante.value.paterno = "";
        oPostulante.value.materno = "";
        oPostulante.value.ci = "";
        oPostulante.value.ci_exp = "";
        oPostulante.value.complemento = "";
        oPostulante.value.genero = "";
        oPostulante.value.unidad = "";
        oPostulante.value.fecha_nac = "";
        oPostulante.value.cel = "";
        oPostulante.value.correo = "";
        oPostulante.value.nro_cuenta = "";
        oPostulante.value.lugar_preins = "";
        oPostulante.value.observacion = "";
        oPostulante._method = "POST";
    };

    onMounted(() => {});

    return {
        oPostulante,
        setPostulante,
        limpiarPostulante,
    };
};
