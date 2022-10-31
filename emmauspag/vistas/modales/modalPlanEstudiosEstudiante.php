
    <!-- Modal Plan de estudios -->
    <div class="modal fade" id="plan-estudios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Plan De Estudios</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
        <?php
                    if (!empty($cursos)):
        ?>
                    <ul>
        <?php
                        foreach( $programas as $programs => $program){
        ?>
                        <li class=""><?=$program['Nombre']?></li>
        <?php
                            for( $y = 0 ; $y < sizeof($niveles) ; $y++ ){
                                if( $niveles[$y]['IdProgramaRel'] == $program['IdPrograma'] ){
        ?>
                                    <li class=""><?=$niveles[$y]['NombreNivel']?></li>
        <?php
                                    for( $i = 0 ; $i < sizeof($cursos_niveles) ; $i++ ){
                                        if( $cursos_niveles[$i]['IdNivel'] == $niveles[$y]['IdNivel'] ){
                                            if($niveles[$y]['IdNivel'] != 5 && $niveles[$y]['IdNivel'] != 25 && $niveles[$y]['IdNivel'] != 17 ){
                                                for ( $z = 0 ; $z < sizeof($cursos) ; $z++ ){
                                                    if( $cursos[$z]['IdCurso'] == $cursos_niveles[$i]['IdCurso'] ){
                                                        $bandera = 0;
                                                        for( $w = 0 ; $w < sizeof($cursos_hechos) ; $w++ ){      
                                                            if($cursos_hechos[$w]['IdMaterial'] == $cursos[$z]['IdMaterial'] && $cursos_hechos[$w]['Porcentaje'] >= 70 ){
                                                            $bandera = 1;                         
        ?>
                                                                <li class="list-win"><?=$cursos[$z]['Curso'] ?> - <?= $cursos_hechos[$w]['Porcentaje']?> ---(<?= $cursos_hechos[$w]['FechaTerminacion']?> ) </li>
        <?php
                                                            }
                                                        }
                                                        if($bandera == 0){
        ?>
                                                            <li class="list-lost"><?=$cursos[$z]['Curso'] ?></li>
        <?php
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    if($niveles[$y]['IdNivel'] == 5 || $niveles[$y]['IdNivel'] == 25 || $niveles[$y]['IdNivel'] == 17 ) {
        ?>

                                        <form action="" method="post">
                                            <input type="hidden" name="activo" value="elecion-diploma">
                                            <input type="hidden" name="IdNivel" value="<?=$niveles[$y]['IdNivel']?>">
                                            <input type="hidden" name="Nombre" value="<?=$info_estudiante[0]['Nombres']." ".$info_estudiante[0]['Apellidos']?>">
                                            <input type="hidden" name="Ciudad" value="<?=$info_estudiante[0]['Ciudad']?>">
                                            <button type="submit" class="btn btn-primary">Imprimir formulario de elección</button>
                                        </form>
                                        <form action="" method="post">
                                            <input type="hidden" name="activo" value="insertar-diploma">
                                            <input type="hidden" name="IdPrograma" value="<?=$program['IdPrograma']?>">
                                            <input type="hidden" name="IdEstudiante" value="<?=$id?>">
                                            <select class="id_Diploma" name="IdCurso" required>
                                                <option value="" disabled selected>Escoger Diplomado</option>
        <?php           
                                                foreach ($diplomados as $diplomas=> $diploma): 
                                                    if ($niveles[$y]['IdNivel'] == $diploma['IdNivel']):
        ?>
                                                       <option value="<?= $diploma['IdCurso'] ?>"> <?= $diploma['Nombre']?></option>
        <?php
                                                    endif;
                                                endforeach;
        ?>
                                            </select>
                                            <input type="number" name="Porcentaje">
                                            <button type="submit" class="btn btn-primary">Registrar Diplomado</button>
                                        </form>
        <?php
                                    }
                                }
                            }

                        }
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