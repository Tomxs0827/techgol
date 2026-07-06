<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrarse</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/registro.css">
</head>
<body>
<?php include 'header.php'; ?>

<div class="auth-container">
    <div class="auth-card">
        <div class="auth-card-header">
            <div class="auth-icon">👤</div>
            <h3>Crear Cuenta</h3>
            <p>Regístrate para empezar</p>
        </div>
        <div class="auth-card-body">
            <form method="POST" action="CREARUSU.php">
                <div class="auth-input-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" 
                           placeholder="Tu nombre" required>
                </div>
                <div class="auth-input-group">
                    <label>Apellido</label>
                    <input type="text" name="ape" 
                           placeholder="Tu apellido" required>
                </div>
                <div class="auth-input-group">
                    <label>Correo</label>
                    <input type="email" name="correo" 
                           placeholder="Tu correo" required>
                </div>
                <div class="auth-input-group">
                    <label>Usuario</label>
                    <input type="text" name="usuario" 
                           placeholder="Elige un usuario" required>
                </div>
                <div class="auth-input-group">
                    <label>Contraseña</label>
                    <input type="password" name="clave" 
                           placeholder="Tu contraseña" required>
                </div>
                <div class="auth-input-group">
                    <label>Repetir Contraseña</label>
                    <input type="password" name="clave2" 
                           placeholder="Repite tu contraseña" required>
                </div>
                <button type="submit" class="btn-auth">
                    Registrarse
                </button>
            </form>
            <div class="auth-footer">
                ¿Ya tienes cuenta? 
                <a href="inisesion.php">Inicia sesión</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>