<?php
    /**
    * 
    */
class Modelovehiculo extends CI_Model{

    function crear($Patente, $Ano, $CajaCambio, $KmInicial,$Combustible, $Estado){            
        $this->db->select('*');
        $this->db->where('patente', $Patente);
        
        $cantidad = $this->db->get('Vehiculo')->num_rows();
        if ($cantidad == 0) {
            $datos = array(
                "patente" => $Patente,
                "ano" => $Ano,
                "cajaCambio" => $CajaCambio,
                "kmInicial" => $KmInicial,
                "combustible" => $Combustible,
                "estado" => $Estado,
                
            );

            $this->db->insert('Vehiculo', $datos);            
            return 0;
        } else {
            return 1;
        }
    }
    function tabla(){
        $sql = "select idVehiculo, ano, patente, cajaCambio, kmInicial, combustible, estado from vehiculo" ;
        $query=$this->db->query($sql);
        $vehiculos = $query->result_array();

        return $vehiculos; 
    }
 
    function cargarEditarUsuario($id_contMenu){                
        $sql = "select idVehiculo, ano, patente, cajaCambio, kmInicial, combustible, estado from vehiculo where idVehiculo=".$id_contMenu;
        $query=$this->db->query($sql);
        $usuarios = $query->result_array();

        return $usuarios; 
    }
    function traerPerfil(){               
        $sql = "select idVehiculo, ano, patente, cajaCambio, kmInicial, combustible, estado from vehiculo" ;
        $query=$this->db->query($sql);
        $perfiles = $query->result_array();
        return $perfiles; 
    }
    //ARREGLANDO EDTIAR, FALTA TERMINAR
    function editar($id,$Patente, $Ano, $CajaCambio, $KmInicial,$Combustible, $Estado){
        $sql = "select count(*) as valor from Vehiculo where idVehiculo ='".$Patente."' AND ID <>".$id;          
        $query=$this->db->query($sql);
        $datos = $query->result_array();        
        $cantidad = $datos[0]['valor'];
        if ($cantidad ==0) {
            $datos = array(
                "patente" => $Patente,
                "ano" => $Ano,
                "cajaCambio" => $CajaCambio,
                "kmInicial" => $KmInicial,
                "combustible" => $Combustible,
                "estado" => $Estado
            );
            $this->db->where('idVehiculo', $id);
            $this->db->update('Vehiculo', $datos);   
            return 0;
        } else {
            return 1;
        }
    }
    function Habilitar($id_contMenu){        
        $estado="Habilitado";
        $this->db->select('*'); 
        $this->db->where('idVehiculo', $id_contMenu);  
        $cantidad = $this->db->get('Vehiculo')->num_rows();
            if ($cantidad == 1) {
                $datos = array(
                    "estado" => $estado
                );
                $this->db->where('idVehiculo', $id_contMenu);
                $this->db->update('Vehiculo', $datos);  
                return 0;
            } else {
                return 1;
        }       
    }

    function Deshabilitar($id_contMenu){        
        $estado="Deshabilitado";
        $this->db->select('*'); 
        $this->db->where('idVehiculo', $id_contMenu);  
        $cantidad = $this->db->get('Vehiculo')->num_rows();
            if ($cantidad == 1) {
                $datos = array(
                    "estado" => $estado
                );
                $this->db->where('idVehiculo', $id_contMenu);
                $this->db->update('Vehiculo', $datos);  
                return 0;
            } else {
                return 1;
        }       
    }

    function filtrar($perfil,$estado){
        $sql = "select idVehiculo, ano, patente, cajaCambio, kmInicial, combustible, estado from vehiculo where 1=1" ; 
        
        if ($perfil != '0') {
            $sql .=" AND idVehiculo = '".$perfil."'";
        }

        if ($estado != '0') {
            
            $sql .=" AND estado = '".$estado."'";
        }
        
        $query=$this->db->query($sql);
        $usuarios = $query->result_array();

        return $usuarios; 
    }
    
}

?>