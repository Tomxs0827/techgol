<?php
session_start();
if($_SESSION['tipo'] != 1){
    echo "<script>alert('No autorizado'); window.location.href='index.php';</script>";
    exit();
}

include 'conex.php';

$id_usu        = $_POST['id_usu'];
$nombre        = $_POST['nombre'];
$ape           = $_POST['ape'];
$correo        = $_POST['correo'];
$usuario       = $_POST['usuario'];
$clave         = $_POST['clave'];
$tipo          = (Int)$_POST['tipo'];
$activo        = isset($_POST['activo']) ? 1 : 0;

// Si dejó la contraseña vacía, no la cambia
if(!empty($clave)){
    $clave = password_hash($clave, PASSWORD_DEFAULT);
    $stmt = "UPDATE usuario SET 
                nombre='$nombre', 
                ape='$ape', 
                correo='$correo', 
                usuario='$usuario', 
                password_hash='$clave', 
                tipo='$tipo', 
                activo='$activo' 
             WHERE id_usu='$id_usu'";
} else {
    // No actualiza la contraseña
    $stmt = "UPDATE usuario SET 
                nombre='$nombre', 
                ape='$ape', 
                correo='$correo', 
                usuario='$usuario', 
                tipo='$tipo', 
                activo='$activo' 
             WHERE id_usu='$id_usu'";
}

$resultado = mysqli_query($connection, $stmt);

if($resultado){
    echo "<script>alert('Usuario actualizado'); window.location.href='usuarios.php';</script>";
} else {
    echo "<script>alert('Error al actualizar'); window.history.go(-1);</script>";
}

$connection->close();
?>