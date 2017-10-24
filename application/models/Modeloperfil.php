<?php
    /**
    * 
    */
class Modeloperfil extends CI_Model{

    function traerPerfil(){               
        $sql = "select ID,Nombre, Estado ,Descripcion from Perfil ";  
        $query=$this->db->query($sql);
        $perfiles2 = $query->result_array();
        return $perfiles2; 
    }
    function tabla(){
        $sql = "select ID,Nombre,Estado,Descripcion from Perfil";  
        $query=$this->db->query($sql);
        $perfiles = $query->result_array();

        return $perfiles; 
    }

 function crear($Nombre, $Descripcion, $Estado){            
        $this->db->select('*');
        $this->db->where('Nombre', $Nombre);
        $cantidad = $this->db->get('Perfil')->num_rows();
        if ($cantidad == 0) {
            $datos = array(
                "Nombre" => $Nombre,
                "Descripcion" => $Descripcion,
                "Estado" => $Estado
                
            );

            $this->db->insert('Perfil', $datos);            
            return 0;
        } else {
            return 1;
        }
    }

    function Habilitar($id_contMenu){        
        $estado="Habilitado";
        $this->db->select('*'); 
        $this->db->where('ID', $id_contMenu);  
        $cantidad = $this->db->get('Perfil')->num_rows();
            if ($cantidad == 1) {
                $datos = array(
                    "Estado" => $estado
                );
                $this->db->where('ID', $id_contMenu);
                $this->db->update('Perfil', $datos);  
                return 0;
            } else {
                return 1;
        }       
    }

    function Deshabilitar($id_contMenu){        
        $estado="Deshabilitado";
        $this->db->select('*'); 
        $this->db->where('ID', $id_contMenu);  
        $cantidad = $this->db->get('Perfil')->num_rows();
            if ($cantidad == 1) {
                $datos = array(
                    "Estado" => $estado
                );
                $this->db->where('ID', $id_contMenu);
                $this->db->update('Perfil', $datos);  
                return 0;
            } else {
                return 1;
        }       
    }

      function filtrar($perfil,$estado){
        $sql = "select 
                    ID,
                    Nombre,
                    Estado,                  
                    Descripcion
                from Perfil
                WHERE 1=1 ";  
        
        if ($perfil != '0') {
            $sql .=" AND ID = '".$perfil."'";
        }
        
        if ($estado != '0') {
            
            $sql .=" AND Estado = '".$estado."'";
        }
        
        $query=$this->db->query($sql);
        $resultado = $query->result_array();

        return $resultado; 
    }

    function cargarEditarPerfil($id_contMenu){                
        $sql = "select 
                    ID,
                    Nombre,
                    Estado,
                    Descripcion
                from Perfil  where ID=".$id_contMenu;
        $query=$this->db->query($sql);
        $resultado = $query->result_array();

        return $resultado; 
    }

     function editar($id,$Nombre, $Estado,$Descripcion){

        $sql = "select count(*) as valor from Perfil where  Nombre = '".$Nombre."' and ID <> ".$id."";    
        
        $query=$this->db->query($sql);
        $datos = $query->result_array();        
        $cantidad = $datos[0]['valor'];
        if ($cantidad ==0) {
            $datos = array(
                
                "Nombre" => $Nombre,
                "Estado" => $Estado,
                "Descripcion" => $Descripcion
                
                
            );
            $this->db->where('ID', $id);
            $this->db->update('Perfil', $datos);   
            return 0;
        } else {
            return 1;
        }
    }
}
?>