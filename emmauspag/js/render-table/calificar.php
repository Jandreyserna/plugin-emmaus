<?php
require_once dirname(dirname(__DIR__)). '/modelos/Modelo-cursos.php';
require dirname(dirname(dirname(dirname(dirname(dirname(__DIR__)))))) . '/wp-load.php';

$modelo = new Modelo_cursos();
$datos = $modelo->table_notes();

echo json_encode($datos);