<?php
if (!empty($_POST['notas'])){
  See_Notes_course();
}else if (!empty($_POST['nuevo-curso'])){
          unset($_POST['nuevo-curso']);
          if($_POST['Porcentaje'] != 0)
          {
            $_POST['Enviado'] = 1;
          }else {
            $_POST['Enviado'] = 0;
          }
          insert_funtion('curso_realizados', $_POST);
} else if (!empty($_POST['Update-students'])){
    unset($_POST['Update-students']);
    $id_student = $_POST['IdEstudiante'];
    unset($_POST['IdEstudiante']);
    update_funtion($_POST, $id_student);
}
//$devoluciones = control_course_done();
?>

<div class="container-course">

  <div class="titulo text-center">
    <h1>ADMINISTRACION DE CURSOS</h1>
  </div>
  <div id="boton-calificar">
  <button type="button" class="btn btn-outline-success" id="calificar">
    Registrar Notas
  </button>
  </div>
  <div class="container-table">
  <table class="display" id="courses-table">
    <thead>
      <tr>
        <th scope="col">IdCursoHecho</th>
        <th scope="col">Nombre Estudiante</th>
        <th scope="col">Apellido Estudiante</th>
        <th scope="col">Material</th>
        <th scope="col">Puntaje</th>
        <th scope="col">Fecha</th>
        <th>acción</th>
        <!-- <th scope="col">Calificador</th> -->


      </tr>
    </thead>

  </table>
  </div>
</div>