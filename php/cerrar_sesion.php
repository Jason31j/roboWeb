<?php
session_start();
session_destroy();
header("Location: index.html"); // Redireccionar a la página de inicio de sesión después de cerrar sesión
?>
