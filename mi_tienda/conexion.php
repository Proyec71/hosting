<?php
$conexion = mysqli_connect("localhost", "root", "", "tienda_goteros");

if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}
?>
