<?php
session_start();
if($_SESSION['tipo'] != 1){
    echo "<script>alert('No autorizado'); window.location.href='index.php';</script>";
    exit();
}

include 'conex.php';

$id_usu = $_POST['id_usu'];

$consulta = "DELETE FROM usuario WHERE id_usu='$id_usu'";
$resultado = mysqli_query($connection, $consulta);

if($resultado){
    echo "<script>alert('Usuario eliminado'); window.location.href='usuarios.php';</script>";
}else{
    echo "<script>alert('Error al eliminar'); window.history.go(-1);</script>";
}

$connection->close();
?>