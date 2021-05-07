<?php
class Modelo_estudiantes
{
  public $wpdb;
  public $nombre_tabla;
  public $key_foreaneas = null;

  function __construct()
  {
      global $wpdb;
      $this->wpdb = $wpdb; # dejamos el wpdb como global dentro de el archivo modelo.php
      $this->nombre_tabla = 'estudiantes';
      #$this->get_key_foreaneas();
  }

  public function update_estudent($datos, $id){
    $this->wpdb->show_errors(false);
      $this->wpdb->update(
        $this->nombre_tabla, # TABLA
        $datos, # DATOS
        array('IdEstudiante' => $id)
      );
  }
}
