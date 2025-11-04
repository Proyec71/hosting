<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="estilos.css">
<title>Actualizar Persona</title>
</head>
<body>
<div class="navbar">
    <a href="registrar.php">Registrar</a>
    <a href="consultar.php">Consultar</a>
    <a href="actualizar.php">Actualizar</a>
</div>

<div class="container">
<h2>Actualizar Persona</h2>

<!-- Paso 1: Buscar persona por cédula -->
<form method="POST">
    <input type="text" name="cedula_buscar" placeholder="Ingrese Cédula a buscar" required>
    <button type="submit" name="buscar">Buscar</button>
</form>

<?php
// Paso 2: Mostrar formulario con datos para actualizar
if (isset($_POST['buscar'])) {
    $cedula = $_POST['cedula_buscar'];
    $sql = "SELECT * FROM personas WHERE cedula='$cedula'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        ?>
        <form method="POST">
            <input type="hidden" name="cedula_original" value="<?= $fila['cedula'] ?>">
            <input type="text" name="nombres" value="<?= $fila['nombres'] ?>" placeholder="Nombres" required>
            <input type="text" name="apellidos" value="<?= $fila['apellidos'] ?>" placeholder="Apellidos" required>
            <input type="text" name="cedula" value="<?= $fila['cedula'] ?>" placeholder="Cédula" required>
            <input type="text" name="telefono" value="<?= $fila['telefono'] ?>" placeholder="Teléfono">
            <input type="email" name="correo" value="<?= $fila['correo'] ?>" placeholder="Correo">
            <input type="text" name="canton" value="<?= $fila['canton'] ?>" placeholder="Cantón">
            <input type="text" name="provincia" value="<?= $fila['provincia'] ?>" placeholder="Provincia">
            <button type="submit" name="actualizar">Actualizar</button>
        </form>
        <?php
    } else {
        echo "<div class='mensaje error'>No se encontró la cédula</div>";
    }
}

// Paso 3: Procesar actualización
if (isset($_POST['actualizar'])) {
    $cedula_original = $_POST['cedula_original'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $cedula = $_POST['cedula'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $canton = $_POST['canton'];
    $provincia = $_POST['provincia'];

    $sql = "UPDATE personas SET 
                nombres='$nombres', 
                apellidos='$apellidos', 
                cedula='$cedula',
                telefono='$telefono',
                correo='$correo',
                canton='$canton',
                provincia='$provincia'
            WHERE cedula='$cedula_original'";

    if ($conexion->query($sql) === TRUE) {
        echo "<div class='mensaje exito'>Datos actualizados correctamente</div>";
    } else {
        echo "<div class='mensaje error'>Error al actualizar: " . $conexion->error . "</div>";
    }
}
?>
</div>
</body>
</html>
