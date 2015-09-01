<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

require APPPATH . 'third_party/opusx/system/OPX_Aeropuerto.php';
require APPPATH . 'third_party/opusx/system/OPX_Aerolinea.php';
require APPPATH . 'third_party/opusx/system/OPX_Carga_Aerea.php';
require APPPATH . 'third_party/opusx/system/OPX_Region.php';
require APPPATH . 'third_party/opusx/system/OPX_Recargo.php';
require APPPATH . 'third_party/opusx/system/OPX_flete_maritimo.php';

class CTRL_Flete_Maritimo extends OPX_Controller{
	
	public $opx_flete_maritimo;
	public $opx_aeropuerto;
	public $opx_aerolinea;
	public $opx_carga_aerea;
	public $opx_region;
	public $opx_recargo;
	
	public function __construct(){
		parent::__construct();
		$this->opx_flete_maritimo = new OPX_flete_maritimo;
		$this->opx_aeropuerto = new OPX_Aeropuerto;
		$this->opx_aerolinea = new OPX_Aerolinea;
		$this->opx_carga_aerea = new OPX_Carga_Aerea;
		$this->opx_region = new OPX_Region;
		$this->opx_recargo = new OPX_Recargo;
	}
	
	public function index($msm = '', $class= 'default'){
		//$data_flete_maritimo['rows'] = $this->opx_flete_maritimo->list_cargas_aereas();
		$data['id_content'] = 'opx_flete_maritimo';
		$data_flete_maritimo['aeropuertos'] = $this->opx_aeropuerto->list_aeropuertos();
		$data_flete_maritimo['aerolineas'] = $this->opx_aerolinea->list_aerolineas();
		$data_flete_maritimo['carga_aerea'] = $this->opx_carga_aerea->list_cargas_aereas();
		$data_flete_maritimo['regiones'] = $this->opx_region->list_regiones();
		$data_flete_maritimo['recargos'] = $this->opx_recargo->list_recargos();
		$data_flete_maritimo['message'] = $msm;
		$data_flete_maritimo['class']   = $class;
		if($this->opx_auth->is_auth()){
			$data['title_content'] = "Fletes Marítimos";
			$data_menu['menu_items'] = $this->opx_user->get_menu_items('admin');
			$data['main_menu'] = $this->load->view('menu',$data_menu,TRUE);
			$data['sidebar'] = $this->load->view('sidebar',NULL,TRUE);
			$data['main_content'] = $this->load->view('flete_maritimo/flete_maritimo_form',$data_flete_maritimo,TRUE);
		}
		else{
			$data['main_menu'] = $this->load->view('menu',NULL,TRUE);
			$data['main_content'] = $this->load->view('login',NULL,TRUE);
		}
		$data['main_footer'] = $this->load->view('footer',NULL,TRUE);
		$this->load->view('layout', $data);		
	}
	
	public function add_flete_maritimo(){
		$flete_maritimo = array(
			'min' => $this->input->post('min'),
			'max' => $this->input->post('max'),
			'peso' => $this->input->post('peso'),
			'volumen' => $this->input->post('volumen')
		);
		if($this->opx_flete_maritimo->add_flete_maritimo($flete_maritimo))
			$this->index('El registro fue insertado exitosamente', 'success');
		else
			$this->index('El registro no fue agregado', 'danger');
	}
	
}