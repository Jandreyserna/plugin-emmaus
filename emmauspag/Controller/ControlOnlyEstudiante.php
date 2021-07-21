<?php

function Information_One_Student($id)
{
  $modelo_estudiantes                = new Modelo_estudiantes();
  $info_estudiante                  = $modelo_estudiantes->informacion_estudiante($id);

  // echo "<pre>";
  // print_r($info_estudiante  );
  // echo"</pre>";

  unset($info_estudiante[0]['IdEstudiante'] );
  unset($info_estudiante[0]['IdContacto'] );

  return $info_estudiante ;
}

function Information_One_Student_First($id)
{
  $modelo_estudiantes                = new Modelo_estudiantes();
  $info_estudiante                  = $modelo_estudiantes->informacion_estudiante($id);

  $principal['Id']        = $info_estudiante[0]['IdEstudiante'];
  $principal['Promotor']  = $info_estudiante[0]['IdContacto'];
  $principal['Documento'] = $info_estudiante[0]['DocIdentidad'];
  $principal['Nombres']   = $info_estudiante[0]['Nombres'];
  $principal['Apellidos'] = $info_estudiante[0]['Apellidos'];

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
  $secundario['Ciudad']           = $info_estudiante[0]['FechaSolicitud'];
  $secundario['Iglesia']          = $info_estudiante[0]['Iglesia'];
  $secundario['Estado Civil']     = $info_estudiante[0]['EstadoCivil'];
  $secundario['Barrio']           = $info_estudiante[0]['Barrio'];
  $secundario['Comentario']       = $info_estudiante[0]['Info'];

  return $secundario;

}

function Last_course_Of_Student($id)
{
  $modelo_cursos                    = new Modelo_cursos();
  $ultimo_curso                     = $modelo_cursos->last_course_student($id);

  return $ultimo_curso;
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

function Materials()
{
  $modelo_materiales = new Modelo_materiales();
  $materiales        = $modelo_materiales->Materials_and_title();

  return $materiales ;
}
