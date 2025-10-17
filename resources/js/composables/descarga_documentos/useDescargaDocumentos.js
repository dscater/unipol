import { onMounted, ref } from "vue";

const oDescargaDocumento = ref({
    id: 0,
    descripcion: "",
    documento: null,
    _method: "POST",
});

export const useDescargaDocumentos = () => {
    const setDescargaDocumento = (item = null, ver = false) => {
        if (item) {
            oDescargaDocumento.value.id = item.id;
            oDescargaDocumento.value.descripcion = item.descripcion;
            oDescargaDocumento.value.documento = item.documento;
            oDescargaDocumento.value._method = "PUT";
            return oDescargaDocumento;
        }
        return false;
    };

    const limpiarDescargaDocumento = () => {
        oDescargaDocumento.value.id = 0;
        oDescargaDocumento.value.descripcion = "";
        oDescargaDocumento.value.documento = null;
        oDescargaDocumento._method = "POST";
    };

    onMounted(() => {});

    return {
        oDescargaDocumento,
        setDescargaDocumento,
        limpiarDescargaDocumento,
    };
};
