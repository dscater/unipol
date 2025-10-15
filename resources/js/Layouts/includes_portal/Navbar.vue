<script setup>
import { usePage, Head, router, Link } from "@inertiajs/vue3";
import { onMounted, ref } from "vue";
import { useConfiguracion } from "@/composables/configuracion/useConfiguracion";
const { oConfiguracion } = useConfiguracion();
const { props: props_page } = usePage();
const user = ref(props_page.auth?.user);
onMounted(() => {});
</script>
<template>
    <Head title="Inicio"></Head>
</template>
<style scoped></style>
