<?php
session_start();
if($_SESSION['tipo'] != 1 && $_SESSION['tipo'] != 2){
    echo "<script>alert('No autorizado'); window.location.href='index.php';</script>";
    exit();
}
include 'conex.php';

$consulta = "SELECT * FROM contacto ORDER BY fecha DESC";
$resultado = mysqli_query($connection, $consulta);
$mensajes = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

// Contar no leídos
$noLeidos = 0;
foreach($mensajes as $m){
    if($m['leido'] == 0) $noLeidos++;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mensajes</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/mensajes.css">
</head>
<body>
<?php include 'header.php'; ?>

<div class="mensajes-container">
    <div class="mensajes-card">

        <div class="mensajes-header">
            <h4>📨 Mensajes de Contacto</h4>
            <?php if($noLeidos > 0){ ?>
                <span class="badge-count"><?php echo $noLeidos; ?> sin leer</span>
            <?php } ?>
        </div>

        <div class="mensajes-body">
            <?php if(count($mensajes) > 0){ ?>
                <table class="mensajes-table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Asunto</th>
                            <th>Mensaje</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($mensajes as $mensaje){ ?>
                        <tr class="<?php echo $mensaje['leido']==0 ? 'no-leido' : ''; ?>">
                            <td><?php echo $mensaje['nombre']; ?></td>
                            <td><?php echo $mensaje['correo']; ?></td>
                            <td><?php echo $mensaje['asunto']; ?></td>
                            <td>
                                <div class="mensaje-texto" title="<?php echo $mensaje['mensaje']; ?>">
                                    <?php echo $mensaje['mensaje']; ?>
                                </div>
                            </td>
                            <td>
                                <span class="fecha-texto">
                                    <?php echo date('d/m/Y H:i', strtotime($mensaje['fecha'])); ?>
                                </span>
                            </td>
                            <td>
                                <?php echo $mensaje['leido']==0 
                                    ? '<span class="badge-noleido">No leído</span>' 
                                    : '<span class="badge-leido">Leído</span>'; 
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <div class="mensajes-vacio">
                    <div class="vacio-icon">📭</div>
                    <p>No hay mensajes aún</p>
                </div>
            <?php } ?>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>