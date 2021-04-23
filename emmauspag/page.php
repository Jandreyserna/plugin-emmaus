<?php
get_header();

require_once "modelo.php";
require_once 'envio.php';
require_once 'bakend.php';

$url = trim(site_url(),'/') ;
#print_r($url);
$urlServer = explode('/', ltrim($_SERVER['REQUEST_URI'], '/') );
// $url = $url.$urlServer ;
// $url =  trim($url,'/');
// $url = explode('/',$url);

$id_post = get_the_ID();

$post = get_post($id_post);

// echo "<pre>";
// print_r( $post );
// echo "</pre>";


 $content = $post->post_content;
 $content = apply_filters('the_content', $content);
 echo $content;



// if ( array_search('estudiantes', $url) )
if ( 'estudiantes' == $urlServer[0] )
{
  require_once "vistas/visEstudiante.php";
}
// else if (array_search('usuarios', $url))
// {
//   require_once "vistas/usuarios.php";
// }else if (array_search('cursos', $url))
// {
//   require_once "vistas/cursos.php";
// }else if (array_search('factura', $url))
// {
//   require_once "vistas/facturas.php";
// }else if (array_search('caja', $url))
// {
//   require_once "vistas/caja.php";
// }else if (array_search('inventario', $url))
// {
//   require_once "vistas/inventario.php";
// }else if (array_search('imprimir', $url))
// {
//   require_once "vistas/imprimir.php";
// }else if (array_search('certificado', $url))
// {
//   require_once "vistas/certificado.php";
// }else if (array_search('diplomas', $url))
// {
//   require_once "vistas/diplomas.php";
// }else if (array_search('validar', $url))
// {
//   require_once "vistas/validacion.php";
// }else if (array_search('proveedores', $url))
// {
//   require_once "vistas/proveedores.php";
// }
else{
  require_once "vistas/principal.php";
}

get_footer();
