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
    <div class="container p-5 bg-secondary" >
        <div class="row">

            <!-- Fist card -->
            <div class="col-md-4 mb-4 text-center">
                <!-- <div class="card h-100"> -->
                <p>
                    <button class="btn btn-lg btn-primary dropdown-toggle" type="button" data-toggle="collapse"
                        data-target="#collapseEstudiantes" aria-expanded="false" aria-controls="collapseEstudiantes">
                        Estudiantes
                    </button>
                </p>
                <div class="card-footer collapse" id="collapseEstudiantes">
                    <div class="card card-body">

                        <a href="?page=estudiante" class="btn btn-primary waves-effect waves-light" role="button" aria-disabled="true">Administrar Estudiantes</a>
                        <a href="?page=impresiones" class="btn btn-primary waves-effect waves-light"  role="button">Certificaciones</a>
                        <a href="?page=diploma" class="btn btn-primary waves-effect waves-light"  role="button">Diplomas</a>

                    </div>
                </div>
                <!-- </div> -->
            </div>

            <!-- Second card -->
            <div class="col-md-4 mb-4 text-center">
                <!-- <div class="card h-100"> -->
                <p>
                    <button class="btn btn-lg btn-secondary dropdown-toggle" type="button" data-toggle="collapse"
                        data-target="#collapseMateriales" aria-expanded="false" aria-controls="collapseMateriales">
                        Materiales
                    </button>
                </p>
                <div class="card-footer collapse" id="collapseMateriales">
                    <div class="card card-body">
                        <a href="?page=material" class="btn btn-secondary waves-effect waves-light" role="button" aria-disabled="true">Administrar materiales</a>
                        <a class="btn btn-secondary waves-effect waves-light" href="?page=curso"  role="button">Cursos</a>
                        <a class="btn btn-secondary waves-effect waves-light" href="?page=inventarios"  role="button">Inventario</a>
                    </div>
                </div>
                <!-- </div> -->
            </div>

            <!-- Third card -->
            <div class="col-md-4 mb-4 text-center">
                <!-- <div class="card h-100"> -->
                <p>
                    <button class="btn btn-lg dropdown-toggle btn-info" type="button" data-toggle="collapse"
                        data-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample3">
                        Administracion
                    </button>

                    <button type="button" class="btn btn-info dropdown-toggle px-3 waves-effect waves-light"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                        <div class="dropdown-menu">
                            <a class="dropdown-item btn">Ir a administración</a>
                            <!-- <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a> -->
                        </div>
                    </button>
                </p>
                <div class="card-footer collapse" id="collapseExample3">
                    <div class="card card-body">
                        <button type="button" class="btn btn-info waves-effect waves-light">Facturacion</button>
                        <button type="button" class="btn btn-info waves-effect waves-light">Cartera</button>
                        <button type="button" class="btn btn-info waves-effect waves-light">Usuarios administrativos</button>

                    </div>
                </div>
                <!-- </div> -->
            </div>

        </div>
    </div>

</section>