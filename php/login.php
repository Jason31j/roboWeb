<?php
session_start();
// Datos de conexión a la base de datos
$servername = "localhost"; // Cambiar si es necesario
$username ="id20893267_jahiruwu"; // Cambiar por el nombre de usuario de la base de datos
$password = "esqnxp7j56utquqqisdb1A-";// Cambiar por la contraseña de la base de datos
$dbname = "id20893267_dbairesacondicionados"; // Cambiar por el nombre de la base de datos
// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Obtener los datos enviados desde el formulario de inicio de sesión
$username = $_POST['username'];
$password = $_POST['password'];

// Consulta para verificar las credenciales del usuario
$sql = "SELECT * FROM Usuarios WHERE usuario = '$username' AND contrasena = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Credenciales válidas, iniciar sesión
    $_SESSION['username'] = $username;
    header("Location: ../html/pagina_principal.html"); // Redireccionar a la página principal después de iniciar sesión
} else {
    // Credenciales inválidas, mostrar mensaje de error
    echo "Credenciales inválidas. Inténtalo de nuevo.";
}

$conn->close();
?>