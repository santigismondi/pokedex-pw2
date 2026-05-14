function validarPassword(e){
    const pass = document.getElementById("password").value;
    const confirm = document.getElementById("confirm").value;

    if(pass !== confirm){
        alert("Las contraseñas no coinciden");
        e.preventDefault();
        return false;
    }
    return true;
}

document.getElementById("formulario").addEventListener("submit", validarPassword);