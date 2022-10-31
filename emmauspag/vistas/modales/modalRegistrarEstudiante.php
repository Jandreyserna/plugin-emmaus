<?php   
    $columnas_estudiantes = Colum_Students();
    $promotores = Information_Promotors();
?>
<!-- Modal Registrar nuevo estuidiante-->
<div class="modal fade bd-example-modal-lg" id="añadirestudiante" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" id="añadirestudiante" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Estudiante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <input name="activo" type="hidden" value="nuevo-estudiante" >
                    <select class="id_promotor" name="IdContacto" required>
                        <option value="" disabled selected>Escoger promotor</option>
                    <?php 
                        foreach ($promotores as $col=> $valor): 
                    ?>
                        <option value="<?= $valor['IdContacto'] ?>"> <?= $valor['Nombre']?> (<?= $valor['Ciudad']?>) - (<?= $valor['IdContacto']?>)</option>
                    <?php 
                        endforeach; 
                    ?>
                    </select>
                    <?php
                        for ($z=2; $z < sizeof($columnas_estudiantes) ; $z++){
                            foreach($columnas_estudiantes[$z] as $nombre_columna => $column ):
                                if ($column != 'FechaSolicitud'):
                    ?>
                                    <div class="form-row">
                    <?php
                                        if($column == 'FechaNacimiento' ){ 
                    ?>
                                            <div class="col">
                                                <label for="campo1"><?=$column?></label>
                                            </div>
                                            <div class="col">
                                                <input name="<?=$column?>" type="date" placeholder="" >
                                            </div>
                    <?php 
                                        }else if($column == 'Telefono' || $column == 'Celular' ){ 
                    ?>
                                            <div class="col">
                                                <label for="campo1"><?=$column?></label>
                                            </div>
                                            <div class="col">
                                                <input name="<?=$column?>" type="number" placeholder="" >
                                            </div>
                    <?php 
                                        }else{
                    ?>
                                        <div class="col">
                                            <label for="campo1"><?=$column?></label>
                                        </div>
                                        <div class="col">
                                            <input name="<?=$column?>" type="text" placeholder="" >
                                        </div>
                    <?php
                                        }
                    ?>
                                    </div>
                    <?php 
                                endif;
                            endforeach;
                        }
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
