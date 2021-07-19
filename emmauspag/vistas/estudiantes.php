<?php

  $id = $_POST['id-estudiante'];
  $modelo_estudiantes                = new Modelo_estudiantes();
  $info_estudiante                  = $modelo_estudiantes->informacion_estudiante($id);
  $modelo_cursos                    = new Modelo_cursos();
  $ultimo_curso                     = $modelo_cursos->last_course_student($id);
  $modelo_columnas_curso_realizados = new Modelo("curso_realizados");
  $columnas_curso_realizados        = $modelo_columnas_curso_realizados->columnas();
  $principal['Id']        = $info_estudiante[0]['IdEstudiante'];
  $principal['Promotor']  = $info_estudiante[0]['IdContacto'];
  $principal['Documento'] = $info_estudiante[0]['DocIdentidad'];
  $principal['Nombres']   = $info_estudiante[0]['Nombres'];
  $principal['Apellidos'] = $info_estudiante[0]['Apellidos'];
  $secundario['Fecha De Nacimiento'] = $info_estudiante[0]['FechaNacimiento'];
  $secundario['Ocupacion']        = $info_estudiante[0]['Ocupacion'];
  $secundario['Dirección']        = $info_estudiante[0]['DireccionCasa'];
  $secundario['Telefono']         = $info_estudiante[0]['Telefono'];
  $secundario['Celular']          = $info_estudiante[0]['Celular'];
  $secundario['Escolaridad']      = $info_estudiante[0]['Escolaridad'];
  $secundario['Correo']           = $info_estudiante[0]['CorreoElectronico'];
  $secundario['Ciudad']           = $info_estudiante[0]['FechaSolicitud'];
  $secundario['Iglesia']          = $info_estudiante[0]['Iglesia'];
  $secundario['Estado Civil']     = $info_estudiante[0]['EstadoCivil'];
  $secundario['Barrio']           = $info_estudiante[0]['Barrio'];
  $secundario['Comentario']       = $info_estudiante[0]['Info'];

  unset($columnas_curso_realizados [4]);
  unset($columnas_curso_realizados [5]);

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

<a href="#ver_mas_estudiante" data-toggle="collapse" >Ver</a>

<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#añadirestudiante-curso">
  AÑADIR CURSO
</button>
<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#actualizar">
  ACTUALIZAR ESTUDAINTE
</button>

<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#actualizar">
  CURSOS REALIZADOS
</button>
<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#actualizar">
  PLAN DE ESTUDIOS
</button>

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
