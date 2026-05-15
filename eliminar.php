<?php
    session_start();

    if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'Administrador') {
        header("Location: index.php");
        exit();
    }

    require __DIR__ . '/resources/database/dbConection.php';

    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    $resultado = mysqli_query($conexion, "SELECT * FROM pokemons WHERE id = $id");
    $pokemon = mysqli_fetch_assoc($resultado);

    if (!$pokemon) {
        header("Location: index.php");
        exit();
    }

    mysqli_query($conexion, "DELETE FROM pokemons WHERE id = $id");

    header("Location: index.php");
    exit();
?>