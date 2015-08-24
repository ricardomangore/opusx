<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

require APPPATH . 'third_party/opusx/system/OPX_Region.php';
	
class CTRL_Region extends OPX_Controller{
	
	public $opx_region;
	
	public function __construct(){
		parent::__construct();
		$this->opx_region = new OPX_Region;
	}
	
	public function index($msm = '', $class= 'default'){
		$data_region['rows'] = $this->opx_region->list_regiones();
		$data_region['message'] = $msm;
		$data_region['class']   = $class;
		if($this->opx_auth->is_auth()){
			$data_menu['menu_items'] = $this->opx_user->get_menu_items('admin');
			$data['main_menu'] = $this->load->view('menu',$data_menu,TRUE);
			$data['main_content'] = $this->load->view('region/region_form',$data_region,TRUE);
		}
		else{
			$data['main_menu'] = $this->load->view('menu',NULL,TRUE);
			$data['main_content'] = $this->load->view('login',NULL,TRUE);
		}
		$data['main_footer'] = $this->load->view('footer',NULL,TRUE);
		$this->load->view('layout', $data);		
	}
	
	public function add_region(){
		$message = '';
		$region = $this->input->post('region');
		if($this->opx_region->add_region($region))
			$this->index('El registro fue insertado exitosamente', 'success');
		else
			$this->index('El registro no fue agregado', 'danger');
	}
	
	
}