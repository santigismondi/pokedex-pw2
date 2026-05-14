<?php

    // 1. Importamos el encabezado y la conexión a la base de datos
    require __DIR__ . '/resources/php/header.php';
    require __DIR__ . '/resources/database/dbConection.php';

/** @var TYPE_NAME $conexion */
$busqueda = isset($_GET['busqueda']) ? mysqli_real_escape_string($conexion, $_GET['busqueda']) : '';


    // Armamos la consulta SQL base
    $sql = "SELECT id, numero_identificador, imagen_ruta, nombre, tipo FROM pokemons";

    if ($busqueda != '') {
        $sql .= " WHERE nombre LIKE '%$busqueda%' OR tipo LIKE '%$busqueda%' OR numero_identificador = '$busqueda'";
    }


    // Ordenamos siempre por el número del pokédex
    $sql .= " ORDER BY numero_identificador ASC";

    $resultado = mysqli_query($conexion, $sql);

?>

<section class="row mb-4">
    <div class="col">
        <form action="index.php" method="GET" class="input-group">
            <input type="text" name="busqueda" class="form-control"
                   placeholder="Ingrese el nombre, tipo o número de pokémon"
                   value="<?php echo htmlspecialchars($busqueda); ?>">
            <button class="btn btn-outline-secondary" type="submit">¿Quién es este pokémon?</button>
        </form>
    </div>
</section>

<section class="row">
    <div class="col">
        <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-light">
            <tr>
                <th>Imagen</th>
                <th>Tipo</th>
                <th>Número</th>
                <th>Nombre</th>
                <?php if (isset($_SESSION['usuario']['rol']) && $_SESSION['usuario']['rol'] === 'Administrador'): ?>
                    <th>Acciones</th>
                <?php endif; ?>
            </tr>
            </thead>
            <tbody>
            <?php
            // Verificamos si la consulta trajo resultados
            if (mysqli_num_rows($resultado) > 0) {
                // Recorremos cada fila que devolvió la base de datos
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>";

                    // Mostramos la imagen del pokemon (la base de datos debe guardar la ruta, ej: 'img/charmander.png')
                    echo "<td><img src='" . htmlspecialchars($fila['imagen_ruta']) . "' alt='" . htmlspecialchars($fila['numero_identificador']) . "' width='50'></td>";

                    // Mostramos la imagen del tipo (asumiendo que en la BD guardas 'fuego', 'agua', etc.)
                    $tipoArchivo = strtolower($fila['tipo']);
                    $tipoArchivo = str_replace('é', 'e', $tipoArchivo);
                    $tipoArchivo = str_replace('í', 'i', $tipoArchivo);

                    echo "<td><img src='resources/imagenes/tipos/" . $tipoArchivo . ".webp' alt='" . htmlspecialchars($fila['tipo']) . "' width='50'></td>";

                    echo "<td>" . htmlspecialchars($fila['numero_identificador']) . "</td>";

                    // Enlace al detalle del pokemon pasando el ID autoincremental
                    echo "<td><a href='detalle.php?id=" . htmlspecialchars($fila['id']) . "'>" . htmlspecialchars($fila['nombre']) . "</a></td>";

                    // Si es administrador, mostramos los botones de acción
                    if (isset($_SESSION['usuario']['rol']) && $_SESSION['usuario']['rol'] === 'Administrador') {
                        echo "<td>";
                        echo "<a href='editar.php?id=" . htmlspecialchars($fila['id']) . "' class='btn btn-warning btn-sm me-1'>Modificación</a>";
                        echo "<a href='eliminar.php?id=" . htmlspecialchars($fila['id']) . "' class='btn btn-danger btn-sm'>Baja</a>";
                        echo "</td>";
                    }

                    echo "</tr>";
                }
            } else {
                // Cumplimos con el caso de uso: "Si se busca un pokemon inexistente, informar 'pokemon no encontrado'"
                $columnas = (isset($_SESSION['logueado']) && $_SESSION['logueado'] === true) ? 5 : 4;
                echo "<tr><td colspan='$columnas' class='text-center text-danger fw-bold py-4'>Pokémon no encontrado</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</section>

<?php if (isset($_SESSION['usuario']['rol']) && $_SESSION['usuario']['rol'] === 'Administrador'): ?>
    <div class="row">
        <div class="col">
            <a href="nuevo.php" class="btn btn-success w-100">Nuevo pokémon</a>
        </div>
    </div>
<?php endif; ?>

</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>