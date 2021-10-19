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
require_once dirname(__FILE__) . '/emmauspag/modelos/ModeloDiplomas.php';

// IMPORTANDO LAS FUNTIONS
require_once dirname(__FILE__) . '/emmauspag/funciones/functions.php';
require_once dirname(__FILE__) . '/emmauspag/funciones/functions_ajax.php';

class PrimaryClass  
{
    public function __construct()
    { 
        add_filter('login_redirect', [$this, 'admin_default_page']);
        add_action('init', [$this, 'init']);
        register_activation_hook(__FILE__, [$this, 'activation']);
        register_deactivation_hook(__FILE__, [$this, 'deactivation']);
    }

    public function admin_default_page() {
      return admin_url('/admin.php?page=emmaus');
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
            'calificaciones',
            'calificacion',
            [$this, 'See_Notes_course'],
            1 
        );

        add_submenu_page(
            'curso',
            'Rectificar',
            'Rectificar',
            'rectificados',
            'perdidos',
            [$this, 'See_Lost_course'],
            2
        );

        add_menu_page(
            'MATERIALES',
            'MATERIALES',
            'materiales',
            'material',
            [$this, 'material_admin'],
            'dashicons-book-alt',
            4
        );

        add_menu_page(
            'Diplomas',
            'Diplomas',
            'diplomas',
            'diploma',
            [$this, 'diploma_admin'],
            'dashicons-awards',
            4 
        );

        add_menu_page(
            'Emmaus',
            'Emmaus',
            'principal',
            'emmaus',
            [$this, 'core_emmaus'],
            'dashicons-schedule',
            3
        );

        add_submenu_page(
          'emmaus',
          'Validaciones',
          'Validaciones',
          'validaciones',
          'validación',
          [$this, 'validacion_admin'],
          4 
        );

        add_menu_page(
          'Imprimir',
          'Imprimir',
          'impresion',
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
      require_once dirname(__FILE__) . '/phpWord/bootstrap.php';
      require_once dirname(__FILE__) . '/emmauspag/Controller/ControlEstudiantes.php';
      require_once dirname(__FILE__) . '/emmauspag/vistas/estudiantes/visEstudiante.php';
    }
    public function see_students_admin()
    {
      require_once dirname(__FILE__) . '/emmauspag/Controller/ControlOnlyEstudiante.php';
      require_once dirname(__FILE__) . '/emmauspag/vistas/estudiantes/estudiantes.php';
    }
    
    public function material_admin()
    {
      require_once dirname(__FILE__). '/emmauspag/vistas/cursos/cursos.php';
    }
    
    public function diploma_admin()
    {
      if(!file_exists(ABSPATH.'diplomas'))
      {
        mkdir(ABSPATH.'diplomas', 0775);

      } 
      require_once dirname(__FILE__) . '/emmauspag/Controller/ControlDiplomas.php';
      require_once dirname(__FILE__). '/emmauspag/vistas/diplomas.php';
    }
    
    public function validacion_admin()
    {
      require_once dirname(__FILE__). '/emmauspag/vistas/validacion.php';
    }
    
    public function curso_admin()
    {
      require_once dirname(__FILE__) . '/emmauspag/Controller/ControlCertificate.php';
      require_once dirname(__FILE__). '/emmauspag/vistas/cursos/certificado.php';
    }
    
    public function See_Notes_course()
    {
      require_once dirname(__FILE__) . '/emmauspag/Controller/ControlNotes.php';
      require_once dirname(__FILE__). '/emmauspag/vistas/cursos/notas.php';
    }
    
    public function See_Lost_course()
    {
      require_once dirname(__FILE__) . '/emmauspag/Controller/ControlNotes.php';
      require_once dirname(__FILE__). '/emmauspag/vistas/cursos/perdidos.php';
    }
    
    public function admin_print()
    {
      if(!file_exists(ABSPATH.'certificados'))
      {
        mkdir(ABSPATH.'certificados', 0775);
        mkdir(ABSPATH.'perdidos', 0775);
        mkdir(ABSPATH.'diplomas', 0775);

      } 
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
        $option = get_role('adminEmmaus');

        echo "<pre>ADMIN EMAUS";
        print_r( $option );
        echo "</pre>";
        
        $role = get_role('administrator');
        if (empty($option))
        {
            $adminEmmaus = [ # CAPs
              'cursos' => 1,
              'diplomas' => 1,
              'principal' => 1,
              'estudiantes' => 1,
              'certificados' => 1,
              'emmaus' => 1,
              'validacione' => 1,
              'impresion'=>1,
              'calificaciones' => 1,       
              'materiales' => 1,
              'rectificados' => 1,
            ];
            add_role('adminEmmaus', 'Admin Emmaus', $adminEmmaus );
            foreach( $adminEmmaus as $cap => $value)
            {
              $role->add_cap($cap);
            }
        }
    }

    /**
    * Desactivacion del plugin
    *
    * @return Void
    **/
    function deactivation() : void
    {   
        remove_role('adminEmmaus');

    }
}


new PrimaryClass;
