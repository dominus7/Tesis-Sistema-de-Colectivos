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
        $datos['datosPerfil'] = $selectorPerfil;
        $datosTabla = $this->Modelovehiculo->tabla();
        $datos['cantidad'] = count($datosTabla);
        $datos['datos']= $datosTabla;
        $this->load->view('sys/Mantenedores/Vehiculo/index', $datos);
} 
}