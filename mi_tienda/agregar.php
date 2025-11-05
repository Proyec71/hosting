



<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include("conexion.php");
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<header><h1>Agregar Nuevo Producto</h1></header>

<form action="" method="POST" enctype="multipart/form-data" class="formulario">
    <input type="text" name="nombre" placeholder="Nombre del producto" required>
    <textarea name="descripcion" placeholder="Descripción" required></textarea>
    <input type="number" step="0.01" name="precio" placeholder="Precio" required>
    <input type="file" name="imagen" required>
    <input type="submit" name="guardar" value="Guardar Producto" class="boton">
</form>

<?php
if (isset($_POST['guardar'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    $imagen = $_FILES['imagen']['name'];
    $ruta = "imagenes/" . basename($imagen);
    move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);

    $insertar = "INSERT INTO productos(nombre, descripcion, precio, imagen) 
                 VALUES ('$nombre', '$descripcion', '$precio', '$imagen')";

    if (mysqli_query($conexion, $insertar)) {
        echo "<p>✅ Producto agregado correctamente.</p>";
    } else {
        echo "<p>❌ Error: " . mysqli_error($conexion) . "</p>";
    }
}
?>
</body>
</html>
