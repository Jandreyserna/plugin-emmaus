<?php



//cargar el nombre de la pagina en la pestaña del navegador

function init_template(){

  add_theme_support('Post_thumbnails');
  add_theme_support('title-tag');
}

add_action('after_setup_theme','init_template');

//widgets para el footer

function sidebar(){
  register_sidebar(
    array(
      'name'=> 'pi de pagina',
      'id' => 'footer',
      'description' => 'zona de wigets para el pie de paginas',
      'before_title' => '<p>',
      'after_title' => '</p>',
      'before_widget' => '<div id="%1$s" class="%2$s"',
      'after_widget' => '</div>',
    )
  );
}

add_action('widgets_init', 'sidebar');



//echo get_stylesheet_uri();

#####################################################
###registro de los style para los css de la pagina###
#####################################################

function enqueue_styles() {

/*  wp_register_style('emmaus_style', plugins_url('plugin-emmaus/emmauspag/style.css'), array(), time());
 wp_enqueue_style('emmaus_style'); */
 wp_register_script('emmaus_datatable_scripts',plugins_url('plugin-emmaus/emmauspag/js/jquery.dataTables.min.js'), array(), time());
 wp_enqueue_script('emmaus_datatable_scripts');

 wp_register_style('emmaus_datatable', 'https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css', time());
 wp_enqueue_style('emmaus_datatable');

 wp_register_style('theme_style_2', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css', array(), time());
 wp_enqueue_style('theme_style_2');

 wp_register_script('jquery', plugins_url('plugin-emmaus/emmauspag/js/jquery-3.6.0.min.js'),false , time());
 wp_enqueue_script('jquery');

 wp_register_script('bootstraps', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js',array('jquery','theme_style_3'), time() );
 wp_enqueue_script('bootstraps');

 wp_register_script('theme_style_4', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', array(), time());
 wp_enqueue_script('theme_style_4');

 wp_register_script('theme_style_5', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array(), time());
 wp_enqueue_script('theme_style_5');

 wp_register_script ('modal_js', plugins_url('/plugin-emmaus/emmauspag/js/modales.js'), array(), time());
 wp_enqueue_script ('modal_js');

 wp_register_style('emmaus_style', plugins_url('plugin-emmaus/emmauspag/style.css'), array(), time());
 wp_enqueue_style('emmaus_style');

}
add_action('admin_enqueue_scripts', 'enqueue_styles');

# ==========================
# ========== MODALES JS ==========
# ==========================


// function modales_ajax() {
//   wp_enqueue_script ('modal_js', plugins_url('/plugin-emmaus/emmauspag/js/modales.js'), array('jquery'), time());
//   wp_localize_script('modal_js', 'ajax_var', array());
// }
// add_action('admin_enqueue_scripts', 'modales_ajax');

# ==========================
# ========== AJAX ==========
# ==========================


function boton_obtener_info_ajax() {
  wp_enqueue_script ('obtener_js', plugins_url('/plugin-emmaus/emmauspag/js/ajax.js'), array('jquery'), time());
  wp_localize_script('obtener_js', 'ajax_var', array(
    'url'    => admin_url('admin-ajax.php'),
    'nonce'  => wp_create_nonce('my-ajax-nonce'),
    'action' => 'event-list',
    'path'   =>  ABSPATH
    // 'path'   =>  str_replace('\\','/',ABSPATH)
  ));
}
add_action('admin_enqueue_scripts', 'boton_obtener_info_ajax');



# =================================================================================
# ========== boton que llama a la vista secundaria de estudiantes =================
# =================================================================================

add_action('wp_ajax_nopriv_event-vista-student', 'Call_view_students');
add_action('wp_ajax_event-vista-student', 'Call_view_students');


# ==========================================================
# ========== AJAX Buscador de Estduaiantes =================
# ==========================================================

add_action('wp_ajax_nopriv_event-search-student', 'table-student');
add_action('wp_ajax_event-search-student', 'table-student');



# ==============================================
# ========== AJAX BOTON DE Actualizar ==========
# ==============================================

 add_action('wp_ajax_nopriv_event_list2', 'form_update');
 add_action('wp_ajax_event_list2', 'form_update');

 # =========================================================
 # ========== AJAX BOTON DE CONOCER COSTO DE CURSO==========
 # =========================================================

 add_action('wp_ajax_nopriv_conocer-costo', 'costos_libros');
 add_action('wp_ajax_conocer-costo', 'costos_libros');

//funcion que retorna la url del servidor hasta la carpeta emmauspag

function urlemma($url){

  $url = $url.'wp-content/themes/emmauspag';
  return $url;

}


function insertar_base_datos($datos){
  $args = array();

  if ( isset($datos['boton']) && $datos['boton'] == 'ingreso' )
  {
    print_r($datos);
    $modelo_general = new modelo($datos['tabla']);
    $args['tabla'] = $datos['tabla'];
    unset($datos['tabla']);
    unset($datos['boton']);
    if ( $datos['selecionador'] == 1 )
    {
      unset($datos['selecionador']);
    }
    $args['datos'] = $datos;

    if ($args['datos']['Nombres'] != '') {
        $modelo_general->insertar_wpdb($args, $args['tabla']);
    }

  }
}

# ==========================================================
# ========== insertar con nombre de tabla y datos ==========
# ==========================================================

function insert_funtion($tabla,$datos){

  $modelo = new Modelo($tabla);
  $modelo->insertar_data_wpdb($datos);

}




# ===============================
# ========== shortCOde ==========
# ===============================
add_shortcode('vistas','cargar_vista');
function cargar_vista($atts){
  // validar que llegue la vista
  $vista = $atts['vista'];

  // VALIDAR QUE LA VISTA EXISTA
  ob_start();
  require_once dirname(__FILE__) . "\\vistas\\$vista.php";
  return ob_get_clean();
}
