<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');



class CTRL_Naviera extends OPX_Controller{
	
	public $opx_naviera;
	private static $message;
	private static $class;
	private static $input_class;	
	
	public function __construct(){
		parent::__construct();
		self::$message = '';
		self::$class = 'default';
		self::$input_class = '';		
		$this->opx_naviera = new OPX_Naviera;
		$this->load->helper('form');
		$this->load->library('form_validation');
	}
	
	public function index(){
		$data['id_content'] = 'opx_naviera';
		$data_naviera['rows'] = $this->opx_naviera->list_navieras();
		$data_naviera['message'] = self::$message;
		$data_naviera['class']   = self::$class;
		$data_naviera['input_class'] = self::$input_class;
		if($this->opx_auth->is_auth()){
			$data['title_content'] = "Navieras";
			$data_menu['menu_items'] = $this->opx_user->get_menu_items('admin');
			$data['main_menu'] = $this->load->view('menu',$data_menu,TRUE);
			$data['sidebar'] = $this->load->view('sidebar',NULL,TRUE);
			$data['main_content'] = $this->load->view('naviera/naviera_form',$data_naviera,TRUE);
		}
		else{
			$data['main_menu'] = $this->load->view('menu',NULL,TRUE);
			$data['main_content'] = $this->load->view('login',NULL,TRUE);
		}
		$data['main_footer'] = $this->load->view('footer',NULL,TRUE);
		$this->load->view('layout', $data);		
	}
	
	public function add_naviera(){
		$opxaction = $this->input->post('opxaction');
		$idnaviera = $this->input->post('idnaviera');
		$naviera = $this->input->post('naviera');
		$this->form_validation->set_rules('naviera','Naviera','required',array('required' => 'El campo Naviera es obligatorio'));
		if($this->form_validation->run() == FALSE){//Caundo no pasa la validación
			self::$message = 'Los campos * son obligatorios';
			self::$class = 'danger';
		}else{
			if($opxaction == 'add'){//Bloque de procesos agergar
				if($this->opx_naviera->add_naviera($naviera)){
					self::$message = 'El registro se agrego exitosamente';
					self::$class = 'success';
				}else{
					self::$message = 'El registro no fue agregado';
					self::$class = 'danger';	
				}		
			}elseif($opxaction == 'edit'){//Bloque de procesos de edición
				if($this->opx_naviera->edit_naviera(array(
					'idnaviera'	=> $idnaviera,
					'naviera'	=> $naviera
				))){
					self::$message = 'El registro se modifico exitosamente';
					self::$class = 'success';
				}
				else{
					self::$message = 'El registro no fue modificado';
					self::$class = 'danger';
				}	
			}	
		}//Termina validación
		$this->index();
	}
	
}