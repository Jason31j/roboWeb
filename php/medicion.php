<?php
$servername = "localhost"; // Reemplaza con el nombre del servidor de la base de datos
$username = "id20893267_jahiruwu";     // Reemplaza con el nombre de usuario de la base de datos
$password = "esqnxp7j56utquqqisdb1A-";            // Reemplaza con la contraseña de la base de datos
$dbname = "id20893267_dbairesacondicionados"; // Reemplaza con el nombre de la base de datos

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtiene el valor del sensor de gas del parámetro "value" enviado por Arduino
$value = $_GET["sensorValue"];

// Inserta el valor en la tabla
$sql = "INSERT INTO datos (valor) VALUES ('$value')";

if ($conn->query($sql) === TRUE) {
    echo "Datos insertados correctamente en la base de datos";
} else {
    echo "Error al insertar datos: " . $conn->error;
}

$conn->close();
?>