<?php

$table = control_course_done();

?>



<div class="titulo text-center">
  <h1>CERTIFICADOS</h1>
</div>
<div class="certificados crudd">
  <!-- <form class="d-md-flex">
        <input class="form-control me-2" type="search" placeholder="DIGITE EL NOMBRE " aria-label="Search">
        <button class="btn btn-outline-success" type="submit">BUSCAR</button>
  </form> -->

  <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#añadirestudiante">
    Registrar Nota
  </button>
  <!-- <button class="btn btn-primary" type="button" name="button">
    <a href="#curso" class="btn-crudd btn-sucess" data-toggle="collapse">Registrar curso</a>
  </button> -->

</div>

<table class="display" id="certificado-table">
<thead>
  <tr>
    <th scope="col">Fecha</th>
    <th scope="col">Nombre Del Curso</th>
    <th scope="col">Puntaje</th>
    <th scope="col">Calificador</th>
    <th scope="col">Nombre Estudiante</th>
    <th scope="col">Devolver</th>
  </tr>
</thead>
<tbody>
  <tr>
    <th scope="row">15/07/2020</th>
    <td>Siervo de Dios</td>
    <td>98%</td>
    <td>Eliza</td>
    <td>Jairo Gonzales</td>
    <td><button type="button" class="btn-outline-success" name="button"><span class="dashicons dashicons-yes-alt"></span></button></td>
  </tr>
</tbody>
</table>
