<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $conexion = new mysqli("localhost", "root", "", "pokedex");

    $resultado = $conexion->query("SELECT * FROM usuarios");

    $nombre = $_POST['nombre'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $genero = $_POST['genero'];

    $resultado = $conexion->query("INSERT INTO usuarios (nombre, username, email, password, genero) VALUES ('$nombre', '$username', '$email', '$password', '$genero')");

    header("Location: /pokedex/index.php");

    $conexion->close();
    exit();
}