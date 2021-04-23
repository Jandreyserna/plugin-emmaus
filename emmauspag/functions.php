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

echo plugins_url('/emmaus/emmauspag/style.css');


//echo get_stylesheet_uri();
// registro de los style para los css de la pagina


function enqueue_styles() {
 wp_register_style('emmaus_style', plugins_url('/emmaus/emmauspag/style.css'), array(), time());
 wp_enqueue_style('emmaus_style');

 wp_register_style('theme_style_2', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css', array(), time());
 wp_enqueue_style('theme_style_2');

 wp_register_script('theme_style_3', 'https://code.jquery.com/jquery-3.2.1.slim.min.js','', time());
 wp_enqueue_script('bootstraps','https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js',array('jquery','theme_style_3'), time() );

 wp_register_script('theme_style_4', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', array(), time());
 wp_enqueue_script('theme_style_4');

 wp_register_script('theme_style_5', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array(), time());
 wp_enqueue_script('theme_style_5');

 wp_register_script('theme_style_6', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), time());
 wp_enqueue_script('theme_style_6');
 // wp_register_script('theme_script', '<script src="https://unpkg.com/feather-icons"></script>', array(), time(),true);
 // wp_enqueue_script('theme_script');

}
add_action('admin_enqueue_scripts', 'enqueue_styles');

// aqui inicializo la funcionde ajax


# ==========================
# ========== AJAX ==========
# ==========================
function emmaus_ajax() {
  wp_enqueue_script ('emmaus_ajax_js', plugins_url('/emmaus/emmauspag/js/ajax.js'), array('jquery'), time());
  wp_localize_script('emmaus_ajax_js', 'ajax_var', array(
    'url'    => admin_url('admin-ajax.php'),
    'nonce'  => wp_create_nonce('my-ajax-nonce'),
    'action' => 'event-list'
  ));
}
add_action('admin_enqueue_scripts', 'emmaus_ajax');

add_action('wp_ajax_nopriv_event-list', 'buscador_por_nombre');
add_action('wp_ajax_event-list', 'buscador_por_nombre');

function buscador_por_nombre(){
    if (!empty($_POST['nombre'])){
        $nombre = $_POST['nombre'];
        echo "<pre>POST: ";
        print_r($_POST);
        echo "</pre>";

        // CONSULTA, SE TRAE LOS ESTUDIANTES QUE COMIENCEN CON $nombre --- SE WHERE LIKE
        // Y SE REEMPLAZA EL CONTENEDOR DE LA TABLA
    }


    wp_die();

  // if ( isset($Nombres) && $Nombres['boton'] == 'buscador-nombre' ){
  //   $modelo_general = new modelo($Nombres['Tabla']);
  //   $Nombres = explode(" ", $Nombres);
  //   $nombre = "";
  //   $apellido = "";
  //   if (sizeof($Nombres) > 2) {
  //
  //     $nombre[0] = $Nombres[0];
  //     $nombre[1] = $Nombres[1];
  //     $nombre = implode(' ', $nombre);
  //     print_r($nombre);
  //
  //     for ($i = 2; $i < sizeof($Nombres)  ; $i++) {
  //       $apellido[$i - 2] =  $Nombres[$i];
  //     }
  //     $apellido = implode(' ', $apellido);
  //     print_r($apellido);
  //
  //   }else if(sizeof($Nombres) > 0 && sizeof($Nombres) < 2){
  //       $nombre = $Nombres[0];
  //       $apellido =  $Nombres[1];
  //       print_r($nombre);
  //       print_r($apellido);
  //   }else if(  $nombre != ""){
  //     $info['Nombres'] = $nombre;
  //     $info['Apellidos'] = $apellido;
  //     print_r($info);
  //     $modelo_general->Buscador_personas($info);
  //   }
  // }

}
# ==========================
# ========== AJAX ==========
# ==========================



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
