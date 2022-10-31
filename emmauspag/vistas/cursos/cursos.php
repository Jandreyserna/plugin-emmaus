

<div class="post-menu container">

  <div class="titulo text-center">
    <h1>Administración de Materiales</h1>
  </div>

  <?php
    $modelo_cursos = new Modelo_cursos();
    $curso = $modelo_cursos->informacion_tabla_cursos();

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
  ?>
      <div class="alert alert-success" role="alert">
        nuevo curso registrado
      </div>
      <script>
        location.reload();
      </script> 
  <?php
    }else if (!empty($_POST['nuevo-material'])){
      unset($_POST['nuevo-material']);
      $id = $modelo_curso->last_material();
      $_POST['IdMaterial'] = $id[0]['id'] + 1;
      $modelo_curso->insertar_material($_POST);
  ?>
      <div class="alert alert-success" role="alert">
        Nuevo material registrado!
      </div>
      <script>
        location.reload();
      </script> 
  <?php
    }
  ?>
  <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#añadircurso">
    Registrar nuevo curso
  </button>

  <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#añadirmaterial">
    Registrar nuevo material
  </button>

  <table class="display" id="tabla-cursos">
    <thead>
      <tr>
        <th scope='col'>Id</th>
        <th scope='col'>Curso</th>
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
      }
    ?>
    </tbody>
  </table>


<?php
  /* añade modal Añadir curso */
  require_once dirname(__DIR__).'/modales/modalRegistrarCurso.php';

  /* Añade modal Añadir material */
  require_once dirname(__DIR__).'/modales/modalRegistrarMaterial.php';

  /* añade modal actualizar costo de curso */
  require_once dirname(__DIR__).'/modales/modalCostoCurso.php';
?>