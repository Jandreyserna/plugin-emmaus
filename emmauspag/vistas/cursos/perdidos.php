<?php
if(!empty($_POST['update-nota'])){
    unset($_POST['update-nota']);
    unset($_POST['id-course']);
    if($_POST['Porcentaje'] != 0)
          {
            $_POST['Enviado'] = 1;
          }else {
            $_POST['Enviado'] = 0;
          }
    $id = $_POST['IdCursoRealizado'];
    unset($_POST['IdCursoRealizado']);
    $_POST['FechaTerminacion'] = date("Y-m-d");
    update_course_note($_POST,$id);
?>
  <script>
    alert(" nota actualizada ");
  </script>
<?php
  }
?>
<!-- Menu principal -->
<div>
  <ul class="main-menu">
    <li><a href="?page=emmaus">Inicio</a></li>
    <li><a href="?page=estudiante">Estudiantes</a></li>
    <li><a href="?page=impresiones">Impresiones</a></li>
    <li><a href="?page=diploma">Diplomas</a></li>
    <li><a href="?page=curso">Cursos</a></li>
  </ul>
</div>

<div class="titulo text-center">
    <h1>Cursos perdidos</h1>
  </div>

  <div class="nota">

  </div>

<table class="display" id="table-lost">
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
<div class="modal fade" id="rectifynota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        
      </div>
    </div>
  </div>
