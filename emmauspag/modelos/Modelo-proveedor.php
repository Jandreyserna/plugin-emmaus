<?php

class Modelo_proveedor
{
    public $wpdb;
    public $nombre_tabla;
    public $key_foreaneas = null;

    function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb; # dejamos el wpdb como global dentro de el archivo modelo.php
        $this->nombre_tabla = 'proveedores';
        #$this->get_key_foreaneas();
    }

    #=============================================================
    #===TRAER TODOS LOS NOMBRES Y EL ID DE PROVEEDOR===============
    #=============================================================

    public function traer_proveedor()
    {
        $informacion = $this->wpdb->get_results(
            "SELECT proveedores.`IdProovedor`, proveedores.`proovedor`, proveedores.`contacto`
          FROM `proveedores`
          GROUP BY proveedores.`IdProovedor`
          ORDER BY proveedores.`Nombre` 
          
          ",
            'ARRAY_A'
        );
        return (isset($informacion)) ? $informacion : null;

    }

    #=== trae la informacion de un solo proveedor segun su id====
    public function traer_un_proveedor($id)
    {
        $informacion = $this->wpdb->get_results(
            "SELECT proveedores.`proveedor`
                FROM `proveedores`
                WHERE proveedores.`IdProovedor` = $id
                ",
            'ARRAY_A'
        );
        return (isset($informacion[0])) ? $informacion : null;

    }

    #=== trae la informacion del ultimo id de proveedor====
    public function last_id()
    {
        $informacion = $this->wpdb->get_results(
            "SELECT proveedores.`IdProovedor`
                FROM `proveedores`
                ORDER BY proveedores.`IdProovedor` DESC
                LIMIT 1
                ",
            'ARRAY_A'
        );
        return (isset($informacion[0])) ? $informacion : null;

    }

    /*
    insertar un nuevo proveedor
    */
    public function insert_proveedor($datas)
    {
        $this->wpdb->insert(
            $this->nombre_tabla,
            # TABLA
            $datas # DATOS
        );
    }
    /* consultar todo de proveedores */
    function get_proveedores()
    {
        $informacion = $this->wpdb->get_results(
            "SELECT proveedores.`IdProovedor`, proveedores.`Nombrecorto`, proveedores.`proovedor`, proveedores.`contacto`, 
            proveedores.`direccion`, proveedores.`ciudad/pais`, proveedores.`telefono`, proveedores.`celularContacto`, proveedores.`correoContacto`, 
            proveedores.`NIT`, proveedores.`inscriptor`
          FROM `proveedores`
          GROUP BY proveedores.`IdProovedor`
          ORDER BY proveedores.`Nombre` 
          
          ",
            'ARRAY_A'
        );
        return (isset($informacion)) ? $informacion : null;
    }   	 	 	 	 	 	 	 	 	 	 	


}
?>