<?php
include 'db.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    $result = $conn->query("SELECT * FROM empleos WHERE id = $id");

    if ($result->num_rows > 0) {
        $empleo = $result->fetch_assoc();
    } else {
        echo "El empleo solicitado no existe.";
        exit;
    }
} else {
    echo "ID de empleo no válido.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($empleo['nombre_empleo']) ?></title>
    <link rel="stylesheet" href="styleDetalle.css">
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <img src="https://botblaze.tech/wp-content/uploads/2024/02/logo-header-bb.png" alt="BotBlaze">
        </div>
        <ul>
            <li><a href="index.php">Inicio</a></li>
        </ul>
    </nav>

    <header class="header">
        <div class="container">
            <h1><?= htmlspecialchars($empleo['nombre_empleo']) ?></h1>
        </div>
    </header>

    <main class="main-content">
        <div class="container">
            <div class="job-details">
                <!-- Contenedor de la imagen -->
                 <div class="job-image">
                    <?php if (!empty($empleo['foto'])): ?>
                        <img src="<?= htmlspecialchars($empleo['foto']) ?>" alt="<?= htmlspecialchars($empleo['nombre_empleo']) ?>" class="job-img">
                        <?php else: ?>
                            <p>Imagen no disponible</p>
                            <?php endif; ?>
                        </div>

                <!-- Información del empleo -->
                <div class="description">
                    <h2>Descripción del Empleo</h2>
                    <p><?= nl2br(htmlspecialchars($empleo['descripcion'])) ?></p>
                </div>

                <div class="requirements">
                    <h3>Requisitos</h3>
                    <p><?= nl2br(htmlspecialchars($empleo['requisitos'])) ?></p>
                </div>

                <div class="responsibilities">
                    <h3>Responsabilidades</h3>
                    <p><?= nl2br(htmlspecialchars($empleo['responsabilidades'])) ?></p>
                </div>

                <div class="functions">
                    <h3>Funciones</h3>
                    <p><?= nl2br(htmlspecialchars($empleo['funciones'])) ?></p>
                </div>

                <!-- Botón de postulación -->
                <a class="apply-button" href="postular.php?id=<?= htmlspecialchars($empleo['id']) ?>">Postular</a>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
        </div>
    </footer>
</body>
</html>
