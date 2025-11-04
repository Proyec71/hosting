<?php
$conexion = new mysqli("localhost", "root", "", "registro_personas");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>

