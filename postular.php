<?php
include 'db.php'; // Relación a conexión con la base de datos
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
    <!-- Botón Regresar -->
    <button onclick="window.history.back()" class="btn-regresar">Regresar</button>

    <!-- Título -->
    <div class="container">
        <h1>Postular al Empleo</h1>

        <!-- Formulario de postulación -->
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

            <!-- Empleo: Lista Desplegable -->
            <div class="form-group">
                <label for="empleo">Selecciona el empleo al que deseas postular:</label>
                <select name="empleo_id" id="empleo" required>
                    <option value="">Seleccione un empleo</option>
                    <?php while ($empleo = $empleosResult->fetch_assoc()): ?>
                        <option value="<?= $empleo['id'] ?>" <?= ($empleo['id'] == $id) ? 'selected' : '' ?>><?= $empleo['nombre_empleo'] ?></option>
                    <?php endwhile; ?>
                </select>
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
                <input type="url" name="linkedin" id="linkedin" placeholder="URL de LinkedIn">
            </div>

            <div class="form-group">
                <label for="portafolio">Portafolio</label>
                <input type="url" name="portafolio" id="portafolio" placeholder="URL de tu Portafolio">
            </div>

            <button class="button" type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>
