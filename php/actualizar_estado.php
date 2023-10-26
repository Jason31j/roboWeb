<?php
$servername = "localhost";
$username = "id20893267_jahiruwu";
$password = "esqnxp7j56utquqqisdb1A-";
$dbname = "id20893267_dbairesacondicionados";

// Obtener el estado desde el parámetro de la URL
if (isset($_GET['estado'])) {
  $estado = intval($_GET['estado']);

  // Establecer conexión a la base de datos
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
  }

  // Actualizar el estado en la tabla
  $sql = "UPDATE Estado SET estado = $estado WHERE id = 1";
  if ($conn->query($sql) === TRUE) {
    // Éxito al actualizar el estado
    echo "Estado actualizado correctamente";
  } else {
    echo "Error al actualizar el estado: " . $conn->error;
  }

  $conn->close();
}
?>
