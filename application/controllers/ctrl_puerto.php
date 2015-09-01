<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

require APPPATH . 'third_party/opusx/system/OPX_puerto.php';
	
class CTRL_Puerto extends OPX_Controller{
	
	public $opx_puerto;
	private static $message;
	private static $class;
	private static $input_class;	
	
	public function __construct(){
		parent::__construct();
		self::$message = '';
		self::$class = 'default';
		self::$input_class = '';		
		$this->opx_puerto = new OPX_Puerto;
		$this->load->helper('form');
		$this->load->library('form_validation');		
	}
	
	public function index(){
		$data['id_content'] = 'opx_puerto';
		$data_puerto['rows'] = $this->opx_puerto->list_puertos();
		$data_puerto['message'] = self::$message;
		$data_puerto['class']   = self::$class;
		$data_puerto['input_class'] = self::$input_class;
		if($this->opx_auth->is_auth()){
			$data['title_content'] = "Puertos";
			$data_menu['menu_items'] = $this->opx_user->get_menu_items('admin');
			$data['main_menu'] = $this->load->view('menu',$data_menu,TRUE);
			$data['sidebar'] = $this->load->view('sidebar',NULL,TRUE);
			$data['main_content'] = $this->load->view('puerto/puerto_form',$data_puerto,TRUE);
		}
		else{
			$data['main_menu'] = $this->load->view('menu',NULL,TRUE);
			$data['main_content'] = $this->load->view('login',NULL,TRUE);
		}
		$data['main_footer'] = $this->load->view('footer',NULL,TRUE);
		$this->load->view('layout', $data);		
	}
	
	/*public function add_puerto(){
		$puerto = array(
			'puerto' => $puerto =$this->input->post('puerto'),
			'locode' => $locode = $this->input->post('locode')
		);
		if($this->opx_puerto->add_puerto($puerto))
			$this->index('El registro fue insertado exitosamente', 'success');
		else
			$this->index('El registro no fue agregado', 'danger');
	}*/
	
	public function puerto_service(){
		$opxaction = $this->input->post('opxaction');
		$idpuerto = $this->input->post('idpuerto');
		$puerto = $this->input->post('puerto');
		$locode = $this->input->post('locode');
		$this->form_validation->set_rules('puerto','Puerto','required',array('required' => 'El campo Puerto es obligatorio'));
		if($this->form_validation->run() == FALSE){//Caundo no pasa la validación	
			self::$message = 'Los campos con * son obligatorios';
			self::$class = 'danger';	
		}else{//Validación Exitosa
			if($opxaction == 'add'){
				$message = '';
				if($this->opx_puerto->add_puerto(array(
					'locode' => $locode,
					'puerto' => $puerto,
				))){
					self::$message = 'El registro se agrego exitosamente';
					self::$class = 'success';
				}else{
					self::$message = 'El registro no fue agregado';
					self::$class = 'danger';
				}		
			}else if($opxaction == 'edit'){
				if($this->opx_puerto->edit_puerto(array(
					'idpuerto'	=> $idpuerto,
					'puerto'	=> $puerto,
					'locode'    => $locode
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