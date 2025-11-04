<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="estilos.css">
<title>Consultar Persona</title>
</head>
<body>
<div class="navbar">
    <a href="registrar.php">Registrar</a>
    <a href="consultar.php">Consultar</a>
    <a href="actualizar.php">Actualizar</a>
</div>

<div class="container">
<h2>Consultar Persona por Cédula</h2>
<form method="POST">
    <input type="text" name="cedula" placeholder="Ingrese Cédula" required>
    <button type="submit" name="consultar">Consultar</button>
</form>

<?php
if (isset($_POST['consultar'])) {
    $cedula = $_POST['cedula'];
    $sql = "SELECT * FROM personas WHERE cedula='$cedula'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        echo "<table>
                <tr><th>Nombres</th><th>Apellidos</th><th>Teléfono</th><th>Correo</th><th>Cantón</th><th>Provincia</th></tr>";
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>
                    <td>{$fila['nombres']}</td>
                    <td>{$fila['apellidos']}</td>
                    <td>{$fila['telefono']}</td>
                    <td>{$fila['correo']}</td>
                    <td>{$fila['canton']}</td>
                    <td>{$fila['provincia']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<div class='mensaje error'>No se encontró la cédula</div>";
    }
}
?>
</div>
</body>
</html>
