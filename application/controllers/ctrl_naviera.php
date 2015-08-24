<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

require APPPATH . 'third_party/opusx/system/OPX_Naviera.php';

class CTRL_Naviera extends OPX_Controller{
	
	public $opx_naviera;
	
	public function __construct(){
		parent::__construct();
		$this->opx_naviera = new OPX_Naviera;
	}
	
	public function index($msm = '', $class= 'default'){
		$data_naviera['rows'] = $this->opx_naviera->list_navieras();
		$data_naviera['message'] = $msm;
		$data_naviera['class']   = $class;
		if($this->opx_auth->is_auth()){
			$data_menu['menu_items'] = $this->opx_user->get_menu_items('admin');
			$data['main_menu'] = $this->load->view('menu',$data_menu,TRUE);
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
		$message = '';
		$naviera = $this->input->post('naviera');
		if($this->opx_naviera->add_naviera($naviera))
			$this->index('El registro fue insertado exitosamente', 'success');
		else
			$this->index('El registro no fue agregado', 'danger');
	}
	
}