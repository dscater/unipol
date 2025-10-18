import { ref, onMounted, onBeforeUnmount } from "vue";

const openSubMenu = ref(false);
export const useSubmenu = () => {
    const isMobile = ref(false);

    function detectMobile() {
        isMobile.value = window.innerWidth < 992;
    }

    function toggleSubmenu(e) {
        if (!isMobile.value) return;
        e.preventDefault();

        const trigger = e.currentTarget;
        const submenu = trigger.nextElementSibling;

        if (!submenu) return;

        // Cierra otros submenús dentro del mismo nivel
        const siblings = trigger
            .closest(".dropdown-menu")
            ?.querySelectorAll(".dropdown-menu.show");
        siblings?.forEach((el) => {
            if (el !== submenu) el.classList.remove("show");
        });

        submenu.classList.toggle("show");
    }

    function onClickSubmenu(e, state) {
        if (isMobile.value) return;

        if (openSubMenu.value) {
            // cerrar otros
            const openSubmenus = document.querySelector(".miSubmenu");
            const dropdown_submenus =
                openSubmenus.querySelectorAll(".dropdown-submenu");
            dropdown_submenus.forEach((elem) => {
                const dropdown_menu = elem.querySelector(".dropdown-menu");
                dropdown_menu.classList.remove("show");
            });
        }

        openSubMenu.value = state;

        const trigger = e.currentTarget.querySelector(".dropdown-toggle");
        const submenu = trigger?.nextElementSibling;
        if (submenu) {
            const rect = e.target.getBoundingClientRect();
            submenu.style.position = "fixed";
            submenu.style.top = rect.top + "px";
            submenu.style.left = rect.right + "px";

            if (state) submenu.classList.add("show");
            else submenu.classList.remove("show");
        }
    }

    // Para cerrar al hacer click fuera
    document.addEventListener("click", (e) => {
        const openSubmenus = document.querySelector(".miSubmenu");
        const dropdown_submenus =
            openSubmenus.querySelectorAll(".dropdown-submenu");
        dropdown_submenus.forEach((elem) => {
            const dropdown_menu = elem.querySelector(".dropdown-menu");
            dropdown_menu.classList.remove("show");
        });
    });

    function handleClickOutside(e) {
        if (!e.target.closest(".dropdown-submenu")) {
            document
                .querySelectorAll(".dropdown-submenu .dropdown-menu.show")
                .forEach((el) => el.classList.remove("show"));
        }
    }

    onMounted(() => {
        detectMobile();
        window.addEventListener("resize", detectMobile);
        document.addEventListener("click", handleClickOutside);
    });

    onBeforeUnmount(() => {
        window.removeEventListener("resize", detectMobile);
        document.removeEventListener("click", handleClickOutside);
    });
    return {
        toggleSubmenu,
        onClickSubmenu,
    };
};
