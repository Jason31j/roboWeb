<?php
// Realiza la conexión a la base de datos
$conexion = mysqli_connect('localhost', 'id20893267_jahiruwu', 'esqnxp7j56utquqqisdb1A-', 'id20893267_dbairesacondicionados');

if (!$conexion) {
    die('Error de conexión a la base de datos');
}

// Realiza la consulta para obtener la temperatura de la tabla "Estado" en la temperatura mod
$resultado = mysqli_query($conexion, "SELECT Ubicacion FROM Estado LIMIT 1");

if ($resultado && mysqli_num_rows($resultado) > 0) {
    // Obtiene el valor de la temperatura de la primera fila
    $fila = mysqli_fetch_assoc($resultado);
    $temperatura = $fila['Ubicacion'];

    // Retorna el valor de la temperatura como respuesta
    echo $temperatura;
} else {
    // En caso de error o si no hay registros en la tabla
    echo "No se pudo obtener la temperatura";
}

// Cierra la conexión a la base de datos
mysqli_close($conexion);
?>
