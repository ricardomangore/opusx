<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

require APPPATH . 'third_party/opusx/system/OPX_carga_aerea.php';

class CTRL_Carga_Aerea extends OPX_Controller{
	
	public $opx_carga_aerea;
	
	public function __construct(){
		parent::__construct();
		$this->opx_carga_aerea = new OPX_carga_aerea;
	}
	
	public function index($msm = '', $class= 'default'){
		$data_carga_aerea['rows'] = $this->opx_carga_aerea->list_cargas_aereas();
		$data_carga_aerea['message'] = $msm;
		$data_carga_aerea['class']   = $class;
		if($this->opx_auth->is_auth()){
			$data_menu['menu_items'] = $this->opx_user->get_menu_items('admin');
			$data['main_menu'] = $this->load->view('menu',$data_menu,TRUE);
			$data['main_content'] = $this->load->view('carga_aerea/carga_aerea_form',$data_carga_aerea,TRUE);
		}
		else{
			$data['main_menu'] = $this->load->view('menu',NULL,TRUE);
			$data['main_content'] = $this->load->view('login',NULL,TRUE);
		}
		$data['main_footer'] = $this->load->view('footer',NULL,TRUE);
		$this->load->view('layout', $data);		
	}
	
	public function add_carga_aerea(){
		$carga_aerea = array(
			'min' => $this->input->post('min'),
			'max' => $this->input->post('max'),
			'peso' => $this->input->post('peso'),
			'volumen' => $this->input->post('volumen')
		);
		if($this->opx_carga_aerea->add_carga_aerea($carga_aerea))
			$this->index('El registro fue insertado exitosamente', 'success');
		else
			$this->index('El registro no fue agregado', 'danger');
	}
	
}