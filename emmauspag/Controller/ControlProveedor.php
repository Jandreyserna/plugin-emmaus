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
        return (isset($id[0]['IdProovedor'])) ? $informacion : null;
    }
    
    function insert_proveedor($datas){
        $this->modelo->insert_proveedor($datas);
    }
    
}

?>