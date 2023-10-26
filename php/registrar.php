<?php
// Conectar a la base de datos (ajusta las credenciales según tu configuración)
        $user = "id20893267_jahiruwu";
        $pass = "esqnxp7j56utquqqisdb1A-";
        $server = "localhost";
        $db ="id20893267_dbairesacondicionados";
        $con = mysqli_connect($server, $user, $pass, $db);

$conn = new mysqli($server, $user, $pass, $db);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$telefono = $_POST["telefono"];
$usuario = $_POST["usuario"];
$contrasena = $_POST["contrasena"];
$confirmar_contrasena = $_POST["confirmar_contrasena"];

// Verificar si las contraseñas coinciden
if ($contrasena !== $confirmar_contrasena) {
    die("Las contraseñas no coinciden. Por favor, inténtalo de nuevo.");
}

// Verificar si ya existe un usuario con el mismo nombre de usuario
$sql = "SELECT * FROM Usuarios WHERE usuario = '$usuario'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    die("Ya existe un usuario con el mismo nombre de usuario. Por favor, elige otro nombre de usuario.");
}

// Insertar los datos en la tabla Usuarios
$sql = "INSERT INTO Usuarios (nombre, apellido, contrasena, telefono, usuario) VALUES ('$nombre', '$apellido', '$contrasena', '$telefono', '$usuario')";

if ($conn->query($sql) === TRUE) {
    echo "Cuenta registrada exitosamente.";
} else {
    echo "Error al registrar la cuenta: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>