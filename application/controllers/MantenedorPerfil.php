<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MantenedorPerfil extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Modeloperfil');
    }
        
    function MantenedorPerfil() {                     
        $selectorPerfil = $this->Modeloperfil->traerPerfil();
        $datos['datosPerfil'] = $selectorPerfil;
        $datosTabla = $this->Modeloperfil->tabla();
        $datos['cantidad'] = count($datosTabla);
        $datos['datos']= $datosTabla;
        $this->load->view('sys/Mantenedores/Perfil/index', $datos);
    }
function cargarPerfil() {                                           
        
        $this->load->view('sys/Mantenedores/Perfil/Nuevo');
    } 

    function cargarCrearPerfil() {
        $selectorPerfil = $this->Modeloperfil->traerPerfil();  
        $datos['cantidadPerfil'] = count($selectorPerfil);
        $datos['datosPerfil'] = $selectorPerfil;
        $this->load->view('sys/Mantenedores/Perfil/Nuevo', $datos);  

        
    }

function crear() {        
        
        $Nombre = $this->input->post("Nombre");
        $Nombre = strtoupper($Nombre);
        $Descripcion = $this->input->post("Descripcion");
        $Descripcion = strtoupper($Descripcion);
                
        $Estado = $this->input->post("Estado");        

        $valor = 1;
        if ($this->Modeloperfil->crear( $Nombre, $Descripcion,$Estado) == 0) {
            $valor = 0;
        }
        echo json_encode(array("valor" => $valor));
    }    

    function Habilitar() {
        $id_contMenu = $this->input->post("id_contMenu");           
        $valor = 1;     
        if ($this->Modeloperfil->Habilitar($id_contMenu)==0) {
            $valor = 0;
        }
        echo json_encode(array("valor" => $valor));
    }

    function Deshabilitar() {
        $id_contMenu = $this->input->post("id_contMenu");           
        $valor = 1;     
        if ($this->Modeloperfil->Deshabilitar($id_contMenu)==0) {
            $valor = 0;
        }
        echo json_encode(array("valor" => $valor));
    }

     function filtrar(){
        $perfil = $this->input->post('perfil');
        $estado = $this->input->post('estado');
        $data = $this->Modeloperfil->filtrar($perfil,$estado);
        $datos['cantidad'] = count($data);
        $datos['datos'] = $data;
        $this->load->view('sys/Mantenedores/Perfil/TABLA/tabla', $datos);
    }

    function cargarEditarPerfil() {       
        $id_contMenu = $this->input->post("id_contMenu");
        $data = $this->Modeloperfil->cargarEditarPerfil($id_contMenu);
                        
        $datos['cantidad'] = count($data);
        $datos['datos'] = $data;

        $selectorPerfil = $this->Modeloperfil->traerPerfil();  
        $datos['cantidadPerfil'] = count($selectorPerfil);
        $datos['datosPerfil'] = $selectorPerfil;
        $this->load->view('sys/Mantenedores/Perfil/Editar', $datos);
    }
    
    function editar() {

        $id = $this->input->post("id");
       
        $Nombre = $this->input->post("Nombre");
        
        $Estado = $this->input->post("Estado");        
        $Descripcion = $this->input->post("Descripcion");
        $Descripcion = strtoupper($Descripcion);
        $valor = 1;
        if ($this->Modeloperfil->editar($id,$Nombre, $Estado,$Descripcion) == 0) {
            $valor = 0;
        }
        echo json_encode(array("valor" => $valor));
    }
}