<?php
require_once dirname(dirname(__DIR__)) . '/modelos/ModeloDiplomas.php';
require dirname(dirname(dirname(dirname(dirname(dirname(__DIR__)))))) . '/wp-load.php';

$modelo = new ModeloDiplomas();
$datos = $modelo->info_table();

echo json_encode($datos);