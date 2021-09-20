<?php
if (!empty($_POST['nuevo-estudiante'])){
    unset($_POST['nuevo-estudiante']);
    $_POST['FechaSolicitud'] = date("Y-m-d");
    insert_funtion('estudiantes', $_POST);
    $_POST['FechaSolicitud'] = date("Y-m-d");
  } else if (!empty($_POST['id-estudiante'])){
      see_students_admin();
  } else if (!empty($_POST['nuevo-curso'])){
      unset($_POST['nuevo-curso']);
      if($_POST['Porcentaje'] != 0)
        {
          $_POST['Enviado'] = 1;
        }else {
          $_POST['Enviado'] = 0;
        }
        $_POST['FechaTerminacion'] = date("Y-m-d");
        insert_funtion('curso_realizados', $_POST);
  } else if (!empty($_POST['Update-students'])){
    unset($_POST['Update-students']);
    $id_student = $_POST['IdEstudiante'];
    unset($_POST['IdEstudiante']);
    update_funtion($_POST, $id_student);

}
  $datas = Information_curse_student();
  $columnas_estudiantes = Colum_Students();
  $promotores = Information_Promotors();
  ?>

<div class="contenedor-estudiantes">
  <div class="titulo text-center">
    <h1>Administración de Estudiantes</h1>
  </div>
    
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#añadirestudiante">
    Nuevo estudiante
  </button>

  <table class="display" id="tabla1">
    <thead>
      <tr>
        <th scope='col'>Id</th>
        <th scope='col'>Id de Promotor</th>
        <th scope='col'>Nombres</th>
        <th scope='col'>Apellidos</th>
        <th scope='col'>Dirección</th>
        <th scope='col'>Ciudad</th>
        <!-- <th scope='col'>Ultimo curso</th> -->
        <th></th>
      </tr>
    </thead>
  </table>
</div>

<div class="contenedor.search"></div>
  <!-- Modal -->
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
            <input name="nuevo-estudiante" type="hidden" value="nuevo" >
            <select class="id_promotor" name="IdContacto" required>
              <option value="" disabled selected>Escoger promotor</option>
              <?php foreach ($promotores as $col=> $valor): ?>
                <option value="<?= $valor['IdContacto'] ?>"> <?= $valor['Nombre']?> (<?= $valor['Ciudad']?>)</option>
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

  <div class="boton-volver">
    <button class="boton_para_volver" name="button">
      <a href="<?=site_url()?>">Volver</a>
    </button>
  </div>
</div>

<!-- Full screen modal -->
<div class="modal-dialog modal-fullscreen-sm-down">
  ...
</div>