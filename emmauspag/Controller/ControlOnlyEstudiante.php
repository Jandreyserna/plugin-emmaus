<?php

function Information_One_Student($id)
{
  $modelo_estudiantes                = new Modelo_estudiantes();
  $info_estudiante                  = $modelo_estudiantes->informacion_estudiante($id);

  // echo "<pre>";
  // print_r($info_estudiante  );
  // echo"</pre>";

  unset($info_estudiante[0]['IdEstudiante'] );

  return $info_estudiante ;
}

function Information_One_Student_First($id)
{
  $modelo_estudiantes                = new Modelo_estudiantes();
  $info_estudiante                  = $modelo_estudiantes->informacion_estudiante($id);
  $modelo_promotores                = new Modelo_promotor();
  $info_promotor                 = $modelo_promotores->traer_un_promotor($info_estudiante[0]['IdContacto']);

  $principal['Id']        = $info_estudiante[0]['IdEstudiante'];
  $principal['Promotor']  = $info_promotor[0]['Nombre'];
  $principal['Documento'] = $info_estudiante[0]['DocIdentidad'];
  $principal['Nombres']   = $info_estudiante[0]['Nombres'];
  $principal['Apellidos'] = $info_estudiante[0]['Apellidos'];
  $principal['IdPromotor'] = $info_estudiante[0]['IdContacto'];

  return $principal;

}


function Information_One_Student_Secund($id)
{
  $modelo_estudiantes                = new Modelo_estudiantes();
  $info_estudiante                  = $modelo_estudiantes->informacion_estudiante($id);

  $secundario['Fecha De Nacimiento'] = $info_estudiante[0]['FechaNacimiento'];
  $secundario['Ocupacion']        = $info_estudiante[0]['Ocupacion'];
  $secundario['Dirección']        = $info_estudiante[0]['DireccionCasa'];
  $secundario['Telefono']         = $info_estudiante[0]['Telefono'];
  $secundario['Celular']          = $info_estudiante[0]['Celular'];
  $secundario['Escolaridad']      = $info_estudiante[0]['Escolaridad'];
  $secundario['Correo']           = $info_estudiante[0]['CorreoElectronico'];
  $secundario['Ciudad']           = $info_estudiante[0]['Ciudad'];
  $secundario['Fecha de Solicitud'] = $info_estudiante[0]['FechaSolicitud'];
  $secundario['Iglesia']          = $info_estudiante[0]['Iglesia'];
  $secundario['Estado Civil']     = $info_estudiante[0]['EstadoCivil'];
  $secundario['Barrio']           = $info_estudiante[0]['Barrio'];
  $secundario['Comentario']       = $info_estudiante[0]['Info'];

  return $secundario;

}

/*
funcion para traer la informacion de el ultimo curso realizado por un estudiante 
*/
function Last_course_Of_Student($id, $id_curso)
{
  $modelo_cursos                    = new Modelo_cursos();
  $ultimo_curso                     = $modelo_cursos->last_course_student($id, $id_curso);

  return $ultimo_curso;
}

/*
funcion para traer el ID del ultimo curso hecho por un estudiante 
*/

function Last_course_Of_Student_register($id)
{
  $modelo_cursos                    = new Modelo_cursos();
  $ultimo_curso                     = $modelo_cursos->last_course_student_register($id);

  return $ultimo_curso[0];
}

function Column_Course_Done()
{
  $modelo_columnas_curso_realizados = new Modelo("curso_realizados");
  $columnas_curso_realizados        = $modelo_columnas_curso_realizados->columnas();

  unset($columnas_curso_realizados [4]);
  unset($columnas_curso_realizados [5]);
  unset($columnas_curso_realizados [0]);
  unset($columnas_curso_realizados [3]);

  return $columnas_curso_realizados ;

}

function courses_done($id)
{
  $modelo_cursos_hechos = new Modelo_cursos();
  $curso_realizados        = $modelo_cursos_hechos->courses_done_student($id);

  return $curso_realizados ;
}

function Plan_Study()
{
  $modelo_cursos= new Modelo_cursos();
  $cursos        = $modelo_cursos->courses_all_id();

  return $cursos ;
}

function Materials()
{
  $modelo_materiales = new Modelo_materiales();
  $materiales        = $modelo_materiales->Materials_and_title();

  return $materiales ;
}

function Course_Last_Id()
{
  $modelo_cursos= new Modelo_cursos();
  $Last_id   = $modelo_cursos->Last_Id_Course();
  return $Last_id[0]['IdMax'];
}

function all_programs()
{
  $modelo_cursos= new Modelo_cursos();
  $programs   = $modelo_cursos->programs();
  return $programs;
}

function all_nevels()
{
  $modelo_cursos= new Modelo_cursos();
  $nevels   = $modelo_cursos->nevels();
  return $nevels;
}

function courses_and_nevels()
{
  $modelo_cursos= new Modelo_cursos();
  $courses_nevels   = $modelo_cursos->courses_nevels();
  return $courses_nevels;
}

function diplomados_courses()
{
  $modelo_cursos= new Modelo_cursos();
  $diploms   = $modelo_cursos->diplomados();
  return $diploms ;
}

#########################################################################
###### Funcion que llama al modelo de cursos y extrae los promotores ####
#########################################################################

function promotores(){
  $modelo_cursos = new Modelo_cursos();
  $promotores = $modelo_cursos->traer_promotores();
  return $promotores;
}


#######################################################################################
###### Funcion que llama al modelo de cursos y extrae el promotor de un estudiante ####
#######################################################################################

function promotor($id){
  $modelo_cursos = new Modelo_cursos();
  $promotor = $modelo_cursos->traer_un_promotor($id);
  return $promotor;
}
