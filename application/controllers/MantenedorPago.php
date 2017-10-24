<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MantenedorPago extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Modelopago');
    }
    
    function MantenedorPago() {                     
        $selectorPerfil = $this->Modelopago->traerPerfil();
        $datos['cantidadPerfil'] = count($selectorPerfil);
        $datos['datosPerfil'] = $selectorPerfil;
        $this->load->view('sys/Mantenedores/Pago/index', $datos);        
    }
    function cargarEditarUsuario() {       
        $id_contMenu = $this->input->post("id_contMenu");
        $data = $this->Modelopago->cargarEditarUsuario($id_contMenu);
                        
        $datos['cantidad'] = count($data);
        $datos['datos'] = $data;

        $selectorPerfil = $this->Modelopago->traerPerfil();  
        $datos['cantidadPerfil'] = count($selectorPerfil);
        $datos['datosPerfil'] = $selectorPerfil;
        $this->load->view('sys/Mantenedores/Pago/Editar', $datos);
    }
    function cargarCrearUsuario() {                                           
        $selectorPerfil = $this->Modelopago->traerPerfil();  
        $datos['cantidadPerfil'] = count($selectorPerfil);
        $datos['datosPerfil'] = $selectorPerfil;
        $this->load->view('sys/Mantenedores/Pago/Nuevo', $datos);
    }

    function crear() {        
        $Rut = $this->input->post("Rut");
        $Rut = strtoupper($Rut);
        $Nombre = $this->input->post("Nombre");
        $Nombre = strtoupper($Nombre);
        $Apellidos = $this->input->post("Apellidos");
        $Apellidos = strtoupper($Apellidos);
        $alias = $this->input->post("alias");
        
        $Perfil = $this->input->post("Perfil");
        $Estado = $this->input->post("Estado");        

        $valor = 1;
        if ($this->Modelopago->crear($Rut, $Nombre, $Apellidos,$Perfil, $Estado,$alias) == 0) {
            $valor = 0;
        }
        echo json_encode(array("valor" => $valor));
    }

    function tabla() {
        $data = $this->Modelopago->tabla();          
        $datos['cantidad'] = count($data);
        $datos['datos'] = $data;
        $this->load->view('sys/Mantenedores/Pago/TABLA/tabla', $datos);
    }
    function filtrar(){
        $perfil = $this->input->post('perfil');
        $estado = $this->input->post('estado');
        $data = $this->Modelopago->filtrar($perfil,$estado);
        $datos['cantidad'] = count($data);
        $datos['datos'] = $data;
        $this->load->view('sys/Mantenedores/Pago/TABLA/tabla', $datos);
    }

    function editar() {
        $id = $this->input->post("id");
        $Rut = $this->input->post("Rut");
        $Rut = strtoupper($Rut);
        $Nombre = $this->input->post("Nombre");
        $Nombre = strtoupper($Nombre);
        $Apellidos = $this->input->post("Apellidos");
        $Apellidos = strtoupper($Apellidos);
        
        $Perfil = $this->input->post("Perfil");
        $Estado = $this->input->post("Estado");        

        $valor = 1;
        if ($this->Modelopago->editar($id, $Rut, $Nombre, $Apellidos,$Perfil, $Estado) == 0) {
            $valor = 0;
        }
        echo json_encode(array("valor" => $valor));
    }

    function Habilitar() {
        $id_contMenu = $this->input->post("id_contMenu");           
        $valor = 1;     
        if ($this->Modelopago->Habilitar($id_contMenu)==0) {
            $valor = 0;
        }
        echo json_encode(array("valor" => $valor));
    }

    function Deshabilitar() {
        $id_contMenu = $this->input->post("id_contMenu");           
        $valor = 1;     
        if ($this->Modelopago->Deshabilitar($id_contMenu)==0) {
            $valor = 0;
        }
        echo json_encode(array("valor" => $valor));
    }

    

} 