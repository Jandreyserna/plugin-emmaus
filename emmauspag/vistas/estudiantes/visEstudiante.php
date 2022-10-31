<?php
  use PhpOffice\PhpWord\Element\TextRun;

  if(!empty($_POST['activo'])){
    switch ($_POST['activo']) {
      case 'nuevo-estudiante': // accion activada por el boton de añadir un nuevo estudiante de la page estudiante
          unset($_POST['activo']);
          foreach($_POST as $campo => $valor) // convierto todas las minusculas a mayusculas
          {
            $_POST[$campo] = 	strtoupper($_POST[$campo]);
          }
          $_POST ['FechaSolicitud'] = date("Y-m-d");
          $ultimoId = ultimo_id();
          $ultimoId = $ultimoId + 1;
          $_POST['IdEstudiante'] = $ultimoId;
          insert_funtion('estudiantes', $_POST);
?>
          <div class="alert alert-success" role="alert">
              Se añadio un nuevo estudiante
          </div>
<?php
         break;

      case 'nuevo-curso': // accion activada por el boton de añadir un nuevo curso de la subpage estudiante
          unset($_POST['activo']);
          $datos['IdCursoRealizado'] =  $_POST['IdCursoRealizado'];
          $datos['IdEstudiante'] = $_POST['IdEstudiante'];
          unset($_POST['IdCursoRealizado']);
          unset($_POST['IdEstudiante']);
          for($i = 1; $i <= sizeof($_POST); $i++ )
          {
            $datos['IdMaterial'] = $_POST['curso'.$i]['IdMaterial'];
            $datos['Porcentaje'] = $_POST['curso'.$i]['Porcentaje'];
            if($datos['Porcentaje'] != 0)
            {
              $datos['Enviado'] = 1;
            }else {
              $datos['Enviado'] = 0;
            }
            $datos['FechaTerminacion'] = date("Y-m-d");
            insert_funtion('curso_realizados', $datos);
          }          
?>
          <div class="alert alert-success" role="alert">
              Se añadio un nuevo Curso
          </div>
<?php
          break;

      case 'Update-students': // accion activada por el boton de actualizar estudiante de la subpage estudiante
          unset($_POST['activo']);
          foreach($_POST as $campo => $valor) // convierto todas las minusculas a mayusculas
          {
            $_POST[$campo] = 	strtoupper($_POST[$campo]);
          }
          $id_student = $_POST['IdEstudiante'];
          unset($_POST['IdEstudiante']);
          update_funtion($_POST, $id_student);
?>
          <div class="alert alert-success" role="alert">
            Se actualizo la información del estudiante
          </div>
<?php
          break;

      case 'Actualizar-nota-unica': // accion activada por el boton de actualizar nota curso de la subpage estudiante
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
          <div class="alert alert-success" role="alert">
            Se actualizo la nota
          </div>
<?php
          break;

      case 'eliminar-curso': // accion activada por el boton de eliminar curso de la subpage estudiante
          unset($_POST['activo']);
          funtion_delete_course($_POST['IdCursoRealizado']);
?>
          <div class="alert alert-success" role="alert">
            se ha eliminado un curso de un estudiante
          </div>
<?php
         break;

      case 'insertar-diploma': // accion activada por el boton de añadir Diplomado de la subpage estudiante
          unset($_POST['activo']);
          $_POST['FechaTerminacion'] = date("Y-m-d");
          insert_funtion('diplomas', $_POST);
?>
          <div class="alert alert-success" role="alert">
            Se añadio un diplomado a un estudiante
          </div>
<?php
          break;

      case 'elecion-diploma': // accion activada por el boton de imprimir elección Diplomado de la subpage estudiante
            unset($_POST['activo']);
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
            if($_POST['IdNivel'] == 5){
              $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(dirname(dirname(dirname(__DIR__))) . '/plantillasword/Carta elección Diplomado - Programa Vida en Libertad.docx'); 
            }else if($_POST['IdNivel'] == 17){
              $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(dirname(dirname(dirname(__DIR__))) . '/plantillasword/Carta elección Diplomado - Programa Camino a Emmaus.docx');   
            }else {
              $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(dirname(dirname(dirname(__DIR__))) . '/plantillasword/Carta elección Diplomado - Programa Conoce tu Biblia.docx');
            }
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
            <div class="alert alert-success" role="alert">
              Documento descargado
            </div>
<?php
         break;
    }
  }
  $datas = Information_curse_student();
?>

<div class="post-menu contenedor-estudiantes">
  <div class="titulo text-center">
    <h1>Administración de Estudiantes</h1>
  </div>
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#añadirestudiante">
    Nuevo estudiante
  </button>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <table class=" table table-bordered  display nowrap" cellspacing="0" width="100%" id="tabla1">
          <thead>
            <tr>
              <th scope='col'>Id</th>
              <th scope='col'>Id de Promotor</th>
              <th scope='col'>Nombres</th>
              <th scope='col'>Apellidos</th>
              <th scope='col'>Dirección</th>
              <th scope='col'>Ciudad</th>
              <!-- <th scope='col'>Ultimo curso</th> -->
              <th></th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="contenedor.search"></div>
  
<?php
/* modal para registrar un nuevo estudiante */
require_once dirname(__DIR__).'/modales/modalRegistrarEstudiante.php';

/* require_once dirname(__DIR__).'/modales/modalCursoRealizado.php';
require_once dirname(__DIR__).'/modales/modalPlanEstudiosEstudiante.php';
require_once dirname(__DIR__).'/modales/modalRegistrarCursoEstudiante.php'; */
?>

