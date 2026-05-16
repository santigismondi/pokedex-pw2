<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="resources/styles/register.css">
</head>
<body>

<div class="form-container">
    <div class="card">

        <div class="card-header">
            <svg width="72" height="72" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" style="display:block;margin:0 auto 12px;">
                <circle cx="50" cy="50" r="47" fill="white" stroke="#222" stroke-width="3"/>
                <path d="M3 50 Q3 3 50 3 Q97 3 97 50 Z" fill="#E3350D"/>
                <rect x="3" y="46" width="94" height="8" fill="#222"/>
                <circle cx="50" cy="50" r="14" fill="white" stroke="#222" stroke-width="3"/>
                <circle cx="50" cy="50" r="6" fill="white" stroke="#aaa" stroke-width="2"/>
            </svg>
            <h2>Registro de Entrenador</h2>
            <p>¡Comenzá tu aventura Pokémon! ⚡</p>
        </div>

        <div class="strip"></div>

        <form method="POST" id="formulario" action="resources/php/form-procesado.php" enctype="multipart/form-data">

            <label>👤 Nombre completo</label>
            <input type="text" name="nombre" placeholder="Ash Ketchum" required>

            <label>🎮 Nombre de entrenador</label>
            <input type="text" name="username" placeholder="AshKetchum99" required>

            <label>📧 Email</label>
            <input type="email" name="email" placeholder="ash@paleta.com" required>

            <hr class="divider">

            <label>🔒 Contraseña</label>
            <input type="password" id="password" name="password" required>

            <label>🔑 Confirmar contraseña</label>
            <input type="password" id="confirm" name="confirm_password" required>

            <span id="errorPass" style="color: #cc0000; font-size: 13px; font-weight: 700; display: none;">
    ⚠️ Las contraseñas no coinciden
</span>

            <label>⚡ Género</label>
            <select name="genero">
                <option value="" disabled selected>Seleccionar</option>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
                <option value="otro">Otro</option>
            </select>

            <div class="check-row">
                <input type="checkbox" id="terminos" name="terminos" required>
                <label for="terminos"> Acepto los términos y condiciones</label>
            </div>

            <button class="btn-submit" type="submit">
                🎯 Crear cuenta
            </button>

        </form>

        <div class="card-footer">
            <p>¿Ya tenés cuenta? <a href="#">Iniciá sesión</a></p>
        </div>

    </div>
</div>

<script src="resources/scripts/verificaciones.js"></script>
</body>
</html>