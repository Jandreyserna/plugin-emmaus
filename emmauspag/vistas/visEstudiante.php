<?php
if (!empty($_POST['nuevo-estudiante'])){
  unset($_POST['nuevo-estudiante']);
  insert_funtion('estudiantes', $_POST);
} else if (!empty($_POST['id-estudiante'])){
  see_students_admin();
} else {
  $modelo_estudiantes = new Modelo_estudiantes();
  $datas = $modelo_estudiantes->cursos_realizados();
  $modelo_columnas_estudiantes      = new Modelo('estudiantes');
  $columnas_estudiantes             = $modelo_columnas_estudiantes->columnas();
  $modelo_promotor  = new Modelo_promotor();
  $promotores = $modelo_promotor->traer_promotor();

  unset($columnas_estudiantes[0]);
  unset($columnas_estudiantes[1]);

  // echo "<pre>";
  // print_r($columnas_estudiantes );
  // echo"</pre>";
  ?>

  <div class="contenedor-estudiantes">
    <div class="titulo text-center">
      <h1>ADMINISTRACIÓN DE CURSOS REALIZADOS</h1>
    </div>


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#añadirestudiante">
      AÑADIR NUEVO ESTUDIANTE
    </button>

    <table class="display" id="tabla1">
    <thead>
      <tr>
        <th scope='col'>NOMBRES</th>
        <th scope='col'>APELLIDOS</th>
        <th scope='col'>CIUDAD</th>
        <th scope='col'>CURSO REALIZADO</th>
        <th scope='col'>FECHA</th>
        <th scope='col'>ULTIMO CURSO</th>
        <th></th>
      </tr>

    </thead>
    <tbody>

        <?php
        for ($x=0; $x < sizeof($datas); $x++):
            echo  "<tr>";
            foreach ($datas[$x] as $key => $dato):
              if ($key != 'IdEstudiante' ):
                      echo"<td>".$dato."</td>";
                    endif;
            endforeach;?>
                  <td>
                    <form action=''  method="POST">
                      <input name="id-estudiante" type="hidden" value="<?=$datas[$x]['IdEstudiante']?>" >
                      <button class="btn btn-outline-success" type="submit">ver mas</button>
                    </form>
                  </td>
              </tr>
  <?php endfor; ?>
    </tbody>
  </table>
  </div>

    <!-- <div class="container">
      <button type="button" class="btn btn-outline-success" name="button">
        <a href="#añadirestudiante" class="btn-sucess" data-toggle="collapse" >AÑADIR NUEVO ESTUDIANTE</a>
      </button>
    </div> -->


  <div class="contenedor-search">

  </div>


  <!-- Modal -->
  <div class="modal fade" id="añadirestudiante" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <input name="nuevo-estudiante" type="hidden" value="nuevo" >
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
                <button type="submit" class="btn btn-primary">Añadir</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>





  <div class="boton-volver">
    <button class="boton_para_volver" name="button">
    <a href="<?=site_url()?>">Volver</a>
    </button>
  </div>
  </div>
<?php }
