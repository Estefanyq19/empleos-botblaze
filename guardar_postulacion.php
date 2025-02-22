<?php
include 'db.php'; // Relación a conexión con la base de datos

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$empleo_id = isset($_POST['empleo_id']) ? intval($_POST['empleo_id']) : 0;

// Obtener el nombre del empleo para crear la subcarpeta
$empleo_nombre = '';
if ($empleo_id) {
    $stmt = $conn->prepare("SELECT nombre_empleo FROM empleos WHERE id = ?");
    $stmt->bind_param("i", $empleo_id);
    $stmt->execute();
    $stmt->bind_result($empleo_nombre);
    $stmt->fetch();
    $stmt->close();
}

// Procesar los datos del formulario
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$whatsApp = isset($_POST['whatsApp']) ? $_POST['whatsApp'] : '';
$linkedin = isset($_POST['linkedin']) ? $_POST['linkedin'] : '';
$portafolio = isset($_POST['portafolio']) ? $_POST['portafolio'] : '';
$cv_name = '';

// Subir el archivo CV
if (isset($_FILES['cv']) && $_FILES['cv']['error'] === UPLOAD_ERR_OK) {
    $cv_temp = $_FILES['cv']['tmp_name'];

    // Obtener la extensión del archivo original
    $ext = pathinfo($_FILES['cv']['name'], PATHINFO_EXTENSION); // Obtener la extensión del archivo

    // Renombrar el archivo con el nombre del usuario (sin espacios ni caracteres especiales)
    $cv_name = strtolower(str_replace(' ', '_', $nombre)) . '.' . $ext; // El nombre será el del usuario + extensión

    $cv_folder = "cvs/" . strtolower(str_replace(' ', '_', $empleo_nombre)); // Crear subcarpeta para el empleo

    // Crear la subcarpeta si no existe
    if (!file_exists($cv_folder)) {
        mkdir($cv_folder, 0777, true);
    }

    // Verificar que el archivo sea válido
    $allowed_types = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
    if (!in_array($_FILES['cv']['type'], $allowed_types)) {
        die("Error: El archivo debe ser PDF o DOCX.");
    }

    // Verificar el tamaño del archivo (por ejemplo, máximo 5MB)
    $max_size = 5 * 1024 * 1024; // 5MB
    if ($_FILES['cv']['size'] > $max_size) {
        die("Error: El archivo debe ser menor a 5MB.");
    }

    // Mover el archivo a la subcarpeta
    $cv_path = $cv_folder . "/" . $cv_name;
    if (!move_uploaded_file($cv_temp, $cv_path)) {
        die("Error al subir el archivo.");
    }
}

// Guardar la postulación en la base de datos
$stmt = $conn->prepare("INSERT INTO postulaciones (nombre, email, whatsApp, linkedin, portafolio, cv) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $nombre, $email, $whatsApp, $linkedin, $portafolio, $cv_name);

if ($stmt->execute()) {
    $postulacion_id = $stmt->insert_id;
    $stmt->close();

    // Asociar el empleo con la postulación
    if ($empleo_id) {
        $stmt = $conn->prepare("INSERT INTO postulaciones_empleos (postulacion_id, empleo_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $postulacion_id, $empleo_id);
        $stmt->execute();
        $stmt->close();
    }

    // Redirigir con éxito
    header("Location: postular.php?id=" . $id . "&success=1");
    exit();
} else {
    die("Error en la postulación: " . $stmt->error);
}
?>
