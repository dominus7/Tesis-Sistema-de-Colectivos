<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MantenedorVehiculo extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Modelovehiculo');
    }
    
    function MantenedorVehiculo() {                     
        $selectorPerfil = $this->Modelovehiculo->traerPerfil();
        $datos['cantidadPerfil'] = count($selectorPerfil);
        $datos['datosPerfil'] = $selectorPerfil;
        $this->load->view('sys/Mantenedores/Vehiculo/index', $datos);        
    }
    function cargarEditarVehiculo() {       
        $id_contMenu = $this->input->post("id_contMenu");
        $data = $this->Modelovehiculo->cargarEditarVehiculo($id_contMenu);
                        
        $datos['cantidad'] = count($data);
        $datos['datos'] = $data;

        $selectorPerfil = $this->Modelovehiculo->traerPerfil();  
        $datos['cantidadPerfil'] = count($selectorPerfil);
        $datos['datosPerfil'] = $selectorPerfil;
        $this->load->view('sys/Mantenedores/Vehiculo/Editar', $datos);
    }
    function cargarCrearVehiculo() {                                           
        $selectorPerfil = $this->Modelovehiculo->traerPerfil();  
        $datos['cantidadPerfil'] = count($selectorPerfil);
        $datos['datosPerfil'] = $selectorPerfil;
        $this->load->view('sys/Mantenedores/Vehiculo/Nuevo', $datos);
    }

    function crear() {        
        $Patente = $this->input->post("patente");
        $Patente = strtoupper($Patente);
        $Ano = $this->input->post("ano");
        $Ano = strtoupper($Ano);
        $CajaCambio = $this->input->post("cajaCambio");
        $CajaCambio = strtoupper($CajaCambio);
        $KmInicial = $this->input->post("kmInicial");
        $KmInicial = strtoupper($KmInicial);
        $Combustible = $this->input->post("combustible");
        $Combustible = strtoupper($Combustible);
                
        $Estado = $this->input->post("estado");


        $valor = 1;
        if ($this->Modelovehiculo->crear($Patente, $Ano, $CajaCambio, $KmInicial,$Combustible, $Estado) == 0) {
            $valor = 0;
        }
        echo json_encode(array("valor" => $valor));
    }

    function tabla() {
        $data = $this->Modelovehiculo->tabla();          
        $datos['cantidad'] = count($data);
        $datos['datos'] = $data;
        $this->load->view('sys/Mantenedores/Vehiculo/TABLA/tabla', $datos);
    }
    function filtrar(){
        $perfil = $this->input->post('perfil');
        $estado = $this->input->post('estado');
        $data = $this->Modelovehiculo->filtrar($perfil,$estado);
        $datos['cantidad'] = count($data);
        $datos['datos'] = $data;
        $this->load->view('sys/Mantenedores/Vehiculo/TABLA/tabla', $datos);
    }

    function editar() {
        $id = $this->input->post("id");
        $Patente = $this->input->post("patente");
        $Patente = strtoupper($patente);
        $Ano = $this->input->post("ano");
        $Ano = strtoupper($Ano);
        $CajaCambio = $this->input->post("cajaCambio");
        $CajaCambio = strtoupper($CajaCambio);
        $KmInicial = $this->input->post("KmInicial");
        $KmInicial = strtoupper($KmInicial);
        $Combustible = $this->input->post("combustible");
        $Combustible = strtoupper($Combustible);
        
        
        $Estado = $this->input->post("estado");        

        $valor = 1;
        if ($this->Modelovehiculo->editar($id, $Patente, $Ano, $CajaCambios, $KmInicial,$Combustible , $Estado) == 0) {
            $valor = 0;
        }
        echo json_encode(array("valor" => $valor));
    }

    function Habilitar() {
        $id_contMenu = $this->input->post("id_contMenu");           
        $valor = 1;     
        if ($this->Modelovehiculo->Habilitar($id_contMenu)==0) {
            $valor = 0;
        }
        echo json_encode(array("valor" => $valor));
    }

    function Deshabilitar() {
        $id_contMenu = $this->input->post("id_contMenu");           
        $valor = 1;     
        if ($this->Modelovehiculo->Deshabilitar($id_contMenu)==0) {
            $valor = 0;
        }
        echo json_encode(array("valor" => $valor));
    }

    

} 