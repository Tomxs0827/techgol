<div class="modal fade" id="modaleditarc<?php echo $categoria['id_categoria'];?>"
     tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Editar Categoría</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="editarc.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <label><b>Nombre</b></label>
                    <input type="text" name="nombre" class="form-control mb-2"
                           value="<?php echo $categoria['nombre'];?>" required>
                    <label><b>Descripción</b></label>
                    <textarea name="descripcion" class="form-control mb-2" 
                              rows="3"><?php echo $categoria['descripcion'];?></textarea>
                    <label><b>Imagen actual</b></label><br>
                    <?php if($categoria['imagen']){ ?>
                        <img src="img/<?php echo $categoria['imagen'];?>" 
                             width="80px" height="80px" 
                             style="border-radius:8px; object-fit:cover; margin-bottom:10px;">
                    <?php } ?>
                    <label><b>Cambiar imagen</b></label>
                    <input type="file" name="imagen" class="form-control mb-2" accept="image/*">
                    <label><b>Activo</b></label>
                    <select name="activo" class="form-select">
                        <option value="1" <?php echo $categoria['activo']==1 ? 'selected' : ''; ?>>Sí</option>
                        <option value="0" <?php echo $categoria['activo']==0 ? 'selected' : ''; ?>>No</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_categoria" 
                           value="<?php echo $categoria['id_categoria'];?>">
                    <input type="hidden" name="imagen_actual" 
                           value="<?php echo $categoria['imagen'];?>">
                    <button type="button" class="btn btn-secondary" 
                            data-bs-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-success" value="Guardar">
                </div>
            </form>
        </div>
    </div>
</div>