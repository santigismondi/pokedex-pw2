function validarPassword(e) {
    const pass = document.getElementById("password").value;
    const confirm = document.getElementById("confirm").value;
    const error = document.getElementById("errorPass");

    if (pass !== confirm) {
        error.style.display = "block";
        e.preventDefault();
        return false;
    }

    error.style.display = "none";
    return true;
}

document.getElementById("formulario").addEventListener("submit", validarPassword);