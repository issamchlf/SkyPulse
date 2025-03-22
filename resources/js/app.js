import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

function toggleMenu() {
    const menu = document.getElementById("menu");
    const button = document.getElementById("menu-toggle");
    const isExpanded = button.getAttribute("aria-expanded") === "true";
    menu.classList.toggle("hidden");
    button.setAttribute("aria-expanded", !isExpanded);
    if (!menu.classList.contains("hidden")) {
        menu.classList.replace("bg-blue-600", "bg-blue-700");
    } else {
        menu.classList.replace("bg-blue-700", "bg-blue-600");
    }
}
document.getElementById("menu-toggle").addEventListener("click", toggleMenu);
document.addEventListener("click", (event) => {
    const menu = document.getElementById("menu");
    const button = document.getElementById("menu-toggle");
    if (!menu.contains(event.target) && !button.contains(event.target)) {
        if (!menu.classList.contains("hidden")) {
            toggleMenu();
        }
    }
});
window.addEventListener("resize", () => {
    const menu = document.getElementById("menu");
    if (window.innerWidth >= 768 && !menu.classList.contains("hidden")) {
        menu.classList.add("hidden");
        document
            .getElementById("menu-toggle")
            .setAttribute("aria-expanded", "false");
    }
});
document.getElementById("menu").addEventListener("click", (event) => {
    event.stopPropagation();
});
