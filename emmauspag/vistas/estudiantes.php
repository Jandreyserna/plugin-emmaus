<?php
if (!empty($_POST['IdCursoRealizado'])){
  insert_funtion('curso_realizados', $_POST);
}else{

  $id = $_POST['id-estudiante'];
  unset($_POST['id-estudiante']);

  // echo "<pre>";
  // print_r($_POST['id-estudiante']);
  // echo "</pre>";
###############################################################
########Traigo la informacion del estudiante en 2 paretes #####
###############################################################
  $principal =  Information_One_Student_First($id);
  $secundario = Information_One_Student_Secund($id);

  ###################################################
  ########Traigo los promotores y las columnas#######
  ###################################################
  $promotores = Information_Promotors();
  $columnas_estudiantes = Colum_Students();

  ###################################################
  ########
  ###################################################
  $info_estudiante = Information_One_Student($id);
  $ultimo_curso = Last_course_Of_Student($id);
  $columnas_curso_realizados = Column_Course_Done();
  $materiales = Materials();

  ###################################################
  ########Traigo todos los cursos ###################
  ###################################################

  $cursos_hechos = 

  // unset($info_tabla[0]['IdContacto']);
  // echo "<pre>";
  // print_r($materiales);
  // echo "</pre>";
?>
<div class="contenedor-estudiantes">
  <div class="titulo text-center">
    <h1>ADMINISTRACIÓN DE ESTUDIANTES</h1>
  </div>

<div class="container">
  <div class="row">
    <div class="col">
      <h3>Información de estudiante</h3>
      <ul>
  <?php foreach ($principal as $campo=> $valor): ?>
          <li><?=$campo.  ':'." ".$valor?></li>
  <?php endforeach; ?>
      </ul>
      <div id="ver_mas_estudiante" class="collapse">
        <ul>
    <?php foreach ($secundario as $campo1=> $valor1): ?>
            <li><?=$campo1.  ':'." ".$valor1?></li>
    <?php endforeach; ?>
        </ul>
      </div>
    </div>
    <div class="col">
      <h3>Ultimo curso realizado por estudiante</h3>
      <ul>
        <?php foreach ($ultimo_curso[0] as $campo2=> $valor2): ?>
                <li><?=$campo2.  ':'." ".$valor2?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>

<div class="container">

  <a type="button" href="#ver_mas_estudiante" data-toggle="collapse" >Ver todo</a>

  <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#añadirestudiante-curso">
    Añadir curso
  </button>

  <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#actualizar">
    Actualizar
  </button>

  <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#actualizar">
    Cursos realizados
  </button>
<!-- <a href="">volver a estudiantes</a> -->
  <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#actualizar">
    Plan de estudios
  </button>
  <!-- <button type="submit" name="button"><a href="">Volver estudiantes</a> </button> -->

</div>

<!-- Modal -->
<div class="modal fade" id="añadirestudiante-curso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulario curso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <input name="IdCursoRealizado" type="hidden" value="4" >
          <input name="IdEstudiante" type="hidden" value="<?=$id?>" >
          <select class="id_material" name="IdMaterial" required>
              <option value="" disabled selected>Material</option>
           <?php foreach ($materiales as $col=> $valor): ?>
              <option value="<?=$valor['IdMaterial']?>"><?=$valor['TituloMaterial']?></option>
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

<!-- Modal ACTUALIZAR -->
<div class="modal fade" id="actualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulario Estudiante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
        <input name="Actualizar-estudiante" type="hidden" value="nuevo" >
        <select class="id_promotor" name="IdContacto" required>
            <option value="" disabled selected>Promotor</option>
         <?php foreach ($promotores as $col=> $valor): ?>
            <option value="<?= $valor['IdContacto'] ?>"> <?= $valor['Nombre']?></option>
         <?php endforeach; ?>
        </select>

        <?php
              for ($z=2; $z < sizeof($columnas_estudiantes) ; $z++)
              {
                foreach($columnas_estudiantes[$z] as $nombre_columna => $column ):?>
                  <label for="campo1"><?=$column?></label>
                  <input name="<?=$column?>" type="text" placeholder="DIGITE EL NOMBRE " >
        <?php  endforeach;
              }
            ?>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal CURSOS REALIZADOS -->
<div class="modal fade" id="actualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Curso Realizados Por Estudiante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul>
          <li></li>
        </ul>
      </div>
    </div>
  </div>
</div>



<?php }
