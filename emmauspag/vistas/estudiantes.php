<?php

  $id = $_POST['id-estudiante'];


  $principal =  Information_One_Student_First($id);
  $secundario = Information_One_Student_Secund($id);
  $info_estudiante = Information_One_Student($id);
  $ultimo_curso = Last_course_Of_Student($id);
  $columnas_curso_realizados = Column_Course_Done();

  // unset($info_tabla[0]['IdContacto']);
  // echo "<pre>";
  // print_r($columnas_curso_realizados);
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

  <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#actualizar">
    Plan de estudios
  </button>

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
          <input name="nuevo-estudiante-curso" type="hidden" value="nuevo" >
          <?php
          for ($i=0; $i < sizeof($columnas_curso_realizados) ; $i++)
          {
              foreach($columnas_curso_realizados[$i] as $nombre_columna_curso => $nom_colum ):?>
                <label for="campo1"><?=$nom_colum?></label>
                <input name="<?=$nom_colum?>" type="text" placeholder="DIGITE EL NOMBRE " >
            <?php  endforeach;
          }?>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Añadir</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="actualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <input name="nuevo-estudiante-curso" type="hidden" value="nuevo" >
          <?php
              foreach($info_estudiante[0] as $columna => $colum ):?>
                <label for="campo1"><?=$columna?></label>
                <input name="<?=$columna?>" type="text" placeholder="DIGITE EL NOMBRE " >
            <?php  endforeach;?>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Añadir</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
