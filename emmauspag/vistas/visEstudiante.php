<?php
if (!empty($_POST['nuevo-estudiante'])){
  unset($_POST['nuevo-estudiante']);
  insert_funtion('estudiantes', $_POST);
} else if (!empty($_POST['id-estudiante'])){
  see_students_admin();
}else{

  // $fechas = data_students();
  // echo "<pre>";
  // print_r($fechas );
  // echo"</pre>";
  // for ($m=0; $m < sizeof($fechas) ; $m++) {
  //   if ($fechas[$m]['FechaTerminacion'] != "") {
  //     $dates = explode(" ", $fechas[$m]['FechaTerminacion']);
  //     if (sizeof($dates) > 4) {
  //
  //
  //     echo $m;
  //     switch ($dates[1]) {
  //       case 'Jan':
  //         $dates[1]= "01";
  //         break;
  //       case 'Feb':
  //       $dates[1]= "02";
  //         break;
  //       case 'Mar':
  //       $dates[1]= "03";
  //         break;
  //       case 'Apr':
  //       $dates[1]= "04";
  //         break;
  //       case 'May':
  //       $dates[1]= "05";
  //         break;
  //       case 'Jun':
  //       $dates[1]= "06";
  //         break;
  //       case 'Jul':
  //       $dates[1]= "07";
  //         break;
  //       case 'Aug':
  //       $dates[1]= "08";
  //         break;
  //       case 'Sep':
  //       $dates[1]= "09";
  //         break;
  //       case 'Oct':
  //       $dates[1]= "10";
  //         break;
  //       case 'Nov':
  //       $dates[1]= "11";
  //         break;
  //       case 'Dec':
  //       $dates[1]= "12";
  //         break;
  //
  //     }
  //     $data['FechaTerminacion'] = $dates[5]."-".$dates[1]."-".$dates[2];
  //
  //     Update_date_Students($data,$fechas[$m]['IdCursoRealizado']);
  //     }
  //     echo "<pre>";
  //     print_r($data );
  //     echo"</pre>";
  //   }
  // }

  // for ($m=0; $m < sizeof($fechas) ; $m++) {
  //   if ($fechas[$m]['FechaNacimiento'] != "") {
  //     $dates = explode("-", $fechas[$m]['FechaNacimiento']);
  //     $num =intval($dates[0]);
  //     if ($num < 100) {
  //       $data['FechaNacimiento'] = $dates[2]."-".$dates[1]."-".$dates[0];
  //       Update_date_Students($data,$fechas[$m]['IdEstudiante']);
  //       echo $m;
  //       echo "<pre>";
  //           print_r($data );
  //           echo"</pre>";
  //     }
      // echo "<pre>";
      //     print_r($dates[2] );
      //     echo"</pre>";
  //   }
  //
  // }



  $datas = Information_curse_student();
  $columnas_estudiantes = Colum_Students();
  $promotores = Information_Promotors();
  // echo "<pre>";
  // print_r($columnas_estudiantes );
  // echo"</pre>";
  ?>

<div class="contenedor-estudiantes">
    <div class="titulo text-center">
      <h1>Modulo Estudiantes</h1>
    </div>

<div class="buscador-estudiante">
  <form class="search-student"  method="post">
    <input type="text" name="search">
    <button type="submit" name="button-search">Buscar</button>
  </form>

</div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#añadirestudiante">
      Añadir nuevo estudiante
    </button>

    <table class="display" id="tabla1">
    <thead>
      <tr>
        <th scope='col'>Nombres</th>
        <th scope='col'>Apellidos</th>
        <th scope='col'>Ciudad</th>
        <th scope='col'># Cursos Hechos</th>
        <th scope='col'>Fecha</th>
        <th scope='col'>Ultimo curso</th>
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
                     <form action=''  method="post">
                       <input name="id-estudiante" type="hidden" value="<?=$datas[$x]['IdEstudiante']?>" >
                       <button class="btn btn-outline-success" type="submit">Ver más</button>
                     </form>
                   </td>
               </tr>
<?php
 endfor;
 ?>
    </tbody>
  </table>
  </div>

    <div class="container">
      <button type="button" class="btn btn-outline-success" name="button">
        <a href="#añadirestudiante" class="btn-sucess" data-toggle="collapse" >AÑADIR NUEVO ESTUDIANTE</a>
      </button>
    </div>


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
           <?php
            foreach ($promotores as $col=> $valor): ?>
              <option value="<?= $valor['IdContacto'] ?>"> <?= $valor['Nombre']?></option>
           <?php
          endforeach;
           ?>
          </select>

          <?php
                for ($z=2; $z < sizeof($columnas_estudiantes) ; $z++)
                {
                  foreach($columnas_estudiantes[$z] as $nombre_columna => $column ):?>
                      <label for="campo1"><?=$column?></label>
                      <input name="<?=$column?>" type="text" placeholder="DIGITE EL NOMBRE " >
          <?php
         endforeach;
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
  <?php
}
?>
