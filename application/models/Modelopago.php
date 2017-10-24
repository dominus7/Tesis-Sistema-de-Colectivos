<?php
    /**
    * 
    */
class Modelopago extends CI_Model{

    function crear($Monto, $ObsC,$Perfil, $Fecha, $TipoPago, $Estado){
        $this->db->select('*');
        $this->db->where('montoC', $Monto);
        $this->db->where('fk_idChofer',$Perfil);
        $cantidad = $this->db->get('Pago')->num_rows();
        if ($cantidad == 0) {
            $datos = array(
                "montoC" => $Monto,
                "obsC" => $ObsC,
                "fk_idChofer" => $Perfil,
                "fecha" => $Fecha,
                "fk_tipoPago" => $TipoPago,
                "Estado" => $Estado,
                
            );

            $this->db->insert('pagoChofer', $datos);            
            return 0;
        } else {
            return 1;
        }
    }
    //*******************************************ARREGLAR PROBLEMA DE CONSULTA***********************************************
    function tabla(){
        $sql = "select 
                    p.idPagoChofer,
                    p.montoC,
                    p.obsC,
                    c.nombreC as Nombre,
                    p.fecha,
                    t.monto as Valor,
                    p.estado
                    
                from pagoChofer p
                INNER JOIN chofer c ON c.idChofer = p.fk_idChofer  
                INNER JOIN tipoPago t ON t.idTipoPago = p.fk_tipoPago";  

                
        $query=$this->db->query($sql);
        $resultado = $query->result_array();

        return $resultado; 
    }
 
    function cargarEditarPago($id_contMenu){                
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
        $sql = "select idPagoChofer,montoC,obsC from pagoChofer ";  
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