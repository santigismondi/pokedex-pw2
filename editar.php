<?php
    session_start();

    if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'Administrador') {
        header("Location: index.php");
        exit();
    }

    require __DIR__ . '/resources/database/dbConection.php';

    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $error = "";

    $resultado = mysqli_query($conexion, "SELECT * FROM pokemons WHERE id = $id");
    $pokemon = mysqli_fetch_assoc($resultado);

    if (!$pokemon) {
        header("Location: index.php");
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $numero_identificador = intval($_POST['numero_identificador']);
        $nombre      = mysqli_real_escape_string($conexion, trim($_POST['nombre']));
        $tipo        = mysqli_real_escape_string($conexion, $_POST['tipo']);
        $descripcion = mysqli_real_escape_string($conexion, trim($_POST['descripcion']));

        $imagen_ruta = mysqli_real_escape_string($conexion, $pokemon['imagen_ruta']);
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $nombreArchivo = basename($_FILES['imagen']['name']);
            $destino = "resources/imagenes/pokemon/" . $nombreArchivo;
            move_uploaded_file($_FILES['imagen']['tmp_name'], $destino);
            $imagen_ruta = $destino;
        }

        $sql = "UPDATE pokemons SET
                    numero_identificador = '$numero_identificador',
                    imagen_ruta          = '$imagen_ruta',
                    nombre               = '$nombre',
                    tipo                 = '$tipo',
                    descripcion          = '$descripcion'
                WHERE id = $id";

        if (mysqli_query($conexion, $sql)) {
            header("Location: index.php");
            exit();
        } else {
            $error = "Error al actualizar: " . mysqli_error($conexion);
        }
    }
?>

<?php require __DIR__ . '/resources/php/header.php'; ?>

    <h2 class="mb-4">Editar Pokémon</h2>

    <?php if ($error != ""): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <form action="editar.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Número identificador</label>
            <input type="number" name="numero_identificador" class="form-control"
                   value="<?php echo htmlspecialchars($pokemon['numero_identificador']); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control"
                   value="<?php echo htmlspecialchars($pokemon['nombre']); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tipo</label>
            <select name="tipo" class="form-select" required>
                <?php
                $tipos = ['Fuego', 'Agua', 'Planta', 'Eléctrico', 'Bicho', 'Normal', 'Veneno', 'Psíquico'];
                foreach ($tipos as $tipo) {
                    $selected = ($pokemon['tipo'] === $tipo) ? 'selected' : '';
                    echo "<option value='$tipo' $selected>$tipo</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" rows="3" required><?php echo htmlspecialchars($pokemon['descripcion']); ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Imagen actual</label><br>
            <img src="<?php echo htmlspecialchars($pokemon['imagen_ruta']); ?>"
                 alt="<?php echo htmlspecialchars($pokemon['nombre']); ?>" width="80" class="mb-2"><br>
            <input type="file" name="imagen" class="form-control" accept="image/*">
            <small class="text-muted">Dejá vacío para conservar la imagen actual</small>
        </div>
        <button type="submit" class="btn btn-warning me-2">Guardar cambios</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>

</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>