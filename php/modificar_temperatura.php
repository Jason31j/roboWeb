<?php
// Realiza la conexión a la base de datos
$conexion = mysqli_connect('localhost', 'id20893267_jahiruwu', 'esqnxp7j56utquqqisdb1A-', 'id20893267_dbairesacondicionados');

if (!$conexion) {
    die('Error de conexión a la base de datos');
}

// Verifica si se recibió la acción (subir o bajar) mediante la variable GET
if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];

    // Realiza la consulta para obtener la temperatura actual
    $resultado = mysqli_query($conexion, "SELECT TemperaturaMod FROM Estado LIMIT 1");

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        // Obtiene el valor de la temperatura de la primera fila
        $fila = mysqli_fetch_assoc($resultado);
        $temperaturaActual = $fila['TemperaturaMod'];

        // Realiza la acción correspondiente (subir o bajar)
        if ($accion == "subir") {
            $temperaturaNueva = $temperaturaActual + 1;
        } elseif ($accion == "bajar") {
            $temperaturaNueva = $temperaturaActual - 1;
        }

        // Actualiza el valor de la temperatura en la tabla "Estado" usando la temperatura mod
        mysqli_query($conexion, "UPDATE Estado SET TemperaturaMod = $temperaturaNueva");

        // Retorna una respuesta exitosa
        echo "La temperatura ha sido modificada exitosamente.";
    } else {
        // En caso de error o si no hay registros en la tabla
        echo "No se pudo obtener la temperatura actual.";
    }
} else {
    // Si no se recibió la acción correctamente
    echo "No se especificó una acción válida.";
}

// Cierra la conexión a la base de datos
mysqli_close($conexion);
?>
