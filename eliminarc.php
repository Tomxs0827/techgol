<?php
session_start();
if($_SESSION['tipo'] != 1 && $_SESSION['tipo'] != 2){
    echo "<script>alert('No autorizado'); window.location.href='index.php';</script>";
    exit();
}
include 'conex.php';

$id_categoria = $_POST['id_categoria'];

$query = "DELETE FROM categoria WHERE id_categoria='$id_categoria'";
$resultado = mysqli_query($connection, $query);

if($resultado){
    echo "<script>alert('Categoría eliminada'); window.location.href='categoria.php';</script>";
} else {
    echo "<script>alert('Error al eliminar'); window.history.go(-1);</script>";
}
$connection->close();
?>