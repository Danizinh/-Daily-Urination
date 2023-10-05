const checkbox = document.getElementById("habilitarCampos");

// Adiciona um evento de escuta ao checkbox
checkbox.addEventListener("change", function () {
    // Se o checkbox estiver marcado, habilita os campos
    if (checkbox.checked) {
        campo1.removeAttribute("disabled");
        campo2.removeAttribute("disabled");
        campo3.removeAttribute("disabled");
    } else {
        // Se o checkbox estiver desmarcado, desabilita os campos
        campo1.setAttribute("disabled", true);
        campo2.setAttribute("disabled", true);
        campo3.setAttribute("disabled", true);
    }
});
