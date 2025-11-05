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

    // Ruta donde se guardarán las imágenes
    $carpeta = "imagenes/";

    // Crear la carpeta si no existe
    if (!file_exists($carpeta)) {
        mkdir($carpeta, 0777, true);
    }

    // Procesar imagen
    $nombre_imagen = basename($_FILES['imagen']['name']);
    $ruta_destino = $carpeta . $nombre_imagen;

    // Verificar si se subió correctamente el archivo
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_destino)) {

        // Guardar solo el nombre o la ruta completa en la base de datos
        $insertar = "INSERT INTO productos(nombre, descripcion, precio, imagen)
                     VALUES ('$nombre', '$descripcion', '$precio', '$ruta_destino')";

        if (mysqli_query($conexion, $insertar)) {
            echo "<p>✅ Producto agregado correctamente.</p>";
        } else {
            echo "<p>❌ Error al guardar en la base de datos: " . mysqli_error($conexion) . "</p>";
        }
    } else {
        echo "<p>⚠️ Error al subir la imagen. Verifica permisos o ruta.</p>";
    }
}
?>
</body>
</html>
