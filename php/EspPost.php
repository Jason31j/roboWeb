<?php

include 'conexion.php';

if (isset($_POST['temperatura'])) {
        $temperatura = $_POST['temperatura'];
        echo "Temperatura: " . $temperatura;
        
      $consulta = "UPDATE Estado SET Temperatura = '$temperatura' WHERE ID = 1";
       // $consulta = "INSERT INTO Estado (Temperatura) VALUES ('$temperatura')";
     //   $resultado = mysqli_query($con, $consulta);
      //  if ($resultado) {
      if (mysqli_query ($con, $consulta)){
            echo "Registro en base de datos OK! ";
        } else {
            echo "Falla! Registro BD". mysqli_error($con);
        }
    } else {
    echo "Falla! Conexión con Base de datos ";
}
?>