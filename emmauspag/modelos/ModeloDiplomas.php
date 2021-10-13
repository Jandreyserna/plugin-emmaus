<?php
class ModeloDiplomas
{
  public $wpdb;
  public $nombre_tabla;

  function __construct()
  {
      global $wpdb;
      $this->wpdb = $wpdb; # dejamos el wpdb como global dentro de el archivo modelo.php
      $this->nombre_tabla = 'diplomas';
  }

  /**
   * Undocumented function long description
   *
   * @param Type $id estudiante , $programa  programa terminado
   * @return void

   **/
  public function insert($id,$programa)
  {
      $args['IdEstudiante'] = $id;
      $args['IdPrograma'] = $programa;
    $this->wpdb->insert(
        $this->nombre_tabla, # TABLA
        $args # DATOS
      );
  }

  function info_table()
  {
    $this->wpdb->show_errors(false);
    $informacion = $this->wpdb->get_results(
          "SELECT `IdMaterial`,`TituloMaterial`
           FROM `materiales`
           GROUP BY `IdMaterial`
            ",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }
}