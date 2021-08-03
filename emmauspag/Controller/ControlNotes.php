<?php

function control_notes_table(){
    $modelo = new Modelo_cursos();
    $table = $modelo->table_notes();
    return $table;
}