<?php
    /**
    * 
    */
class Modelochofer extends CI_Model{
    /**
        "select 
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
        **/
function traerPerfil(){               
        $sql = 
        "select 
        idChofer,
        Nombre,
        Apellidos,
        RUN, 
        Correo,
        Estado 
        from Chofer";

        $query=$this->db->query($sql);
        $perfiles = $query->result_array();
        return $perfiles; 
   
        
    }
    function tabla(){
        $sql = 
        "select 
        idChofer,
        Nombre,
        Apellidos,
        RUN, 
        Correo,
        Estado 
        from Chofer";
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
                    "Estado" => $estado
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
                    idChofer,
                    Nombre,
                    Apellidos,
                    RUN, 
                    Correo,
                    Estado 
                    from Chofer
                WHERE 1=1 ";  
        
        if ($perfil != '0') {
            $sql .=" AND idChofer = '".$perfil."'";
        }
        
        if ($estado != '0') {
            
            $sql .=" AND Estado = '".$estado."'";
        }
        
        $query=$this->db->query($sql);
        $resultado = $query->result_array();

        return $resultado; 
    }


    

     function crear($RUN, $Nombre,$Apellidos, $Correo, $Estado){            
        $this->db->select('*');
        $this->db->where('RUN', $RUN);
        
        $cantidad = $this->db->get('chofer')->num_rows();
        if ($cantidad == 0) {
            $datos = array(
                "RUN" => $RUN,
                "Nombre" => $Nombre,
                "Apellidos" => $Apellidos,
                "Correo" => $Correo,
                "Estado" => $Estado,
                
            );

            $this->db->insert('chofer', $datos);            
            return 0;
        } else {
            return 1;
        }
    }
}

?>