<?php
session_start();
include 'conex.php';

if(isset($_POST['usuario'])){
    $usuario = $_POST['usuario'];
    $clave   = $_POST['clave'];

    $query = "SELECT * FROM usuario WHERE usuario='$usuario' AND activo=1";
    $resultado = mysqli_query($connection, $query);

    if(mysqli_num_rows($resultado) > 0){
        $fila = mysqli_fetch_assoc($resultado);
        if(password_verify($clave, $fila['password_hash'])){
            $_SESSION['id_usu']  = $fila['id_usu'];
            $_SESSION['usuario'] = $fila['usuario'];
            $_SESSION['nombre']  = $fila['nombre'];
            $_SESSION['tipo']    = $fila['tipo'];
            header('Location: index.php');
            exit();
        } else {
            $error = "Contraseña incorrecta";
        }
    } else {
        $error = "Usuario no encontrado o inactivo";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/inisesion.css">
</head>
<body>
<?php include 'header.php'; ?>

<div class="auth-container">
    <div class="auth-card">
        <div class="auth-card-header">
            <div class="auth-icon">⚽</div>
            <h3>Bienvenido</h3>
            <p>Inicia sesión en tu cuenta</p>
        </div>
        <div class="auth-card-body">
            <?php if(isset($error)){ ?>
                <div class="alert-error">❌ <?php echo $error; ?></div>
            <?php } ?>
            <form method="POST">
                <div class="auth-input-group">
                    <label>Usuario</label>
                    <input type="text" name="usuario" placeholder="Tu usuario" required>
                </div>
                <div class="auth-input-group">
                    <label>Contraseña</label>
                    <input type="password" name="clave" placeholder="Tu contraseña" required>
                </div>
                <button type="submit" class="btn-auth">Ingresar</button>
            </form>
            <div class="auth-footer">
                ¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>