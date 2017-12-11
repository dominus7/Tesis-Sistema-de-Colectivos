<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MantenedorTipoPago extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Modelotipopago');
    }
    
   function MantenedorTipoPago() {                     
        $selectorPerfil = $this->Modelotipopago->traerPerfil();
        $datos['datosPerfil'] = $selectorPerfil;
        $datosTabla = $this->Modelotipopago->tabla();
        $datos['cantidad'] = count($datosTabla);
        $datos['datos']= $datosTabla;
        $this->load->view('sys/Mantenedores/TipoPago/index', $datos);
    }
    function cargarEditarTipoPago() {       
        $id_contMenu = $this->input->post("id_contMenu");
        $data = $this->Modelotipopago->cargarEditarTipoPago($id_contMenu);
                        
        $datos['cantidad'] = count($data);
        $datos['datos'] = $data;

        
        $this->load->view('sys/Mantenedores/TipoPago/Editar', $datos);
    }
    function cargarCrearTipoPago() {           
        $this->load->view('sys/Mantenedores/TipoPago/Nuevo');
    }

    function crear() {        
       
        $Descripcion = $this->input->post("nombre");
        $Monto = $this->input->post("Monto");
        $Fecha = $this->input->post("Fecha");
        $Estado = $this->input->post("Estado");        
        $valor = 1;
        if ($this->Modelotipopago->crear($Descripcion, $Monto, $Fecha, $Estado) == 0) {
            $valor = 0;
        }
        echo json_encode(array("valor" => $valor));
    }

    function tabla() {
        $data = $this->Modelotipopago->tabla();          
        $datos['cantidad'] = count($data);
        $datos['datos'] = $data;
        $this->load->view('sys/Mantenedores/TipoPago/TABLA/tabla', $datos);
    }
    function filtrar(){
        $perfil = $this->input->post('perfil');
        $estado = $this->input->post('estado');
        $data = $this->Modelotipopago->filtrar($perfil,$estado);
        $datos['cantidad'] = count($data);
        $datos['datos'] = $data;
        $this->load->view('sys/Mantenedores/TipoPago/TABLA/tabla', $datos);
    }

    function editar() {
        $id = $this->input->post("id");
        
        $Descripcion = $this->input->post("nombre");
        
        $Monto = $this->input->post("Monto");
        
        
        $Fecha = $this->input->post("Fecha");
        $Estado = $this->input->post("Estado");        

        $valor = 1;
        if ($this->Modelotipopago->editar($id, $Descripcion, $Monto, $Fecha, $Estado) == 0) {
            $valor = 0;
        }
        echo json_encode(array("valor" => $valor));
    }

    function Habilitar() {
        $id_contMenu = $this->input->post("id_contMenu");           
        $valor = 1;     
        if ($this->Modelotipopago->Habilitar($id_contMenu)==0) {
            $valor = 0;
        }
        echo json_encode(array("valor" => $valor));
    }

    function Deshabilitar() {
        $id_contMenu = $this->input->post("id_contMenu");           
        $valor = 1;     
        if ($this->Modelotipopago->Deshabilitar($id_contMenu)==0) {
            $valor = 0;
        }
        echo json_encode(array("valor" => $valor));
    }

    

} 