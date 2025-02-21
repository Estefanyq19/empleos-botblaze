<?php
include 'db.php';

// Sanitizar el id para asegurarse de que sea un número entero
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    // Buscar el empleo en la base de datos
    $result = $conn->query("SELECT * FROM empleos WHERE id = $id");

    // Verificar si se encontró el empleo
    if ($result->num_rows > 0) {
        $empleo = $result->fetch_assoc();
    } else {
        // Si no se encuentra el empleo, mostrar un error o redirigir
        echo "El empleo solicitado no existe.";
        exit;
    }
} else {
    // Si el id no es válido, redirigir a la página principal o mostrar un mensaje
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
        <div class="logo"><img src="https://botblaze.tech/wp-content/uploads/2024/02/logo-header-bb.png" alt="BotBlaze"></div>
        <ul>
            <li><a href="#">Inicio</a></li>
            <li><a href="#empleos">Empleos</a></li>
            <li><a href="#contacto">Contacto</a></li>
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
                <!-- Imagen del empleo -->
                <div class="job-image">
                    <img src="<?= htmlspecialchars($empleo['foto']) ?>" alt="<?= htmlspecialchars($empleo['nombre_empleo']) ?>" class="job-img">
                </div>

                <!-- Descripción del empleo -->
                <div class="description">
                    <h2>Descripción del Empleo</h2>
                    <p><?= nl2br(htmlspecialchars($empleo['descripcion'])) ?></p>
                </div>

                <!-- Requisitos -->
                <div class="requirements">
                    <h3>Requisitos</h3>
                    <p><?= nl2br(htmlspecialchars($empleo['requisitos'])) ?></p>
                </div>

                <!-- Responsabilidades -->
                <div class="responsibilities">
                    <h3>Responsabilidades</h3>
                    <p><?= nl2br(htmlspecialchars($empleo['responsabilidades'])) ?></p>
                </div>

                <!-- Funciones -->
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
            <!-- Pie de página -->
        </div>
    </footer>
</body>
</html>
