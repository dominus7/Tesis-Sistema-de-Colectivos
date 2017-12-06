<?php
    /**
    * 
    */
class Modelovehiculo extends CI_Model{
//              Esta funcion se ocupa de traer de la db marca, modelo y version
    function traerPerfil(){               
        $sql = "select 
                idVehiculo,
                ano,
                patente, 
                cajaCambio,
                kmInicial,
                combustible,
                estado
                from vehiculo" ;  
                
        $query=$this->db->query($sql);
        $perfiles = $query->result_array();
        return $perfiles; 
    }
    function tabla(){
        $sql = "select 
                idVehiculo,
                ano,
                patente, 
                cajaCambio,
                kmInicial,
                combustible,
                estado
                from vehiculo";  
        $query=$this->db->query($sql);
        $perfiles = $query->result_array();

        return $perfiles; 
    }
}

?>