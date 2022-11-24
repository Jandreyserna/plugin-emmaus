<?php
class Modelo_colaborador
{
    public $wpdb;
    public $nombre_tabla;
    public $key_foreaneas = null;

    function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb; # dejamos el wpdb como global dentro de el archivo modelo.php
        $this->nombre_tabla = 'colaboradores';
    }
    
    #=== trae la informacion del ultimo id de proveedor====
    public function last_id()
    {
        $informacion = $this->wpdb->get_results(
            "SELECT `IdColaborador`
                FROM `colaboradores`
                ORDER BY `IdColaborador` DESC
                LIMIT 1
                ",
            'ARRAY_A'
        );
        return (isset($informacion[0])) ? $informacion : null;

    }


    /*
    insertar un nuevo proveedor
    */
    public function insert_colaborador($datas)
    {
        $this->wpdb->insert(
            $this->nombre_tabla,
            # TABLA
            $datas # DATOS
        );
    }

    /* 
    consultar todo de proveedores
    */
    function get_colaboradores()
    {
        $informacion = $this->wpdb->get_results(
            "SELECT `IdColaborador`,`Nombres`,`Apellidos`,`documento`,`telefono`,`direccion`,`correo`
            FROM `colaboradores`
            ORDER BY `IdColaborador`
          ",
            'ARRAY_A'
        );
        return (isset($informacion)) ? $informacion : null;
    }   	 	 	 	 	 	 	 	 	 	 	


}
?>