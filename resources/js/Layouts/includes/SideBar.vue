<script setup>
import { onMounted, onUnmounted, ref, nextTick } from "vue";
import { router, usePage } from "@inertiajs/vue3";
import ItemMenu from "@/Components/ItemMenu.vue";
import { useSideBar } from "@/composables/useSidebar.js";
import { useAppStore } from "@/stores/aplicacion/appStore";
import { useConfiguracionStore } from "@/stores/configuracion/configuracionStore";
const { closeSidebar, toggleSubMenuELem } = useSideBar();
const { auth } = usePage().props;
const configuracionStore = useConfiguracionStore();
const appStore = useAppStore();
const usuario = ref(null);
const permisos = ref(null);
const toggleSubMenu = (e) => {
    e.stopPropagation();
    const elem = e.currentTarget;
    if (
        elem.classList.contains("menu-is-opening") &&
        elem.classList.contains("menu-open")
    ) {
        elem.classList.remove("menu-is-opening");
        elem.classList.remove("menu-open");
        toggleSubMenuELem(elem, false);
    } else {
        elem.classList.add("menu-is-opening");
        elem.classList.add("menu-open");
        toggleSubMenuELem(elem, true);
    }
};

const route_current = ref("");
router.on("navigate", (event) => {
    route_current.value = route().current();
    closeSidebar();
});

onMounted(() => {
    configuracionStore.initConfiguracion();
    usuario.value = appStore.getUsuario;
    permisos.value = auth.permisos;
    // Selecciona el elemento del widget
    var sidebarSearchElement = $('[data-widget="sidebar-search"]');
    // Configura manualmente el texto de "no encontrado"
    sidebarSearchElement.data("notFoundText", "Sin resultados");
});

const salir = () => {
    axios
        .post(route("logout"))
        .then((response) => {})
        .finally(() => {
            window.location.href = route("portal.index");
        });
};

onUnmounted(() => {});
</script>
<template>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-success elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img
                :src="configuracionStore.oConfiguracion.url_logo"
                alt="Logo"
                class="brand-image img-circle elevation-3"
                style="opacity: 0.8"
            />
            <span
                class="brand-text font-weight-light title_Chau_Philomene_One"
                >{{ configuracionStore.oConfiguracion.nombre_sistema }}</span
            >
        </a>

        <!-- Sidebar -->
        <div class="sidebar p-0">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img
                        :src="usuario?.url_foto"
                        class="img-circle elevation-2"
                        alt="User Image"
                    />
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ usuario?.full_name }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul
                    class="nav nav-pills nav-sidebar flex-column"
                    data-widget="treeview"
                    role="menu"
                    data-accordion="false"
                >
                    <ItemMenu
                        :label="'Inicio'"
                        :ruta="'inicio'"
                        :icon="'fa fa-home'"
                    ></ItemMenu>
                    <li class="nav-header font-weight-bold bg-principal">
                        ADMINISTRACIÓN
                    </li>
                    <ItemMenu
                        v-if="
                            permisos &&
                            permisos.includes('postulantes.preinscripcion')
                        "
                        :label="'Preinscripción'"
                        :ruta="'postulantes.preinscripcion'"
                        :icon="'fa fa-edit'"
                    ></ItemMenu>
                    <ItemMenu
                        v-if="permisos && permisos.includes('usuarios.index')"
                        :label="'Usuarios'"
                        :ruta="'usuarios.index'"
                        :icon="'fa fa-users'"
                    ></ItemMenu>
                    <li class="nav-header font-weight-bold bg-principal">
                        REPORTES
                    </li>
                    <li class="nav-item">
                        <a
                            href="#"
                            class="nav-link sub-menu"
                            :class="[
                                route_current == 'reportes.usuarios' ||
                                route_current == 'reportes.pagos'
                                    ? 'active menu-is-opening menu-open'
                                    : '',
                            ]"
                            @click.stop="toggleSubMenu($event)"
                        >
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                Reportes
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <ItemMenu
                                :label="'Usuarios'"
                                :ruta="'reportes.usuarios'"
                                :icon="'fa fa-angle-right'"
                            ></ItemMenu>
                        </ul>
                    </li>
                    <li class="nav-header font-weight-bold bg-principal">
                        OTROS
                    </li>
                    <ItemMenu
                        :label="'Configuración Sistema'"
                        :ruta="'configuracions.index'"
                        :icon="'fa fa-cog'"
                    ></ItemMenu>

                    <li class="nav-item">
                        <a
                            href="#"
                            class="nav-link"
                            @click.prevent="salir()"
                            ref="link"
                        >
                            <i class="nav-icon fa fa-power-off"></i>
                            <p>Salir</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
</template>
<style scoped></style>
