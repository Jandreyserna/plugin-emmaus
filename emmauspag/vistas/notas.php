<?php
if (!empty($_POST['nueva-nota'])){
  unset($_POST['nueva-nota']);
  unset($_POST['id-course']);
  insert_funtion('curso_realizados', $_POST);
}
?>

<div class="titulo text-center">
    <h1>Cursos sin Porcentajes</h1>
  </div>

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
        <th></th>
      </tr>

    </thead>
   
  </table>

<!-- Modal -->
<div class="modal fade" id="añadirnota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        
      </div>
    </div>
  </div>


















