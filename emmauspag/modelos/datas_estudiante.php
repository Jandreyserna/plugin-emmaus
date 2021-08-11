<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/emmaus/wp-config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/emmaus/wp-load.php');
require_once dirname(__FILE__) . '\Modelo-estudiantes.php';
$modelo = new modelo_estudiantes();
$datos = $modelo->info_table_student();

echo json_encode($datos);
