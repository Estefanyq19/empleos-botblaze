<?php
include 'db.php';

// Recoger datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$whatsApp = $_POST['whatsApp'];
$linkedin = $_POST['LinkedIn'];
$portafolio = $_POST['Portafolio'];
$cv = $_FILES['cv']['name'];
move_uploaded_file($_FILES['cv']['tmp_name'], "cvs/$cv");

// Guardar la postulación en la tabla 'postulaciones'
$conn->query("INSERT INTO postulaciones (nombre, email, whatsApp, linkedin, portafolio, cv) 
              VALUES ('$nombre', '$email', '$whatsApp', '$linkedin', '$portafolio', '$cv')");

// Obtener el ID de la postulación insertada
$postulacion_id = $conn->insert_id;

// Guardar los empleos seleccionados desde el checkbox
if (isset($_POST['id_empleos'])) {
    $empleos = $_POST['id_empleos'];

    foreach ($empleos as $empleo_id) {
        // Insertar la relación entre la postulación y los empleos seleccionados
        $conn->query("INSERT INTO postulaciones_empleos (postulacion_id, empleo_id) 
                      VALUES ('$postulacion_id', '$empleo_id')");
    }
}

echo "Postulación enviada.";
?>
