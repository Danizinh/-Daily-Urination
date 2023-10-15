const checkbox = document.getElementById("habilitarCampos");
checkbox.addEventListener("change", function () {
    if (checkbox.checked) {
        campo1.removeAttribute("disabled");

    } else {
        campo1.setAttribute("disabled", true);

    }
});
