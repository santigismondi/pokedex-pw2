<?php
session_start();
$error = "";
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $conexion = new mysqli("localhost", "root", "", "pokedex");
    $resultado = $conexion->query("SELECT * FROM usuarios WHERE username='$username'");
    $usuario = $resultado->fetch_assoc();


    if(!$usuario){
        $error = "El usuario no existe";
    }elseif ($usuario && password_verify($password, $usuario['password'])) {
        $_SESSION['usuario'] = $usuario;
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        $error = "La contraseña es incorrecta";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokédex</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header class="bg-light py-3 border-bottom mb-4">
    <div class="container d-flex flex-wrap justify-content-between align-items-center">

        <div class="d-flex align-items-center">
            <a href="../../index.php" class="d-flex align-items-center text-dark text-decoration-none">
                <img src="resources/imagenes/logo.png" alt="Logo" width="40" height="40" class="me-2 border border-dark p-1">
                <span class="fs-3 fw-bold font-monospace">Pokedex</span>
            </a>
        </div>

        <div>

            <?php if (isset($_SESSION['usuario'])): ?>

                <div class="d-flex align-items-center">

                    <?php if ($_SESSION['usuario']['rol'] === 'Administrador'): ?>

                        <span class="me-3 fw-bold">
                Usuario ADMIN
            </span>

                    <?php else: ?>

                        <span class="me-3 fw-bold">
                <?php echo $_SESSION['usuario']['nombre']; ?>
            </span>

                    <?php endif; ?>

                    <a href="resources/php/logout.php" class="btn btn-outline-danger btn-sm">
                        Salir
                    </a>

                </div>

            <?php else: ?>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="d-flex align-items-center">

                    <input type="text"
                           name="username"
                           class="form-control form-control-sm me-2"
                           placeholder="Usuario"
                           required>

                    <input type="password"
                           name="password"
                           class="form-control form-control-sm me-2"
                           placeholder="Password"
                           required>

                    <button type="submit" class="btn btn-primary btn-sm me-2">
                        Ingresar
                    </button>

                    <a href="register.php" class="btn btn-success btn-sm">
                        Registrarse
                    </a>

                </form>

                <?php if($error != "") echo "<p style='color:red'>$error</p>"; ?>

            <?php endif; ?>

        </div>
</header>

<main class="container">