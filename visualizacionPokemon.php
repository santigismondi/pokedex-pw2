<?php
session_start();
require __DIR__ . '/resources/php/header.php';
require __DIR__ . '/resources/database/dbConection.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if($id > 0){
    $sql = "SELECT * FROM pokemons WHERE id = $id";
    /** @var TYPE_NAME $conexion */
    $resultado = mysqli_query($conexion, $sql);
    $pokemon = mysqli_fetch_assoc($resultado);
}
if (!$pokemon) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle - <?php echo htmlspecialchars($pokemon['nombre']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<main class="container mt-5">
    <div class="row align-items-start">
        <div class="col-md-5 text-center">
            <div class="p-3 border border-info border-3 rounded shadow-sm bg-white">
                <img src="<?php echo htmlspecialchars($pokemon['imagen_ruta']); ?>"
                     alt="<?php echo htmlspecialchars($pokemon['nombre']); ?>"
                     class="img-fluid">
            </div>
        </div>

        <div class="col-md-7">
            <div class="d-flex align-items-center mb-3">
                <img src="img/tipo_<?php echo htmlspecialchars($pokemon['tipo']); ?>.png"
                     alt="<?php echo htmlspecialchars($pokemon['tipo']); ?>"
                     width="40" class="me-3">

                <h1 class="display-5 fw-bold mb-0">
                    <?php echo htmlspecialchars($pokemon['numero_identificador']) . " " . htmlspecialchars($pokemon['nombre']); ?>
                </h1>
            </div>

            <div class="pokemon-descripcion mt-4">
                <p class="fs-5 text-secondary" style="text-align: justify;">
                    <?php
                    echo isset($pokemon['descripcion']) && !empty($pokemon['descripcion'])
                        ? htmlspecialchars($pokemon['descripcion'])
                        : "Este Pokémon es una especie fascinante. Según los registros de la Pokédex, posee habilidades únicas relacionadas con su tipo " . htmlspecialchars($pokemon['tipo']) . ". Es conocido por ser un espécimen raro de encontrar en estado salvaje.";
                    ?>
                </p>

                <p class="fs-6 text-muted">
                    Información adicional: Este espécimen ha sido registrado correctamente en el sistema y se encuentra disponible para su visualización detallada.
                </p>
            </div>

            <div class="mt-5">
                <a href="index.php" class="btn btn-primary btn-lg">Volver al listado</a>
            </div>
        </div>

    </div>
</main>

</body>
</html>
