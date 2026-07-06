<?php
session_start();
if($_SESSION['tipo'] != 1 && $_SESSION['tipo'] != 2){
    echo "<script>alert('No autorizado'); window.location.href='index.php';</script>";
    exit();
}
include 'conex.php';

$consulta = "SELECT * FROM categoria";
$resultado = mysqli_query($connection, $consulta);
$categorias = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Categorías</title>
    <link rel="stylesheet" href="css/admin_categoria.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
<?php include 'header.php'; ?>

<div class="cat-container">
    <div class="cat-card">
        <div class="cat-header">
            <h4>📁 Categorías</h4>
            <button class="btn-nueva" data-bs-toggle="modal" 
                    data-bs-target="#modalCrearC">
                <i class="fa fa-plus"></i> Nueva Categoría
            </button>
        </div>
        <div class="cat-body">
            <?php if(count($categorias) > 0){ ?>
                <table class="cat-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Imagen</th>
                            <th>Activo</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($categorias as $categoria){ ?>
                        <tr>
                            <td><?php echo $categoria['id_categoria']; ?></td>
                            <td><?php echo $categoria['nombre']; ?></td>
                            <td><?php echo $categoria['descripcion']; ?></td>
                            <td>
                                <?php if($categoria['imagen']){ ?>
                                    <img src="img/<?php echo $categoria['imagen']; ?>" 
                                         class="cat-img">
                                <?php } else { ?>
                                    <span class="sin-imagen">Sin imagen</span>
                                <?php } ?>
                            </td>
                            <td>
                                <?php echo $categoria['activo'] == 1 
                                    ? '<span class="badge-activo">Activo</span>' 
                                    : '<span class="badge-inactivo">Inactivo</span>'; 
                                ?>
                            </td>
                            <td>
                                <button class="btn-editar"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modaleditarc<?php echo $categoria['id_categoria']; ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            </td>
                            <td>
                                <button class="btn-eliminar"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modaleliminacc<?php echo $categoria['id_categoria']; ?>">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <?php include 'modaleditarc.php'; ?>
                        <?php include 'modaleliminacc.php'; ?>
                    <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <div class="cat-vacia">
                    <div class="vacia-icon">📁</div>
                    <p>No hay categorías aún</p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<!-- Modal Crear -->
<div class="modal fade" id="modalCrearC" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nueva Categoría</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="crearc.php" enctype="multipart/form-data">
                <div class="modal-body">
                    <label><b>Nombre</b></label>
                    <input type="text" name="nombre" class="form-control mb-2" required>
                    <label><b>Descripción</b></label>
                    <textarea name="descripcion" class="form-control mb-2" rows="3"></textarea>
                    <label><b>Imagen</b></label>
                    <input type="file" name="imagen" class="form-control mb-2" accept="image/*">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" 
                            data-bs-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-success" value="Crear">
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
</body>
</html>