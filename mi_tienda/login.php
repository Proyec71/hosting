<?php
session_start();
include("conexion.php");

if (isset($_POST['entrar'])) {
    $usuario = $_POST['usuario'];
    $clave = md5($_POST['clave']); // Encriptamos

    $consulta = "SELECT * FROM admin WHERE usuario='$usuario' AND clave='$clave'";
    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        $_SESSION['admin'] = $usuario;
        header("Location: admin.php");
    } else {
        $error = "❌ Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión - Tienda</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header><h1>Iniciar Sesión</h1></header>

    <form action="" method="POST" class="formulario">
        <input type="text" name="usuario" placeholder="Usuario" required>
        <input type="password" name="clave" placeholder="Contraseña" required>
        <input type="submit" name="entrar" value="Entrar" class="boton">
        <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    </form>
</body>
</html>
