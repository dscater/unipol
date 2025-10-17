<script setup>
import App from "@/Layouts/App.vue";
defineOptions({
    layout: App,
});
import ContentPostulante from "@/Components/ContentPostulante.vue";
import { usePage, Head, Link } from "@inertiajs/vue3";
import { onMounted, onBeforeMount, ref, computed } from "vue";
import { useAppStore } from "@/stores/aplicacion/appStore";
const { auth } = usePage().props;
const user = ref(auth.user);

const props_page = defineProps({
    evaluacionMedica: {
        type: Object,
        default: null,
    },
});

const appStore = useAppStore();
onBeforeMount(() => {
    appStore.startLoading();
});

const { props } = usePage();

onMounted(() => {
    appStore.stopLoading();
});
</script>
<template>
    <Head title="Inicio"></Head>
    <ContentPostulante>
        <div class="row contenedor_botones pb-3">
            <div class="col-12">VESTIBULARES</div>
        </div>
    </ContentPostulante>
</template>
<style scoped></style>
