<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

require APPPATH . 'third_party/opusx/system/OPX_aerolinea.php';

class CTRL_Aerolinea extends OPX_Controller{
	
	public $opx_aerolinea;
	private static $message;
	private static $class;
	private static $input_class;		
	
	public function __construct(){
		parent::__construct();
		self::$message = '';
		self::$class = 'default';
		self::$input_class = '';		
		$this->opx_aerolinea = new OPX_Aerolinea;
		$this->load->helper('form');
		$this->load->library('form_validation');		
	}
	
	public function index(){
		$data['id_content'] = 'opx_aerolinea';
		$data_aerolinea['rows'] = $this->opx_aerolinea->list_aerolineas();
		$data_aerolinea['message'] = self::$message;
		$data_aerolinea['class']   = self::$class;
		if($this->opx_auth->is_auth()){
			$data['title_content'] = "Aerolíneas";
			$data_menu['menu_items'] = $this->opx_user->get_menu_items('admin');
			$data['main_menu'] = $this->load->view('menu',$data_menu,TRUE);
			$data['sidebar'] = $this->load->view('sidebar',NULL,TRUE);
			$data['main_content'] = $this->load->view('aerolinea/aerolinea_form',$data_aerolinea,TRUE);
		}
		else{
			$data['main_menu'] = $this->load->view('menu',NULL,TRUE);
			$data['main_content'] = $this->load->view('login',NULL,TRUE);
		}
		$data['main_footer'] = $this->load->view('footer',NULL,TRUE);
		$this->load->view('layout', $data);		
	}
	
	public function add_aerolinea(){
		$opxaction = $this->input->post('opxaction');
		$idaerolinea = $this->input->post('idaerolinea');		
		$aerolinea = $this->input->post('aerolinea');
		$this->form_validation->set_rules('aerolinea','Aerolinea','required',array('required' => 'El campo Aerolinea es obligatorio'));
		if($this->form_validation->run() == FALSE){//Caundo no pasa la validación
			self::$message = 'Los campos * son obligatorios';
			self::$class = 'danger';
		}else{//Validación exitosa
			if($opxaction == 'add'){
				$message = '';
				if($this->opx_aerolinea->add_aerolinea(array(
					'aerolinea' => $aerolinea,
				))){
					self::$message = 'El registro se agrego exitosamente';
					self::$class = 'success';
				}else{
					self::$message = 'El registro no fue agregado';
					self::$class = 'danger';	
				}		
			}else if($opxaction == 'edit'){
				if($this->opx_aerolinea->edit_aerolinea(array(
					'idaerolinea'	=> $idaerolinea,
					'aerolinea'	=> $aerolinea
				))){
					self::$message = 'El registro se modifico exitosamente';
					self::$class = 'success';
				}
				else{
					self::$message = 'El registro no fue modificado';
					self::$class = 'danger';
				}	
			}	
		}//Termina Validación
		$this->index();		
	}
	
}