<?php  

class ControlProveedor
{
    public $wpdb;
    public $modelo;
    
    function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->modelo = new Modelo_proveedor(); 
    }
    
    
    function ultimo_id(){
    
        $modelo = new Modelo_proveedor();
        $id = $modelo-> last_id();
        return $id[0]['IdProovedor'];
    }
    
    function insert_proveedor($datas){
        $this->modelo->insert_proveedor($datas);
    }
    
}

?>