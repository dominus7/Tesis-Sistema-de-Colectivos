<?php
    /**
    * 
    */
class Modelochofer extends CI_Model{
function traerPerfil(){               
        $sql = "select 
        c.idChofer,
        c.runC,
        c.nombreC, 
        c.apellidoPC, 
        c.apellidoMC, 
        c.direccionC, 
        c.telefonoC, 
        c.emailC,
        u.Nombre as Encargado,
        c.estadoC
         from Chofer c
        INNER JOIN Usuario u ON u.ID= c.fk_idUsuario";  
        $query=$this->db->query($sql);
        $perfiles = $query->result_array();
        return $perfiles; 
   
        
    }
    function tabla(){
        $sql = "select 
        c.idChofer,
        c.runC,
        c.nombreC, 
        c.apellidoPC, 
        c.apellidoMC, 
        c.direccionC, 
        c.telefonoC, 
        c.emailC,
        u.Nombre as Encargado,
        c.estadoC
         from Chofer c
        INNER JOIN Usuario u ON u.ID= c.fk_idUsuario";  
        $query=$this->db->query($sql);
        $chofer = $query->result_array();

        return $chofer; 
    }

     function Habilitar($id_contMenu){        
        $estado="Habilitado";
        $this->db->select('*'); 
        $this->db->where('idChofer', $id_contMenu);  
        $cantidad = $this->db->get('Chofer')->num_rows();
            if ($cantidad == 1) {
                $datos = array(
                    "estadoC" => $estado
                );
                $this->db->where('idChofer', $id_contMenu);
                $this->db->update('Chofer', $datos);  
                return 0;
            } else {
                return 1;
        }       
    }

    function Deshabilitar($id_contMenu){        
        $estado="Deshabilitado";
        $this->db->select('*'); 
        $this->db->where('ID', $id_contMenu);  
        $cantidad = $this->db->get('Chofer')->num_rows();
            if ($cantidad == 1) {
                $datos = array(
                    "estadoC" => $estado
                );
                $this->db->where('idChofer', $id_contMenu);
                $this->db->update('Chofer', $datos);  
                return 0;
            } else {
                return 1;
        }       
    }

    function filtrar($perfil,$estado){
        $sql = "select 
        c.idChofer,
        c.runC,
        c.nombreC, 
        c.apellidoPC, 
        c.apellidoMC, 
        c.direccionC, 
        c.telefonoC, 
        c.emailC,
        u.Nombre as Encargado,
        c.estadoC
         from Chofer c
        INNER JOIN Usuario u ON u.ID= c.fk_idUsuario
                WHERE 1=1 ";  
        
        if ($perfil != '0') {
            $sql .=" AND c.fk_idUsuario = '".$perfil."'";
        }

        if ($estado != '0') {
            
            $sql .=" AND c.estadoC = '".$estado."'";
        }
        
        $query=$this->db->query($sql);
        $usuarios = $query->result_array();

        return $usuarios; 
    }

     function crear($RUN, $Nombre,$ApellidoP,$ApellidoM, $Direccion,$Telefono, $Email, $Estado){            
        $this->db->select('*');
        $this->db->where('runC', $RUN);
        
        $cantidad = $this->db->get('chofer')->num_rows();
        if ($cantidad == 0) {
            $datos = array(
                "runC" => $RUN,
                "nombreC" => $Nombre,
                "apellidoPC" => $ApellidoP,
                "apellidoMC" => $ApellidoM,
                "direccionC" => $Direccion,
                "telefonoC" => $Telefono,
                "emailC" => $Email,
                "fk_idUsuario" => $Perfil,
                "estadoC" => $Estado,
                
            );

            $this->db->insert('chofer', $datos);            
            return 0;
        } else {
            return 1;
        }
    }
}

?>