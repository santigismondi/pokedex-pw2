<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        body {
            background: linear-gradient(135deg, #6a1b9a, #8e24aa);
            font-family: Arial, sans-serif;
        }

        .form-container {
            max-width: 500px;
            margin: 60px auto;
        }

        .card {
            border-radius: 12px;
            overflow: hidden;
        }

        input {
            border-radius: 6px;
        }

        .btn {
            margin-top: 20px;
            border-radius: 6px;
        }

        h2 {
            margin: 0;
        }

        small {
            color: gray;
        }
    </style>
</head>
<body>

<div class="form-container">
    <div class="w3-card-4 w3-white card">

        <header class="w3-container w3-deep-purple">
            <h2>Registro de Usuario</h2>
        </header>

        <form method="POST" id="formulario" action="resources/php/form-procesado.php" enctype="multipart/form-data" class="w3-container w3-padding-24">

            <!-- Nombre -->
            <label>Nombre completo</label>
            <input class="w3-input w3-border" type="text" name="nombre" required>

            <!-- Usuario -->
            <label>Nombre de usuario</label>
            <input class="w3-input w3-border" type="text" name="username" required>

            <!-- Email -->
            <label>Email</label>
            <input class="w3-input w3-border" type="email" name="email" required>

            <!-- Password -->
            <label>Contraseña</label>
            <input class="w3-input w3-border" type="password" id="password" name="password" required>

            <!-- Confirm Password -->
            <label>Confirmar contraseña</label>
            <input class="w3-input w3-border" type="password" id="confirm" name="confirm_password" required>


            <!-- Género -->
            <label>Género</label>
            <select class="w3-select w3-border" name="genero">
                <option value="" disabled selected>Seleccionar</option>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
                <option value="otro">Otro</option>
            </select>

            <p>
                <input class="w3-check" type="checkbox" name="terminos" required>
                <label>Acepto los términos y condiciones</label>
            </p>

            <!-- Botón -->
            <button class="w3-button w3-deep-purple w3-block btn" type="submit">
                Crear cuenta
            </button>

            <p class="w3-center">
                <small>¿Ya tenés cuenta? Iniciá sesión</small>
            </p>

        </form>
    </div>
</div>
<script src="resources/scripts/verificaciones.js"></script>
</body>
</html>