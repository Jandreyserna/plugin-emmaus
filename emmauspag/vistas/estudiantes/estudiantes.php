<?php
require_once dirname(dirname(dirname(__FILE__))) . '/Controller/ControlOnlyEstudiante.php';
require_once dirname(dirname(dirname(__FILE__))) . '/modelos/Modelo-estudiantes.php';


  $id = $_POST['id-estudiante'];
  unset($_POST['id-estudiante']);

  $principal =  Information_One_Student_First($id);
  $secundario = Information_One_Student_Secund($id);
  $info_estudiante = Information_One_Student($id);
  $ultimo_curso = Last_course_Of_Student($id);
  $columnas_curso_realizados = Column_Course_Done();
  $materiales = Materials();
  $cursos_hechos = courses_done($id);
  $cursos = Plan_Study();
  $ultimo_id = Course_Last_Id();
  $ultimo_id++;

  // unset($info_tabla[0]['IdContacto']);
?>
<div class="contenedor-estudiantes">
  <div class="titulo text-center">
    <h1>Más sobre el estudiante</h1>
  </div>



<div class="container">
  <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#añadirestudiante-curso">
    Añadir curso
  </button>

  <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#actualizar">
    Actualizar información
  </button>

  <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#realizados">
    Cursos realizados
  </button>

  <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#plan-estudios">
    Plan de estudios
  </button>
</div>

<div class="container">
  <div class="row">
    <div class="col">
      <h3>Información:</h3>
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
      <h3>Último curso realizado:</h3>
      <ul>
        <?php foreach ($ultimo_curso[0] as $campo2=> $valor2): ?>
                <li><?=$campo2.  ':'." ".$valor2?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>
<div class="container">
  <a  href="#ver_mas_estudiante" data-toggle="collapse" class="btn-accion">Ver mas...</a>
</div>


<div class="container">
  <a href="" class="btn-accion"> Volver a vista anterior</a>
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
          <input name="nuevo-curso" type="hidden" value="4" >
          <input name="IdCursoRealizado" type="hidden" value="<?=$ultimo_id?>" >
          <input name="IdEstudiante" type="hidden" value="<?=$id?>" >
          <select class="id_material" name="IdMaterial" required>
              <option value="" disabled selected>Material</option>
           <?php foreach ($materiales as $col=> $valor): ?>
              <option value="<?=$valor['IdMaterial']?>"><?=$valor['TituloMaterial']?></option>
           <?php endforeach; ?>
          </select>
          <div class="" style="display-inline">
            <label for="campo2">NOTA :</label>
            <input name="Porcentaje" type="text" value="0" >
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Añadir</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<!-- Modal Actualizar estudiante-->
<div class="modal fade" id="actualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulario Estudiante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <input name="Update-students" type="hidden" value="No importa" >
          <input name="IdEstudiante" type="hidden" value="<?=$id?>" >
          <?php
          foreach ($info_estudiante[0] as $camp => $infor):
            if ($camp != 'FechaSolicitud'):
            ?>
              <div class="form-row">
            <?php
              if($camp == 'FechaNacimiento'){
            ?>
                <label for="campo1"><?=$camp?></label>
                <input name="<?=$camp?>" type="date" value="<?=$infor?>" >
            <?php
              }else if ($camp == 'Telefono' || $camp == 'Telefono' ){
            ?>
                <label for="campo1"><?=$camp?></label>
                <input name="<?=$camp?>" type="number" value="<?=$infor?>" >
            <?php
              }else{
            ?>
              <label for="campo1"><?=$camp?></label>
              <input name="<?=$camp?>" type="text" value="<?=$infor?>" >
            <?php
              }
            ?>
              </div>
            <?php
            endif;
          endforeach;
          ?>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Añadir</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<!-- Modal Cursos realizados -->
<div class="modal fade" id="realizados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Curos Realizados</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
        if (!empty($cursos_hechos)):
         ?>
        <ul>
          <?php
          $m = 0;
            foreach ($cursos_hechos as $campos => $nombre):
          ?>
          <li ><?=$cursos_hechos[$m]['Nombre']?></li>
          <?php
          $m++;
              endforeach;
          endif;
           ?>
        </ul>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Plan de estudios -->
<div class="modal fade" id="plan-estudios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Plan De Estudios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
        if (!empty($cursos)):
          ?>
          <ul>
          <?php
          echo "<pre>";
          print_r( $cursos_hechos );
          echo "</pre>";
          for ($z=0; $z < sizeof($cursos) ; $z++){
            foreach ($cursos[$z] as $columa => $dato){
              ?>
                <li><?=$dato ?></li>
              <?php
            }
          }
            ?>
            </ul>
            <?php
         endif;
          ?>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
      </div>
    </div>
  </div>
</div>
