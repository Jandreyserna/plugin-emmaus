<?php

function control_notes_table(){
    $modelo = new Modelo_cursos();
    $table = $modelo->table_notes();
    return $table;
}

function update_course_note($datas,$id){
    $modelo = new Modelo_cursos();
    $table = $modelo->Courses_Update_state($id,$datas);
}