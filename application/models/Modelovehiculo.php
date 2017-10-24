<?php
    /**
    * 
    */
class Modelovehiculo extends CI_Model{
//              Esta funcion se ocupa de traer de la db marca, modelo y version
    function traerPerfil(){               
        $sql = "select 
                v.idVehiculo,
                m.nombre, 
                mo.nombremodelo AS modelo,  
                ver.tipomodelo AS version
                from vehiculo v  
                INNER JOIN marca m ON m.idMarca = v.fk_idMarca  
                INNER JOIN  modelo mo ON mo.idModelo = m.fk_idModelo 
                INNER JOIN versionModelo ver ON ver.idVersion = mo.fk_idVersion " ;  
                
        $query=$this->db->query($sql);
        $perfiles = $query->result_array();
        return $perfiles; 
    }
    function tabla(){
        $sql = "select ID,Nombre,Estado,Descripcion from Perfil";  
        $query=$this->db->query($sql);
        $perfiles = $query->result_array();

        return $perfiles; 
    }
}

?>