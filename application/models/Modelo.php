<?php

class Modelo extends CI_Model {
    function conectar($login, $clave) {        
        $this->db->select('
                            Usuario.ID,
                            Usuario.RUN,
                            Usuario.Estado,
                            Usuario.Nombre,
                            Usuario.Id_Perfil,
                            Perfil.Nombre as Perfil,
                            Usuario.imagen');
        $this->db->where('User', $login);
        $this->db->where('Pass', md5($clave));
        $this->db->from('Usuario');
        $this->db->join('Perfil','Perfil.ID = Usuario.Id_Perfil');
        return $this->db->get();
    }
    function cargarAccionMenu($id,$vista,$estado){
      
        if ($estado == "Deshabilitado") {
            $estado = "Deshabilitar";
        }else{
            $estado = "Habilitar";
        }
        $sql = "SELECT 
                    av.idAccion_Vista,
                    a.Nombre as accion,
                    a.Icono,
                    a.Estado as estadoAccion,
                    v.Nombre as vista,
                    v.Estado as estadoVista
                FROM Accion_Vista av
                INNER JOIN Accion a ON a.idAccion = av.idAccion
                INNER JOIN Vista v ON v.idVista = av.idVista 
                where a.Estado = 'Habilitado' 
                AND v.Nombre = '".$vista."'
                AND a.Nombre <> '".$estado."'"; 
        $query=$this->db->query($sql);
        $accionVista = $query->result_array();

        return $accionVista; 
       
        
    }


}

?>
