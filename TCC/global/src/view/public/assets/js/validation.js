var pass = document.getElementById("senha_crypt")
confirmation_password = document.getElementById("confirmation")
function validation_password() {
    if (senha_crypt.value != confirmation.value) {
        confirmation.setCustomValidity("Senha Diferentes")
    } else {
        confirmation.setCustomValidity("")
    }
}
senha_crypt.onchange = validation_password
confirmation.onkeyup = validation_password
