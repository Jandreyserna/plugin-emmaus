<?php
    $url = plugins_url('/pluglin-emmaus/emmauspag/img/activos.png');
?>
<?php

// require_once dirname(dirname(dirname(__FILE__))) . '/Controller/ControlOnlyEstudiante.php';
// require_once dirname(dirname(dirname(__FILE__))) . '/modelos/Modelo-estudiantes.php';
  // $id = $_POST['id-estudiante'];
  // unset($_POST['id-estudiante']);

  // $principal =  Information_One_Student_First($id);
  // $secundario = Information_One_Student_Secund($id);
  // $info_estudiante = Information_One_Student($id);
  // $id_ultimo_curso =  Last_course_Of_Student_register($id);
  // $ultimo_curso = Last_course_Of_Student($id, $id_ultimo_curso['ultimo']);
  // $columnas_curso_realizados = Column_Course_Done();
  // $materiales = Materials();
  // $cursos_hechos = courses_done($id);
  // $cursos = Plan_Study();
  // $ultimo_id = Course_Last_Id();
  // $ultimo_id++;
  // $programas = all_programs();
  // $niveles = all_nevels();
  // $cursos_niveles = courses_and_nevels();
  // $diplomados = diplomados_courses();
  // $promotores = promotores();
  // $promotor_actual = promotor($info_estudiante[0]['IdContacto']);

?>

<div>

    <div class="principal">
        <div>
            <img class="main-image"
                src="https://instituto.emmauscolombia.com/wp-content/uploads/2021/07/Nuevo-Logo-Jun-2021-01.png"
                alt="Nuevo logo emmaus">
        </div>

        <div class="admin_contenedor">
            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#añadirestudiante">
                Administrar estudiante
            </button>
            <button type="button" class="btn btn-outline-success" data-toggle="" data-target="">
                Nuevo estudiante
            </button>
            <button type="button" class="btn btn-outline-success" data-toggle="" data-target="">
                Registrar nuevo curso
            </button>
            <button type="button" class="btn btn-outline-success" data-toggle="" data-target="">
                Registrar nuevo material
            </button>
            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#añadirProveedor">
                Registrar proveedor
            </button>
            <button type="button" class="btn btn-outline-success" data-toggle="" data-target="">
                Administrar representantes
            </button>
        </div>

    </div>



</div>