<?php
require_once dirname(dirname(__DIR__)) . '/modelos/Modelo-estudiantes.php';
require dirname(dirname(dirname(dirname(dirname(dirname(__DIR__)))))) . '/wp-load.php';

$modelo = new Modelo_estudiantes();
$datos = $modelo->info_table_student();

echo json_encode($datos);




