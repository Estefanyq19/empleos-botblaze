<?php
include 'db.php';
$result = $conn->query("SELECT * FROM empleos");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleos - BotBlaze</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <nav class="navbar">
        <div class="logo">
            <img src="https://botblaze.tech/wp-content/uploads/2024/02/logo-header-bb.png" alt="BotBlaze">
        </div>
    </nav>

    <div class="hero">
        <h1>¡Únete a la startup de IA de más rápido crecimiento en El Salvador!</h1>
    </div>

    <!-- Sección del Carrusel y Video -->
    <div class="media-container">
        <div class="carousel-container">
            <div class="carousel">
                <img src="https://res.cloudinary.com/dfo4pp3fq/image/upload/v1740114192/WhatsApp_Image_2025-02-20_at_10.51.30_PM_eiqjrd.jpg" alt="Equipo trabajando" class="carousel-slide">
                <img src="https://res.cloudinary.com/dfo4pp3fq/image/upload/v1740114191/WhatsApp_Image_2025-02-20_at_10.55.02_PM_nlaxjx.jpg" alt="Reunión de equipo" class="carousel-slide">
                <img src="https://res.cloudinary.com/dfo4pp3fq/image/upload/v1740114192/WhatsApp_Image_2025-02-20_at_10.56.36_PM_jbgtqq.jpg" alt="Desarrolladores en acción" class="carousel-slide">
                <img src="https://res.cloudinary.com/dfo4pp3fq/image/upload/v1740114192/WhatsApp_Image_2025-02-20_at_10.51.29_PM_ynaxhn.jpg" alt="Desarrolladores en acción" class="carousel-slide">
                <img src="https://res.cloudinary.com/dfo4pp3fq/image/upload/v1740114191/WhatsApp_Image_2025-02-20_at_10.51.30_PM_1_w2tspd.jpg" alt="Desarrolladores en acción" class="carousel-slide">
            </div>
        </div>
        <div class="video-container">
            <video controls>
                <source src="https://res.cloudinary.com/dfo4pp3fq/video/upload/v1740114195/ssstwitter.com_1737856424982_ugq0pg.mp4" type="video/mp4">
                Tu navegador no soporta el video.
            </video>
        </div>
    </div>

    <!-- Sección de Empleos -->
    <div class="jobs-section" id="empleos">
        <h2>Oportunidades Disponibles</h2>
        <div class="job-grid">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="job-card">
                    <img src="<?= $row['foto'] ?>" alt="<?= $row['nombre_empleo'] ?>" class="job-card-img">
                    <div class="job-card-content">
                        <h3><?= $row['nombre_empleo'] ?></h3>
                        <p class="short-description">¿Te interesa comenzar una <?= strtolower($row['nombre_empleo']) ?>, aprender de la mano de expertos y crecer profesionalmente? ¡Aplica ahora!</p>
                        <a href="detalle.php?id=<?= $row['id'] ?>" class="btn-ver-mas">Ver más</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2025 BotBlaze. Todos los derechos reservados.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>
