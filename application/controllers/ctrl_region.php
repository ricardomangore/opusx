<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

require APPPATH . 'third_party/opusx/system/OPX_Region.php';
	
class CTRL_Region extends OPX_Controller{
	
	public $opx_region;
	private static $message;
	private static $class;
	private static $input_class;
	
	public function __construct(){
		parent::__construct();
		self::$message = '';
		self::$class = 'default';
		self::$input_class = '';
		$this->opx_region = new OPX_Region;
		$this->load->helper('form');
		$this->load->library('form_validation');
	}
	
	public function index(){
		$data['id_content'] = 'opx_region';
		$data_region['rows'] = $this->opx_region->list_regiones();
		$data_region['message'] = self::$message;
		$data_region['class']   = self::$class;
		$data_region['input_class'] = self::$input_class;
		if($this->opx_auth->is_auth()){
			$data['title_content'] = "Región";
			$data_menu['menu_items'] = $this->opx_user->get_menu_items('admin');
			$data['main_menu'] = $this->load->view('menu',$data_menu,TRUE);
			$data['sidebar'] = $this->load->view('sidebar',NULL,TRUE);
			$data['main_content'] = $this->load->view('region/region_form',$data_region,TRUE);
		}
		else{
			$data['main_menu'] = $this->load->view('menu',NULL,TRUE);
			$data['main_content'] = $this->load->view('login',NULL,TRUE);
		}
		$data['main_footer'] = $this->load->view('footer',NULL,TRUE);
		$this->load->view('layout', $data);	
	}
	
	public function region_service(){
		$opxaction = $this->input->post('opxaction');
		$idregion = $this->input->post('idregion');
		$region = $this->input->post('region');
		
		$this->form_validation->set_rules('region','Region','required');
		if($this->form_validation->run() == FALSE){//Caundo no pasa la validación
			self::$message = 'El campo Región es obligatorio';
			self::$class = 'danger';
			self::$input_class = 'has-error';
		}else{//Validación exitosa
			if($opxaction == 'add'){//Bloque de procesos agergar
				if($this->opx_region->add_region($region)){
					self::$message = 'El registro se agrego exitosamente';
					self::$class = 'success';
				}else{
					self::$message = 'El registro no fue agregado';
					self::$class = 'danger';	
				}		
			}elseif($opxaction == 'edit'){//Bloque de procesos de edición
				if($this->opx_region->edit_region(array(
					'idregion'	=> $idregion,
					'region'	=> $region
				))){
					self::$message = 'El registro se modifico exitosamente';
					self::$class = 'success';
				}
				else{
					self::$message = 'El registro no fue modificado';
					self::$class = 'danger';
				}	
			}			
		}//Termina el bloque de validación
		$this->index();
	}
	
}