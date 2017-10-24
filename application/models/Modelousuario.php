<?php
    /**
    * 
    */
class Modelousuario extends CI_Model{

    function crear($RUN, $Nombre, $Apellidos,$Perfil, $Estado,$alias){            
        $this->db->select('*');
        $this->db->where('RUN', $RUN);
        $this->db->where('User',$alias);
        $cantidad = $this->db->get('Usuario')->num_rows();
        if ($cantidad == 0) {
            $datos = array(
                "RUN" => $RUN,
                "Nombre" => $Nombre,
                "Apellidos" => $Apellidos,
                "Id_Perfil" => $Perfil,
                "Estado" => $Estado,
                "User"=>$alias,
                "Pass"=>md5("nuevo")
            );

            $this->db->insert('Usuario', $datos);            
            return 0;
        } else {
            return 1;
        }
    }
    function tabla(){
        $sql = "select 
                    u.ID,
                    u.RUN,
                    u.Nombre,
                    u.Apellidos,
                    u.Estado,
                    p.Nombre AS Perfil
                from Usuario u
                INNER JOIN Perfil p ON p.ID = u.Id_Perfil";  
        $query=$this->db->query($sql);
        $usuarios = $query->result_array();

        return $usuarios; 
    }
 
    function cargarEditarUsuario($id_contMenu){                
        $sql = "select 
                    u.ID,
                    u.RUN,
                    u.Nombre,
                    u.Apellidos,
                    u.Estado,
                    u.Id_Perfil 
                from Usuario u where u.ID=".$id_contMenu;
        $query=$this->db->query($sql);
        $usuarios = $query->result_array();

        return $usuarios; 
    }
    function traerPerfil(){               
        $sql = "select ID,Nombre,Descripcion from Perfil ";  
        $query=$this->db->query($sql);
        $perfiles = $query->result_array();
        return $perfiles; 
    }
    function editar($id, $RUN, $Nombre, $Apellidos,$Perfil, $Estado){
        $sql = "select count(*) as valor from Usuario where RUN ='".$RUN."' AND Nombre = '".$Nombre."' AND ID <>".$id;          
        $query=$this->db->query($sql);
        $datos = $query->result_array();        
        $cantidad = $datos[0]['valor'];
        if ($cantidad ==0) {
            $datos = array(
                "RUN" => $RUN,
                "Nombre" => $Nombre,
                "Apellidos" => $Apellidos,
                "Id_Perfil" => $Perfil,
                "Estado" => $Estado
            );
            $this->db->where('ID', $id);
            $this->db->update('Usuario', $datos);   
            return 0;
        } else {
            return 1;
        }
    }
    function Habilitar($id_contMenu){        
        $estado="Habilitado";
        $this->db->select('*'); 
        $this->db->where('ID', $id_contMenu);  
        $cantidad = $this->db->get('Usuario')->num_rows();
            if ($cantidad == 1) {
                $datos = array(
                    "Estado" => $estado
                );
                $this->db->where('ID', $id_contMenu);
                $this->db->update('Usuario', $datos);  
                return 0;
            } else {
                return 1;
        }       
    }

    function Deshabilitar($id_contMenu){        
        $estado="Deshabilitado";
        $this->db->select('*'); 
        $this->db->where('ID', $id_contMenu);  
        $cantidad = $this->db->get('Usuario')->num_rows();
            if ($cantidad == 1) {
                $datos = array(
                    "Estado" => $estado
                );
                $this->db->where('ID', $id_contMenu);
                $this->db->update('Usuario', $datos);  
                return 0;
            } else {
                return 1;
        }       
    }

    function filtrar($perfil,$estado){
        $sql = "select 
                    u.ID,
                    u.RUN,
                    u.Nombre,
                    u.Apellidos,
                    u.Estado,                    
                    p.Nombre as Perfil 
                from Usuario u
                INNER JOIN Perfil p ON p.ID = u.Id_Perfil 
                WHERE 1=1 ";  
        
        if ($perfil != '0') {
            $sql .=" AND u.Id_Perfil = '".$perfil."'";
        }

        if ($estado != '0') {
            
            $sql .=" AND u.Estado = '".$estado."'";
        }
        
        $query=$this->db->query($sql);
        $usuarios = $query->result_array();

        return $usuarios; 
    }
    
}

?>