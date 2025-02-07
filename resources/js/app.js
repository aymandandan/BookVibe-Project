import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();
document.addEventListener("DOMContentLoaded", function () {
    let closeBtn = document.getElementById("close-btn");
    if (closeBtn) {
        closeBtn.addEventListener("click", function () {
            document.getElementById("error-message").remove();
        });
    }
});
