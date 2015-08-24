<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

require APPPATH . 'third_party/opusx/system/OPX_puerto.php';
	
class CTRL_Puerto extends OPX_Controller{
	
	public $opx_puerto;
	
	public function __construct(){
		parent::__construct();
		$this->opx_puerto = new OPX_Puerto;
	}
	
	public function index($msm = '', $class= 'default'){
		$data_puerto['rows'] = $this->opx_puerto->list_puertos();
		$data_puerto['message'] = $msm;
		$data_puerto['class']   = $class;
		if($this->opx_auth->is_auth()){
			$data_menu['menu_items'] = $this->opx_user->get_menu_items('admin');
			$data['main_menu'] = $this->load->view('menu',$data_menu,TRUE);
			$data['main_content'] = $this->load->view('puerto/puerto_form',$data_puerto,TRUE);
		}
		else{
			$data['main_menu'] = $this->load->view('menu',NULL,TRUE);
			$data['main_content'] = $this->load->view('login',NULL,TRUE);
		}
		$data['main_footer'] = $this->load->view('footer',NULL,TRUE);
		$this->load->view('layout', $data);		
	}
	
	public function add_puerto(){
		$puerto = array(
			'puerto' => $puerto =$this->input->post('puerto'),
			'locode' => $locode = $this->input->post('locode')
		);
		if($this->opx_puerto->add_puerto($puerto))
			$this->index('El registro fue insertado exitosamente', 'success');
		else
			$this->index('El registro no fue agregado', 'danger');
	}
	
	
}