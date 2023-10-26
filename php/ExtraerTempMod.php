
<?php
$servername = "localhost"; // Cambia esto con la dirección de tu servidor MySQL
$username = "id20893267_jahiruwu"; // Cambia esto con tu nombre de usuario de MySQL
$password = "esqnxp7j56utquqqisdb1A-"; // Cambia esto con tu contraseña de MySQL
$dbname = "id20893267_dbairesacondicionados"; // Cambia esto con el nombre de tu base de datos

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta para obtener el valor deseado
$sql = "SELECT TemperaturaMod FROM Estado WHERE ID = 1"; // Cambia "tabla" por el nombre de tu tabla y "id" por el campo que corresponda

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $valor = $row["TemperaturaMod"];
    echo $valor;
} else {
    echo "No se encontraron resultados";
}

$conn->close();
?>

