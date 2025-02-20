<?php
include 'db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM empleos WHERE id = $id");
$empleo = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $empleo['titulo'] ?></title>
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
            <h1><?= $empleo['titulo'] ?></h1>
        </div>
    </header>

    <main class="main-content">
        <div class="container">
            <div class="job-details">
                <!-- Imagen del empleo -->
                <div class="job-image">
                    <img src="<?= $empleo['image'] ?>" alt="<?= $empleo['titulo'] ?>" class="job-img">
                </div>

                <!-- Descripción del empleo -->
                <div class="description">
                    <h2>Descripción del Empleo</h2>
                    <p><?= $empleo['descripcion'] ?></p>
                </div>

                <!-- Requisitos -->
                <div class="requirements">
                    <h3>Requisitos</h3>
                    <p><?= $empleo['requisitos'] ?></p>
                </div>

                <!-- Responsabilidades -->
                <div class="responsibilities">
                    <h3>Responsabilidades</h3>
                    <p><?= $empleo['responsabilidades'] ?></p>
                </div>

                <!-- Botón de postulación -->
                <a class="apply-button" href="postular.php?id=<?= $empleo['id'] ?>">Postular</a>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
           
        </div>
    </footer>
</body>
</html>
