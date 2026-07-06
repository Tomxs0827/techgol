<?php
session_start();
if(!isset($_SESSION['tipo'])){
    echo "<script>alert('Debes iniciar sesión'); window.location.href='inisesion.php';</script>";
    exit();
}
include 'conex.php';

$id_usu = $_SESSION['id_usu'];

// Procesar el formulario
if(isset($_POST['guardar'])){
    $nombre  = $_POST['nombre'];
    $ape     = $_POST['ape'];
    $correo  = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $clave   = $_POST['clave'];
    $clave2  = $_POST['clave2'];

    // Verificar si el usuario ya existe (de otro usuario)
    $queryCheck = "SELECT * FROM usuario WHERE usuario='$usuario' AND id_usu != '$id_usu'";
    $resCheck = mysqli_query($connection, $queryCheck);
    if(mysqli_num_rows($resCheck) > 0){
        $error = "Ese nombre de usuario ya está en uso";
    } elseif(!empty($clave) && $clave !== $clave2){
        $error = "Las contraseñas no coinciden";
    } else {
        if(!empty($clave)){
            $hash = password_hash($clave, PASSWORD_DEFAULT);
            $stmt = "UPDATE usuario SET 
                        nombre='$nombre', 
                        ape='$ape', 
                        correo='$correo', 
                        usuario='$usuario', 
                        password_hash='$hash' 
                     WHERE id_usu='$id_usu'";
        } else {
            $stmt = "UPDATE usuario SET 
                        nombre='$nombre', 
                        ape='$ape', 
                        correo='$correo', 
                        usuario='$usuario' 
                     WHERE id_usu='$id_usu'";
        }

        $resultado = mysqli_query($connection, $stmt);
        if($resultado){
            // Actualizar sesión
            $_SESSION['nombre']  = $nombre;
            $_SESSION['usuario'] = $usuario;
            echo "<script>alert('Perfil actualizado'); window.location.href='perfil.php';</script>";
            exit();
        } else {
            $error = "Error al actualizar";
        }
    }
}

// Obtener datos actuales
$consulta = "SELECT * FROM usuario WHERE id_usu='$id_usu'";
$resultado = mysqli_query($connection, $consulta);
$usuario_data = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/editarperfil.css">
</head>
<body>
<?php include 'header.php'; ?>

<div class="editar-container">
    <div class="editar-card">

        <div class="editar-header">
            <div class="editar-avatar">
                <?php echo strtoupper(substr($usuario_data['nombre'], 0, 1)); ?>
            </div>
            <h3>Editar Perfil</h3>
            <p>Actualiza tu información personal</p>
        </div>

        <div class="editar-body">
            <?php if(isset($error)){ ?>
                <div class="alert-error">❌ <?php echo $error; ?></div>
            <?php } ?>

            <form method="POST">
                <div class="editar-row">
                    <div class="editar-group">
                        <label>Nombre</label>
                        <input type="text" name="nombre" 
                               value="<?php echo $usuario_data['nombre']; ?>" required>
                    </div>
                    <div class="editar-group">
                        <label>Apellido</label>
                        <input type="text" name="ape" 
                               value="<?php echo $usuario_data['ape']; ?>" required>
                    </div>
                </div>

                <div class="editar-group">
                    <label>Correo</label>
                    <input type="email" name="correo" 
                           value="<?php echo $usuario_data['correo']; ?>" required>
                </div>

                <div class="editar-group">
                    <label>Usuario</label>
                    <input type="text" name="usuario" 
                           value="<?php echo $usuario_data['usuario']; ?>" required>
                </div>

                <hr class="editar-divider">
                <p class="editar-hint">💡 Deja vacío si no quieres cambiar la contraseña</p>

                <div class="editar-row">
                    <div class="editar-group">
                        <label>Nueva Contraseña</label>
                        <input type="password" name="clave" 
                               placeholder="Nueva contraseña">
                    </div>
                    <div class="editar-group">
                        <label>Repetir Contraseña</label>
                        <input type="password" name="clave2" 
                               placeholder="Repite la contraseña">
                    </div>
                </div>

                <div class="editar-botones">
                    <a href="perfil.php" class="btn-cancelar">Cancelar</a>
                    <button type="submit" name="guardar" class="btn-guardar">
                        💾 Guardar Cambios
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>