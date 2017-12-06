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
    function cargarPerfil() {                                           
        
        $this->load->view('sys/Mantenedores/Vehiculo/Nuevo');
    }

     





    function cargarEditarVehiculo() {       
        $id_contMenu = $this->input->post("id_contMenu");
        $data = $this->Modelousuario->cargarEditarVehiculo($id_contMenu);
                        
        $datos['cantidad'] = count($data);
        $datos['datos'] = $data;

        $selectorPerfil = $this->Modelousuario->traerPerfil();  
        $datos['cantidadPerfil'] = count($selectorPerfil);
        $datos['datosPerfil'] = $selectorPerfil;
        $this->load->view('sys/Mantenedores/Vehiculo/Editar', $datos);
    } 
}