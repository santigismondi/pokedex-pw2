<?php
    $host = "127.0.0.1";
    $usuario = "root";
    $password = "";
    $base_de_datos = "pokedex";

    $conexion = mysqli_connect($host, $usuario, $password, $base_de_datos);

    if (!$conexion) {
        die ("Error de conexion: " . mysqli_connect_error());
    }
?>