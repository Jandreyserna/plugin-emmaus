<?php
/*
Plugin Name: emmaus
Description: Este plugin sirve para gestionar una base de datos.
Version: 0.1
Author: Jandrey Steven Serna & José Mario VAlencia
License: private
*/


// importando los modelos
require_once dirname(__FILE__) . '/emmauspag/modelos/Modelo-cursos.php';
require_once dirname(__FILE__) . '/emmauspag/modelos/Modelo-promotor.php';
require_once dirname(__FILE__) . '/emmauspag/modelos/Modelo-general.php';
require_once dirname(__FILE__) . '/emmauspag/modelos/Modelo-estudiantes.php';
require_once dirname(__FILE__) . '/emmauspag/modelos/Modelo-material.php';

// IMPORTANDO LAS FUNTIONS
require_once dirname(__FILE__) . '/emmauspag/funciones/functions.php';
require_once dirname(__FILE__) . '/emmauspag/funciones/functions_ajax.php';













// ROLES Y CAPACIBILITIES



//$adminEmmaus = [ # CAPs
//  'cursos' => 1,
//  'diplomas' => 1,
//  'principal' => 1,
//  'estudiantes' => 1,
//  'certificados' => 1,
//  'validaciones' => 1,
//];

//$promotor = [ # CAPs
//  'cursos' => 1,
//  'diplomas' => 1,
//  'estudiantes' => 1
//];

//$colaborador = [ # CAPs
//  'cursos' => 1,
//  'diplomas' => 1,
//  'estudiantes' => 1,
//  'validaciones' => 1,
//];


// SE AGREGAN LO ROLES
//addRole('adminEmmaus', 'Admin Emmaus', $adminEmmaus);
//addRole('promotorEmmaus', 'Promotor', $promotor);
//addRole('colaboradorEmmaus', 'Colaborador', $colaborador);

// SE LE AGREGAN LAS CAPS AL ADMIN

//$adminCaps = array_merge($adminEmmaus, $promotor, $colaborador);
//$role = get_role('administrator');
//foreach ($adminCaps as $cap => $value) {
//  $role->add_cap($cap);
//}


 //remove_role('adminEmmaus');
 //remove_role('promotorEmmaus');
 //remove_role('colaboradorEmmaus');

// TODO: MOVER PARA OTRO LADO
function addRole($role, $display_name, $capabilities)
{
  add_role($role, $display_name, $capabilities);
}




add_action('init', 'fkm_init', 0);
function fkm_init() {
  add_action('admin_menu', 'fkm_admin_menu');
}

add_action('init', 'student_init', 0);
function student_init() {
  add_action('admin_menu', 'student_admin_menu');

}

add_action('init', 'curse_init', 0);
function curse_init() {
  add_action('admin_menu', 'curse_admin_menu');
}

add_action('init', 'diplomes_init', 0);
function diplomes_init() {
  add_action('admin_menu', 'diplomes_admin_menu');
}

add_action('init', 'certificates_init', 0);
function certificates_init() {
  add_action('admin_menu', 'certificate_admin_menu');
}

add_action('init', 'print_init', 0);
function print_init() {
  add_action('admin_menu', 'Emmaus_admin_print');
}

function student_admin_menu(){
  add_menu_page(
    'ESTUDIANTES',
    'ESTUDIANTES ',
    'estudiantes',
    'estudiante',
    'estudent_admin',
    'dashicons-welcome-learn-more',
    4 );

}

function certificate_admin_menu(){
  add_menu_page(
  'CURSOS',
  'CURSOS',
  'cursos',
  'curso',
  'curso_admin',
  'dashicons-id-alt',
  5 );

  add_submenu_page(
    'curso',
    'Calificar',
    'Calificar',
    'administrator',
    'calificacion',
    'See_Notes_course',
    1 );

    add_submenu_page(
      'curso',
      'Rectificar',
      'Rectificar',
      'administrator',
      'perdidos',
      'See_Lost_course',
      2 );
}


function curse_admin_menu(){
  add_menu_page(
    'MATERIALES',
    'MATERIALES',
    'administrator',
    'material',
    'material_admin',
    'dashicons-book-alt',
    4 );
}

function diplomes_admin_menu(){
  add_menu_page(
    'Diplomas',
    'Diplomas',
    'administrator',
    'diploma',
    'diploma_admin',
    'dashicons-awards
    ',
    4 );
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
  'Validaciones',
  'Validaciones',
  'administrator',
  'validación',
  'validacion_admin',
  4 );


}

function Emmaus_admin_print(){
  add_menu_page(
    'Imprimir',
    'Imprimir',
    'administrator',
    'impresiones',
    'admin_print',
    'dashicons-schedule',
    3
  );
}



function core_emmaus(){
  require_once dirname(__FILE__) . '/emmauspag/vistas/principal.php';
}

function estudent_admin()
{
  
  require_once dirname(__FILE__) . '/emmauspag/Controller/ControlEstudiantes.php';
  require_once dirname(__FILE__) . '/emmauspag/vistas/estudiantes/visEstudiante.php';
}
function see_students_admin()
{
  require_once dirname(__FILE__) . '/emmauspag/Controller/ControlOnlyEstudiante.php';
  require_once dirname(__FILE__) . '/emmauspag/vistas/estudiantes/estudiantes.php';
}

function material_admin(){
  require_once dirname(__FILE__). '/emmauspag/vistas/cursos/cursos.php';
}

function diploma_admin(){
  require_once dirname(__FILE__). '/emmauspag/vistas/diplomas.php';
}

function validacion_admin(){
  require_once dirname(__FILE__). '/emmauspag/vistas/validacion.php';
}

function curso_admin(){
  require_once dirname(__FILE__) . '/emmauspag/Controller/ControlCertificate.php';
  require_once dirname(__FILE__). '/emmauspag/vistas/cursos/certificado.php';
}

function See_Notes_course(){
  require_once dirname(__FILE__) . '/emmauspag/Controller/ControlNotes.php';
  require_once dirname(__FILE__). '/emmauspag/vistas/cursos/notas.php';
}

function See_Lost_course(){
  require_once dirname(__FILE__) . '/emmauspag/Controller/ControlNotes.php';
  require_once dirname(__FILE__). '/emmauspag/vistas/cursos/perdidos.php';
}

function admin_print(){
  require_once dirname(__FILE__) . '/emmauspag/Controller/ControlNotes.php';
  require_once dirname(__FILE__). '/emmauspag/vistas/impresiones/imprimir.php';
}