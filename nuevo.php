<?php
    session_start();

    if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'Administrador') {
        header("Location: index.php");
        exit();
    }

    require __DIR__ . '/resources/database/dbConection.php';

    $error = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $numero_identificador = intval($_POST['numero_identificador']);
        $nombre      = mysqli_real_escape_string($conexion, trim($_POST['nombre']));
        $tipo        = mysqli_real_escape_string($conexion, $_POST['tipo']);
        $descripcion = mysqli_real_escape_string($conexion, trim($_POST['descripcion']));

        $imagen_ruta = "";
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $nombreArchivo = basename($_FILES['imagen']['name']);
            $destino = "resources/imagenes/pokemon/" . $nombreArchivo;
            move_uploaded_file($_FILES['imagen']['tmp_name'], $destino);
            $imagen_ruta = $destino;
        }

        $sql = "INSERT INTO pokemons (numero_identificador, imagen_ruta, nombre, tipo, descripcion)
                VALUES ('$numero_identificador', '$imagen_ruta', '$nombre', '$tipo', '$descripcion')";

        if (mysqli_query($conexion, $sql)) {
            header("Location: index.php");
            exit();
        } else {
            $error = "Error al guardar: " . mysqli_error($conexion);
        }
    }
?>

<?php require __DIR__ . '/resources/php/header.php'; ?>

    <h2 class="mb-4">Nuevo Pokémon</h2>

    <?php if ($error != ""): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <form action="nuevo.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Número identificador</label>
            <input type="number" name="numero_identificador" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tipo</label>
            <select name="tipo" class="form-select" required>
                <option value="" disabled selected>Seleccionar tipo</option>
                <option value="Fuego">Fuego</option>
                <option value="Agua">Agua</option>
                <option value="Planta">Planta</option>
                <option value="Eléctrico">Eléctrico</option>
                <option value="Bicho">Bicho</option>
                <option value="Normal">Normal</option>
                <option value="Veneno">Veneno</option>
                <option value="Psíquico">Psíquico</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Imagen</label>
            <input type="file" name="imagen" class="form-control" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-success me-2">Guardar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>

</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>