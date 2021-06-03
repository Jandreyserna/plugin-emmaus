<div class="titulo text-center">
  <h1>ADMINISTRACIÓN DE CURSOS</h1>
</div>

<?php
  $modelo_cursos = new Modelo_cursos();
  $info_curso = $modelo_cursos-> informacion_tabla_cursos();
  print_r($info_curso);
 ?>
<button class="btn btn-outline-success" type="button" name="button">
  <div class="container">
    <a href="#anadir" class="btn-crudd btn-sucess" data-toggle="collapse">Añadir Nuevo Curso</a>
  </div>
</button>

<!-- <table class="display" id="tabla-cursos">
<thead>
  <tr>
    <th scope='col'>ID</th>
    <th scope='col'>Nombre Del Curso</th>
    <th scope='col'>Nivel</th>
    <th scope='col'>Prvograma</th>
    <th scope='col'>Costo Venta</th>
  </tr>

</thead>
<tbody> -->

  <?php
  // if ($info_curso != null) {
  //   for ($x=0; $x < sizeof($info_curso); $x++) {
  //       echo  "<tr>";
  //       foreach ($info_curso[$x] as $key => $dato) {
  //         echo"<td>".$dato."</td>";
  //       }
  //       // echo"<td><button class='borrar-estudiante btn-outline-success' type='button' name='button_borrar'>Borrar</button></td>";
  //       // echo"<td>"."<button class='info-estudiante btn-outline-success' type='button' name='button_informacion'>".'Informaciòn'."</button>"."</td>";
  //       echo "</tr>";
  //   }
  //
  // }?>

<!--
</tbody>
</table> -->


<div id="anadir" class="collapse">
  <form class="">
        <p><label for="campo1">Nombre Curso</label>
        <input type="text" placeholder="DIGITE EL NOMBRE " ></p>
        <p><label for="campo2">Duracion Curso</label>
        <input  type="text" placeholder="DIGITE UN VALOR " ></p>
        <p><label for="campo3">Costo Curso</label>
        <input  type="text" placeholder="DIGITE UN VALOR " ></p>
        <p><label for="campo4">Material (Libro)</label>
        <input  type="text" placeholder="DIGITE EL NOMBRE " ></p>
        <button class="btn btn-outline-success" type="submit">añadir</button>
  </form>

</div>



<div class="boton-volver">
  <button class="boton_para_volver" name="button">
  <a href="<?=site_url()?>">Volver</a>
  </button>
</div>
