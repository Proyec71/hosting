


<?php


session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include("conexion.php");



$id = $_GET['id'];
$eliminar = "DELETE FROM productos WHERE id=$id";

if (mysqli_query($conexion, $eliminar)) {
    header("Location: admin.php");
} else {
    echo "Error al eliminar: " . mysqli_error($conexion);
}
?>
