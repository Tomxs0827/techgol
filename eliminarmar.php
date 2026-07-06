<?php
session_start();
if($_SESSION['tipo'] != 1 && $_SESSION['tipo'] != 2){
    echo "<script>alert('No autorizado'); window.location.href='index.php';</script>";
    exit();
}
include 'conex.php';

$id_marca = $_POST['id_marca'];

$query = "DELETE FROM marca WHERE id_marca='$id_marca'";
$resultado = mysqli_query($connection, $query);

if($resultado){
    echo "<script>alert('Marca eliminada'); window.location.href='marca.php';</script>";
} else {
    echo "<script>alert('Error al eliminar'); window.history.go(-1);</script>";
}
$connection->close();
?>