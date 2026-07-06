<div class="modal fade" id="modaleditaru<?php echo $usuario['id_usu'];?>" 
     tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Editar Usuario</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="editaru.php" method="POST">
                <div class="modal-body">

                    <label for="nombre"><b>Nombre</b></label>
                    <input type="text" name="nombre" class="form-control" 
                           value="<?php echo $usuario['nombre'];?>">

                    <label for="ape"><b>Apellido</b></label>
                    <input type="text" name="ape" class="form-control" 
                           value="<?php echo $usuario['ape'];?>">

                    <label for="correo"><b>Correo</b></label>
                    <input type="email" name="correo" class="form-control" 
                           value="<?php echo $usuario['correo'];?>">

                    <label for="usuario"><b>Usuario</b></label>
                    <input type="text" name="usuario" class="form-control" 
                           value="<?php echo $usuario['usuario'];?>">

                    <label for="clave"><b>Nueva Contraseña</b></label>
                    <input type="password" name="clave" class="form-control" 
                           placeholder="Dejar vacío para no cambiar">

                    <label for="tipo"><b>Tipo de Usuario</b></label>
                    <select name="tipo" class="form-select">
                        <option value="1" <?php echo $usuario['tipo']==1 ? 'selected' : ''; ?>>
                            Administrador
                        </option>
                        <option value="2" <?php echo $usuario['tipo']==2 ? 'selected' : ''; ?>>
                            Trabajador
                        </option>
                        <option value="3" <?php echo $usuario['tipo']==3 ? 'selected' : ''; ?>>
                            Usuario
                        </option>
                    </select>

                    <br>
                    <div class="form-check">
                        <input type="checkbox" name="activo" class="form-check-input" 
                               value="1" <?php echo $usuario['activo']==1 ? 'checked' : ''; ?>>
                        <label class="form-check-label"><b>Activo</b></label>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_usu" value="<?php echo $usuario['id_usu'];?>">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-success" value="Guardar Cambios">
                </div>
            </form>
        </div>
    </div>
</div>