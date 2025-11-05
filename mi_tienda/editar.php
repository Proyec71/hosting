



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
    <title>Editar Producto</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<?php
$id = $_GET['id'];
$consulta = "SELECT * FROM productos WHERE id=$id";
$resultado = mysqli_query($conexion, $consulta);
$fila = mysqli_fetch_assoc($resultado);
?>

<header><h1>Editar Producto</h1></header>

<form action="" method="POST" enctype="multipart/form-data" class="formulario">
    <input type="text" name="nombre" value="<?php echo $fila['nombre']; ?>" required>
    <textarea name="descripcion" required><?php echo $fila['descripcion']; ?></textarea>
    <input type="number" step="0.01" name="precio" value="<?php echo $fila['precio']; ?>" required>
    <input type="file" name="imagen">
    <input type="submit" name="actualizar" value="Actualizar" class="boton">
</form>

<?php
if (isset($_POST['actualizar'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    if (!empty($_FILES['imagen']['name'])) {
        $imagen = $_FILES['imagen']['name'];
        $ruta = "imagenes/" . basename($imagen);
        move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
        $update = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio='$precio', imagen='$imagen' WHERE id=$id";
    } else {
        $update = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio='$precio' WHERE id=$id";
    }

    if (mysqli_query($conexion, $update)) {
        echo "<p>✅ Producto actualizado correctamente.</p>";
    } else {
        echo "<p>❌ Error: " . mysqli_error($conexion) . "</p>";
    }
}
?>
</body>
</html>
