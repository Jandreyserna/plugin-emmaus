<?php
require_once dirname(dirname(__DIR__)) . '/modelos/Modelo-promotor.php';
require dirname(dirname(dirname(dirname(dirname(dirname(__DIR__)))))) . '/wp-load.php';

$modelo = new Modelo_promotor();
$datos = $modelo->get_promotores();

echo json_encode($datos);