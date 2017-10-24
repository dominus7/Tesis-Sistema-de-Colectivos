<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Modelo');
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('sys/inicio');
	}
	public function cargar_login()
	{
		$this->load->view('sys/login');
	}
    public function cargar_vista_principal()
    {
        $this->load->view('sys/paginaPrincipal');
    }
    function cargar_menu()
    {
        $this->load->view('sys/menu');
    }
    function cargar_dashboard_admin()
    {
        $this->load->view('sys/Dashboard_Admin/index');
    }
    function advertencia() {
        $this->load->view('sys/modal/advertencia');
    }
    function error() {
        $this->load->view('sys/modal/error');
    }
    function exito() {
        $this->load->view('sys/modal/exito');
    }
    function cargando() {
        $this->load->view('sys/modal/cargando');
    }
    function informacion() {
        $datos['text'] = $this->input->post("text");        
        $this->load->view('sys/modal/informacion', $datos);
    }
    function cargar_contenidoPaginaXusuario() {          
        $datos['cabeceraDerechoG'] = $this->input->post("accion");
        $datos['cabeceraDerechoc'] = $this->input->post("modulo");
        $datos['icono'] = $this->input->post("icono");
        $datos['cabeceraIzg'] = $this->input->post("modulo");
        $datos['cabeceraIzc'] = $this->input->post("accion");
        $this->load->view('sys/contenidoPagina', $datos);
    }

    function cargarAccionMenu() {
        $id = $this->input->post("id");
        $vista = $this->input->post("vista");
        $estado = $this->input->post("estado");
        $data = $this->Modelo->cargarAccionMenu($id,$vista,$estado);          
        $datos['cantidad'] = count($data);
        $datos['accionVista'] = $data;
        $this->load->view('sys/menuContextual', $datos);
    }
    function cargar_modalUsuario() {       
        $datos['nombre'] = $this->session->userdata('nombre');
        $datos['Perfil'] = $this->session->userdata('Perfil');
        $datos['imagen'] = $this->session->userdata('imagen');
        
        $datos['cantidad'] = 20; 
             
        $this->load->view('sys/modalUsuario', $datos);
    }

    public function verificarLogin() 
    {    	
        $logueado = false;
        $id = '';
        $nombre = '';
        $Perfil = '';
        $tipo = '';
        $estado = '';
        $imagen = '';
        if ($this->session->userdata('esta_logueado') == true) {
            $logueado = true;            
            $id = $this->session->userdata('id');
            $nombre = $this->session->userdata('nombre');
            $Perfil = $this->session->userdata('Perfil');
            $estado = $this->session->userdata('estado');
            $tipo = $this->session->userdata('tipo');       
            $imagen = $this->session->userdata('imagen');     
        }
        echo json_encode(array('logueado' => $logueado,
            'id' => $id,
            'nombre' => $nombre,
            'Perfil' => $Perfil,
            'estado'=>$estado,
            'tipo' => $tipo));
    }

    function conectar() {    	
        $id = '';
        $login = $this->input->post("nombre");
        $clave = $this->input->post("clave");
        $tipo = '';
        $rut = '';
        $estado = '';
        $valor = 0;
        $nombre = '';
        $Perfil = '';
        $imagen = '';
        $cookie = array('id' => '', 'rut' => '', 'nombre' => '', 'Perfil' => '', 'tipo' => '','estado'=>'','imagen'=>'' , 'esta_logueado' => false);
        if ($this->Modelo->conectar($login, $clave)->num_rows() == 1) {
            $data = $this->Modelo->conectar($login, $clave)->result();
            foreach ($data as $fila) {
                $id = $fila->ID;
                $rut = $fila->RUN;
                $nombre = $fila->Nombre;              
                $tipo = $fila->Id_Perfil;
                $Perfil = $fila->Perfil;
                $estado = $fila->Estado;
                $imagen = $fila->imagen;
            }
            if ($estado == 'Habilitado') {
                $valor = 1;
                if ($imagen=='') {
                    $imagen = "dist/img/avatar5.png";
                }
                $cookie = array('id' => $id, 'rut' => $rut, 'nombre' => $nombre, 'Perfil' => $Perfil, 'tipo' => $tipo,'estado'=>$estado,'imagen'=>$imagen, 'esta_logueado' => TRUE);
            }
        }
        $this->session->set_userdata($cookie);
        echo json_encode(array("valor" => $valor,
            "id" => $id,
            "nombre"=>$nombre,
            "Perfil"=>$Perfil,
            "tipo" => $tipo
        ));
    }

    function cerrar_sesion() 
    {
        $this->session->sess_destroy();
    }   
}
