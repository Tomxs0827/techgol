<div class="modal fade" id="modaleliminaru<?php echo $usuario['id_usu'];?>" 
     tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">¿Estás seguro?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <center>
                    <p>Se eliminará al usuario:</p>
                    <h5><b><?php echo $usuario['nombre'].' '.$usuario['ape'];?></b></h5>
                    <p>Esta acción no se puede deshacer.</p>
                </center>
            </div>
            <div class="modal-footer">
                <form method="POST" action="eliminau.php">
                    <input type="hidden" name="id_usu" 
                           value="<?php echo $usuario['id_usu'];?>">
                    <button type="button" class="btn btn-secondary" 
                            data-bs-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-danger" value="Eliminar">
                </form>
            </div>
        </div>
    </div>
</div>