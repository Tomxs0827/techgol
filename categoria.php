<?php
session_start();

include 'conex.php';

$consulta = "SELECT * FROM categoria WHERE activo=1";
$resultado = mysqli_query($connection, $consulta);
$categorias = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías - Techgol</title>
    <link rel="stylesheet" href="css/categoria.css">
</head>
<body>
<?php include 'header.php'; ?>

<section class="categoria">
    <div class="categoria-titulo">
        <h2>Nuestras Categorías</h2>
        <p>Encuentra lo que necesitas</p>
    </div>

    <div class="contenedor-categoria">
        <?php if(count($categorias) > 0){ ?>
            <?php foreach($categorias as $cat){ ?>
                <a href="productos.php?id_categoria=<?php echo $cat['id_categoria']; ?>" 
                   class="categoria-card">
                    <?php if($cat['imagen']){ ?>
                        <img src="img/<?php echo $cat['imagen']; ?>" 
                             alt="<?php echo $cat['nombre']; ?>">
                    <?php } else { ?>
                        <div class="categoria-sin-imagen">📁</div>
                    <?php } ?>
                    <h2><?php echo $cat['nombre']; ?></h2>
                    <p><?php echo $cat['descripcion']; ?></p>
                </a>
            <?php } ?>
        <?php } else { ?>
            <div class="categoria-vacia">
                <p>No hay categorías disponibles</p>
            </div>
        <?php } ?>
    </div>
</section>

<?php include 'footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>