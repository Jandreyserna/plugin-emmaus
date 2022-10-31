

<!-- Modal Actualizar estudiante-->
<div class="modal fade" id="actualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Formulario Estudiante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <input name="activo" type="hidden" value="Update-students">
                    <input name="IdEstudiante" type="hidden" value="<?=$id?>">
                    <?php
                    foreach ($info_estudiante[0] as $camp => $infor):
                        if ($camp != 'FechaSolicitud'):              
                    ?>
                            <div class="form-row">
                    <?php
                            if($camp == 'FechaNacimiento'){
                    ?>
                                <label for="campo1"><?=$camp?></label>
                                <input name="<?=$camp?>" type="date" value="<?=$infor?>">
                    <?php
                            }else if ($camp == 'Telefono' || $camp == 'Celular' ){
                    ?>
                                <label for="campo1"><?=$camp?></label>
                                <input name="<?=$camp?>" type="number" value="<?=$infor?>">
                    <?php
                            }else if ($camp == 'IdContacto'){
                    ?>
                                <label for="campo-promotor">Promotores</label>
                                <select class="" name="IdContacto" required>
                                    <option value="<?=$promotor_actual[0]['IdContacto']?>" disabled selected>
                                        <?=$promotor_actual[0]['IdContacto'] ?>- <?=$promotor_actual[0]['Nombre']?>
                                        (<?=$promotor_actual[0]['Ciudad'] ?>)
                                    </option>
                    <?php
                                    foreach ($promotores as $columnas=> $promotor):
                    ?>
                                    <option value="<?=$promotor['IdContacto']?>"><?=$promotor['IdContacto'] ?>-
                                        <?=$promotor['Nombre']?> (<?=$promotor['Ciudad'] ?>)
                                    </option>
                    <?php
                                    endforeach;
                    ?>
                                </select>
                    <?php
                            }else{
                    ?>
                                <label for="campo1"><?=$camp?></label>
                                <input name="<?=$camp?>" type="text" value="<?=$infor?>">
                    <?php
                            }
                    ?>
                            </div>
                    <?php
                        endif;
                    endforeach;
                    ?>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Añadir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
