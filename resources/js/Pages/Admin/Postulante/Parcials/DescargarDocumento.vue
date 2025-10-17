<script setup>
import MiModal from "@/Components/MiModal.vue";
import { useForm, usePage } from "@inertiajs/vue3";
import { watch, ref, computed, defineEmits, onMounted, nextTick } from "vue";
const props = defineProps({
    muestra_formulario: {
        type: Boolean,
        default: false,
    },
    archivo: {
        type: Object,
        default: null,
    },
});

const muestra_form = ref(props.muestra_formulario);
const sArchivo = ref(props.archivo);
const tituloDialog = ref("");
const contenido = ref("");
const cargando = ref(false);
watch(
    () => props.muestra_formulario,
    (newValue) => {
        muestra_form.value = newValue;
        console.log(newValue);
        if (muestra_form.value) {
            document
                .getElementsByTagName("body")[0]
                .classList.add("modal-open");
        } else {
            document
                .getElementsByTagName("body")[0]
                .classList.remove("modal-open");
        }
    }
);

watch(
    () => props.archivo,
    (newValue) => {
        sArchivo.value = newValue;
    }
);

const emits = defineEmits(["cerrar-formulario"]);

watch(muestra_form, (newVal) => {
    if (!newVal) {
        emits("cerrar-formulario");
    }
});

const cerrarFormulario = () => {
    muestra_form.value = false;
    document.getElementsByTagName("body")[0].classList.remove("modal-open");
};

onMounted(() => {});
</script>

<template>
    <MiModal
        :open_modal="muestra_form"
        @close="cerrarFormulario"
        :header="false"
        :size="'modal-xl'"
        :header-class="'bg-principal'"
        :footer-class="'justify-content-center'"
        :closeEsc="true"
        :bodyClass="'bg-principal'"
        :max-height-body="'80vh'"
    >
        <template #body>
            <div v-html="sArchivo?.descripcion"></div>
            <div class="row">
                <div class="col-12 text-center">
                    <a
                        class="btn btn-success"
                        :href="sArchivo?.url_documento"
                        target="_blank"
                    >
                        <i class="fa fa-download"></i> DESCARGAR
                    </a>
                </div>
            </div>
        </template>
        <template #footer>
            <button
                type="button"
                class="btn btn-principal"
                @click.prevent="cerrarFormulario()"
            >
                CERRAR VENTANA
            </button>
        </template>
    </MiModal>
</template>
<style>
table thead tr th,
table tbody tr td {
    font-size: 0.83em;
}
</style>
