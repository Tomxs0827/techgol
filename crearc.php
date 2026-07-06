<?php
session_start();
if($_SESSION['tipo'] != 1 && $_SESSION['tipo'] != 2){
    echo "<script>alert('No autorizado'); window.location.href='index.php';</script>";
    exit();
}
include 'conex.php';

$nombre      = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$imagen      = '';

// Subir imagen
if(!empty($_FILES['imagen']['name'])){
    $nombreImagen = time().'_'.$_FILES['imagen']['name'];
    $ruta = 'img/'.$nombreImagen;
    move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
    $imagen = $nombreImagen;
}

$query = "INSERT INTO categoria(nombre, descripcion, imagen, activo)
          VALUES('$nombre', '$descripcion', '$imagen', 1)";
$resultado = mysqli_query($connection, $query);

if($resultado){
    echo "<script>alert('Categoría creada'); window.location.href='categoria.php';</script>";
} else {
    echo "<script>alert('Error al crear'); window.history.go(-1);</script>";
}
$connection->close();
?>