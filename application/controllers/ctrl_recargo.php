<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

require APPPATH . 'third_party/opusx/system/OPX_recargo.php';

class CTRL_Recargo extends OPX_Controller{
	
	public $opx_recargo;
	
	public function __construct(){
		parent::__construct();
		$this->opx_recargo = new OPX_Recargo;
	}
	
	public function index($msm = '', $class= 'default'){
		$data_recargo['rows'] = $this->opx_recargo->list_recargos();
		$data_recargo['message'] = $msm;
		$data_recargo['class']   = $class;
		if($this->opx_auth->is_auth()){
			$data_menu['menu_items'] = $this->opx_user->get_menu_items('admin');
			$data['main_menu'] = $this->load->view('menu',$data_menu,TRUE);
			$data['main_content'] = $this->load->view('recargo/recargo_form',$data_recargo,TRUE);
		}
		else{
			$data['main_menu'] = $this->load->view('menu',NULL,TRUE);
			$data['main_content'] = $this->load->view('login',NULL,TRUE);
		}
		$data['main_footer'] = $this->load->view('footer',NULL,TRUE);
		$this->load->view('layout', $data);		
	}
	
	public function add_recargo(){
		$recargo = array(
			'clave' => $this->input->post('clave'),
			'descripcion' => $this->input->post('descripcion'),
			'provedor' => $this->input->post('provedor')
		);
		if($this->opx_recargo->add_recargo($recargo))
			$this->index('El registro fue insertado exitosamente', 'success');
		else
			$this->index('El registro no fue agregado', 'danger');
	}
	
}