<?php

use PhpOffice\PhpWord\Element\TextRun;

if(!empty($_POST['activo']))
{
  switch ($_POST['activo']) 
  {

    case 'nuevo-curso':
        unset($_POST['activo']);
        if($_POST['Porcentaje'] != 0)
          {
            $_POST['Enviado'] = 1;
          }else {
            $_POST['Enviado'] = 0;
          }
        $_POST['FechaTerminacion'] = date("Y-m-d");
        insert_funtion('curso_realizados', $_POST);
?>
        <script>
          alert(" Se registro un nuevo curso ");
        </script>
<?php
        break;

    case 'Update-students':
        unset($_POST['activo']);
        $id_student = $_POST['IdEstudiante'];
        unset($_POST['IdEstudiante']);
        update_funtion($_POST, $id_student);
?>
        <script>
          alert(" Se actualizo un estudiante ");
        </script>
<?php
        break;

    case 'Actualizar-nota-unica':
        unset($_POST['activo']);
        if($_POST['Porcentaje'] != 0)
            {
              $_POST['Enviado'] = 1;
            }else {
              $_POST['Enviado'] = 0;
            }
        $id = $_POST['IdCursoRealizado'];
        unset($_POST['IdCursoRealizado']);
        $_POST['FechaTerminacion'] = date("Y-m-d");
        update_course($_POST,$id);
?>
        <script>
          alert(" Se actualizo la nota ");
        </script>
<?php
        break;

    case 'eliminar-curso':
        unset($_POST['activo']);
        funtion_delete_course($_POST['IdCursoRealizado']);
?>
        <script>
          alert(" Se elimino un curso de un estudiante ");
        </script>
<?php
        break;

    case 'insertar-diploma':
        unset($_POST['activo']);
        $_POST['FechaTerminacion'] = date("Y-m-d");
        insert_funtion('diplomas', $_POST);
?>
        <script>
          alert(" diplomado registrado ");
        </script>
<?php
        break;

    case 'elecion-diploma': // accion activada por el boton de imprimir elección Diplomado de la subpage estudiante
          $fuente = [
            "name" => "Arial",
            "size" => 11,
            "bold" => false,
          ];
          $fuente2 = [
            "name" => "arial",
            "size" => 11,
            "bold" => true,
          ];
          $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(dirname(dirname(dirname(__DIR__))) . '/plantillasword/Carta elección Diplomado.docx');
          $archivo = $_POST['Nombre'].' '.'eleccionDiplomado'.'.docx';
          $url = ABSPATH  .'/diplomas/'.$archivo;
          $nom = new TextRun();
          $nom->addText($_POST['Nombre'],$fuente2);
          $fecha = new TextRun();
          $fecha->addText(date("F-j-Y"),$fuente);
          $ciudad = new TextRun();
          $ciudad->addText($_POST['Ciudad'],$fuente);
          $templateProcessor->setComplexBlock('nombre', $nom);
          $templateProcessor->setComplexBlock('fecha', $fecha);
          $templateProcessor->setComplexBlock('ciudad', $ciudad);
          $templateProcessor->saveAs($url);
          $envio = site_url('diplomas/'.$archivo);
?>
          <script>
            window.open(
            '<?=$envio?>',
            '_blank'
            );
          </script>
<?php
        break;
  }
}

?>

<div class="container-course">

  <div class="titulo text-center">
    <h1>ADMINISTRACION DE CURSOS</h1>
  </div>
  <div id="boton-calificar">
  <a href="<?= dirname($_SERVER['HTTP_REFERER'])?>/admin.php?page=calificacion"><button type="button" class="btn btn-outline-success">
    Registrar Notas
  </button></a>
  <a href="<?= dirname($_SERVER['HTTP_REFERER'])?>/admin.php?page=perdidos"><button type="button" class="btn btn-outline-success">
    Rectificar Notas
  </button></a>
  </div>
  <div class="container-table">
    <div class="row">
      <div class="col-lg-12">
        <table class="table table-bordered  display nowrap" id="courses-table">
          <thead>
            <tr>
              <th scope="col">IdCursoHecho</th>
              <th scope="col">Nombre Estudiante</th>
              <th scope="col">Apellido Estudiante</th>
              <th scope="col">Material</th>
              <th scope="col">Puntaje</th>
              <th scope="col">Fecha</th>
              <th>acción</th>
              <!-- <th scope="col">Calificador</th> -->


            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>