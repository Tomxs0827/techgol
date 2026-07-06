<?php
session_start();

include 'conex.php';

$consulta = "SELECT * FROM marca WHERE activo=1";
$resultado = mysqli_query($connection, $consulta);
$marcas = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Marcas - Techgol</title>
    <link rel="stylesheet" href="css/marcas.css">
</head>
<body>
<?php include 'header.php'; ?>

<section class="marcas">
    <div class="marcas-titulo">
        <h2>Nuestras Marcas</h2>
        <p>Las mejores marcas deportivas del mundo</p>
    </div>

    <div class="contenedor-marcas">
        <?php if(count($marcas) > 0){ ?>
            <?php foreach($marcas as $marca){ ?>
                <a href="productos.php?id_marca=<?php echo $marca['id_marca']; ?>" 
                   class="marca-card">
                    <div class="marca-img-container">
                        <?php if($marca['imagen']){ ?>
                            <img src="img/<?php echo $marca['imagen']; ?>" 
                                 alt="<?php echo $marca['nombre']; ?>">
                        <?php } else { ?>
                            <div class="marca-sin-imagen">🏷️</div>
                        <?php } ?>
                    </div>
                    <div class="marca-info">
                        <h2><?php echo $marca['nombre']; ?></h2>
                        <p><?php echo $marca['descripcion']; ?></p>
                        <span class="marca-btn">Ver productos →</span>
                    </div>
                </a>
            <?php } ?>
        <?php } else { ?>
            <div class="marcas-vacia">
                <div class="vacia-icon">🏷️</div>
                <p>No hay marcas disponibles</p>
            </div>
        <?php } ?>
    </div>
</section>

<?php include 'footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>