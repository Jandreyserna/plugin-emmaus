
<!-- Modal -->
<div class="modal fade" id="añadirestudiante-curso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Formulario curso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
             <div class="modal-body">
                <form class="formm" action="" method="post">
                    <input name="activo" type="hidden" value="nuevo-curso">
                    <input name="IdCursoRealizado" type="hidden" value="<?=$ultimo_id?>">
                    <input name="IdEstudiante" type="hidden" value="<?=$id?>">
                    <div class="contenedor-fkm">
                        <select class="id_material" name="curso1[IdMaterial]" required>
                            <option value="" disabled selected>Material</option>
                            <?php 
                            foreach ($materiales as $col=> $valor): 
                            ?>
                                <option value="<?=$valor['IdMaterial']?>"><?=$valor['TituloMaterial']?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                        <div class="" style="display-inline">
                            <label for="curso1[Porcentaje]">NOTA :</label>
                            <input name="curso1[Porcentaje]" type="text" value="0">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Añadir</button>
                        <button type="button" class="btn btn-secondary" id="formulario">+</button>
                    </div>
                    <div class="next">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
