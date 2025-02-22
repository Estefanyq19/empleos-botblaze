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
    <link rel="stylesheet" href="styleForm.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 -->
</head>
<body>

    <!-- Botón Regresar -->
    <button onclick="window.history.back()" class="btn-regresar">Regresar</button>

    <div class="container">
        <h1>Postular al Empleo</h1>

        <!-- Formulario de postulación -->
        <form id="postulacionForm" action="guardar_postulacion.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="empleo_id" value="<?= htmlspecialchars($id) ?>">

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
            </div>

            <div class="form-group">
                <label for="email">Correo</label>
                <input type="email" name="email" id="email" placeholder="Correo" required>
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
                <label for="whatsApp">WhatsApp</label>
                <input type="tel" name="whatsApp" id="whatsApp" placeholder="Número de WhatsApp" required>
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

    <script>
        document.getElementById("postulacionForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Evita el envío inmediato

            const nombre = document.getElementById("nombre").value.trim();
            const email = document.getElementById("email").value.trim();
            const empleo = document.getElementById("empleo").value;
            const cv = document.getElementById("cv").files[0];
            const whatsapp = document.getElementById("whatsApp").value.trim();

            // Validar campos vacíos
            if (!nombre || !email || !empleo || !cv || !whatsapp) {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Por favor, completa todos los campos obligatorios.",
                });
                return;
            }

            // Validar archivo CV (solo PDF o Word)
            const allowedExtensions = ["application/pdf", "application/msword", 
                "application/vnd.openxmlformats-officedocument.wordprocessingml.document"];
            if (!allowedExtensions.includes(cv.type)) {
                Swal.fire({
                    icon: "error",
                    title: "Archivo inválido",
                    text: "Solo se permiten archivos PDF o Word.",
                });
                return;
            }

            // Validar WhatsApp (solo números y máximo 15 caracteres)
            const regexWhatsApp = /^[0-9]{7,15}$/;
            if (!regexWhatsApp.test(whatsapp)) {
                Swal.fire({
                    icon: "error",
                    title: "Número inválido",
                    text: "El número de WhatsApp debe contener solo números y tener entre 7 y 15 dígitos.",
                });
                return;
            }

            // Confirmación antes de enviar
            Swal.fire({
                title: "¿Confirmas tu postulación?",
                text: "Verifica que toda la información es correcta.",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Sí, enviar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("postulacionForm").submit();
                }
            });
        });

        // Autoformateo del campo WhatsApp
        document.getElementById("whatsApp").addEventListener("input", function() {
            this.value = this.value.replace(/\D/g, ""); // Elimina cualquier carácter no numérico
        });

        // Función para mostrar alerta de éxito o error
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            
            // Verifica si la URL tiene el parámetro "success" o "error"
            if (urlParams.has('success')) {
                Swal.fire({
                    icon: 'success',
                    title: '¡Postulación enviada con éxito!',
                    text: 'Tu postulación ha sido enviada correctamente. ¡Gracias por aplicar!',
                });
            } else if (urlParams.has('error')) {
                let errorMessage = 'Hubo un problema al enviar tu postulación. Por favor, intenta de nuevo.';
                // Mostrar un mensaje de error más específico dependiendo del parámetro
                if (urlParams.get('error') === 'db') {
                    errorMessage = 'Error en la base de datos. Por favor, inténtalo nuevamente.';
                } else if (urlParams.get('error') === 'invalid_file') {
                    errorMessage = 'El archivo del CV no es válido. Asegúrate de subir un archivo PDF o Word.';
                } else if (urlParams.get('error') === 'file_upload') {
                    errorMessage = 'Hubo un problema al cargar tu archivo. Por favor, intenta nuevamente.';
                }

                Swal.fire({
                    icon: 'error',
                    title: '¡Error!',
                    text: errorMessage,
                });
            }
        };
    </script>
</body>
</html>
