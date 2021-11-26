<?php

function control_notes_table(){
    $modelo = new Modelo_cursos();
    $table = $modelo->table_notes();
    return $table;
}

function update_course_note($datas,$id){
    $modelo = new Modelo_cursos();
    $modelo->Courses_Update_state($id,$datas);
}

/*
    FUNCION PARA TRAER TODOS LOS CURSOS CON NOTAS APROBADAS
*/

function courses_done_win()
{
    $modelo = new Modelo_cursos();
    $courses = $modelo->Courses_notes_wins();
    return $courses;
}