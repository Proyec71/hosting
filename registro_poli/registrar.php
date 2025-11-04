<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="estilos.css">
<title>Registrar Persona</title>
</head>
<body>
<div class="navbar">
    <a href="registrar.php">Registrar</a>
    <a href="consultar.php">Consultar</a>
    <a href="actualizar.php">Actualizar</a>
</div>

<div class="container">
<h2>Registrar Persona</h2>
<form method="POST">
    <input type="text" name="nombres" placeholder="Nombres" required>
    <input type="text" name="apellidos" placeholder="Apellidos" required>
    <input type="text" name="cedula" placeholder="Cédula" required>
    <input type="text" name="telefono" placeholder="Teléfono">
    <input type="email" name="correo" placeholder="Correo">
    <input type="text" name="canton" placeholder="Cantón">
    <input type="text" name="provincia" placeholder="Provincia">
    <button type="submit" name="registrar">Registrar</button>
</form>

<?php
if (isset($_POST['registrar'])) {
    $n = $_POST['nombres'];
    $a = $_POST['apellidos'];
    $c = $_POST['cedula'];
    $t = $_POST['telefono'];
    $e = $_POST['correo'];
    $ca = $_POST['canton'];
    $p = $_POST['provincia'];

    $sql = "INSERT INTO personas (nombres, apellidos, cedula, telefono, correo, canton, provincia)
            VALUES ('$n','$a','$c','$t','$e','$ca','$p')";
    if ($conexion->query($sql) === TRUE) {
        echo "<div class='mensaje exito'>Registro exitoso</div>";
    } else {
        echo "<div class='mensaje error'>Error al registrar: " . $conexion->error . "</div>";
    }
}
?>
</div>
</body>
</html>
