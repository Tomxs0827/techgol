<?php
session_start();
if($_SESSION['tipo'] != 1){
    echo "<script>alert('No autorizado'); window.location.href='index.php';</script>";
    exit();
}
include 'conex.php';

$consulta = "SELECT * FROM usuario";
$resultado = mysqli_query($connection, $consulta);
$usuarios = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<?php include 'header.php'?>

<div class="container mt-5 pt-5">
    <div class="card shadow">
        <div class="card-header">
            <div class="row">
                <div class="col-6"><h4>Usuarios</h4></div>
                <div class="col-6 text-end">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalu">
                        <i class="fa fa-user-plus"></i> Nuevo Usuario
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="tablaUsuarios">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Usuario</th>
                        <th>Tipo</th>
                        <th>Activo</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($usuarios as $usuario){ ?>
                    <tr>
                        <td><?php echo $usuario['id_usu']; ?></td>
                        <td><?php echo $usuario['nombre']; ?></td>
                        <td><?php echo $usuario['ape']; ?></td>
                        <td><?php echo $usuario['correo']; ?></td>
                        <td><?php echo $usuario['usuario']; ?></td>
                        <td>
                            <?php
                            if($usuario['tipo'] == 1) echo "Administrador";
                            elseif($usuario['tipo'] == 2) echo "Trabajador";
                            else echo "Usuario";
                            ?>
                        </td>
                        <td>
                            <?php echo $usuario['activo'] == 1 
                                ? '<span class="badge bg-success">Activo</span>' 
                                : '<span class="badge bg-danger">Inactivo</span>'; 
                            ?>
                        </td>
                        <td>
                            <button class="btn btn-warning btn-sm" 
                                data-bs-toggle="modal" 
                                data-bs-target="#modaleditaru<?php echo $usuario['id_usu']; ?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-danger btn-sm" 
                                data-bs-toggle="modal" 
                                data-bs-target="#modaleliminaru<?php echo $usuario['id_usu']; ?>">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <?php include 'modaleditaru.php'; ?>
                    <?php include 'modaleliminaru.php'; ?>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Nuevo Usuario -->
<div class="modal fade" id="modalu" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="CREARUSU.php">
                <div class="modal-body">
                    <label><b>Nombre</b></label>
                    <input type="text" name="nombre" class="form-control mb-2" required>
                    <label><b>Apellido</b></label>
                    <input type="text" name="ape" class="form-control mb-2" required>
                    <label><b>Correo</b></label>
                    <input type="email" name="correo" class="form-control mb-2" required>
                    <label><b>Usuario</b></label>
                    <input type="text" name="usuario" class="form-control mb-2" required>
                    <label><b>Contraseña</b></label>
                    <input type="password" name="clave" class="form-control mb-2" required>
                    <label><b>Repetir Contraseña</b></label>
                    <input type="password" name="clave2" class="form-control mb-2" required>
                    <label><b>Tipo</b></label>
                    <select name="tipo" class="form-select mb-2">
                        <option value="1">Administrador</option>
                        <option value="2">Trabajador</option>
                        <option value="3">Usuario</option>
                    </select>
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