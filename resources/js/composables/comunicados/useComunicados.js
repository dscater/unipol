import { onMounted, ref } from "vue";

const oComunicado = ref({
    id: 0,
    unidad: "",
    descripcion: "",
    imagen: null,
    _method: "POST",
});

export const useComunicados = () => {
    const setComunicado = (item = null, ver = false) => {
        if (item) {
            oComunicado.value.id = item.id;
            oComunicado.value.unidad = item.unidad;
            oComunicado.value.descripcion = item.descripcion;
            oComunicado.value.imagen = item.imagen;
            oComunicado.value._method = "PUT";
            return oComunicado;
        }
        return false;
    };

    const limpiarComunicado = () => {
        oComunicado.value.id = 0;
        oComunicado.value.unidad = "";
        oComunicado.value.descripcion = "";
        oComunicado.value.imagen = null;
        oComunicado._method = "POST";
    };

    onMounted(() => {});

    return {
        oComunicado,
        setComunicado,
        limpiarComunicado,
    };
};
