<?php
/*
Plugin Name: emmaus
Description: Este plugin sirve para gestionar una base de datos.
Version: 0.1
Author: Jandrey Steven Serna & José Mario VAlencia
License: private
*/

//cargando las dependencias de PhpWord para imprimir los certificados

if (!defined('ABSPATH')) {
	exit;
}
require_once 'phpWord/bootstrap.php';

// importando los modelos
require_once dirname(__FILE__) . '/emmauspag/modelos/Modelo-cursos.php';
require_once dirname(__FILE__) . '/emmauspag/modelos/Modelo-promotor.php';
require_once dirname(__FILE__) . '/emmauspag/modelos/Modelo-general.php';
require_once dirname(__FILE__) . '/emmauspag/modelos/Modelo-estudiantes.php';
require_once dirname(__FILE__) . '/emmauspag/modelos/Modelo-material.php';

// IMPORTANDO LAS FUNTIONS
require_once dirname(__FILE__) . '/emmauspag/funciones/functions.php';
require_once dirname(__FILE__) . '/emmauspag/funciones/functions_ajax.php';

class PrimaryClass  
{
    public function __construct()
    {
        add_action('init', [$this, 'init']);
        //register_activation_hook(__FILE__, [$this, 'activation']);
        //register_deactivation_hook(__FILE__, [$this, 'deactivation']);
    }


    public function init() : void
    {
        add_action('admin_menu', [$this, 'menu_pages']); 
    }

    public function menu_pages() : void
    {
        
        add_menu_page(
            'ESTUDIANTES',
            'ESTUDIANTES ',
            'estudiantes',
            'estudiante',
            [$this, 'estudent_admin' ],
            'dashicons-welcome-learn-more',
            4 
        );

        add_menu_page(
          'CURSOS',
          'CURSOS',
          'cursos',
          'curso',
          [$this, 'curso_admin'],
          'dashicons-id-alt',
          5
        );

        add_submenu_page(
            'curso',
            'Calificar',
            'Calificar',
            'administrator',
            'calificacion',
            [$this, 'See_Notes_course'],
            1 
        );

        add_submenu_page(
            'curso',
            'Rectificar',
            'Rectificar',
            'administrator',
            'perdidos',
            [$this, 'See_Lost_course'],
            2
        );

        add_menu_page(
            'MATERIALES',
            'MATERIALES',
            'administrator',
            'material',
            [$this, 'material_admin'],
            'dashicons-book-alt',
            4
        );

        add_menu_page(
            'Diplomas',
            'Diplomas',
            'administrator',
            'diploma',
            [$this, 'diploma_admin'],
            'dashicons-awards',
            4 
        );

        add_menu_page(
            'Emmaus',
            'Emmaus',
            'administrator',
            'emmaus',
            [$this, 'core_emmaus'],
            'dashicons-schedule',
            3
        );

        add_submenu_page(
          'emmaus',
          'Validaciones',
          'Validaciones',
          'administrator',
          'validación',
          [$this, 'validacion_admin'],
          4 
        );

        add_menu_page(
          'Imprimir',
          'Imprimir',
          'administrator',
          'impresiones',
          [$this, 'admin_print' ],
          'dashicons-schedule',
          3
        );
    }

    /**
     * funciones de menus y submenus
     *
     * @return Void
     **/
    
    public function admin_page()
    {
        echo "Aloha admin_page";
    }

    public function core_emmaus(){
      require_once dirname(__FILE__) . '/emmauspag/vistas/principal.php';
    }
    
    public function estudent_admin()
    {
      
      require_once dirname(__FILE__) . '/emmauspag/Controller/ControlEstudiantes.php';
      require_once dirname(__FILE__) . '/emmauspag/vistas/estudiantes/visEstudiante.php';
    }
    public function see_students_admin()
    {
      require_once dirname(__FILE__) . '/emmauspag/Controller/ControlOnlyEstudiante.php';
      require_once dirname(__FILE__) . '/emmauspag/vistas/estudiantes/estudiantes.php';
    }
    
    public function material_admin(){
      require_once dirname(__FILE__). '/emmauspag/vistas/cursos/cursos.php';
    }
    
    public function diploma_admin(){
      require_once dirname(__FILE__). '/emmauspag/vistas/diplomas.php';
    }
    
    public function validacion_admin(){
      require_once dirname(__FILE__). '/emmauspag/vistas/validacion.php';
    }
    
    public function curso_admin(){
      require_once dirname(__FILE__) . '/emmauspag/Controller/ControlCertificate.php';
      require_once dirname(__FILE__). '/emmauspag/vistas/cursos/certificado.php';
    }
    
    public function See_Notes_course(){
      require_once dirname(__FILE__) . '/emmauspag/Controller/ControlNotes.php';
      require_once dirname(__FILE__). '/emmauspag/vistas/cursos/notas.php';
    }
    
    public function See_Lost_course(){
      require_once dirname(__FILE__) . '/emmauspag/Controller/ControlNotes.php';
      require_once dirname(__FILE__). '/emmauspag/vistas/cursos/perdidos.php';
    }
    
    public function admin_print(){
      require_once dirname(__FILE__) . '/emmauspag/Controller/ControlNotes.php';
      require_once dirname(__FILE__). '/emmauspag/vistas/impresiones/imprimir.php';
    }



    /**
     * Activacion del plugin
     *
     * @return Void
     **/
    public function activation() : void
    {
        $option = get_option('aloha');
        if (!$option) {
            add_option('aloha', 'Aloha mundo');
        }
    }

    /**
    * Desactivacion del plugin
    *
    * @return Void
    **/
    /* function deactivation() : void
    {
        if ($option = get_option('aloha')) {
            delete_option('aloha');
        }
    }
    function shortcode_mostrar_autor($atts) {

        $p = shortcode_atts( array (
              'nombre' => 'Invitado'
              ), $atts );
              
        $texto = "<H1>".'Este artículo ha sido creado por '.$p['nombre']."</H1>";
        return $texto;
    } */
    
    /* function shortcodes_init(){
        add_shortcode( 'shortcode_name', 'shortcode_handler_function' );
       } */
}


new PrimaryClass;

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