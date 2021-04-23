<?php
/*
Plugin Name: emmaus
Description: Este plugin sirve para gestionar una base de datos.
Version: 0.1
Author: Jandrey Steven Serna
License: private
*/
require_once dirname(__FILE__) . '\\emmauspag/modelo.php';
require_once dirname(__FILE__) . '\emmauspag/functions.php';

echo plugins_url();

add_action('init', 'fkm_init', 0);
function fkm_init() {
  add_action('admin_menu', 'fkm_admin_menu');

}

function fkm_admin_menu(){
  add_menu_page(
    'Emmaus',
    'Emmaus',
    'administrator',
    'emmaus',
    'core_emmaus',
    'dashicons-schedule',
    3
  );

  add_submenu_page(
  'emmaus',
  'ESTUDIANTES',
  'ESTUDIANTE ',
  'administrator',
  'estudiante',
  'estudent_admin',
  1 );

}



function core_emmaus(){
  echo "aloha";
  require_once dirname(__FILE__) . '\\emmauspag/vistas/principal.php';
}

function estudent_admin()
{
  $modelo_estudiantes = new modelo('estudiantes');
  $primary_Key = $modelo_estudiantes->primary_key();
  $llaves_foranes = $modelo_estudiantes->get_key_foreaneas();
  $colum_name = $modelo_estudiantes->columnas_sin_llaves();

  // echo "<pre>";
  // print_r($modelo_estudiantes);
  // echo "</pre>";



  require_once dirname(__FILE__) . '\\emmauspag/vistas/visEstudiante.php';
}
