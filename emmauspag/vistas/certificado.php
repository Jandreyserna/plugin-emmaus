<?php


// $idmaterial = control_update_id();
// echo "<pre>";
// print_r($idmaterial);
// echo "</pre>";
// $table = control_course_done();




$devoluciones = control_course_done();
?>



<div class="titulo text-center">
  <h1>ADMINISTRACION DE CURSOS</h1>
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
    <th scope="col">IdCursoHecho</th>
    <th scope="col">Nombre Estudiante</th>
    <th scope="col">Nombre Del Curso</th>
    <th scope="col">Puntaje</th>
    <th scope="col">Fecha</th>
    <th scope="col">Devolver</th>
    <!-- <th scope="col">Calificador</th> -->


  </tr>
</thead>
<tbody>
  <?php
  for ($x=0; $x < sizeof($devoluciones); $x++):
      echo  "<tr>";
      foreach ($devoluciones[$x] as $key => $dato):
        
                echo"<td>".$dato."</td>";

      endforeach;?>
            <td>
              <form action=''  method="post">
                <input name="id-estudiante" type="hidden" value="<?=$devoluciones[$x]['IdCursoRealizado']?>" >
                <button class="btn btn-outline-success" type="submit">enviar</button>
              </form>
            </td>
        </tr>
<?php endfor; ?>

</tbody>
</table>
