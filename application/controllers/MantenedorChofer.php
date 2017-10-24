<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MantenedorChofer extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Modelochofer');
    }
    function MantenedorChofer() {                     
        $selectorPerfil = $this->Modelochofer->traerPerfil();
        $datos['cantidadPerfil'] = count($selectorPerfil);
        $datos['datosPerfil'] = $selectorPerfil;
        $this->load->view('sys/Mantenedores/Chofer/index', $datos); 
}
 function tabla() {
        $data = $this->Modelochofer->tabla();          
        $datos['cantidad'] = count($data);
        $datos['datos'] = $data;
        $this->load->view('sys/Mantenedores/Chofer/TABLA/tabla', $datos);
    }

    function filtrar(){
        $perfil = $this->input->post('perfil');
        $estado = $this->input->post('estado');
        $data = $this->Modelochofer->filtrar($perfil,$estado);
        $datos['cantidad'] = count($data);
        $datos['datos'] = $data;
        $this->load->view('sys/Mantenedores/Chofer/TABLA/tabla', $datos);
    }
    function cargarCrearChofer() {                                           
        $selectorPerfil = $this->Modelochofer->traerPerfil();  
        $datos['cantidadPerfil'] = count($selectorPerfil);
        $datos['datosPerfil'] = $selectorPerfil;
        $this->load->view('sys/Mantenedores/Chofer/Nuevo', $datos);
}
function crear() {        
        $Rut = $this->input->post("runC");
        $Rut = strtoupper($Rut);
        $Nombre = $this->input->post("nombreC");
        $Nombre = strtoupper($Nombre);
        $ApellidoP = $this->input->post("apellidoP");
        $ApellidoP = strtoupper($ApellidoP);
        $ApellidoM = $this->input->post("apellidoM");
        $ApellidoM = strtoupper($ApellidoM);
        $Direccion = $this->input->post("direccion");
        $Direccion = strtoupper($Direccion);
        $Telefono = $this->input->post("telefono");
        $Telefono = strtoupper($Telefono);
        $Email = $this->input->post("Email");
        $Email = strtoupper($Email);
        $Perfil = $this->input->post("Perfil");
        $Estado = $this->input->post("Estado");        

        

        $valor = 1;
        if ($this->Modelochofer->crear($Rut, $Nombre, $ApellidoP, $ApellidoM, $Direccion,$Telefono, $Email,$Perfil, $Estado) == 0) {
            $valor = 0;
        }
        echo json_encode(array("valor" => $valor));
    }

}