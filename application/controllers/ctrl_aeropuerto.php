<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

require APPPATH . 'third_party/opusx/system/OPX_aeropuerto.php';

class CTRL_Aeropuerto extends OPX_Controller{
	
	public $opx_aeropuerto;
	
	public function __construct(){
		parent::__construct();
		$this->opx_aeropuerto = new OPX_aeropuerto;
	}
	
	public function index($msm = '', $class= 'default'){
		$data_aeropuerto['rows'] = $this->opx_aeropuerto->list_aeropuertos();
		$data_aeropuerto['message'] = $msm;
		$data_aeropuerto['class']   = $class;
		if($this->opx_auth->is_auth()){
			$data_menu['menu_items'] = $this->opx_user->get_menu_items('admin');
			$data['main_menu'] = $this->load->view('menu',$data_menu,TRUE);
			$data['main_content'] = $this->load->view('aeropuerto/aeropuerto_form',$data_aeropuerto,TRUE);
		}
		else{
			$data['main_menu'] = $this->load->view('menu',NULL,TRUE);
			$data['main_content'] = $this->load->view('login',NULL,TRUE);
		}
		$data['main_footer'] = $this->load->view('footer',NULL,TRUE);
		$this->load->view('layout', $data);		
	}
	
	public function add_aeropuerto(){
		$aeropuerto = array(
			'aeropuerto' => $this->input->post('aeropuerto'),
			'code' => $this->input->post('code'),
			'pais' => $this->input->post('pais'),
			'ciudad' => $this->input->post('ciudad')
		);
		if($this->opx_aeropuerto->add_aeropuerto($aeropuerto))
			$this->index('El registro fue insertado exitosamente', 'success');
		else
			$this->index('El registro no fue agregado', 'danger');
	}
	
}