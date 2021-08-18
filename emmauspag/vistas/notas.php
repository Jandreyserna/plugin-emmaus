<?php
require dirname(dirname(dirname(dirname(dirname(__DIR__))))) . '/wp-load.php';
require_once dirname(dirname(__FILE__)) . '/Controller/ControlNotes.php';
require_once dirname(dirname(__FILE__)) . '/modelos/Modelo-cursos.php';
require_once dirname(dirname(__FILE__)) . '/funciones/functions.php';

$datas_table = control_notes_table();
echo "<pre>";
print_r( $datas_table);
echo "</pre>";
?>

<table class="display" id="table-notes">
    <thead>
      <tr>
        <th scope='col'>ID</th>
        <th scope='col'>Nombres</th>
        <th scope='col'>Apellidos</th>
        <th scope='col'>Material</th>
        <th scope='col'>Porcentaje</th>
        <th scope='col'>Dirección</th>
        <th scope='col'>Ciudad</th>
        <!-- <th scope='col'>Ultimo curso</th> -->
        <th></th>
      </tr>

    </thead>
   
  </table>

<!-- Modal -->
<div class="modal fade" id="añadirnota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Calificar Curso</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
          <input name="nuevo-estudiante" type="hidden" value="nuevo" >
          <input name="Porcentaje" type="number" value="0" >
          <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Añadir</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>


















