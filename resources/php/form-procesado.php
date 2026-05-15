<?php
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        require_once '../database/dbConection.php';

        $nombre = $_POST['nombre'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $genero = $_POST['genero'];
        $rol = 'Usuario'; //Rol por defecto para nuevos registros

        $stmt_check = mysqli_prepare($conexion, "SELECT id FROM usuarios WHERE username = ? OR email = ?");
        mysqli_stmt_bind_param($stmt_check, "ss", $username, $email);
        mysqli_stmt_execute($stmt_check);
        mysqli_stmt_store_result($stmt_check);

        if (mysqli_stmt_num_rows($stmt_check) > 0) {
            echo "<script>
                alert('Error: El nombre de usuario o email ya están registrados. Por favor, elige otro.');
                window.history.back();
            </script>";
            mysqli_stmt_close($stmt_check);
            mysqli_close($conexion);
            exit();
        }
        mysqli_stmt_close($stmt_check);

        $stmt_insert = mysqli_prepare($conexion, "INSERT INTO usuarios (nombre, username, email, password, genero, rol) VALUES (?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt_insert, "ssssss", $nombre, $username, $email, $password, $genero, $rol);

        if (mysqli_stmt_execute($stmt_insert)) {
            echo "<script>
                alert('¡Registro exitoso! Serás redirigido al inicio.');
                window.location.href = '../../index.php';
            </script>";
        } else {
            echo "<script>
                alert('Hubo un error al registrar: " . mysqli_error($conexion) . "');
                window.history.back();
            </script>";
        }

        mysqli_stmt_close($stmt_insert);
        mysqli_close($conexion);
        exit();
    }
?>