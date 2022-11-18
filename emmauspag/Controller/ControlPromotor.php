<?php

class ControlPromotor
{
  public $wpdb;
  public $modelo;

  function __construct()
  {
      global $wpdb;
      $this->wpdb = $wpdb;
      $this->modelo = new Modelo_promotor(); 
  }

  function Information_iglesias()
  {
    $modelo_iglesias = $this->modelo;
    $datas = $modelo_iglesias->traer_iglesias();
    return $datas;
  }
  
  function ultimo_id(){
  
    $modelo = new Modelo_promotor();
    $id = $modelo-> last_id();
    return $id[0]['IdContacto'];
  }

  function insert_promotor($datas){
    $this->modelo->insert_promotor($datas);
  }

}

