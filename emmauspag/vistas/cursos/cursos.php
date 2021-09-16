<div class="titulo text-center">
  <h1>ADMINISTRACIÓN DE CURSOS Y MATERIALES</h1>
</div>

<?php
$modelo_curso = new Modelo_cursos();
$curso = $modelo_curso->informacion_tabla_cursos();
$info_material = $modelo_curso->cursos_materiales_listado();
$info_nivel = $modelo_curso->cursos_niveles_listado();

if (!empty($_POST['nuevo-curso'])){

  unset($_POST['nuevo-curso']);
  $Dato['Nombre'] = $_POST['Nombre'];
  $modelo_curso->insertar_curso($Dato);
  $ultimo_curso = $modelo_curso->ultimo_curso();
  $Dato2['IdMaterialRel'] = $_POST['IdMaterial'];
  $Dato2['IdCurso'] = $ultimo_curso[0]['IdCurso'];
  $Dato3['IdCurso'] = $ultimo_curso[0]['IdCurso'];
  $Dato3 ['IdNivel'] = $_POST['IdNivel'];
  $modelo_curso->insertar_curso_material($Dato2);
  $modelo_curso->insertar_curso_nivel($Dato3);

}else if (!empty($_POST['nuevo-material'])){
  unset($_POST['nuevo-material']);
  $id = $modelo_curso->last_material();
  $_POST['IdMaterial'] = $id[0]['id'] + 1;
  $modelo_curso->insertar_material($_POST);
}
 ?>
 <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#añadircurso">
   Registrar Curso
 </button>

 <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#añadirmaterial">
   Registrar Material
 </button>

<table class="display" id="tabla-cursos">
<thead>
  <tr>
    <th scope='col'>ID</th>
    <th scope='col'>Nombre Del Curso</th>
    <th scope='col'>Nivel</th>
    <th scope='col'>Programa</th>
    <th scope='col'>Costo Venta</th>
  </tr>

</thead>
<tbody>

  <?php
  if ($curso != null) {
    for ($x=0; $x < sizeof($curso); $x++) {
        echo  "<tr>";
        foreach ($curso[$x] as $key => $dato) {
          echo"<td>".$dato."</td>";
        }
        echo "<td><button type='button' class='costo-curso btn btn-outline-success' data-toggle='modal' data-target='#vercosto'>Costo</button></td>";
        echo "</tr>";
    }
  }?>


</tbody>
</table>



<!-- Modal añadir curso-->
<div class="modal fade" id="añadircurso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulario curso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" method="post" action="">
              <p><label for="campo1">Nombre Curso</label>
              <input name="Nombre" type="text" placeholder="DIGITE EL NOMBRE " ></p>
              <input name="nuevo-curso" type="hidden" value="nuevo" >
              <select class="id_libro" name="IdMaterial" required>
                  <option value="" disabled selected>Material</option>
               <?php foreach ($info_material as $columna=> $data): ?>
                  <option value="<?= $data['IdMaterial'] ?>"> <?= $data['TituloMaterial']?></option>
               <?php endforeach; ?>
              </select>
              <select class="id_Programa" name="IdNivel" required>
                  <option value="" disabled selected>Nivel</option>
               <?php foreach ($info_nivel as $colum=> $date): ?>
                  <option value="<?= $date['IdNivel'] ?>"> <?= $date['NombreNivel']?></option>
               <?php endforeach; ?>
              </select>


          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Añadir</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<!-- Modal añadir Material-->
<div class="modal fade" id="añadirmaterial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulario curso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" method="post" action="">
              <label for="campo1">Nombre Curso</label>
              <input name="TituloMaterial" type="text" placeholder="DIGITE EL NOMBRE" >
              <input name="nuevo-material" type="hidden" value="nuevo" >
              <label for="campo1">Short</label>
              <input name="Short" type="text" placeholder="DIGITE EL Short" >
              <label for="campo1">Costo de Compra</label>
              <input name="ValorCosto" type="number" placeholder="0" >
              <label for="campo1">Costo de Venta</label>
              <input name="ValorVenta" type="number" placeholder="0" >


          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Añadir</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<!-- Modal costos de curso-->
<div class="modal fade" id="vercosto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Costos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="modal-footer mostrar-costo">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Añadir</button>
          </div>
      </div>
    </div>
  </div>
</div>

