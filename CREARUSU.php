<?php
session_start();

// Bloquea solo si está logueado pero NO es admin
if(isset($_SESSION['tipo']) && $_SESSION['tipo'] != 1){
    echo "<script>alert('No autorizado'); window.location.href='index.php';</script>";
    exit();
}

include 'conex.php';

$correo  = $_POST['correo'];
$nombre  = $_POST['nombre'];
$ape     = $_POST['ape'];
$usuario = $_POST['usuario'];

// Verificar si el usuario ya existe
$query0 = "SELECT * FROM usuario WHERE usuario='$usuario'";
$resultado0 = mysqli_query($connection, $query0);
if(mysqli_num_rows($resultado0) > 0){
    echo "<script>alert('El nombre de usuario ya existe'); window.history.go(-1);</script>";
    exit();
}

// Verificar contraseñas
$clave  = $_POST['clave'];
$clave2 = $_POST['clave2'];
if($clave !== $clave2){
    echo "<script>alert('Las contraseñas no coinciden'); window.history.go(-1);</script>";
    exit();
}

$hash = password_hash($clave, PASSWORD_DEFAULT);

// Si es admin asigna el tipo que eligió, si es registro público siempre tipo 3
if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 1){
    $tipo = (Int)$_POST['tipo'];
} else {
    $tipo = 3;
}

$query = "INSERT INTO usuario(nombre, ape, correo, usuario, password_hash, tipo, activo)
          VALUES('$nombre', '$ape', '$correo', '$usuario', '$hash', '$tipo', 1)";
$resultado = mysqli_query($connection, $query);

if(!empty($resultado)){
    // Admin va a usuarios.php, registro público va a inisesion.php
    if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 1){
        echo "<script>window.location.href='usuarios.php';</script>";
    } else {
        echo "<script>alert('Usuario creado, ya puedes iniciar sesión'); window.location.href='inisesion.php';</script>";
    }
} else {
    echo "<script>alert('No se guardó'); window.history.go(-1);</script>";
}

$connection->close();
?>