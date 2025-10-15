<script setup>
import { ref, provide, onMounted } from "vue";
import { usePage, Link } from "@inertiajs/vue3";
import Navbar from "./includes_portal/Navbar.vue";
import Footer from "./includes_portal/Footer.vue";
const { props: props_page } = usePage();

const url_asset = ref(props_page.url_assets);
const user = ref(props_page.auth.user);
const dialog_atencion = ref(false);

const verificaUser = () => {
    if (user.value) {
        // console.log("LOGEADO");
        return true;
    }

    dialog_atencion.value = true;
    // console.log("SIN LOGEAR");
    return false;
};

const verificarPujaUser = async (user_id, publicacion_id) => {
    try {
        const response = await axios.get(
            route("subasta_clientes.verificaSubastaCliente"),
            {
                params: {
                    user_id,
                    publicacion_id,
                },
            }
        );

        return response.data;
    } catch (error) {
        console.log(error);
        throw error;
    }
};

provide("verificaUser", verificaUser);
provide("verificarPujaUser", verificarPujaUser);

onMounted(() => {
    window.addEventListener("load", function () {
        const pace = document.querySelectorAll(".pace-active");
        pace[0].remove();
    });
});
</script>
<template>
    <div id="app" class="fade show">
        <Navbar></Navbar>
        <slot></slot>
        <Footer></Footer>
    </div>
</template>
<style scoped></style>
