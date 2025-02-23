<?php
include 'db.php'; // Conexión con la base de datos

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Obtener empleos disponibles con seguridad en la consulta
$empleosStmt = $conn->prepare("SELECT id, nombre_empleo FROM empleos");
$empleosStmt->execute();
$empleosResult = $empleosStmt->get_result();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postulación</title>
    <link rel="stylesheet" href="./style/formulario/styleForm.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 -->
    <style>
        .form-row {
            display: flex;
            justify-content: space-between;
        }
        .form-row .form-group {
            width: 48%;
        }
    </style>
</head>
<body>

    <!-- Botón Regresar -->
    <button onclick="window.location.href='index.php';" class="btn-regresar">Regresar</button>

    <div class="container">
        <h1>Postular al Empleo</h1>

        <!-- Formulario de postulación -->
        <form id="postulacionForm" action="guardar_postulacion.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="empleo_id" value="<?= htmlspecialchars($id) ?>">

            <div class="form-row">
                <div class="form-group">
                    <label for="primer_nombre">Primer Nombre</label>
                    <input type="text" name="primer_nombre" id="primer_nombre" placeholder="Primer Nombre" required>
                </div>
                <div class="form-group">
                    <label for="segundo_nombre">Segundo Nombre</label>
                    <input type="text" name="segundo_nombre" id="segundo_nombre" placeholder="Segundo Nombre">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="primer_apellido">Primer Apellido</label>
                    <input type="text" name="primer_apellido" id="primer_apellido" placeholder="Primer Apellido" required>
                </div>
                <div class="form-group">
                    <label for="segundo_apellido">Segundo Apellido</label>
                    <input type="text" name="segundo_apellido" id="segundo_apellido" placeholder="Segundo Apellido">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="email">Correo</label>
                    <input type="email" name="email" id="email" placeholder="Correo" required>
                </div>
                <div class="form-group">
                    <label for="whatsApp">WhatsApp</label>
                    <input type="tel" name="whatsApp" id="whatsApp" placeholder="Número de WhatsApp" required>
                </div>
            </div>

           
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required>
            </div>

            <div class="form-group">
                <label for="empleo">Selecciona el empleo al que deseas postular:</label>
                <select name="empleo_id" id="empleo" required>
                    <option value="">Seleccione un empleo</option>
                    <?php while ($empleo = $empleosResult->fetch_assoc()): ?>
                        <option value="<?= htmlspecialchars($empleo['id']) ?>" <?= ($empleo['id'] == $id) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($empleo['nombre_empleo']) ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="cv">Sube tu CV (PDF o Word)</label>
                <input type="file" name="cv" id="cv" accept=".pdf,.doc,.docx" required>
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
