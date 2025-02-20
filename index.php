<?php
include 'db.php';
$result = $conn->query("SELECT * FROM empleos");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Empleos</title>
    <link rel="stylesheet" href="styles.css">
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
    <div class="hero">
        <h1>¡Únete a la startup de IA de más rápido crecimiento en El Salvador!</h1>
    </div>
    <div class="jobs-section" id="empleos">
        <h2>Oportunidades Disponibles</h2>
        <div class="job-grid">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="job-card">
                    <img src="<?= $row['image'] ?>" alt="<?= $row['titulo'] ?>">
                    <div class="job-card-content">
                        <h3><?= $row['titulo'] ?></h3>
                        <p><?= substr($row['descripcion'], 0, 100) ?>...</p>
                        <a href="detalle.php?id=<?= $row['id'] ?>">Ver más</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <footer class="footer">
        <p>&copy; 2025 BotBlaze. Todos los derechos reservados.</p>
    </footer>
</body>
</html>