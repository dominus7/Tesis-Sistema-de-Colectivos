<?php
    /**
    * 
    */
class Modelotipopago extends CI_Model{

    function traerPerfil(){                  
        $sql = "select idTipoPago,monto,fechaCambioValor from tipoPago ";  
        $query=$this->db->query($sql);
        $perfiles = $query->result_array();
        return $perfiles; 
    }

   
    function tabla(){
        $sql = "select 
                    idTipoPago,
                    descripcion,
                    monto,
                    fechaCambioValor,
                    estado from tipoPago";  
        $query=$this->db->query($sql);
        $tipopagos = $query->result_array();

        return $tipopagos; 
    }
 
    function crear($Descripcion, $Monto, $Fecha,$Estado){            
        $this->db->select('*');
        $this->db->where('monto', $Monto);
        $this->db->where('fechaCambioValor',$Fecha);
        $cantidad = $this->db->get('tipoPago')->num_rows();
        if ($cantidad == 0) {
            $datos = array(
                
                "descripcion" => $Descripcion,
                "monto" => $Monto,
                "fechaCambioValor" => $Fecha,
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
                    descripcion,
                    monto,
                    fechaCambioValor,
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
                    
                    descripcion,
                    monto,
                    fechaCambioValor,
                    estado
                    
                from tipoPago where idTipoPago=".$id_contMenu;
        $query=$this->db->query($sql);
        $resultado = $query->result_array();

        return $resultado; 
    }

    function editar($id,$Descripcion, $Monto,$Fecha, $Estado){
        $sql = "select count(*) as valor from tipoPago where monto ='".$Monto."' AND fechaCambioValor = '".$Fecha."' AND idTipoPago <>".$id;          
        $query=$this->db->query($sql);
        $datos = $query->result_array();        
        $cantidad = $datos[0]['valor'];
        if ($cantidad ==0) {
            $datos = array(
                
                "descripcion" => $Descripcion,
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