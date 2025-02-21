<?php
include 'db.php';

// Asegurar que la carpeta 'cvs' existe
$cv_folder = "cvs/";
if (!file_exists($cv_folder)) {
    mkdir($cv_folder, 0777, true);
}

// Recoger datos del formulario con sanitización
$nombre = $conn->real_escape_string($_POST['nombre']);
$email = $conn->real_escape_string($_POST['email']);
$whatsApp = $conn->real_escape_string($_POST['whatsApp']);
$linkedin = $conn->real_escape_string($_POST['linkedin']); // Asegúrate de que 'linkedin' esté en minúsculas
$portafolio = $conn->real_escape_string($_POST['portafolio']); // Asegúrate de que 'portafolio' esté en minúsculas

// Manejo del archivo CV
if (isset($_FILES['cv']) && $_FILES['cv']['error'] === UPLOAD_ERR_OK) {
    $cv_temp = $_FILES['cv']['tmp_name'];
    $cv_name = basename($_FILES['cv']['name']);
    $cv_path = $cv_folder . $cv_name;

    // Verificar el tipo de archivo (solo PDFs o DOCX)
    $allowed_types = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
    if (!in_array($_FILES['cv']['type'], $allowed_types)) {
        die("Error: El archivo debe ser PDF o DOCX.");
    }

    // Mover el archivo
    if (!move_uploaded_file($cv_temp, $cv_path)) {
        die("Error al subir el archivo.");
    }
} else {
    die("Error: No se seleccionó un archivo válido.");
}

// Guardar la postulación en la tabla 'postulaciones' usando consulta preparada
$stmt = $conn->prepare("INSERT INTO postulaciones (nombre, email, whatsApp, linkedin, portafolio, cv) 
                        VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $nombre, $email, $whatsApp, $linkedin, $portafolio, $cv_name);

if (!$stmt->execute()) {
    die("Error en la postulación: " . $stmt->error);
}

// Obtener el ID de la postulación insertada
$postulacion_id = $stmt->insert_id;
$stmt->close();

// Obtener el empleo seleccionado (solo uno, ya que usamos un radio button)
$empleo_id = isset($_POST['empleo_id']) ? $_POST['empleo_id'] : null;

if ($empleo_id) {
    // Usar consulta preparada para evitar SQL Injection
    $stmt = $conn->prepare("INSERT INTO postulaciones_empleos (postulacion_id, empleo_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $postulacion_id, $empleo_id);
    if (!$stmt->execute()) {
        die("Error al asociar empleo: " . $stmt->error);
    }
    $stmt->close();
} else {
    die("Error: No se seleccionó un empleo.");
}

echo "Postulación enviada correctamente.";
?>
