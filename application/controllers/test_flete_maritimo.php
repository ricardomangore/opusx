<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Test_Flete_Maritimo extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('flete_maritimo');
	}
	
	public function index(){
		
	}
	
	
	/**
	 * Test metodo set_flete_maritimo del modelo: flete_maritimo
	 */
	public function test_set_flete_maritimo(){
		try{
			$this->flete_maritimo->set_flete_maritimo(array(
				'precio' => 2342.00,
				'tt'	=> 5,
				'has_vias'	=> TRUE,
				'has_recargos' => TRUE,
				'vigencia' => '2015-12-12',
				'idnaviera' => 1,
				'idregion' => 1,
				'pol'	=> 1,
				'pod'	=> 5,
				'idcarga' => 8,
				'vias' => array(2,3,4),
				'recargos' => array(1,2,3),
				'tipo' => 1,//carga consolidada
				'peso' => 2345,
				'volumen' => 200
			));
			echo "Listo la inserción";
		}catch(Exception $e){
			echo "Error: " . $e->getCode();
		}
	}
	
	public function test_get_fletes_maritimos(){
		try{
			$result = $this->flete_maritimo->get_fletes_maritimos();
			var_dump($result);
		}catch(Exception $e){
			echo "" . $e->getCode();	
		}
	}
	
	
}
	