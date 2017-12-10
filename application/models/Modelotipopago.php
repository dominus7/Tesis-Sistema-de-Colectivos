<?php
    /**
    * 
    */
class Modelotipopago extends CI_Model{

    function traerPerfil(){                  
        $sql = "select idTipoPago,nombre,monto,fecha, estado from tipoPago ";  
        $query=$this->db->query($sql);
        $perfiles = $query->result_array();
        return $perfiles; 
    }

   
    function tabla(){
        $sql = "select 
                    idTipoPago,
                    nombre,
                    monto,
                    fecha,
                    estado from tipoPago";  
        $query=$this->db->query($sql);
        $tipopagos = $query->result_array();

        return $tipopagos; 
    }
 
    function crear($Descripcion, $Monto, $Fecha,$Estado){            
        $this->db->select('*');
        $this->db->where('monto', $Monto);
        $this->db->where('fecha',$Fecha);
        $cantidad = $this->db->get('tipoPago')->num_rows();
        if ($cantidad == 0) {
            $datos = array(
                
                "nombre" => $Descripcion,
                "monto" => $Monto,
                "fecha" => $Fecha,
                "estado" => $Estado,
                
                
            );

            $this->db->insert('tipoPago', $datos);            
            return 0;
        } else {
            return 1;
        }
    }

    function filtrar($perfil,$estado){
        $sql = "select 
                    idTipoPago,
                    nombre,
                    monto,
                    fecha,
                    estado
                from tipoPago
                WHERE 1=1 ";  
        
        if ($perfil != '0') {
            $sql .=" AND idTipoPago = '".$perfil."'";
        }
        
        if ($estado != '0') {
            
            $sql .=" AND estado = '".$estado."'";
        }
        
        $query=$this->db->query($sql);
        $resultado = $query->result_array();

        return $resultado; 
    }

     function cargarEditarTipoPago($id_contMenu){                
        $sql = "select 
                    
                    nombre,
                    monto,
                    fecha,
                    estado
                    
                from tipoPago where idTipoPago=".$id_contMenu;
        $query=$this->db->query($sql);
        $resultado = $query->result_array();

        return $resultado; 
    }

    function editar($id,$Descripcion, $Monto,$Fecha, $Estado){
        $sql = "select count(*) as valor from tipoPago where monto ='".$Monto."' AND fecha = '".$Fecha."' AND idTipoPago <>".$id;          
        $query=$this->db->query($sql);
        $datos = $query->result_array();        
        $cantidad = $datos[0]['valor'];
        if ($cantidad ==0) {
            $datos = array(
                
                "nombre" => $Descripcion,
                "monto" => $Monto,
                "fecha" => $Fecha,
                "estado" => $Estado
            );
            $this->db->where('idTipoPago', $id);
            $this->db->update('tipoPago', $datos);   
            return 0;
        } else {
            return 1;
        }
    }
    

    function Habilitar($id_contMenu){        
        $estado="Habilitado";
        $this->db->select('*'); 
        $this->db->where('idTipoPago', $id_contMenu);  
        $cantidad = $this->db->get('tipoPago')->num_rows();
            if ($cantidad == 1) {
                $datos = array(
                    "estado" => $estado
                );
                $this->db->where('idTipoPago', $id_contMenu);
                $this->db->update('tipoPago', $datos);  
                return 0;
            } else {
                return 1;
        }       
    }

    function Deshabilitar($id_contMenu){        
        $estado="Deshabilitado";
        $this->db->select('*'); 
        $this->db->where('idTipoPago', $id_contMenu);  
        $cantidad = $this->db->get('tipoPago')->num_rows();
            if ($cantidad == 1) {
                $datos = array(
                    "estado" => $estado
                );
                $this->db->where('idTipoPago', $id_contMenu);
                $this->db->update('tipoPago', $datos);  
                return 0;
            } else {
                return 1;
        }       
    }

}

?>