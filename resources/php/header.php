<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
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
                <img src="../imagenes/logo.png" alt="Logo" width="40" height="40" class="me-2 border border-dark p-1">
                <span class="fs-3 fw-bold font-monospace">Pokedex</span>
            </a>
        </div>

        <div>
            <?php
            // Verificamos si existe una variable de sesión que confirme el login del admin
            if (isset($_SESSION['logueado']) && $_SESSION['logueado'] === true):
                ?>
                <div class="d-flex align-items-center">
                    <span class="me-3 fw-bold">Usuario ADMIN</span> <a href="logout.php" class="btn btn-outline-danger btn-sm">Salir</a>
                </div>
            <?php else: ?>
                <form action="procesar_login.php" method="POST" class="d-flex">
                    <input type="text" name="usuario" class="form-control form-control-sm me-2" placeholder="Usuario" required> <input type="password" name="password" class="form-control form-control-sm me-2" placeholder="Password" required> <button type="submit" class="btn btn-primary btn-sm">Ingresar</button> </form>
            <?php endif; ?>
        </div>

    </div>
</header>

<main class="container">