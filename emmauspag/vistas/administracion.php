<?php


if(!empty($_POST['activo'])){
    unset($_POST['activo']);
    foreach($_POST as $campo => $valor) // convierto todas las minusculas a mayusculas
    {
        $_POST[$campo] = 	strtoupper($_POST[$campo]);
    }
    $_POST ['FechaSolicitud'] = date("Y-m-d");
    $ultimoId = ultimo_id();
    $ultimoId = $ultimoId + 1;
    $_POST['IdEstudiante'] = $ultimoId;
    insert_funtion('estudiantes', $_POST);
?>
        <div class="alert alert-success" role="alert">
            Se añadio un nuevo estudiante
        </div>
        <?php

}
  $datas = Information_curse_student();
  $columnas_estudiantes = Colum_Students();
  $promotores = Information_Promotors();
?>

<div>

    <div class="principal">

        <div class="admin_contenedor">
            <button type="button" class="btn btn-outline-success" data-toggle="" data-target="#añadirestudiante">
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

<div class="modal fade bd-example-modal-lg" id="añadirProveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <?php foreach ($promotores as $col=> $valor): ?>
                <option value="<?= $valor['IdContacto'] ?>"> <?= $valor['Nombre']?> (<?= $valor['Ciudad']?>) - (<?= $valor['IdContacto']?>)</option>
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
                          <input name="<?=$column?>" type="date" placeholder="" >
                        </div>
                  <?php }else if($column == 'Telefono' || $column == 'Celular' ){ ?>
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
<!--     </div>
 -->  </div>