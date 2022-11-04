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
    </div>
</div>

<section>
    <div class="container-fluid">
        <div class="row">

            <!-- Fist card -->
            <div class="col-md-6 mb-4 text-center">
                <div class="card h-100">
                    <h4 class="card-header ">Inicio Estudiantes</h4>
                    <div class="card-body">
                        <p class="card-text">
                            Seccion con las acciones principales, el boton   <span style=" padding: 5px; background-color: green; color: white; "> Estudiantes </span>   
                            dirige a la administracion de estudiantes. <br> En la seccion del desplegable <span style=" padding: 5px; background-color: #004b7c; color: white; "> > </span> 
                            hay opciones para <strong> Imprimir certificados </strong>, tambien para <strong>Ver Diplomas</strong>
                        </p>
                    </div>
                    <div class="card-footer">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary waves-effect waves-light">Estudiantes</button>
                            <button type="button" class="btn btn-secondary dropdown-toggle px-3 waves-effect waves-light"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Imprimir certificado</a>
                                <a class="dropdown-item" href="#">Ver diplomas</a>
                                <!-- <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Second card  -->
            <div class="col-md-6 mb-4 text-center">
                <div class="card h-100">
                    <h4 class="card-header">Administracion</h4>
                    <div class="card-body">
                        <p class="card-text">
                            Pestaña de administracion, el boton   <span style=" padding: 5px; background-color: green; color: white; "> Facturacion </span>   
                            dirige a la seccion de facturas <br> En la seccion del desplegable <span style=" padding: 5px; background-color: #17a2b8; color: white; "> > </span> 
                            hay opciones para <strong> Imprimir certificados </strong>, tambien para <strong>Ver Diplomas</strong>
                        </p>
                    </div>
                    <div class="card-footer">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary waves-effect waves-light">Facturacion</button>
                            <button type="button" class="btn btn-info dropdown-toggle px-3 waves-effect waves-light"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Materiales</a>
                                <a class="dropdown-item" href="#">Proveedores</a>
                                <!-- <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>