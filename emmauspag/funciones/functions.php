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

 wp_register_script('emmaus_datatable_scripts',plugins_url('plugin-emmaus/emmauspag/js/jquery.dataTables.min.js'), array(), time());
 wp_enqueue_script('emmaus_datatable_scripts');

 wp_register_style('emmaus_datatable', 'https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css', time());
 wp_enqueue_style('emmaus_datatable');

 wp_register_style('theme_style_2', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css', array(), time());
 wp_enqueue_style('theme_style_2');

 wp_register_script('jquery', plugins_url('plugin-emmaus/emmauspag/js/jquery-3.6.0.min.js'),false , time());
 wp_enqueue_script('jquery');

 wp_register_script('table-responsive-js', 'https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js' ,false , time());
 wp_enqueue_script('table-responsive-js');

 wp_register_script('theme_style_4', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', array(), time());
 wp_enqueue_script('theme_style_4');

 wp_register_script('theme_style_5', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array(), time());
 wp_enqueue_script('theme_style_5');

 wp_register_style('emmaus_style', plugins_url('plugin-emmaus/emmauspag/style.css'), array(), time());
 wp_enqueue_style('emmaus_style');

 wp_register_style('table-responsive-css', 'https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css', array(), time());
 wp_enqueue_style('table-responsive-css');

}
add_action('admin_enqueue_scripts', 'enqueue_styles');


# ==========================
# ========== AJAX ==========
# ==========================


function boton_obtener_info_ajax() {
  wp_enqueue_script ('obtener_js', plugins_url('/plugin-emmaus/emmauspag/js/ajax.js'), array('jquery'), time());
  wp_localize_script('obtener_js', 'ajax_var', array(
    'url'    => admin_url('admin-ajax.php'),
    'nonce'  => wp_create_nonce('my-ajax-nonce'),
    'action' => 'event-list',
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

# =================================================================================
# ========== boton que llama a la vista secundaria de estudiantes =================
# =================================================================================

add_action('wp_ajax_nopriv_event-list-tow-students', 'Call_two_view_students');
add_action('wp_ajax_event-list-tow-students', 'Call_two_view_students');

# =================================================================================
# ========== boton que llama a modal de registrar notas a un curso de estudiante ==
# =================================================================================

add_action('wp_ajax_nopriv_event-list-modal-notes', 'Call_modal_notes');
add_action('wp_ajax_event-list-modal-notes', 'Call_modal_notes');

# =========================================================================================
# ========== boton que llama a funcion que descarga el documento de imprimir certificado ==
# =========================================================================================

add_action('wp_ajax_nopriv_event-list-doc-imprimir', 'Call_print_certificate');
add_action('wp_ajax_event-list-doc-imprimir', 'Call_print_certificate');


# =========================================================================================
# ========== boton que llama a funcion que descarga el documento de imprimir Diploma  =====
# =========================================================================================

add_action('wp_ajax_nopriv_event-list-diploma-imprimir', 'Call_print_diploma');
add_action('wp_ajax_event-list-diploma-imprimir', 'Call_print_diploma');

# =========================================================================================
# ========== boton que llama a funcion que abre el modal de inventarios para el stock  =====
# =========================================================================================

add_action('wp_ajax_nopriv_event-list-inventario', 'Inventarios_modal');
add_action('wp_ajax_event-list-inventario', 'Inventarios_modal');

# =========================================================================================
# ========== boton que llama a funcion que abre el modal de inventarios para el Stock =====
# =========================================================================================

add_action('wp_ajax_nopriv_event-list-inventario-stock', 'Inventarios_modal_stock');
add_action('wp_ajax_event-list-inventario-stock', 'Inventarios_modal_stock');

# ===============================================================
# ========== boton que abre la vista de facturas de compras =====
# ===============================================================

add_action('wp_ajax_nopriv_event-list-factura-compras', 'vista_factura_compras');
add_action('wp_ajax_event-list-factura-compras', 'vista_factura_compras');

# ===============================================================
# ========== boton que abre la vista de facturas de ventas =====
# ===============================================================

add_action('wp_ajax_nopriv_event-list-factura-ventas', 'vista_factura_ventas');
add_action('wp_ajax_event-list-factura-ventas', 'vista_factura_ventas');

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

# ==========================================================
# ========== actualizar en la tabla de estudiantes datos ==========
# ==========================================================

function update_funtion($datos, $id){

  $modelo = new Modelo_estudiantes();
  $modelo->update_estudent($datos, $id);
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
