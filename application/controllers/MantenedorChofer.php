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
        $RUN = $this->input->post("RUN");
        $RUN = strtoupper($RUN);
        $Nombre = $this->input->post("Nombre");
        $Nombre = strtoupper($Nombre);
        $Apellidos = $this->input->post("Apellidos");
        $Apellidos = strtoupper($Apellidos);
        $Correo = $this->input->post("Correo");
        $Correo = strtoupper($Correo);
        $Estado = $this->input->post("Estado");        

        

        $valor = 1;
        if ($this->Modelochofer->crear($RUN, $Nombre, $Apellidos, $Correo, $Estado) == 0) {
            $valor = 0;
        }
        echo json_encode(array("valor" => $valor));
    }

}