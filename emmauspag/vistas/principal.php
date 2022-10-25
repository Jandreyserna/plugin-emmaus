<?php
    $url = plugins_url('/pluglin-emmaus/emmauspag/img/activos.png');
?>
<?php

// require_once dirname(dirname(dirname(__FILE__))) . '/Controller/ControlOnlyEstudiante.php';
// require_once dirname(dirname(dirname(__FILE__))) . '/modelos/Modelo-estudiantes.php';
  // $id = $_POST['id-estudiante'];
  // unset($_POST['id-estudiante']);

  // $principal =  Information_One_Student_First($id);
  // $secundario = Information_One_Student_Secund($id);
  // $info_estudiante = Information_One_Student($id);
  // $id_ultimo_curso =  Last_course_Of_Student_register($id);
  // $ultimo_curso = Last_course_Of_Student($id, $id_ultimo_curso['ultimo']);
  // $columnas_curso_realizados = Column_Course_Done();
  // $materiales = Materials();
  // $cursos_hechos = courses_done($id);
  // $cursos = Plan_Study();
  // $ultimo_id = Course_Last_Id();
  // $ultimo_id++;
  // $programas = all_programs();
  // $niveles = all_nevels();
  // $cursos_niveles = courses_and_nevels();
  // $diplomados = diplomados_courses();
  // $promotores = promotores();
  // $promotor_actual = promotor($info_estudiante[0]['IdContacto']);

?>

<div>

    <div class="principal">
        <div>
            <img class="main-image"
                src="https://instituto.emmauscolombia.com/wp-content/uploads/2021/07/Nuevo-Logo-Jun-2021-01.png"
                alt="Nuevo logo emmaus">
        </div>

        <div class="admin_contenedor">
            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#añadirestudiante">
                Administrar estudiante
            </button>
            <button type="button" class="btn btn-outline-success" data-toggle="" data-target="">
                Nuevo estudiante
            </button>
            <button type="button" class="btn btn-outline-success" data-toggle="" data-target="">
                Registrar nuevo curso
            </button>
            <button type="button" class="btn btn-outline-success" data-toggle="" data-target="">
                Registrar nuevo material
            </button>
            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#añadirProveedor">
                Registrar proveedor
            </button>
            <button type="button" class="btn btn-outline-success" data-toggle="" data-target="">
                Administrar representantes
            </button>
        </div>

    </div>



</div>

<!-- Modal -->
<div class="modal fade" id="añadirProveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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
                            <?php foreach ($materiales as $col=> $valor): ?>
                            <option value="<?=$valor['IdMaterial']?>"><?=$valor['TituloMaterial']?></option>
                            <?php endforeach; ?>
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

                    <div class="next"></div>
                </form>

            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="añadirestudiante" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <input name="activo" type="hidden" value="nuevo-estudiante">
                    <select class="id_promotor" name="IdContacto" required>
                        <option value="" disabled selected>Escoger promotor</option>
                        <?php foreach ($promotores as $col=> $valor): ?>
                        <option value="<?= $valor['IdContacto'] ?>"> <?= $valor['Nombre']?> (<?= $valor['Ciudad']?>) -
                            (<?= $valor['IdContacto']?>)</option>
                        <?php endforeach; ?>
                    </select>
                    <?php
            for ($z=2; $z < sizeof($columnas_estudiantes) ; $z++)
            {
              foreach($columnas_estudiantes[$z] as $nombre_columna => $column ):
                if ($column != 'FechaSolicitud'):
                ?>
                    <div class="form-row">
                        <?php if($column == 'FechaNacimiento' ){ ?>
                        <div class="col">
                            <label for="campo1"><?=$column?></label>
                        </div>
                        <div class="col">
                            <input name="<?=$column?>" type="date" placeholder="">
                        </div>
                        <?php }else if($column == 'Telefono' || $column == 'Celular' ){ ?>
                        <div class="col">
                            <label for="campo1"><?=$column?></label>
                        </div>
                        <div class="col">
                            <input name="<?=$column?>" type="number" placeholder="">
                        </div>
                        <?php 
                  }else{
                ?>
                        <div class="col">
                            <label for="campo1"><?=$column?></label>
                        </div>
                        <div class="col">
                            <input name="<?=$column?>" type="text" placeholder="">
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

    <div class="boton-volver">
        <button class="boton_para_volver" name="button">
            <a href="<?=site_url()?>">Volver</a>
        </button>
    </div>
</div>