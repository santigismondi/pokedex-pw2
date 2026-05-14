<?php
    $host = "127.0.0.1";
    $usuario = "root";
    $password = "";
    $base_de_datos = "pokedex";

    $conexion = mysqli_connect($host, $usuario, $password, $base_de_datos);

    if (!$conexion) {
        die ("Error de conexion: " . mysqli_connect_error());
    } else {
        $sql_crear_tabla = "CREATE TABLE IF NOT EXISTS usuarios (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(100) NOT NULL,
            username VARCHAR(50) NOT NULL UNIQUE,
            email VARCHAR(100) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            genero VARCHAR(50) NOT NULL,
            rol VARCHAR(50) DEFAULT 'Usuario'
        )";

        if (mysqli_query($conexion, $sql_crear_tabla)) {
            // echo ("La tabla 'usuarios' está lista.");
        } else {
            die ("Error al crear la tabla automáticamente: " . mysqli_error($conexion));
        }
    }
?>