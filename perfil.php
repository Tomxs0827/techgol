<?php
session_start();
if(!isset($_SESSION['tipo'])){
    echo "<script>alert('Debes iniciar sesión'); window.location.href='inisesion.php';</script>";
    exit();
}
include 'conex.php';

$id_usu = $_SESSION['id_usu'];
$consulta = "SELECT * FROM usuario WHERE id_usu='$id_usu'";
$resultado = mysqli_query($connection, $consulta);
$usuario = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/perfil.css">
</head>
<body>
<?php include 'header.php'; ?>

<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h4>Mi Perfil</h4>
                </div>
                <div class="card-body">
                    <p><b>Nombre:</b> <?php echo $usuario['nombre']; ?></p>
                    <p><b>Apellido:</b> <?php echo $usuario['ape']; ?></p>
                    <p><b>Correo:</b> <?php echo $usuario['correo']; ?></p>
                    <p><b>Usuario:</b> <?php echo $usuario['usuario']; ?></p>
                    <p><b>Tipo:</b> 
                        <?php
                        if($usuario['tipo'] == 1) echo "Administrador";
                        elseif($usuario['tipo'] == 2) echo "Trabajador";
                        else echo "Usuario";
                        ?>
                    </p>

                    <?php if($_SESSION['tipo'] == 1){ ?>
                        <a href="usuarios.php" class="btn btn-primary w-100 mb-2">
                            Gestionar Usuarios
                        </a>
                    <?php } ?>

                    <a href="logout.php" class="btn btn-danger w-100">
                        Cerrar Sesión
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>