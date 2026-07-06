<?php
session_start();
if($_SESSION['tipo'] != 1 && $_SESSION['tipo'] != 2){
    echo "<script>alert('No autorizado'); window.location.href='index.php';</script>";
    exit();
}
include 'conex.php';

$id_categoria  = $_POST['id_categoria'];
$nombre        = $_POST['nombre'];
$descripcion   = $_POST['descripcion'];
$activo        = $_POST['activo'];
$imagen_actual = $_POST['imagen_actual'];
$imagen        = $imagen_actual;

// Subir nueva imagen si se seleccionó
if(!empty($_FILES['imagen']['name'])){
    $nombreImagen = time().'_'.$_FILES['imagen']['name'];
    $ruta = 'img/'.$nombreImagen;
    move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
    $imagen = $nombreImagen;
}

$query = "UPDATE categoria SET 
            nombre='$nombre', 
            descripcion='$descripcion', 
            imagen='$imagen',
            activo='$activo'
          WHERE id_categoria='$id_categoria'";
$resultado = mysqli_query($connection, $query);

if($resultado){
    echo "<script>alert('Categoría actualizada'); window.location.href='categoria.php';</script>";
} else {
    echo "<script>alert('Error al actualizar'); window.history.go(-1);</script>";
}
$connection->close();
?>