<?php
require_once dirname(__DIR__).'/modelos/Modelo-facturas.php';

class ControlVentas
{
  public $wpdb;
  public $modelo;

  function __construct()
  {
      global $wpdb;
      $this->wpdb = $wpdb;
      $this->modelo = new Modelo_facturas(); 
  }

  /* Materiales */
    function materiales_venta(){
        $modelo = new Modelo_facturas();
        $materiales = $modelo->information_materiales();
        return $materiales;
    }

}

