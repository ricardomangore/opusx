<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

require APPPATH . 'third_party/opusx/system/OPX_Aeropuerto.php';
require APPPATH . 'third_party/opusx/system/OPX_Aerolinea.php';
require APPPATH . 'third_party/opusx/system/OPX_Carga_Aerea.php';
require APPPATH . 'third_party/opusx/system/OPX_Region.php';
require APPPATH . 'third_party/opusx/system/OPX_Recargo.php';
require APPPATH . 'third_party/opusx/system/OPX_Flete_Aereo.php';

class CTRL_Flete_Aereo extends OPX_Controller{
	
	public $opx_flete_aereo;
	public $opx_aeropuerto;
	public $opx_aerolinea;
	public $opx_carga_aerea;
	public $opx_region;
	public $opx_recargo;
	
	public function __construct(){
		parent::__construct();
		$this->opx_flete_aereo = new OPX_flete_aereo;
		$this->opx_aeropuerto = new OPX_Aeropuerto;
		$this->opx_aerolinea = new OPX_Aerolinea;
		$this->opx_carga_aerea = new OPX_Carga_Aerea;
		$this->opx_region = new OPX_Region;
		$this->opx_recargo = new OPX_Recargo;
	}
	
	public function index($msm = '', $class= 'default'){
		//$data_flete_aereo['rows'] = $this->opx_flete_aereo->list_cargas_aereas();
		$data_flete_aereo['aeropuertos'] = $this->opx_aeropuerto->list_aeropuertos();
		$data_flete_aereo['aerolineas'] = $this->opx_aerolinea->list_aerolineas();
		$data_flete_aereo['carga_aerea'] = $this->opx_carga_aerea->list_cargas_aereas();
		$data_flete_aereo['regiones'] = $this->opx_region->list_regiones();
		$data_flete_aereo['recargos'] = $this->opx_recargo->list_recargos();
		$data_flete_aereo['message'] = $msm;
		$data_flete_aereo['class']   = $class;
		if($this->opx_auth->is_auth()){
			$data_menu['menu_items'] = $this->opx_user->get_menu_items('admin');
			$data['main_menu'] = $this->load->view('menu',$data_menu,TRUE);
			$data['main_content'] = $this->load->view('flete_aereo/flete_aereo_form',$data_flete_aereo,TRUE);
		}
		else{
			$data['main_menu'] = $this->load->view('menu',NULL,TRUE);
			$data['main_content'] = $this->load->view('login',NULL,TRUE);
		}
		$data['main_footer'] = $this->load->view('footer',NULL,TRUE);
		$this->load->view('layout', $data);		
	}
	
	public function add_flete_aereo(){
		$flete_aereo = array(
			'min' => $this->input->post('min'),
			'max' => $this->input->post('max'),
			'peso' => $this->input->post('peso'),
			'volumen' => $this->input->post('volumen')
		);
		if($this->opx_flete_aereo->add_flete_aereo($flete_aereo))
			$this->index('El registro fue insertado exitosamente', 'success');
		else
			$this->index('El registro no fue agregado', 'danger');
	}
	
}