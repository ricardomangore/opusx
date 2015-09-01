<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

require APPPATH . 'third_party/opusx/system/OPX_recargo.php';

class CTRL_Recargo extends OPX_Controller{
	
	public $opx_recargo;
	private static $message;
	private static $class;
	private static $input_class;	
	
	public function __construct(){
		parent::__construct();
		self::$message = '';
		self::$class = 'default';
		self::$input_class = '';
		$this->opx_recargo = new OPX_Recargo;
		$this->load->helper('form');
		$this->load->library('form_validation');		
	}
	
	public function index(){
		$data['id_content'] = 'opx_recargo';
		$data_recargo['rows'] = $this->opx_recargo->list_recargos();
		$data_recargo['message'] = self::$message;
		$data_recargo['class']   = self::$class;
		$data_recargo['input_class'] = self::$input_class;
		if($this->opx_auth->is_auth()){
			$data['title_content'] = "Recargos";
			$data_menu['menu_items'] = $this->opx_user->get_menu_items('admin');
			$data['main_menu'] = $this->load->view('menu',$data_menu,TRUE);
			$data['sidebar'] = $this->load->view('sidebar',NULL,TRUE);
			$data['main_content'] = $this->load->view('recargo/recargo_form',$data_recargo,TRUE);
		}
		else{
			$data['main_menu'] = $this->load->view('menu',NULL,TRUE);
			$data['main_content'] = $this->load->view('login',NULL,TRUE);
		}
		$data['main_footer'] = $this->load->view('footer',NULL,TRUE);
		$this->load->view('layout', $data);		
	}
	
	/**public function add_recargo(){
		$recargo = array(
			'clave' => $this->input->post('clave'),
			'descripcion' => $this->input->post('descripcion'),
			'provedor' => $this->input->post('provedor')
		);
		if($this->opx_recargo->add_recargo($recargo))
			$this->index('El registro fue insertado exitosamente', 'success');
		else
			$this->index('El registro no fue agregado', 'danger');
	}*/
	
	public function recargo_service(){
		$opxaction = $this->input->post('opxaction');
		$idrecargo = $this->input->post('idrecargo');
		$descripcion = $this->input->post('descripcion');
		$costo = $this->input->post('costo');
		$clave = $this->input->post('clave');
		$this->form_validation->set_rules('clave','Clave','required',array('required' => 'El campo Clave es obligatorio'));
		$this->form_validation->set_rules('descripcion','Descripcion','required',array('required' => 'El campo Descripción es obligatorio'));
		$this->form_validation->set_rules('costo','Costo','required',array('required' => 'El campo Costo es obligatorio'));
		if($this->form_validation->run() == FALSE){//Caundo no pasa la validación
			echo "fallo";
			self::$message = 'Los campos * son obligatorios';
			self::$class = 'danger';
		}else{//Validación exitosa
			echo "exito";
			if($opxaction == 'add'){
				$message = '';
				if($this->opx_recargo->add_recargo(array(
					'costo' => $costo,
					'descripcion' => $descripcion,
					'clave'  => $clave
				))){
					self::$message = 'El registro se agrego exitosamente';
					self::$class = 'success';
				}else{
					self::$message = 'El registro no fue agregado';
					self::$class = 'danger';	
				}		
			}else if($opxaction == 'edit'){
				if($this->opx_recargo->edit_recargo(array(
					'idrecargo'	=> $idrecargo,
					'clave'	=> $clave,
					'costo'    => $costo,
					'descripcion' => $descripcion
				))){
					self::$message = 'El registro se modifico exitosamente';
					self::$class = 'success';
				}
				else{
					self::$message = 'El registro no fue modificado';
					self::$class = 'danger';
				}	
			}			
		}
		$this->index();
	}
	
}