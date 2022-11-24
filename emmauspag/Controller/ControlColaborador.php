<?php

class ControlColaborador
{
  public $wpdb;
  public $modelo;

  function __construct()
  {
      global $wpdb;
      $this->wpdb = $wpdb;
      $this->modelo = new Modelo_colaborador(); 
  }

  /* llama al modelo que trae el ultimo id tabla colaboradores */
  function ultimo_id()
  {
    $id = $this->modelo-> last_id();
    return (isset($id[0]['IdColaborador'])) ? $informacion : null;
  }

  /* 
  llama al modelo de insertar colaboradores
   */
  function insert_colaborador($datas)
  {
    $this->modelo->insert_colaborador($datas);
  }

}