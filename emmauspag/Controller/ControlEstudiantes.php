<?php

function Update_date_Students($data, $id)
{
  $modelo_estudiantes = new Modelo_estudiantes();
  $modelo_estudiantes->Updata_born_date($data,$id);
}

function data_students()
{
  $modelo_estudiantes = new Modelo_estudiantes();
  $dates = $modelo_estudiantes->fechas_nacimiento();

  return $dates;

}

function Information_curse_student()
{
  $modelo_estudiantes = new Modelo_estudiantes();
  $datas = $modelo_estudiantes->cursos_realizados();

  return $datas;

}


function Colum_Students()
{
  $modelo_columnas_estudiantes      = new Modelo('estudiantes');
  $columnas_estudiantes             = $modelo_columnas_estudiantes->columnas();

  unset($columnas_estudiantes[0]);
  unset($columnas_estudiantes[1]);

  return $columnas_estudiantes;
}

function Information_Promotors()
{
  $modelo_promotor  = new Modelo_promotor();
  $promotores = $modelo_promotor->traer_promotor();

  return $promotores;
}
