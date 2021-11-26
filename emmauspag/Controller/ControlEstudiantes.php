<?php

function Information_curse_student()
{
  $modelo_estudiantes = new Modelo_estudiantes();
  $datas = $modelo_estudiantes->info_table_student();
  // $data=$datas->fetchAll(PDO::FETCH_ASSOC);
  // print json_encode($datas, JSON_UNESCAPED_UNICODE);
  // echo json_encode($datas);
  // return $datas;

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

function update_course($datas,$id){
  $modelo = new Modelo_cursos();
  $modelo->Courses_Update_state($id,$datas);
}

function funtion_delete_course($id){
  $modelo = new Modelo_cursos();
  $modelo->delete_course_register($id);
}
