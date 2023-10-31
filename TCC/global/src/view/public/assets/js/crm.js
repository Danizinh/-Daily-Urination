const checkbox = document.getElementById("habilitarCampos");
checkbox.addEventListener("change", function () {
    if (checkbox.checked) {
        campo1.removeAttribute("disabled");
        campo1.setAttribute("required", true);

    } else {
        campo1.setAttribute("disabled", true);
        campo1.removeAttribute("required");
    }
});
