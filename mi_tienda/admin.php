<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<header>
    <h1>Panel de Administración</h1>
    <div style="margin:10px;">
        <a href="agregar.php" class="boton">+ Agregar Producto</a>
        <a href="logout.php" class="boton eliminar">Cerrar Sesión</a>
    </div>
</header>

<div class="productos">
    <?php
    $consulta = "SELECT * FROM productos";
    $resultado = mysqli_query($conexion, $consulta);

    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo '
        <div class="producto">
            <img src="imagenes/'.$fila['imagen'].'" alt="'.$fila['nombre'].'">
            <h2>'.$fila['nombre'].'</h2>
            <p>$'.$fila['precio'].'</p>
            <a href="editar.php?id='.$fila['id'].'" class="boton">Editar</a>
            <a href="eliminar.php?id='.$fila['id'].'" class="boton eliminar">Eliminar</a>
        </div>';
    }
    ?>
</div>
</body>
</html>
