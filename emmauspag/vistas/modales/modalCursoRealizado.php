<?php

?>

<!-- Modal Cursos realizados -->
<div class="modal fade" id="realizados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Curos Realizados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
        <?php
                if (!empty($cursos_hechos)):
        ?>
                    <ul>
        <?php
                    $m = 0;
                    foreach ($cursos_hechos as $campos => $nombre):
        ?>
                        <li>
                            <div class="row align-items-center">
                                <h6><?=$cursos_hechos[$m]['Nombre']?></h6>
                                <form action="" method="post">
                                    <input type="hidden" name="activo" value="Actualizar-nota-unica">
                                    <input type="hidden" name="IdCursoRealizado" value="<?=$cursos_hechos[$m]['IdCursoRealizado']?>">
                                    <input type="number" name="Porcentaje" value="<?=$cursos_hechos[$m]['Porcentaje']?>">
                                    <button type="submit" class="btn btn-primary">
                                        <span class="dashicons dashicons-edit "></span>
                                    </button>
                                </form>
                                <form action="" method="post">
                                    <input type="hidden" name="activo" value="eliminar-curso">
                                    <input type="hidden" name="IdCursoRealizado" value="<?=$cursos_hechos[$m]['IdCursoRealizado']?>">
                                    <button type="submit" class="btn btn-primary">
                                        <span class="dashicons dashicons-trash"></span>
                                    </button>
                                </form>
                            </div>
                        </li>
        <?php
                    $m++;
                    endforeach;
        ?>
                    </ul>
        <?php
                endif;
        ?>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
