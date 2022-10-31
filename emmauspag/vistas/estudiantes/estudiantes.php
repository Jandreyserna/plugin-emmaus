<?php
    require_once dirname(dirname(dirname(__FILE__))) . '/Controller/ControlOnlyEstudiante.php';
    require_once dirname(dirname(dirname(__FILE__))) . '/modelos/Modelo-estudiantes.php';
    $id = $_POST['id-estudiante'];
    unset($_POST['id-estudiante']);
    $principal =  Information_One_Student_First($id);
    $secundario = Information_One_Student_Secund($id);
    $info_estudiante = Information_One_Student($id);
    $id_ultimo_curso =  Last_course_Of_Student_register($id);
    $ultimo_curso = Last_course_Of_Student($id, $id_ultimo_curso['ultimo']);
    $columnas_curso_realizados = Column_Course_Done();
    $cursos = Plan_Study();
    $cursos_hechos = courses_done($id);
    $materiales = Materials();
    $ultimo_id = Course_Last_Id();
    $ultimo_id++;
    $programas = all_programs();
    $niveles = all_nevels();
    $cursos_niveles = courses_and_nevels();
    $diplomados = diplomados_courses();
    $promotores = promotores();
    $promotor_actual = promotor($info_estudiante[0]['IdContacto']);
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
        <?php
                    foreach ($principal as $campo=> $valor): 
        ?>
                    <li><?=$campo.  ':'." ".$valor?></li>
        <?php
                    endforeach;
        ?>
                </ul>
                <div id="ver_mas_estudiante" class="collapse">
                    <ul>
        <?php
                        foreach ($secundario as $campo1=> $valor1):
        ?>
                        <li><?=$campo1.  ':'." ".$valor1?></li>
        <?php
                        endforeach;
        ?>
                    </ul>
                </div>
            </div>
            <div class="col">
                <h3>Último curso realizado:</h3>
                <ul>
        <?php
                    foreach ($ultimo_curso[0] as $campo2=> $valor2): 
        ?>
                    <li><?=$campo2.  ':'." ".$valor2?></li>
                    <?php
                    endforeach;
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <a href="#ver_mas_estudiante" data-toggle="collapse" class="btn btn-info">Ver más...</a>
        <a href="" class="btn btn-outline-info"> Volver a vista anterior</a> 
    </div>

<?php

require_once dirname(__DIR__).'/modales/modalActualizarEstudiante.php';
require_once dirname(__DIR__).'/modales/modalCursoRealizado.php';
require_once dirname(__DIR__).'/modales/modalPlanEstudiosEstudiante.php';
require_once dirname(__DIR__).'/modales/modalRegistrarCursoEstudiante.php';