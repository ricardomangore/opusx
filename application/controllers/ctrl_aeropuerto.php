<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

require APPPATH . 'third_party/opusx/system/OPX_aeropuerto.php';

class CTRL_Aeropuerto extends OPX_Controller{
	
	public $opx_aeropuerto;
	private static $message;
	private static $class;
	private static $input_class;		
	
	public function __construct(){
		parent::__construct();
		self::$message = '';
		self::$class = 'default';
		self::$input_class = '';		
		$this->opx_aeropuerto = new OPX_aeropuerto;
		$this->load->helper('form');
		$this->load->library('form_validation');		
	}
	
	public function index(){
		$data['id_content'] = 'opx_aeropuerto';
		$data_aeropuerto['rows'] = $this->opx_aeropuerto->list_aeropuertos();
		$data_aeropuerto['message'] = self::$message;
		$data_aeropuerto['class']   = self::$class;
		if($this->opx_auth->is_auth()){
			$data['title_content'] = "Aeropuertos";
			$data_menu['menu_items'] = $this->opx_user->get_menu_items('admin');
			$data['main_menu'] = $this->load->view('menu',$data_menu,TRUE);
			$data['sidebar'] = $this->load->view('sidebar',NULL,TRUE);
			$data['main_content'] = $this->load->view('aeropuerto/aeropuerto_form',$data_aeropuerto,TRUE);
		}
		else{
			$data['main_menu'] = $this->load->view('menu',NULL,TRUE);
			$data['main_content'] = $this->load->view('login',NULL,TRUE);
		}
		$data['main_footer'] = $this->load->view('footer',NULL,TRUE);
		$this->load->view('layout', $data);		
	}
	
	public function add_aeropuerto(){
		$opxaction = $this->input->post('opxaction');
		$idaeropuerto = $this->input->post('idaeropuerto');		
		$aeropuerto = $this->input->post('aeropuerto');
		$code = $this->input->post('code');
		$pais = $this->input->post('pais');
		$ciudad = $this->input->post('ciudad');
		$this->form_validation->set_rules('code','Code','required',array('required' => 'El campo Code es obligatorio'));
		$this->form_validation->set_rules('aeropuerto','Aeropuerto','required',array('required' => 'El campo Aeropuerto es obligatorio'));		
		if($this->form_validation->run() == FALSE){//Caundo no pasa la validación
			echo "fallo";
			self::$message = 'Los campos * son obligatorios';
			self::$class = 'danger';
		}else{//Validación exitosa
			if($opxaction == 'add'){
				$message = '';
				if($this->opx_aeropuerto->add_aeropuerto(array(
					'code' => $code,
					'aeropuerto' => $aeropuerto,
					'ciudad'  => $ciudad,
					'pais'    => $pais
				))){
					self::$message = 'El registro se agrego exitosamente';
					self::$class = 'success';
				}else{
					self::$message = 'El registro no fue agregado';
					self::$class = 'danger';	
				}		
			}else if($opxaction == 'edit'){
				if($this->opx_aeropuerto->edit_aeropuerto(array(
				    'idaeropuerto' => $idaeropuerto,
					'code' => $code,
					'aeropuerto' => $aeropuerto,
					'ciudad'  => $ciudad,
					'pais'    => $pais
				))){
					self::$message = 'El registro se modifico exitosamente';
					self::$class = 'success';
				}
				else{
					self::$message = 'El registro no fue modificado';
					self::$class = 'danger';
				}	
			}	
		}		
		$this->index();
	}
	
}