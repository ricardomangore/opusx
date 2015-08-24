<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

require APPPATH . 'third_party/opusx/system/OPX_aerolinea.php';

class CTRL_Aerolinea extends OPX_Controller{
	
	public $opx_aerolinea;
	
	public function __construct(){
		parent::__construct();
		$this->opx_aerolinea = new OPX_Aerolinea;
	}
	
	public function index($msm = '', $class= 'default'){
		$data_aerolinea['rows'] = $this->opx_aerolinea->list_aerolineas();
		$data_aerolinea['message'] = $msm;
		$data_aerolinea['class']   = $class;
		if($this->opx_auth->is_auth()){
			$data_menu['menu_items'] = $this->opx_user->get_menu_items('admin');
			$data['main_menu'] = $this->load->view('menu',$data_menu,TRUE);
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
		$aerolinea = array('aerolinea' => $this->input->post('aerolinea'));
		if($this->opx_aerolinea->add_aerolinea($aerolinea))
			$this->index('El registro fue insertado exitosamente', 'success');
		else
			$this->index('El registro no fue agregado', 'danger');
	}
	
}