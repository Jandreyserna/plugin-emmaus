<?php
/*
Plugin Name: emmaus
Description: Este plugin sirve para gestionar una base de datos.
Version: 0.1
Author: Jandrey Steven Serna
License: private
*/
require_once dirname(__FILE__) . '/emmauspag/modelopromotor.php';
require_once dirname(__FILE__) . '/emmauspag/modelogeneral.php';
require_once dirname(__FILE__) . '/emmauspag/modeloestudiantes.php';
require_once dirname(__FILE__) . '/emmauspag/functions.php';
require_once dirname(__FILE__) . '/emmauspag/functions_ajax.php';



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
  'ESTUDIANTES ',
  'administrator',
  'estudiante',
  'estudent_admin',
  1 );

  add_submenu_page(
  'emmaus',
  'Cursos',
  'Cursos',
  'administrator',
  'curso',
  'curso_admin',
  2 );

  add_submenu_page(
  'emmaus',
  'Diplomas',
  'Diplomas',
  'administrator',
  'diploma',
  'diploma_admin',
  3 );

  add_submenu_page(
  'emmaus',
  'Validaciones',
  'Validaciones',
  'administrator',
  'validación',
  'validacion_admin',
  4 );

  add_submenu_page(
  'emmaus',
  'Certificados',
  'Certificados',
  'administrator',
  'certificado',
  'certificado_admin',
  5 );

}



function core_emmaus(){
  require_once dirname(__FILE__) . '/emmauspag/vistas/principal.php';
}

function estudent_admin()
{
  $modelo_estudiantes = new modelo('estudiantes');
  $primary_Key = $modelo_estudiantes->primary_key();
  $llaves_foranes = $modelo_estudiantes->get_key_foreaneas();
  // echo "<pre>";
  // echo "hola";
  // print_r ($llaves_foranes);
  // echo "</pre>";
  $colum_name = $modelo_estudiantes->columnas_sin_llaves();

  require_once dirname(__FILE__) . '/emmauspag/vistas/visEstudiante.php';
}

function curso_admin(){
  require_once dirname(__FILE__). '/emmauspag/vistas/cursos.php';
}

function diploma_admin(){
  require_once dirname(__FILE__). '/emmauspag/vistas/diplomas.php';
}

function validacion_admin(){
  require_once dirname(__FILE__). '/emmauspag/vistas/validacion.php';
}

function certificado_admin(){
  require_once dirname(__FILE__). '/emmauspag/vistas/certificado.php';
}
