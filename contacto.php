<?php
session_start();
if(isset($_POST['enviar'])){
    include 'conex.php';
    $nombre  = $_POST['nombre'];
    $correo  = $_POST['correo'];
    $asunto  = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    $query = "INSERT INTO contacto(nombre, correo, asunto, mensaje)
              VALUES('$nombre', '$correo', '$asunto', '$mensaje')";
    $resultado = mysqli_query($connection, $query);

    if($resultado){
        $exito = "¡Mensaje enviado! Te responderemos pronto.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contacto - Techgol</title>
    <link rel="stylesheet" href="css/contacto.css">
</head>
<body>
<?php include 'header.php'; ?>

<div class="contacto-container">

    <!-- Título -->
    <div class="contacto-titulo">
        <h2>Contáctanos</h2>
        <p>Estamos aquí para ayudarte</p>
    </div>

    <div class="contacto-wrapper">

        <!-- Formulario -->
        <div class="contacto-form">
            <h3>Envíanos un Mensaje</h3>

            <?php if(isset($exito)){ ?>
                <div class="alert-exito">✅ <?php echo $exito; ?></div>
            <?php } ?>

            <form method="POST">
                <div class="form-row">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="nombre" 
                               placeholder="Tu nombre" required>
                    </div>
                    <div class="form-group">
                        <label>Correo</label>
                        <input type="email" name="correo" 
                               placeholder="Tu correo" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Asunto</label>
                    <input type="text" name="asunto" 
                           placeholder="¿En qué podemos ayudarte?" required>
                </div>

                <div class="form-group">
                    <label>Mensaje</label>
                    <textarea name="mensaje" rows="6" 
                              placeholder="Escribe tu mensaje aquí..." 
                              required></textarea>
                </div>

                <button type="submit" name="enviar" class="btn-enviar">
                    📨 Enviar Mensaje
                </button>
            </form>
        </div>

    </div>
</div>

<?php include 'footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>