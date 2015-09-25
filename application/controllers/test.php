<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Test extends CI_Controller{

	private static $er;
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('region');
		$this->load->helper('form');
		$this->load->library('form_validation');
		self::$er = "ER test";
	}
	
	/*public function index(){
        $this->load->helper('form');

        $this->load->library('form_validation');
		$this->form_validation->set_rules('nombre', 'Username', 'required');

        if ($this->form_validation->run() == FALSE)
        {
                $this->load->view('formtest');
        }
        else
        {
                $this->load->view('formtest');
        }
	}*/
	
	public function index(){
		echo self::$er;
	}
	
	public function test1(){
		self::$er = "ER modificado";
		$this->index();
	}
	
	/**
	 * Test de Delte Aerolinea
	 */
	 public function test_delete_aerolinea(){
	 	$this->load->model('aerolinea');
		try{
			$this->aerolinea->delete_aerolinea(array('idaerolinea'=>'1','aerolinea' => ''));
			echo "termino";
		}catch(Exception $e){
			echo $e->getCode();
		}
	 }
	
	/**
	 * inserta un registro en la tabla de recargo aereos y recargaos, dado un ID de aerolinea y los valores de los campos de cada tabla 
	 */
	public function test_set_recargo_aereo(){
		$recargo =  array(
			'idaerolinea' => 1,
			'clave'		  => 'IMO',
			'descripcion' => 'Recargo por carga peligrosa',
			'costo' 	  => 234.3
			
		);
		$this->load->model('recargo_aereo');
		$this->recargo_aereo->set_recargo_aereo($recargo);
	}
	
	
	/**
	 * retorna un alista de recargos aereos
	 */
	public function test_get_recargos_aereos(){
		$this->load->model('recargo_aereo');
		var_dump($this->recargo_aereo->get_recargos_aereos());
	}
	
	/**
	 * retorna un solo registro de recargo aereos
	 */
	public function test_get_recargo_aereo(){
		$this->load->model('recargo_aereo');
		var_dump($this->recargo_aereo->get_recargo_aereo(1));
	}
	
	/**
	 * actualiza un registro de recargos aereos, compuesto por recargo_aereo y recargo
	 */
	public function test_update_recargo_aereo(){
		$this->load->model('recargo_aereo');
		$this->recargo_aereo->update_recargo_aereo(array(
			'idrecargo' => 1,
			'idrecargo_aereo' => 1,
			'idaerolinea' =>2,
			'clave' => 'NUEVA 2',
			'descripcion' => 'Nueva descripcion 2',
			'costo' => 8888.00
		));
	}
	
	
	/*************
	 * 
	 * PRUEBAS DE RECARGO MARITIMOS
	 * 
	 ***************/
	 
	 
	 
	/**
	 * inserta un registro en la tabla de recargo maritimo y recargaos, dado un ID de aerolinea y los valores de los campos de cada tabla 
	 */
	public function test_set_recargo_maritimo(){
		$recargo =  array(
			'idnaviera' => 1,
			'clave'		  => 'IMO',
			'descripcion' => 'Recargo por carga peligrosa en mar',
			'costo' 	  => 2342344
			
		);
		$this->load->model('recargo_maritimo');
		$this->recargo_maritimo->set_recargo_maritimo($recargo);
	}
	
		
	/**
	 * retorna un alista de recargos maritimo
	 */
	public function test_get_recargos_maritimos(){
		$this->load->model('recargo_maritimo');
		var_dump($this->recargo_maritimo->get_recargos_maritimos());
	}
	
	/**
	 * retorna un solo registro de recargo aereos
	 */
	public function test_get_recargo_maritimo(){
		$this->load->model('recargo_maritimo');
		var_dump($this->recargo_maritimo->get_recargo_maritimo(1));
	}
	
	/**
	 * actualiza un registro de recargos maritimo, compuesto por recargo_aereo y recargo
	 */
	public function test_update_recargo_maritimo(){
		$this->load->model('recargo_maritimo');
		$this->recargo_maritimo->update_recargo_maritimo(array(
			'idrecargo' => 1,
			'idrecargo_maritimo' => 1,
			'idnaviera' =>3,
			'clave' => 'xxxxx',
			'descripcion' => 'xxxxxx',
			'costo' => .00111
		));
	}
	
	/****************************
	 * 
	 * TEST DE CARGA AEREA
	 * 
	 * 
	 *****************************/
	 
	/**
	 * Test para probar el modelo de set_carga_aerea
	 */ 
	public function test_set_carga_aerea(){
		try{
			$this->load->model('carga_aerea');
			$this->carga_aerea->set_carga_aerea(array(
				'min' => 12,
				'max' => 100,
				'peso' => 10000,
				'volumen' => 12344
			));
			echo "El registro de carga aerea se guardo satisfactoriamente...!!!";
		}catch(Exception $e){
			echo "Error: " . $e->getCode(). "-". $e->getMessage() ;
		}
	}
	
	/**
	 * test para probar el modelo get_cargas_aereas()
	 */
	public function test_get_cargas_aereas(){
		$this->load->model('carga_aerea');
		var_dump($this->carga_aerea->get_cargas_aereas());
	}
	
	public function test_exception(){
		$this->load->model('carga_aerea');
		try{
			$this->carga_aerea->test_ex();
		}catch(Exception $e){
			echo "Error: " . $e->getCode(). "-". $e->getMessage() ;
		}
	}
	
	public function test_form(){

		$this->form_validation->set_rules('opcion','Opcion','required|callback_select_validate');
		$this->form_validation->set_rules('nombre','Nombre','required');
		if($this->form_validation->run() === FALSE){
			$this->load->view('formtest');
		}else{
			$this->load->view('formtest');
		}
	}
	
	public function select_validate($param){
		if($param == 'none'){
			$this->form_validation->set_message('select_validate', 'Please Select Your City.');
			return FALSE;
		}else{
			return TRUE;
		}
	}
		
	
}