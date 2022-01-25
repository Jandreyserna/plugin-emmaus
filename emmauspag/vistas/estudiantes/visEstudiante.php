<?php

use PhpOffice\PhpWord\Element\TextRun;

$modelo = new Modelo_estudiantes();
if(!empty($_POST['activo'])){
  switch ($_POST['activo']) {
    case 'nuevo-estudiante': // accion activada por el boton de añadir un nuevo estudiante de la page estudiante
        unset($_POST['activo']);
        foreach($_POST as $campo => $valor) // convierto todas las minusculas a mayusculas
        {
          $_POST[$campo] = 	strtoupper($_POST[$campo]);
        }
        $_POST['FechaSolicitud'] = date("Y-m-d");
        $ultimoId = ultimo_id();
        $ultimoId = $ultimoId + 1;
        $_POST['IdEstudiante'] = $ultimoId;
        insert_funtion('estudiantes', $_POST);
?>
        <div class="alert alert-success" role="alert">
            Se añadio un nuevo estudiante
        </div>
<?php
        break;

    case 'nuevo-curso': // accion activada por el boton de añadir un nuevo curso de la subpage estudiante
        unset($_POST['activo']);
        if($_POST['Porcentaje'] != 0)
          {
            $_POST['Enviado'] = 1;
          }else {
            $_POST['Enviado'] = 0;
          }
        $_POST['FechaTerminacion'] = date("Y-m-d");
        insert_funtion('curso_realizados', $_POST);
?>
        <div class="alert alert-success" role="alert">
            Se añadio un nuevo Curso
        </div>
<?php
        break;

    case 'Update-students': // accion activada por el boton de actualizar estudiante de la subpage estudiante
        unset($_POST['activo']);
        foreach($_POST as $campo => $valor) // convierto todas las minusculas a mayusculas
        {
          $_POST[$campo] = 	strtoupper($_POST[$campo]);
        }
        $id_student = $_POST['IdEstudiante'];
        unset($_POST['IdEstudiante']);
        update_funtion($_POST, $id_student);
?>

        <div class="alert alert-success" role="alert">
          Se actualizo la información del estudiante
        </div>
<?php
        break;

    case 'Actualizar-nota-unica': // accion activada por el boton de actualizar nota curso de la subpage estudiante
        unset($_POST['activo']);
        if($_POST['Porcentaje'] != 0)
            {
              $_POST['Enviado'] = 1;
            }else {
              $_POST['Enviado'] = 0;
            }
        $id = $_POST['IdCursoRealizado'];
        unset($_POST['IdCursoRealizado']);
        $_POST['FechaTerminacion'] = date("Y-m-d");
        update_course($_POST,$id);
?>
        <div class="alert alert-success" role="alert">
          Se actualizo la nota
        </div>
<?php
        break;

    case 'eliminar-curso': // accion activada por el boton de eliminar curso de la subpage estudiante
        unset($_POST['activo']);
        funtion_delete_course($_POST['IdCursoRealizado']);
?>
        <div class="alert alert-success" role="alert">
          se ha eliminado un curso de un estudiante
        </div>
<?php
        break;

    case 'insertar-diploma': // accion activada por el boton de añadir Diplomado de la subpage estudiante
        unset($_POST['activo']);
        $_POST['FechaTerminacion'] = date("Y-m-d");
        insert_funtion('diplomas', $_POST);
?>
        <div class="alert alert-success" role="alert">
          Se añadio un diplomado a un estudiante
        </div>
<?php
        break;

    case 'elecion-diploma': // accion activada por el boton de imprimir elección Diplomado de la subpage estudiante
          $fuente = [
            "name" => "Arial",
            "size" => 11,
            "bold" => false,
          ];
          $fuente2 = [
            "name" => "arial",
            "size" => 11,
            "bold" => true,
          ];
          $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(dirname(dirname(dirname(__DIR__))) . '/plantillasword/Carta elección Diplomado.docx');
          $archivo = $_POST['Nombre'].' '.'eleccionDiplomado'.'.docx';
          $url = ABSPATH  .'/diplomas/'.$archivo;
          $nom = new TextRun();
          $nom->addText($_POST['Nombre'],$fuente2);
          $fecha = new TextRun();
          $fecha->addText(date("F-j-Y"),$fuente);
          $ciudad = new TextRun();
          $ciudad->addText($_POST['Ciudad'],$fuente);
          $templateProcessor->setComplexBlock('nombre', $nom);
          $templateProcessor->setComplexBlock('fecha', $fecha);
          $templateProcessor->setComplexBlock('ciudad', $ciudad);
          $templateProcessor->saveAs($url);
          $envio = site_url('diplomas/'.$archivo);
?>
          <script>
            window.open(
            '<?=$envio?>',
            '_blank'
            );
          </script>
          <div class="alert alert-success" role="alert">
            Documento descargado
          </div>
<?php
        break;
  }
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
  <div class="container">
    <div class="row">
      <div class="col-lg-12">

        <table class=" table table-bordered  display nowrap" cellspacing="0" width="100%" id="tabla1">
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
    </div>
  </div>
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