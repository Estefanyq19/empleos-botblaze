<?php
include 'db.php'; // relacion a conexion con bd
$id = $_GET['id'];

// Obtener los empleos disponibles
$empleosResult = $conn->query("SELECT * FROM empleos");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postulación</title>
    <link rel="stylesheet" href="styleForm.css">
</head>
<body>
    <header class="header">
        <h1>Postular al Empleo</h1>
    </header>

    <div class="container">
        <form action="guardar_postulacion.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="empleo_id" value="<?= $id ?>">

            <!-- Nombre y Correo -->
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
            </div>

            <div class="form-group">
                <label for="email">Correo</label>
                <input type="email" name="email" id="email" placeholder="Correo" required>
            </div>

            <!-- Checklist de empleos -->
            <div class="form-group">
                <label for="empleo">Selecciona el empleo al que deseas postular:</label>
                <div class="checkbox-group">
                    <?php while ($empleo = $empleosResult->fetch_assoc()): ?>
                        <div class="checkbox-item">
                            <input type="checkbox" name="id_empleos[]" value="<?= $empleo['id'] ?>" id="empleo_<?= $empleo['id'] ?>">
                            <label for="empleo_<?= $empleo['id'] ?>"><?= $empleo['titulo'] ?></label>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>

            <!-- CV y otros campos -->
            <div class="form-group">
                <label for="cv">Sube tu CV</label>
                <input type="file" name="cv" id="cv" required>
            </div>

            <div class="form-group">
                <label for="whatsApp">WhatsApp</label>
                <input type="text" name="whatsApp" id="whatsApp" placeholder="Número de WhatsApp" required>
            </div>

            <div class="form-group">
                <label for="linkedin">LinkedIn</label>
                <input type="url" name="LinkedIn" id="linkedin" placeholder="URL de LinkedIn">
            </div>

            <div class="form-group">
                <label for="portafolio">Portafolio</label>
                <input type="url" name="Portafolio" id="portafolio" placeholder="URL de tu Portafolio">
            </div>

            <button class="button" type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>
